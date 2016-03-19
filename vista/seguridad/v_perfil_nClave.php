<span id="spanClave">
<style type="text/css">
	
	
</style>
<form method="POST" name="envio_form2" action="../../control/seguridad/c_usuario.php" id="formulario_estilo">
	<table id="formulario" >
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>
				<span id="frm-perfil-titulo">Cambiar Clave de Usuario</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="claveactual-tour">
				<label for="cod_tbien">Clave Actual:<span class="asterisco">*</span></label>
				<button id="ojo-clave" title="clic para descubrir todos los campos"  onclick="Convertir()" type="button" size="2"><span id="iconosss" class="icon-eye ojo"></span></button><br>
				<input class="claveIntranetUser" readOnly="readOnly" type="password" id="convertir" size="13" placeholder="Ingrese su Clave Actual" name="c_actual"/> 
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="nuevaclave-tour">
				<label for="cod_tbien">Nueva Clave:<span class="asterisco">*</span></label><br>
				<input type="password" class="claveIntranetUserNueva" readOnly="readOnly" id="convertir2" size="13" placeholder="Ingrese Nueva Clave" name="n_clave"/>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="confirmarclave-tour">
				<label for="cod_tbien">Confirmar Clave:<span class="asterisco">*</span></label><br>
				<input readOnly="readOnly" class="claveIntranetUserCNueva" type="password" id="convertir3" size="13" placeholder="Confirme su Clave" name="n_c_clave"/>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr >
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td align="center">
		
				<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION['tipoMod'])) echo $_SESSION['tipoMod']; ?>">
				<input type="hidden" name="temp">
				<input type="hidden" name="op">
				<input type="hidden" name="OcultoPintar" value="<?php if(isset($_SESSION['OcultoPintar'])) echo 'datos'; ?>">
				
				<!-- Incluyo la botonera -->
				<button type="button" class="botoneranuevo-tour" id="botonera2" value="ModClaIntranet" title="clic para editar el registro" name="editar" onclick="munipulaciondeBotonera(this.name)" ><span id="iconos" class="icon-clipboard"></span><span>Editar</span></button>
				<button type="button" class="botoneraguardar-tour" id="botonera2" value="ModClaIntranet" title="clic para guardar los cambios" name="grab" disabled="disabled" onclick="Cambiar_Clave(this.value)" ><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>						
				<button type="button" class="botoneracancelar-tour" id="botonera2" value="Cancelar" title="clic para cancelar la operacion" onclick="munipulaciondeBotonera(this.name)" name="cancel" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
				<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
					
				 <script>

			 		var frm = document.envio_form2;

					if(frm.OcultoPintar.value != ""){
				 		document.getElementById("spanClave").style.display = "block";
					}

					frm.grab.style.background = "#ccc";
					frm.grab.style.color = "#666666";
					frm.cancel.style.background = "#ccc";
					frm.cancel.style.color = "#666666";

					frm.c_actual.style.cursor = "not-allowed";
					frm.n_clave.style.cursor = "not-allowed";
					frm.n_c_clave.style.cursor = "not-allowed";

				 </script>	



				<?php if(isset($_SESSION["OcultoPintar"])) unset($_SESSION["OcultoPintar"]);?>
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
				<span class="msj">Los campos con <span class="asterisco-1">*</span>son obligatorios<span>
			</td>
		</tr>
	</table>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra cambiar su clave de acceso al sistema<br>
			La clave de acceso es de uso personal e intransferible, debe cumplir con lo establecido en el contrato de terminos y condiciones de uso.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Perfil. </p>
		</td>
	</tr>
</table>
</span>