
<span id="spanVision">
<form method="POST" action="../../control/seguridad/c_sistema.php" name="envio_form_vision">
	<table id="formulario" >
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>
				<span id="frm-perfil-titulo">Cambiar Visión:</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="descripcion3-tour">
				<label for="cod_tbien">Descripción:<span class="asterisco">*</span></label><br>
				<textarea readonly="readonly" name="des_vision" id="des_vision" onblur="cambio_mayus(this)" rows="9" placeholder="¿CUAL ES LA VISIÓN DE LA ORGANIZACIÓN?" /><?php if(isset($_SESSION['vision_int'])) echo $_SESSION['vision_int'];?></textarea>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td align="center">
			<input type="hidden" name="d_vision" value="<?php if(isset($_SESSION['vision_int'])) echo $_SESSION['vision_int'];?>" />

			<button  id="botonera2" class="botoneranuevo3-tour"  type="button" name="edit" value="Incluir" onclick="botoneraPersonalizada3(this.name)"><span id="iconos" class="icon-pencil"></span><span>Editar</span></button>
			<button  id="botonera2" class="botoneraguardar3-tour"  disabled="disabled" type="button" name="guardar" value="guardar" onclick="guardar_vision()"><span  id="iconos" class="icon-file-empty"></span><span>Guardar</span></button>				
			<button  id="botonera2" class="botoneracancelar3-tour"  disabled="disabled"  type="button" value="Consultar"  name="cancel"    onclick="botoneraPersonalizada3(this.name)" ><span id="iconos" class="icon-cross"></span>Cancelar</button>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
</table>
</form>
<br>					
<!-- incluyo el mensajde de que los campos son obligatorios -->
	<table class="msj-asterisco">
		<tr>
			<td> 
				<span class="msj">Los Campos Con <span class="asterisco-1">*</span>Son Obligatorios<span>
			</td>
		</tr>
	</table>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar Vision del apartado Nosotros de la pagina principal
			<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Sistema. </p>
		</td>
	</tr>
</table>
</span>
<script type="text/javascript">
	var frm=document.envio_form_vision;

	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";
	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666666";

	frm.des_vision.style.cursor="not-allowed";
</script>