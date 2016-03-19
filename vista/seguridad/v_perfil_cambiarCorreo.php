<style type="text/css">
	.datosFaltantes{
		background: red;
		color: #fff;
		padding: 5px;
		border-radius:5px;
	}

</style>
<span id="spanCorreo">
<form method="POST" name="envio_form4" action="../../control/seguridad/c_usuario.php" id="formulario_estilo" >
	<table id="formulario" >
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>
				<span id="frm-perfil-titulo">Cambiar Correo Electrónico</span>
				&nbsp;&nbsp;&nbsp;&nbsp;
				Correo Actural:
				<?php if(isset($_SESSION['correo_electMuestra'])) if($_SESSION['correo_electMuestra'] != "") echo $_SESSION['correo_electMuestra'];
				else  echo "<span class='datosFaltantes'>No Registrado</span>";
				 ?>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="clavedeusuario1-tour">
				<label for="cod_tbien">Clave de Usuario:<span class="asterisco">*</span></label>
				<button id="ojo-clave" title="clic para descubrir todos los campos"  onclick="Convertir3()" type="button" size="2"><span id="iconosss" class="icon-eye ojo"></span></button><br>
				<input type="password" readonly="readonly" id="convertir9" size="13" placeholder="Ingrese su Clave de Usuario" name="c_user2" /> 
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="nuevocorreoelectronico-tour">
				<label for="cod_tbien">Nuevo Correo Electrónico:<span class="asterisco">*</span></label><br>
				<input type="text" id="" readonly="readonly" size="13" onBlur="cambio_mayus(this)" placeholder="Ingrese Nuevo Correo Electrónico" name="correo_elect"/>
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
				<input type="hidden" name="OcultoPintar3" value="<?php if(isset($_SESSION['OcultoPintar3'])) echo 'datos'; ?>">
				
				<!-- Incluyo la botonera -->
				<button type="button" class="botoneranuevo-tour" id="botonera2" value="ModClaIntranet" title="clic para editar el registro" name="editar" onclick="munipulaciondeBotoneraCor(this.name)" ><span id="iconos" class="icon-clipboard"></span><span>Editar</span></button>
				<button type="button" class="botoneraguardar3-tour" id="botonera2" value="ModCorreoIntranet" name="grab" onclick="Cambiar_Correo(this.value)" ><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>						
				<button type="reset" class="botoneracancelar3-tour" id="botonera2" value="Cancelar" name="cancel" onclick="munipulaciondeBotoneraCor(this.name)"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
				<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
					
				 <script>

			 		var frm = document.envio_form4;

					if(frm.OcultoPintar3.value != ""){
				 		document.getElementById("spanCorreo").style.display = "block";
					}
					frm.grab.style.background = "#ccc";
					frm.grab.style.color = "#666666";
					frm.cancel.style.background = "#ccc";
					frm.cancel.style.color = "#666666";

					frm.c_user2.style.cursor="not-allowed";
					frm.correo_elect.style.cursor="not-allowed";
				 </script>	

				<?php if(isset($_SESSION["OcultoPintar3"])) unset($_SESSION["OcultoPintar3"]);?>


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
			<p id="mesaje-descrip-maestra">En este formulario podra cambiar y/o actualizar su correo electronico.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Perfil. </p>
		</td>
	</tr>
</table>
</span>