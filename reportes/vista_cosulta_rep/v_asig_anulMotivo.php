<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_asignacion/c_asig_anulMotivo.php" target="_blank" name="envio_form">
<tr>
  <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_asignacion';">
<td colspan="3"><h2>Reporte: Listado  de Asignaciones Anuladas por Motivo</h2></td>    
</tr>
<tr>
<td> <label class="Reportes">Motivo:</label>
  <?php
            include_once('../../control/c_reportes/combo_reporte/c_combo_AnulMotivoAsig.php');
            $cboMotivoAnu = array();
            $cod_mot = "";
            if(isset($_SESSION['id_motivo_anulacion_asig']))
              $cod_mot = $_SESSION['id_motivo_anulacion_asig'];
            else
              $cod_mot = "";
                  
            $cboMotivoAnu = DibCombMotivoAnulacion($cod_mot);
                
            foreach ($cboMotivoAnu as $elementos) 
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