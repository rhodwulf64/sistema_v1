<?php
include_once('../../modelo/m_reportes/m_sede.php');
$ob_sed= new ClsSede();
$ob_sed->buscar($_POST);

?>