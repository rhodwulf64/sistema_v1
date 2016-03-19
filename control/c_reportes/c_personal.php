<?php
include_once('../../modelo/m_reportes/m_personal.php');
$ob_per= new ClsPersonal();
$ob_per->buscar($_POST);
?>