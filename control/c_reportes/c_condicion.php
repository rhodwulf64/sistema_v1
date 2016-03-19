<?php
@session_start();

include_once('../../modelo/m_reportes/m_condicion.php');
$obj_rep= new ClsCondicion();

if($_POST['nom']!="" && isset($_POST['est1'])){
		$obj_rep->bus_condicion_filtros($_POST['nom'],$_POST['est1']);
	}else if($_POST['nom'] != ""){
		$obj_rep->bus_condicion_filtro($_POST['nom']);
	}else if(isset($_POST['est1'])) {
		$obj_rep->bus_condicion_filtro($_POST['est1']);
	}else if($_POST['temp'] == 'General'){
		$obj_rep->bus_condicion();
	} 
?>