<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Consultar Motivo</span>
		<form method="POST" action="../../control/configuracion/c_motivo.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<span id="caja-status">
					Estatus: <input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="1" id="est1"/> Activo
					<input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="0" id="est2"/> Inactivo
				</span>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar()"></li>
			</ul> 

			<?php include_once("../../modelo/configuracion/m_motivo.php"); 
				$obj_motivo = new ClsMotivo();
				$tupla = $obj_motivo->Consultarr();
				$nroPaginas = $obj_motivo->nroPaginasPorRegistro();
				$c=1;
				$contenido = "";
			?>
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">N°</td>
					<td>Motivo</td>
					<td>Tipo de Motivo</td>
					<td>Estatus</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<?php while($rs = $obj_motivo->converArray($tupla)){
					if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					 	$contador[$c] = $rs["id_motivo_mov"];
					 	//$td = $c;
						$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
									<td> '.$c.'</td>
									<td> '.$rs["des_motivo_mov"].'</td>
									<td> '.$rs["tipo_motivo"].'</td>
									<td> <span id="'.$status.'">'.$status.'</span> </td>
									<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
								</tr>';
						$c++;
					}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='5'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; ?>
			</tbody>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>

			<div align="center"> <!-- aqui va la paginacion con el diseño de bootstrap -->
				<a href="#"><- anterior</a>
				<?php for ($i=1; $i <=$nroPaginas ; $i++) { 
					echo "<a href='javascript:paginacionAjax(".$i.")'>".$i."</a> &nbsp;";
				} ?>
				<a href="#">siguiente -></a>
			</div>

		</form>
	</div>
</div>
<script type="text/javascript">
	function paginacionAjax(pagina){
		$.post("../../control/configuracion/c_motivo.php",{operacion:"paginacionAjax",irA:pagina},function(datos){
			alert(datos);
		});
	}
</script>