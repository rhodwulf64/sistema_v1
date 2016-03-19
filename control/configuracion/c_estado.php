<?php 
error_reporting(0);
@session_start();
include_once('../../modelo/configuracion/m_estado.php');

//esto es para la busqueda rapida con ajax
if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
	$obj_estado = new ClsEstado();
	$tupla = $obj_estado->ConsultarTodo_Ajax($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getEstado($tupla)){
		if($rs["status"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
			$contador[$c] = $rs["id_est"];
			$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
					<td> '.$c.'</td>
					<td> '.$rs["nom_est"].'</td>
					<td> <span id="'.$status.'">'.$status.' </span></td>
					<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
				</tr>';
			$c++; 
		}
		if($contenido!="")
			echo $contenido;
		else
			echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; 
	}
}else{
	if(isset( $_POST['temp'])) 
		@$op = $_POST['temp'];
			else
				@$op = 'Consultar';


	//***************************************Control para la botonera ******************************//
	switch ($op) {
		case 'Incluir':Inc(); break;
		case 'Consultar':Bus(); break;
		case 'Modificar':Mod(); break;
		case 'Activar':Act();break;
		case 'Desactivar':Des(); break;
		case 'Cancelar':
		unset($_SESSION["cod_est"]);
		unset($_SESSION["nom_est"]);
		unset($_SESSION["opActDesEstado"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=estado');break;
	}
}//cierro la comprovasion de si existe la variable

//******************************************* Fin control de la botonera ********************************//

function Inc(){
	$obj_est = new ClsEstado();
	$obj_est->recibirDes($_POST['nom_est']);
	$rs = $obj_est->bus_estado();
	if($tupla = $obj_est->getEstado($rs)){
		$_SESSION["res"] = "yaexiste";
	}else{
		$obj_est->incluir();
		$_SESSION["res"] = "registrado";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=estado');
}
	
function Mod(){
	$obj_est = new ClsEstado();
	$obj_est->recibir($_POST['cod_est'],$_POST['nom_est']);
	$rs = $obj_est->bus_estado();
	$tupla = $obj_est->getEstado($rs);
	
	if($tupla['nom_est'] == $_POST['nom_est']){
		$_SESSION['res'] = "error_mod";
	}else{
		$obj_est->modificar();
		// $rs2=$obj_est->bus_estado();
		// $tupla2=$obj_est->getEstado($rs2);
		// $_SESSION['nom_est']=$tupla2['nom_est'];
		$_SESSION["res"] = "mod";
		unset($_SESSION["cod_est"]);
		unset($_SESSION["nom_est"]);
	}
	
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=estado');
}
function Des(){
	$obj_est=new ClsEstado();
	$obj_est->recibir($_POST['cod_est'],$_POST['nom_est']);
	
	if($obj_est->desactivar()){
		$_SESSION["opActDesEstado"] = "des";
		$_SESSION["res"] = "des";
		unset($_SESSION["cod_est"]);
		unset($_SESSION["nom_est"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=estado');
	}else{
		$_SESSION["res"] = "error_des";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=estado');
	}
}
function Act(){
	$obj_est=new ClsEstado();
	$obj_est->recibir($_POST['cod_est'],$_POST['nom_est']);
	$obj_est->activar();
	$_SESSION["res"] = "act";
	$_SESSION["opActDesEstado"] = "act";
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=estado');
}
function Bus(){
	$obj_est=new ClsEstado();
	$obj_est->recibir2($_POST['ident']);
	$rs=$obj_est->consultar();
	$tupla=$obj_est->getEstado($rs);

	$_SESSION["cod_est"] = $tupla["id_est"];
	$_SESSION["nom_est"] = $tupla["nom_est"];


if(isset($tupla["status"])){

	if($tupla["status"] == 1){
		$_SESSION["opActDesEstado"] = "act";
	}else{
		$_SESSION["opActDesEstado"] = "des";
	}
}
	
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=estado');
}
//*******************************CONTROL DEL COMBO ESTADO******************************//
	function PintaEstado($cod){
		$obj_Estado=new ClsEstado();
		$rs=$obj_Estado->consultarEstado();
		$selec="";
		$c=0;
		$combEstado=array();
		$combEstado[$c++]="<select class='CampoMov' name='cod_est_m' disabled>";
		$_SESSION["cod_est_m"] = "SELECCIONE UN ESTADO";
		$combEstado[$c++]="<option selected='selected'>SELECCIONE UN ESTADO</option>";
		while($tupla=$obj_Estado->getEstado($rs)){
			$cod_est_m=$tupla['id_est'];
			$des_est_m=$tupla['nom_est'];
			if($cod==$cod_est_m){
				$selec="selected='selected'";
			}else{
				$selec="";
			}
			$combEstado[$c++]="<option value='".$cod_est_m."' ".$selec." >".$des_est_m."</option>";
		}
		$combEstado[$c++]="</select>";
		return $combEstado;

	}
//*************************************************************************************//
?>