<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_bienesNacionales/c_bn_list.php" target="_blank" name="envio_form">
<tr>
        <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_inv';">

<td colspan="3"><h2>Reporte: Listado de Bienes Nacionales</h2></td>    
</tr>
<tr>
<td><label class="Reportes">Tipo de Bien Nacional:</label> 	
	<br><?php
		include_once('../../control/c_reportes/combo_reporte/c_combo_tbien.php');
		$cbotbien = array();
		$cod_tbien = "";
		if(isset($_SESSION['id_tbien_recep']))
			$cod_tbien = $_SESSION['id_tbien_recep'];
		else
			$cod_tbien = "";
			$cbotbien = DibCombtTBien($cod_tbien);
			foreach ($cbotbien as $elementos) 
				echo $elementos;		   
		?> </td>
</tr>
<tr>
<input type="hidden" name="temp"/>
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