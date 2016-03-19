<?php
	session_start();
	include_once("../../modelo/seguridad/m_usuario.php");

	session_start(); // inicio de session 
	if (isset($_SESSION['nivel'])) { // existe y esta la variable de session nivel
		if( isset($_SESSION['visAceptoTerminosAceptados']) && $_SESSION['visAceptoTerminosAceptados'] != ""){
			unset($_SESSION['visAceptoTerminosAceptados']);
		}

		/** agregoro hora y fecha de cierre de sesion para la bitacora de acceso **/
		$obj_usuario = new usuario();
		$obj_usuario->UpdateFechaHoraCierreSession( $_SESSION['id_usuario'] );

		unset($_SESSION['nom']);  // libera la variable de session quien
		unset($_SESSION['ape']);
		unset($_SESSION['nivel']);
		unset($_SESSION["HoraEntrada"]);  // libera la variable de session quien
		unset($_SESSION["userSessionIniciada"]);
		unset($_SESSION["id_periodo_mostrar"]);
		unset($_SESSION["Nom_periodo_mostrar"]);
		$_SESSION["cargar-img-Admin-cierre"] = "si";
		header("location: ../../index.php?accion=inicio"); // direcciona a la pagina de inicio
		//session_destroy();
	}else{  // trata de entrar sin autenticar
		echo "<h2>se tiene que identificar</h2>";
		echo "<input type='button' value='Volver al Home' onClick=\"location.href='../../index.php?accion=inicio'\">";
	}
?>
