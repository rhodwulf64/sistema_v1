<?php
	include_once('../../modelo/m_reportes/m_tbien.php');
	$ob_dep= new ClsTbien();
	$ob_dep->buscar($_POST);

?>
