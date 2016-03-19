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
    <form method="POST" action="../../control/c_reportes/c_Recepcion/c_recep_fecha.php" target="_blank" name="envio_form">
<tr>
     <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_recepcion';">
<td colspan="3"><h2>Reporte: Recepciones por Fecha</h2></td>    
</tr>
<tr>
<td><label class="Reportes">Desde:</label> <input type="text" title="Clic para abrir el calendario" placeholder="DIA-MES-AÑO" size="10" name="fecha1" id="fecha1"></td>
<td><label class="Reportes">Hasta:</label> <input type="text" title="Clic para abrir el calendario" placeholder="DIA-MES-AÑO" size="10" name="fecha2" id="fecha2"></td>
</tr>
<tr>
    <input type="hidden" name="op"/>
<td colspan="2"><input type="button" id="repor" value="Reporte" onclick="envio(this.value)"/></td>        
</tr>
</form>
</table>
<script type="text/javascript">
function envio(v){
    var valida=true;
    if(document.envio_form.fecha1.value=="" && document.envio_form.fecha2.value==""){
       
        alert('Debe Ingresar las Fechas');
        document.envio_form.fecha1.focus();
         document.envio_form.fecha1.style.border="1px solid red";
         document.envio_form.fecha2.style.border="1px solid red";
        valida=false;
    }else if(document.envio_form.fecha1.value=="" ){
         alert('Debe Ingresar la Fecha Desde');
        document.envio_form.fecha1.style.border="1px solid red";
          document.envio_form.fecha2.style.border="1px solid #ccc";
        document.envio_form.fecha1.focus();
        valida=false;
    }else if(document.envio_form.fecha2.value=="" ){
        alert('Debe Ingresar la Fecha Hasta');
        document.envio_form.fecha2.style.border="1px solid red";
        document.envio_form.fecha1.style.border="1px solid #ccc";
        document.envio_form.fecha2.focus();
        valida=false;
    }
    
    if(valida==true){
    document.envio_form.op.value=v;
    document.envio_form.submit();
    }else{
        return false;
    }
    
}

</script>