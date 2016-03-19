<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->
<script type="text/javascript">

	function ejecuta(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}
</script>
<div class="ventanaModal container" id="ventanaModal">
	<div class="contenido">
		<span id="identificador-modal-superio-izquierdo">Consultar Cargo</span>
		<form method="POST" action="../../control/configuracion/c_cargo.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><span id="cargando"></span><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<span id="caja-status">
					Estatus: <input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="1" id="est1"/> Activo
					<input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="0" id="est2"/> Inactivo
				</span>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar()"></li>
			</ul> 

			<script>
			function paginacionAjax(paginaActual){
				//paginacion desde ajax
				var ajax = new XMLHttpRequest();
				ajax.open("POST","../../control/configuracion/c_cargo.php",true);

				ajax.onreadystatechange=function(){
					if(ajax.readyState == 4 ){
						$("#datosAjax").html(ajax.responseText);
						//document.getElementById("datosAjax").innerHTML = ajax.responseText;
					}
				}
				ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				ajax.send("temp=paginacionAjax&nroPaginacion="+paginaActual);
				/*$.ajax({
					type: 'POST',
					url: '../../control/configuracion/c_cargo.php',
					data: ('nroPaginacion='+paginaActual+"&temp=paginacionAjax"),
					success: function(resp){
						$("#datosAjax").html(ajax.responseText);
						console.log(resp);
					}
				});*/
			}
			</script>

			<?php 	
				include_once("../../modelo/configuracion/m_cargo.php");
				include_once("../../public/lib/Zebra_Pagination.php"); 
				$obj_cargo = new clsCargo();
				$paginacion = new Zebra_Pagination();
				
				$total_cargos = $obj_cargo->CountRegistros();
				$cantidad_mostrar = 6; // limite 
				$indice = (($paginacion->get_page() - 1) * $cantidad_mostrar);
				/** carga la data de zebra pagination **/
				
				$paginacion->records($total_cargos); // cantidad total de registro
				$paginacion->records_per_page($cantidad_mostrar); // mostrar cuantos registros queremos en cada pagina
				$paginacion->padding(true);


				
				$tupla = $obj_cargo->consultar($indice,$cantidad_mostrar);
				
				$c = 1;
				$contenido = "";
			?>
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n" >N°</td>
					<td>Cargo</td>
					<td>Estatus</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<?php while($rs = $obj_cargo->converArray($tupla)){
				 	if($rs["status"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
				 	$contador[$c] = $rs["id_car"];
					$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
								<td> '.$c.'</td>
								<td> '.$rs["nom_car"].'</td>
								<td> <span id="'.$status.'">'.$status.' </span></td>
								<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
							</tr>';
					$c++; 
				}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; ?>
				<input type="hidden" name="ident">
			</table>

			<style type="text/css">
					#paginacion{
						position: relative;
						top: 30px;
						text-align: center;
						background: red;
					}
					#paginacion ul{
						width: 100%;
					}
					#paginacion ul li{
						position: relative;
						display: inline-block;
					}
					#paginacion ul li a{ 
						background: #F7F7F7;
						color: #023859;
						padding: 10px 15px 10px 15px;
						border-radius: 1px;
						border: 1px solid #DFDFDF;
						font-size: 14px;
						font-weight: 500;
					}
					#paginacion ul li a:hover{ 
						background: #F0F0F0;
					}
					#paginacion ul li a.seleccionado{
						background: red;
					}
			</style>
				<span id="paginacion"><?php $paginacion->render(); ?><span>
			</tbody>
		</form>
	</div>
</div>