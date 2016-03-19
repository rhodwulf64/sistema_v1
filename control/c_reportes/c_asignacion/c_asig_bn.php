<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_asig_tbien.php');
$obj_rep= new ClsAsignacion();
$obj_rep->buscar($_POST);
?>