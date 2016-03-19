<?php
    switch ($_POST['ident']) {
    	case 14:
    		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_nro');
    	break;
    	case 15:
    		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_fecha');
    	break;
    	case 16:
    		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_dep');
    	break;
    	case 17:
    		header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_bn');
    	break;
        case 31:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_anul');
        break;
        case 32:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_anulFecha');
        break;
        case 33:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_anulResp');
        break;
        case 34:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_dev_anulMotivo');
        break;
    }	
?>