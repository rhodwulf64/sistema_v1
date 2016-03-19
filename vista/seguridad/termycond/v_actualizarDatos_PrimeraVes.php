<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3 && $_SESSION['statusTablaEstatus'] == 'N'){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "personal"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>

<style>
	
	select#preg1{
		text-transform: uppercase;
	}
	#anterior-btn{
		background: #023859;
		color: #fff;
	}
	#btn-Guardar{
		background: #023859;
		color: #fff;
	}
	#btn-Guardar:hover,#anterior-btn:hover{
		cursor: pointer;
		opacity: 0.9;
	}
	#falta1{
		background: red;
		padding: 4px 19px;
		border:1px solid red;
		border-radius: 5px;
		transition:all .4s;
		visibility: hidden;
		position: relative;
		top: -8px;
		left: 100px;
		

	}
</style>
<script type="text/javascript">
	function validarClave_ajax(){
		 var clave_us = $("#clave").val();
		
		$.ajax({
			type: 'POST',
			url: '../../control/seguridad/c_usuario.php',
			data: ("claveN="+clave_us+"&temp=validarClaveNueva"),
			success: function(resp){
				//console.log(resp);
				if(resp==1){
					LibreriaGenerarModal("la clave no puede ser igual a la cédula.");
					document.envio_form.clave.value = "";
					document.envio_form.clave.style.border = "1px solid red";
				}else if(resp==2){
					document.envio_form.clave.style.border = "1px solid #ccc";
				}
				// if(si == 1){ // encontro el codigo en la base de datos
				// 	 // LibreriaGenerarModal("la clave no puede ser igual a la cédula.");
				// 	LibreriaGenerarModal("la clave no puede ser igual a la cédula.");
				// 	// document.envio_form.clave.style.border = "1px solid blue";
				// 	// document.envio_form.clave.focus();
				// }	// document.envio_form.clave.style.border = "1px solid red";
				// if(si==2){
				// 	LibreriaGenerarModal("la clave no puede ser igual a la cédula.");
				// }
				/*switch(resp){
					case 1:
						LibreriaGenerarModal("la clave no puede ser igual a la cédula.");
						// document.envio_form.clave.style.border = "1px solid red";
					break;
					case 2:
						//LibreriaGenerarModal("la clave no puede ser igual a la cédula.");
						 document.envio_form.clave.style.border = "1px solid blue";
						// document.envio_form.clave.focus();
					break;
				}*/
			 }
		});

	}
</script>
<span id="spanClave">
<form method="POST" action="../../control/seguridad/c_usuario.php" name="envio_form" autocomplete="off">
<table id="formulario_estilo_individual1">
<caption class="datosseguridad-tour">Actualización: Datos de Seguridad<span title="Clic para ver ayuda guiada"class="icon-magic-wand element-primeravez ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Estructura Organizativa/Personal1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></caption>
	<!-- variable para saber si esta en la pantalla completa o minilista -->
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="nuevaclave-tour">
		
			<label for="clave" >Nueva Clave:<span class="asterisco">*</span></label><!--<span id="falta1" >Debe ingresar la clave</span>-->
			<button id="ojo-clave" title="clic para descubrir todos los campos"  onclick="Convertir()" type="button" size="2"><span id="iconosss" class="icon-eye ojo"></span></button><br>

			<input tabindex="1" type="password" onblur="validarClave_ajax()" maxlength="12" class='CampoMov' title="Ingrese la cedúla del personal" style="width:100%;" placeholder="Ingrese solo numeros" id="clave" name="clave" onkeypress=""/> 
		</td>
		<td id="r-paddig" style="width:45%;" class="resp1-tour">
			<label for="resp1">Respuesta de Seguridad 1:<span class="asterisco">*</span></label><br>
			<input tabindex="4" type="password" id="resp1" class="CampoMov" style="width:100%;" placeholder="Ingrese Respuesta de Seguridad" name="resp1" />  
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="confirmarclave-tour">
			<label for="cclave" >Confirmar Clave:<span class="asterisco">*</span></label><!--<span id="falta1" >Debe confirmar la clave</span>--><br>
			<input tabindex="2" type="password" onBlur="cambio_mayus(this)" style="width:100%;" class='CampoMov' placeholder="Ingrese solo letras" title="Ingrese los nombres del personal"  id="cclave" size="26" name="cclave"  /> 
		</td>
		<td id="r-paddig" class="preg2-tour">
			<label for="preg2">Pregunta de Seguridad 2:<span class="asterisco">*</span></label><br>
			<input tabindex="5" type="text" id="preg2" onBlur="cambio_mayus(this)" style="width:100%;" placeholder="Ingrese Nueva Pregunta de Seguridad" name="preg2"/>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr id="r-paddig">
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="preg1-tour">
			<label for="preg1">Pregunta de Seguridad 1:<span class="asterisco">*</span></label><br>
				<select tabindex="3" id="preg1" name="preg1" class="CampoMov">
					<option value="selec" >seleccione nueva pregunta de seguridad</option>
					<option value="¿CUAL ES SU FECHA DE GRADUACIÓN?(BACHILLERATO O UNIVERSITARIA)" >¿Cual es su fecha de graduación?(Bachillerato o Universitaria)</option>
					<option value="¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?" >¿Cual es el nombre de su primer colegio?</option>
					<option value="¿CUAL ES EL NOMBRE DE SU HÉROE CUANDO NIÑO?" >¿Cual es el nombre de su héroe cuando niño?</option>
					<option value="¿CUAL ES EL NOMBRE DE SU PRIMER NOVIA/NOVIO?" >¿Cual es el nombre de su primer novia/novio?</option>
					<option value="¿CUAL ES MI MAYOR LOGRO?" >¿Cual es mi mayor logro?</option>
					<option value="¿UN lUGAR SECRETO?" >¿Un lugar secreto?</option>
					<option value="¿CANCIÓN PREFERIDA?" >¿Canción preferida?</option>
					<option value="¿UN LIBRO DE SU PREFERENCIA?" >¿Un libro de su preferencia?</option>
					<option value="¿MI PELÍCULA PREFERIDA?" >¿Mi pelicula preferida?</option>
				</select>
		</td>
		<td id="r-paddig" class="resp2-tour">
			<label for="resp2">Respuesta de Seguridad 2:<span class="asterisco">*</span></label><br>
			<input tabindex="6" type="password" id="convertir6" class="CampoMov" style="width:100%;" placeholder="Ingrese Respuesta de Seguridad" id="resp2" name="resp2" /> 
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr >
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td align="center" colspan="2"><br>
			<span class="botonera-terminos">
				<button type="button" class="botoneranuevo-tour" title="Clic para regresar a términos y condiciones" name="inc" id="anterior-btn" value="ant" onclick="RegresarTerminos()"><span id="iconos" class="icon-arrow-left2"></span><span>Atras</span></button>	
				
				<button type="button" class="botoneraguardar-tour" title="Clic para guardar la actualización de datos" name="inc" id="btn-Guardar" value="Next" onclick="validar_guardar()"><span id="iconos" class="icon-checkmark"></span><span>Guardar</span></button>				
			</span>
			<!-- <button type="button" title="Clic para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
			<script>

				function RegresarTerminos(){

					$.ajax({
						type: 'POST',
						url: '../../control/seguridad/c_usuario.php',
						data: ("temp=frm_terminosYCondicionesRegresar"),
						success: function(resp){
							if(resp != ""){ // encontro el codigo en la base de datos
								location.href = "?accion=aceptar_terminos";
							}
						}
					});
				}

				function GuardarActualizacion(){
					//$("#cclave").val(); // solo para validacion

					$.ajax({
						type: 'POST',
						url: '../../control/seguridad/c_usuario.php',
						data: 'temp=actualizarDatosPrimeraVez&clave='+$("#clave").val()+'&preg1='+$("#preg1").val()+'&resp1='+$("#resp1").val()+'&preg2='+$("#preg2").val()+'&resp2='+$("#resp2").val(),
						success: function(resp){
						//console.log(resp);
							 // if(resp == "listo"){
								location.href = "../../control/seguridad/c_logout.php";
								// alert('chao');
							 // }
							
						}	
					});
					
				}

				function validar_guardar(){
					var frm=document.envio_form;

					if(frm.clave.value=="" && frm.cclave.value=="" && frm.preg1.selectedIndex=="" && frm.resp1.value=="" && frm.preg2.value=="" && frm.resp2.value==""){
						frm.clave.style.border="1px solid red";
						frm.cclave.style.border="1px solid red";
						frm.preg1.style.border="1px solid red";
						frm.resp1.style.border="1px solid red";
						frm.preg2.style.border="1px solid red";
						frm.resp2.style.border="1px solid red ";
						LibreriaGenerarModal("Los campos se encuentran vacios");
						frm.clave.focus();
					}else if(frm.clave.value==""){
						frm.clave.style.border="1px solid red";
						frm.cclave.style.border="1px solid #ccc";
						LibreriaGenerarModal("Debe ingresar la clave");
					}else if(frm.cclave.value==""){
						LibreriaGenerarModal("Debe confirmar la clave");
						frm.cclave.style.border="1px solid red";
						frm.clave.style.border="1px solid #ccc";
						frm.preg1.style.border="1px solid #ccc";
						frm.resp1.style.border="1px solid #ccc";
						frm.preg2.style.border="1px solid #ccc";
						frm.resp2.style.border="1px solid #ccc ";
					}else if(frm.clave.value.length <8 || frm.cclave.value.length >30){
						LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
						frm.clave.style.border="1px solid red";
						frm.preg1.style.border="1px solid #ccc";
						frm.resp1.style.border="1px solid #ccc";
						frm.preg2.style.border="1px solid #ccc";
						frm.resp2.style.border="1px solid #ccc ";
						// frm.clave.style.border="1px solid #ccc";
						// frm.cclave.style.border="1px solid #ccc";
						frm.clave.focus();
					}else if(frm.clave.value.length!=frm.cclave.value.length ){
						LibreriaGenerarModal("Las claves no coinciden");
						frm.cclave.style.border="1px solid red";
						frm.clave.style.border="1px solid red";
						frm.preg1.style.border="1px solid #ccc";
						frm.resp1.style.border="1px solid #ccc";
						frm.preg2.style.border="1px solid #ccc";
						frm.resp2.style.border="1px solid #ccc ";
					}else if(frm.preg1.selectedIndex==""){
						frm.preg1.style.border="1px solid red";
						frm.clave.style.border="1px solid #ccc";
						frm.cclave.style.border="1px solid #ccc";
						frm.resp1.style.border="1px solid #ccc";
						frm.preg2.style.border="1px solid #ccc";
						frm.resp2.style.border="1px solid #ccc";
						LibreriaGenerarModal("Debe elegir una preguna de seguridad");
					}else if(frm.resp1.value==""){
						frm.preg1.style.border="1px solid #ccc";
						frm.resp1.style.border="1px solid red";
						LibreriaGenerarModal("Debe ingresar la repuesta de seguridad 1 ");
					}else if(frm.preg2.value==""){
						frm.preg2.style.border="1px solid red";
						frm.resp1.style.border="1px solid #ccc";
						frm.preg1.style.border="1px solid #ccc";
						frm.resp1.style.border="1px solid #ccc";
						
						LibreriaGenerarModal("Debe ingresar pregunta de seguridad 2");
					}else if(frm.resp2.value==""){
						frm.preg2.style.border="1px solid #ccc";
						frm.resp2.style.border="1px solid red";
						LibreriaGenerarModal("Debe ingresar la repuesta de seguridad 2");
					}else{
						GuardarActualizacion();
					}
				}
				// function validar_individual(){
				// 	// var frm=document.envio_form;

				// 	// if(frm.clave.value==""){
				// 	// 	frm.clave.style.border="1px solid red";
						
				// 	// 	nube1();
				// 	// }else if(frm.cclave.value==""){
				// 	// 	frm.cclave.style.border="1px solid red";
				// 	// 	frm.clave.style.border="1px solid #ccc";
				// 	// 	nube1();
				// 	// 	quitar_nube1();
				// 	// }else if(frm.clave.value && frm.cclave.value==""){
				// 	// 	nube1();
				// 	}
				// }
				// function nube1(){
				// 	document.getElementById('falta1').style.visibility="visible";
				// 	document.getElementById('falta1').style.color="white";
					
				// }
				// function quitar_nube1(){
				// 	document.getElementById('falta1').style.visibility="hidden";
				// }

	
			</script>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
</table>
</form>
<br>					
<!-- incluyo el mensajde de que los campos son obligatorios -->
	<?php include_once("../sistema/camposObligatorios.php"); ?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/v_modal_personal.php"); ?>
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
	  <script>

		// 	 		var frm = document.envio_form;

		// 			if(frm.OcultoPintar.value != ""){
		// 		 		document.getElementById("spanClave").style.display = "block";
		// 			}

	 </script>	



				<?php// if(isset($_SESSION["OcultoPintar"])) unset($_SESSION["OcultoPintar"]);?>