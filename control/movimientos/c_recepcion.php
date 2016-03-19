<?php @session_start();
include_once("../../modelo/movimientos/m_recepcion.php");

@$op = $_POST['temp'];

//***************************************Control para la botonera ******************************//
switch ($op) {
	case "Grabar":	Inc();break;
	case "Consultar": Bien(); break;
	case "Anular": Anular(); break;
	case "validarCodigo": ValCodBien(); break;
	case "Cancelar":

	/* datos cabecera */
	unset($_SESSION["n_R"]);
	unset($_SESSION["n_D"]);
	unset($_SESSION["f_lL"]);
	unset($_SESSION["id_prov_recep"]);
	unset($_SESSION["id_personal_recep"]);
	unset($_SESSION["id_motivo_recep"]);
	unset($_SESSION["obser_cabecera"]);

	/* datos detalle */
	unset($_SESSION["GlobalDetalle"]);
	unset($_SESSION["cabeceraDetalle"]);

	/* variable de anulacion */
	unset($_SESSION['anulacion']);
	unset($_SESSION['anulacionTrazabilidad']);
	unset($_SESSION["TrazabPeriodoAnterior"]);

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=recepcion'); break;
}

function ValCodBien(){
	$obj_recepcion = new clsRecepcion(); //creo mi objeto

	if( $obj_recepcion->validarCodigodelBien($_POST['codigo']) ){
		echo 1; //el codigo ya esta en la base de datos
	}else{ 
		echo 2; // el codigo no esta en la base de datos asi que puedes continuar
	}
}
function Inc(){
	$obj_recepcion = new clsRecepcion(); //creo mi objeto
	$obj_recepcion->RecibirTodo($_POST); // funcion que recibe todo de la vista
	// funcion que realiza la transaccion a 3 tablas 
	if($Ult_nr_Mov = $obj_recepcion->incluir()){
		//envia el reporte de la recepcioon
		$_SESSION['res'] = "recepcionFinalizada";
		$_SESSION['nroRecepReportes'] = $_POST['n_D'];
		$_SESSION['idRespParaReportesRecep'] = $_POST['id_personal_recep'];

		$_SESSION['nroRecAutoincrementalReportes'] = $Ult_nr_Mov;//el id mov

		$contadorControl = $obj_recepcion->Consultar_Cant_Movimientos();
		$_SESSION['nroRecepAutoincremental'] = $contadorControl;

		//echo "<script>window.open('../../control/c_reportes/c_recepcion.php', this.target, 'width=900,height=600');</script>";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=recepcion');
		//header('location: ../../control/c_reportes/c_recepcion.php');

	}else{
		$_SESSION['res'] = "recepcionError";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=recepcion');
	}
}

function Bien(){
	$obj_recepcion = new clsRecepcion();
	/* variables sesiones que hacen posible la cabecera */
	$cabecera = explode(".", $_POST['ident']);

	$_SESSION["n_R"] = $cabecera[0];
	$_SESSION["n_D"] = $cabecera[1];

	/* voltear la fecha */
	$fechaLlegada = $obj_recepcion->formatearFecha($cabecera[2]);
	$_SESSION["f_lL"] = $fechaLlegada;

	$_SESSION["id_prov_recep"] = $cabecera[3];
	$_SESSION["id_personal_recep"] = $cabecera[4];
	$_SESSION["id_motivo_recep"] = $cabecera[5];

	//consuto la observacion de nuevo;
	$observacion_cab_consulta = $obj_recepcion->ConsulCabRece($_SESSION["n_R"]);
	$observacion_cab = $obj_recepcion->converArray($observacion_cab_consulta);
	$_SESSION["obser_cabecera"] = $observacion_cab['observacion_mov'];
	
	/* consulto para traerme los bienes */
	$tupla = $obj_recepcion->consultarBien($_SESSION["n_R"]);

	/* validar periodo para anular */
	$AnuPeriodo = $obj_recepcion->ValidarPeriodoAnulacion($_SESSION["n_R"]);
	if( !$AnuPeriodo ){
		$_SESSION["TrazabPeriodoAnterior"] = '1';
		$_SESSION['res'] = 'AnulaFallidaPorPeriodoRecep';
	}
	
	$contenidoDetalle = "";
	$c = 1;

	$_SESSION["anulacion"] = 0;// variable que llevara el control paara la anulacion
	$_SESSION["anulacionTrazabilidad"] = "";

	/******* creo cabecera del detalle *******/
/*	$cabeceraDetalle.= '<tr id="cabecera_tr">
							<td colspan="3">
								<div class="caption">Recepción: Detalle del Bien Nacional</div>
								<span id="cabecera_nr">N°</span>
								<span id="cabecera_cod" >Código</span>
								<span id="cabecera_tbien" >Tipo Bien</span>
								<span id="cabecera_des" >Descripción</span>
								<span id="cabecera_serial" >Serial</span>
								<span id="cabecera_marca" >Marca</span>
								<span id="cabecera_modelo" >Modelo</span>
								<span id="cabecera_precio" >Precio</span>
								<span id="cabecera_obser" >Observación</span>
								<span id="cabecera_condi" >Condición</span>
							<td>
						</tr>';
	$_SESSION['cabeceraDetalle'] = $cabeceraDetalle;*/
	while($rs = $obj_recepcion->converArray($tupla)){
			
			$valorTrazabilidad = $obj_recepcion->consultarTrazabilidadBien($rs["id_bien"]);

			if(( $valorTrazabilidad == true && $_SESSION["anulacionTrazabilidad"] != 1)){
				//ya ah tenido una trazabilidad y pierde la garantía de ser anulado 
				$_SESSION["anulacionTrazabilidad"] = "1";
				$_SESSION['res'] = "anuRecepTrazaError";
			}
	
			if(($rs["id_cond"] != "1" && $_SESSION["anulacion"] != "1")){
				$_SESSION["anulacion"] = "1";
			}

			if($rs["id_cond"] == 1 && $valorTrazabilidad == false){ 
				$ClaseCond= "DISP";
				$descripCond = "DISP";
			}else if($rs["id_cond"] == 1 && $valorTrazabilidad == true ){
				$ClaseCond= "DISPconT";
				$descripCond = "DISP";
			}else if($rs["id_cond"] == 2 ){ 
				$ClaseCond= "ASIG";
				$descripCond = "ASIG";
			}else{	
			 	$ClaseCond= "DESI";
			 	$descripCond = "DESI";
			}

			$contenidoDetalle.='<tr>
									<td > <textarea class="nro-recep" readOnly="readOnly">'.$c.'</textarea></td>
									<td > <textarea class="cod_bien_R" readOnly="readOnly">'.$rs["cod_bien"].'</textarea></td>
									<td > <textarea class="id_tbien" readOnly="readOnly">'.$rs["cod_tbien"].'</textarea></td>
									<td > <textarea class="des_bien_recep" readOnly="readOnly">'.$rs["des_bien"].'</textarea></td>
									<td > <textarea class="serial_bien_recep" readOnly="readOnly">'.$rs["serial_bien"].'</textarea></td>
									<td > <textarea class="cod_marca" readOnly="readOnly">'.$rs["nom_marca"].'</textarea></td>
									<td > <textarea class="modelo_bien_recep" readOnly="readOnly">'.$rs["modelo"].'</textarea></td>
									<td > <textarea class="precio_bien_recep" readOnly="readOnly">'.$rs["precio"].'</textarea></td>
									<td > <textarea class="dep_recep" readOnly="readOnly">'.$rs["observacion_bien"].'</textarea></td>
									<td > <span title="clic para ver datos del bien nacional" onClick=ModalCondicion("'.$rs["id_bien"].'.'.$rs["cod_tbien"].'.'.$rs["cod_bien"].'.'.$descripCond.'"); class="'.$ClaseCond.'">'.$descripCond.'</span></td>
								</tr>';
		$c++;
	}
	if($_SESSION["anulacion"] == ""){
		$_SESSION["anulacion"] = "2"; // todos disponibles para pintar el boton cancelar
	}
	$_SESSION["GlobalDetalle"] = $contenidoDetalle;

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=recepcion');
}

function Anular(){
	$obj_recepcion = new clsRecepcion();
	if($obj_recepcion->anularRecepcion($_POST["n_R"],$_POST["id_motivo_anu"])){
		$_SESSION['res'] = "AnulaRecepcion";
		unset($_SESSION["n_R"]);
		unset($_SESSION["n_D"]);
		unset($_SESSION["f_lL"]);
		unset($_SESSION["id_prov_recep"]);
		unset($_SESSION["id_personal_recep"]);
		unset($_SESSION["id_motivo_recep"]);
		unset($_SESSION["obser_cabecera"]);

		/* datos detalle */
		unset($_SESSION["GlobalDetalle"]);

		/* variable de anulacion */
		unset($_SESSION['anulacion']);
		unset($_SESSION["TrazabPeriodoAnterior"]);
	}else{
		$_SESSION['res'] = "AnulaRecepcionError";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=recepcion');
}

?>