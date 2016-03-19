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
	
</style>
<!--***************************************************************************************************-->
<span id="identificador-modal-superio-izquierdo" style="font-weight:bold;">Bitacora de Acceso</span>
	<table align="center"  id="tablaBitacoraMov" class="tablaBitAccs">
		<?php 
			include_once('../../modelo/seguridad/m_bitacora_acceso.php');
			include_once("../../public/lib/Zebra_Pagination.php"); 
			$obj_bitacora= new clsBitacoraAccess();
			$paginacion = new Zebra_Pagination();
			
			$total_reg = $obj_bitacora->CountRegistros();
			$cantidad_mostrar = 3; // limite 
			$indice = (($paginacion->get_page() - 1) * $cantidad_mostrar);
			/** carga la data de zebra pagination **/
			
			$paginacion->records($total_reg); // cantidad total de registro
			$paginacion->records_per_page($cantidad_mostrar); // mostrar cuantos registros queremos en cada pagina
			$paginacion->padding(true);


			$rs=$obj_bitacora->consulta($indice,$cantidad_mostrar);
		$c=1;
		?>
		<thead>
			<tr id="cabecera-bitacora" >
				<td width="300d">&nbsp;N&nbsp;°&nbsp;</td>
				<td >Usuario</td>
				<td>Tipo de Usuario</td>
				<td>Direccion IP</td>
				<td>Direccion MAC</td>
				<td>Proveedor de Servicio</td>
				<td>Nombre Remoto</td>
				<td>Sistema Operativo</td>
				<td>Navegador</td>
				<td>Fecha de Inicio / Hora</td>
				<td >Fecha Salida / Hora</td>
				
				
			</tr>
		</thead>	
		
		<tbody></tbody>
			  <?php while ($tupla=$obj_bitacora->converArray($rs)) {
			  		$fecha1=$obj_bitacora->fecha_salida($tupla['fecha_inicio']);
			  		$fecha2=$obj_bitacora->fecha_salida($tupla['fecha_fin']);
			  		
			  		echo "<tr id='bit'>";
			  			echo "<td >".$c."</td>";
			  			echo "<td>".$tupla['conc']."</td>";
			  			echo "<td>".$tupla['nom_perfil']."</td>";
			  			echo "<td>".$tupla['dir_ip']."</td>";
			  			echo "<td>".$tupla['dir_mac']."</td>";
			  			echo "<td>".$tupla['nom_pc']."</td>";
			  			echo "<td>".$tupla['nom_remoto']."</td>";
			  			echo "<td>".$tupla['so']."</td>";
			  			echo "<td>".$tupla['navegador']."</td>";
			  			echo "<td>".$fecha1.' / '.$tupla['hora_inicio']."</td>";
			  			echo "<td>".$fecha2.' / '.$tupla['hora_fin']."</td>";
			  			
			  		echo "</tr>";

			  	$c++;
			  }

				 ?>
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