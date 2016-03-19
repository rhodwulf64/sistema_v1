<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_dev_tbien.php');
$obj_rep= new ClsDevolucion();
$obj_rep->buscar($_POST);
?>