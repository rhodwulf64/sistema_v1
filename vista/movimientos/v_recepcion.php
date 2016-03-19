<?php @session_start();
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "recepcion"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');

?>
<script type="text/javascript">

	/* validar que el codigo no se repita en la base de datos mediante ajax */
	
	function validarCodigoAjax(){
		var codigo = $("#cod_bien_R").val();
		
		$.ajax({
			type: 'POST',
			url: '../../control/movimientos/c_recepcion.php',
			data: ('codigo='+codigo+"&temp=validarCodigo"),
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

	function Mostrar(){
		var submenu1 = document.getElementById('datos-entrada-bien1');
		var submenu2 = document.getElementById('datos-entrada-bien2');
		//var submenu3 = document.getElementById('datos-entrada-bien3');
		//submenu.style.visibility = "visible";
		submenu1.style.visibility = "visible";
		submenu2.style.visibility = "visible";
		//submenu3.style.visibility = "visible";

		submenu1.style.position = "relative";
		submenu2.style.position = "relative";
		//submenu3.style.position = "relative";

		document.getElementById('iconos-recep-men').style.display = "inline";
		document.getElementById('iconos-recep-mas').style.display = "none";
		CerrarBien();
	}
	function Cerrar(){
		var submenu1 = document.getElementById('datos-entrada-bien1');
		var submenu2 = document.getElementById('datos-entrada-bien2');
		//var submenu3 = document.getElementById('datos-entrada-bien3');

		submenu1.style.visibility = "hidden";
		submenu2.style.visibility = "hidden";
		//submenu3.style.visibility = "hidden";

		submenu1.style.position = "absolute";
		submenu2.style.position = "absolute";
		//submenu3.style.position = "absolute";

		document.getElementById('iconos-recep-men').style.display = "none";
		document.getElementById('iconos-recep-mas').style.display = "inline";
	}

	function MostrarBien(){
		var frm = document.envio_form;
		if(document.getElementById('validarCaberaLlena').value == "desbloqueada"){
			if( validarCabeceraRecep() ){
				var submenu4 = document.getElementById('datos-entrada-bien4');
				var submenu5 = document.getElementById('datos-entrada-bien5');
				var submenu6 = document.getElementById('datos-entrada-bien6');
				//submenu.style.visibility = "visible";
				submenu4.style.visibility = "visible";
				submenu5.style.visibility = "visible";
				submenu6.style.visibility = "visible";

				submenu4.style.position = "relative";
				submenu5.style.position = "relative";
				submenu6.style.position = "relative";

				document.getElementById('iconos-recep-bien-men').style.display = "inline";
				document.getElementById('iconos-recep-bien-mas').style.display = "none";
				Cerrar();
				ValidarBienDisableTour();
			}
		}else{
			//alert("debe de hacer clic en el boton nuevo");
			OpenVentaVlidarMas();
		}
	}
	function CerrarBien(){
		var submenu4 = document.getElementById('datos-entrada-bien4');
		var submenu5 = document.getElementById('datos-entrada-bien5');
		var submenu6 = document.getElementById('datos-entrada-bien6');

		submenu4.style.visibility = "hidden";
		submenu5.style.visibility = "hidden";
		submenu6.style.visibility = "hidden";

		submenu4.style.position = "absolute";
		submenu5.style.position = "absolute";
		submenu6.style.position = "absolute";

		document.getElementById('iconos-recep-bien-men').style.display = "none";
		document.getElementById('iconos-recep-bien-mas').style.display = "inline";
		document.getElementById('validarCaberaLlena').value = "desbloqueada";
	}

	/* datapikert */
		$(function(){
			// $("#fecha1").datepicker();
			// $("#fecha2").datepicker({
			// 	changeMonth:true,
			// 	changeYear:true,
			// });
			var f = new Date();
			var fecha = "01/"+(f.getMonth()+1)+"/"+f.getFullYear();

				$("#f_lL").datepicker({

					changeYear:true,
					changeMonth:true,
					
					//showOn: "button",
					//buttonImage: "../../public/css/calendario/images/ico.png",
					//buttonImageOnly: true,
					monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
					dateFormat: 'dd/mm/yy', firstDay: 0,
					initStatus: 'Selecciona la fecha', isRTL: false,
					showButtonPanel: true,

					maxDate: '+0d',
					minDate: fecha
			});
		});

</script>
<form action="../../control/movimientos/c_recepcion.php" method="POST" name="envio_form" id="envio_form" autocomplete="off">
<!-- ********************* Validar Período Abierto ****************** -->
<?php if(isset($_SESSION["Nom_periodo_mostrar"])){ ?>
	<span id="mostrar-periodo">Período: <?php echo $_SESSION["Nom_periodo_mostrar"]; ?></span>
<?php }else{ ?>
	<span id="mostrar-periodo-no">Período: </span>
	<span id="msj-No-Hay-periodo">El periodo se encuentra cerrado, no podrá realizar ningun movimiento sobre el inventario.</span>
<?php } ?>
<!-- ********************* Cierre Validar Período Abierto ****************** -->
<input type="hidden" name="validarPeriodo" id="validarPeriodo" value="<?php if(isset($_SESSION["Nom_periodo_mostrar"])) echo  $_SESSION["Nom_periodo_mostrar"];?>">
<table id="formulario_estilo_individual1">
<caption class="recepcion-tour"><span id="iconos-recep-mas" title="clic para mostrar la vista de entrada" onclick="Mostrar()" class="icon-plus"></span><span id="iconos-recep-men" title="clic para no mostrar la vista de entrada" onclick="Cerrar()" class="icon-minus"></span>Recepción: Datos de Entrada <span title="Clic para ver ayuda guiada" class="icon-magic-wand element-recepcion ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/inventario/Recepción1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
<!-- ***************************************** Datos de Entrada del bien nacional *******************************************-->
	<tr id="datos-entrada-bien1">
		<!-- <td id="r-paddig" >
			<label>Nro. de Recepción:<span class="asterisco">*</span> </label>
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this)" name="n_R" readonly="readonly" placeholder="se genera Automaticamente">		
		</td> -->
		<!-- id del periodo actual -->
		<input type="hidden" name="idPeriodAnulacion" value="<?php if(isset($_SESSION["TrazabPeriodoAnterior"])) if($_SESSION["TrazabPeriodoAnterior"] == '1') echo '1'; ?>">
		<!-- variable para el numero de recepcion -->
		<input type="hidden" name="n_R" value="<?php if(isset($_SESSION['n_R'])) echo $_SESSION['n_R'];   ?>">
		<!-- variable para el saber que tipo de mivimiento estoy realizando -->
		<input type="hidden" name="tipo_de_mov" value="1">
		<!-- variable utilizada para controlar la anulacion -->
		<input type="hidden" name="control_anulacion" value="<?php if(isset($_SESSION['anulacion'])) if($_SESSION['anulacion'] == '1') echo '1'; if(isset($_SESSION['anulacion'])) if($_SESSION['anulacion'] == '2') echo '2'; ?>">
		<input type="hidden" name="control_anulacion_Trazabilidad" value="<?php if(isset($_SESSION['anulacionTrazabilidad'])) if($_SESSION['anulacionTrazabilidad'] == '1') echo '1'; ?>">
		
		<td class="numerodedocumento-tour" id="r-paddig" style='width:35%;'> 
			<label>Nro. Documento:<span class="asterisco">*</span> </label>
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this)" id="n_D" name="n_D" readonly="readonly" placeholder="Ingrese orden de compra entre otros" value="<?php if(isset($_SESSION['n_D'])) echo $_SESSION['n_D'] ;?>">	
		</td>
		<td id="r-paddig" class="fechadellegada-tour">
			<label>Fecha de Llegada:<span class="asterisco">*</span>  </label> 
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this)" id="f_lL" name="f_lL" readonly="readonly" placeholder="Día-Mes-Año" value="<?php if(isset($_SESSION['f_lL'])) echo $_SESSION['f_lL'] ;?>">
		</td>
		<td id="r-paddig" class="proveedor-tour">
			<label>Proveedor:<span class="asterisco">*</span> </label>
			<?php
				include_once('../../control/configuracion/c_proveedor.php');
				$cboProv = array();
				$cod_cat = "";
				if(isset($_SESSION['id_prov_recep']))
					$cod_p = $_SESSION['id_prov_recep'];
				else
					$cod_p = "";
						  
				$cboProv = DibCombProveedor($cod_p);
						
				foreach ($cboProv as $elemento) 
					echo $elemento;		   
			?>
		</td>
	</tr>
	<tr id="datos-entrada-bien2">
		<td id="r-paddig" class="responsablerecepcion-tour">
			<label>Responsable Recepción:<span class="asterisco">*</span>  </label>
			<?php
				include_once('../../control/configuracion/combos/c_combos_personal.php');
				$cboPersonal = array();
				$cod_per = "";
				if(isset($_SESSION['id_personal_recep']))
					$cod_per = $_SESSION['id_personal_recep'];
				else
					$cod_per = "";
						  
				$cboPersonal = DibCombPersonal($cod_per);
						
				foreach ($cboPersonal as $elementos) 
					echo $elementos;		   
			?>
		</td>
		<td id="r-paddig" class="motivorecepcion-tour">
			<label>Motivo:<span class="asterisco">*</span>  </label><br>
			<?php
				include_once('../../control/configuracion/combos/c_combos_motivo.php');
				$cboMotivo = array();
				$cod_mot = "";
				if(isset($_SESSION['id_motivo_recep']))
					$cod_mot = $_SESSION['id_motivo_recep'];
				else
					$cod_mot = "";
						  
				$cboMotivo = DibCombMotivo($cod_mot);
						
				foreach ($cboMotivo as $elementos) 
					echo $elementos;		   
			?>
		</td>
		<td id="r-paddig" class="observacionrecepcion-tour">
			<label>Observación: </label>
			<textarea id="textareaCabecera" onBlur="cambio_mayus(this)" class="CampoMov" readonly="readonly" name="obser_cabecera" placeholder="Ingrese Observación, este campo es opcional "><?php if(isset($_SESSION['obser_cabecera'])) echo $_SESSION['obser_cabecera'] ;?></textarea>
		</td>
	</tr>
	<!-- <tr id="datos-entrada-bien3">
		<td id="r-paddig" colspan="3">
			<label>Observación: </label>
			<textarea id="textareaCabecera" onBlur="cambio_mayus(this)" class="CampoMov" readonly="readonly" name="obser_cabecera" placeholder="Ingrese Observación, este campo es opcional "></textarea>
		</td>
	</tr> -->
<!-- ***************************************** Cierre Datos de Entrada del bien nacional *******************************************-->

<!-- ****************************************** Datos para el Rigistro del bien nacional *************************************************-->
	<tr>
		<td colspan="3" class="recepcion2-tour">
			<div class="caption"><?php if(!isset($_SESSION["GlobalDetalle"])){?><span id="iconos-recep-bien-mas" title="clic para mostrar la vista de bien" onclick="MostrarBien()" class="icon-plus"></span><span id="iconos-recep-bien-men" title="clic para no mostrar la vista del bien" onclick="CerrarBien()" class="icon-minus"></span> <?php } ?>Recepción: Datos del Bien Nacional <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-recepcion2 ayuda-local-frm ayudaguiada2-tour "></span> </div>
		</td>
	</tr>
	<tr id="datos-entrada-bien4">
		<td id="r-paddig" class="codigotipobien-tour" >
			<label>Código del Bien:<span class="asterisco">*</span> </label>
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this),validarCodigoAjax()" readonly="readonly" id="cod_bien_R" name="cod_bien_R" placeholder="Ingrese Código del Bien">
		</td>
		<td id="r-paddig" class="tipobien-tour">
			<label>Tipo Bien:<span class="asterisco">*</span> </label>
			<?php
				include_once('../../control/configuracion/combos/c_combos_tbien.php');
				$cbotbien = array();
				$cod_tbien = "";
				if(isset($_SESSION['id_tbien_recep']))
					$cod_tbien = $_SESSION['id_tbien_recep'];
				else
					$cod_tbien = "";
						  
				$cbotbien = DibCombtTBienRecep($cod_tbien);
						
				foreach ($cbotbien as $elementos) 
					echo $elementos;		   
			?> 
		</td>
		<td id="r-paddig" class="ubicacion-tour">
			<label>Ubicación: <span class="asterisco">*</span> </label>
			<?php
				include_once('../../control/configuracion/combos/c_combos_departamento.php');
				$cbodepart = array();
				$cod_dep = "";
				if(isset($_SESSION['id_depart_recep']))
					$cod_dep = $_SESSION['id_depart_recep'];
				else
					$cod_dep = "";
						  
				$cbodepart = DibCombtDepartamento($cod_dep);
						
				foreach ($cbodepart as $elementos) 
					echo $elementos;		   
			?> 
		</td>
	</tr>
	<tr id="datos-entrada-bien5">
		<td id="r-paddig" class="serial-tour" >
			<label>Serial:</label>
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this)" readonly="readonly" id="serial_bien_recep" name="serial_bien_recep" placeholder="Ingrese Serial del Bien">
		</td>
		<td id="r-paddig" class="marca-tour" >
			<label>Marca: </label>
			<?php
				include_once('../../control/configuracion/c_marca.php');
				$cboMarca = array();
				$cod_mar = "";
				if(isset($_SESSION['id_marca_recep']))
					$cod_mar = $_SESSION['id_marca_recep'];
				else
					$cod_mar = "";
						  
				$cboMarca = DibCombMarca($cod_mar);
						
				foreach ($cboMarca as $elementos) 
					echo $elementos;		   
			?> 
		</td>
		<td id="r-paddig" class="modelo-tour" >
			<label>Modelo:</label>
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this)" readonly="readonly" id="modelo_bien_recep" name="modelo_bien_recep" placeholder="Ingrese Modelo del Bien Nacional">
		</td>
	</tr>
	<tr id="datos-entrada-bien6">
		<td id="r-paddig" class="precio-tour">
			<label>Precio:<span class="asterisco">*</span> (Bs)</label>
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this)" readonly="readonly" id="precio_bien_recep" name="precio_bien_recep" placeholder="Ingrese precio en bolivares">
		</td>
		<td id="r-paddig" class="descripcion-tour" >
			<label>Descripción: </label>
			<textarea id="textareaBienDes" onBlur="cambio_mayus(this)" class="CampoMov" readonly="readonly" name="des_bien_recep" placeholder="Ingrese descripción del bien nacional, este campo es opcional"></textarea>
		</td>
		<td id="r-paddig" class="observacion-tour" >
			<label>Observación: </label>
			<textarea id="textareaBienObser" onBlur="cambio_mayus(this)" class="CampoMov Class_obser_bien" readonly="readonly" name="obser_bien" placeholder="Ingrese Observación, este campo es opcional ">Buen Estado</textarea>
	
			<button type="button" class="CampoMov bottonagregar-tour" value="modPass" disabled="disabled" id="r-agregar" name="addService" onclick="validacionBienParaAgragar()" ><span id="icon-plus" class="icon-plus"></span> Agregar</button>
		</td>
	</tr>
<!-- ****************************************** Cierre del los Datos para el Rigistro del bien nacional *************************************************-->

<!-- ******************************************* Detalle del bien nacional *************************************************-->
<!-- ****************************************** Cierre del los Datos para el Rigistro del bien nacional *************************************************-->
<tr><td colspan="3" class="recepciondetalle-tour">
	<div class="caption">Recepción: Detalle del Bien Nacional</div>
	<div id="cabecera-detalle" class="todoslosdetalles-tour"> 
		<span id="n1">N°</span>
		<span id="n2">Código</span>
		<span id="n3">Tipo Bien</span>
		<span id="n4">Descripción</span>
		<span id="n5">Serial</span>
		<span id="n6">Marca</span>
		<span id="n7">Modelo</span>
		<span id="n8">Precio</span>
		<span id="n9"><?php if(isset($_SESSION["GlobalDetalle"])) echo "Observación"; else echo "Ubicación"; ?></span>
		<span id="n10"><?php if(isset($_SESSION["GlobalDetalle"])) echo "Condición"; else echo "Observación"; ?></span>
		<span id="n"></span>
	</div>
</td></tr>
<!-- ******************************************* Detalle del bien nacional *************************************************-->
	<input type="hidden" id="validarCaberaLlena" name="validarCaberaLlena"> <!-- variable para validar la cabecera -->
	<tr>
		<td colspan="3">
			<div id="topLink">
				<table id="detalle" style="text-align:center;">
					<!-- pintar detalle dinamico -->
						<?php if(isset($_SESSION["GlobalDetalle"])) echo $_SESSION["GlobalDetalle"]; ?>
				</table>
			</div> 
		</td>
	</tr>
	<!-- **** script que hace posible la crup -->
	<script type="text/javascript">
		var a = 1; //contador para el arreglo temporal
		var c = 1; //contador para la crup
		var arrayTemp = Array();

		function quitarBien(valorPadre,valor){ 

			if( confirm("¿Está seguro de quitar éste Bien Nacional de la lista?") ){
				valorPadre.parentNode.remove(); c--;
				if( c==1 ){
					//libero la cabecera de nuevo
					frm.n_D.readOnly = false;
					frm.cod_prov.disabled = false;
					frm.id_personal_recep.disabled = false;
					frm.id_motivo_mov.disabled = false;
					frm.obser_cabecera.readOnly = false;
					frm.f_lL.disabled = false;
					document.getElementById('validarCaberaLlena').value = "desbloqueada";

					arrayTemp = []; // dejo el arreglo como nuevo

				}
				//var position = (valor-1);
				//alert(position);
				//arrayTemp[position] = ""; // quito el registro 
			}		
			/*
			var nodoPadre = document.getElementById("btn1").value;
			var padre =  nodoPadre.parentNode();
			padre.remove(); c--;
			*/
		}
			
			function agregar(){
				if(c>0){
					/* tranco la cabecera*/
					frm.n_D.readOnly = true;
					frm.cod_prov.disabled = true;
					frm.id_personal_recep.disabled = true;
					frm.id_motivo_mov.disabled = true;
					frm.obser_cabecera.readOnly = true;
					frm.f_lL.disabled = true;
					document.getElementById('validarCaberaLlena').value = "bloqueada";
				}else{
					/*libero la cabecera de nuevo*/
					frm.n_D.readOnly = false;
					frm.cod_prov.disabled = false;
					frm.id_personal_recep.disabled = false;
					frm.id_motivo_mov.disabled = false;
					frm.obser_cabecera.readOnly = false;
					document.getElementById('validarCaberaLlena').value = "desbloqueada";
				}
				arrayTemp[a] = document.envio_form.cod_bien_R.value;
				var codigo = document.envio_form.cod_bien_R.value;
				var tamonoArray = arrayTemp.length;
				for (var i = 0; i < (tamonoArray-1); i++) {
					if(arrayTemp[i] == codigo){
						var encontrado = "si";
					}
				}

				if(encontrado == "si"){
					LibreriaGenerarModal("el código del Bien Nacional que ingresó, ya se encuentra en la lista");
					//document.envio_form.cod_bien_R.value = parseInt(arrayTemp[a])+parseInt(1);
				}else{
					tabla = document.getElementById("detalle");
					tr = tabla.insertRow(-1);
					td = tr.insertCell(0);
					td0 = tr.insertCell(1);
					td1 = tr.insertCell(2);
					td2 = tr.insertCell(3);
					td3 = tr.insertCell(4);
					td4 = tr.insertCell(5);
					td5 = tr.insertCell(6);
					td6 = tr.insertCell(7);
					td7 = tr.insertCell(8);
					td8 = tr.insertCell(9);
					td9 = tr.insertCell(10);
					td10 = tr.insertCell(11);

					/* primer input numero autoincremental */
					textarea = document.createElement('textarea');
					textarea.type="text";
					textarea.id='id'+c;
					textarea.setAttribute('class','nro-recep');
					textarea.readOnly="readOnly";
					textarea.name="nro_array[]";
					textarea.value = c;

					/* primer input*/
					textarea1 = document.createElement('textarea');
					textarea1.type="text";
					textarea1.setAttribute('class','cod_bien_R');
					textarea1.readOnly="readOnly";
					textarea1.name="cod_bien_R_array[]";
					textarea1.value = document.envio_form.cod_bien_R.value;

					/* segundo input*/
					textarea2 = document.createElement('textarea');
					textarea2.type="text";
					textarea2.readOnly="readOnly";
					textarea2.setAttribute('class','id_tbien');
					textarea2.name="tbien_array[]";
					textarea2.value = document.envio_form.tbien.value;

					/* tercer input textarea */
					textarea3 = document.createElement('textarea');
					textarea3.type="text";
					textarea3.readOnly="readOnly";
					textarea3.setAttribute('class','des_bien_recep');
					textarea3.name="des_bien_recep_array[]";
					textarea3.value = document.envio_form.des_bien_recep.value;

					/* cuarto input*/
					textarea4 = document.createElement('textarea');
					textarea4.type="text";
					textarea4.readOnly="readOnly";
					textarea4.setAttribute('class','serial_bien_recep');
					textarea4.name="serial_bien_recep_array[]";
					if(document.envio_form.serial_bien_recep.value == ""){
						textarea4.value = "N/A";
					}else{
						textarea4.value = document.envio_form.serial_bien_recep.value;
					}
					
					/* quinto input textarea */
					textarea5 = document.createElement('textarea');
					textarea5.type="text";
					textarea5.readOnly="readOnly";
					textarea5.setAttribute('class','cod_marca');
					textarea5.name="cod_marca_array[]";
					textarea5.value = document.envio_form.cod_marca.value;

					/* sexto input textarea*/
					textarea6 = document.createElement('textarea');
					textarea6.type="text";
					textarea6.readOnly="readOnly";
					textarea6.setAttribute('class','modelo_bien_recep');
					textarea6.name="modelo_bien_recep_array[]";
					if(document.envio_form.modelo_bien_recep.value == ""){
						textarea6.value = "N/A";
					}else{
						textarea6.value = envio_form.modelo_bien_recep.value
					}
				
					/* septimo input textarea*/
					textarea7 = document.createElement('textarea');
					textarea7.type="text";
					textarea7.setAttribute('class','precio_bien_recep');
					textarea7.readOnly="readOnly";
					textarea7.name="precio_bien_recep_array[]";
					textarea7.value = document.envio_form.precio_bien_recep.value;

					/* obtavo input textarea*/
					textarea8 = document.createElement('textarea');
					textarea8.type="text";
					textarea8.readOnly="readOnly";
					textarea8.setAttribute('class','dep_recep');
					textarea8.name="dep_recep_array[]";
					textarea8.value = document.envio_form.dep_recep.value;

					/* noveno input textarea*/
					textarea9 = document.createElement('textarea');
					textarea9.type="text";
					textarea9.readOnly="readOnly";
					textarea9.setAttribute('class','obser_bien');
					textarea9.name="obser_bien_array[]";
					textarea9.value = document.envio_form.obser_bien.value;
					if(document.envio_form.serial_bien_recep.value == ""){
						textarea4.value = "N/A";
					}else{
						textarea4.value = document.envio_form.serial_bien_recep.value;
					}
					
					td0.appendChild(textarea);
					td1.appendChild(textarea1);
					td2.appendChild(textarea2);
					td3.appendChild(textarea3);
					td4.appendChild(textarea4);
					td5.appendChild(textarea5);
					td6.appendChild(textarea6);
					td7.appendChild(textarea7);
					td8.appendChild(textarea8);
					td9.appendChild(textarea9);
					
					td10.innerHTML = "<button type='button' class='btn-quitar' onclick='quitarBien(this.parentNode,this.value)' title='clic para quitar el registro' value='"+c+"' name='delService'><span>x</span></button>";
					OpenventanaConfirmRecep();
					//document.envio_form.cod_bien_R.value = parseInt(arrayTemp[a])+parseInt(1);
					c++; // sumale al contador
				}

				//muestro modal
				a++; //incremento contador del for de validacion
			}// cierre funcion agregar 
	</script>
	<!-- **** cierre del script que hace posible la crup *** -->

<!-- ******************************************* Cierre del Detalle del bien nacional *************************************************-->

<!-- ******************************************* Botonera *************************************************-->
	<tr id="botonera" class="botonera-tour">
		<td  align="center" colspan="3"><br/>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDes"])) echo $_SESSION["opActDes"]; ?>">
			<input type="hidden" name="modificar" />
			<input type="hidden" name="op" />
			<input type="hidden" name="temp"/>	
			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" name="inc" value="Incluir" onclick="General_Recepcion(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" value="Consultar"  name="bus"  onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" value="Grabar" name="grab" onclick="General_Recepcion(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneraactivar-tour" value="Anular" name="anu" onclick="General_Recepcion(this.value)" disabled="disabled"><span id="iconos" class="icon-folder-minus"></span><span>Anular</span></button>
			<!-- <button type="button" value=""           name="sta"    onclick="General_Bien(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des_btn">Desactivar</span></button> -->		
			<button type="button" class="botoneracancelar-tour" value="Cancelar" name="cancel" onclick="General_Recepcion(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>
			
<!-- ******************************************* Cierre Botonera *************************************************-->

<!-- ******************************************* Script para la Botonera *************************************************-->
			<script>	
				frm = document.envio_form;
				
				if(frm.control_anulacion.value == 2 && frm.control_anulacion_Trazabilidad.value != 1){

					if( frm.idPeriodAnulacion.value != "" ){
						// no puede anular porque el periodo de ese movimiento ya fue cerrado o es alguno anterior al actual
						
						document.envio_form.inc.disabled=true;
						document.envio_form.bus.disabled=true;
						document.envio_form.grab.disabled=true;
						document.envio_form.cancel.disabled=false;
						document.envio_form.anu.disabled=true;
						document.envio_form.addService.disabled=true;

						document.envio_form.inc.style.background = "#ccc";
						document.envio_form.inc.style.color = "#666666";
						document.envio_form.bus.style.background = "#ccc";
						document.envio_form.bus.style.color = "#666666";
						document.envio_form.grab.style.background = "#ccc";
						document.envio_form.grab.style.color = "#666666";
						document.envio_form.anu.style.background = "#ccc";
						document.envio_form.anu.style.color = "#666666";
						document.envio_form.cancel.style.background = "#023859";
						document.envio_form.cancel.style.color = "#fff";

						frm.f_lL.disabled = true;
					}else{
						document.envio_form.inc.disabled=true;
						document.envio_form.bus.disabled=true;
						document.envio_form.grab.disabled=true;
						document.envio_form.cancel.disabled=false;
						document.envio_form.anu.disabled=false;
						document.envio_form.addService.disabled=true;

						document.envio_form.inc.style.background = "#ccc";
						document.envio_form.inc.style.color = "#666666";
						document.envio_form.bus.style.background = "#ccc";
						document.envio_form.bus.style.color = "#666666";
						document.envio_form.grab.style.background = "#ccc";
						document.envio_form.grab.style.color = "#666666";
						document.envio_form.anu.style.background = "#023859";
						document.envio_form.anu.style.color = "#fff";
						document.envio_form.cancel.style.background = "#023859";
						document.envio_form.cancel.style.color = "#fff";

						frm.f_lL.disabled = true;
					}
				}else if( frm.control_anulacion_Trazabilidad.value == 1 ){
					document.envio_form.inc.disabled=true;
					document.envio_form.bus.disabled=true;
					document.envio_form.grab.disabled=true;
					document.envio_form.cancel.disabled=false;
					document.envio_form.anu.disabled=true;
					document.envio_form.addService.disabled=true;

					document.envio_form.inc.style.background = "#ccc";
					document.envio_form.inc.style.color = "#666666";
					document.envio_form.bus.style.background = "#ccc";
					document.envio_form.bus.style.color = "#666666";
					document.envio_form.grab.style.background = "#ccc";
					document.envio_form.grab.style.color = "#666666";
					document.envio_form.anu.style.background = "#ccc";
					document.envio_form.anu.style.color = "#666666";
					document.envio_form.cancel.style.background = "#023859";
					document.envio_form.cancel.style.color = "#fff";

					frm.f_lL.disabled = true;

				}else if(frm.control_anulacion.value == 1){
					document.envio_form.inc.disabled=true;
					document.envio_form.bus.disabled=true;
					document.envio_form.grab.disabled=true;
					document.envio_form.cancel.disabled=false;
					document.envio_form.anu.disabled=true;
					document.envio_form.addService.disabled=true;

					document.envio_form.inc.style.background = "#ccc";
					document.envio_form.inc.style.color = "#666666";
					document.envio_form.bus.style.background = "#ccc";
					document.envio_form.bus.style.color = "#666666";
					document.envio_form.grab.style.background = "#ccc";
					document.envio_form.grab.style.color = "#666666";
					document.envio_form.anu.style.background = "#ccc";
					document.envio_form.anu.style.color = "#666666";
					document.envio_form.cancel.style.background = "#023859";
					document.envio_form.cancel.style.color = "#fff";

					frm.f_lL.disabled = true;

				}else{

					frm.tbien.disabled = true;
					document.envio_form.inc.style.background = "#023859";
					document.envio_form.inc.style.color = "#fff";
					document.envio_form.bus.style.background = "#023859";
					document.envio_form.bus.style.color = "#fff";
					
					//frm.n_R.style.cursor = "not-allowed";
					frm.n_D.style.cursor = "not-allowed";
					frm.f_lL.style.cursor = "not-allowed";

					frm.cod_prov.style.cursor = "not-allowed";
					frm.id_personal_recep.style.cursor = "not-allowed";
					frm.id_motivo_mov.style.cursor = "not-allowed";
					

					frm.cod_bien_R.style.cursor = "not-allowed";
					frm.tbien.style.cursor = "not-allowed";
					frm.dep_recep.style.cursor = "not-allowed";

					frm.serial_bien_recep.style.cursor = "not-allowed";
					frm.cod_marca.style.cursor = "not-allowed";
					frm.modelo_bien_recep.style.cursor = "not-allowed";

					frm.precio_bien_recep.style.cursor = "not-allowed";
					frm.des_bien_recep.style.cursor = "not-allowed";
					frm.obser_bien.style.cursor = "not-allowed";

					frm.addService.style.cursor = "not-allowed";

					frm.f_lL.disabled = true;

					document.getElementById('validarCaberaLlena').value = "bloqueada";
					// frm.nbien.style.cursor = "not-allowed";
					// frm.des.style.cursor = "not-allowed";
					// frm.tbien.style.cursor = "not-allowed";
					// frm.des.style.cursor = "not-allowed";
					// frm.cant.style.cursor = "not-allowed";
					// frm.val.style.cursor = "not-allowed";
					// frm.fecha.style.cursor = "not-allowed";
					// frm.cond.style.cursor = "not-allowed";
					// frm.cod_inv.style.cursor = "not-allowed";
					// frm.con.style.cursor = "not-allowed";

					//document.getElementById('des_btn').style.display = "none";
					//document.getElementById('iconos-2').style.display = "none";
				}
			</script>
<!-- ******************************************* Cierre de Script para la Botonera *************************************************-->
		</td>
	</tr>
</table>

<div class="ModalTipoAnulacion">
	<div class="estilos-ModalTipoAnulacion">
		<!--<span class='btn-quitar-modal' title="clic para cerrar la ventana" onclick="CloseModalTipoAnulacion()">X</span>-->
		<table>
			<caption>Motivo de Anulación</caption>
			<tr>
				<td> 
					<?php
						include_once('../../control/configuracion/combos/c_combos_motivo.php');
						$cboMotivoAnu = array();
						$cod_mot = "";
						if(isset($_SESSION['id_motivo_anulacion']))
							$cod_mot = $_SESSION['id_motivo_anulacion'];
						else
							$cod_mot = "";
								  
						$cboMotivoAnu = DibCombMotivoAnulacion($cod_mot);
								
						foreach ($cboMotivoAnu as $elementos) 
							echo $elementos;		   
					?>
					<button type="button" onclick="validarMotivoAnulacionRecep()" title="clic para aceptar motivo de anulación">Aceptar</button>
				</td>
			</tr>
		</table>
	</div>
</div>

</form>
<br>
<!-- incluyo el mensajde de que los campos son obligatorios -->
	<?php include_once("../sistema/camposObligatorios.php");?>

	<!-- incluyo la modal de consultar -->
	<?php  include_once("../consultaModal/movimientos/v_modal_recepcion.php"); ?>
<?php
	}else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}
?>