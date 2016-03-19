<?php @session_start();
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
	span#spanAsigUser,span#spanDesbloq,span#spanBloq{
		display: none;
	}
	
</style>
<table id="formulario_estilo_individual1" class="formularioPefil">
<caption class="usuario-tour">Usuario <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-usuario ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Seguridad/Usuario1.pdf" target="_black"> <span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
	<tr>
		<td ><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig"  class="asignarusuario-tour">
			<label for="telf">Asignar Usuario</label><br>
			<button type="button" title="clic para asignar un usuario" id="Perfil" class="Perfil" value="npass" name="" onclick="cAsignar()" ><span id="iconosP" class="icon-user"></span></button>
		</td>
		<td id="r-paddig" class="bloquearusuario-tour">
			<label for="ema">Bloquear Usuario/Resetear Usuario</label><br>
			<button type="button" title="clic para bloquear un usuario" id="Perfil" class="Perfil" value="npreg" name="" onclick="cBloq();Listar6()" ><span id="iconosP" class="icon-user-minus"></span></button>
		</td>
		<td id="r-paddig" class="desbloquearusuario-tour">
			<label for="ema">Desbloquear Usuario</label><br>
			<button type="button" title="clic para desbloquear un usuario" id="Perfil" class="Perfil" value="Perfil" name="" onclick="cDesbloq();Listar7()" ><span id="iconosP" class="icon-user-check"></span></button>
		</td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
</table>
<br>		
<!-- Incluyos las todas las vistas del modulo de editar claves -->
<?php include_once("v_menu_usuarios_Asignar.php"); ?>
<?php include_once("../consultaModal/v_modal_bloquear_usr.php"); ?>
<?php include_once("../consultaModal/v_modal_desbloquear_usr.php"); ?>
<form name="form_usuarios">
	<input type="hidden" id="HiddenModadlBloquear" name="HiddenModadlBloquear" value="<?php if(isset($_SESSION["HiddenModadlBloquear"])) echo "datos"; ?>" >
	<input type="hidden" id="HiddenModadlDesBloquear" name="HiddenModadlDesBloquear" value="<?php if(isset($_SESSION["HiddenModadlDesBloquear"])) echo "datos"; ?>" >
</form>
<script type="text/javascript">
	// var pass = document.getElementById("nPass");
	// var preg = document.getElementById("nPreguntas");

	if(document.form_usuarios.HiddenModadlBloquear.value == "datos"){
		Listar6();
	}else if(document.getElementById("HiddenModadlDesBloquear").value == "datos"){
		Listar7();
	}
	function cAsignar(){
		if(document.getElementById("spanAsigUser").style.display == "block"){
			document.getElementById("spanAsigUser").style.display = "none";
			document.getElementById("spanDesbloq").style.display = "none";
			document.getElementById("spanBloq").style.display = "none";
		}else{
			document.getElementById("spanAsigUser").style.display = "block";
			document.getElementById("spanDesbloq").style.display = "none";
			document.getElementById("spanBloq").style.display = "none";
		}
	}
	function cBloq(){
		document.getElementById("spanAsigUser").style.display = "none";
	}
	function cDesbloq(){
		document.getElementById("spanAsigUser").style.display = "none";
	}
	 // function cBloq(){
	 // 	if(document.getElementById("spanBloq").style.display == "block"){
	 // 		document.getElementById("spanAsigUser").style.display = "none";
	 // 		document.getElementById("spanDesbloq").style.display = "none";
	 // 		document.getElementById("spanBloq").style.display = "none";
	 // 	}else{
	 // 		document.getElementById("spanAsigUser").style.display = "none";
	 // 		document.getElementById("spanDesbloq").style.display = "none";
	 // 		document.getElementById("spanBloq").style.display = "block";
	 // 	}
	 // }
	// function cDesbloq(){
	// 	if(document.getElementById("spanDesbloq").style.display == "block"){
	// 		document.getElementById("spanAsigUser").style.display = "none";
	// 		document.getElementById("spanDesbloq").style.display = "none";
	// 		document.getElementById("spanBloq").style.display = "none";
	// 	}else{
	// 		document.getElementById("spanAsigUser").style.display = "none";
	// 		document.getElementById("spanDesbloq").style.display = "block";
	// 		document.getElementById("spanBloq").style.display = "none";
	// 	}
	// }
</script>
<?php if(isset($_SESSION["HiddenModadlBloquear"])) unset($_SESSION["HiddenModadlBloquear"]); ?>
<?php if(isset($_SESSION["HiddenModadlDesBloquear"])) unset($_SESSION["HiddenModadlDesBloquear"]); ?>
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


