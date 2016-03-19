<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_bn_hist.php');
$obj_rep= new ClsBienNacHist();
$obj_rep->buscar($_POST['cod']);
?>