<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "motivo"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');

?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_motivo.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		
		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&motivo="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&motivo="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&motivo="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>

<table id="formulario">
<form method="POST" action="../../control/configuracion/c_motivo.php" name="envio_form" id="formulario_estilo" autocomplete="off">
	<caption class="motivo-tour">Motivo <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-motivo ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Bienes nacionales/Motivo1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
		<input type="hidden" name="id_motivo"  value="<?php if(isset($_SESSION['id_motivo'])) echo $_SESSION['id_motivo']; ?>"/>
		<!--<tr>
			<td align="right">
				<label for="cod_dep">Código de Motivo </label>
			</td>
			<td>
				<input type="text" id="cod_dep" name="cod_dep" value="<?php// if(isset($_GET['cod_dep'])) echo $_GET['cod_dep']; ?>" /><span class="asterisco">*</span>
			</td>
		</tr>
		<tr>-->
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td  class="MensajeAyuda nombremotivo-tour">
				<label for="des_motivo">Nombre del Motivo:<span class="asterisco">*</span></label><br>
				<input type="text" readonly="" onkeyup="quitarValidacion()" id="des_motivo" title="Ingrese el nombre del Motivo" placeholder="Ingrese solo letras" name="des_motivo" value="<?php if(isset($_SESSION['des_motivo'])) echo $_SESSION['des_motivo']; ?>" onkeypress="return SoloLetras(event)" onBlur="cambio_mayus(this)">
				<span id="nube" class="nube" style="">Solo se Permiten Letras</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="tipomotivo-tour">
				<label for="tipo_motivo">Tipo de Motivo:<span class="asterisco">*</span></label><br>
				<select name="tipo_motivo" disabled title="Eliga un Tipo de Motivo">
					<option >SELECCIONE UN TIPO DE MOTIVO</option>
					<option value="RECEPCIÓN" <?php if(isset($_SESSION['tipo_motivo'])) if($_SESSION['tipo_motivo']=="RECEPCIÓN") echo "selected='selected'";?>>RECEPCIÓN</option>
					<option value="ASIGNACIÓN" <?php if(isset($_SESSION['tipo_motivo'])) if($_SESSION['tipo_motivo']=="ASIGNACIÓN") echo "selected='selected'";?>>ASIGNACIÓN</option>
					<option value="DEVOlUCIÓN" <?php if(isset($_SESSION['tipo_motivo'])) if($_SESSION['tipo_motivo']=="DEVOlUCIÓN") echo "selected='selected'";?>>DEVOlUCIÓN</option>
					<option value="DESINCORPORACIÓN"  <?php if(isset($_SESSION['tipo_motivo'])) if($_SESSION['tipo_motivo']=="DESINCORPORACIÓN") echo "selected='selected'";?>>DESINCORPORACIÓN</option>
					<option value="ANULACIÓNRE" <?php if(isset($_SESSION['tipo_motivo'])) if($_SESSION['tipo_motivo']=="ANULACIÓNRE") echo "selected='selected'";?>>ANULACIÓN - RECEPCIÓN</option>
					<option value="ANULACIÓNAS" <?php if(isset($_SESSION['tipo_motivo'])) if($_SESSION['tipo_motivo']=="ANULACIÓNAS") echo "selected='selected'";?>>ANULACIÓN - ASIGNACIÓN</option>
					<option value="ANULACIÓNDV" <?php if(isset($_SESSION['tipo_motivo'])) if($_SESSION['tipo_motivo']=="ANULACIÓNDV") echo "selected='selected'";?>>ANULACIÓN - DEVOLUCIÓN</option>
					<option value="ANULACIÓNDS" <?php if(isset($_SESSION['tipo_motivo'])) if($_SESSION['tipo_motivo']=="ANULACIÓNDS") echo "selected='selected'";?>>ANULACIÓN - DESINCORPORACIÓN</option>

				</select>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr id="botonera" class="botonera-tour">
		<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesMotivo"])) echo $_SESSION["opActDesMotivo"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para Incluir un Motivo" name="inc" value="Incluir" onclick="General_motivo(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar un Motivo" value="Consultar"  name="bus"    onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar un Motivo" value="Grabar"     name="grab"   onclick="General_motivo(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar un Motivo" value="Modificar"  name="mod"    onclick="General_motivo(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value=""  name="sta"    onclick="General_motivo(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para Activar el motivo">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar el Motivo">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación" value="Cancelar"   name="cancel" onclick="General_motivo(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			
			<script>
				frm = document.envio_form;
				
				if(frm.id_motivo.value!=""){
					Encontrado_si();
					frm.des_motivo.style.cursor = "not-allowed";
					frm.tipo_motivo.style.cursor = "not-allowed";

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
					
					frm.des_motivo.style.cursor = "not-allowed";
					frm.tipo_motivo.style.cursor = "not-allowed";
					frm.des_motivo.readOnly = false;
					frm.des_motivo.style.border = "1px solid #0F0FA6";	
					frm.des_motivo.style.cursor = "pointer";
					frm.des_motivo.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
					document.getElementById('nClave').style.display = "none";	
				}else{
					Inicio_Deafault();
					
					frm.des_motivo.style.cursor = "not-allowed";
					frm.tipo_motivo.style.cursor = "not-allowed";
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
	<?php include_once("../consultaModal/v_modal_motivo.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar los Motivos por los que se relizan movimientos en inventario.
			<u>ejemplo:</u><br> - Motivo: Compra<br>
			El boton "Consultar" permite ver los Motivos registrados hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Motivos. </p>
		</td>
	</tr>
</table>

<?php
	}else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}
?>