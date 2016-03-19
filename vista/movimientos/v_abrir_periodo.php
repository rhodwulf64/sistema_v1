<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "periodAbrir"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>
<style type="text/css">
	#ico-calendario:hover{
		cursor: pointer;
	}

</style>
<table id="formulario">
<form method="POST" action="../../control/configuracion/c_periodo.php" name="envio_form" id="formulario_estilo">
<caption class="abrirperiodo-tour">Abrir Período <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-abrirperiodo ayuda-local-frm ayudaguiada-tour"></span> <span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></caption>
	<input type="hidden" name="id_periodo" value="<?php if(isset($_SESSION['id_periodo_abrir'])) echo $_SESSION['id_periodo_abrir'];?>"/>
	<!--<tr>
		<td>	
			<label for="id_periodo" >Codigo de periodo </label>
		</td>
		<td>
			<input type="text" size="4" id="id_periodo" name="id_periodo" value="<?php //if(isset($_GET['id_periodo'])) echo $_GET['id_periodo'];?>" onkeypress="return SoloNumeros(event)"><span class="asterisco">*</span>
		</td>
	</tr>	
	<tr>-->
	
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="MensajeAyuda nombredelperiodo-tour">								
			<label for="nom_periodo">Nombre del Período: <span class="asterisco">*</span></label>&nbsp;<!-- <span id="ico-calendario" class="icon-calendar" title="clic para desplegar el calendario"></span> --><br>
			<input type="text" title="Este es el nombre del período" readonly="readonly" placeholder="Dia-Mes-Año" size="25" id="nom_periodo" name="nom_periodo" value="<?php if(isset($_SESSION['nom_periodo_abrir'])) echo $_SESSION['nom_periodo_abrir'];?>">
			<span id="nube" class="nube" style="">Solo se Permiten Numeros</span>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="MensajeAyuda fechainicioperiodo-tour">								
			<label for="fecha_inicio">Fecha de Inicio:<span class="asterisco">*</span></label>&nbsp;<!-- <span id="ico-calendario" class="icon-calendar" title="clic para desplegar el calendario"></span> --><br>
			<input type="text" title="Esta es la fecha inicio del período" readonly="readonly" placeholder="Dia-Mes-Año" size="25" id="fecha_inicio" name="fecha_inicio" value="<?php if(isset($_SESSION['fecha_inicio_abrir'])) echo $_SESSION['fecha_inicio_abrir'];?>">
			<span id="nube" class="nube" style="">Solo se Permiten Numeros</span>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="MensajeAyuda fechafinperiodo-tour">										
			<label>Fecha de fin:<span class="asterisco">*</span></label>&nbsp; <!-- <span id="ico-calendario" class="icon-calendar" title="clic para desplegar el calendario"></span> --> <br>
			<input type="text" name="fecha_fin" title="Esta es la fecha fin del período" placeholder="Dia-Mes-Año" readonly="readonly" size="10" value="<?php if(isset($_SESSION['fecha_fin_abrir'])) echo $_SESSION['fecha_fin_abrir'];?>" />
			<span id="nube" class="nube" style="">Solo se Permiten Numeros</span>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr id="botonera" class="botonera-tour">
		<td align="center" colspan="5"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDes"])) echo $_SESSION["opActDes"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para abrir un periodo" name="inc" value="abrir" onclick="General_periodo(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Abrir</span></button>				
			<!--<button type="button" title="Clic para consultar un periodo" value="Consultar"  name="bus"    onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>-->
			<button type="button" class="botoneraguardar-tour" title="Clic para guardar la configuración" value="Grabar_abrir" name="grab"   onclick="General_periodo(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>				
			<!--<button type="button" title="Clic para Modificar un periodo" value="Modificar"  name="mod"    onclick="General_periodo(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" value="" name="sta" onclick="General_periodo(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para activar el período">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar el período">Desactivar</span></button>	-->	
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación"  value="Cancelar"   name="cancel" onclick="General_periodo(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			
			<script>
				frm = document.envio_form;
				
				if(frm.nom_periodo.value != ""){
					document.envio_form.inc.disabled=true;
					document.envio_form.grab.disabled=false;
					document.envio_form.cancel.disabled=false;

					document.envio_form.inc.style.background = "#ccc";
					document.envio_form.inc.style.color = "#666666";

					document.envio_form.grab.style.background = "#023859";
					document.envio_form.grab.style.color = "#fff";
					document.envio_form.cancel.style.background = "#023859";
					document.envio_form.cancel.style.color = "#fff";

					frm.nom_periodo.style.cursor = "not-allowed";
					frm.fecha_inicio.style.cursor = "not-allowed";
					frm.fecha_fin.style.cursor = "not-allowed";
				}else{
					/****** botonera estandar *****/
					document.envio_form.inc.disabled=false;
					document.envio_form.grab.disabled=true;
					document.envio_form.cancel.disabled=true;

					document.envio_form.inc.style.background = "#023859";
					document.envio_form.inc.style.color = "#fff";

					document.envio_form.grab.style.background = "#ccc";
					document.envio_form.grab.style.color = "#666666";
					document.envio_form.cancel.style.background = "#ccc";
					document.envio_form.cancel.style.color = "#666666";

					frm.nom_periodo.style.cursor = "not-allowed";
					frm.fecha_inicio.style.cursor = "not-allowed";
					frm.fecha_fin.style.cursor = "not-allowed";
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
	<?php // include_once("../consultaModal/v_modal_periodo.php");?>
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