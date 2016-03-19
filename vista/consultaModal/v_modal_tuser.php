<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Consultar tipo de Usuario</span>
		<form method="POST" action="../../control/seguridad/c_tUser.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><input type="text" onkeypress="" placeholder="Busqueda por aproximidad" name="" id=""></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Cerrar" onclick="salirListar()"></li>
			</ul> 

			<?php require_once("../../modelo/seguridad/m_tUser.php"); 
				$obj_tuser = new clstUser();
				$tupla = $obj_tuser->consultar();
				$c = 1;
			?>
			<table id="tablaBuscar">
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">N°</td>
					<td>Tipo de Usuario</td>
					<td>Estatus</td>
					<td>Acción</td>
				</tr>
				<?php while($rs = $obj_tuser->converArray($tupla)){ ?>
				<tr class="tbody">
					<td><?php echo $c;?></td>
					<td><?php echo $rs["nom_perfil"]; $contador[$c] = $rs["idperfil"]; ?></td>
					<td><?php if($rs["status"]==1){ echo "Activo"; }else{ echo "Inactivo"; }?></td>
					<td> <?php $td = $c; ?>
					<!-- <input type="hidden" name="ident2" id="ident2" value="<?php//echo $contador2[$td]; ?>"> -->
					<button type="button" value="<?php echo $contador[$c]; ?>" title="clic para editar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-pencil"></span></button></td>
				</tr>
				<?php $c++; } ?>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>