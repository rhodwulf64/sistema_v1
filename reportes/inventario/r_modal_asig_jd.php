<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->
<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}
</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
		<span id="identificador-modal-superio-izquierdo">Tipo de Reportes</span>
		<form method="POST" action="../../control/c_reportes/c_asignacion_jd/c_asig_jd.php" id="envio_Modal" name="envio_Modal"><br>
			         &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar(),location.href='?accion=inicio'">
			

			<?php include_once("../../modelo/m_reportes/modelo_consulta_rep/m_consulta_recep.php"); 
				$obj_recep = new clsConsultaRecep();
				$tupla = $obj_recep->consultar();
				$c = 1;
				$contenido = "";
			?>
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n" >N°</td>
					<td>Nombre del Reporte</td>
					<td>Tipo de Reporte</td>
                    <td>Estatus</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<?php while($rs = $obj_recep->converArray($tupla)){
                    if($rs['tipo_rep']=="ASIGNACIONJD"){
                    	$tipo="ASIGNACION";
				 	if($rs["status"]==2){ $status= "<span id='progress'>EN DESARROLLO</span>";}else{ $status= "<span id='listo'>LISTO</span>"; } 
				 	$contador[$c] = $rs["id_reporte"];

					$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
								<td> '.$c.'</td>
								<td> '.$rs["nom_rep"].'</td>
                                <td> '.$tipo.'</td>
								<td> <span id="'.$status.'">'.$status.' </span></td>
								<td><button type="button" value="'.$contador[$c].'" title="clic para abrir la busqueda" id="Editar" onclick="ejecuta(this.value);pantalla()"><span id="iconosE" class="icon-file-text"></span></button></td>
							</tr>';
					$c++; 
                    }
				}
                    
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; ?>
			</tbody>
				<input type="hidden" name="ident">
			</table>
		</form>
	</div>
</div>
<script type="text/javascript">

</script>