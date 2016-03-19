<?php
include_once('../../../modelo/m_reportes/modelo_trans/m_dev_nro.php');
$obj_rep= new ClsDevolucion();
//$obj_rep->buscar($_POST);


if(isset($_SESSION['nroDevReportes'])  &&  $_SESSION['nroDevReportes']!= ""){
	$des_document = $_SESSION['nroDevReportes'];
	$id_mov_dev=$_SESSION['nroDevAutoincrementalReportes'];
	$idRespDev = $_SESSION['idRespParaReportesDev'];
	// echo $des_document."<br>".$id_mov_dev;
	unset($_SESSION['nroDevReportes']); //destruyo variable
	unset($_SESSION['nroDevAutoincrementalReportes']); //el id del mov
	unset($_SESSION['idRespParaReportesDev']); //el id del mov


	$obj_rep->buscar($_POST,$des_document,$id_mov_dev,$idRespDev); //recibo los name via POST del formulario

}else if(isset($_POST['nro']) && $_POST['nro'] != ""){
	$des_document = "";
	$id_mov_dev="";
	$idRespDev = "";
	$obj_rep->buscar($_POST,$des_document,$id_mov_dev,$idRespDev); //recibo los name via POST del formulario
}else{
	$des_document = "";
	$id_mov_dev="";
	$idRespDev = "";
	$obj_rep->buscar($_POST,$des_document,$id_mov_dev,$idRespDev);

}
?>