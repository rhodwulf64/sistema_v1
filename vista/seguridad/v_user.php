
<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
?>

<table id="formulario_estilo_individual1">
<caption>Usuario<span id="ic-ayuda-frm" class="icon-question" title="Clic para ver ayuda"></span></caption>
<form method="POST" action="../../control/seguridad/c_usuario.php" name="envio_form">
	<tr>
		<td id="r-paddig">								
			<label for="login">Usuario:<span class="asterisco">*</span></label><br>
			<input type="text" readonly="readonly" placeholder="Su Usuario es su Cédula" name="login" id="login" value="<?php if(isset($_SESSION['ced_per'])) echo $_SESSION['ced_per']; ?>"> 
		</td>
	</tr>
	<tr>
		<td id="r-paddig">										
			<label for="niv">Tipo de Usuario:<span class="asterisco">*</span></label><br>
			<select name="niv" disabled="disabled" id="niv">
				<option disabled="disabled" value="sel" selected="selected">Seleccione El Tipo de Usuario</option>
				<option value="1" <?php if(isset($_SESSION['niv_per'])) if($_SESSION['niv_per']=='1') echo "selected='selected'"; ?> >ADMINISTRADOR</option>
				<option value="2" <?php if(isset($_SESSION['niv_per'])) if($_SESSION['niv_per']=='2') echo "selected='selected'"; ?> >COORDINADOR</option>
			</select>
		</td>
	</tr>
	<tr id="botonera">
		<td align="center"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION['res'])) echo $_SESSION['res']; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION['opActDes'])) echo $_SESSION['opActDes']; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION['tipoMod'])) echo $_SESSION['tipoMod']; ?>">
			<input type="hidden" name="idced" value="<?php if(isset($_SESSION['idced'])) echo $_SESSION['idced']; ?>">
			<input type="hidden" name="actpass">
			<input type="hidden" name="modificar">
			<input type="hidden" name="temp">
			<input type="hidden" name="op">
			

			<!-- Incluyo la botonera -->
			<button type="button" name="inc" value="Incluir" onclick="General_Usuario(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" value="Consultar"  name="bus"    onclick="General_Usuario(this.value)" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" value="Grabar"     name="grab"   onclick="General_Usuario(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" value="Modificar"  name="mod"    onclick="General_Usuario(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" value=""           name="sta"    onclick="General_Usuario(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des">Desactivar</span></button>		
			<button type="button" value="Cancelar"   name="cancel" onclick="General_Usuario(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
			<script>
				frm = document.envio_form;
				var boton = document.getElementById('sta');
				if(frm.login.value!=""){
					Encontrado_si();
					frm.login.style.cursor = "not-allowed";
					frm.pass1.style.cursor = "not-allowed";
					frm.pass2.style.cursor = "not-allowed";
					frm.niv.style.cursor = "not-allowed";

					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
							document.getElementById('nClave').style.display = "none";
						}else{
							frm.sta.value = "Activar";
							document.getElementById('des').style.display = "none";
							document.getElementById('iconos-2').style.display = "none";
							document.getElementById('nClave').style.display = "none"
							document.getElementById('act').style.display = "inline-block";
							document.getElementById('iconos-1').style.display = "inline-block";
						}
					}else{
						frm.sta.value = "Activar";
						document.getElementById('des').style.display = "none";
						document.getElementById('iconos-2').style.display = "none";
						document.getElementById('nClave').style.display = "none";
					}

				
				}else if(frm.NoEncon.value == "NO"){
					consultar();
					frm.login.style.cursor = "not-allowed";
					frm.pass1.style.cursor = "not-allowed";
					frm.pass2.style.cursor = "not-allowed";
					frm.niv.style.cursor = "not-allowed";
					frm.login.readOnly = false;
					frm.login.style.border = "1px solid #0F0FA6";	
					frm.login.style.cursor = "pointer";
					frm.login.focus();
					document.getElementById('des').style.display = "none";
					document.getElementById('iconos-2').style.display = "none";
					document.getElementById('nClave').style.display = "none";	
				}else if(frm.NoEncon.value == "yesCed" || frm.NoEncon.value == "NotCed"){
					Act();
					frm.pass1.readOnly = false;
					frm.pass2.readOnly = false;
					frm.niv.disabled = false;

					// cursor sobre el formulario
					frm.login.style.cursor = "pointer";
					frm.pass1.style.cursor = "pointer";
					frm.pass2.style.cursor = "pointer";
					frm.niv.style.cursor = "pointer";
					document.getElementById('des').style.display = "none";
					document.getElementById('iconos-2').style.display = "none";
					document.getElementById('nClave').style.display = "none";
					// activo la busqueda independiente
					document.getElementById("bus-independiente").style.display = "inline-block";
					document.getElementById("asterisco-unico").style.display = "none";
					document.getElementById("asterisco-unico-ocul").style.display = "inline-block";
				}else{
					Inicio_Deafault();
					frm.login.style.cursor = "not-allowed";
					frm.niv.style.cursor = "not-allowed";
					document.getElementById('des').style.display = "none";
					document.getElementById('iconos-2').style.display = "none";
				}
			</script>
		</td>
	</tr>
</form>
</table>
<br>					
<!-- incluyo el mensajde de que los campos son obligatorios -->
	    <?php include_once("../sistema/camposObligatorios.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../sistema/v_modal_buscar.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">mensaje de ayuda sobre la maestra mostrada ...</p>
		</td>
	</tr>
</table>

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