<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_Recepcion/c_recepcion.php" target="_blank" name="envio_form">
<tr>
     <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_recepcion';">
<td colspan="3"><h2>Reporte: Documento General de Recepción</h2></td>    
</tr>
<tr>
<td><label class="Reportes">N° de Documento:</label> <input class="CampoMovReportes" type="text" placeholder="INGRESE SOLO LETRAS Y NUMERO" name="nro"></td>

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