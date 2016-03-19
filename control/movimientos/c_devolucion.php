<?php @session_start();
include_once("../../modelo/movimientos/m_devolucion.php");

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_devolucion = new ClsDevolucion();
		$tupla = $obj_devolucion->consultarBien($_POST["dep_a"],$_POST["fec_devol"]);
		$c=1;
		$contenido="";
		$cont = "";
		if( $tupla == false){
			echo "<td colspan='9'> <span class='no-hay-datos-mostrar'> NO &nbsp;HAY &nbsp;BIENES &nbsp;NACIONALES &nbsp;ASIGNADOS EN EL DEPARTAMENTO SELECCIONADO</span> </td>";
		}else{
			while($rs = $obj_devolucion->converArray($tupla)){
				if($rs["id_marca"] == 1){ $marca = "N/A"; } else { $marca = $rs["nom_marca"]; }

					$contador[$c] = $rs["id_bien"];
					//$td = $c;
					$cont = '
						<input type="hidden" name="cantidadFilas" value="'.$c.'">
					';
					$contenido.='<tr class="tbody">

					<td> '.$rs["cod_bien"].' <input type="hidden" name="cod'.$c.'" value="'.$rs["cod_bien"].'"> <input type="hidden" name="codtbien'.$c.'" value="'.$rs["cod_tbien"].'"></td>
					<td> '.$rs["serial_bien"].' <input type="hidden" name="serial'.$c.'" value="'.$rs["serial_bien"].'"> </td>
					<td> '.$marca.' <input type="hidden" name="marca'.$c.'" value="'.$marca.'" > </td>
					<td> '.$rs["modelo"].' <input type="hidden" name="modelo'.$c.'" value="'.$rs["modelo"].'" > </td>
					<td> '.$rs["des_bien"].' <input type="hidden" name="descrip'.$c.'" value="'.$rs["des_bien"].'" > </td>
					<td> '.$rs["precio"].' <input type="hidden" name="precio'.$c.'" value="'.$rs["precio"].'" > </td>
					<td> '.$rs["cod_bien"].' <input type="hidden" name="fecha'.$c.'" value="'.$rs["cod_bien"].'"> </td>
					<td> '.$rs["observacion_bien"].' <input type="hidden" name="obser'.$c.'" value="'.$rs["observacion_bien"].'"> </td>
					<!--<td><button type="button" value="'.$contador[$c].'" title="clic para consultar el registro" id="Editar"><span id="iconosE" class="icon-checkmark"></span></button></td>-->
					<td><input type="checkbox" name="chec'.$c.'"></td>
					</tr>';
				$c++;
			}

			if($contenido!=""){
				echo $cont.$contenido;
			}else{
				echo "<td colspan='9'> <span class='no-hay-datos-mostrar'> NO &nbsp;HAY &nbsp;BIENES &nbsp;NACIONALES &nbsp;ASIGNADOS EN EL DEPARTAMENTO SELECCIONADO</span> </td>";
			}
		}
		
	}
}


@$op = $_POST['temp'];

//***************************************Control para la botonera ******************************//
switch ($op) {
	case "Grabar":	Inc();break;
	case "Consultar": Bien(); break;
	case "Anular": Anular(); break;
	case "Cancelar":

	/* datos cabecera */
	unset($_SESSION["n_Dev"]);
	unset($_SESSION["n_Devolucion"]);
	unset($_SESSION["id_personal_dev"]);
	unset($_SESSION["f_Dev"]);
	unset($_SESSION["cod_dep_dev"]);
	unset($_SESSION["id_personal_dep_dev"]);
	unset($_SESSION["id_motivo_dev"]);
	unset($_SESSION["obser_cabecera_Dev"]);

	/* datos detalle */
	unset($_SESSION["GlobalDetalleDev"]);

	/* variable de anulacion */
	unset($_SESSION['anulacionDev']);
	unset($_SESSION['anulacionTrazabilidadDev']);
	unset($_SESSION["TrazabPeriodoAnteriorDev"]);

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=devolucion'); break;
}

function Inc(){
	$obj_devolucion = new ClsDevolucion(); //creo mi objeto
	$obj_devolucion->RecibirTodo($_POST); // funcion que recibe todo de la vista
	// funcion que realiza la transaccion a 3 tablas 
	if( $Ult_nr_Mov  = $obj_devolucion->incluir() ){
		//envia el reporte de la recepcioon
		$_SESSION['res'] = "devolucionFinalizada";
		$_SESSION['nroDevReportes'] = $_POST['n_Devolucion']; // el nro de document
		$_SESSION['nroDevAutoincrementalReportes'] = $Ult_nr_Mov;//el id mov
		$_SESSION['idRespParaReportesDev'] = $_POST['id_personal_recep'];

		$contadorControl = $obj_devolucion->Consultar_Cant_Movimientos();
		$_SESSION['nroDevAutoincremental'] = $contadorControl;
		
		//echo "<script>window.open('../../control/c_reportes/c_recepcion.php', this.target, 'width=900,height=600');</script>";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=devolucion');
		//header('location: ../../control/c_reportes/c_recepcion.php');

	}else{
		$_SESSION['res'] = "devolucionError";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=devolucion');
	}
} //cierre funcion Inc()

function Bien(){
	$obj_devolucion = new ClsDevolucion();

	/* variables sesiones que hacen posible la cabecera */
	$cabecera = explode(".", $_POST['ident2']);

	$_SESSION["n_Dev"] = $cabecera[0];
	$_SESSION["n_Devolucion"] = $cabecera[1];
	$_SESSION["id_personal_dev"] = $cabecera[2];
	/* voltear la fecha */
	$fechaDev = $obj_devolucion->formatearFecha($cabecera[3]);
	$_SESSION["f_Dev"] = $fechaDev;
	
	$_SESSION["cod_dep_dev"] = $cabecera[4];
	$_SESSION["id_personal_dep_dev"] = $cabecera[5];
	$_SESSION["id_motivo_dev"] = $cabecera[6];
	
	//consuto la observacion de nuevo;
	$observacion_cab_consulta = $obj_devolucion->ConsulCabDev($_SESSION["n_Dev"]);
	$observacion_cab = $obj_devolucion->converArray($observacion_cab_consulta);
	$_SESSION["obser_cabecera_Dev"] = $observacion_cab['observacion_mov'];	

	//$_SESSION["obser_cabecera_asig"] = $cabecera[7];

	/* consulto para traerme los bienes */
	$tupla = $obj_devolucion->consultarBienParaListar($_SESSION["n_Dev"]);

	/* validar periodo para anular */
	$AnuPeriodo = $obj_devolucion->ValidarPeriodoAnulacion($_SESSION["n_Dev"]);
	if( !$AnuPeriodo ){
		$_SESSION["TrazabPeriodoAnteriorDev"] = '1';
		$_SESSION['res'] = 'AnulaFallidaPorPeriodoDev';
	}


	$contenidoDetalle = "";
	$c = 1;

	$_SESSION["anulacionDev"] = 0;// variable que llevara el control paara la anulacion
	$_SESSION["anulacionTrazabilidadDev"] = "";
	while($rs = $obj_devolucion->converArray($tupla)){
			
			$valorTrazabilidad = $obj_devolucion->consultarTrazabilidadBien($_SESSION["n_Dev"],$rs["id_bien"]);

			/**********************/
			if(( $valorTrazabilidad == false && $_SESSION["anulacionTrazabilidadDev"] != 1)){
				//ya ah tenido una trazabilidad y pierde la garantía de ser anulado 
				$_SESSION["anulacionTrazabilidadDev"] = "1";
				$_SESSION['res'] = "anuDevTrazaError";
			}
	
			if( ($rs["id_cond"] != "2" && $_SESSION["anulacionDev"] != "1") ){
				$_SESSION["anulacionDev"] = "1";
			}

			if($rs["id_cond"] == 1){ 
				$ClaseCond= "DISP";
				$descripCond = "DISP";
			}else if($rs["id_cond"] == 1 ){
				$ClaseCond= "DISPconT";
				$descripCond = "DISP";
			}else if($rs["id_cond"] == 2  && $valorTrazabilidad == true){ 
				$ClaseCond= "ASIG";
				$descripCond = "ASIG";
			}else if( $rs["id_cond"] == 2  && $valorTrazabilidad == false){
				$ClaseCond= "DISPconT";
				$descripCond = "ASIG";
			}else{	
			 	$ClaseCond= "DESI";
			 	$descripCond = "DESI";
			}
			/**********************/

			// funcion sin trazabilidad
			/*if($rs["id_cond"] == 1){
				$ClaseCond= "DISP";
				$descripCond = "DISP";
			}else if($rs["id_cond"] == 2 ){ 
				$ClaseCond= "ASIG";
				$descripCond = "ASIG";
			}else{	
			 	$ClaseCond= "DESI";
			 	$descripCond = "DESI";
			}*/

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
	if($_SESSION["anulacionDev"] == ""){
		$_SESSION["anulacionDev"] = "2"; // todos asignados para pintar el boton cancelar
	}
	$_SESSION["GlobalDetalleDev"] = $contenidoDetalle;

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=devolucion');
}

function Anular(){
	$obj_devolucion = new ClsDevolucion();
	if($obj_devolucion->anularDevolucion($_POST["n_Dev"],$_POST["id_motivo_anu_asig"])){
		$_SESSION['res'] = "AnulaDevolucion";
		/* datos cabecera */
		unset($_SESSION["n_Dev"]);
		unset($_SESSION["n_Devolucion"]);
		unset($_SESSION["id_personal_dev"]);
		unset($_SESSION["f_Dev"]);
		unset($_SESSION["cod_dep_dev"]);
		unset($_SESSION["id_personal_dep_dev"]);
		unset($_SESSION["id_motivo_dev"]);
		unset($_SESSION["obser_cabecera_Dev"]);

		/* datos detalle */
		unset($_SESSION["GlobalDetalleDev"]);

		/* variable de anulacion */
		unset($_SESSION['anulacionDev']);
		unset($_SESSION['anulacionTrazabilidadDev']);
		//unset($_SESSION['anulacionTrazabilidad']);
		unset($_SESSION["TrazabPeriodoAnteriorDev"]);
	}else{
		$_SESSION['res'] = "AnulaDevolucionError";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=devolucion');
}

?>