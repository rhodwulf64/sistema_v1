<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_recep_respAnul.php');
$obj_rep= new ClsRecepcionAnul();
$obj_rep->buscar($_POST);
?>