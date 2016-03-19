<?php
  session_start();
   
    if($_POST['ident']==18){
            $_SESSION['res']="AUN";
         header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=r_inv');
       
    }else if($_POST['ident']==19){
        header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=v_inv_historial');
    }