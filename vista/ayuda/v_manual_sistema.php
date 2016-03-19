<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3){ // posee el nivel de administrador
?>
<!--***************************************************************************************************-->
<style>
	.formularioPefil{
		text-align: center;
	}
	#formulario_estilo_individual1 #Perfil{
		background: #023859;
		color: #fff;
	}
	#formulario_estilo_individual1 #Perfil:hover{
		cursor: pointer;
		opacity: 0.9;
	}
	#formulario_estilo_individual1 #iconosP{
		font-size: 18px;
	}
	span#spanClave,span#spanPreg,span#spanTelf,span#spanCorreo{
		display: none;
	}
	
</style>
<table id="formulario_estilo_individual1" class="formularioPefil">
<caption class="manuales-tour">Manuales <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-manuales ayuda-local-frm ayudaguiada-tour"></span> <span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></caption>
<form method="POST" action="../../control/configuracion/c_personal.php" name="envio_form">
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td id="r-paddig">
			<label for="telf"></label><br>
		</td>
		<td id="r-paddig" class="manualdeusuario-tour">
			<label for="ema" >Manual de Usuario</label><br>
			<button type="button" title="clic para Generar Reporte" id="Perfil" class="Perfil" value="npreg" name="" onclick="cPreg()" ><a  href="<?php if($_SESSION['nivel'] == 1) echo '../pdf_link/manuales/Manual de usuario CICPC1.pdf'; else if($_SESSION['nivel']==2) echo '../pdf_link/manuales/Manual de usuario CICPC1.pdf'; else if($_SESSION['nivel']==3) echo '../pdf_link/manuales/Manual de usuario CICPC1.pdf'; ?>" style="text-decoration: none; color: white;" target="_blank"><span id="iconosP" class="icon-file-pdf"></span></a></button>
		</td>
		<?php if ($_SESSION['nivel'] == 1) { ?>
		<td id="r-paddig" class="manualdesistema-tour">
			<label for="ema" >Manual del Sistema</label><br>
			<button type="button" title="clic para Generar Reporte" id="Perfil" class="Perfil" value="Perfil" name="" onclick="cCorreo()" ><a href="../pdf_link/manuales/manual de sistema1.pdf" style="text-decoration: none; color: white;" target="_blank"><span id="iconosP" class="icon-file-pdf"></span></a></button>
		</td>
		<?php } ?>
		<td id="r-paddig" class="manualnormasyprocedimientos-tour">
			<label for="ema" >Manual de Normas y Procedimientos</label><br>
			<button type="button" title="clic para Generar Reporte" id="Perfil" class="Perfil" value="Perfil" name="" onclick="cTelf()" ><a href=" <?php if($_SESSION['nivel'] == 1) echo '../pdf_link/manuales/Manual de normas y procedimientos1.pdf'; else if($_SESSION['nivel']==2) echo '../pdf_link/manuales/Manual de normas y procedimientos1.pdf'; else if($_SESSION['nivel']==3) echo '../pdf_link/manuales/Manual de normas y procedimientos1.pdf'; ?>" style="text-decoration: none; color: white;" target="_blank"><span id="iconosP" class="icon-file-pdf"></span></a></button>
		</td>
		<?php if ($_SESSION['nivel'] == 1) { ?>
		<td id="r-paddig" class="manualdeinstalacion-tour">
			<label for="ema" >Manual de Instalación</label><br>
			<button type="button" title="clic para Generar Reporte" id="Perfil" class="Perfil" value="Perfil" name="" onclick="cTelf()" ><a href="../pdf_link/manuales/Manual de instalacion1.pdf" style="text-decoration: none; color: white;" target="_blank"><span id="iconosP" class="icon-file-pdf"></span></a></button>
		</td>
		<?php } ?>
		<td></td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
	<tr>
		<td><span class="espacio-frm-unico-campo-derecho"></span></td>
		<td></td>
		<td>
			
		</td>
		<?php if ($_SESSION['nivel'] == 1) { ?>
		<td>
			
		</td>
		<?php } ?>
		<td>
			
		</td>
		<?php if ($_SESSION['nivel'] == 1) { ?>
		<td>
			
		</td>
		<?php } ?>
		<td></td>
		<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
	</tr>
</form>
</table>

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


