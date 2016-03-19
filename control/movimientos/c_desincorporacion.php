<?php @session_start();
include_once("../../modelo/movimientos/m_desincorporacion.php");

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_desincorp = new ClsDesing();
		$tupla = $obj_desincorp->Consultar_BienNacional_porTbienFecha_Ajax($_POST["tbienNAcional_aj"],$_POST["fecha_desin_aj"]);
		$c = 1;
		$contenido = "";
		$cont = "";
		while($rs = $obj_desincorp->converArray($tupla)){
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
				<td> '.$rs["fecha_ent"].' <input type="hidden" name="fecha'.$c.'" value="'.$rs["fecha_ent"].'"> </td>
				<td> '.$rs["observacion_bien"].' <input type="hidden" name="obser'.$c.'" value="'.$rs["observacion_bien"].'"> </td>
				<!--<td><button type="button" value="'.$contador[$c].'" title="clic para consultar el registro" id="Editar"><span id="iconosE" class="icon-checkmark"></span></button></td>-->
				<td><input type="checkbox" name="chec'.$c.'" value="'.$rs["cod_bien"].'"></td>
				</tr>';
			$c++;
		}

		if($contenido!=""){
			echo $cont.$contenido;
		}else{
			echo "<td colspan='9'> <span class='no-hay-datos-mostrar'> NO &nbsp;HAY &nbsp;BIENES &nbsp;NACIONALES &nbsp;DISPONIBLES</span> </td>";
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
	unset($_SESSION["n_Des"]);
	unset($_SESSION["n_Desincorporacion"]);
	unset($_SESSION["id_personal_desin"]);
	unset($_SESSION["f_Desin"]);
	unset($_SESSION["id_motivo_desin"]);
	unset($_SESSION["obser_cabecera_desin"]);

	/* datos detalle */
	unset($_SESSION["GlobalDetalleDesin"]);

	/* variable de anulacion */
	unset($_SESSION['anulacionDesi']);
	//unset($_SESSION['anulacionTrazabilidad']);
	unset($_SESSION["TrazabPeriodoAnteriorDesin"]);

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=desincorporacion'); break;
}

function Inc(){
	$obj_desincorp = new ClsDesing(); //creo mi objeto
	$obj_desincorp->RecibirTodo($_POST); // funcion que recibe todo de la vista
	// funcion que realiza la transaccion a 3 tablas 
	if( $Ult_nr_Mov = $obj_desincorp->incluir() ){
		//envia el reporte de la recepcioon
		$_SESSION['res'] = "DesincorFinalizada";
		$_SESSION['desinReportes'] = $_POST['n_Desincorporacion'];
		$_SESSION['nroDesAutoincrementalReportes'] = $Ult_nr_Mov;//el id mov
		$_SESSION['idRespParaReportesdes'] = $_POST['id_personal_recep'];

		$contadorControl = $obj_desincorp->Consultar_Cant_Movimientos();
		$_SESSION['nroDesAutoincremental'] = $contadorControl;


		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=desincorporacion');

	}else{
		$_SESSION['res'] = "DesincorError";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=desincorporacion');
	}
} //cierre funcion Inc()

function Bien(){
	$obj_desincorp = new ClsDesing();

	/* variables sesiones que hacen posible la cabecera */
	$cabecera = explode(".", $_POST['ident2']);

	$_SESSION["n_Des"] = $cabecera[0];
	$_SESSION["n_Desincorporacion"] = $cabecera[1];
	$_SESSION["id_personal_desin"] = $cabecera[2];

	/* voltear la fecha */
	$fechaDesin = $obj_desincorp->formatearFecha($cabecera[3]);
	$_SESSION["f_Desin"] = $fechaDesin;
	$_SESSION["id_motivo_desin"] = $cabecera[4];

	//consuto la observacion de nuevo;
	$observacion_cab_consulta = $obj_desincorp->ConsulCabRece($_SESSION["n_Des"]);
	$observacion_cab = $obj_desincorp->converArray($observacion_cab_consulta);
	$_SESSION["obser_cabecera_desin"] = $observacion_cab['observacion_mov'];

	//$_SESSION["obser_cabecera_asig"] = $cabecera[7];

	/* consulto para traerme los bienes */
	$tupla = $obj_desincorp->consultarBien($_SESSION["n_Des"]);

	/* validar periodo para anular */
	$AnuPeriodo = $obj_desincorp->ValidarPeriodoAnulacion($_SESSION["n_Des"]);
	if( !$AnuPeriodo ){
		$_SESSION["TrazabPeriodoAnteriorDesin"] = '1';
		$_SESSION['res'] = 'AnulaFallidaPorPeriodoDesin';
	}

	$contenidoDetalle = "";
	$c = 1;

	//$_SESSION["anulacionDesi"] = 0;// variable que llevara el control paara la anulacion
//	$_SESSION["anulacionTrazabilidad"] = "";
	while($rs = $obj_desincorp->converArray($tupla)){
			
			//$valorTrazabilidad = $obj_desincorp->consultarTrazabilidadBien($rs["id_bien"]);

			//if(( $valorTrazabilidad == true && $_SESSION["anulacionTrazabilidad"] != 1)){
				//ya ah tenido una trazabilidad y pierde la garantía de ser anulado 
				//$_SESSION["anulacionTrazabilidad"] = "1";
				//$_SESSION['res'] = "anuRecepTrazaError";
			//}
	
		/*	if(($rs["id_cond"] != "2" && $_SESSION["anulacionDesi"] != "1")){
				$_SESSION["anulacionDesin"] = "1";
			}*/

			/*if($rs["id_cond"] == 1 && $valorTrazabilidad == false){ 
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
			}*/

			if($rs["id_cond"] == 1){
				$ClaseCond= "DISP";
				$descripCond = "DISP";
			}else if($rs["id_cond"] == 2 ){ 
				$ClaseCond= "ASIG";
				$descripCond = "ASIG";
			}else{	
			 	$ClaseCond= "DESI";
			 	$descripCond = "DESI";
			}

			$_SESSION["anulacionDesi"] = 1;

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
	/*if($_SESSION["anulacionDesi"] == ""){
		$_SESSION["anulacionDesi"] = "2"; // todos asignados para pintar el boton cancelar
	}*/
	$_SESSION["GlobalDetalleDesin"] = $contenidoDetalle;

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=desincorporacion');
}

function Anular(){
	$obj_desincorp = new ClsDesing();
	if($obj_desincorp->anularDesincorporacion($_POST["n_Des"],$_POST["id_motivo_anu_desin"])){
		$_SESSION['res'] = "AnulaDesincorporacion";
		/* datos cabecera */
		unset($_SESSION["n_Des"]);
		unset($_SESSION["n_Desincorporacion"]);
		unset($_SESSION["id_personal_desin"]);
		unset($_SESSION["f_Desin"]);
		unset($_SESSION["id_motivo_desin"]);
		unset($_SESSION["obser_cabecera_desin"]);
		unset($_SESSION["GlobalDetalleDesin"]);
		unset($_SESSION['anulacionDesi']);
		unset($_SESSION["TrazabPeriodoAnteriorDesin"]);
		//unset($_SESSION['anulacionTrazabilidad']);
	}else{
		$_SESSION['res'] = "AnulaDesincorporacionError";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=desincorporacion');
}

?>