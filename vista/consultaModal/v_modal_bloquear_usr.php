<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->
<style>
	#textarea-usr{
		margin-top: -15px;
		margin-bottom: -15px;
		position: relative;
		resize:none;
		width:155px;
		height: 40px;
		text-transform: uppercase;
	}
</style>

<div class="ventanaModal container" id="ventanaModal6">
	<div class="contenido">
		<span id="identificador-modal-superio-izquierdo">Bloquear Usuario</span>
		<form method="POST" action="../../control/seguridad/c_usuario.php" id="envio_Modal6" name="envio_Modal6">
			<ul class="tabla">
				<li><span id="cargando"></span><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<span id="caja-status">
					Estatus: <input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="1" id="est1"/> Activo
					<input type="checkbox" onclick="validarSeleccion(this.value);buscarAjax('')" name="est1" value="0" id="est2"/> Inactivo
				</span>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar6()"></li>
			</ul>  

			
			<?php include_once("../../modelo/seguridad/m_usuario.php");
				$obj_UsuarioB = new usuario();
				$tupla = $obj_UsuarioB->cosultarUsuariosActivos();
				$c = 1;				
				
			?>

			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td id="n">&nbsp;N&nbsp;°&nbsp;</td>
					<td>Usuario</td>
					<td>Tipo de Usuario</td>
					<td>Motivo</td>
					<td style="width:250px;">Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<?php while($rs = $obj_UsuarioB->arreglo($tupla)){ ?>
					<tr class="tbody">
						<td><?php echo $c;?> <?php $contador2[$c] = $c; ?> </td>
						<td><?php echo "CI. ".$rs["login"]." - ".$rs["nom_per"]." ".$rs["ape_per"]; $contador[$c] = $rs["id_usuario"]; ?></td>
						<td><?php echo $rs["nom_perfil"];?></td>
						
						<td>
					       <?php
					        	include_once('../../control/configuracion/combos/c_combos_motivo.php');
					        	$cboMotivo = array();
					        	$cod_mot = "";

					        	if(isset($_SESSION['id_motivo_bloq']))
					         		$cod_mot = $_SESSION['id_motivo_bloq'];
					        	else
					         		$cod_mot = "";
					            
					        	$cboMotivo = DibCombMotivoBloq($cod_mot);
					          
					        	foreach ($cboMotivo as $elementos) 
					        	echo $elementos;     
					       ?> 
					    </td>
						<!-- <td><?php //if($rs["status"]==1){ echo "Activo"; }else{ echo "Inactivo"; }?></td> -->
						<td>
							<!-- <input type="hidden" name="ident2" id="ident2" value="<?php//echo $contador2[$td]; ?>"> -->
							<button type="button" value="<?php echo $contador[$c]; echo '.'.$c; ?>" title="clic para bloquear Usuario" id="Editar" onclick="openVentana19(this.value)"><span id="iconosE" class="icon-user-minus"></span></button>
							<button type="button" value="<?php echo $contador[$c]; echo '.'.$c; ?>" title="clic para resetear Usuario" id="Editar" onclick="openVentana19(this.value)"><span id="iconosE" class="icon-spinner9"></span></button>
						</td>
					</tr>
					<?php $c++; } ?>
					
				<input type="hidden" name="ident3">
				<input type="hidden" name="valorBotton">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="BloqUsrIntranet">
			</tbody>
			</table>
		</form>
	</div>
</div>