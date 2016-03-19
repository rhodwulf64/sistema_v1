<?php
	include_once('../../modelo/m_reportes/m_estado.php');
	$ob_est= new ClsEstado();

	if($_POST['nom']!="" && isset($_POST['est1'])){
		$ob_est->bus_estado_filtros($_POST['nom'],$_POST['est1']);
	}else if($_POST['nom'] != ""){
		$ob_est->bus_estado_filtro($_POST['nom']);
	}else if(isset($_POST['est1'])) {
		$ob_est->bus_estado_filtro($_POST['est1']);
	}else if(isset($_POST['temp']) && $_POST['temp'] == 'General'){
		$ob_est->bus_estado();
	} 
?>