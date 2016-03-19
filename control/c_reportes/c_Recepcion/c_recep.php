<?php
 switch ($_POST['ident']){
    case 1:
         header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_recep_general');
    break;
    case 2:
        header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_document');
    break;
    case 3:
        header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_prov');
    break;
    case 4:
        header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_trecep');
    break;
    case 5:
        header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_cat');
    break;
    case 20:
        header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_recep_anul');
    break;
    case 21:
        header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_recep_anulFecha');
    break;
    case 22:
        header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_recep_anulResp');
    break;
    case 23:
        header('location: ../../../vista/protegidas/v_Perfil_Admin.php?accion=v_recep_anulMotivo');
    break;
}
?>