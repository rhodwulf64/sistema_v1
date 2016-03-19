<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3){ // posee el nivel de administrador
?>
<table id="formulario" class="form">
	<caption class="acercade-tour">Acerca de ... <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-acercade ayuda-local-frm ayudaguiada-tour"></span></caption>
		<tr class="nombredelsoftware-tour">
			<td  style="width:19%;" >
				<span >Nombre Del Software:</span>
			</td>
			<td>
				<p>Sistema para la Gestion de Bienes Nacionales del Cuerpo de Investigacion Cientificas Penales y Criminalisticas Sub Delegación Acarigua.</p>
			</td>
		</tr>
		<tr class="versiondelsoftware-tour">
			<td >
				<span >Versión del Software:</span>
			</td>
			<td>0.1</td>
		</tr>
		<tr>
			<td colspan="2" align="center" >
				<span class="desarrolladores-tour">Desarrolladores:</span>
			</td>
		</tr>
</table>
<table id="formDesarr">
	<tr>
		<td class="robertoolomos-tour" align="center">
			<img src="../../public/img/desarrolladores/olmos.jpg" onclick="Listar1()" title="Clic para ver Información"><br>
			Roberto Olmos
		</td>
		<td class="danielgudino-tour" align="center">
			<img src="../../public/img/desarrolladores/webmaster.jpg" onclick="Listar2()" title="Clic para ver Información"><br>
			Daniel Gudiño
		</td>
		<td class="nestorinfante-tour" align="center">
			<img src="../../public/img/desarrolladores/nestor.jpg" onclick="Listar3()" title="Clic para ver Información"><br>
			Nestor Infante
		</td>
		<td class="oscarmendez-tour" align="center">
			<img src="../../public/img/desarrolladores/oscar.jpg" onclick="Listar4()" title="Clic para ver Información"><br>
			Oscar Mendez
		</td>
		<td class="jesuspirela-tour" align="center">
			<img src="../../public/img/desarrolladores/jesus.jpg" onclick="Listar5()" title="Clic para ver Información"><br>
			Jesus Pirela
		</td>
	</tr>
</table>

<!-- 
<td id="td-top">
			<span>DANIEL JOSE GUDIÑO LOPEZ</span><br>
			<span>Rol:</span> &nbsp;Desarrollador y Analista, Front-end, Back-end, WebMaster.<br>
			<span>Telef:</span> &nbsp;(0416) 799-09-36 <br>
			<span>Correo Electrónico:</span> &nbsp;Daniel.Jabba@hotmail.com
		</td>


-->
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_olmos.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_webMaster.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_nestor.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_oscar.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_jesus.php");?>
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


