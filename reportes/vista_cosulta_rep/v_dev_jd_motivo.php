<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_dev_jd/c_dev_jd_motivo.php" target="_blank" name="envio_form">
<tr>
 <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_dev_jd';">
<td colspan="3"><h2>Reporte: Listado de Devoluciones por Motivo</h2></td>
</tr>
<tr>
  
<td><label class="Reportes">Motivo:</label>
  <?php
    include_once('../../control/c_reportes/combo_reporte/c_tmov.php');
    $cboMotivo = array();
    $cod_mot = "";
    if(isset($_SESSION['id_motivo_dev_jd']))
      $cod_mot = $_SESSION['id_motivo_dev_jd'];
    else
      $cod_mot = "";

    $cboMotivo = DibCombMotivoDev_jd($cod_mot);
    foreach ($cboMotivo as $elementos)
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
