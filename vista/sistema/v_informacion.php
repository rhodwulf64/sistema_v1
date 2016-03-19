<meta charset="utf-8">
<style type="text/css">
	
	.header .nav ul li a.InformacionaddClass {
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
		width: 85%;
		background:url(public/img/logo23.png);
		background-repeat: no-repeat;
		background-position: -50px 40px;
		background-size:400px;
		height: auto;
		font-weight: bold;
		/*font-style: italic;*/
		text-align: center;
		box-shadow: 0px 0px 10px #ccc;		
	}
	#formularioI a{
		text-align:justify;
		font-size: 19px;
		color: #000;
		margin-left: 25%;
	}
	#formularioI tr td{
		padding-top: 10px;
	}
	#formularioI p{
		text-align:justify;
		padding: 6px;
		font-size: 16px;
		color: #000;
		margin-left: 25%;
		max-width: 70%;
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
<span id="ruta"><?php if(isset($datos_sistema["abreviatura_sede"])) echo $datos_sistema["abreviatura_sede"]; if(isset($datos_sistema["nom_sed"])) echo " ".$datos_sistema["nom_sed"]; ?> &nbsp; >> &nbsp; NOSOTROS</span>
<table id="formularioI">
		<tr>
			<td>
			<a href="" >¿ Quienes Somos ?</a><br><br> 
			<p style="color:#505050;text-transform:capitalize;"> <?php echo $datos_sistema["quienes_somos"]; ?> </p>
			</td>
		</tr>
		<tr><td>
			<a href="" >¿ Nuestros Objetivos Generales ?</a><br><br>
				<p style="color:#505050;text-transform:capitalize;"> <?php echo $datos_sistema["obj_general"]; ?> </p>
			</td>
		</tr>
		<tr><td>
			<a href="" >¿ Nuestros Objetivos Especificos ?</a><br><br>
				<p style="color:#505050;text-transform:capitalize;"> <?php echo $datos_sistema["obj_especifico"]; ?> </p>
			</td>
		</tr>
		<tr><td>
			<a href="" >¿ Nuestras Misión ?</a><br><br>
				<p style="color:#505050;text-transform:capitalize;">  <?php echo $datos_sistema["mision"]; ?> </p>
			</td>
		</tr>
		<tr><td>
			<a href="" >¿ Nuestras Visión ?</a><br><br>
				<p style="color:#505050;text-transform:capitalize;"> <?php echo $datos_sistema["vision"]; ?> </p>
			</td>
		</tr>
</table>
