<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
?>
<table id="formulario">
<caption class="tipousuario-tour">Tipo de Usuario <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-tipodeusuario ayuda-local-frm ayudaguiada-tour"></span> <a style="color:#fff;" href="../pdf_link/Seguridad/TipoUsuario1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
<form method="POST" action="../../control/seguridad/c_tUser.php" name="envio_form" autocomplete="off">
<input type="hidden" name="id_tUser" value="<?php if(isset($_SESSION['id_tUser'])) echo $_SESSION['id_tUser'];?>" />
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td class="nombretipousuario-tour">
			<label for="des_tusr">Nombre:<span class="asterisco">*</span></label><br>
			<input type="text" title="Ingrese solo letras" onBlur="cambio_mayus(this)" placeholder="Ingrese solo letras" readonly="readonly" id="des_tusr" name="des_tusr" onkeypress="return SoloNumeros(event)" value="<?php if(isset($_SESSION['des_tusr'])) echo $_SESSION['des_tusr']; ?>" />
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr class="botonera-tour" id="botonera">
		<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION['res'])) echo $_SESSION['res']; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION['opActDes'])) echo $_SESSION['opActDes']; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION['tipoMod'])) echo $_SESSION['tipoMod']; ?>">
			<input type="hidden" name="modificar">
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para Incluir un tipo de usuario" name="inc" value="Incluir" onclick="General_tUser(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar un tipo de usuario" value="Consultar"  name="bus"    onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar un tipo de usuario" value="Grabar"     name="grab"   onclick="General_tUser(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar un tipo de usuario" value="Modificar"  name="mod"    onclick="General_tUser(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta"    onclick="General_tUser(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para activar el tipo de usuario">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar el tipo de usuario">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación" value="Cancelar"   name="cancel" onclick="General_tUser(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
			<script>
				frm = document.envio_form;
				var boton = document.getElementById('sta');
				if(frm.des_tusr.value!=""){
					Encontrado_si();
					frm.des_tusr.style.cursor = "not-allowed";

					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
						}else{
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

				}else if(frm.NoEncon.value == "NO"){
					consultar();
					frm.ced.style.cursor = "not-allowed";
					frm.nom.style.cursor = "not-allowed";
					frm.ape.style.cursor = "not-allowed";
					frm.ema.style.cursor = "not-allowed";
					frm.telf.style.cursor = "not-allowed";
					frm.ced.readOnly = false;
					frm.ced.style.border = "1px solid #0F0FA6";	
					frm.ced.style.cursor = "pointer";
					frm.ced.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
				}else if(frm.NoEncon.value == "yesCed" || frm.NoEncon.value == "NotCed"){
					Act();
					frm.des_tusr.readOnly = false;

					// cursor sobre el formulario
					frm.des_tusr.style.cursor = "pointer";
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
				}else{
					Inicio_Deafault();
					frm.des_tusr.style.cursor = "not-allowed";
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
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
	<?php include_once("../consultaModal/v_modal_tuser.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar los Tipos de usuarios que tendran acceso al sistema.
			<u>ejemplo:</u><br> - Tipo Usuario: Administrador<br>
			El boton "Consultar" permite ver los Tipos de usuarios registrados hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Tipo de usuario. </p>
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
