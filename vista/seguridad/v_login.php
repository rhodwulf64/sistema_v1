<table id="acceso" >
	<caption><span class="icon-users"></span> Acceso a Intranet CICPC</caption>
	<form action="control/seguridad/c_login.php" method="POST" name="envio_form" id="form_acceso" autocomplete="off">
		<tr>
			<td class="MensajesAyuda">
				<label class="clr-acceso" for="usr">&nbsp;&nbsp;Usuario: </label><br>
				<span class="icon-user"></span><input onblur="validarUser()" onkeyup="quitarValidacion()" type="text" onpaste="return false" oncontextmenu="return false"  maxlength="12"  onkeypress="return SoloNumeros(event)" onkeydown="limpiarUsr()" class="usr" id="usr" name="usr" placeholder="Ingrese su Usuario" />
				<span id="nube" class="nube" style="">Solo se permiten Números</span>
			</td>
		</tr>
		<tr>
			<td>
				<label class="clr-acceso" for="pas">&nbsp;&nbsp;Clave: </label><br>
				<span class="icon-lock"></span><input type="password" onkeydown="limpiarPass()" onblur="validarPass()" onkeypress="if (event.keyCode == 13) Control_acceso_Intranet('Acceder')" onpaste="return false" oncontextmenu="return false" maxlength="30"  class="pas" id="pas" name="pas" placeholder="Ingrese su Clave" />
				<br>
			</td>
		</tr>
		<tr id="botonera">
			<td >
				<input type="hidden" name="ocultaVista" id="ocultaVista">
				<input type="hidden" name="ope" />
				<input type="button" title="click para acceder al sistema" class="bt-principal" value="Acceder" onclick="Control_acceso_Intranet(this.value)" />
				<input type="reset"  title="click pala limpiar los campos de usuario y clave" value="Cancelar" /><br><br>
				<a id="recuperar-clave" onclick="recuperarClave()" style="color:#023859;" title="click para iniciar el proceso de recuperación de clave">¿Olvidó su Clave?</a>
				<br><br>
			</td>
		</tr>
	</form>
</table>

<!-- ****************************************** Recuperar Clave ********************************* -->
	<?php include_once("v_recuperarClave.php"); 

	// if(){

	// }


	?>
<!-- ******************************** fin recuperacion de clave *************************** -->
<script>
if(document.getElementById("acceso").style.display != "none"){
	Intranet();
}else{
	recuperarClave();
}
function recuperarClave(){
	var userr = $("#usr").val("");
	var passs = $("#pas").val("");
	document.getElementById("acceso").style.display = "none";
	document.getElementById("acceso2").style.display = "block";
}

function Intranet(){
	var tablaBucar ='<table id="acceso2"> <caption><span class="icon-users"></span> ¿Olvidó su Clave? <span id="regresar" title="clic para regresar al formulario de acceso" onclick="Intranet()" class="icon-arrow-left2"></span></caption> <form action="control/seguridad/c_ProcessRecClave.php" method="POST" name="frm_envioBusUser" id="frm_envioBusUser" ><tr><td><br><label class="clr-acceso" for="BusUser">&nbsp;&nbsp;Usuario: </label><br><span class="icon-user"></span><input type="text"  onpaste="return false" oncontextmenu="return false"  maxlength="12"  onkeypress="return SoloNumeros(event);" class="usr" id="BusUser" name="usr" placeholder="Ingrese su Usuario" /></td></tr><tr  id="botonera"><td ><input type="button" title="clic para consultar usuario" class="bt-principal" value="Buscar" onclick="BuscarUser()" />&nbsp;<input type="reset"  title="clic pala limpiar el campo de usuario" value="Cancelar" /><br><br></td></tr> </form></table>';
	var passs = $("#BusUser").val("");
	$("#acceso2").html(tablaBucar);
	document.getElementById("acceso").style.display = "block";
	document.getElementById("acceso2").style.display = "none";
}

</script>

<table id="verificar-datos-table">
	<tr>
		<td>
			<?php 
				if(isset($_SESSION["resIndex"])){
					if($_SESSION["resIndex"] == "errorAccess"){
						// echo "<div class='verificar-datos'><span id='verificar-datos'>Verifique sus Datos. Usuario y/o Clave Incorrecto, Intento.".$_SESSION["contador_int"]."/3 al 3 intento fallido será suspendido</span><div>";	
						echo "<div class='verificar-datos'><span id='verificar-datos'>Verifique sus Datos. Usuario y/o Clave Incorrecto.</span><div>";	
					}else if( $_SESSION["resIndex"] == "userDes"){
						echo "<div class='verificar-datos'><span id='verificar-datos'>El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.</span><div>";
					}else if($_SESSION["resIndex"] == "errorAccessTerceros"){
						echo "<div class='verificar-datos'><span id='verificar-datos'>Verifique sus Datos. Usuario y/o Clave Incorrecto</span><div>";	
					}else if($_SESSION['resIndex'] == "sesionFinalizadaGraciasAOtra"){
						echo "<div class='verificar-datos'><span id='verificar-datos'>Disculpe, su sesion fue cerrada ya que se ha iniciado desde otro lugar, si cree que su cuenta esta en peligro hable con el administrador del sistema.</span><div>";	
					}
					unset($_SESSION["resIndex"]);
				}
			?>
		</td>
	</tr>
</table>