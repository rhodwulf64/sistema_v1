<!-- v 0.1 libreria jabba consulta modal, base de datos - envio a formulario. -->

<script type="text/javascript">

	function ejecuta2(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}

</script>
<div class="ventanaModal container" id="ventanaModal1">
	<div class="contenido">
	<span id="identificador-modal-superio-izquierdo">Asignación del Bien Nacional</span>
		<style type="text/css">
		.tipo-bien-asig{
			position: relative;
			font-weight: 600;
			font-size: 22px;
			padding: 10px;
			margin-left: 10px;
		}
		span#tbienModalMov{
			position: relative;
			margin-left: 20px;
			padding: 10px;
		}
		#tbienModalMov select{
			height: 38px;
			/*padding: 5px 15px;  /*para windows*/
			border-radius: 3px;
			border:1px solid #C4C4C4;
		}
		</style>
		<!-- <span class="tipo-bien-asig">Tipo de Bien Nacional: <script> document.write(IndexText); </script></span> <br><br><br><br> -->
		<span id="tbienModalMov">
			<label>Tipo de Bien Nacional: </label>
			<?php
				include_once('../../control/configuracion/combos/c_combos_tbien.php');
				$cbotbien = array();
				$cod_tbien = "";
				if(isset($_SESSION['id_tbien_asig']))
					$cod_tbien = $_SESSION['id_tbien_asig'];
				else
					$cod_tbien = "";
						  
				$cbotbien = DibCombtTBien($cod_tbien);
						
				foreach ($cbotbien as $elementos) 
					echo $elementos;		   
			?> 
		</span><br><br>

		<form method="POST" action="../../control/movimientos/c_asignacion.php" id="envio_Modal" name="envio_Modal">
			<ul class="tabla">
				<li><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<li><button type="button" id="btnSalir" onclick="ModalConfirmAgrAsig()"><span id="icon-plus" class="icon-plus"></span> Agregar</button></li>
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="salirListar1()"></li>
			</ul> 
			<table id="tablaBuscar">
			<thead>
				<!-- la informacion requerida llega via consulta -->
				<tr id="cabecera-modal">
					<td>Código</td>
					<td>Serial</td>
					<td>Marca</td>
					<td>Modelo</td>
					<td>Descripción</td>
					<td>Precio</td>
					<td>Fecha Entrada</td>
					<td>Observación</td>
					<td>Acción</td>
				</tr>
			</thead>
			<tbody id="datosAjax">
				<!-- resultado de la consulta desde ajax -->
			</tbody>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>