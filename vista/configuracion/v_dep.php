<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

		$_SESSION["operativa-vista"] = "departamento"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
		include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_dep.php",true);

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
			
			ajax.send("operacion=busquedaAjax&status=1&depart="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&depart="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&depart="+valor); //paso variable con estatus Nulo y nombre
		}
	}
</script>
<style type="text/css">
	#deposito-dep{
		position: relative;
		left: 10px;
		top:22px;
	}

</style>
<table id="formulario">
<form method="POST" action="../../control/configuracion/c_dep.php" name="envio_form" id="formulario_estilo" autocomplete="off">
	<caption class="departamento-tour">Departamento<span title="Clic para ver ayuda guiada"class="icon-magic-wand element-dep ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Estructura Organizativa/Departamento1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
		<input type="hidden" name="cod_dep"  value="<?php if(isset($_SESSION['cod_dep'])) echo $_SESSION['cod_dep']; ?>"/>
		<!--<tr>
			<td align="right">
				<label for="cod_dep">Código de Departamento </label>
			</td>
			<td>
				<input type="text" id="cod_dep" name="cod_dep" value="<?php if(isset($_GET['cod_dep'])) echo $_GET['cod_dep']; ?>" /><span class="asterisco">*</span>
			</td>
		</tr>
		<tr>-->
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="MensajeAyuda nombredepartamento-tour" colspan="2">
				<label for="des_dep">Nombre del Departamento:<span class="asterisco">*</span></label><br>
				<input type="text" readonly="" onkeyup="quitarValidacion()" id="des_dep" title="Ingrese el nombre del departamento" placeholder="Ingrese solo letras" name="nom_dep" value="<?php if(isset($_SESSION['nom_dep'])) echo $_SESSION['nom_dep']; ?>" onkeypress="return SoloLetrasYnumeros(event)" onBlur="cambio_mayus(this)">
				<span id="nube" class="nube" style="">Solo se permiten letras y Números</span>
			</td>
			<td></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="nombresede-tour">
				<label for="cod_sed">Nombre de la Sede:<span class="asterisco">*</span></label><br>
				<?php
					include_once('../../control/configuracion/c_sede.php');
					
					$cboSede = array();
					
					if(isset($_SESSION['cod_sed'])){
						$codSede = $_SESSION['cod_sed'];
					}else{
						$codSede = "";
					}
					
					$cboSede = PintaSede($codSede);
						
					foreach ($cboSede as $elementos){
						echo $elementos;   
					}
				?>
			</td>
			<td>
				<span id="deposito-dep" class="departamentodeposito-tour">¿El Departamento es un Deposito?
					<input type="checkbox" name="deposito" value="1">
				</span>
			</td>
			<td></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr class="botonera-tour" id="botonera">
		<td align="center" colspan="5"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesDepart"])) echo $_SESSION["opActDesDepart"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para Incluir un departamento" name="inc" value="Incluir" onclick="General_depart(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar un departamento" value="Consultar"  name="bus"    onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar un departamento" value="Grabar"     name="grab"   onclick="General_depart(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar un departamento" value="Modificar"  name="mod"    onclick="General_depart(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta"    onclick="General_depart(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para activar el departamento">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar el departamento">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación" value="Cancelar"   name="cancel" onclick="General_depart(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			
			<script>
				frm = document.envio_form;
				
				if(frm.cod_dep.value!=""){
					Encontrado_si();
					frm.nom_dep.style.cursor = "not-allowed";
					frm.cod_sed.style.cursor = "not-allowed";

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
						document.getElementById('nClave').style.display = "none";
					}
				
				}else if(frm.NoEncon.value == "NO"){
					consultar();
					
					frm.nom_dep.style.cursor = "not-allowed";
					frm.cod_sed.style.cursor = "not-allowed";
					frm.nom_dep.readOnly = false;
					frm.nom_dep.style.border = "1px solid #0F0FA6";	
					frm.nom_dep.style.cursor = "pointer";
					frm.nom_dep.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
					document.getElementById('nClave').style.display = "none";	
				}else{
					Inicio_Deafault();
					
					frm.nom_dep.style.cursor = "not-allowed";
					frm.cod_sed.style.cursor = "not-allowed";
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
	<?php include_once("../consultaModal/v_modal_depart.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar los Departamentos de la organizaciòn
			<u>ejemplo:</u><br> Departamento: Operaciones <br>
			El boton "Consultar" permite ver los Departamentos registrados hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Departamento.<br>
			Tilde la opciòn " ¿El Departamento es un Deposito? " para alquellos departamentos que manejen el inventario de Bienes Nacionales </p>
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