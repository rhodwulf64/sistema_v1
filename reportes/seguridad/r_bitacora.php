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

<form method="POST" action="../../control/c_reportes/c_bitacora.php" name="form_general">
<table id="btn-home-table">
	
	
	<tr>
		<td>
		<h2> Reporte de Bitacora de Acceso</h2><br>
		<span id="tReport">Tipo de Reporte: <input type="radio" name="tr" checked="checked" /> PDF <input type="radio" name="tr" /> EXCEL </span>
		<br>
		
		<span id="filtrado">Tipo de Usuario: 
			
			<?php
				include_once('../../control/c_reportes/combo_reporte/c_combo_perfil.php');
				$ArrayPerfil = array();
			    $combPerfil  = "";
				if(isset($_SESSION['cod_perfil_p'])){
					$combPerfil = $_SESSION['cod_perfil_p'];
				}
				$ArrayPerfil=DibComboPerfil	($combPerfil);
						
				foreach ($ArrayPerfil as $elemento){
					echo $elemento;
				}
			?>
		</span><br>
		

		Desde: <input type="text" name="fecha1" id="fecha1" size="15" onkeypress="return SoloLetras(event)" onblur="cambio_mayus(this)" placeholder="DIA-MES-AÑO" />

		Hasta: <input type="text" name="fecha2" id="fecha2" size="15" onkeypress="return SoloLetras(event)" onblur="cambio_mayus(this)" placeholder="DIA-MES-AÑO" /> <br>
		Usuario: <input type="text" name="user" size="25" onblur="cambio_mayus(this)" placeholder="INGRESE LETRAS Y NÚMEROS" />
		<button type='button' name="env" id="btn-unico" title="Clic para generar el reporte" onclick="document.form_general.target='_blank';envio_filtro2()"  value='Volver al Home' >Reporte</button>
		</td>
	</tr>
</table>
</form>

<script type="text/javascript">

function validarSeleccion(value){
	frm = document.form_general;
	if(frm.est1[0].checked && frm.est1[1].checked){
		if(value == 0){
			frm.est1[0].checked = false;
		}else{
			frm.est1[1].checked = false;
		}
	}
}
function envio_filtro2(){
	frm = document.form_general;
	frm.submit();
}

function envio_filtro(){
 	frm = document.form_general;
 	if(frm.est1[0].checked || frm.est1[1].checked){
	 	frm.submit();
	}else if(!frm.nom.value){
     	alert('Debe ingresar un datos a buscar');
		frm.nom.style.border="1px solid red";
		frm.nom.focus();
	}else{
		frm.submit();
	}	
}

</script>

<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">Nota: en la caja de texto ingrese el nombre del Personal, la busqueda puede ser por aproximidad. Ejemplo: p, pa, pae ... paez. </p>
		</td>
	</tr>
</table>