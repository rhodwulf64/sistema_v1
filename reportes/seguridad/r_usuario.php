<link rel="stylesheet" type="text/css" href="../../public/style.css">

<form method="POST" action="../../control/c_reportes/c_usuario.php" name="form_general">
<table id="btn-home-table">
	
		<td>
		<h2> Reportes de Usuarios</h2><br>
		<span id="tReport">Tipo de Reporte: <input type="radio" name="tr" checked="checked" /> PDF <input type="radio" name="tr" /> EXCEL </span>
		<br>
		<span id="filtrado">Estatus: <select  name="est1">
			<option  value="">Todos los Estatus</option>
			<option value="D">Disponible</option>
			<option value="B">Bloqueado</option>
			<option value="N">Nuevos</option>
			<option value="E">Eliminado</option>
		</select></span><br>
		<input type="hidden" name="valor">
		<input type="text" name="nom" onkeypress="return SoloLetras(event)" onblur="cambio_mayus(this)" placeholder="ingrese solo Letras" />
		<button type='button' name="todoPdf" id="btn-unico" title="Clic para generar el reporte" onclick="document.form_general.target='_blank';envio_filtro(this.value)"  value='todoPdf' >Reporte</button>
		</td>
	</tr>
</table>
</form>

<script type="text/javascript">
function envio_filtro(v){
	frm=document.form_general;
	frm.submit();
}

</script>

<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">Nota: en la caja de texto ingrese el nombre del Usuarios, la busqueda puede ser por aproximidad. Ejemplo: p, pa, pae ... paez. </p>
		</td>
	</tr>
</table>