<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "condicion"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>	
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_condicion.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		
		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&condicion="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&condicion="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&condicion="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<table id="formulario">
	<form method="POST" action="../../control/configuracion/c_condicion.php" name="envio_form" id="formulario_estilo" autocomplete="off">
	<caption class="condicion-tour">Condición <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-condicion ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Bienes nacionales/Condición1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
		<input type="hidden"  name="cod_cond" value="<?php if(isset($_SESSION['cod_cond'])) echo $_SESSION['cod_cond'];?>" />
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="condicion1-tour">	
				<label for="nom_cond">Condición:<span class="asterisco">*</span></label><br>
				<input type="text" title="Ingrese el nombre de la condición"  readonly="readonly" onBlur="cambio_mayus(this)" placeholder="Ingrese solo letras" size="25" id="nom_cond" name="nom_cond" value="<?php if(isset($_SESSION['nom_cond'])) echo $_SESSION['nom_cond'];?>" onkeypress="return SoloLetras(event)" />
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr id="botonera" class="botonera-tour">
		<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesCondicion"])) echo $_SESSION["opActDesCondicion"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para Incluir una condición"name="inc" value="Incluir" onclick="General_condicion(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Modificar una condición"value="Consultar"  name="bus"    onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar una condición"value="Grabar"     name="grab"   onclick="General_condicion(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar una condición"value="Modificar"  name="mod"    onclick="General_condicion(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta" onclick="General_condicion(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para activar la condición">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar una condición">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación"value="Cancelar"   name="cancel" onclick="General_condicion(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
			<script>
				frm = document.envio_form;
				
				if(frm.cod_cond.value!=""){
					Encontrado_si();
					frm.nom_cond.style.cursor = "not-allowed";
				

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
					
					frm.nom_cond.style.cursor = "not-allowed";
					
					frm.nom_cond.readOnly = false;
					frm.nom_cond.style.border = "1px solid #0F0FA6";	
					frm.nom_cond.style.cursor = "pointer";
					frm.nom_cond.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
					document.getElementById('nClave').style.display = "none";	
				}else{
					Inicio_Deafault();
					frm.nom_cond.style.cursor = "not-allowed";
					
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
<?php include_once("../consultaModal/v_modal_condicion.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar las Condiciones de los Bienes Nacionales dentro del inventario.
			<u>ejemplo:</u><br> - Condición: Asignado<br>
			El boton "Consultar" permite ver las Condiciones registradas hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Condición. </p>
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