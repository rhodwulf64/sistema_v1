<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_desincorporacion/c_des_anulResp.php" target="_blank" name="envio_form">
<tr>
    <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_des';">
<td colspan="3"><h2>Reporte: Listado  Desincorporacion Anuladas por Responsable de Anulación</h2></td>    
</tr>
<tr>
<td> 
  <label class="Reportes">Responsable de Anulacion:</label>
      <?php
        include_once('../../control/c_reportes/combo_reporte/c_combos_personal.php');
        $cboPersonal = array();
        $cod_per = "";
        if(isset($_SESSION['id_personal_des']))
          $cod_per = $_SESSION['id_personal_des'];
        else
          $cod_per = "";
              
        $cboPersonal = DibCombPersonal($cod_per);
            
        foreach ($cboPersonal as $elementos) 
          echo $elementos;       
      ?>
</td>
</tr>
<tr>
<td colspan="2"><input type="button" id="repor" value="Reporte" onclick="envio()"/></td>        
</tr>
</form>
</table>
<script type="text/javascript">
function envio(){
    frm=document.envio_form;
    frm.submit();
}

</script>