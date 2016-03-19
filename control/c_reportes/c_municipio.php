<?php
	include_once('../../modelo/m_reportes/m_municipio.php');
	$ob_municipio= new ClsMunicipio();
	
	$ob_municipio->buscar($_POST);

	// if($_POST['nom']!="" && isset($_POST['est1'])){
	// 	$ob_municipio->bus_municipio_filtros($_POST['nom'],$_POST['est1']);
	// }else if($_POST['nom'] != ""){
	// 	$ob_municipio->bus_municipio_filtro($_POST['nom']);
	// }else if(isset($_POST['est1'])) {
	// 	$ob_municipio->bus_municipio_filtro($_POST['est1']);
	// }else if($_POST['todo'] == 'General'){
	// 	$ob_municipio->bus_municipio();
	// } 
?>