<html>
	<head>
		<title></title>
		<meta charset="UTF-8">
<style>
/*.ventanaModal{
    /*background: rgba(2,56,89,.98);*/
    /*background: rgba(0,0,0,.82);*/
  /*  background: #fff;
    border: 2px solid white;
    box-shadow: 0px 0px 5px white;
    margin: 0 auto;
    height: 600px;
    width:0%;
    overflow: hidden;
    /*z-index: 12;*/
  /* position: absolute;
    top: 10px;
    left: 0px;
    /*left: 10%;*/
   /* border-radius: 2px;
    visibility: hidden;
    transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
}*/
.ventanaModal .contenido{
    padding-top: 5px;
}
.ventanaModal a{
    cursor: pointer;
}
.tabla{
    color: white;
    font-weight: bold;
    text-align: center;
}
.tabla li{
    display: inline-block;
}
.form-control{
    height: 30px;
    padding: 15px;
}
#btnSalir{
	background: #023859;
	color: #fff;
	padding: 11px 15px;
	border-radius: 3px;
	border:1px solid #C4C4C4;
	margin-top: 4px;
	font-weight: 600;
}
#btnSalir:hover{
	cursor: pointer;
	opacity: 0.9;
}
                    /*********  Tabla de datos Modadl ***********/
	table#tablaBuscar{
		position: relative;
		width: 60%;
		border:1px solid #ccc;
		color: #000;
		margin: auto;
		margin-top: 20px;
	}
	table#tablaBuscar tr.tbody td{
		border:1px solid #ccc;
		padding: 5px;
		text-align: center;
	}
	.tabla li input[type="text"]{
		position: relative;
		width: 340px;
		height: 5px;
		padding: 18px;
		border:1px solid #ccc;
		border-radius: 1px;
	}
	table#tablaBuscar tr td button#Editar{
		padding: 7px 10px;
		border-radius: 3px;
		border:1px solid #C4C4C4;
		margin-top: 4px;
		background: #023859;
		color: #fff;
		font-size: 18px;
	}
	table#tablaBuscar tr td button#Editar:hover{
		cursor: pointer;
		opacity: 0.9;
	}
	table#tablaBuscar tr#cabecera-modal{
		background: #ccc;
		color: #000;
	}
	table#tablaBuscar tr#cabecera-modal td{
		text-align: center;
		border:1px solid #E9E9E9;
		font-size: 17px;
	}
	table#tablaBuscar tr#cabecera-modal{
		border:1px solid #ccc;
	}
	table#tablaBuscar tr:hover {
		background: #F2F2F2;
	}
</style>
	</head>
<body>

	<script type="text/javascript">	
	function buscarAjaxBien(){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../../../control/movimientos/c_asignacion.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		/* preparo mis variables para la condicion del bien */
		var tipo_bien_ajax = document.getElementById('tbien').value;
		var fecha_asig_ajax = document.getElementById('recibirFecha').value;
		/**********************/

		ajax.send("operacion=busquedaAjax&tipo_bien_a="+tipo_bien_ajax+"&fecha_asig_aj="+fecha_asig_ajax); //paso variable con estatus Nulo y nombre
	}


	function ejecuta2(valor){
		document.envio_Modal.ident.value = valor;
		document.envio_Modal.submit();
	}
	//var IndexText = ComboTipoBien.options[ComboTipoBien.selectedIndex].text;
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
		</style>
		<!--<span class="tipo-bien-asig">Tipo de Bien Nacional: <script> document.write(IndexText); </script></span>--> 
		<label>Tipo Bien:<span class="asterisco">*</span> </label>
			<?php
				include_once('../../../../control/configuracion/combos/c_combos_tbien.php');
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


		<br><br><br><br>
		<form method="POST" action="../../control/movimientos/c_asignacion.php" id="envio_Modal" name="envio_Modal">
			<input type="hidden" name="recibirFecha" id="recibirFecha" value="<?php if(isset($_GET["fecha"])) echo $_GET["fecha"]; ?>" >
			<ul class="tabla">
				<li><input type="text" onkeyup="buscarAjax(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"></li>
				<!--<li><button type="button" id="btnSalir"><span id="icon-plus" class="icon-plus"></span> Agregar</button></li>-->
				<li><input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="QuitarVentanaMov()"></li>
			</ul> 

			<!--<?php 
				/*include_once("../../modelo/movimientos/consulta_recepcion.php"); 
				$obj_recepcion = new clsRecepcionConsul();
				$tupla = $obj_recepcion->Consultar_Recepcion();
				$c = 1;
				$contenido = "";*/
			?>-->
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
			
				<!--<?php/* while($rs = $obj_recepcion->converArray($tupla)){
					if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					 	$contador[$c] = $rs["id_mov"];
					 	$d1[$c] = $rs["nro_document"]; $d2[$c] = $rs["fecha_mov"]; $d3[$c] = $rs["id_prov"];
					 	$d4[$c] = $rs["id_per"]; $d5[$c] = $rs["id_motivo_mov"]; $d6[$c] = $rs["observacion_mov"];
					 	$td = $c;
						$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$d1[$c].'.'.$d2[$c].'.'.$d3[$c].'.'.$d4[$c].'.'.$d5[$c].'.'.$d6[$c].'")>
									<td> '.$rs["id_mov"].'</td>
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
									<td><button type="button" value="'.$contador[$c].'.'.$d1[$c].'.'.$d2[$c].'.'.$d3[$c].'.'.$d4[$c].'.'.$d5[$c].'.'.$d6[$c].'" title="clic para consultar la recepción" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
								</tr>';
						$c++;
					}
				if($contenido!="")
					echo $contenido;
				else
					echo "<td colspan='13'> <span class='no-hay-datos-mostrar'>NO HAY RECEPCIONES PARA MOSTRAR</span> </td>"; */?>-->
			</tbody>
				<input type="hidden" name="ident">
				<!-- <input type="hidden" name="ident2"> -->
				<input type="hidden" name="temp" value="Consultar">
			</table>
		</form>
	</div>
</div>
</body>
</html>