
<meta charset="utf-8">
<style type="text/css">
	

	.header .nav ul li a.contactoaddClass {
		background: #fff;
		color:#000;
		display:block;
		text-decoration:none;
		padding: 15px 20px 20px 20px;
	}
*{
	margin: 0px;
	padding: 0px;
}
body{
	background: #ccc;
}
	#ruta{
		background: #fff;
		color: #023859;
		padding: 20px;
		width: 100%;
		font-size: 13px;
		font-weight: 700;
	}
	#formularioI {
		position: relative;
		border: 0px;
		opacity: 0.5;
		margin: 20px auto;
		width: 65%;
		background:url(public/img/logo23.png);
		background-repeat: no-repeat;
		background-position: 25px 40px;
		background-size:400px;
		height: 60%;
		font-weight: bold;
		/*font-style: italic;*/
		text-align: center;
		box-shadow: 0px 0px 10px #ccc;		
	}
	#formularioI a{
		font-size: 19px;
		color: #000;
		margin-left: 25%;
	}
	#formularioI tr td{
		padding-top: 10px;
	}
	#formularioI p{
		padding: 6px;
		font-size: 16px;
		color: #000;
		margin-left: 25%;
	}
	
	div#img-centro{
		width: 75%;
		opacity: 0.2;
		margin: auto;
		padding: 80px;
		top: 60px;
		left: 20%;

	}
	div#img-centro img{
		width: 80%;
	}
	</style>
<span id="ruta"><?php if(isset($datos_sistema["abreviatura_sede"])) echo $datos_sistema["abreviatura_sede"]; if(isset($datos_sistema["nom_sed"])) echo " ".$datos_sistema["nom_sed"]; ?> &nbsp; >> &nbsp; CONTACTO</span>
<table id="formularioI">
		<tr>
			<td>
			<a href="" >Número de Contacto Anónimo:</a><br><br> 
			<p style="color:#505050;text-transform:capitalize;"> <?php echo $datos_sistema["telefono"]; ?> </p><br>
			</td>
		</tr>
		<tr><td>
			<a href="" > Correo Electronico:</a><br><br>
				<p style="color:#505050;text-transform:capitalize;"> <?php echo $datos_sistema["correo"]; ?> </p><br>
			</td>
		</tr>
		<tr><td>
			<a href="" >Ubicación:</a><br><br>
				<p style="color:#505050;text-transform:capitalize;"> <?php echo $datos_sistema["direccion"]; ?> </p><br>
			</td>
		</tr>
		<tr><td>
			<a href="" > RIF:</a><br><br>
				<p style="color:#505050;text-transform:capitalize;">  <?php echo $datos_sistema["rif"]; ?> </p><br>
			</td>
		</tr>
</table>
