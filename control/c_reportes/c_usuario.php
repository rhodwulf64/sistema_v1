<?php
 	@session_start();
	include_once('../../modelo/m_reportes/m_user.php');
	$obj_rep= new ClsUser();
	$obj_rep->buscar($_POST);

?>