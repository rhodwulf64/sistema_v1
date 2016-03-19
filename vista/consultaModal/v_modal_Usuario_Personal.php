<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">
	function ejecuta(valor){
		document.envio_Modal1.ident2.value = valor;
		document.envio_Modal1.tempPer.value = "ConsultarPararIncluir";
		document.envio_Modal1.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal1">
	<div class="contenido">
		<span id="identificador-modal-superio-izquierdo">Nuevo Usuario</span>
		<form method="POST" action="../../control/seguridad/c_usuario.php" id="envio_Modal1" name="envio_Modal1">
			<ul class="tabla">
				<li><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="colocarAsterisco();salirListar1();"></li>
			</ul> 
			<?php include_once("../../modelo/seguridad/m_usuario.php");
				$obj_Personal = new usuario();
				$tupla = $obj_Personal->cosultarPersonas();
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
					<!-- <td>Estatus</td> -->
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<?php while($rs = $obj_Personal->arreglo($tupla)){
					 	$contador[$c] = $rs["id_per"];

						$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
									<td> '.$c.'</td>
									<td> '.$rs["ced_per"].'</td>
									<td> '.$rs["nom_per"].'</td>
									<td> '.$rs["ape_per"].'</td>
									<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
								</tr>';
						$c++;
					}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='5'> <span class='no-hay-datos-mostrar'>NO HAY PERSONAL DISPONIBLE</span> </td>"; ?>
			</tbody>
				<input type="hidden" name="ident2">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="tempPer">
			</table>
		</form>
	</div>
</div>