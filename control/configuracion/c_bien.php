<?php session_start();

include_once('../modelo/m_bien.php');

@$op = $_POST['temp'];

switch($op){
	case "Incluir":   Inc(); break;
	case "Consultar": Bus(); break;
	case "Modificar": Mod(); break;
	case "Activar":Act();break;
	case "Desactivar":Des();break;
	case "Cancelar":
	unset($_SESSION["nbien"]);
	unset($_SESSION["des"]);
	unset($_SESSION["tbien"]);
	unset($_SESSION["val"]);
	unset($_SESSION["fecha"]);
	unset($_SESSION["cond"]);
	unset($_SESSION["cod_inv"]);
	unset($_SESSION["con"]);
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=bien');break;
}

function Inc(){
	$obj_bien = new clsBien();
	$obj_bien->recibir($_POST["nbien"],$_POST["des"],$_POST["cant"],$_POST["val"],$_POST["fecha"],$_POST["cond"],$_POST["cod_inv"],$_POST["con"],$_POST["tbien"]);
	$rs=$obj_bien->buscar();
	if($tupla=$obj_bien->converArray($rs)){
		$_SESSION["res"] = "yaexiste";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=bien');		
	}else{
		$obj_bien->incluir();
		$_SESSION["res"] = "registrado";
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=bien');
    }
}
function Bus(){
	$obj_bien = new clsBien();
	$obj_bien->recibir2($_POST["nbien"]);
	$rs = $obj_bien->buscar();
	if($tupla = $obj_bien->converArray($rs)){
		header("location: ../vista/v_Perfil.php?accion=bien&nbien=".$tupla["nro_bien"]."&des=".$tupla["des_bien"]."&tbien=".$tupla["id_tbien"]."&cant=".$tupla["cant"]."&val=".$tupla["valor"]."&fecha=".$tupla["fec_reg"]."&cond=".$tupla["cond"]."&cod_inv=".$tupla["cod_inv"]."&con=".$tupla["conc"]);
	}else{
		header("location: ../vista/v_Perfil.php?accion=bien");
	}
}
function Mod(){
	$obj_bien = new clsBien();
	$obj_bien->recibir($_POST["nbien"],$_POST["des"],$_POST["cant"],$_POST["val"],$_POST["fecha"],$_POST["cond"],$_POST["cod_inv"],$_POST["con"],$_POST["tbien"]);
	$obj_bien->modificar();
	header("location: ../vista/v_Perfil.php?accion=bien");
}
function Eli(){
	$obj_bien = new clsBien();
	$obj_bien->recibir2($_POST["nbien"]);
	$obj_bien->eliminar();
	header("location: ../vista/v_Perfil.php?accion=bien");
}
?>