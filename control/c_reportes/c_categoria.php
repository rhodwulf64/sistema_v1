<?php
	include_once('../../modelo/m_reportes/m_categoria.php');
	$ob_cat= new ClsCate();
	

	if($_POST['nom']!="" && isset($_POST['est1'])){
		$ob_cat->bus_cate_filtros($_POST['nom'],$_POST['est1']);
	}else if($_POST['nom'] != ""){
		$ob_cat->bus_cate_filtro($_POST['nom']);
	}else if(isset($_POST['est1'])) {
		$ob_cat->bus_cate_filtro($_POST['est1']);
	}else if($_POST['temp'] == 'General'){
		$ob_cat->bus_cate();
	} 
?>