<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_des_nro.php');
$obj_recep= new ClsDesincorporacion();

if(isset($_SESSION["desinReportes"]) && $_SESSION["desinReportes"] != ""){
	$des_document = $_SESSION["desinReportes"];
	$idAutoDes = $_SESSION['nroDesAutoincrementalReportes'];
	$idRespDes = $_SESSION['idRespParaReportesdes'];

	unset($_SESSION["desinReportes"]); //destruyo variable
	unset($_SESSION["nroDesAutoincrementalReportes"]); //destruyo variable
	unset($_SESSION["idRespParaReportesdes"]); //destruyo variable
	
	$obj_recep->buscar($_POST,$des_document,$idAutoDes,$idRespDes); //recibo los name via POST del formulario
}else if(isset($_POST['nro']) && $_POST['nro'] != ""){
	$des_document = "";
	$idAutoDes = "";
	$idRespDes = "";
	$obj_recep->buscar($_POST,$des_document,$idAutoDes,$idRespDes); //recibo los name via POST del formulario
}else{
	$des_document = "";
	$idAutoDes = "";
	$idRespDes = "";
	$obj_recep->buscar($_POST,$des_document,$idAutoDes,$idRespDes);
	//echo "no hay datos";
	//$nroRecep = "";
}
?>