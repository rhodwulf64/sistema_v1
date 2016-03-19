<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_desincorporacion/c_des_motivo.php" target="_blank" name="envio_form">
<tr>
    <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_des';">
<td colspan="3"><h2>Reporte: Listado de Desincorporación por Motivo</h2></td>    
</tr>
<tr>
<td><label class="Reportes">Motivo:</label> 
	 <?php
            include_once('../../control/c_reportes/combo_reporte/c_combo_desMotivo.php');
            $cboMotivoAnu = array();
            $cod_mot = "";
            if(isset($_SESSION['id_motivo_des']))
              $cod_mot = $_SESSION['id_motivo_des'];
            else
              $cod_mot = "";
                  
            $cboMotivoAnu = DibCombMotivoDesincorporacion($cod_mot);
                
            foreach ($cboMotivoAnu as $elementos) 
              echo $elementos;       
          ?>
</td>

</tr>
<tr>
	<input type="hidden" name="temp" >
<td colspan="2"><input type="button" id="repor" value="Reporte" onclick="envio(this.value)"/></td>        
</tr>
</form>
</table>
<script type="text/javascript">
function envio(valor){
    frm=document.envio_form;
    frm.temp.value=valor;
    frm.submit();
}

</script>