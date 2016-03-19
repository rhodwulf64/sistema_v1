<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "consultarBienMov"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');


?>
<?php //if(isset($_SESSION["Nom_periodo_mostrar"])){ ?>
	<!-- <span id="mostrar-periodo">Período: <?php //echo $_SESSION["Nom_periodo_mostrar"]; ?></span> -->
<?php //}else{ ?>
	<!-- <span id="mostrar-periodo">Período: </span>
	<span id="msj-No-Hay-periodo">El periodo se encuentra cerrado, no podrá realizar ningun movimiento sobre el inventario.</span> -->
<?php //} ?>


<script type="text/javascript">
	
	function Consul_Bien_ajax(){
		var codigo = $("#n_consul_Bien").val();
		
		$.ajax({
			type: 'POST',
			url: '../../control/movimientos/c_recepcion.php',
			data: ('codigo='+codigo+"&temp=CosulBienCodigo"),
			success: function(resp){
				if(resp == 1){ // encontro el codigo en la base de datos
					LibreriaGenerarModal("el código del Bien Nacional que ingresó, ya se encuentra registrado.");
					document.envio_form.cod_bien_R.style.border = "1px solid red";
					document.envio_form.cod_bien_R.focus();
				}else{
					document.envio_form.cod_bien_R.style.border = "1px solid #ccc";
				}
			}
		});
	}

</script>

<form  method="POST" name="envio_form" autocomplete="off">
<table id="formulario_estilo_individual1" style="width:40%; margin:auto;">

	<caption>Consulta de Bien Nacional <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-consultabienes ayuda-local-frm ayudaguiada-tour"></span> <span id="ic-ayuda-frm" class="icon-question ayudapdf-tour"></span></caption>
<!-- ***************************************** Datos de Entrada del bien nacional *******************************************-->
	<tr>
		<td id="r-paddig" class="codigobien-tour">
			<label>Código del Bien Nacional:<span class="asterisco">*</span> </label>
			<input type="text" class='CampoMov' id="n_consul_Bien" name="n_consul_Bien" placeholder="INGRESE SOLO NUMEROS">		
		</td>
		
	</tr>
	<!--<tr>
		 <td id="r-paddig">
			<label>Departamento:<span class="asterisco">*</span> </label>
			<?php
			//	include_once('../../control/configuracion/c_proveedor.php');
			//	$cboProv = array();
			//	$cod_cat = "";
			//	if(isset($_SESSION['id_prov']))
			//		$cod_p = $_SESSION['id_prov'];
			//	else
			//		$cod_p = "";
			

			//	$cboProv = DibCombProveedor($cod_p);
						
			//	foreach ($cboProv as $elemento) 
			//		echo $elemento;		   
			?>
		</td> 
	</tr>-->	
	<tr id="botonera" class="botonera-tour">
		<td  align="center" colspan="3"><br/>
			<input type="hidden" name="op" />
			<input type="hidden" name="temp"/>	
			<!-- Incluyo la botonera -->
			<button type="button" class="botoneraconsultar-tour" name="inc" value="Incluir" onclick="ModalCondicionCosultabien()"><span id="iconos" class="icon-search"></span><span>Consultar</span></button>				
			<button type="reset" class="botoneracancelar-tour" value="Consultar" name="bus" onclick="" ><span id="iconos" class="icon-cross"></span>Cancelar</button>
		

			<script type="text/javascript">
				document.envio_form.inc.style.background = "#023859";
				document.envio_form.inc.style.color = "#fff";
				document.envio_form.bus.style.background = "#023859";
				document.envio_form.bus.style.color = "#fff";
			</script>
		</td>
	</tr>

</table>
</form>
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