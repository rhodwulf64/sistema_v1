<?php
include_once('../../modelo/m_reportes/m_bitacora.php');
$obj_bitacora = new ClsBitacora();
$obj_bitacora->buscar($_POST);
?>