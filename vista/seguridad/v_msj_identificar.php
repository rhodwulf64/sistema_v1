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
</style>

<table id="btn-home-table">
	<tr><td>
		<h2>Se tiene que identificar <span id="iconos" class="icon-lock"></span></h2>
		<button type='button' id="btn-home" title="click para volver al home" value='Volver al Home' onclick="location.href='../../index.php?accion=inicio'"><span id="iconos" class="icon-undo2"></span> Volver al Home</button>
	</td></tr>
</table>