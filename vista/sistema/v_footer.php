
<!--***************************************************************************************************-->
<?php
	$obj_Fecha = new clsFechaHora();
	$fecha = $obj_Fecha->ObtenerFechaServer();
?>

<p style="position:relative; top:-10px;"> 
	<span class="hora">
		<?php if(isset($fecha)) echo $fecha; ?>
		<!--<script>
			var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			var f = new Date();
			document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
		</script>-->
	</span>
	<img src="<?php  if(isset($_SESSION['nivel'])) if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) echo '../../'; ?>public/img/cc_fondo_negro.png" style="width:80px; height:30px; box-sizing:border-box;  position:relative; background:#fff;top:8px; border-radius:1px;"> <span class="hora" style="position:relative; left:15px;"> <?php if(isset($datos_sistema["abreviatura_sede"])) echo $datos_sistema["abreviatura_sede"]; ?> Algunos Derechos Reservados. UPTP J.J Montilla.</span>
	<!-- &copy; Desarrolladores: <a a href="vista/sistema/desarrolladores.php" target="_blank" onClick="window.open(this.href, this.target, 'width=300,height=400'); return false;">Daniel Gudiño, Nestor Infante, Jesus Pirela, Oscar Mendez. </a> UPTP J.J Montilla.-->
</p>
<!--***************************************************************************************************-->