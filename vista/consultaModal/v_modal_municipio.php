<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Consultar Municipio</span>
		<form method="POST" action="../../control/configuracion/c_municipio.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<span id="caja-status">
					Estatus: <input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="1" id="est1"/> Activo
					<input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="0" id="est2"/> Inactivo
				</span>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar()"></li>
			</ul> 

			<?php include_once("../../modelo/configuracion/m_municipio.php"); 
				$obj_municipio = new ClsMunicipio();
				$tupla = $obj_municipio->Consultar_M_E();
				$c=1;
				$contenido="";
			?>
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">N°</td>
					<td>Municipio</td>
					<td>Estado</td>
					<td>Estatus</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
					<?php while($rs = $obj_municipio->converArray($tupla)){
					if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					 	$contador[$c] = $rs["id_mun"];
					 	$contador1[$c] = $rs["id_est"];
					 //$td = $c;
						$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$contador1[$c].'")>
									<td> '.$c.'</td>
									<td> '.$rs["nom_mun"].'</td>
									<td> '.$rs["nom_est"].'</td>
									<td> <span id="'.$status.'">'.$status.'</span> </td>
									<td><button type="button" value="'.$contador[$c].'.'.$contador1[$c].'" title="clic para consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
								</tr>';
						$c++;
					}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; ?>
			</tbody>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>