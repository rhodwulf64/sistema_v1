<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_recep_cat.php');
$obj_rep= new ClsRecepcion();
switch (isset($_POST['op'])){
	case 'Reporte': $obj_rep->buscar_cat($_POST['cod_cat']);break;
}



?>