<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_des_fecha.php');
$obj_rep= new ClsDesincorporacion();
$obj_rep->buscar($_POST);
?>