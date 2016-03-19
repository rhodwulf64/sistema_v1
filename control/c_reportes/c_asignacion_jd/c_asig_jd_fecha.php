<?php
error_reporting(0);
include_once('../../../modelo/m_reportes/modelo_rep_jd/m_asig_jd_fecha.php');
$obj_rep= new ClsAsignacionDepFecha();
$resp=$_SESSION['id_persona'];
$cod=$_SESSION['id_resdep'];
$obj_rep->buscar($_POST['fecha1'],$_POST['fecha2'],$cod,$resp);

?>