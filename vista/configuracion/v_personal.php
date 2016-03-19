<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "personal"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_personal.php",true);

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
			
			ajax.send("operacion=busquedaAjax&status=1&personal="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&personal="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&personal="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<table id="formulario_estilo_individual1">
<caption class="personal-tour">Personal<span title="Clic para ver ayuda guiada"class="icon-magic-wand element-personal ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Estructura Organizativa/Personal1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></caption>
<form method="POST" action="../../control/configuracion/c_personal.php" name="envio_form" autocomplete="off">
	<!-- variable para saber si esta en la pantalla completa o minilista -->
	<tr>
		<td id="r-paddig" class="cedulapersonal-tour">
			<label for="ced" >Cédula:<span class="asterisco">*</span></label><br>
			<input type="text" maxlength="12" class='CampoMov' title="Ingrese la cedúla del personal" placeholder="Ingrese solo numeros" readonly="readonly"  id="ced" name="ced" onkeypress="return SoloNumeros(event)" onblur="automatico_usuario()" value="<?php if(isset($_SESSION['ced_per'])) echo $_SESSION['ced_per']; ?>" /> 
		</td>
		<td id="r-paddig" class="nombrespersonal-tour">
			<label for="nom" >Nombres:<span class="asterisco">*</span></label><br>
			<input type="text" onBlur="cambio_mayus(this)" class='CampoMov' placeholder="Ingrese solo letras" title="Ingrese los nombres del personal"  readonly="readonly" id="nom" size="26" name="nom" onkeypress="return SoloLetras(event)"  value="<?php if(isset($_SESSION['nom_per'])) echo $_SESSION['nom_per']; ?>" /> 
		</td>
		<td id="r-paddig" class="apellidospersonal-tour">
			<label for="ape">Apellidos:<span class="asterisco">*</span></label><br>
			<input type="text" onBlur="cambio_mayus(this)" class='CampoMov' placeholder="Ingrese solo letas" title="Ingrese los apellidos del personal" readonly="readonly" id="ape" size="26" name="ape" onkeypress="return SoloLetras(event)" value="<?php if(isset($_SESSION['ape_per'])) echo $_SESSION['ape_per']; ?>" /> 
		</td>
	</tr>
	<tr>
		<td id="r-paddig" class="nombrecargopersonal-tour">
			<label >Nombre del Cargo:<span class="asterisco">*</span></label><br>
			<?php
				include_once('../../control/configuracion/c_cargo.php');
				$ArrayCargo = array();
			    $combCargo  = "";
				if(isset($_SESSION['cod_cargo_p'])){
					$combCargo = $_SESSION['cod_cargo_p'];
				}
				$ArrayCargo=DibCombCargo($combCargo);
						
				foreach ($ArrayCargo as $elemento){
					echo $elemento;
				}
			?>
		</td>
		<td id="r-paddig" style="width:32%;" class="nombredepartamento-tour">
			<label >Nombre del Departamento: <span class="asterisco">*</span></label><br>
			<?php
				include_once('../../control/configuracion/c_dep.php');
				$ArrayDep = array();
			    $combDep = "";
				if(isset($_SESSION['cod_dep_p'])){
					$combDep=$_SESSION['cod_dep_p'];
				}
				$ArrayDep=PintaDep($combDep);
						
				foreach ($ArrayDep as $elemento){
					echo $elemento;
				}
			?>
		</td>
		<td id="r-paddig" class="telefonopersonal-tour">
			<label for="telf" >Teléfono:</label><br>
			<input type="text" onBlur="cambio_mayus(this)" class='CampoMov' maxlength="11" title="Ingrese la cedúla del personal" placeholder="Ingrese solo numeros" readonly="readonly"  id="telf" name="telf" onkeypress="return SoloNumeros(event)" onblur="automatico_usuario()" value="<?php if(isset($_SESSION['telf_per'])) echo $_SESSION['telf_per']; ?>" /> 
		</td>
	</tr>
	<tr>
		<td id="r-paddig" colspan="2" class="correopersonal-tour">
			<label for="email">Correo:</label><br>
			<input type="text" onBlur="cambio_mayus(this)" class='CampoMov' maxlength="50" title="Ingrese la cedúla del personal" placeholder="Ingrese solo numeros" readonly="readonly"  id="email" name="email" onkeypress="return SoloNumeros(event)" onblur="automatico_usuario()" value="<?php if(isset($_SESSION['email_per'])) echo $_SESSION['email_per']; ?>" /> 
		</td>
		<td id="r-paddig"></td>
	</tr>
	<tr class="botonera-tour" id="botonera">
		<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION['res'])) echo $_SESSION['res']; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION['opActDesPersonal'])) echo $_SESSION['opActDesPersonal']; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION['tipoMod'])) echo $_SESSION['tipoMod']; ?>">
			<input type="hidden" name="idced" value="<?php if(isset($_SESSION['idced'])) echo $_SESSION['idced']; ?>">
			<input type="hidden" name="modificar">
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para Incluir un personal" name="inc" value="Incluir" onclick="General_Personal(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar un personal" value="Consultar" name="bus" onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar un personal" value="Grabar"  name="grab" onclick="General_Personal(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar un personal" value="Modificar"  name="mod" onclick="General_Personal(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta" onclick="General_Personal(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para activar el personal">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar el personal">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación" value="Cancelar" name="cancel" onclick="General_Personal(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<!-- <button type="button" title="Clic para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
			<script>
				frm = document.envio_form;

				if(frm.ced.value!="" && frm.idced.value !=""){
					Encontrado_si();
					frm.ced.style.cursor = "not-allowed";
					frm.nom.style.cursor = "not-allowed";
					frm.ape.style.cursor = "not-allowed";
					frm.dep.style.cursor = "not-allowed";
					frm.car.style.cursor = "not-allowed";

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
					frm.ced.style.cursor = "not-allowed";
					frm.nom.style.cursor = "not-allowed";
					frm.ape.style.cursor = "not-allowed";
					frm.dep.style.cursor = "not-allowed";
					frm.car.style.cursor = "not-allowed";
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
	<?php include_once("../sistema/camposObligatorios.php"); ?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/v_modal_personal.php"); ?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar del Personal de la organizaciòn
			<u>ejemplo:</u><br>- Personal:Jose Camacho <br>- Cargo: Jefe de Sub Delegaciòn<br>
			El boton "Consultar" permite ver los cargos registrados hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Cargo. </p>
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





