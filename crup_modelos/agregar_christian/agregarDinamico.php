<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<h3>Un Personal Puede estar encargado de varios departementos</h3><hr />
	<form method="get" name="envio_form" action="control.php">
		<div class="contentForm">

			<table id="detalle">
				<tr>
					<td align="right">Nombre: 
						<input type="text" name="nom" >
					</td>
					<td align="right">apellidos: 
					<input type="text" name="ape" >
					</td>
				</tr>
				<tr>
					<td> </td>
					<td>
						<button type="button" onclick="agregar()" value="add" name="addService">+ Agregar</button>
					</td>
				</tr>
			</table>
		</div>
		<table>
			<tr>
				<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
				<td><button type="submit" name="evento" value="incluir">Guardar</button></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
		function quitar(nodoPadre){ nodoPadre.parentNode.remove(); }
		function agregar(){
			tabla = document.getElementById("detalle");
			tr = tabla.insertRow(-1);
			td = tr.insertCell(0);
			td0 = tr.insertCell(1);
			td1 = tr.insertCell(2);
			td2 = tr.insertCell(3);

			input = document.createElement('input');
			input.type="text";
			input.name="nombres[]";
			input.value = document.envio_form.nom.value;
			//td.innerHTML;

			input2 = document.createElement('input');
			input2.type="text";
			input2.name="apellidos[]";
			input2.value = document.envio_form.ape.value;

			td0.appendChild(input);
			td2.appendChild(input2);
			//td1.innerHTML = "<select name='txtid_servicio[]' ><option value='operaciones'>operaciones</option> <option value='administracion'>administracion</option>  <option value='almacen'>almacen</option>  <option value='gerencia'>gerencia</option></select> <button type='button' onclick='quitar(this.parentNode)' value='del' name='delService'>x</button>";
			
			document.form.nom.value = "";
		}
	</script>	
</body>
</html>