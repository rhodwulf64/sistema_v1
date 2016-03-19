<?php
session_start();
include_once('../../../modelo/m_reportes/modelo_trans/m_asig_nro.php');
$obj_rep= new ClsAsignacion();


if(isset($_SESSION["nroAsigReportes"]) && $_SESSION["nroAsigReportes"] != ""){
	$nroAsig = $_SESSION["nroAsigReportes"];
	$nroAsigAutoinc = $_SESSION['nroAsigAutoincrementalReportes'];
	$respAsigReport = $_SESSION['idRespParaReportesAsig'];

	unset($_SESSION["nroAsigReportes"]); //destruyo variable
	unset($_SESSION["nroAsigAutoincrementalReportes"]); //destruyo variable
	unset($_SESSION["idRespParaReportesAsig"]); //destruyo variable

	$obj_rep->buscar($_POST,$nroAsig,$nroAsigAutoinc,$respAsigReport); //recibo los name via POST del formulario
}else if(isset($_POST['nro']) && $_POST['nro'] != ""){
	$nroAsig = "";
	$nroAsigAutoinc = "";
	$respAsigReport = "";
//recibo los name via POST del formulario
	$obj_rep->buscar($_POST,$nroAsig,$nroAsigAutoinc,$respAsigReport);
}else{
	$nroAsig="";
	$nroAsigAutoinc = "";
	$respAsigReport = "";
	$obj_rep->buscar($_POST,$nroAsig,$nroAsigAutoinc,$respAsigReport);
	//echo "no hay datos";
	//$nroRecep = "";
}



?>