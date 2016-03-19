<style>
	#formulario_estilo_individual1 tr td input{
		width: 100%;
	}
	#preg2-id{
		text-transform: uppercase;
	}
	#spacio{
		margin-left: 2%;
	}
</style>
<span id="spanPreg">
<form  method="POST" name="envio_form3" action="../../control/seguridad/c_usuario.php" id="formulario_estilo">
<table id="formulario_estilo_individual1">
		<tr>
			<td ><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td id="r-paddig">
				<span id="frm-perfil-titulo">Cambiar Preguntas de Seguridad</span>
			</td>
			<td>
				Preguntas actuales: <br>
				1: <span id="spacio"></span> <?php if(isset($_SESSION['preg1_log'])) echo $_SESSION['preg1_log']; ?><br>
				2: <span id="spacio"></span> <?php if(isset($_SESSION['preg2_log'])) echo $_SESSION['preg2_log']; ?>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td id="r-paddig" class="clavedeusuario-tour">
				<label for="cod_tbien">Clave de Usuario:<span class="asterisco">*</span></label>
				<button id="ojo-clave" title="clic para descubrir todos los campos"  onclick="Convertir2()" type="button" size="2"><span id="iconosss" class="icon-eye ojo"></span></button><br>
				<input type="password" readonly="readonly" id="convertir4" class="CampoMov" size="13" placeholder="Ingrese su Clave de usuario" name="c_user" /> 
			</td>
			<td></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td id="r-paddig"  style="width:40%;" class="preg1-tour">
				<label for="preg1">Pregunta de Seguridad 1:<span class="asterisco">*</span></label><br>
				<select disabled="disabled" id="preg2-id" name="preg1" class="CampoMov">
					<option value="selec" >seleccione nueva pregunta de seguridad</option>
					<option value="CUAL ES SU FECHA DE GRADUACIÓN (BACHILLERATO O UNIVERSITARIA)" >¿Cual es su fecha de graduación?(Bachillerato o Universitaria)</option>
					<option value="CUAL ES EL NOMBRE DE SU PRIMER COLEGIO" >¿Cual es el nombre de su primer colegio?</option>
					<option value="CUAL ES EL NOMBRE DE SU HÉROE CUANDO NIÑO" >¿Cual es el nombre de su héroe cuando niño?</option>
					<option value="CUAL ES EL NOMBRE DE SU PRIMER NOVIA/NOVIO" >¿Cual es el nombre de su primer novia/novio?</option>
					<option value="CUAL ES MI MAYOR LOGRO" >¿Cual es mi mayor logro?</option>
					<option value="UN lUGAR SECRETO" >¿Un lugar secreto?</option>
					<option value="CANCIÓN PREFERIDA" >¿Canción preferida?</option>
					<option value="UN LIBRO DE SU PREFERENCIA" >¿Un libro de su preferencia?</option>
					<option value="MI PELÍCULA PREFERIDA" >¿Mi pelicula preferida?</option>
				</select>
			</td>
			<td id="r-paddig" class="resp1-tour">
				<label for="resp1">Respuesta de Seguridad 1:<span class="asterisco">*</span></label><br>
				<input type="password" readonly="readonly" id="convertir5"  class="CampoMov" size="13" placeholder="Ingrese Respuesta de Seguridad" name="resp1" />  
			</td>
			<td></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td id="r-paddig" class="preg2-tour"> 
					<label for="preg2">Pregunta de Seguridad 2:<span class="asterisco">*</span></label><br>
				<input type="text" id="" readonly="readonly" onBlur="cambio_mayus(this)"  size="13" placeholder="Ingrese Nueva Pregunta de Seguridad" name="preg2" value="<?php if(isset($_SESSION['preg2'])) echo $_SESSION['preg2']; ?>"/>
			</td>
			<td id="r-paddig" class="resp2-tour">
				<label for="resp2">Respuesta de Seguridad 2:<span class="asterisco">*</span></label><br>
				<input type="password" readonly="readonly" id="convertir6" class="CampoMov" size="13" placeholder="Ingrese Respuesta de Seguridad" name="resp2" /> 
			</td>
			<td></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td align="center" id="r-paddig" colspan="2">
				
				<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION['tipoMod'])) echo $_SESSION['tipoMod']; ?>">
				<input type="hidden" name="temp">
				<input type="hidden" name="op">
				<input type="hidden" name="OcultoPintar2" value="<?php if(isset($_SESSION['OcultoPintar2'])) echo 'datos'; ?>">
				
				<!-- Incluyo la botonera -->
				<button type="button" class="botoneranuevo-tour" id="botonera2" value="ModClaIntranet" title="clic para editar el registro" name="editar" onclick="munipulaciondeBotoneraPre(this.name)" ><span id="iconos" class="icon-clipboard"></span><span>Editar</span></button>
				<button type="button" class="botoneraguardar1-tour" id="botonera2" value="ModPregIntranet" name="grab" onclick="Cambiar_Preguntas(this.value)" ><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>						
				<button type="reset" class="botoneracancelar2-tour" id="botonera2" value="Cancelar" name="cancel" onclick="munipulaciondeBotoneraPre(this.name)"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
				<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
					
				 <script>

			 		var frm = document.envio_form3;

					if(frm.OcultoPintar2.value != ""){
				 		document.getElementById("spanPreg").style.display = "block";
					}

					frm.grab.style.background = "#ccc";
					frm.grab.style.color = "#666666";
					frm.cancel.style.background = "#ccc";
					frm.cancel.style.color = "#666666";

					frm.c_user.style.cursor = "not-allowed";
					frm.preg1.style.cursor = "not-allowed";
					frm.resp1.style.cursor = "not-allowed";
					frm.preg2.style.cursor = "not-allowed";
					frm.resp2.style.cursor = "not-allowed";

				 </script>	

				<?php if(isset($_SESSION["OcultoPintar2"])) unset($_SESSION["OcultoPintar2"]);?>

				
			</td>
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
			<p id="mesaje-descrip-maestra">En este formulario podra configurar las preguntas de seguridad necesarias para la recuperacióon de su clave.<br>
			De igual forma que la clave de acceso, las repuestas de seguridad son secretas e intransferibles.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Perfil. </p>
		</td>
	</tr>
</table>
</span>