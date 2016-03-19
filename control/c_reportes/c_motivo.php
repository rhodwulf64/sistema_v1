<?php
	include_once('../../modelo/m_reportes/m_motivo.php');
	$obj_motivo= new ClsMotivo();
	$obj_motivo->bus_motivo($_POST);	
?>
