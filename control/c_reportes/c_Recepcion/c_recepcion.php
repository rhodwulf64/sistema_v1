<?php @session_start();
include_once('../../../modelo/m_reportes/modelo_trans/m_recepcion.php');
$obj_recep= new ClsRecepcion();

if(isset($_SESSION["nroRecepReportes"]) && $_SESSION["nroRecepReportes"] != ""){
	$nroRecep = $_SESSION["nroRecepReportes"];
	$id_mov_recep = $_SESSION['nroRecAutoincrementalReportes'];
	$id_respRec = $_SESSION['idRespParaReportesRecep'];
	
	unset($_SESSION["nroRecepReportes"]); //destruyo variable
	unset($_SESSION['nroRecAutoincrementalReportes']); //el id del mov
	unset($_SESSION['idRespParaReportesRecep']); //responsable

	$obj_recep->buscar($_POST,$nroRecep,$id_mov_recep,$id_respRec); //recibo los name via POST del formulario
}else if(isset($_POST['nro']) && $_POST['nro'] != ""){
	$nroRecep = "";
	$id_mov_recep = "";
	$id_respRec = "";
	$obj_recep->buscar($_POST,$nroRecep,$id_mov_recep,$id_respRec); //recibo los name via POST del formulario
}else{
	$nroRecep = "";
	$id_mov_recep = "";
	$id_respRec = "";
	$obj_recep->buscar($_POST,$nroRecep,$id_mov_recep,$id_respRec);
	//echo "no hay datos";
	//$nroRecep = "";
}

?>