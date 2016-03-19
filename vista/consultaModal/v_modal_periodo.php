<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
		<span id="identificador-modal-superio-izquierdo">Consultar Período</span>
		<form method="POST" action="../../control/configuracion/c_periodo.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><input type="text" onkeypress="" placeholder="Busqueda por aproximidad" name="" id=""></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Cerrar" onclick="salirListar()"></li>
			</ul> 

			<?php include_once("../../modelo/configuracion/m_periodo.php"); 
				$obj_periodo = new ClsPeriodo();
				$tupla = $obj_periodo->consultar();
				$c=1;

			?>
			<table id="tablaBuscar">
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">N°</td>
					<td>Fecha de Inicio</td>
					<td>Fecha de Fin</td>
					<td>Estatus</td>
					<td>Acción</td>
				</tr>
				<?php while($rs = $obj_periodo->converArray($tupla)){ 

					$fecha1=$obj_periodo->fecha_bajada($rs['fecha_inicio']);
					$fecha2=$obj_periodo->fecha_bajada($rs['fecha_fin']);
					?>
				<tr class="tbody">
					<td><?php echo $c;?></td>
					<td><?php echo $fecha1; $contador[$c] = $rs["id_periodo"]; ?></td>
					<td><?php echo $fecha2; ?></td>
					<td><?php if($rs["status"]==1){ echo "abierto"; }else{ echo "cerrado"; }?></td>
					
					<!-- <input type="hidden" name="ident2" id="ident2" value="<?php//echo $contador2[$td]; ?>"> -->
					<td><button type="button" value="<?php echo $contador[$c]; ?>" title="clic para editar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-pencil"></span></button></td>
				</tr>
				<?php $c++; } ?>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>