<?php
switch($_POST['ident']){
	case 44:
		header('location: ../../../control/c_reportes/c_dev_jd/c_dev_jd_todo.php');
		//echo "<script>href.location='../../../control/c_reportes/c_asignacion_jd/c_asig_jd_todo.php';</script>";
		//header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_nro');
	break;
	case 45:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_jd_fecha');
	break;
	case 46:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_jd_tbien');
	break;
	case 48:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_jd_motivo');
	break;
}
