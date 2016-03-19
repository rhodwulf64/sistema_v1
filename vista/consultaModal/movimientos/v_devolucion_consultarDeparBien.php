<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal1.ident1.value = valor;
		document.envio_Modal1.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal1">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Devolución Bien Nacional</span>
		<form method="POST" action="../../control/movimientos/c_desincorporacion.php" id="envio_Modal1" name="envio_Modal1">
			<ul class="tabla">
				<li><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<li><button type="button" id="btnSalir" onclick="ModalConfirmAgrAsig()"><span id="icon-plus" class="icon-plus"></span> Agregar</button></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar1()"></li>
			</ul> 
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td>Código</td>
					<td>Serial</td>
					<td>Marca</td>
					<td>Modelo</td>
					<td>Descripción</td>
					<td>Precio</td>
					<td>Fecha Asignación</td>
					<td>Observación</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax1">
				<!-- resultado de la consulta desde ajax -->
			</tbody>
				<input type="hidden" name="ident1">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>