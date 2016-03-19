<?php

	include_once('../../modelo/m_reportes/m_periodo.php');
	$obj_rep= new ClsPeriodo();
	$obj_rep->bus_Periodo($_POST);

?>