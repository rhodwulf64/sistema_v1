<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "proveedor"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');

?>	
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_proveedor.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		
		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&proveedor="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&proveedor="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&proveedor="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<table id="formulario">
	<form method="POST" action="../../control/configuracion/c_proveedor.php" name="envio_form" id="formulario_estilo" autocomplete="off">
	<caption class="proveedor-tour">Proveedor <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-proveedor ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Bienes nacionales/Proveedor1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
		<input type="hidden"  name="cod_prov" value="<?php if(isset($_SESSION['cod_prov'])) echo $_SESSION['cod_prov'];?>" />
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="MensajesAyuda proveedor1-tour">	
				<label for="des_prov">Proveedor:<span class="asterisco">*</span></label><br>
				<input type="text" onkeyup="quitarValidacion()" title="Ingrese el nombre del proveedor" readonly="readonly" onBlur="cambio_mayus(this)" placeholder="Ingrese solo letras" size="25" id="des_prov" name="des_prov" value="<?php if(isset($_SESSION['des_prov'])) echo $_SESSION['des_prov'];?>" onkeypress="return SoloLetrasYnumeros(event)"  />
				<span id="nube" class="nube" style="">Solo se permiten letras y Números</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="MensajesAyuda proveedor1-tour">	
				<label for="des_prov">Rif:<span class="asterisco">*</span></label><br>
				<input type="text" onkeyup="quitarValidacion()" title="Ingrese el rif del proveedor" readonly="readonly" onBlur="cambio_mayus(this)" placeholder="Ingrese solo letras" size="25" id="prov_rif" name="prov_rif" value="<?php if(isset($_SESSION['prov_rif'])) echo $_SESSION['prov_rif'];?>"   />
				<span id="nube" class="nube" style="">Solo se permiten letras y Números</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>

		</tr>
		<tr id="botonera" class="botonera-tour">
		<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesProveedor"])) echo $_SESSION["opActDesProveedor"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour"title="Clic para Incluir un proveedor" name="inc" value="Incluir" onclick="General_proveedor(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar un proveedor" value="Consultar"  name="bus"    onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar un proveedor" value="Grabar"     name="grab"   onclick="General_proveedor(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar un proveedor" value="Modificar"  name="mod"    onclick="General_proveedor(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta" onclick="General_proveedor(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para activar el proveedor">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar el proveedor">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación" value="Cancelar"   name="cancel" onclick="General_proveedor(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			
			<script>
				frm = document.envio_form;
				
				if(frm.cod_prov.value!=""){
					Encontrado_si();
					frm.des_prov.style.cursor = "not-allowed";
					frm.prov_rif.style.cursor = "not-allowed";

					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
							//document.getElementById('nClave').style.display = "none";
						}else{
							frm.mod.disabled = true;
							frm.mod.style.background = "#ccc";
							frm.mod.style.color = "#666666";
							frm.sta.value = "Activar";
							document.getElementById('des').style.display = "none";
							document.getElementById('iconos-2').style.display = "none";
							document.getElementById('nClave').style.display = "none"
							document.getElementById('act').style.display = "inline-block";
							document.getElementById('iconos-1').style.display = "inline-block";
						}
					}else{
						frm.sta.value = "Desactivar";
						document.getElementById('act').style.display = "none";
						document.getElementById('iconos-1').style.display = "none";
						document.getElementById('nClave').style.display = "none";
					}
				
				}else if(frm.NoEncon.value == "NO"){
					consultar();
					
					frm.des_prov.style.cursor = "not-allowed";
					
					frm.des_prov.readOnly = false;
					frm.des_prov.style.border = "1px solid #0F0FA6";	
					frm.des_prov.style.cursor = "pointer";
					frm.prov_rif.style.cursor = "pointer";
					frm.des_prov.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
					document.getElementById('nClave').style.display = "none";	
				}else{
					Inicio_Deafault();
					frm.des_prov.style.cursor = "not-allowed";
					frm.prov_rif.style.cursor = "not-allowed";
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
	<?php include_once("../consultaModal/v_modal_proveedor.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar los Proveedores que suministran bienes a la organizaciòn
			<u>ejemplo:</u><br> - Proveedor: CICPC Delegacion Guanare<br>
			- RIF: J-4554555-0<br>
			El boton "Consultar" permite ver los Proveedores registrados hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Proveedor. </p>
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