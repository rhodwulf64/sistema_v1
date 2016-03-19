<?php @session_start();
include_once("../../modelo/movimientos/m_asignacion.php");

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_asignacion = new ClsAsignacion();
		$tupla = $obj_asignacion->Consultar_BienNacional_Ajax($_POST["tipo_bien_a"],$_POST["fecha_asig_aj"]);
		$c=1;
		$contenido="";
		$cont = "";
		while($rs = $obj_asignacion->converArray($tupla)){
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
				<td><input type="checkbox" name="chec'.$c.'"></td>
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
	case "ComboDependiente": CombosDependient(); break;
	case "Consultar": Bien(); break;
	case "Anular": Anular(); break;
	case "Cancelar":

	/* datos cabecera */
	unset($_SESSION["n_A"]);
	unset($_SESSION["n_Asignacion"]);
	unset($_SESSION["cod_dep_p_asig"]);
	unset($_SESSION["id_personal_dep_asig"]);
	unset($_SESSION["id_personal_asig"]);
	unset($_SESSION["f_Asig"]);
	unset($_SESSION["id_motivo_asig"]);
	unset($_SESSION["obser_cabecera_asig"]);

	/* datos detalle */
	unset($_SESSION["GlobalDetalleAsig"]);

	/* variable de anulacion */
	unset($_SESSION['anulacionAsig']);
	unset($_SESSION['anulacionTrazabilidadAsig']);
	unset($_SESSION["TrazabPeriodoAnteriorAsig"]);

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=asignacion'); break;
}

function CombosDependient(){

	echo "si esta llegando, buscado responsables del departament --> ".$_POST['combo1'];

	$_arreglo[] = array('Id' => 1, 'Data' => 'valor 1.1');
	$_arreglo[] = array('Id' => 1, 'Data' => 'valor 1.2');
	$_arreglo[] = array('Id' => 1, 'Data' => 'valor 1.3');

	echo json_encode($_arreglo);
}
function Inc(){

	$obj_asignacion = new ClsAsignacion(); //creo mi objeto
	$obj_asignacion->RecibirTodo($_POST); // funcion que recibe todo de la vista
	// funcion que realiza la transaccion a 3 tablas 
	if( $Ult_nr_Mov = $obj_asignacion->incluir() ){
		//envia el reporte de la recepcioon
		$_SESSION['res'] = "asignacionFinalizada";
		$_SESSION['nroAsigReportes'] = $_POST['n_Asignacion'];
		$_SESSION['nroAsigAutoincrementalReportes'] = $Ult_nr_Mov;//el id mov
		$_SESSION['idRespParaReportesAsig'] = $_POST['id_personal_recep'];

		$contadorControl = $obj_asignacion->Consultar_Cant_Movimientos();
		$_SESSION['nroAsigAutoincremental'] = $contadorControl;

		//echo "<script>window.open('../../control/c_reportes/c_recepcion.php', this.target, 'width=900,height=600');</script>";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=asignacion');
		//header('location: ../../control/c_reportes/c_recepcion.php');

	}else{
		$_SESSION['res'] = "asignacionError";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=asignacion');
	}
} //cierre funcion Inc()

function Bien(){
	$obj_asignacion = new ClsAsignacion();

	/* variables sesiones que hacen posible la cabecera */
	$cabecera = explode(".", $_POST['ident2']);

	$_SESSION["n_A"] = $cabecera[0];
	$_SESSION["n_Asignacion"] = $cabecera[1];
	$_SESSION["id_personal_asig"] = $cabecera[2];
	$_SESSION["cod_dep_p_asig"] = $cabecera[3];
	$_SESSION["id_personal_dep_asig"] = $cabecera[4];

	/* voltear la fecha */
	$fechaAsig = $obj_asignacion->formatearFecha($cabecera[5]);
	$_SESSION["f_Asig"] = $fechaAsig;
	$_SESSION["id_motivo_asig"] = $cabecera[6];

	//consuto la observacion de nuevo;
	$observacion_cab_consulta = $obj_asignacion->ConsulCabRece($_SESSION["n_A"]);
	$observacion_cab = $obj_asignacion->converArray($observacion_cab_consulta);
	$_SESSION["obser_cabecera_asig"] = $observacion_cab['observacion_mov'];

	/* consulto para traerme los bienes */
	$tupla = $obj_asignacion->consultarBien($_SESSION["n_A"]);

	/* validar periodo para anular */
	$AnuPeriodo = $obj_asignacion->ValidarPeriodoAnulacion($_SESSION["n_A"]);
	if( !$AnuPeriodo ){
		$_SESSION["TrazabPeriodoAnteriorAsig"] = '1';
		$_SESSION['res'] = 'AnulaFallidaPorPeriodoAsig';
	}

	$contenidoDetalle = "";
	$c = 1;

	$_SESSION["anulacionAsig"] = 0;// variable que llevara el control paara la anulacion
	$_SESSION["anulacionTrazabilidadAsig"] = "";
	while($rs = $obj_asignacion->converArray($tupla)){
			
			$valorTrazabilidad = $obj_asignacion->consultarTrazabilidadBien($_SESSION["n_A"],$rs["id_bien"]);

			if(( $valorTrazabilidad == false && $_SESSION["anulacionTrazabilidadAsig"] != 1)){
				//ya ah tenido una trazabilidad y pierde la garantía de ser anulado 
				$_SESSION["anulacionTrazabilidadAsig"] = "1";
				$_SESSION['res'] = "anuAsigTrazaError";
			}
	
			if( ($rs["id_cond"] != "2" && $_SESSION["anulacionAsig"] != "1") ){
				$_SESSION["anulacionAsig"] = "1";
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
	if($_SESSION["anulacionAsig"] == ""){
		$_SESSION["anulacionAsig"] = "2"; // todos asignados para pintar el boton cancelar
	}
	$_SESSION["GlobalDetalleAsig"] = $contenidoDetalle;

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=asignacion');
}

function Anular(){
	$obj_asignacion = new ClsAsignacion();
	if($obj_asignacion->anularAsignacion($_POST["n_A"],$_POST["id_motivo_anu_asig"])){
		$_SESSION['res'] = "AnulaAsignacion";
		/* datos cabecera */
		unset($_SESSION["n_A"]);
		unset($_SESSION["n_Asignacion"]);
		unset($_SESSION["cod_dep_p_asig"]);
		unset($_SESSION["id_personal_dep_asig"]);
		unset($_SESSION["id_personal_asig"]);
		unset($_SESSION["f_Asig"]);
		unset($_SESSION["id_motivo_asig"]);
		unset($_SESSION["obser_cabecera_asig"]);

		/* datos detalle */
		unset($_SESSION["GlobalDetalleAsig"]);

		/* variable de anulacion */
		unset($_SESSION['anulacionAsig']);
		//unset($_SESSION['anulacionTrazabilidad']);
		unset($_SESSION["TrazabPeriodoAnteriorAsig"]);
	}else{
		$_SESSION['res'] = "AnulaAsignacionError";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=asignacion');
}

?>