<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_dev_anulFecha.php');
$obj_rep= new ClsDevolucionAnul();
$obj_rep->buscar($_POST);
?>