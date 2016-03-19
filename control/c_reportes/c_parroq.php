<?php
	include_once('../../modelo/m_reportes/m_parroq.php');
	$ob_parroq= new ClsParroquia();
	$ob_parroq->buscar($_POST);
?>