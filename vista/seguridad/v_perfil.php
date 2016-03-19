<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3){ // posee el nivel de administrador
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
	span#spanClave,span#spanPreg,span#spanTelf,span#spanCorreo{
		display: none;
	}
	
</style>
<table id="formulario_estilo_individual1" class="formularioPefil">
<caption class="perfil1-tour">Perfil <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-editarperfil ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Seguridad/Perfil1.pdf" target="_black"> <span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
<form method="POST" action="../../control/configuracion/c_personal.php" name="envio_form">
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig" class="cambiarclave-tour">
			<label for="telf" >Cambiar Clave</label><br>
			<button type="button" title="clic para cambiar su clave de acceso al sistema" id="Perfil" class="Perfil" value="npass" name="" onclick="cClave()" ><span id="iconosP" class="icon-key"></span></button>
		</td>
		<td id="r-paddig"class="cambiarpreguntasdeseguridad-tour">
			<label for="ema" >Cambiar Preguntas de Seguridad</label><br>
					<button type="button" title="clic para cambiar su pregunta de seguridad" id="Perfil" class="Perfil" value="npreg" name="" onclick="cPreg()" ><span id="iconosP" class="icon-question"></span></button>
		</td>
		<td id="r-paddig" class="cambiarcorreo-tour">
			<label for="ema">Cambiar Correo Electrónico</label><br>
						<button type="button" title="clic para cambiar su correo electrónico" id="Perfil" class="Perfil" value="Perfil" name="" onclick="cCorreo()" ><span id="iconosP">@</span></button>
		</td>
		<td id="r-paddig"class="cambiarnumerodetelefono-tour">
			<label for="ema">Cambiar Número de Teléfono</label><br>
						<button type="button" title="clic para cambiar su número de teléfono"id="Perfil" class="Perfil" value="Perfil" name="" onclick="cTelf()" ><span id="iconosP" class="icon-mobile2"></span></button>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>

</form>
</table>
<br>		
<!-- Incluyos las todas las vistas del modulo de editar claves -->
<?php include_once("../seguridad/v_perfil_nClave.php"); ?>
<?php include_once("../seguridad/v_perfil_cambiarPreguntas_S.php"); ?>
<?php include_once("../seguridad/v_perfil_cambiarTelf.php"); ?>
<?php include_once("../seguridad/v_perfil_cambiarCorreo.php"); ?>

<script type="text/javascript">
	// var pass = document.getElementById("nPass");
	// var preg = document.getElementById("nPreguntas");
	function cClave(){
		if(document.getElementById("spanClave").style.display == "block"){
			document.getElementById("spanClave").style.display = "none";
			document.getElementById("spanPreg").style.display = "none";
			document.getElementById("spanTelf").style.display = "none";
			document.getElementById("spanCorreo").style.display = "none";
		}else{
			document.getElementById("spanClave").style.display = "block";
			document.getElementById("spanCorreo").style.display = "none";
			document.getElementById("spanPreg").style.display = "none";
			document.getElementById("spanTelf").style.display = "none";
			document.getElementById("spanCorreo").style.display = "none";
		}
	}
	function cPreg(){
		if(document.getElementById("spanPreg").style.display == "block"){
			document.getElementById("spanClave").style.display = "none";
			document.getElementById("spanPreg").style.display = "none";
			document.getElementById("spanTelf").style.display = "none";
			document.getElementById("spanCorreo").style.display = "none";
		}else{
			document.getElementById("spanClave").style.display = "none";
			document.getElementById("spanTelf").style.display = "none";
			document.getElementById("spanPreg").style.display = "block";
			document.getElementById("spanCorreo").style.display = "none";
		}
	}
	function cTelf(){
		if(document.getElementById("spanTelf").style.display == "block"){
			document.getElementById("spanTelf").style.display = "none";
			document.getElementById("spanClave").style.display = "none";
			document.getElementById("spanPreg").style.display = "none";
			document.getElementById("spanCorreo").style.display = "none";
		}else{
			document.getElementById("spanTelf").style.display = "block";
			document.getElementById("spanClave").style.display = "none";
			document.getElementById("spanPreg").style.display = "none";
			document.getElementById("spanCorreo").style.display = "none";
		}
	}
	function cCorreo(){
		if(document.getElementById("spanCorreo").style.display == "block"){
			document.getElementById("spanCorreo").style.display = "none";
			document.getElementById("spanTelf").style.display = "none";
			document.getElementById("spanClave").style.display = "none";
			document.getElementById("spanPreg").style.display = "none";
		}else{
			document.getElementById("spanCorreo").style.display = "block";
			document.getElementById("spanTelf").style.display = "none";
			document.getElementById("spanClave").style.display = "none";
			document.getElementById("spanPreg").style.display = "none";
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



