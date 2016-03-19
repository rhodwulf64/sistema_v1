<?php
include_once('../../modelo/m_reportes/m_org.php');
$ob_org= new ClsOrg();
$ob_org->buscar($_POST);
?>