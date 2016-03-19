<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_recep_prov.php');
@session_start();
$op=isset($_POST['op']);
switch ($op) {
  case 'Reporte':cons_prov();break;
}

function cons_prov(){
	$obj_rep= new ClsRecepcion();
	$rs=$obj_rep->consulta();
	
		$obj_rep->buscar_prov($_POST['cod_prov']);
	
}
?>
