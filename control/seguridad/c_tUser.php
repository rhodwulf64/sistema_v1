<?php error_reporting(0);

@session_start();
include_once("../../modelo/seguridad/m_tUser.php");

 @$op = $_POST['temp'];
 switch ($op) {
	case "Incluir":	Inc();break;
	case "Modificar":  Mod(); break;
	case "Consultar":  Cons();break;
	case "Activar":    Act();break;
	case "Desactivar": Des();break;
	case "Cancelar":
	unset($_SESSION["id_tUser"]);
	unset($_SESSION["des_tusr"]);
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tUser');break;
 }
function Inc(){
	$obj_tUser = new clstUser();
	$obj_tUser->recibirNom($_POST["des_tusr"]);
	$rs = $obj_tUser->buscar();

    if($tupla = $obj_tUser->converArray($rs)){
    	$_SESSION['res']="yaexiste";
    }else{
    	$obj_tUser->incluir();
		$_SESSION['res']="registrado";
    }
 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tUser');
}
function Mod(){
	$obj_tUser = new clstUser();
	$obj_tUser->recibirMod($_POST["id_tUser"],$_POST["des_tusr"]);
	$rs = $obj_tUser->buscar();

	/******************************************************/
	if($tupla = $obj_tUser->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['id_tUser'] = $_SESSION['antiguaoValorCodPerfil'];
	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
	}else{
	 	$obj_tUser->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION['id_tUser']);
		unset($_SESSION['des_tusr']);
	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tUser');
}
function Cons(){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_tUser = new clstUser();
	$obj_tUser->recibirId($resultado[0]);
	$rs = $obj_tUser->consultarPorIdents();
	$tupla = $obj_tUser->converArray($rs);

	$_SESSION['id_tUser']=$tupla['idperfil'];
	$_SESSION['des_tusr']=$tupla['nom_perfil'];
	$_SESSION['antiguaoValorCodPerfil'] = $_SESSION['id_tUser']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
	if($tupla['status'] == 1){
	  	$_SESSION["opActDes"] = "act";
	}else{
	  	$_SESSION["opActDes"] = "des";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tUser');
}
function Act(){
	$obj_tUser = new clstUser();
	$obj_tUser->recibirId($_POST["id_tUser"]);
	$obj_tUser->activar();
	$_SESSION['res'] = "act";
	$_SESSION["opActDes"] = "act";
	$_SESSION['id_tUser'] = $_SESSION['antiguaoValorCodPerfil'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tUser');
}
function Des(){
	$obj_tUser = new clstUser();
	$obj_tUser->recibirId($_POST["id_tUser"]);

	if($obj_tUser->desactivar()){
		$_SESSION["opActDes"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION['id_tUser']);
		unset($_SESSION['des_tusr']);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['id_tUser'] = $_SESSION['antiguaoValorCodPerfil'];
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tUser');
}

function PintaTuser($cod){
	$obj_tUser = new clstUser();
	$rs = $obj_tUser->consultarActivos();
	$selec = "";
	$c = 0;
	$combt_User[$c++] = "<select name='id_perfil' class='CampoMov' disabled='disabled'>";
	$combt_User[$c++] = "<option selected='selected'>SELECCIONE TIPO DE USUARIO</option>"; 

	while($tupla = $obj_tUser->converArray($rs)){
		$id_tUser = $tupla['idperfil'];
		$nom_tUser = $tupla['nom_perfil'];

		if($cod == $id_tUser){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combt_User[$c++] = "<option value='".$id_tUser."' ".$selec."> ".$nom_tUser."</option>";
	}
	$combt_User[$c++] = "</select>";
	return $combt_User;
}
//**********************************************************************************************//
?>
