<?php
 include_once('../../../modelo/m_reportes/modelo_trans/m_asig_fecha.php');
$obj_rep= new ClsAsignacion();
$obj_rep->buscar_fecha($_POST['fecha1'],$_POST['fecha2']);
 ?>
