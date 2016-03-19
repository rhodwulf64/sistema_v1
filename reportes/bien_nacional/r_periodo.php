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

<form method="POST" action="../../control/c_reportes/c_periodo.php" name="form_general">
<table id="btn-home-table">
	
	<tr>
		<td>
		<h2>Filtrar Reporte de Periodos</h2><br>
		<span id="tReport">Tipo de Reporte: <input type="radio" name="tr" checked="checked" /> PDF <input type="radio" name="tr" /> EXCEL </span>
		<br>
		<input type="hidden" name="temp"> <!--variable oculta para envio -->
		<span id="filtrado" style="margin-left:35px;">Estatus: <input type="checkbox" onclick="validar_check_reportesP(this.value)" name="est1" value="2" id="est1"/> Abierto <input type="checkbox" id="est1" onclick="validar_check_reportesP(this.value)" name="est1" value="1" /> Nunca Abierto 
			<input type="checkbox" name="est1" onclick="validar_check_reportesP(this.value)" value="3"/>Cerrado
		</span><br>
		Desde: <input type="text" name="fecha1" id="fecha1" title="Clic para abrir el calendario" onkeypress="return SoloLetras(event)" size="15" onblur="cambio_mayus(this)" placeholder="DIA-MES-AÑO" />
		Hasta: <input type="text" name="fecha2" id="fecha2" title="Clic para abrir el calendario" onkeypress="return SoloLetras(event)" size="15" onblur="cambio_mayus(this)" placeholder="DIA-MES-AÑO" />
		<button type='submit' name="env" id="btn-unico" title="Clic para generar el reporte" onclick="document.form_general.target='_blank';envio_filtroP()"  value='General' >Reporte</button>
		</td>
	</tr>
</table>
</form>


<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">Nota: en la caja de texto ingrese el nombre del Periodos, la busqueda puede ser por aproximidad. Ejemplo: .... </p>
		</td>
	</tr>
</table>
<script type="text/javascript">

	function validar_check_reportesP(value){
	frm = document.form_general;
	if(frm.est1[0].checked && frm.est1[1].checked){
		if(value == 1){
			frm.est1[0].checked = false;
		}else{
			frm.est1[1].checked = false;
		}
	}
	 if(frm.est1[1].checked && frm.est1[2].checked ){
		if(value==1){
			frm.est1[2].checked=false;
		}else{
			frm.est1[1].checked=false;
		}
	}
	if(frm.est1[0].checked && frm.est1[2].checked ){
		if(value==2){
			frm.est1[2].checked=false;
		}else{
			frm.est1[0].checked=false;
		}
	}
	function envio_filtroP(){
		frm=document.form_general;
		frm.submit();
	}
	
}
</script>