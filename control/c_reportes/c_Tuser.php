<?php
	include_once('../../modelo/m_reportes/m_tuser.php');
	$ob_est= new ClsTuser();
	$ob_est->buscar($_POST);
?>