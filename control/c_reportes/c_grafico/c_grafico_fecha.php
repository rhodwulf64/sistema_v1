<?php
include_once('../../../modelo/m_reportes/modelo_grafico/m_grafico_fecha.php');
$obj_grafico= new ClsGraficoMovFecha();
$obj_grafico->Grafico($_POST);
?>