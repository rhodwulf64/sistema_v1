<?php 
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
?>

<!--***************************************************************************************************-->
	<p class="titulo_principal"><span id="iconos" class="icon-question"></span>Panel de Ayuda</p>
	<p class="titulo_secundario">Título Ayuda</p>
	<p class="contenido">Éste es el panel de ayuda del CICPC Sub Delegación Acarigua</p>

	<p class="titulo_secundario">Título Ayuda</p>
	<p class="contenido">Éste es el panel de ayuda del CICPC Sub Delegación Acarigua</p>

	<p class="titulo_secundario">Título Ayuda</p>
	<p class="contenido">Éste es el panel de ayuda del CICPC Sub Delegación Acarigua</p>
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