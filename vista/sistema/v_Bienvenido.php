<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "InicioIntranet"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>
<style type="text/css">
	div#img-centro{
		position: relative;
		width: 80%;
		opacity: 0.3;
		margin: auto;
		padding: 80px;
		left: 0px;
	}
	div#img-centro img{
		width: 80%;
	}
</style>
<!--***************************************************************************************************-->
	<p id="mesaje-bienvenida">Bienvenido al Sistema de Bienes Nacionales del CICPC Sub Delegación Acarigua,
	su último inicio de sesión fué el <?php if(isset($_SESSION["u_fecha"])) echo $_SESSION["u_fecha"];?> a las <?php if(isset($_SESSION["u_hora"])) echo $_SESSION["u_hora"];?>.</p>
	<div id="img-centro">
		<img id="img-inicio" src="../../public/img/logo23.png">
	</div>
<!--***************************************************************************************************-->
<?php
	}else{ // entro pero este no es el nivel autorizado
		echo "<h2>No esta autorizado</h2>";
		echo "<input type='button' value='Volver al Home' onclick=\"location.href='../index.php?accion=Inicio'\">";
	}
}else{  // trata de entrar sin autenticar
	echo "<h2>se tiene que identificar</h2>";
	echo "<input type='button' value='Volver al Home' onclick=\"location.href='../index.php?accion=Inicio'\">";
}
?>