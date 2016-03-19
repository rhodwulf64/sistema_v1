<?php
include_once('../../../modelo/m_reportes/m_bitacoraMov.php');
$obj_bitacora= new ClsBitacoraMov();
$obj_bitacora->buscar($_POST);
?>