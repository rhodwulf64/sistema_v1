<?php
	
	session_start(); // inicio de session
	include_once("../../modelo/seguridad/m_usuario.php");
	
	$op = $_POST["hacer"];

	switch($op){
		case 'opeBusUser': Bus(); break;
		case 'opeResp1': Pre1(); break;
		case 'opeResp2': Pre2(); break;
		case 'CambioClave': NPass(); break;
	}

	function NPass(){
		$obj_usr = new usuario();
		$obj_usr->recibirModClave($_SESSION["idUserActu"],$_POST['pass1'],$_POST['pass1']);		


		//validaciones de clave cliente


		/*if(  ){


		}else{*/
			$obj_usr->modificarClave();

			//reseteo campos de intentos
			$obj_usr->ReseteroIntentosPreguntas($_SESSION["idUserActu"]);
			echo "claveModificada";
	/*	}*/
	}

	function Pre2(){
		$obj_usr = new usuario();
		$obj_usr->recibirTodos($_POST['res']);
		if( $obj_usr->validarRespuesta2($_SESSION["idUserActu"]) ){
			$SegundaPregunta =
			'	<table id="acceso2">
					<caption><span class="icon-users"></span> ¿Olvidó su Clave? <span id="regresar" title="clic para regresar al formulario de acceso" onclick="Intranet()" class="icon-cross"></span></caption>
					<form action="" method="POST" name="frm_envioBusUser" id="frm_envioBusUser" >
						<tr>
							<td><br>
								<span>'.$_SESSION['nom_perIndex'].' '.$_SESSION['ape_perIndex'].'<br><br>
								Nueva Clave:<br><span class="icon-key"></span><input type="password" onpaste="return false" oncontextmenu="return false"  maxlength="30"  onkeypress="" class="usr" id="pass1" name="pass1" placeholder="INGRESE CLAVE NUEVA " /><br><br>
								Confirme Nueva Clave:<br><span class="icon-key"></span><input type="password" onpaste="return false" oncontextmenu="return false" maxlength="30"  onkeypress="" class="usr" id="pass2" name="pass1" placeholder="INGRESE CLAVE NUEVA  " />
							</td>
						</tr>
						<tr  id="botonera">
							<td ><br><br>
								<input type="button" title="clic para continuar" class="bt-principal" value="Continuar" onclick="GuardarClave()" />
								<input type="button" title="clic pala limpiar el campo de usuario" id="cancelP1" onClick="limpiarfrm3()" value="Cancelar" />			
								<br><br>
							</td>
						</tr> 
					</form>
				</table>
			';
			$obj_usr->LimpiarPreguntasSecurity2($_SESSION["idUserActu"]);
			echo $SegundaPregunta;
		}else{

			// inserto 1 intento a la ves en la tabla sistema
			$intentos = $obj_usr->insertarIntentosSeguridad2($_SESSION["idUserActu"]);

			//$_SESSION["contador_int_preg1"] = $intentos["intentos"];

			if( $intentos["intentos_preg2"] >= 3){

				if( $obj_usr->ValidarInsercionBloqueo($_SESSION["idUserActu"]) ){
					echo "UsuarioBloqPreg1";
				}else{
					$obj_usr->BloquearUsuario("MAXIMO DE INTENTOS FALLIDOS PREGUNTA DE SEGURIDAD",$_SESSION["idUserActu"]);
					echo "BloqueadoNuevo";
				}
			}else{
				echo "fallo";
			}
		}
	}

	function Pre1(){
		$obj_usr = new usuario();
		$obj_usr->recibirTodos($_POST['res']);
		if( $obj_usr->validarRespuesta1($_SESSION["idUserActu"]) ){
			$SegundaPregunta =
			'	<table id="acceso2">
					<caption><span class="icon-users"></span> ¿Olvidó su Clave? <span id="regresar" title="clic para regresar al formulario de acceso" onclick="Intranet()" class="icon-cross"></span></caption>
					<form action="" method="POST" name="frm_envioBusUser" id="frm_envioBusUser" >
						<tr>
							<td><br>
								<span>'.$_SESSION['nom_perIndex'].' '.$_SESSION['ape_perIndex'].'<br><br>
								¿'.$_SESSION["preg2_perIndex"].'? <br><br>
								&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon-key"></span><input type="password" onpaste="return false" oncontextmenu="return false"  maxlength="12"  onkeypress="" class="usr" id="Resp2" name="Resp2" placeholder="INGRESE RESPUESTA " />
							</td>
						</tr>
						<tr  id="botonera">
							<td ><br><br>
								<input type="button" title="clic para continuar" class="bt-principal" value="Continuar" onclick="Pregunt2()" />
								<input type="button" title="clic pala limpiar el campo de usuario" id="cancelP1" onClick="limpiarPre2()" value="Cancelar" />			
								<br><br>
							</td>
						</tr> 
					</form>
				</table>
			';
			// limpio los intentos de la pregunta 1
			$obj_usr->LimpiarPreguntasSecurity1($_SESSION["idUserActu"]);
			echo $SegundaPregunta;
		}else{

			// inserto 1 intento a la ves en la tabla sistema
			$intentos = $obj_usr->insertarIntentosSeguridad1($_SESSION["idUserActu"]);

			//$_SESSION["contador_int_preg1"] = $intentos["intentos"];

			if( $intentos["intentos_preg1"] >= 3){

				if( $obj_usr->ValidarInsercionBloqueo($_SESSION["idUserActu"]) ){
					echo "UsuarioBloqPreg1";
				}else{
					$obj_usr->BloquearUsuario("MAXIMO DE INTENTOS FALLIDOS PREGUNTA DE SEGURIDAD",$_SESSION["idUserActu"]);
					echo "BloqueadoNuevo";
				}
			}else{
				echo "fallo";
			}
		}
	}
	function Bus(){
		$obj_usr = new usuario();
		$obj_usr->recibirTodos($_POST["usr"]);
		if( $rs = $obj_usr->obj_usrIndex() ){

			$rs_DatosUser = $obj_usr->buscarPrimeraSecurity($rs["id_usuario"],$_POST["usr"]);
			//$_SESSION["HoraEntrada"] = date("Y-n-j H:i:s"); // creo hora
			$_SESSION["idUserActu"] = $rs["id_usuario"];
			$_SESSION["preg2_perIndex"] = $rs_DatosUser["preg2"];
			$_SESSION["nom_perIndex"] = $rs_DatosUser["nom_per"];
			$_SESSION["ape_perIndex"] = $rs_DatosUser["ape_per"];

			/*$datos = 
			'	<span>Usuario: '.$rs_DatosUser['nom_per'].' '.$rs_DatosUser['ape_per'].'<br><br>
				¿'.$rs_DatosUser['preg1'].'?
				</span>
				<input type="hidden" name="pantalla" value="'.$_SESSION["pantalla"].'" >
			';
			echo $datos;*/

			if( $obj_usr->ValidarInsercionBloqueo($_SESSION["idUserActu"]) ){
				echo "UsuarioBloqPreg1";
			}else{
				$primeraPregunta =
				'	<table id="acceso2">
						<caption><span class="icon-users"></span> ¿Olvidó su Clave? <span id="regresar" title="clic para regresar al formulario de acceso" onclick="Intranet()" class="icon-cross"></span></caption>
						<form action="control/seguridad/c_ProcessRecClave.php" method="POST" name="frm_envioBusUser" id="frm_envioBusUser" >
							<tr>
								<td><br>
									<span>'.$rs_DatosUser['nom_per'].' '.$rs_DatosUser['ape_per'].'<br><br>
									¿'.$rs_DatosUser['preg1'].'? <br><br>
									&nbsp;&nbsp;&nbsp;&nbsp;<span class="icon-key"></span><input type="password" onpaste="return false" oncontextmenu="return false"  maxlength="12"  onkeypress="" class="usr" id="Resp1" name="Resp1" placeholder="INGRESE RESPUESTA DE SEGURIDAD" />
								</td>
							</tr>
							<tr  id="botonera">
								<td ><br><br>
									<input type="button" title="clic para continuar" class="bt-principal" value="Continuar" onclick="Pregunt1()" />
									<input type="button" title="clic pala limpiar el campo de usuario" id="cancelP1" onClick="limpiarPre1()" value="Cancelar" />			
									<br><br>
								</td>
							</tr> 
						</form>
					</table>
				';
				echo $primeraPregunta;
			}

			//$_SESSION["respuesta"] = "noEncon";
				//header("location: ../vista/busUsr.php");
			//	echo "vis1"; 
	
		}else{
			echo "UserNoEncontrado";
		}

	}


?>