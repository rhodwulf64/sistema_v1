<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal2.ident2.value = valor;
		document.envio_Modal2.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Consultar Asignación</span>
		<form method="POST" action="../../control/movimientos/c_asignacion.php" id="envio_Modal2" name="envio_Modal2">
			<ul class="tabla">
				<li><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar()"></li>
			</ul> 

			<?php 
				include_once("../../modelo/movimientos/consulta_asignacion.php"); 
				$obj_asignacion = new clsAsignacionConsul();
				$tupla = $obj_asignacion->Consultar_asignacion();
				$c = 1;
				$contenido = "";
				$contadorControl = $obj_asignacion->Consultar_Cant_Movimientos();
			?>
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">&nbsp;Asig.</td>
					<td>N° Asig.</td>
					<td>Fecha Asig.</td>
					<td>Fecha de Registro</td>
					<td>Hora de Registro</td>
					<td>Depto.</td>
					<td>Responsable Depto.</td>
					<td>Responsable Asig.</td>
					<td>Usuario</td>
					<td>Motivo</td>
					<td>Período</td>
					<td>Observación</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax2">
				<?php while( $rs = $obj_asignacion->converArray($tupla) ){
					//if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					 	$contador[$c] = $rs["id_mov"];
					 	$d1[$c] = $rs["nro_document"]; $d2[$c] = $rs["id_per"]; $d3[$c] = $rs["id_dep"];
					 	$d4[$c] = $rs["id_resp_dep"]; $d5[$c] = $rs["fecha_mov"]; $d6[$c] = $rs["id_motivo_mov"];
					 	$d7[$c] = $rs["observacion_mov"];
					 	$td = $c;
						$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$d1[$c].'.'.$d2[$c].'.'.$d3[$c].'.'.$d4[$c].'.'.$d5[$c].'.'.$d6[$c].'")>
									<td> '.$contadorControl.'</td>
									<td> '.$rs["nro_document"].'</td>
									<td> '.$rs["fecha_mov"].'</td>
									<td> '.$rs["fecha_reg"].'</td>
									<td> '.$rs["hora_reg"].'</td>
									<td> '.$rs["nom_dep"].'</td>
									<td> '.$rs["ced_per_resp"].' - '.$rs["nom_per_resp"].' '.$rs["ape_per_resp"].'</td>
									<td> '.$rs["ced_per_asig"].' - '.$rs["nom_per_asig"].' '.$rs["ape_per_asig"].'</td>
									<td> '.$rs["login"].'</td>
									<td> '.$rs["des_motivo_mov"].'</td>
									<td> '.$rs["nom_periodo"].'</td>
									<td> '.$rs["observacion_mov"].'</td>
									<td><button type="button" value="'.$contador[$c].'.'.$d1[$c].'.'.$d2[$c].'.'.$d3[$c].'.'.$d4[$c].'.'.$d5[$c].'.'.$d6[$c].'" title="clic para consultar la recepción" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
								</tr>';
						$c++; $contadorControl--;
					}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='13'> <span class='no-hay-datos-mostrar'>NO HAY RECEPCIONES PARA MOSTRAR</span> </td>"; ?>
			</tbody>
				<input type="hidden" name="ident2">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>