<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_asignacion/c_asig_anul.php" target="_blank" name="envio_form">
<tr>
    
<td colspan="3"><h2>Reporte: Listado de Asignaciones Anuladas</h2></td>    
</tr>
<tr>
<input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_asignacion';">

<td><label class="Reportes">N° de Asignación:</label> <input class="CampoMovReportes" type="text" placeholder="INGRESE SOLO LETRAS Y NUMERO" name="nroAnulAsig"></td>

</tr>
<tr>
<input type="hidden" name="temp">
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