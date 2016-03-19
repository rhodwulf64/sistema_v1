
<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
?>

<span id="spanAsigUser">

<table id="formulario_estilo_individual1">
	<form method="POST" name="envio_form" action="../../control/seguridad/c_usuario.php" id="formulario_estilo">
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>
				<span id="frm-perfil-titulo">Asignar Usuario <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-asignarusuario ayuda-local-frm ayudaguiada2-tour"></span> </span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="ausuario-tour">
				<input type="hidden" name="id_user_usu" value="<?php if(isset($_SESSION['id_user_user'])) echo $_SESSION['id_user_user']; ?>">
				<input type="hidden" name="id_per_usu" value="<?php if(isset($_SESSION['id_per_user'])) echo $_SESSION['id_per_user']; ?>">
				<label for="login">Usuario:<span class="asterisco">*</span></label><br>
				<input type="hidden" name="login_ced" value="<?php if(isset($_SESSION['ced_per_user'])) echo $_SESSION['ced_per_user']; ?>" >
				<input type="text" class='CampoMov' readonly="readonly" placeholder="Su Usuario es su Cédula" name="login" id="login" value="<?php if(isset($_SESSION['id_per_user'])) echo 'CI. '.$_SESSION['ced_per_user'].' - '.$_SESSION['nom_per_user'].' '.$_SESSION['ape_per_user']; ?>"> 
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="atipousuario-tour">
				<label for="niv">Tipo de Usuario:<span class="asterisco">*</span></label><br>
				<?php
					include_once('../../control/seguridad/c_tUser.php');
					$combtUser = array();
				    $codigo  = "";
					if(isset($_SESSION['idperfil'])){
						$codigo = $_SESSION['idperfil'];
					}
					$combtUser = PintaTuser($codigo);
							
					foreach ($combtUser as $elemento){
						echo $elemento;
					}
				?>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr id="botonera" class="botonera-tour">
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td align="center">
				<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION['res'])) echo $_SESSION['res']; ?>">
				<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION['opActDes'])) echo $_SESSION['opActDes']; ?>">
				<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION['tipoMod'])) echo $_SESSION['tipoMod']; ?>">
				<input type="hidden" name="idced" value="<?php if(isset($_SESSION['idced'])) echo $_SESSION['idced']; ?>">
				<input type="hidden" name="actpass">
				<input type="hidden" name="modificar">
				<input type="hidden" name="temp">
				<input type="hidden" name="op">
				<input type="hidden" name="consultarOculto" value="<?php if(isset($_SESSION['consultarOculto'])) echo 'datos'; ?>">
				<input type="hidden" name="CancelarOculto" value="<?php if(isset($_SESSION['CancelarOculto'])) echo 'datos'; ?>">
				<input type="hidden" name="IncluirOculto" value="<?php if(isset($_SESSION['IncluirOculto'])) echo 'datos'; ?>">
				
				<!-- Incluyo la botonera -->
				<button type="button"  class="botoneranuevo-tour" title="Clic para asignar un usuario" name="inc" value="Incluir" onclick="Listar1();quitarAsterisco();"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
				<button type="button"  class="botoneraconsultar-tour" title="Clic para consultar un usuario" value="Consultar" name="bus" onclick="Listar2();quitarAsterisco2();" ><span id="iconos" class="icon-search"></span>Consultar</button>
				<button type="button"  class="botoneraguardar-tour" title="Clic para Guardar un usuario" value="Grabar" name="grab" onclick="General_Usuario(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
				<button type="button"  class="botoneramodificar-tour" value="Modificar" name="mod" onclick="General_Usuario(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
				<button type="button"  class="botoneraactivar-tour" value="" name="sta" onclick="General_Usuario(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para activar el usuario">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar el usuario">Desactivar</span></button>		
				<button type="button"  class="botoneracancelar-tour" title="Clic Cancelar la operación" value="Cancelar" name="cancel" onclick="General_Usuario(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
				<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
					
				<script>

				var frm = document.envio_form;

				if(frm.consultarOculto.value!=""){
					Encontrado_si();
					frm.login.style.cursor = "not-allowed";
					frm.id_perfil.style.cursor = "not-allowed";
				
					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
						}else{
							frm.mod.disabled = true;
							frm.mod.style.background = "#ccc";
							frm.mod.style.color = "#666666";
							frm.sta.value = "Activar";
							document.getElementById('des').style.display = "none";
							document.getElementById('iconos-2').style.display = "none";
							document.getElementById('act').style.display = "inline-block";
							document.getElementById('iconos-1').style.display = "inline-block";
						}
					}else{
						frm.sta.value = "Desactivar";
						document.getElementById('act').style.display = "none";
						document.getElementById('iconos-1').style.display = "none";
					}
					document.getElementById("spanAsigUser").style.display = "block";
					document.getElementById("spanDesbloq").style.display = "none";
					document.getElementById("spanBloq").style.display = "none";
				// }else if(frm.NoEncon.value == "NO"){
				// 	consultar();
				// 	rm.login.style.cursor = "not-allowed";
				// 	frm.id_perfil.style.cursor = "not-allowed";
				// 	frm.nom_est.readOnly = false;
				// 	frm.nom_est.style.border = "1px solid #0F0FA6";	
				// 	frm.nom_est.style.cursor = "pointer";
				// 	frm.nom_est.focus();
				
				// 	document.getElementById('act').style.display = "none";
				// 	document.getElementById('iconos-1').style.display = "none";
				}else if(frm.IncluirOculto.value !=""){
					Act();
					frm.id_perfil.style.cursor = "pointer";
					frm.login.style.cursor = "not-allowed";
					frm.id_perfil.disabled = false;
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";

					/************ activar los módulos correspondientes ***********/
					document.getElementById("spanAsigUser").style.display = "block";
					document.getElementById("spanDesbloq").style.display = "none";
					document.getElementById("spanBloq").style.display = "none";
				}else{
					Inicio_Deafault();
					frm.login.style.cursor = "not-allowed";
					frm.id_perfil.style.cursor = "not-allowed";
					
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";

				}
				if(frm.CancelarOculto.value !=""){
					/************ activar los módulos correspondientes ***********/
					document.getElementById("spanAsigUser").style.display = "block";
					document.getElementById("spanDesbloq").style.display = "none";
					document.getElementById("spanBloq").style.display = "none";
				}
				function quitarAsterisco(){
					document.getElementById('msj').style.display = "none";
				}
				function colocarAsterisco(){
					document.getElementById('msj').style.display = "block";
				}
				function quitarAsterisco2(){
					document.getElementById('msj').style.display = "none";
				}
				function colocarAsterisco2(){
					document.getElementById('msj').style.display = "block";
				}
				</script>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
	</form>
</table>

	<?php if(isset($_SESSION["CancelarOculto"])) unset($_SESSION["CancelarOculto"]);?>

<br>		

<!-- Modal para nuevo usuario 		 -->
<?php include_once("../consultaModal/v_modal_Usuario_Personal.php"); ?> 
<!-- Modal para Consultar usuario  -->
<?php include_once("../consultaModal/v_modal_usuario.php"); ?> 

<!-- incluyo el mensajde de que los campos son obligatorios -->
<table class="msj-asterisco">
	<tr>
		<td> 
			<span class="msj" id="msj">Los campos con <span class="asterisco-1">*</span>son obligatorios<span>
		</td>
	</tr>
</table>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra asignar un usuario a un trabajor previamente registrado en el formulario Personal<br>
			El boton "Consultar" permite ver las personas a las que se a asignado un usario hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Usuario. </p>
		</td>
	</tr>
</table>
</span>

<?php
	}
	else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}
else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}
?>