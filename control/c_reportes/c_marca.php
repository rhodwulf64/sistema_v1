<?php
session_start();
	include_once('../../modelo/m_reportes/m_marca.php');
	$obj_marca= new ClsMarca();
	
	if($_POST['nom']!="" && isset($_POST['est1'])){
		$obj_marca->bus_marca_filtros($_POST['nom'],$_POST['est1']);
	}else if($_POST['nom'] != ""){
		$obj_marca->bus_marca_filtro($_POST['nom']);
	}else if(isset($_POST['est1'])) {
		$obj_marca->bus_marca_filtro($_POST['est1']);
	}else if($_POST['temp'] == 'General'){
		$obj_marca->bus_marca();
	} 
?>