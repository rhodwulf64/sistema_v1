<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
?>
<style>
	.formularioPefil{
		text-align: center;
	}
	#formulario_estilo_individual1 #Perfil{
		background: #023859;
		color: #fff;
	}
	#formulario_estilo_individual1 #Perfil:hover{
		cursor: pointer;
		opacity: 0.9;
	}
	#formulario_estilo_individual1 #iconosP{
		font-size: 18px;
	}
	span#spanContacto,span#spanMision,span#spanNoticias,span#spanObjetivos,span#spanQs,span#spanSede,span#spanVision{
		display: none;
	}
	
</style>
<table  id="formulario_estilo_individual1" class="formularioPefil">
<caption class="sistema1-tour">Sistema <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-sistema ayuda-local-frm ayudaguiada-tour"></span> </caption>
<form method="POST" action="../../control/configuracion/c_sistema.php" name="envio_form">
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="asignarsedesistema-tour">
			<label for="telf" >Asignar Sede al Sistema</label><br>
			<button type="button" title="click para cambiar su clave de acceso al sistema" id="Perfil" class="Perfil" value="npass" name="" onclick="cSede()" ><span id="iconosP" class="icon-cogs"></span></button>
		</td>
		<td id="r-paddig" class="cambiarquienessomos-tour">
			<label for="ema">Cambiar ¿Quienes Somos?</label><br>
			<button type="button" title="click para cambiar su pregunta de seguridad" id="Perfil" class="Perfil" value="npreg" name="" onclick="cQs()" ><span id="iconosP" class="icon-cogs"></span></button>
		</td>
		<td id="r-paddig" class="cambiarmision-tour">
			<label for="ema">Cambiar Misión</label><br>
			<button type="button" title="click para cambiar su correo electrónico" id="Perfil" class="Perfil" value="Perfil" name="" onclick="cMision()" ><span id="iconosP" class="icon-cogs"></span></button>
		</td>
		<td id="r-paddig" class="cambiarvision-tour">
			<label for="telf" >Cambiar Visión</label><br>
			<button type="button" title="click para cambiar su correo electrónico" id="Perfil" class="Perfil" value="Perfil" name="" onclick="cVision()" ><span id="iconosP" class="icon-cogs"></span></button>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<!-- ************** segunda columna ************ -->
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="cambiarobjetivos-tour">
			<label for="telf" >Cambiar Objetivos</label><br>
			<button type="button" title="click para cambiar su clave de acceso al sistema" id="Perfil" class="Perfil" value="npass" name="" onclick="cObjetivos()" ><span id="iconosP" class="icon-cogs"></span></button>
		</td>
		<td id="r-paddig" class="cambiarcontacto-tour">
			<label for="ema" >Cambiar Contácto</label><br>
        <button type="button" title="click para cambiar su pregunta de seguridad" id="Perfil" class="Perfil" value="npreg" name="" onclick="cContacto()" ><span id="iconosP" class="icon-cogs"></span></button>
		</td>
		<td id="r-paddig"class="cambiarnoticias-tour">
			<label for="ema" >Cambiar Noticias</label><br>
        <button type="button" title="click para cambiar su correo electrónico" id="Perfil" class="Perfil" value="Perfil" name="" onclick="cNoticias()" ><span id="iconosP" class="icon-cogs"></span></button>
		</td>
		<td></td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	
</form>
</table>
<br>		
<!-- Incluyos las todas las vistas del modulo de editar claves -->
<?php include_once("../seguridad/v_sistema_cSede.php"); ?>
<?php include_once("../seguridad/v_sistema_cQs.php"); ?>
<?php include_once("../seguridad/v_sistema_cMision.php"); ?>
<?php include_once("../seguridad/v_sistema_cVision.php"); ?>
<?php include_once("../seguridad/v_sistema_cObjetivos.php"); ?>
<?php include_once("../seguridad/v_sistema_cContacto.php"); ?>
<?php include_once("../seguridad/v_sistema_cNoticias.php"); ?>

<script type="text/javascript">
	// var pass = document.getElementById("nPass");
	// var preg = document.getElementById("nPreguntas");
	function cSede(){
		if(document.getElementById("spanSede").style.display == "block"){
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}else{
			document.getElementById("spanSede").style.display = "block";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}
	}
	function cQs(){
		if(document.getElementById("spanQs").style.display == "block"){
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}else{
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "block";
			document.getElementById("spanVision").style.display = "none";
		}
		
	}
	function cMision(){
		if(document.getElementById("spanMision").style.display == "block"){
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}else{
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "block";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}
	}
	function cVision(){
		if(document.getElementById("spanVision").style.display == "block"){
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}else{
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "block";
		}
	}
	function cObjetivos(){
		if(document.getElementById("spanObjetivos").style.display == "block"){
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}else{
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "block";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}
	}
	function cContacto(){
		if(document.getElementById("spanContacto").style.display == "block"){
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}else{
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "block";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}
	}
	function cNoticias(){
		if(document.getElementById("spanNoticias").style.display == "block"){
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "none";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}else{
			document.getElementById("spanSede").style.display = "none";
			document.getElementById("spanContacto").style.display = "none";
			document.getElementById("spanMision").style.display = "none";
			document.getElementById("spanNoticias").style.display = "block";
			document.getElementById("spanObjetivos").style.display = "none";
			document.getElementById("spanQs").style.display = "none";
			document.getElementById("spanVision").style.display = "none";
		}
	}
</script>

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


