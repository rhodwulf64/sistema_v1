<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_recep_tmov.php');
$obj_rep= new ClsRecepcion();
$obj_rep->buscar_tmov($_POST['id_motivo_mov']);
?>
