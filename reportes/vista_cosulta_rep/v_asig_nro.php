<link rel="stylesheet" type="text/css" href="../../public/style.css">
 <form method="POST" action="../../control/c_reportes/c_asignacion/c_asig_nro.php" target="_blank" name="envio_form">
<table id="btn-home-table">
<tr>
  <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_asignacion';">  
<td colspan="3"><h2>Reporte: Listado de Asignaciones Número</h2></td>    
</tr>
<tr>
<td><label class="Reportes">Número de Asignación:</label> <input onBlur="cambio_mayus(this)" class="CampoMovReportes" type="text" placeholder="INGRESE SOLO NUMEROS"  name="nro"></td>

</tr>
<tr>
<input type="hidden" name="temp"/>
<td colspan="2"><input type="button" id="repor" value="Reporte" onclick="envio(this.value)"/></td>        
</tr>

</table>
</form>
<script type="text/javascript">
function envio(valor){
    frm=document.envio_form;
    frm.temp.value=valor;
    frm.submit();
}

</script>