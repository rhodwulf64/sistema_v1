<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_asig_anul.php');
$obj_rep= new ClsAsignacionAnul();
$obj_rep->buscar($_POST);
?>