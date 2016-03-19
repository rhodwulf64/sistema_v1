<style type="text/css">
	table{
		border: 1px solid #ccc;
		width: 200px;
	}
	table tr td{
		border: 1px solid #ccc;
	}
	caption{
		width: 95%;
		background: red;
		color: #fff;
		padding: 5px;
	}
</style>

<?php session_start();
	$cant = sizeof($_POST["txtid_servicio"]);
?>

<table>
	<caption>Datos del personal</caption>
	<tr> 
		<td>
			Id 
		</td>
		<td>
			Nombre
		</td>
		<td>
			Departamento
		</td>
	</tr>
	<?php for($i=0; $i<$cant;$i++){?>			
	<tr> 
		<td>
			<?php echo $i+1; ?> 
		</td>
		<td>
			<?php echo $_POST["nom"]; ?>
		</td>
		<td>
			<?php echo $_POST["txtid_servicio"][$i]; ?>
		</td>
	</tr>		
	<?php } ?>
</table>