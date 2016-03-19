<?php
	switch($_POST['ident']){
    	case 10:
    		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_des_nro');
    	break;
    	case 11:
    		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_des_fecha');
    	break;
    	case 12:
    		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_des_motivo');
    	break;
    	case 13:
    		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_des_bn');
    	break;
        case 35:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_des_anul');
        break;
        case 36:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_des_anulFecha');
        break;
        case 37:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_des_anulResp');
        break;
        case 38:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_des_anulMotivo');
        break;
    }
?>