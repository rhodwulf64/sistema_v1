<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "desgo"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');

?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_concepto.php",true);

		$('#desgando').html('<td colspan="10"><img style="position:relative; float:left; width:30px; margin:0% 50% 0% 50%;" src="../../public/img/loading2.gif"/></td>');
		ajax.onreadystatechange=function(){
			if(ajax.readyState == 4 ){
				$("#desgando").show();
				$("#datosAjax").html(ajax.responseText);

				setTimeout(function(){ $("#desgando").hide(); var tiempo = 4; } , 1000);	
				//document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&concepto="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&concepto="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&concepto="+valor); //paso variable con estatus Nulo y nombre
		}
	}
</script>
<table id="formulario">
	<caption class="concepto-tour">Concepto <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-concepto ayuda-local-frm ayudaguiada-tour"></span> <a style="color:#fff;" href="../pdf_link/Estructura Organizativa/desg.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
	<form action="../../control/configuracion/c_concepto.php" method="POST" name="envio_form" id="formulario_estilo">
		<input type="hidden" name="cod_concepto" value="<?php if(isset($_SESSION["cod_concep"])) echo $_SESSION["cod_concep"];?>">
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="MensajesAyuda descripcion-tour">
				<label for="des" >Descripción:<span class="asterisco">*</span></label><br>
				<input type="text" onkeyup="quitarValidacion()" title="Ingrese el concepto" readonly="readonly"  id="des_concepto" name="des_concepto" placeholder="Ingrese solo Letras" onBlur="cambio_mayus(this)" onkeypress="return SoloLetrasYnumeros(event)" value="<?php if(isset($_SESSION['des_concep'])) echo $_SESSION['des_concep']; ?>" />
				<span id="nube" class="nube" style="">Solo se permiten letras</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr class="botonera-tour" id="botonera">
			<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesconcep"])) echo $_SESSION["opActDesconcep"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para Incluir un concepto" name="inc" value="Incluir" onclick="General_concepto(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar un concepto" value="Consultar" name="bus" onclick="Listar()"><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar un concepto" value="Grabar"     name="grab"   onclick="General_concepto(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modifides un concepto" value="Modificar"  name="mod"    onclick="General_concepto(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta" onclick="General_concepto(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span title="Clic para activar el concepto" id="act">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span title="Clic para desactivar el concepto" id="des">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación" value="Cancelar"   name="cancel" onclick="General_concepto(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>
			<!--<button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button>	-->		

			<script>
			// 	frm = document.envio_form;
				
			// 	if(frm.cod_concepto.value!=""){
			// 		Encontrado_si();
			// 		frm.des.style.cursor = "not-allowed";
					
			// 		if(frm.opActDes.value != ""){
			// 			if(frm.opActDes.value == "act" ){
			// 				frm.sta.value = "Desactivar";
			// 				document.getElementById('act').style.display = "none";
			// 				document.getElementById('iconos-1').style.display = "none";
			// 			}else{
			// 				frm.mod.disabled = true;
			// 				frm.mod.style.background = "#ccc";
			// 				frm.mod.style.color = "#666666";
			// 				frm.sta.value = "Activar";
			// 				document.getElementById('des').style.display = "none";
			// 				document.getElementById('iconos-2').style.display = "none";
			// 				document.getElementById('act').style.display = "inline-block";
			// 				document.getElementById('iconos-1').style.display = "inline-block";
			// 			}
			// 		}else{
			// 			frm.sta.value = "Desactivar";
			// 			document.getElementById('act').style.display = "none";
			// 			document.getElementById('iconos-1').style.display = "none";
			// 		}
				
			// 	}else if(frm.NoEncon.value == "NO"){
			// 		consultar();
					
			// 		frm.des.style.cursor = "not-allowed";
					
			// 		frm.des.readOnly = false;
			// 		frm.des.style.border = "1px solid #0F0FA6";	
			// 		frm.des.style.cursor = "pointer";
			// 		frm.des.focus();
			// 		document.getElementById('act').style.display = "none";
			// 		document.getElementById('iconos-1').style.display = "none";	
			// 	}else{
			// 		Inicio_Deafault();
					
			// 		frm.des.style.cursor = "not-allowed";
					
			// 		document.getElementById('act').style.display = "none";
			// 		document.getElementById('iconos-1').style.display = "none";
			// 	}
			</script>

			<script>
				frm = document.envio_form;
				
				if(frm.des_concepto.value!=""){
					Encontrado_si();
					frm.des_concepto.style.cursor = "not-allowed";
					
					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
						}else{
							frm.mod.disabled = true;
							frm.mod.style.background = "#ccc";
							frm.mod.style.color = "#666666";
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
					
					frm.des_concepto.style.cursor = "not-allowed";
					
					frm.des_concepto.readOnly = false;
					frm.des_concepto.style.border = "1px solid #0F0FA6";	
					frm.des_concepto.style.cursor = "pointer";
					frm.des_concepto.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";	
				}else{
					Inicio_Deafault();
					
					frm.des_concepto.style.cursor = "not-allowed";
					
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
				}
			</script>
		</td>
	</tr>
	</form>
</table>
<br>		
<?php			
// incluyo el mensajde de que los campos son obligatorios
	 include_once("../sistema/camposObligatorios.php");
// incluyo ventana modal para la busqueda 
 include_once("../consultaModal/v_modal_concepto.php"); ?>

<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar los conceptos de bloqueo de usuarios.
			<u>ejemplo:</u><br>-Concepto: De Vacaciones<br>
			El boton "Consultar" permite ver los conceptos registrados hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Concepto. </p>
		</td>
	</tr>
</table>


<?php
	}
	else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}
else{  // trata de entrar sin autentides
	include_once("../../vista/seguridad/v_msj_identifides.php");
}
?>