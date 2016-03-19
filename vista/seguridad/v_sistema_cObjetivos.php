<span id="spanObjetivos">
<form method="POST" action="../../control/seguridad/c_sistema.php" name="envio_form_obj" >
	<table id="formulario" >
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>
				<span id="frm-perfil-titulo">Cambiar Objetivos</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="objetivosgenerales-tour">
				<label for="cod_tbien">Objetivos Generales:<span class="asterisco">*</span></label><br>
				<textarea type name="des_objG" onblur="cambio_mayus(this)" readonly="readonly" id="des_objG" rows="9" placeholder="¿CUALES SON LOS OBJETIVOS GENERALES DE LA ORGANIZACIÓN?" /><?php if (isset($_SESSION['obj_gene_int'])) echo $_SESSION['obj_gene_int'];?></textarea>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="objetivosespesificos-tour">
				<label for="cod_tbien">Objetivos Específicos:<span class="asterisco">*</span></label><br>
				<textarea type name="des_objE" onblur="cambio_mayus(this)" readonly="readonly" id="des_objE" rows="9" placeholder="¿CUALES SON LOS OBJETIVOS ESPECIFICOS DE LA ORGANIZACIÓN?" /><?php if(isset($_SESSION['obj_esp_int'])) echo $_SESSION['obj_esp_int']; ?></textarea>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td align="center">
			<input type="hidden" name="d_obG" value="<?php if (isset($_SESSION['obj_gene_int'])) echo $_SESSION['obj_gene_int'];?>"/>
			<input type="hidden" name="d_obE" value="<?php if(isset($_SESSION['obj_esp_int'])) echo $_SESSION['obj_esp_int']; ?>" />
			<button  id="botonera2" class="botoneranuevo4-tour" type="button" name="edit" value="Incluir" onclick="botoneraPersonalizada4(this.name)"><span id="iconos" class="icon-pencil"></span><span>Editar</span></button>
			<button  id="botonera2" class="botoneraguardar4-tour" disabled="disabled" type="button" name="guardar" value="Incluir" onclick="guardar_obj()"><span  id="iconos" class="icon-file-empty"></span><span>Guardar</span></button>				
			<button  id="botonera2" class="botoneracancelar4-tour" disabled="disabled"  type="button" value="Consultar"  name="cancel"    onclick="botoneraPersonalizada4(this.name)" ><span id="iconos" class="icon-cross"></span>Cancelar</button>
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
			<p id="mesaje-descrip-maestra">En este formulario podra configurar Objetivos generales y especificos del apartado Nosotros de la pagina principal
			<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Sistema. </p>
		</td>
	</tr>
</table>
</span>
<script type="text/javascript">
	var frm = document.envio_form_obj;
	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";
	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666666";

	frm.des_objE.style.cursor="not-allowed";
	frm.des_objG.style.cursor="not-allowed";

</script>