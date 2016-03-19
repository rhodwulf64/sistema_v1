<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<h3>Un Personal Puede estar encargado de varios departementos</h3><hr />
	<form method="POST" action="control.php">
		<div class="contentForm">
			<table id="detalle">
				<tr>
					<td align="right">Nombre: </td>
					<td>
						<input type="text" name="nom">
					</td>
				</tr>
				<tr>
					<td align="right">Departamento: </td>
					<td>
						<button type="button" onclick="agregar()" value="add" name="addService">+ Agregar</button>
					</td>
				</tr>
			</table>
		</div>
		<table>
			<tr>
				<td><br><button type="submit" name="evento" value="incluir">Guardar</button></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
		function quitar(nodoPadre){ nodoPadre.parentNode.remove(); }
		function agregar(){
			tabla = document.getElementById("detalle");
			tr = tabla.insertRow(-1);
			td0 = tr.insertCell(0);
			td1 = tr.insertCell(1);
			td0.innerHTML = "Departamento";
			td1.innerHTML = "<select name='txtid_servicio[]' ><option value='operaciones'>operaciones</option> <option value='administracion'>administracion</option>  <option value='almacen'>almacen</option>  <option value='gerencia'>gerencia</option></select> <button type='button' onclick='quitar(this.parentNode)' value='del' name='delService'>x</button>";
		}
	</script>	
</body>
</html>