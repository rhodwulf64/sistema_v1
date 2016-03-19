<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->
<style>
	#textarea-usr{
		margin-top: -15px;
		margin-bottom: -15px;
		position: relative;
		resize:none;
		width:155px;
		height: 40px;
	}
</style>
<script type="text/javascript">
	function ejecuta5(valor){
		document.envio_Modal7.ident4.value = valor;
		document.envio_Modal7.submit();
	}
	

</script>
<div class="ventanaModal container" id="ventanaModal7">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Desbloquear Usuario</span>
		<form method="POST" action="../../control/seguridad/c_usuario.php" id="envio_Modal7" name="envio_Modal7">
			<ul class="tabla">
				<li><input type="text" onkeypress="" placeholder="Busqueda por aproximidad" name="" id=""></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Cerrar" onclick="salirListar7();"></li>
			</ul> 
			<?php include_once("../../modelo/seguridad/m_usuario.php");
				$obj_UsuarioB = new usuario();
				$tupla = $obj_UsuarioB->cosultarUsuariosBloqueados();
				$c = 1;				
				
			?>
			<table id="tablaBuscar">
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">N°</td>
					<td>Usuario</td>
					<td>Tipo de Usuario</td>
					<td>Concepto</td>
					<td>Acción</td>
				</tr>
				<?php while($rs = $obj_UsuarioB->arreglo($tupla)){ ?>
					<tr class="tbody">
						<td><?php echo $c;?></td>
						<td><?php echo "CI. ".$rs["login"]." - ".$rs["nom_per"]." ".$rs["ape_per"]; $contador[$c] = $rs["id_usuario"]; ?></td>
						<td><?php echo $rs["nom_perfil"];?></td>
						<td><?php echo $rs["motivo"]; ?></td>
						<!-- <td><?php //if($rs["status"]==1){ echo "Activo"; }else{ echo "Inactivo"; }?></td> -->
						<td>
						<!-- <input type="hidden" name="ident2" id="ident2" value="<?php//echo $contador2[$td]; ?>"> -->
						<button type="button" value="<?php echo $contador[$c]; ?>" title="clic para desbloquear Usuario" id="Editar" onclick="openVentana20(this.value)"><span id="iconosE" class="icon-user-check"></span></button></td>
					</tr>
					<?php $c++; } ?>
					
				<input type="hidden" name="ident4">
				<input type="hidden" name="valorBotton2">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="DesbloqUsrIntranet">
			</table>
		</form>
	</div>
</div>