<?php
include_once('../../../modelo/m_reportes/modelo_rep_jd/m_dev_jd.php');
$obj_rep = new ClsDevolucionJd();
$resp=$_SESSION['id_persona'];
$cod=$_SESSION['id_resdep'];
$obj_rep->buscar($cod,$resp);

?>