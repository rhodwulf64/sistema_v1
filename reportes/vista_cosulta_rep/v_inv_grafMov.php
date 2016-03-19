<script type="text/javascript">
    $(function(){
        // $("#fecha1").datepicker();
        // $("#fecha2").datepicker({
        //  changeMonth:true,
        //  changeYear:true,
        // });
        var f = new Date();
        var fecha = "01/"+(f.getMonth()+1)+"/"+f.getFullYear();

            $("#fecha1").datepicker({

                changeYear:true,
                changeMonth:true,
                
                //showOn: "button",
                //buttonImage: "../../public/css/calendario/images/ico.png",
                //buttonImageOnly: true,
                monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
                dateFormat: 'dd/mm/yy', firstDay: 0,
                initStatus: 'Selecciona la fecha', isRTL: false,
                showButtonPanel: true,

                maxDate: '+0d',
                //minDate: fecha
            });
            $("#fecha2").datepicker({

                changeYear:true,
                changeMonth:true,
                
                //showOn: "button",
                //buttonImage: "../../public/css/calendario/images/ico.png",
                //buttonImageOnly: true,
                monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
                dateFormat: 'dd/mm/yy', firstDay: 0,
                initStatus: 'Selecciona la fecha', isRTL: false,
                showButtonPanel: true,

                maxDate: '+0d',
                //minDate: fecha
            });
    });


</script>



<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_grafico/c_grafico_fecha.php" target="_blank" name="envio_form">
<tr>
   <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_inv';"> 
<td colspan="3"><h2>Estadisticas por Fecha</h2></td>    
</tr>
<tr>
<td><label class="Reportes">Desde:</label> <input type="text" title="Clic para abrir el calendario" placeholder="DIA-MES-AÑO" size="10" id="fecha1" name="fecha1"></td>
<td><label class="Reportes">Hasta:</label> <input type="text" title="Clic para abrir el calendario" placeholder="DIA-MES-AÑO" size="10" id="fecha2" name="fecha2"></td>
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