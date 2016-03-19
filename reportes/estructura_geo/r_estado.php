<link rel="stylesheet" type="text/css" href="../../public/style.css">

<form method="POST" action="../../control/c_reportes/c_estado.php" name="form_general">
<table id="btn-home-table">

	<tr>
		<td>
		<h2>Filtrar Reporte de Estado</h2><br>
		<span id="tReport">Tipo de Reporte: <input type="radio" name="tr" checked="checked" /> PDF <input type="radio" name="tr" /> EXCEL </span>
		<br>
		<input type="hidden" name="temp">
		<span id="filtrado">Estatus: <input type="checkbox"  onclick="validar_check_reportes(this.value)" name="est1" value="1" id="est1"/> Activo <input type="checkbox" id="est1" onclick="validar_check_reportes(this.value)" name="est1" value="0" /> Inactivo </span><br>
		<input type="text" name="nom" onkeypress="return SoloLetras(event)" onblur="cambio_mayus(this)" placeholder="ingrese solo Letras" />
		<button type='button' name="todoPdf" value="General" id="btn-unico" title="Clic para generar el reporte" onclick="document.form_general.target='_blank';envio_filtro(this.value)">Reporte</button>
		</td>
	</tr>
</table>
</form>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">Nota: en la caja de texto ingrese el nombre del estado, la busqueda puede ser por aproximidad. Ejemplo: p, po, por ... portuguesa. </p>
		</td>
	</tr>
</table>