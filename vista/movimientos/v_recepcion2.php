<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador
?>
<style type="text/css">
	table tr td {
		border:1px solid #ccc;
	}

</style>
<br>
<table >
<form action="" method="POST" name="envio_form" id="">
	<!-- 1 -->
	<tr>
		<td colspan="6">Recepción de Bienes Nacionales</td> <td>n° 1/1</td> <td id="tr-fecha">fecha de Llegada: <input type="text" size="8" id="fecha" name="fecha"  placeholder="Dia-Mes-Año" value="<?php if(isset($_SESSION['fecha'])) echo $_SESSION['fecha'];?>" /> <span class="asterisco">*</span><br>fecha de Registro:<input type="text" size="8" id="fecha" name="fecha" placeholder="Dia-Mes-Año" value="<?php if(isset($_SESSION['fecha'])) echo $_SESSION['fecha'];?>" /> <span class="asterisco">*</span></td>
	</tr>
	<!-- 2 -->
	<tr>
		<td colspan="8">Organismo</td> 
	</tr>	
	<!-- 3 -->
	<tr>
		<td>codigo:</td> 
		<td>
			<select name="cond" id="cond" >
				<option value="sel" selected="selected" disabled="disabled">00</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >15</option>
				<option value="D" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="D") echo $_SESSION["cond"];?> >9700</option>
				<option value="R" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="R") echo $_SESSION["cond"];?> >058</option>
			</select> <span class="asterisco">*</span>
		<td colspan="6"><span id="denominacion-recepcion">Denominacion: 
			<select class="recepcion-select" name="cond" id="cond">
				<option value="sel" selected="selected" disabled="disabled">Seleccione Organismo</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >Ministerio del poder popular para las relaciones interiores y justicia</option>
			</select> <span class="asterisco">*</span></span>
		</td>  
	</tr>	
	<!-- 4 -->
	<tr>
		<td colspan="8">Unidad Adminstradora</td>
	</tr>	
	<!-- 5 -->
	<tr>
		<td>codigo: </td> 
		<td>
			<select name="cond" id="cond" >
				<option value="sel" selected="selected" disabled="disabled">00</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >15</option>
				<option value="D" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="D") echo $_SESSION["cond"];?> >9700</option>
				<option value="R" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="R") echo $_SESSION["cond"];?> >058</option>
			</select> <span class="asterisco">*</span>
		</td> 
		<td colspan="6"><span id="denominacion-recepcion">Denominacion: 
			<select class="recepcion-select" name="cond" id="cond">
				<option value="sel" selected="selected" disabled="disabled">Seleccione Unidad Administradora</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >cuerpo de investigaciones cientificas, penales y criminalistica</option>
			</select> <span class="asterisco">*</span></span>
		</td> 
	</tr>	
	<!-- 6 -->
	<tr>
		<td colspan="8">Dependencia usuaria</td> 
	</tr>	
	<!-- 7 -->
	<tr>
		<td>codigo: </td>
		<td>
			<select name="cond" id="cond" >
				<option value="sel" selected="selected" disabled="disabled">00</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >15</option>
				<option value="D" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="D") echo $_SESSION["cond"];?> >9700</option>
				<option value="R" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="R") echo $_SESSION["cond"];?> >058</option>
			</select> <span class="asterisco">*</span>
		</td> 
		<td colspan="6"><span id="denominacion-recepcion">Denominacion: 
			<select class="recepcion-select" name="cond" id="cond">
				<option value="sel" selected="selected" disabled="disabled">Seleccione dependencia</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >sub Delegación Acarigua</option>
			</select> <span class="asterisco">*</span></span>
		</td> 
	</tr>	
	<!-- 8 -->
	<tr>
		<td colspan="8">Dirección del Despacho</td> 
	</tr>	
	<!-- 9 -->
	<tr>
		<td  colspan="2" align="center">Dirección </td>  
		<td align="left" colspan="6">
			Ubicacion:  <input class="recepcion-dir" type="text" name="direccion" value="Avenida 34 con calle 32 y 33. edificio CICPC, Acarigua Estado Portuguesa"> <span class="asterisco">*</span>
		</td> 
	</tr>	
	<!-- 10 -->
	<tr>
		<td colspan="8">Responsable del uso</td> 
	</tr>	
	<!-- 11 -->
	<tr>
		<td colspan="2">nombre y apellido: </td> 
		<td colspan="2">
			<select name="cond" id="cond">
				<option value="sel" selected="selected" disabled="disabled">Seleccione</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >Godoy C. Freddy A</option>
			</select> <span class="asterisco">*</span>
		</td>  
		<td colspan="2" style="width:15%;">CI:  
			<select name="cond" id="cond">
				<option value="sel" selected="selected" disabled="disabled">Seleccione</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >23052336 </option>
			</select> <span class="asterisco">*</span>
		</td>  
		<td colspan="2">Cargo: 
			<input type="text" name="cargo" value="Jefe de la sub delegacion"> <span class="asterisco">*</span>
		</td>  
	</tr>	
	<!-- 12 -->
	<tr>
		<td rowspan="2" class="recepcion-cant">cantidad</td>
		<td rowspan="2" >codigo</td> 
		<td rowspan="2" >n° de bien</td>
		<td rowspan="2" id="recepcion-des">descripcion</td> 
		<td colspan="2">Inventario</td>
		<td rowspan="2">valor</td> 
		<td rowspan="2">condición</td>
	</tr>	
	<!-- 13 -->
	<tr>
		<td>codigo</td> <td>concepto</td>
	</tr>	
	<!-- 14 -->
	<tr>
		<td colspan="3" style="background:gray;"></td> <td align="right"colspan="3">Vienen...</td> <td>bs 11.006,26</td> <td></td>
	</tr>	
	<!-- 15 -->
	<tr>
		<td colspan="8" align="right"><button type="button" value="modPass" class="botonera-agregar" name="addService" onclick="agregar()" ><span id="icon-plus" class="icon-plus"></span> Agregar</button></td> 
	</tr>	
	<!-- 16 -->
	<tr>
		<td class="recepcion-cant">1</td>
		<td style="width:12%;">
			<select name="cond" id="cond">
				<option value="sel" selected="selected" disabled="disabled">seleccione</option>
				<option value="B" <?php if(isset($_SESSION['cond'])) if($_SESSION['cond']=="B") echo $_SESSION["cond"];?> >20010</option>
			</select> <span class="asterisco">*</span>
		</td> 
		<td >
			<input type="text" size="4">
		</td>
		<td >
			<textarea rows="3" cols="6"></textarea>
		</td> 
		<td colspan="2">Inventario</td>
		<td >valor</td> 
		<td >condición</td>
	</tr>
	<!-- 32 -->
	<tr>
		<td style="background:gray; color:#fff; " colspan="3">C.I.C.P.C</td>  <td align="right" colspan="3">VAN...</td> <td>bs 13.491,39</td> <td></td>
	</tr>	
	<!-- 33 -->
	<tr>
		<td colspan="8">responsable patrimonio primario</td>
	</tr>
	<!-- 34 -->
	<tr>
		<td colspan="3">cedula de indentidad</td> <td colspan="2">apellidos y nombres</td> <td colspan="3">cargo</td>
	</tr>
	<!-- 35 -->
	<tr>
		<td colspan="3">c.i: v- 9.496.015</td> <td colspan="2">Godoy C. Freddy A.</td> <td colspan="3">jefe de la sub delegacion</td>
	</tr>							
</form>
</table>
<br>
<!-- incluyo el mensajde de que los campos son obligatorios -->
	    <?php include_once("../sistema/camposObligatorios.php");?>
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