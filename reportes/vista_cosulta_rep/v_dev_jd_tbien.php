<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_dev_jd/c_dev_jd_tbien.php" target="_blank" name="envio_form">
<tr>
        <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_dev_jd';">

<td colspan="3"><h2>Reporte: Listado de Devoluciones por Tipo de Bien Nacional</h2></td>    
</tr>
<tr>
<td><label class="Reportes">Tipo de bien:</label> 
<?php
		include_once('../../control/c_reportes/combo_reporte/c_combo_tbien.php');
		$cbotbien = array();
		$cod_tbien = "";
		if(isset($_SESSION['id_tbien_dev_jd']))
			$cod_tbien = $_SESSION['id_tbien_dev_jd'];
		else
			$cod_tbien = "";
						  
		$cbotbien = DibCombtTBien($cod_tbien);
						
		foreach ($cbotbien as $elementos) 
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