<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_bn.php');
$obj_rep= new ClsBienNac();
$obj_rep->buscar($_POST);
?>