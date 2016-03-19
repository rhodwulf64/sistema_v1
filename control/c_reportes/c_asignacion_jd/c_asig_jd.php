<?php
switch($_POST['ident']){
	case 41:
		header('location: ../../../control/c_reportes/c_asignacion_jd/c_asig_jd_todo.php');
		exit();
		//echo "<script>href.location='../../../control/c_reportes/c_asignacion_jd/c_asig_jd_todo.php';</script>";
	
	// echo "<script>window.open('../../../control/c_reportes/c_asignacion_jd/c_asig_jd_todo.php','_blank');</script>";
	//header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=r_asig_jd');
	break;
	case 42:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_jd_fecha');
	break;
	case 43:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_jd_tbien');
	break;
	case 47:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_jd_motivo');
	break;
}
