<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
?>
<style type="text/css">
	p#M_D{
		background: red;
		padding: 10px;
		color: #fff;
		font-size: 18px;
	}
</style>
<!--***************************************************************************************************-->
	<p id="M_D">Módulo en Desarrollo</p>
<!--***************************************************************************************************-->
<?php
	}
	else{ // entro pero este no es el nivel autorizado
		echo "<h2>No esta autorizado</h2>";
		echo "<input type='button' value='Volver al Home' onclick=\"location.href='../index.php?accion=Inicio'\">";
	}
}
else{  // trata de entrar sin autenticar
	echo "<h2>se tiene que identificar</h2>";
	echo "<input type='button' value='Volver al Home' onclick=\"location.href='../index.php?accion=Inicio'\">";
}
?>