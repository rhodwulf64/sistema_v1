<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
?>
<style type="text/css">
	p#M_D{
		background: red;
		padding: 10px;
		color: #fff;
		font-size: 18px;
	}
	#bit td{
		border: 1px solid #ccc;
	}
	#tablaBitacoraMov{
		width: 100%;
	}
	.Activo{
		padding: 5px;
		background: green;
		color: #fff;
		border-radius: 4px;
	}
	.Anulada{
		padding: 5px;
		background: red;
		color: #fff;
		border-radius: 4px;
	}

</style>
<!--***************************************************************************************************-->
<span id="identificador-modal-superio-izquierdo" style="font-weight:bold;">Bitacora de Movimiento</span>
	<table align="center" id="tablaBitacoraMov"  >
		<?php 
			include_once('../../modelo/movimientos/m_bitacora_mov.php');
			include_once("../../public/lib/Zebra_Pagination.php"); 
			$obj_bitacora= new clsBitacora();
			$paginacion = new Zebra_Pagination();
			
			$total_reg = $obj_bitacora->CountRegistros();
			$cantidad_mostrar = 6; // limite 
			$indice = (($paginacion->get_page() - 1) * $cantidad_mostrar);
			/** carga la data de zebra pagination **/
			
			$paginacion->records($total_reg); // cantidad total de registro
			$paginacion->records_per_page($cantidad_mostrar); // mostrar cuantos registros queremos en cada pagina
			$paginacion->padding(true);

			$rs=$obj_bitacora->consulta($indice,$cantidad_mostrar);
			$c=1;

			$rs2 = $obj_bitacora->consultarCantRegisMov();
			$tuplaCantida = $obj_bitacora->converArray($rs2);

			/* movimiento realizados */	
			$cantRec  = $tuplaCantida['cantRec'];
			$cantAsig = $tuplaCantida['cantAsg'];
			$cantDev  = $tuplaCantida['cantDev'];
			$cantDes  = $tuplaCantida['cantDes'];

			/* movimiento anulados */
			$cantRecAnu = $tuplaCantida['cantRecAnu'];
			$cantAsigAnu= $tuplaCantida['cantAsgAnu'];
			$cantDevAnu = $tuplaCantida['cantDevAnu'];
			$cantDesAnu = $tuplaCantida['cantDesAnu'];

			$nroMotivo = ""; // variable contador para el tipo de movimiento 
		?>
		<thead>
			<tr id="cabecera-bitacora">
				<td>&nbsp;N&nbsp;°&nbsp;</td>
				<td >Usuario</td>
				<td>Tipo de usuario</td>
				<td>Movimiento</td>
				<td>Estatus</td>
				<td>Motivo</td>
				<td>Fecha de Movimiento</td>
			</tr>
		</thead>	
		<tbody></tbody>
			<?php while($tupla=$obj_bitacora->converArray($rs)){

				$fecha=$obj_bitacora->fecha_salida($tupla['FECHA_MOVIMIENTO']);


			/*	switch ($tupla['tipo_motivo']){
					//movimiento
					case 'RECEPCIÓN': $tipo="RECEPCIÓN"; $nroMotivo = $cantRec; $cantRec--; break;
					case 'ASIGNACIÓN': $tipo="ASIGNACIÓN"; $nroMotivo = $cantAsig; $cantAsig--; break;
					case 'DEVOLUCIÓN': $tipo="DEVOLUCIÓN"; $nroMotivo = $cantDev; $cantDev--; break;
					case 'DESINCORPORACIÓN': $tipo="DESINCORPORACIÓN"; $nroMotivo = $cantDes; $cantDes--; break;
					// anulacion
					case 'ANULACIÓNDV': $tipo="ANULACIÓN-DEVOLUCIÓN"; $nroMotivo = $cantDevAnu; $cantDevAnu--; break;
					case 'ANULACIÓNRE': $tipo="ANULACIÓN-RECEPCIÓN"; $nroMotivo = $cantRecAnu; $cantRecAnu--; break;
					case 'ANULACIÓNAS': $tipo="ANULACIÓN-ASIGNACIÓN"; $nroMotivo = $cantAsigAnu; $cantAsigAnu--; break;
					case 'ANULACIÓNDS': $tipo="ANULACIÓN-DESINCORPORACIÓN"; $nroMotivo = $cantDesAnu; $cantDesAnu--; break;
					
					default: $tipo = "nada"; break;
				}*/
 
				if( $tupla['status'] == 1){
					$estatus = "Activo";
					$estatusPintar = "Activo";
				}else{
					$estatus = "Anulada";
					$estatusPintar = "Anulada";
				}

				echo "<tr id='bit'>";
				echo "<td>".$c."</td>";
				echo  "<td>".$tupla['USUARIO']."</td>";
				echo  "<td>".$tupla['nom_perfil']."</td>";
				//echo  "<td>".$tipo.". N° ".$nroMotivo.".</td>";
				echo "<td>".$tupla['TIPO_MOVIMIENTO']."</td>";
				echo "<td><span class='".$estatusPintar."'>".$estatus."</span></td>";
				echo  "<td>".$tupla['des_motivo_mov']."</td>";
				echo  "<td>".$fecha."</td>";
				echo "</tr>";

			 $c++; } ?>
			 </tbody>
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

<!--***************************************************************************************************-->
<?php
	}
	else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}
else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}
?>