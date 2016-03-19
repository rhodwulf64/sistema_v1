<?php error_reporting(1);
session_start(); // inicio de session
include_once("../../modelo/seguridad/m_usuario.php");
$obj_usuario = new usuario();
$obj_usuario->recibirCed( $_POST['usr'] ); // pasa el dato de usuario al objeto

function password_verify($pass1,$pass2){
	//print $pass1;
	return true;
}

	$tupla = $obj_usuario->consulta(); // consulta en la tabla de usuario utilizando el usuario
	if ( $tupla ) // se tiene un record set (encontro la tupla)
	{
		$rs = $obj_usuario->arreglo( $tupla ); // convierte el record set de la tupla en una arreglo
		if ( password_verify( $_POST['pas'], $rs['pass'] ) ) // verifica que la clave dada es igual a la encriptada
		{
			$rs_per = $obj_usuario->busca_persona( $rs['id_per'] ); // se busca los datos en la tabla persona 
			$tupla = $obj_usuario->busca_en_status( $rs['id_usuario'] ); // se busca los datos en la tabla status
			$rs_status = $obj_usuario->arreglo( $tupla ); // me traigo los datos en la tabla status
			if($rs['status_user'] == 1 || $rs['status_user'] == 2 || $rs['status_user'] == 3 && $rs_status["status"] == 'D' || $rs_status["status"] == 'N'){ // verifico el usuario se encuentre activado


				$_SESSION['cedula_login'] = $rs['login'];
				$_SESSION['statusTablaEstatus'] = $rs_status["status"];
				$_SESSION['id_usuario'] = $rs['id_usuario'];
				$_SESSION['id_persona'] = $rs['id_per'];
				$_SESSION['nom_perfil_login'] = $rs['nom_perfil'];
				$_SESSION['nom'] = $rs_per['nom_per'];  // se crea una variable de session  con el nombre de la persona
				$_SESSION['ape'] = $rs_per['ape_per'];
				$_SESSION['id_resdep'] = $rs_per['id_dep']; // departamento del usuario
				$_SESSION['telefono_log'] = $rs_per['tlf_per'];


				if( $_SESSION['statusTablaEstatus'] == "N"){
					$_SESSION['visDefaultTerminoAceptar'] = "MostrarVista";
				}

				/*********  Consultar Preguntas de seguridad *************/
				$tupla2 = $obj_usuario->consultarSoloPreguntas($_SESSION['id_usuario']);
				$rs2 = $obj_usuario->arreglo( $tupla2 );
				$_SESSION["preg1_log"] = $rs2['preg1'];
				$_SESSION["preg2_log"] = $rs2['preg2'];
				/**********************************************************/

				/************** consulto periodo ************/
				
				if($rs_periodo = $obj_usuario->consultarPeriodo()){
					$_SESSION["id_periodo_mostrar"] = $rs_periodo['id_periodo']; 
					$_SESSION["Nom_periodo_mostrar"] = $rs_periodo['nom_periodo'];
				}
				
				/**********************************************************/
				$_SESSION["cargar-img-Admin-inicio"] = "si"; //variable para imagen cargando

				$_SESSION['correo_electMuestra'] = $rs_per['email_per'];
				$_SESSION['nivel'] = $rs['id_perfil'];           // se crea una variable de session  con el nivel
				$_SESSION["HoraEntrada"] = date("Y-n-j H:i:s"); // se toma la hora de entrada

				/**** inserto en la tabla bitacora de acceso ****/
				$obj_usuario->InsertBitacAccess( $_SESSION['id_usuario'] );

				// validar que no tenga una sesion iniciada
				$sisionInitiality = $obj_usuario->consultarSesionIniciada( $_SESSION['id_usuario'] );
				if( $sisionInitiality == true ){
					// ya se encuentra una sesion iniciada
					$_SESSION["userSessionIniciada"] = "userSessionIniciada";
					//header("location: ../../index.php?accion=inicio");
				}else{
					$_SESSION["userSessionIniciada"] = "";
					$_SESSION["res"] = "logAdmin";
					// inserto sesion 
					$obj_usuario->UpdateSessionIniciada($rs['id_usuario']);
				}


				switch( $_SESSION['nivel'] ){ // segun el nivel de usuario se abre la pagina que le corresponde

					case 1: 
						$f_h = $obj_usuario->traerUltimaVisita($_SESSION['id_usuario']);
						$_SESSION["u_hora"] =  $f_h["hora_logeo"];
						// primero ejecuto la funcion para traer la ultima visita
						$_SESSION["u_fecha"] =  $obj_usuario->TraerFechaDeBD($f_h["fecha_logeo"]);
						// luego modifico por la hora y fecha de logueo
						$obj_usuario->registrarUltimaVisita($_SESSION['id_usuario']);
						
						header("Location: ../../vista/protegidas/v_Perfil_Admin.php"); break;
					case 2: 
						$f_h = $obj_usuario->traerUltimaVisita($_SESSION['id_usuario']);
						$_SESSION["u_hora"] =  $f_h["hora_logeo"];
						// primero ejecuto la funcion para traer la ultima visita
						$_SESSION["u_fecha"] =  $obj_usuario->TraerFechaDeBD($f_h["fecha_logeo"]);
						// luego modifico por la hora y fecha de logueo
						$obj_usuario->registrarUltimaVisita($_SESSION['id_usuario']);
						header("Location: ../../vista/protegidas/v_Perfil_Admin.php"); break;
					case 3: 
						$f_h = $obj_usuario->traerUltimaVisita($_SESSION['id_usuario']);
						$_SESSION["u_hora"] =  $f_h["hora_logeo"];
						// primero ejecuto la funcion para traer la ultima visita
						$_SESSION["u_fecha"] =  $obj_usuario->TraerFechaDeBD($f_h["fecha_logeo"]);
						// luego modifico por la hora y fecha de logueo
						$obj_usuario->registrarUltimaVisita($_SESSION['id_usuario']);
						header("Location: ../../vista/protegidas/v_Perfil_Admin.php"); break;
					
				}
			}else{
				$_SESSION["resIndex"] = "userDes";
				header("location: ../../index.php?accion=inicio");
			}
		}else{ // no corresponde la clave
			// inserto 1 intento a la ves en la tabla sistema
			$intentos = $obj_usuario->insertarIntentos($rs['id_usuario']);

			$_SESSION["contador_int"] = $intentos["intentos"];

			if($_SESSION["contador_int"] >= 3){
				$obj_usuario->BloquearUsuario("MAXIMO DE INTENTOS FALLIDOS CLAVE",$rs['id_usuario']);
				unset($_SESSION["contador_int"]);
				$_SESSION["resIndex"] = "userDes";
				header("location: ../../index.php?accion=inicio");
			}else{
				$_SESSION["resIndex"] = "errorAccess";
				header("location: ../../index.php?accion=inicio");
			}
		}
	}
	else{// no existe el usuario
		$_SESSION["resIndex"] = "errorAccessTerceros";
		header("location: ../../index.php?accion=inicio");
	}
?>