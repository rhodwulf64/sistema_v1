<style>
	.datosFaltantes{
		background: red;
		color: #fff;
		padding: 5px;
		border-radius:5px;
	}


</style>

<span id="spanTelf">
<form method="POST" name="envio_form5" action="../../control/seguridad/c_usuario.php" id="formulario_estilo" autocomplete="off">
	<table id="formulario" >
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>
				<span id="frm-perfil-titulo">Cambiar Número de Teléfeno</span>
				&nbsp;&nbsp;&nbsp;&nbsp;
				Número Telefónico Actual:
				<?php 
					if(isset($_SESSION['telefono_log'])) if($_SESSION['telefono_log'] != "") echo $_SESSION['telefono_log'];
					else echo "<span class='datosFaltantes'>No Registrado</span>";
					 ?>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="clavedeusuario3-tour">
				<label for="cod_tbien">Clave de Usuario:<span class="asterisco">*</span></label>
				<button id="ojo-clave" title="clic para descubrir todos los campos"  onclick="Convertir4()" type="button" size="2"><span id="iconosss" class="icon-eye ojo"></span></button><br>
				<input type="password" readonly="readonly" id="convertir11"  size="13" placeholder="Ingrese su Clave de Usuario" name="c_user3"/> 
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="nuevonumerodetelefono-tour">
				<label for="telefono_ed">Nuevo Número de Teléfono:<span class="asterisco">*</span></label><br>
				<input type="text" id="" readonly="readonly" maxlength="11" onBlur="cambio_mayus(this)" size="13" placeholder="Ingrese Nueva Número de Teléfono" name="telefono_ed"/>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td align="center">
				
				<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION['tipoMod'])) echo $_SESSION['tipoMod']; ?>">
				<input type="hidden" name="temp">
				<input type="hidden" name="op">
				<input type="hidden" name="OcultoPintar4" value="<?php if(isset($_SESSION['OcultoPintar4'])) echo 'datos'; ?>">
				
				<!-- Incluyo la botonera -->
				<button type="button" class="botoneranuevo-tour" id="botonera2" value="ModClaIntranet" title="clic para editar el registro" name="editar" onclick="munipulaciondeBotoneraTlf(this.name)" ><span id="iconos" class="icon-clipboard"></span><span>Editar</span></button>
				<button type="button" class="botoneraguardar4-tour" id="botonera2" value="ModtlfIntranet" name="grab" onclick="Cambiar_Tlf(this.value)" ><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>						
				<button type="reset" class="botoneracancelar4-tour" id="botonera2" value="Cancelar" name="cancel" onclick="munipulaciondeBotoneraTlf(this.name)"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
				<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
					
				 <script>

			 		var frm = document.envio_form5;

					if(frm.OcultoPintar4.value != ""){
				 		document.getElementById("spanTelf").style.display = "block";
					}
					frm.grab.style.background = "#ccc";
					frm.grab.style.color = "#666666";
					frm.cancel.style.background = "#ccc";
					frm.cancel.style.color = "#666666";

					frm.c_user3.style.cursor="not-allowed";
					frm.telefono_ed.style.cursor="not-allowed";
				 </script>	

				<?php if(isset($_SESSION["OcultoPintar4"])) unset($_SESSION["OcultoPintar4"]);?>

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
			<p id="mesaje-descrip-maestra">En este formulario podra cambiar y/o actulizar su numero telefonico.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Perfil. </p>
		</td>
	</tr>
</table>
</span>