<?php @session_start();
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "asignacion"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');

?>
<script type="text/javascript">

	function buscarAjaxBien(){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/movimientos/c_asignacion.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		/* preparo mis variables para la condicion del bien */
		var tipo_bien_ajax = document.getElementById('tbien').value;
		var fecha_asig_ajax = document.getElementById('f_Asig').value;
		/**********************/

		ajax.send("operacion=busquedaAjax&tipo_bien_a="+tipo_bien_ajax+"&fecha_asig_aj="+fecha_asig_ajax); //paso variable con estatus Nulo y nombre
	}

	/* validar que el codigo no se repita en la base de datos mediante ajax */
	// function buscarAjax(valor){
	// 	var ajax = new XMLHttpRequest();
	// 	ajax.open("POST","../../control/movimientos/c_recepcion.php",true);
	// 	ajax.onreadystatechange=function(){
	// 		if(ajax.readyState==4){
	// 			document.getElementById("datosAjax").innerHTML = ajax.responseText;
	// 		}
	// 	}
	// 	ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	// 	ajax.send("operacion=busquedaAjax&codigoBien="+valor); 

	// }

	function Mostrar(){
		var submenu1 = document.getElementById('datos-entrada-bien1');
		var submenu2 = document.getElementById('datos-entrada-bien2');
		var submenu3 = document.getElementById('datos-entrada-bien3');
		//submenu.style.visibility = "visible";
		submenu1.style.visibility = "visible";
		submenu2.style.visibility = "visible";
		submenu3.style.visibility = "visible";

		submenu1.style.position = "relative";
		submenu2.style.position = "relative";
		submenu3.style.position = "relative";

		document.getElementById('iconos-recep-men').style.display = "inline";
		document.getElementById('iconos-recep-mas').style.display = "none";
		CerrarBien();
	}
	function Cerrar(){
		var submenu1 = document.getElementById('datos-entrada-bien1');
		var submenu2 = document.getElementById('datos-entrada-bien2');
		var submenu3 = document.getElementById('datos-entrada-bien3');

		submenu1.style.visibility = "hidden";
		submenu2.style.visibility = "hidden";
		submenu3.style.visibility = "hidden";

		submenu1.style.position = "absolute";
		submenu2.style.position = "absolute";
		submenu3.style.position = "absolute";

		document.getElementById('iconos-recep-men').style.display = "none";
		document.getElementById('iconos-recep-mas').style.display = "inline";
	}

	function MostrarBien(){
		//if(document.getElementById('validarCaberaLlena').value == "desbloqueada"){
		//	if( validarCabeceraAsig() ){
				var submenu4 = document.getElementById('datos-entrada-bien4');

				//submenu.style.visibility = "visible";
				submenu4.style.visibility = "visible";
				submenu4.style.position = "relative";
	
				document.getElementById('iconos-recep-bien-men').style.display = "inline";
				document.getElementById('iconos-recep-bien-mas').style.display = "none";
				Cerrar();
			//}
		//}else{
			//LibreriaGenerarModal("Debe de hacer clic en el boton nuevo");
		//}
	}
	function CerrarBien(){
		var submenu4 = document.getElementById('datos-entrada-bien4');

		submenu4.style.visibility = "hidden";
		submenu4.style.position = "absolute";

		document.getElementById('iconos-recep-bien-men').style.display = "none";
		document.getElementById('iconos-recep-bien-mas').style.display = "inline";
		document.getElementById('validarCaberaLlena').value = "desbloqueada";
	}
	function resetearCombo(){
		var select = document.getElementById('tbien');
		select.options[0].selected = true;
		document.getElementById("datosAjax").innerHTML = "<td colspan='9' style='text-align:center;'> SELECCIONE TIPO DE BIEN NACIONAL </td>";
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

				$("#f_Asig").datepicker({

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
<form action="../../control/movimientos/c_asignacion.php" method="POST" name="envio_form" id="envio_form" autocomplete="off">
<!-- ********************* Validar Período Abierto ****************** -->
<?php if(isset($_SESSION["Nom_periodo_mostrar"])){ ?>
	<span class="periodoasignacion-tour" id="mostrar-periodo">Período: <?php echo $_SESSION["Nom_periodo_mostrar"]; ?></span>
<?php }else{ ?>
	<span class="periodoasignacion-tour">
	<span id="mostrar-periodo-no">Período: </span>
	<span id="msj-No-Hay-periodo">El periodo se encuentra cerrado, no podrá realizar ningun movimiento sobre el inventario.</span>
	</span>
<?php } ?>
<!-- ********************* Cierre Validar Período Abierto ****************** -->
<input type="hidden" name="validarPeriodo" id="validarPeriodo" value="<?php if(isset($_SESSION["Nom_periodo_mostrar"])) echo  $_SESSION["Nom_periodo_mostrar"];?>">
<table id="formulario_estilo_individual1">
<caption class="asignacion-tour"><span id="iconos-recep-mas" title="clic para mostrar la vista de entrada" onclick="Mostrar()" class="icon-plus"></span><span id="iconos-recep-men" title="clic para no mostrar la vista de entrada" onclick="Cerrar()" class="icon-minus"></span>Asignación: Datos de Asignación  <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-asignacion ayuda-local-frm ayudaguiada-tour"></span>  <a style="color:#fff;" href="../pdf_link/inventario/Asignacion1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
<!-- ***************************************** Datos de Entrada del bien nacional *******************************************-->
	<tr id="datos-entrada-bien1">
		<!-- <td id="r-paddig" >
			<label>Nro. de Recepción:<span class="asterisco">*</span> </label>
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this)" name="n_R" readonly="readonly" placeholder="se genera Automaticamente">		
		</td> -->
		<!-- id del periodo actual -->
		<input type="hidden" name="idPeriodAnulacion" value="<?php if(isset($_SESSION["TrazabPeriodoAnteriorAsig"])) if($_SESSION["TrazabPeriodoAnteriorAsig"] == '1') echo '1'; ?>">
		<!-- variable para el numero de recepcion -->
		<input type="hidden" name="n_A" value="<?php if(isset($_SESSION['n_A'])) echo $_SESSION['n_A'];   ?>">
		<!-- variable para el saber que tipo de mivimiento estoy realizando -->
		<input type="hidden" name="tipo_de_mov" value="2"> <!-- Asignación -->
		<!-- variable utilizada para controlar la anulacion -->
		<input type="hidden" name="control_anulacion" value="<?php if(isset($_SESSION['anulacionAsig'])) if($_SESSION['anulacionAsig'] == '1') echo '1'; if(isset($_SESSION['anulacionAsig'])) if($_SESSION['anulacionAsig'] == '2') echo '2'; ?>">
		<input type="hidden" name="control_anulacion_Trazabilidad" value="<?php if(isset($_SESSION['anulacionTrazabilidadAsig'])) if($_SESSION['anulacionTrazabilidadAsig'] == '1') echo '1'; ?>">
		
		<td id="r-paddig" style='width:35%;' class="numeroasignacion-tour"> 
			<label>Nro. Asignación:<span class="asterisco">*</span> </label>
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this)" id="n_Asignacion" name="n_Asignacion" readonly="readonly" placeholder="Ingrese el n° de la asignación" value="<?php if(isset($_SESSION['n_Asignacion'])) echo $_SESSION['n_Asignacion'] ;?>">	
		</td>
		<td id="r-paddig" style="width:32%;" class="responsableasignacion-tour">
			<label>Responsable Asignación:<span class="asterisco">*</span>  </label>
			<?php
				include_once('../../control/configuracion/combos/c_combos_personal.php');
				$cboPersonal = array();
				$cod_per = "";
				if(isset($_SESSION['id_personal_asig']))
					$cod_per = $_SESSION['id_personal_asig'];
				else
					$cod_per = "";
						  
				$cboPersonal = DibCombPersonal($cod_per);
						
				foreach ($cboPersonal as $elementos) 
					echo $elementos;		   
			?>
		</td>
		<td id="r-paddig" class="departamentoasignacion-tour">
			<label>Departamento: <span class="asterisco">*</span></label><br>
			<?php
				include_once('../../control/configuracion/c_dep.php');
				$ArrayDep = array();
			    $combDep = "";
				if(isset($_SESSION['cod_dep_p_asig'])){
					$combDep = $_SESSION['cod_dep_p_asig'];
				}
				$ArrayDep = PintaDep($combDep);
						
				foreach ($ArrayDep as $elemento){
					echo $elemento;
				}
			?>
		</td>
	</tr>

<!-- **** script para completar combos dependientes *** -->

<script type="text/javascript">
	
	/*function removerCombo(combo){
		while( combo.length > 1 ){
			combo.remove(combo.length-1);
		}
	}*/

/*	function pintarcomboRespon(comboPadre){
		comboHijoId = document.getElementById('id_personal_asig');
		removerCombo(comboHijoId);
		//var comboHijo = $('#id_personal_asig').value;
		//document.getElementById('id_personal_asig').value = 1;
		//$('#divid_personal_asig').remove();
		var x = document.getElementById("id_personal_asig");
		var option = document.createElement("option").remove();
		
		var option = document.createElement("option");



		** devuelto en formato json **
 		alert(JSON.parse(comboPadre[0]));
		var size = arreglo.length;
        for(i=0; i<size; i++){
           // $(".editSOlDET").append("<tr><td>" +f.DET[i].cantidad + "</td><td>" + f.DET[i].id_articulo + "</td><td>" +     f.DET[i].precio_compra+ "</td><td>" + f.DET[i].id_articulo + "</td></tr>");
        	/*option.text = i;
			option.value = i;
			x.add(option);*/
			//alert(arreglo[i]);
       // }

		/*******************************/
	//} 

	/*function completarComboRespoDep(combo1){
		var ComboDependiente = 'ComboDependiente';
		$.ajax({
			type: 'POST',
			url: '../../control/movimientos/c_asignacion.php',
			data: ("temp="+ComboDependiente+"&combo1="+combo1),
			success: function(resp){
				if(resp != ""){
					pintarcomboRespon(resp);
				}
			}
		});
	}*/

</script>

<!-- ***************************************************-->



	<tr id="datos-entrada-bien2">
		<td id="r-paddig" style="width:32%;" class="responsabledepartamento-tour">
		
			<label>Responsable del Departamento:<span class="asterisco">*</span>  </label>
		<div id="divid_personal_asig"> 
			<?php
				include_once('../../control/configuracion/combos/c_combos_personal.php');
				$cboPersonalDep = array();
				$cod_per = "";
				if(isset($_SESSION['id_personal_dep_asig']))
					$cod_per = $_SESSION['id_personal_dep_asig'];
				else
					$cod_per = "";
						  
			?> <?php $cboPersonalDep = DibCombPersonalDep($cod_per); ?> 
			<?php
						
				foreach ($cboPersonalDep as $elementos) 
					echo $elementos;		   
			?>
		 </div>
		</td>
		<td id="r-paddig" class="fechaasignacion-tour">
			<label>Fecha de Asignación:<span class="asterisco">*</span>  </label> 
			<input type="text" class="CampoMov" onBlur="cambio_mayus(this);resetearCombo()" id="f_Asig" name="f_Asig" readonly="readonly" placeholder="Día-Mes-Año" value="<?php if(isset($_SESSION['f_Asig'])) echo $_SESSION['f_Asig'] ;?>">
		</td>
		<td id="r-paddig" class="motivoasignacion-tour">
			<label>Motivo:<span class="asterisco">*</span>  </label><br>
			<?php
				include_once('../../control/configuracion/combos/c_combos_motivo.php');
				$cboMotivoAsi = array();
				$cod_mot = "";
				if(isset($_SESSION['id_motivo_asig'])){
					$cod_mot = $_SESSION['id_motivo_asig'];
				}else{
					$cod_mot = "";
				}
						  
				$cboMotivoAsi = DibCombMotivoAsignacion($cod_mot);
						
				foreach ($cboMotivoAsi as $elementos) {
					echo $elementos;		   
				}
			?>
		</td>
	</tr>
	 <tr id="datos-entrada-bien3" class="observacionasignacion-tour">
	 	<td id="r-paddig" colspan="2">
			<label>Observación: </label>
			<textarea id="textareaCabecera" onBlur="cambio_mayus(this)" class="CampoMov" readonly="readonly" name="obser_cabecera" placeholder="Ingrese Observación, este campo es opcional "><?php if(isset($_SESSION['obser_cabecera_asig'])) echo $_SESSION['obser_cabecera_asig'] ;?></textarea>
		</td>
	</tr> 
<!-- ***************************************** Cierre Datos de Entrada del bien nacional *******************************************-->

<!-- ****************************************** Datos para el Rigistro del bien nacional *************************************************-->
	<tr>
		<td colspan="3">
			<div class="caption"><?php if(!isset($_SESSION["GlobalDetalleAsig"])){?><span id="iconos-recep-bien-mas" title="clic para mostrar la vista de bien" onclick="MostrarBien()" class="icon-plus"></span><span id="iconos-recep-bien-men" title="clic para no mostrar la vista del bien" onclick="CerrarBien()" class="icon-minus"></span> <?php } ?>Asignación: Datos del Bien Nacional <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-asignacion2 ayuda-local-frm ayudaguiada2-tour"></span> </div>
		</td>
	</tr>
	<tr id="datos-entrada-bien4" class="biennacionalesdisponibles-tour">
		<td id="r-paddig" style="width:47%;">
			<label >Bien Nacional: <span class="asterisco">*</span> <button type="button" disabled="disabled" name="busBienAsig" id="busBienAsig" title="clic para consultar Bienes Nacionales Disponibles" class="buscarBien" name="buscarCodBien" onclick="validarBtnConsBien()" >Clic para consultar los Bienes Nacionales Disponibles &nbsp; <span class="icon-search"></span></button> </label>
			<!-- <label>Tipo Bien:<span class="asterisco">*</span> </label>
			<?php/*
				include_once('../../control/configuracion/combos/c_combos_tbien.php');
				$cbotbien = array();
				$cod_tbien = "";
				if(isset($_SESSION['id_tbien_asig']))
					$cod_tbien = $_SESSION['id_tbien_asig'];
				else
					$cod_tbien = "";
						  
				$cbotbien = DibCombtTBien($cod_tbien);
						
				foreach ($cbotbien as $elementos) 
					echo $elementos;	*/	   
			?> --> 
		</td>
		<td id="r-paddig">
			<!-- <label class="label-bien-asignacion">Bien Nacional:<span class="asterisco">*</span> <button type="button" disabled="disabled" name="busBienAsig" id="busBienAsig" title="clic para consultar Bienes Nacionales Disponibles" class="buscarBien" name="buscarCodBien" onclick="validarBtnConsBien()" ><span class="icon-search"></span></button> </label> -->
			<!--  <input type="text" class="CampoMov" onBlur="cambio_mayus(this)" readonly="readonly" name="cod_bien_R" placeholder="Ingrese Código del Bien">-->
		</td>
		<td></td>
		<!-- <td id="r-paddig">
			<label>Observación: </label>
			<textarea id="textareaBien" onBlur="cambio_mayus(this)" class="CampoMov" readonly="readonly" name="obser_bien" placeholder="Ingrese Observación, este campo es opcional "></textarea>
	
			<button type="button" class="CampoMov" value="modPass" disabled="disabled" id="r-agregar" name="addService" onclick="validarBtnAgregar()" ><span id="icon-plus" class="icon-plus"></span> Agregar</button>
		</td> -->
	</tr>
	<style type="text/css">
		.buscarBien{
			padding: 10px;
			color: #fff;
			background: #023859;
		}
		.buscarBien:hover{
			opacity: 0.8;
			cursor: pointer;
		}
		.label-bien-asignacion{
			position: relative;
			top: 30px;
		}
		</style>
<!-- ****************************************** Cierre del los Datos para el Rigistro del bien nacional *************************************************-->

<!-- ******************************************* Detalle del bien nacional *************************************************-->
<!-- ****************************************** Cierre del los Datos para el Rigistro del bien nacional *************************************************-->
<tr><td colspan="3">
	<div class="caption asignaciondetalle-tour">Asignación: Detalle del Bien Nacional</div>
	<div id="cabecera-detalle" class="todoslosdetalles-tour"> 
		<span id="n1">N°</span>
		<span id="n2">Código</span>
		<span id="n3">Tipo Bien</span>
		<span id="n4">Descripción</span>
		<span id="n5">Serial</span>
		<span id="n6">Marca</span>
		<span id="n7">Modelo</span>
		<span id="n8">Precio</span>
		<span id="n9"><?php if(isset($_SESSION["GlobalDetalleAsig"])) echo "Observación"; else echo "Ubicación"; ?></span>
		<span id="n10"><?php if(isset($_SESSION["GlobalDetalleAsig"])) echo "Condición"; else echo "Observación"; ?></span>
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
						<?php if(isset($_SESSION["GlobalDetalleAsig"])) echo $_SESSION["GlobalDetalleAsig"]; ?>
				</table>
			</div> 
		</td>
	</tr>
	<!-- **** script que hace posible la crup -->
	<script type="text/javascript">
		function quitarBien(nodoPadre,value){ 

			if( confirm("¿Está seguro de quitar éste Bien Nacional de la lista?") ){
				nodoPadre.parentNode.remove(); contadorNro--;
				if( contadorNro == 0 ){
					/*libero la cabecera de nuevo*/
					frm.n_Asignacion.readOnly = false;
					frm.id_personal_recep.disabled = false;
					frm.dep.disabled = false;
					frm.id_personal_asig.disabled = false;
					frm.id_motivo_asig.disabled = false;
					frm.obser_cabecera.readOnly = false;
					frm.f_Asig.disabled = false;
					document.getElementById('validarCaberaLlena').value = "desbloqueada";
				}
			}	

		}
			var a = 1; //contador para el arreglo temporal
			var c = 1; //contador para la crup
			var numero = 0; // variable para saber la cantidad de checkbox seleccionados
			//var ArrayNumero = []; //arreglo para guardar los numeros de los checkbox seleccionados
			var arrayTemp = [];
			var contadorNro = 0;
			function agregar(){
				if(contadorNro>=0){
					/* tranco la cabecera */
					frm.n_Asignacion.readOnly = true;
					frm.id_personal_recep.disabled = true;
					frm.dep.disabled = true;
					frm.id_personal_asig.disabled = true;
					frm.id_motivo_asig.disabled = true;
					frm.obser_cabecera.readOnly = true;
					frm.f_Asig.disabled = true;
					document.getElementById('validarCaberaLlena').value = "bloqueada";
				}else{
					/* libero la cabecera de nuevo */
					frm.n_Asignacion.readOnly = false;
					frm.id_personal_recep.disabled = false;
					frm.dep.disabled = false;
					frm.id_personal_asig.disabled = false;
					frm.id_motivo_asig.disabled = false;
					frm.obser_cabecera.readOnly = false;
					document.getElementById('validarCaberaLlena').value = "desbloqueada";
				}
				//arrayTemp[a] = document.envio_form.cod_bien_R.value;
				//var codigo = document.envio_form.cod_bien_R.value;
				//var tamonoArray = arrayTemp.length;
				//for (var i = 0; i < (tamonoArray-1); i++) {
					//if(arrayTemp[i] == codigo){
					//	var encontrado = "si";
					//}
				//}

				//if(encontrado == "si"){
					//alert("los codigos de los bienes nacionales no pueden ser iguales");
					//document.envio_form.cod_bien_R.value = parseInt(arrayTemp[a])+parseInt(1);
				//}else{

				//var longitudArray = cantidadFilas.length;
				
				
				for(var i = 1; i <= canti; i++){
					/****** obtengo codigo desde la modal *****/
					/** checkbox seleccionado **/
					var textcheckbox = "chec"; var valorcheckbox = i;
					var variablecheckbox = textcheckbox + valorcheckbox;
					var checkboxModal = document.envio_Modal[variablecheckbox];
					if( checkboxModal.checked ){
						numero += i;
						ArrayNumero[numero] = i;
					}
				}
				
				var canti = document.envio_Modal.cantidadFilas.value;
				for(var i = 1; i <= canti; i++){
					/****** obtengo codigo desde la modal *****/
					/** checkbox seleccionado **/
					var textcheckbox = "chec"; var valorcheckbox = i;
					var variablecheckbox = textcheckbox + valorcheckbox;
					var checkboxModal = document.envio_Modal[variablecheckbox];


					if( checkboxModal.checked ){
						contadorNro++;
						/****** obtengo codigo desde la modal *****/
						/** codigo **/
						var textcod = "cod"; var valorCod = i;
						var variableCod = textcod + valorCod;
						var codigo = document.envio_Modal[variableCod];
						
						arrayTemp[contadorNro] = codigo.value;
						//var tamonoArray = arrayTemp.length;
					//	(tamonoArray-1)
						for (var z = 0; z < contadorNro; z++) {
							if(arrayTemp[z] == codigo.value){
								var encontrado = "si";
							}else{
								var encontradoNo = "si";
							}
						}


						if(encontrado != "si"){
							var textTBien = "codtbien"; var valorTbien = i;
							var variableCodTB = textTBien + valorTbien;
							var codigotBien = document.envio_Modal[variableCodTB];
							/** descripcion **/
							var textdescrip = "descrip"; var valordescrip = i;
							var variableDescrip = textdescrip + valorTbien;
							var descripBien = document.envio_Modal[variableDescrip];
							/** serial **/
							var textserial = "serial"; var valorserial = i;
							var variableserial = textserial + valorserial;
							var serialBien = document.envio_Modal[variableserial];
							/** marca **/
							var textmarca = "marca"; var valormarca = i;
							var variablemarca = textmarca + valormarca;
							var MarcaBien = document.envio_Modal[variablemarca];
							/** modelo **/
							var textmodelo = "modelo"; var valormodelo = i;
							var variablemodelo = textmodelo + valormodelo;
							var ModeloBien = document.envio_Modal[variablemodelo];
							/** precio **/
							var textprecio = "precio"; var valorprecio = i;
							var variableprecio = textprecio + valorprecio;
							var PrecionBien = document.envio_Modal[variableprecio];
							/** observasión **/
							var textobservacion = "obser"; var valorobservacion = i;
							var variableobservacion = textobservacion + valorobservacion;
							var ObservacionBien = document.envio_Modal[variableobservacion];

							/******** creacion de la crup *******/
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
							textarea.id='id'+contadorNro;
							textarea.setAttribute('class','nro-recep');
							textarea.readOnly="readOnly";
							textarea.name="nro_array[]";
							textarea.value = contadorNro;

							/* primer input*/
							textarea1 = document.createElement('textarea');
							textarea1.type="text";
							textarea1.setAttribute('class','cod_bien_R');
							textarea1.readOnly="readOnly";
							textarea1.name="cod_bien_R_array[]";
							textarea1.value = codigo.value;

							/* segundo input*/
							textarea2 = document.createElement('textarea');
							textarea2.type="text";
							textarea2.readOnly="readOnly";
							textarea2.setAttribute('class','id_tbien');
							textarea2.name="tbien_array[]";
							textarea2.value = codigotBien.value;

							/* tercer input textarea */
							textarea3 = document.createElement('textarea');
							textarea3.type="text";
							textarea3.readOnly="readOnly";
							textarea3.setAttribute('class','des_bien_recep');
							textarea3.name="des_bien_recep_array[]";
							textarea3.value = descripBien.value;

							/* cuarto input*/
							textarea4 = document.createElement('textarea');
							textarea4.type="text";
							textarea4.readOnly="readOnly";
							textarea4.setAttribute('class','serial_bien_recep');
							textarea4.name="serial_bien_recep_array[]";
							textarea4.value = serialBien.value;
							
							/* quinto input textarea */
							textarea5 = document.createElement('textarea');
							textarea5.type="text";
							textarea5.readOnly="readOnly";
							textarea5.setAttribute('class','cod_marca');
							textarea5.name="cod_marca_array[]";
							textarea5.value = MarcaBien.value;

							/* sexto input textarea*/
							textarea6 = document.createElement('textarea');
							textarea6.type="text";
							textarea6.readOnly="readOnly";
							textarea6.setAttribute('class','modelo_bien_recep');
							textarea6.name="modelo_bien_recep_array[]";
							textarea6.value = ModeloBien.value;
						
							/* septimo input textarea */
							textarea7 = document.createElement('textarea');
							textarea7.type="text";
							textarea7.setAttribute('class','precio_bien_recep');
							textarea7.readOnly="readOnly";
							textarea7.name="precio_bien_recep_array[]";
							textarea7.value = PrecionBien.value;

							/* obtavo input textarea */
							textarea8 = document.createElement('textarea');
							textarea8.type="text";
							textarea8.readOnly="readOnly";
							textarea8.setAttribute('class','dep_recep');
							textarea8.name="dep_recep_array[]";
							textarea8.value = document.envio_form.dep.value;

							/* noveno input textarea */
							textarea9 = document.createElement('textarea');
							textarea9.type="text";
							textarea9.readOnly="readOnly";
							textarea9.setAttribute('class','obser_bien');
							textarea9.name="obser_bien_array[]";
							textarea9.value = ObservacionBien.value;
						
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
							//LibreriaGenerarModal("Los Bienes se agregaron a la lista.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>");
						}else{
							encontrado = "";
							encontradoNo = "";
							//LibreriaGenerarModal("Los Bienes ya se encuentran en la lista.<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>");
							contadorNro--; // le resto 1 al contador, porque entro suma 1 pero como el codigo ya está entonces esa sumatoria no cuaenta y se le quita esa entrada
						} // cierre condiciona para ver si el codigo del bien nacional se repite en la crup
						
						//numero += i;
						//ArrayNumero[numero] = i;
					}

					
					//limpio los campos
					//document.envio_form.cod_bien_R.value = parseInt(arrayTemp[a])+parseInt(1);
					c++; // sumale al contador

					/*************************************/


					//alert( codigo.value );	
				} // cierre for para la cantidad de filas
				

				if( encontrado != "si" && encontradoNo == "si" ){
					LibreriaGenerarModal("Los Bienes se agregaron a la lista.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>");
				}
					
				//}

				//a++; //incremento contador del for de validacion
			}
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
			<button type="button" class="botoneranuevo-tour" name="inc" value="Incluir" onclick="General_Asignacion(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" value="Consultar"  name="bus"  onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" value="Grabar" name="grab" onclick="General_Asignacion(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneraactivar-tour" value="Anular" name="anu" onclick="General_Asignacion(this.value)" disabled="disabled"><span id="iconos" class="icon-folder-minus"></span><span>Anular</span></button>
			<!-- <button type="button" value=""           name="sta"    onclick="General_Bien(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des_btn">Desactivar</span></button> -->		
			<button type="button" class="botoneracancelar-tour" value="Cancelar" name="cancel" onclick="General_Asignacion(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>
			
<!-- ******************************************* Cierre Botonera *************************************************-->

<!-- ******************************************* Script para la Botonera *************************************************-->
			<script>	
				frm = document.envio_form;
				
				if(frm.control_anulacion.value == 2 && frm.control_anulacion_Trazabilidad.value != 1){

					if(frm.idPeriodAnulacion.value != ""){
						document.envio_form.inc.disabled=true;
						document.envio_form.bus.disabled=true;
						document.envio_form.grab.disabled=true;
						document.envio_form.cancel.disabled=false;
						document.envio_form.anu.disabled=true;

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
						frm.f_Asig.disabled = true;
					}else{
						document.envio_form.inc.disabled=true;
						document.envio_form.bus.disabled=true;
						document.envio_form.grab.disabled=true;
						document.envio_form.cancel.disabled=false;
						document.envio_form.anu.disabled=false;

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
						frm.f_Asig.disabled = true;
					}
				}else if( frm.control_anulacion_Trazabilidad.value == 1 ){
					document.envio_form.inc.disabled=true;
					document.envio_form.bus.disabled=true;
					document.envio_form.grab.disabled=true;
					document.envio_form.cancel.disabled=false;
					document.envio_form.anu.disabled=true;

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
					frm.f_Asig.disabled = true;
				}else if(frm.control_anulacion.value == 1){
					document.envio_form.inc.disabled=true;
					document.envio_form.bus.disabled=true;
					document.envio_form.grab.disabled=true;
					document.envio_form.cancel.disabled=false;
					document.envio_form.anu.disabled=true;

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

					frm.f_Asig.disabled = true;

				}else if(frm.control_anulacion.value == 2){

					if(frm.idPeriodAnulacion.value != ""){
						document.envio_form.inc.disabled=true;
						document.envio_form.bus.disabled=true;
						document.envio_form.grab.disabled=true;
						document.envio_form.cancel.disabled=false;
						document.envio_form.anu.disabled=true;

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
						frm.f_Asig.disabled = true;
					}else{
						document.envio_form.inc.disabled=true;
						document.envio_form.bus.disabled=true;
						document.envio_form.grab.disabled=true;
						document.envio_form.cancel.disabled=false;
						document.envio_form.anu.disabled=false;

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

						frm.f_Asig.disabled = true;
					}
				}else{
					document.envio_form.inc.style.background = "#023859";
					document.envio_form.inc.style.color = "#fff";
					document.envio_form.bus.style.background = "#023859";
					document.envio_form.bus.style.color = "#fff";
					
					//frm.n_R.style.cursor = "not-allowed";
					frm.n_Asignacion.style.cursor = "not-allowed";
					frm.dep.style.cursor = "not-allowed";
					frm.id_personal_recep.style.cursor = "not-allowed";
					frm.f_Asig.style.cursor = "not-allowed";
					frm.id_motivo_asig.style.cursor = "not-allowed";
					frm.obser_cabecera.style.cursor = "not-allowed";

					frm.f_Asig.disabled = true;
	
					document.getElementById('validarCaberaLlena').value = "bloqueada";
				}
			</script>
<!-- ******************************************* Cierre de Script para la Botonera *************************************************-->
		</td>
	</tr>
</table>

<div class="ModalTipoAnulacionAsig">
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
								  
						$cboMotivoAnu = DibCombMotivoAnulacionAsig($cod_mot);
								
						foreach ($cboMotivoAnu as $elementos) 
							echo $elementos;		   
					?>
					<button type="button" onclick="validarMotivoAnulacionAsig()" title="clic para aceptar motivo de anulación">Aceptar</button>
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
	<?php  
		//include_once("../consultaModal/movimientos/v_asignacion_consultar.php"); 
		include_once("../consultaModal/movimientos/v_asignacion_consultarBien.php");

		include_once("../consultaModal/movimientos/v_asignacion_consultar.php");  
	?>
<?php
	}else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}
?>