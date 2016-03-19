<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "organismo"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>
<script type="text/javascript">

	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_organizacion.php",true);

		$('#cargando').html('<td colspan="10"><img style="position:relative; float:left; width:30px; margin:0% 50% 0% 50%;" src="../../public/img/loading2.gif"/></td>');
		ajax.onreadystatechange=function(){
			if(ajax.readyState == 4 ){
				$("#cargando").show();
				$("#datosAjax").html(ajax.responseText);

				setTimeout(function(){ $("#cargando").hide(); var tiempo = 4; } , 1000);	

				//document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&organismo="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&organismo="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&organismo="+valor); //paso variable con estatus Nulo y nombre
		}
	}
</script>

<table id="formulario_estilo_individual1">
<form action="../../control/configuracion/c_organizacion.php"method="POST" name="envio_form" autocomplete="off">
	<caption class='organismo-tour'>Organismo<span title="Clic para ver ayuda guiada"class="icon-magic-wand element-org ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Estructura Organizativa/Organismo1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"> </span></caption>
		<input type="hidden" name="id_org" value="<?php if(isset($_SESSION['id_org'])) echo $_SESSION['id_org'];?>">
		<tr>
			<td id="r-paddig" class="codigoorganismo-tour">	
				<label for="cod_org" >Código del Organismo:<span class="asterisco ">*</span></label><br>
				<input type="text" class="CampoMov" onkeyup="quitarValidacion()" title="Ingrese el código de la organización"readonly="readonly" placeholder="Ingrese solo números" size="4" id="cod_org" name="cod_org" value="<?php if(isset($_SESSION['cod_org'])) echo $_SESSION['cod_org'];?>" onkeypress="return SoloNumeros(event,this.id)" >
				<span id="nube" class="nube" style="">Solo se permiten Números</span>
			</td>
			<td id="r-paddig" class="nombreorganismo-tour">	
				<label for="nom_org">Nombre del Organismo:<span class="asterisco">*</span></label><br>
				<input type="text" class="CampoMov" name="nom_org" title="Ingrese el nombre de la organización" placeholder="Ingrese solo letras"  onkeypress="" onBLurr="cambio_mayus(this)" readonly="readonly" value="<?php if(isset($_SESSION['nom_org'])) echo $_SESSION['nom_org'];?>">
				<span id="nube" class="nube" style="">Solo se permiten Letras</span>
			</td>
		</tr>	
		<tr>
			<td id="r-paddig" class="codigounidad-tour">	
				<label for="cod_ud">Código de la Unidad Administradora:<span class="asterisco">*</span></label><br>
				<input type="text"class="CampoMov" readonly="readonly" name="cod_ud" onkeypress="" placeholder="Ingrese solo números" title="Ingrese el código de la unidad administradora" value="<?php if(isset($_SESSION['cod_ud'])) echo $_SESSION['cod_ud'];?>">
				<span id="nube" class="nube" style="">Solo se permiten Números</span>
			</td>
			<td class="MensajesAyuda nombreunidad-tour" id="r-paddig">
				<label for="nom_ud">Nombre de la Unidad Administradora:<span class="asterisco">*</span></label><br>
				<input type="text" class="CampoMov" onkeyup="quitarValidacion()" readonly="readonly" name="nom_ud" onkeypress="return SoloLetras(event)" onBlur="cambio_mayus(this)" placeholder="Ingrese solo letras" title="Ingrese el nombre de la unidad administradora" value="<?php if(isset($_SESSION['nom_ud'])) echo $_SESSION['nom_ud'];?>">
			</td>
		</tr>
		<tr class="botonera-tour" id="botonera">
			<td align="center" colspan="2"><br>
			<input type="hidden" name="NoEncon" value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesOrganismo"])) echo $_SESSION["opActDesOrganismo"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar">
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para incluir un nuevo organismo" name="inc" value="Incluir" onclick="General_organizacion(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para consultar un organismo" value="Consultar" name="bus" onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para guardar un organismo" value="Grabar" name="grab" onclick="General_organizacion(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar un organismo" value="Modificar" name="mod" onclick="General_organizacion(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneradesactivar-tour" value="" name="sta" onclick="General_organizacion(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span class="botoneraactivar-tour" title="Clic para activar el organismo" id="act">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span title="Clic para desactivar el organismo" id="des">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación"  value="Cancelar" name="cancel" onclick="General_organizacion(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button>-->
			<script>
				frm = document.envio_form;	
				if(frm.cod_org.value!=""){
					Encontrado_si();
					frm.nom_org.style.cursor = "not-allowed";
					frm.cod_org.style.cursor = "not-allowed";
					frm.cod_ud.style.cursor="not-allowed";
					frm.nom_ud.style.cursor="not-allowed";
				
					
					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
							document.getElementById('nClave').style.display = "none";
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
					}
				
				}else if(frm.NoEncon.value == "NO"){
					consultar();
					
					frm.nom_org.style.cursor = "not-allowed";
					frm.cod_org.style.cursor = "not-allowed";
					frm.nom_mun.readOnly = false;
					frm.cod_org.style.border = "1px solid #0F0FA6";	
					frm.nom_org.style.border = "1px solid #0F0FA6";	
					frm.nom_org.style.cursor = "pointer";
					frm.cod_org.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
					document.getElementById('nClave').style.display = "none";	
				}else{
					Inicio_Deafault();
					
					frm.cod_org.style.cursor="not-allowed";
					frm.nom_org.style.cursor="not-allowed";
					frm.cod_ud.style.cursor="not-allowed";
					frm.nom_ud.style.cursor="not-allowed"
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
<?php include_once("../consultaModal/v_modal_org.php");?>

<?php $_SESSION["operativa-vista"] = "cargo"; // variable para saber en que vista esta ?> 
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar organismo al que pertenece la organizaciòn 
			<u>ejemplo:</u><br> - Organismo:Ministerio del Poder Popular para las Relaciones Interiores Justicia y Paz<br>- Unidad Administrativa: Cuerpo de Invetigaciones Penales y Criminalisticas<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Organismo. </p>
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
