<?php
@session_start();
include_once('../../modelo/seguridad/m_sistema.php');
$obj_sistema= new ClsSistema();
$obj_sistema->sistema($_POST);

//$_SESSION['res']="registrado";
//header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=sistema');
// $_SESSION['vision_int']=$_POST['des_vision'];
// $_SESSION['mision_int']=$_POST["des_mision"];

// $_SESSION['obj_gene_int']=$_POST["des_objG"];
// $_SESSION['obj_esp_int']=$_POST["des_objE"];
$_SESSION['cod_sed_int']=$datos_sistema["cod"];
$_SESSION['abrev_int']=$_POST["abrev"];

$_SESSION['obj_gene_int']=$_POST["d_obG"];
$_SESSION['obj_esp_int']=$_POST["d_obE"];

$_SESSION['quienes_somos_int']=$_POST["qs"];
$_SESSION['mision_int']=$_POST["mis"];
$_SESSION['vision_int']=$_POST["vis"];

$_SESSION['tlf_int']=$_POST["tele"];
$_SESSION['rif_int']=$_POST["rif_des"];
$_SESSION['direccion_int']=$_POST["dir"];
$_SESSION['correo_int']=$_POST["corre"];

//echo $_SESSION['correo_int'];
?>