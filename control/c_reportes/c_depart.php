<?php
	include_once('../../modelo/m_reportes/m_depart.php');
	$ob_dep= new ClsDepart();
	

	
		$ob_dep->buscar($_POST);
	
?>
