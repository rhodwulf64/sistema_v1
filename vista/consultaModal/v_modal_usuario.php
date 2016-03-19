<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">
	function ejecuta2(valor){
		document.envio_Modal2.ident.value = valor;
		document.envio_Modal2.tempUser.value = "Consultar";
		document.envio_Modal2.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal2">
	<div class="contenido">
		<span id="identificador-modal-superio-izquierdo">Consultar Usuario</span>
		<form method="POST" action="../../control/seguridad/c_usuario.php" id="envio_Modal2" name="envio_Modal2">
			<ul class="tabla">
				<li><span id="cargando"></span><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<span id="caja-status">
					Estatus: <input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="1" id="est1"/> Activo
					<input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="0" id="est2"/> Inactivo
				</span>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar2()"></li>
			</ul> 
			<?php include_once("../../modelo/seguridad/m_usuario.php"); 
				$obj_Personal = new usuario();
				$tupla = $obj_Personal->cosultarUsuarios();
				$c = 1;
				$contenido = "";
			?>
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">N°</td>
					<td>Usuario</td>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Tipo de Usuario</td>
					<td>Fecha de Creación</td>
					<td>Estatus</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<?php while($rs = $obj_Personal->arreglo($tupla)){
					if($rs["status_user"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					 	$contador[$c] = $rs["id_usuario"];

						$contenido.='<tr class="tbody" onclick=ejecuta2("'.$contador[$c].'")>
									<td> '.$c.'</td>
									<td> '.$rs["login"].'</td>
									<td> '.$rs["nom_per"].'</td>
									<td> '.$rs["ape_per"].'</td>
									<td> '.$rs["nom_perfil"].'</td>
									<td> '.$rs["fecha_creacion"].'</td>
									<td> <span id="'.$status.'">'.$status.'</span> </td>
									<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta2(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
								</tr>';
						$c++;
					}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='7'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; ?>
			</tbody>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="tempUser" >
			</table>
		</form>
	</div>
</div>