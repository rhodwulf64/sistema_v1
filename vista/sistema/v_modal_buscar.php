<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
		<form method="POST" action="../../control/configuracion/c_cargo.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><input type="text" onkeypress="" placeholder="Busqueda por aproximidad" name="" id=""></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Cerrar" onclick="salirListar()"></li>
			</ul> 

			<?php include_once("../../modelo/configuracion/m_cargo.php"); 
				$obj_cargo = new clsCargo();
				$tupla = $obj_cargo->consultar();
				$c=1;
			?>
			<table id="tablaBuscar">
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td>N°</td>
					<td>Nombre del Cargo</td>
					<td>Estatus</td>
					<td></td>
				</tr>
				<?php while($rs = $obj_cargo->converArray($tupla)){ ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $rs["nom_car"]; $contador[$c] = $rs["id_car"]; ?></td>
					<td><?php $id="cargo"; if($rs["status"]==1){ echo "Activo"; }else{ echo "Inactivo"; }?></td>
					<td><input type="hidden" name="temp" value="Consultar">
					<button type="button" value="<?php echo $contador[$c]; ?>" title="clic para editar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE"  class="icon-pencil"></span></button></td>
				</tr>
				<?php $c++; } ?>
				<input type="hidden" name="ident">
			</table>
		</form>
	</div>
</div>