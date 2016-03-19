<?php
	include_once('../../modelo/m_reportes/m_prov.php');
	$ob_prov= new ClsProv();
	

		if($_POST['nom']!="" && isset($_POST['est1'])){
		$ob_prov->bus_prov_filtros($_POST['nom'],$_POST['est1']);
	}else if($_POST['nom'] != ""){
		$ob_prov->bus_prov_filtro($_POST['nom']);
	}else if(isset($_POST['est1'])) {
		$ob_prov->bus_prov_filtro($_POST['est1']);
	}else if($_POST['temp'] == 'General'){
		$ob_prov->bus_prov();
	} 
?>