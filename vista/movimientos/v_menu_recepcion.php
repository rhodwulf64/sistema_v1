<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador
?>

<!-- ********************* Validar Período Abierto ****************** -->
<?php if(isset($_SESSION["Nom_periodo_mostrar"])){ ?>
	<span id="mostrar-periodo">Período: <?php echo $_SESSION["Nom_periodo_mostrar"]; ?></span>
<?php }else{ ?>
	<span id="mostrar-periodo">Período: </span>
	<span id="msj-No-Hay-periodo">El periodo se encuentra cerrado, no podrá realizar ningun movimiento sobre el inventario.</span>
<?php } ?>
<!-- ********************* Cierre Validar Período Abierto ****************** -->

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
<caption>Recepción<span id="ic-ayuda-frm" class="icon-question" title="Clic para ver ayuda"></span></caption>
<form method="POST" action="../../control/configuracion/c_personal.php" name="envio_form">
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig">
			<label for="telf">Registrar Datos de Entrada</label><br>
			<button type="button" title="clic para cambiar su clave de acceso al sistema" id="Perfil" class="Perfil" value="npass" name="" onclick="cClave()" ><span id="iconosP" class="icon-file-text2"></button>
		</td>
		<td id="r-paddig">
			<label for="ema">Registrar Datos del Bien</label><br>
			<button type="button" title="clic para cambiar su pregunta de seguridad" id="Perfil" class="Perfil" value="npreg" name="" onclick="cPreg()" ><span id="iconosP" class="icon-file-text2"></button>
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