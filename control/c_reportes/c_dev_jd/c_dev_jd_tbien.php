<?php
error_reporting(0);
include_once('../../../modelo/m_reportes/modelo_rep_jd/m_dev_jd_tbien.php');
$obj_rep = new ClsDevolucionJdTbien();
$resp=$_SESSION['id_persona'];
$cod=$_SESSION['id_resdep'];
$obj_rep->buscar($cod,$resp,$_POST['tbien']);

?>