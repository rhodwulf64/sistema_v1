<?php
switch($_POST['ident']){
	case 6:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_nro');
	break;
	case 7:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_fecha');
	break;
	case 8:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_dep');
	break;
	case 9:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_bn');
	break;
	case 24:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_anul');
	break;
	case 25:
		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_anulFecha');
	break;
	case 26:
	header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_anulResp');
	break;
	case 27:
	header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_asig_anulMotivo');
	break;
}