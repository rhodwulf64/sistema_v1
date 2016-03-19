<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Consultar Recepción</span>
		<form method="POST" action="../../control/movimientos/c_recepcion.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar()"></li>
			</ul> 

			<?php 
				include_once("../../modelo/movimientos/consulta_recepcion.php"); 
				$obj_recepcion = new clsRecepcionConsul();
				$tupla = $obj_recepcion->Consultar_Recepcion();
				$c = 1;
				$contenido = "";
				$contadorControl = $obj_recepcion->Consultar_Cant_Movimientos();
			?>
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">&nbsp;N&nbsp;°&nbsp; Rec.</td>
					<td>N° Documento</td>
					<td>Fecha Llegada</td>
					<td>Fecha de Registro</td>
					<td>Hora de Registro</td>
					<td>Proveedor</td>
					<td>Responsable</td>
					<td>Usuario</td>
					<td>Motivo</td>
					<td>Período</td>
					<td>Observación</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<?php while($rs = $obj_recepcion->converArray($tupla)){
					if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					 	$contador[$c] = $rs["id_mov"];
					 	$d1[$c] = $rs["nro_document"]; $d2[$c] = $rs["fecha_mov"]; $d3[$c] = $rs["id_prov"];
					 	$d4[$c] = $rs["id_per"]; $d5[$c] = $rs["id_motivo_mov"];
						$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$d1[$c].'.'.$d2[$c].'.'.$d3[$c].'.'.$d4[$c].'.'.$d5[$c].'")>
									<td> '.$contadorControl.'</td>
									<td> '.$rs["nro_document"].'</td>
									<td> '.$rs["fecha_mov"].'</td>
									<td> '.$rs["fecha_reg"].'</td>
									<td> '.$rs["hora_reg"].'</td>
									<td> '.$rs["des_prov"].'</td>
									<td> '.$rs["ced_per"].' - '.$rs["nom_per"].' '.$rs["ape_per"].'</td>
									<td> '.$rs["login"].'</td>
									<td> '.$rs["des_motivo_mov"].'</td>
									<td> '.$rs["nom_periodo"].'</td>
									<td> '.$rs["observacion_mov"].'</td>
									<td><button type="button" value="'.$contador[$c].'.'.$d1[$c].'.'.$d2[$c].'.'.$d3[$c].'.'.$d4[$c].'.'.$d5[$c].'" title="clic para consultar la recepción" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
									
								</tr>';
						$c++; $contadorControl--;
					}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='13'> <span class='no-hay-datos-mostrar'>NO HAY RECEPCIONES PARA MOSTRAR</span> </td>"; ?>
			</tbody>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>