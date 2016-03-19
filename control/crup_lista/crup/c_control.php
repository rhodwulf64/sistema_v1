<style type="text/css">
	table{
		border: 1px solid #ccc;
		width: 800px;
		border-collapse: collapse;
		margin: 0 auto;
	}
	table tr td{
		border: 1px solid #ccc;
		text-align: center;
		padding: 10px;
	}
	caption{
		width: 98.8%;
		background: red;
		color: #fff;
		padding: 5px;
	}
	#titulo{ text-transform: capitalize;}
</style>
<meta charset="utf-8">

<table id="tablaBuscar">
<caption>Datos del Detalle del Bien Nacional</caption>
<thead>
	<!-- la informacion requerida llega via consulta -->
	<tr id="cabecera-modal">
		<td id="titulo">N°</td>
		<td id="titulo">codigo</td>
		<td id="titulo">tipo de bien</td>
		<td id="titulo">descripcion</td>
		<td id="titulo">serial</td>
		<td id="titulo">marca</td>
		<td id="titulo">modelo</td>
		<td id="titulo">precio</td>
		<td id="titulo">ubicacion</td>
		<td id="titulo">observación</td>
	</tr>
</thead>
<tbody id="datosAjax">
	<?php  //print_r($_POST);
		$contenido = ""; //variable que me contiene la tabla
		$c = 0; //contador para recorrer las posiciones del vector

		if(isset($_POST["nro_array"])){
			foreach($_POST["nro_array"] as $lementos){
			$contenido.='<tr>
						 	<td> '.$_POST["nro_array"][$c].'</td>
						 	<td> '.$_POST["cod_bien_R_array"][$c].'</td>
						 	<td> '.$_POST["tbien_array"][$c].'</td>
						 	<td> '.$_POST["des_bien_recep_array"][$c].'</td>
						 	<td> '.$_POST["serial_bien_recep_array"][$c].'</td>
						 	<td> '.$_POST["cod_marca_array"][$c].'</td>
						 	<td> '.$_POST["modelo_bien_recep_array"][$c].'</td>
							<td> '.$_POST["precio_bien_recep_array"][$c].'</td>
							<td> '.$_POST["dep_recep_array"][$c].'</td>
						 	<td> '.$_POST["obser_bien_array"][$c].'</td>
					    </tr>';
			$c++;
		}
	}else{
		$contenido = "";
	}
	if($contenido!="")
		echo $contenido;
	else
		echo "<td colspan='10'> <span class='no-hay-datos-mostrar'>NO SE ENCONTRARON DATOS EN EL DETALLE DEL BIEN NACIONAL</span> </td>"; ?>
</tbody>