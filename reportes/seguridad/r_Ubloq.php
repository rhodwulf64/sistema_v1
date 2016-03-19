
<link rel="stylesheet" type="text/css" href="../../public/style.css">
<style type="text/css">
button#btn-home{
	padding: 6px 15px;
	border-radius: 3px;
	border:1px solid #C4C4C4;
	background: #023859;
	color: #fff;
}
button#btn-home:hover{
	cursor: pointer;
	opacity: 0.9;
}
table#btn-home-table{
	text-align: center;
	margin: auto;
	border:1px solid #C4C4C4;
	padding: 6px 15px;
	border-radius: 3px;
}
table tr td{
	padding: 10px;
}
#iconosr{
	color: #fff;
	font-size: 25px;
	font-weight: 700;
}
</style>

<form method="POST" action="../../control/c_reportes/c_estado.php" name="form_general">
<table id="btn-home-table">
	<tr><td>
		<h2>Generar Reporte General de Usuarios Bloqueados</h2><br>
		<button type='submit' id="btn-home" title="click para volver al home" value='Volver al Home' ><span id="iconosr" class="icon-file-pdf"></span></button>
	</td></tr>
</table>
</form>
