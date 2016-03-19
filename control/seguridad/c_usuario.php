<?php error_reporting(0); 

session_start();
include_once("../../modelo/seguridad/m_usuario.php");

if(isset($_POST['tempUser'])){
	@$op = $_POST['tempUser'];
}else if(isset($_POST['tempPer'])){
	@$op = $_POST['tempPer'];
}else{
	@$op = $_POST['temp'];
}

 switch ($op) {
	case "Incluir":	Inc();break;
	case "Modificar": Mod(); break;
	case "Consultar": Cons();break;
	case "ConsultarPararIncluir": Cons_Para_Incluir(); break;
	case "bus_ind": busCed(); break;
	case "Activar": Act();break;
	case "ModClaIntranet": modificar_clave_intranet(); break;
	case "ModPregIntranet": modificar_preguntas_security_intranet(); break;
	case "ModCorreoIntranet": modificar_correo_intranet(); break;
	case "ModtlfIntranet": modificar_tlf_intranet(); break;
	case "BloqUsrIntranet": Bloq_Usr_Intranet(); break;
	case "DesbloqUsrIntranet": Desb_Usr_Intranet(); break;
	case "Desactivar": Des();break;
	case "frm_terminosYCondiciones": terminosYCondiciones(); break;
	case "frm_terminosYCondicionesRegresar": terminosYCondicionesDestruir(); break;
	case "actualizarDatosPrimeraVez": actualizarDatosPrimeraVez(); break;
	case "validarClaveIntranet": validarClaveIntranet(); break;
	case "validarClaveNueva": ValidarClave_user(); break;
	case "Cancelar":
	/**************/
	unset($_SESSION['id_per_user']);
	unset($_SESSION['ced_per_user']);
	unset($_SESSION['nom_per_user']);
	unset($_SESSION['ape_per_user']);
	unset($_SESSION['idperfil']);
	unset($_SESSION['IncluirOculto']);
	unset($_SESSION['consultarOculto']);
	$_SESSION["CancelarOculto"] = "datos";
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios');break;
	default:
		echo 'No entiendo que dices';
		break;
 } //cierre switch

function actualizarDatosPrimeraVez(){
	$obj_usuario = new usuario();
	$obj_usuario->recibirTodos($_POST);
   	$obj_usuario->UPDATEPRIMERAVEZ();

   	//$_SESSION['res'] = "datosPrimeraVeZModExitoso";
   	echo "listo";
}
function terminosYCondiciones(){
 	$_SESSION['visAceptoTerminosAceptados'] = "visAceptoTerminos";
 	unset($_SESSION['visDefaultTerminoAceptar']);
 	echo "entro";
}
function terminosYCondicionesDestruir(){
	$_SESSION['visDefaultTerminoAceptar'] = "MostrarVista";
 	unset($_SESSION['visAceptoTerminosAceptados']);
 	echo "entro";
}
function Inc(){
    $obj_usuario = new usuario();
	$obj_usuario->recibirCedPerf($_POST['id_per_usu'],$_POST['login_ced'],$_POST['id_perfil']);
   	$obj_usuario->incluir();
	$_SESSION['res'] = "registrado";
	unset($_SESSION['id_per_user']);
	unset($_SESSION['ced_per_user']);
	unset($_SESSION['nom_per_user']);
	unset($_SESSION['ape_per_user']);
	unset($_SESSION['IncluirOculto']);
	$_SESSION["CancelarOculto"] = "datos";
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios");
}
function Mod(){
	$obj_usuario = new usuario();
	$obj_usuario->recibirUsuarioPerfil($_POST['id_user_usu'],$_POST['id_perfil']);
	$obj_usuario->modificar();
	// $rs2=$obj_mun->bus_est();
	// $tupla2=$obj_mun->converArray($rs2);
	// $_SESSION['cod_mun']=$tupla['id_mun'];
	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	// $_SESSION['cod_est_m']=$tupla['id_est'];
	unset($_SESSION['id_user_user']);
	unset($_SESSION['id_per_user']);
	unset($_SESSION['ced_per_user']);
	unset($_SESSION['nom_per_user']);
	unset($_SESSION['ape_per_user']);
	unset($_SESSION['idperfil']);
	unset($_SESSION['consultarOculto']);

	$_SESSION['CancelarOculto'] = "datos";
	$_SESSION['res'] = "mod";

	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios");
}
function Cons_Para_Incluir(){
	$resultado = explode(".", $_POST['ident2']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_usuario = new usuario();
	$obj_usuario->recibirIdents($resultado[0]);
	$rs = $obj_usuario->consultarPorIdents();
	$tupla = $obj_usuario->arreglo($rs);

	$_SESSION['id_per_user']=$tupla['id_per'];
	$_SESSION['ced_per_user']=$tupla['ced_per'];
	$_SESSION['nom_per_user']=$tupla['nom_per'];
	$_SESSION['ape_per_user']=$tupla['ape_per'];
	$_SESSION['IncluirOculto'] = "datos";
	unset($_SESSION["consultarOculto"]);

	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios");
}
function Cons(){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_usuario = new usuario();
	$obj_usuario->recibirIdents($resultado[0]);
	$rs = $obj_usuario->consultarPorIdentsUser();
	$tupla = $obj_usuario->arreglo($rs);

	if($tupla['status_user'] == 1){
	 	$_SESSION["opActDes"] = "act";
	}else{
	 	$_SESSION["opActDes"] = "des";
	}

	$_SESSION['id_user_user'] = $tupla["id_usuario"];
	$_SESSION['id_per_user'] = $tupla["id_per"];
	$_SESSION['ced_per_user'] = $tupla["login"];
	$_SESSION['nom_per_user'] = $tupla["nom_per"];
	$_SESSION['ape_per_user'] = $tupla["ape_per"];
	$_SESSION['idperfil'] = $tupla["id_perfil"]; //perfil
	$_SESSION['consultarOculto'] = "datos";
	
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios");
}
function Act(){
	$obj_usuario = new usuario();
	$obj_usuario->recibirIdents($_POST['id_user_usu']);
	$obj_usuario->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDes"] = "act";
	//$_SESSION['id_user_user'] = $_SESSION['antiguaoValorCodEst'];
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios");
}
function Des(){
	$obj_usuario = new usuario();
	$obj_usuario->recibirIdents($_POST['id_user_usu']);
	$obj_usuario->desactivar();

	$_SESSION["opActDes"] = "des";
	$_SESSION['res'] = "des";
	$_SESSION["CancelarOculto"] = "datos";

	unset($_SESSION['id_per_user']);
	unset($_SESSION['ced_per_user']);
	unset($_SESSION['nom_per_user']);
	unset($_SESSION['ape_per_user']);
	unset($_SESSION['idperfil']);
	unset($_SESSION['IncluirOculto']);
	unset($_SESSION['consultarOculto']);
	
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios");
}

function validarClaveIntranet(){
	$obj_usuario = new usuario();
	$obj_usuario->recibirModClave($_SESSION["id_usuario"],$_POST['clave'],"indefinida");
	$rs = $obj_usuario->consultarClave();
	$tupla = $obj_usuario->arreglo($rs);
	if ( password_verify( $_POST['clave'], $tupla['pass'] ) ) {
		echo 1;
	}else{
		//$_SESSION["res"] = "UserIncorrerIntranet";
		echo 0;
	}
}

function modificar_clave_intranet(){
	$obj_usuario = new usuario();
	$obj_usuario->recibirModClave($_SESSION["id_usuario"],$_POST['clave'],$_POST['clave_nueva']);
	$rs = $obj_usuario->consultarClave();
	$tupla = $obj_usuario->arreglo($rs);
	if ( password_verify( $_POST['clave'], $tupla['pass'] ) ) {

		if ( password_verify( $_POST['clave_nueva'], $tupla['pass'] ) ) {
			//$_SESSION["res"] = "NoClaveIgualIntra"; 
			echo 1; //la clave no puede ser igual a la acutual
		}else if ( password_verify( $_POST['clave_nueva'], $tupla['pass_anterior'] ) ) {
			echo 2; // la clave no puede ser igual a la anterior
			//$_SESSION["res"] = "NoClaveIgualAntIntra"; 
		}else{
			$obj_usuario->modificarClave();
			echo 3; // clave modificada
			//$_SESSION["res"] = "ClaveModificada"; 
		}
		
	}else{
		$_SESSION["res"] = "UserIncorrerIntranet";
	}

	//$_SESSION["OcultoPintar"] = "datos";
	//header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=Perfil");
}
function modificar_preguntas_security_intranet(){
	$obj_usuario = new usuario();
	$obj_usuario->idPOST($_SESSION["id_usuario"],$_POST);
	$rs = $obj_usuario->consultSoloClave2($_SESSION["id_usuario"]);

	$tupla = $obj_usuario->arreglo($rs);
	if ( password_verify( $_POST['c_user'], $tupla['pass'] ) ) {

		$obj_usuario->modificarPreguntas();
		$_SESSION["res"] = "PregModificada";
		$_SESSION["preg1_log"] = $_POST["preg1"];
		$_SESSION["preg2_log"] = $_POST["preg2"];
	
	}else{
		$_SESSION["res"] = "UserIncorrerIntranet";
	}

	$_SESSION["OcultoPintar2"] = "datos";
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=Perfil");
}
function modificar_correo_intranet(){
	$obj_usuario = new usuario();
	$obj_usuario->idPOST($_SESSION["id_persona"],$_POST);
	$rs = $obj_usuario->consultSoloClave2($_SESSION["id_usuario"]);
	
	$tupla = $obj_usuario->arreglo($rs);
	if ( password_verify( $_POST['c_user2'], $tupla['pass'] ) ) {

		$obj_usuario->modificarCorreo();
		$_SESSION["res"] = "CorreoModificada";
		$_SESSION["correo_electMuestra"] = $_POST["correo_elect"];
	
	}else{
		$_SESSION["res"] = "UserIncorrerIntranet";
	}

	$_SESSION["OcultoPintar3"] = "datos";
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=Perfil");
}
function modificar_tlf_intranet(){
	$obj_usuario = new usuario();
	$obj_usuario->idPOST($_SESSION["id_persona"],$_POST);
	$rs = $obj_usuario->consultSoloClave2($_SESSION["id_usuario"]);
	
	$tupla = $obj_usuario->arreglo($rs);
	if ( password_verify( $_POST['c_user3'], $tupla['pass'] ) ) {

		$obj_usuario->modificarTelefono();
		$_SESSION["res"] = "TelfModificada";
		$_SESSION["telefono_log"] = $_POST["telefono_ed"];
	
	}else{
		$_SESSION["res"] = "UserIncorrerIntranet";
	}

	$_SESSION["OcultoPintar4"] = "datos";
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=Perfil");
}
function Bloq_Usr_Intranet(){
	$resultado = explode(".", $_POST['ident3']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_usuario = new usuario();
	$obj_usuario->recibirIdents($resultado[0]);
	$obj_usuario->BloquearUsr($_POST["motivo$resultado[1]"]);

	// $_SESSION['id_user_user'] = $tupla["id_usuario"];
	// $_SESSION['id_per_user'] = $tupla["id_per"];
	// $_SESSION['ced_per_user'] = $tupla["login"];
	// $_SESSION['nom_per_user'] = $tupla["nom_per"];
	// $_SESSION['ape_per_user'] = $tupla["ape_per"];
	// $_SESSION['idperfil'] = $tupla["id_perfil"]; //perfil
	$_SESSION['HiddenModadlBloquear'] = "datos";
	$_SESSION['res'] = "userBloqueado";

	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios");	
}

function Desb_Usr_Intranet(){
	$resultado = explode(".", $_POST['ident4']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_usuario = new usuario();
	$obj_usuario->recibirIdents($resultado[0]);
	$obj_usuario->DesbloquearUsr();

	// $_SESSION['id_user_user'] = $tupla["id_usuario"];
	// $_SESSION['id_per_user'] = $tupla["id_per"];
	// $_SESSION['ced_per_user'] = $tupla["login"];
	// $_SESSION['nom_per_user'] = $tupla["nom_per"];
	// $_SESSION['ape_per_user'] = $tupla["ape_per"];
	// $_SESSION['idperfil'] = $tupla["id_perfil"]; //perfil
	$_SESSION['HiddenModadlDesBloquear'] = "datos";
	$_SESSION['res'] = "userDesBloqueado";

	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=menu_usuarios");	
}

function ValidarClave_user(){
	$obj_usuario = new usuario(); //creo mi objeto

	/*if( $obj_usuario->validarClave_user($_POST['claveN'])){
		echo 1; //el codigo ya esta en la base de datos
	}else{ 
		echo 2; // el codigo no esta en la base de datos asi que puedes continuar
	}*/
	$obj_usuario->idPOST($_SESSION["id_usuario"],$_POST);
	$rs = $obj_usuario->consultarClave();
	$tupla = $obj_usuario->arreglo($rs);
	if ( password_verify( $_POST['claveN'], $tupla['pass'] ) ) {
			//$_SESSION["res"] = "NoClaveIgualIntra"; 
		echo 1; //la clave no puede ser igual a la acutual
	}else{
		echo 2; //no es igual y pudede modificar
	}
}

?>