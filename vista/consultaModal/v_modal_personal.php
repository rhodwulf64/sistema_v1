<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Consultar Personal</span>
		<form method="POST" action="../../control/configuracion/c_personal.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><span id="cargando"></span><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<span id="caja-status">
					Estatus: <input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="1" id="est1"/> Activo
					<input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="0" id="est2"/> Inactivo
				</span>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar()"></li>
			</ul> 

			<?php include_once("../../modelo/configuracion/m_personal.php"); 
				$obj_personal = new clsPersonal();
				$tupla = $obj_personal->consutar_P_D_C();
				$c = 1;
				$contenido = "";
			?>
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">&nbsp;N&nbsp;°&nbsp; </td>
					<td>Cedula</td>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Cargo</td>
					<td>Departamento</td>
					<td>Teléfono</td>
					<td >Email</td>
					<td>Estatus</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<?php while($rs = $obj_personal->arreglo($tupla)){
					if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					 	$contador[$c] = $rs["id_per"];
					 	$contador2[$c] = $rs["id_car"];
					 	$contador3[$c] = $rs["id_dep"];
					 	//$td = $c;
						$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$contador2[$c].'.'.$contador3[$c].'")>
									<td> '.$c.'</td>
									<td> '.$rs["ced_per"].'</td>
									<td> '.$rs["nom_per"].'</td>
									<td> '.$rs["ape_per"].'</td>
									<td> '.$rs["nom_car"].'</td>
									<td> '.$rs["nom_dep"].'</td>
									<td> '.$rs["tlf_per"].'</td>
									<td> '.$rs["email_per"].'</td>
									<td> <span id="'.$status.'">'.$status.'</span> </td>
									<td><button type="button" value="'.$contador[$c].'.'.$contador2[$c].'.'.$contador3[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
								</tr>';
						$c++;
					}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='10'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; ?>
			</tbody>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>
<script type="text/javascript">
	function validarSeleccion(value){
		frm = document.envio_Modal;
		if(frm.est1[0].checked && frm.est1[1].checked){
			if(value == 0){
				frm.est1[0].checked = false;
			}else{
				frm.est1[1].checked = false;
			}
		}
	}
</script>