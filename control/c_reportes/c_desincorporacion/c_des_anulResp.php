<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_des_anulResp.php');
$obj_rep= new ClsDesincorporacionAnul();
$obj_rep->buscar($_POST);
?>