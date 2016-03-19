<?php
session_start();
include_once('../../../modelo/m_reportes/modelo_rep_jd/m_asig_jd_motivo.php');
$obj_rep = new ClsAsignacionDepMotivo();
$resp=$_SESSION['id_persona'];
$cod=$_SESSION['id_resdep'];
//echo "el cod del personal:".$resp."<br>"."el id del dep:".$cod."<br>";
$obj_rep->buscar($cod,$resp,$_POST['id_motivo_mov']);
?>