


<span id="spanContacto">
<form method="POST" action="../../control/seguridad/c_sistema.php" name="envio_form_contacto" >
	<table id="formulario">
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>
				<span id="frm-perfil-titulo">Cambiar Contáctos</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="numerodetelefono-tour">
				<label for="cod_tbien">Número de Teléfono:<span class="asterisco">*</span></label><br>
				<input readOnly="readOnly" onblur="cambio_mayus(this)" type="text" id="des_tlf" value="<?php if(isset($_SESSION['tlf_int']))  echo $_SESSION['tlf_int']; ?>" name="des_tlf"  size="13" placeholder="INGRESE NÚMERO DE TELÉFONO DE LA ORGANIZACIÓN"  /> 
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="correoelectronico-tour">
				<label for="cod_tbien">Correo Electrónico:<span class="asterisco">*</span></label><br>
				<input readOnly="readOnly" onblur="cambio_mayus(this)" type="text" value="<?php if(isset($_SESSION['correo_int'])) echo $_SESSION['correo_int']; ?>" id="des_correo" name="des_correo" size="13" placeholder="INGRESE CORREO ELECTRÓNICO DE LA ORGANIZACIÓN" id="des_correo" />
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="ubicacion-tour">
				<label for="cod_tbien">Ubicación:<span class="asterisco">*</span></label><br>
				<input readOnly="readOnly" onblur="cambio_mayus(this)" type="text" value="<?php if(isset($_SESSION['direccion_int'])) echo $_SESSION['direccion_int']; ?>" size="13" name="des_ubicacion" placeholder="INGRESE LA UBICACIÓN DE LA ORGANIZACIÓN" id="des_ubicacion"  />
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="rif-tour">
				<label for="cod_tbien">RIF:<span class="asterisco">*</span></label><br>
				<input readOnly="readOnly" onblur="cambio_mayus(this)" type="text" value="<?php if(isset($_SESSION['rif_int'])) echo $_SESSION['rif_int']; ?>" size="13" name="rif" placeholder="INGRESE EL RIF DE LA ORGANIZACIÓN"  id="des_rif"/>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td align="center">
			<input type="hidden" name="d_tlf" value="<?php if(isset($_SESSION['tlf_int']))  echo $_SESSION['tlf_int']; ?>"/>
			<input type="hidden" name="d_correo" value="<?php if(isset($_SESSION['correo_int']))  echo $_SESSION['correo_int']; ?>"/>
			<input type="hidden" name="d_ubicacion" value="<?php if(isset($_SESSION['direccion_int']))  echo $_SESSION['direccion_int']; ?>"/>
			<input type="hidden" name="d_rif" value="<?php if(isset($_SESSION['rif_int']))  echo $_SESSION['rif_int']; ?>"/>

			<button  id="botonera2" class="botoneranuevo5-tour"  type="button" name="edit" value="Incluir" onclick="botoneraPersonalizada(this.name)"><span id="iconos" class="icon-pencil"></span><span>Editar</span></button>
			<button  id="botonera2" class="botoneraguardar5-tour"  type="button" name="guardar" value="Incluir" onclick="guardar_contacto()" disabled="disabled"><span  id="iconos" class="icon-file-empty"></span><span>Guardar</span></button>				
			<button  id="botonera2" class="botoneracancelar5-tour"  type="button" value="Consultar"  name="cancel" disabled="disabled" onclick="botoneraPersonalizada(this.name)" ><span id="iconos" class="icon-cross"></span>Cancelar</button>
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
			<p id="mesaje-descrip-maestra">En este formulario podra configurar el apartado Contacto de la pagina principal
			<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Sistema. </p>
		</td>
	</tr>
</table>
</span>

<script>
	var frm = document.envio_form_contacto;

	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";
	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666666";

	frm.des_tlf.style.cursor="not-allowed";
	frm.des_correo.style.cursor="not-allowed";
	frm.des_ubicacion.style.cursor="not-allowed";
	frm.rif.style.cursor="not-allowed";

	



</script>