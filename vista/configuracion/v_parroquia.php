<?php error_reporting(0);
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "parroquia"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_parroquia.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		
		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&parroquia="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&parroquia="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&parroquia="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>

<table id="formulario_estilo_individual1">
	<form method="POST" action="../../control/configuracion/c_parroquia.php" name="envio_form" id="formulario_estilo" autocomplete="off">
	<caption class="parroquia-tour">Parroquia <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-parroquia ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Estructura geografica/Parroquia1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></caption>
	<input type="hidden" name="cod_ciu" value="<?php if(isset($_SESSION['id_parroq'])) echo $_SESSION['id_parroq'];?>"/>
		<!--<tr>
			<td>	
				<label for="cod_ciu">Codigo de Ciudad </label>
			</td>
			<td>
				<input type="text" size="4" id="cod_ciu" name="cod_ciu" value="<?php //if(isset($_GET['cod_ciu'])) echo $_GET['cod_ciu'];?>" onkeypress="return  SoloNumeros(event)"><span class="asterisco">*</span>
			</td>
		</tr>	
		<tr>-->
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="MensajesAyuda nombreparroquia-tour">	
				<label for="nom_ciu" >Nombre de la Parroquia:<span class="asterisco">*</span></label><br>
				<input type="text" class='CampoMov' onkeyup="quitarValidacion()" title="Ingrese el nombre de la parroquia" readonly="readonly" placeholder="Ingrese solo letras" size="29" id="nom_ciu" name="nom_ciu"  value="<?php if(isset($_SESSION['nom_parroq'])) echo $_SESSION['nom_parroq'];?>" onkeypress="return SoloLetras(event)" onBlur="cambio_mayus(this)">
				<span id="nube" class="nube" style="">Solo se permiten letras</span>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="municipio1-tour">
				Nombre del Municipio:<span class="asterisco">*</span><br>
				<?php
					include_once('../../control/configuracion/c_municipio.php');
					
					$cboMunicipio = array();
					
					if(isset($_SESSION['id_mun'])){
						$codMunicipio = $_SESSION['id_mun'];
					}else{
						$codMunicipio = "";
					}
					
					$cboMunicipio = PintaMunicipio($codMunicipio);
						
					foreach ($cboMunicipio as $elementos){
						echo $elementos;   
					}
				?>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr class="botonera-tour" id="botonera">
		<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesParroquia"])) echo $_SESSION["opActDesParroquia"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para Incluir una parroquia"name="inc" value="Incluir" onclick="General_ciudad(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar una parroquia" value="Consultar" name="bus" onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar una parroquia"  value="Grabar" name="grab" onclick="General_ciudad(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar una parroquia" value="Modificar" name="mod" onclick="General_ciudad(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta" onclick="General_ciudad(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="clic para activar la parroquia">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="clic para desactivar la parroquia">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación" value="Cancelar" name="cancel" onclick="General_ciudad(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
			<script>
				frm = document.envio_form;
				
				if(frm.cod_ciu.value!=""){
					Encontrado_si();
					frm.nom_ciu.style.cursor = "not-allowed";
					frm.cod_ciu.style.cursor = "not-allowed";

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
				
				}else{
					Inicio_Deafault();
					
					frm.nom_ciu.style.cursor = "not-allowed";
					frm.cod_ciu.style.cursor = "not-allowed";
					
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
<?php include_once("../consultaModal/v_modal_parroquia.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar las parroquias donde se encuentra la organizaciòn
			<u>ejemplo:</u><br>- Parroquia: Bella Vista<br>- Municipio: Paez<br>
			El boton "Consultar" permite ver los parroquias registradas hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Parroquias. </p>
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
