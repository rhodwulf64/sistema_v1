<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_recep_fecha.php');
$obj_rep= new ClsRecepcion();
if(isset($_POST['op']) && $_POST['op']=='Reporte'){
    $obj_rep->buscar_fecha($_POST['fecha1'],$_POST['fecha2']);
}

?>