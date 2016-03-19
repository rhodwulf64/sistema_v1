<table id="formulario" >
	<caption><span class="icon-users"></span> ¿ Olvido su Clave ?</caption>
	<form action="control/seguridad/c_login.php" method="POST" name="envio_form" id="form_acceso" >
		<tr>
			<td align="right">
				<label class="clr-acceso" for="usr">Usuario : </label>
			</td>
			<td>
				<span class="icon-user"></span><input type="text"  onpaste="return false" oncontextmenu="return false"  maxlength="12"  onkeypress="return SoloNumeros(event);" class="usr" id="usr" name="usr" placeholder="Ingrese su Usuario" />
			</td>
		</tr>
		<tr  id="botonera">
			<td  colspan="2">
				<input type="hidden" name="ope" />
				<input type="button" title="click para acceder al sistema" class="bt-principal" value="Acceder" onclick="Control_acceso_Intranet(this.value)" />
				<input type="reset" title="click pala limpiar los campos de usuario y clave" value="Cancelar" />			
			</td>
		</tr>
	</form>
</table>
<table>
	<tr>
		<?php 
			if(isset($_SESSION["res"])){
				if($_SESSION["res"] == "errorAccess"){
					echo "<div class='verificar-datos'><span id='verificar-datos'>Verifique sus Datos. Usuario y/o contraseña Incorrecto</span><div>";	
			}else if( $_SESSION["res"] == "userDes"){
					echo "<div class='verificar-datos'><span id='verificar-datos'>El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.</span><div>";
				}
				unset($_SESSION["res"]);
			}
		?>
	<td>
</table>