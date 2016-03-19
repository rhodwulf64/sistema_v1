<?php
    switch ($_POST['ident']) {
    	case 18:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_inv_bn');
    	break;
    	
    	case 19:
    	   header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_inv_historial');
    	break;
        case 39:
            header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_inv_grafMov');
        break;
        case 40:
            header("location: ../../../control/c_reportes/c_grafico/c_grafico.php");
        break;
    }
?>