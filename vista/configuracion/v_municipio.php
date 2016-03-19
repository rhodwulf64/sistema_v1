<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "municipio"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_municipio.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&municipio="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&municipio="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&municipio="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>

<table id="formulario_estilo_individual1">
<form method="POST" action="../../control/configuracion/c_municipio.php" name="envio_form" id="formulario_estilo" autocomplete="off">
<caption class="municipio-tour">Municipio <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-municipio ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Estructura geografica/Municipio1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></caption>
	<input type="hidden" name="cod_mun" value="<?php if(isset($_SESSION['cod_mun'])) echo $_SESSION['cod_mun'];?>"/>
	<!--<tr>
		<td>	
			<label for="cod_mun" >Codigo de Municipio </label>
		</td>
		<td>
			<input type="text" size="4" id="cod_mun" name="cod_mun" value="<?php //if(isset($_GET['cod_mun'])) echo $_GET['cod_mun'];?>" onkeypress="return SoloNumeros(event)"><span class="asterisco">*</span>
		</td>
	</tr>	
	<tr>-->
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td class="MensajesAyuda municipio1-tour">	
			<label for="nom_mun" >Nombre del Municipio:<span class="asterisco">*</span></label><br>
			<input type="text" class='CampoMov' onkeyup="quitarValidacion()" title="Ingrese el nombre del municipio" readonly="readonly" placeholder="Ingrese solo letras" size="25" id="nom_mun" name="nom_mun" value="<?php if(isset($_SESSION['nom_mun'])) echo $_SESSION['nom_mun'];?>" onkeypress="return SoloLetras(event)" onBlur="cambio_mayus(this)">
			<span id="nube" class="nube" style="">Solo se permiten letras</span>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho "></span></td>
		<td class="estado1-tour">
			Nombre del Estado:<span class="asterisco">*</span><br>
			<?php
				include_once('../../control/configuracion/c_estado.php');
				$combEstado = array();
			    $codEstado  = "";
				if(isset($_SESSION['cod_est_m'])){
					$codEstado=$_SESSION['cod_est_m'];
				}
				$combEstado=PintaEstado($codEstado);
						
				foreach ($combEstado as $elemento){
					echo $elemento;
				}
				?>
				<!--fin del combo Estado-->
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr class="botonera-tour" id="botonera">
		<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon" value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesMunicipio"])) echo $_SESSION["opActDesMunicipio"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para incluir un municipio" name="inc" value="Incluir" onclick="General_municipio(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para consultar un municipio" value="Consultar"  name="bus" onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para guardar un municipio" value="Grabar" name="grab" onclick="General_municipio(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar un Municipio" value="Modificar"  name="mod" onclick="General_municipio(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta" onclick="General_municipio(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="clic para activar el municipio">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="clic para desactivar el municipio">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación"  value="Cancelar"   name="cancel" onclick="General_municipio(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->

			<script>
				frm = document.envio_form;
				
				if(frm.cod_mun.value != ""){
					Encontrado_si();
					frm.nom_mun.style.cursor = "not-allowed";
					frm.cod_est_m.style.cursor = "not-allowed";
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
				
				}else{
					Inicio_Deafault();
					frm.nom_mun.style.cursor = "not-allowed";
					frm.cod_est_m.style.cursor = "not-allowed";
					
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
	<?php include_once("../consultaModal/v_modal_municipio.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar los Municipios donde se encuentra la organizaciòn
			<u>ejemplo:</u><br> - Municipo: Paez<br>
			El boton "Consultar" permite ver los municipios registrados hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Municipio. </p>
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



