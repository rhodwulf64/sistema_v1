/****************************************************************/
/****             CICPC Sub Delegación Acarigua              ****/
/**** Manejo de Botonera, Validacion de formularios y envios ****/
/****       versión 0.1 beta, Licencia Software Libre        ****/
/****        Desarrolladores: Daniel Gudiño, Nestor Infante  ****/
/****                         Jesus Pirela, Oscar Méndez.    ****/
/****************************************************************/

//para ajax //
window.XMLHttpRequest || (window.XMLHttpRequest = function(){
	return new ActiveXObject("Msxml12.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP");
});
// de modal 1
function validarSeleccion(value){
	frm = document.envio_Modal;
	if(frm.est1[0].checked && frm.est1[1].checked){
		if(value == 0){
			frm.est1[0].checked = false;
		}else{
			frm.est1[1].checked = false;
		}
	}
}
function validarSeleccionReportes(value){
	frm = document.form_general;
	if(frm.est1[0].checked && frm.est1[1].checked){
		if(value == 0){
			frm.est1[0].checked = false;
		}else{
			frm.est1[1].checked = false;
		}
	}
}
function openModalListar(){
	$(".ventana").toggle(0);
}
function closeModalListar(){
	$(".ventana").toggle(0);
}
function openVentana(){
	$(".ventana").toggle(0);
}
function closeVentana(){
	$(".ventana").toggle(0);
}

function openVentanaSalir2(){
	$(".ventanaSalir2").toggle(0);
}
function closeVentanaSalir2(){
	$(".ventanaSalir2").toggle(0);
}
function openVentana2(){
	document.getElementById('si').focus();
	$(".ventana2").toggle(0);
}
function closeVentana2(){
	$(".ventana2").toggle(0);
	$("si").click(function (){ $("#efecto6") });
}
function openVentana3(){
	$(".ventana3").toggle(0);
}
function closeVentana3(){
	$(".ventana3").toggle(0);
}
function openVentana4(){
	$(".ventana4").toggle(0);
}
function closeVentana4(){
	$(".ventana4").toggle(0);
}
function openVentana5(){
	$(".ventana5").toggle(0);
}
function closeVentana5(){
	$(".ventana5").toggle(0);
}
function openVentana6(){
	$(".ventana6").toggle(0);
}
function closeVentana6(){
	$(".ventana6").toggle(0);
}
function openVentana7(){
	$(".ventana7").toggle(0);
}
function closeVentana7(){
	$(".ventana7").toggle(0);
}
function openVentana8(){
	$(".ventana8").toggle(0);
}
function closeVentana8(){
	$(".ventana8").toggle(0);
}
function openVentana9(){
	$(".ventana9").toggle(0);
}
function closeVentana9(){
	$(".ventana9").toggle(0);
}
function openVentana10(){
	$(".ventana10").toggle(0);
}
function closeVentana10(){
	$(".ventana10").toggle(0);
}
function openVentana11(){
	$(".ventana11").toggle(0);
}
function closeVentana11(){
	$(".ventana11").toggle(0);
}
function openVentana12(){
	$(".ventana12").toggle(0);
}
function closeVentana12(){
	$(".ventana12").toggle(0);
}
function openVentana13(){
	$(".ventana13").toggle(0);
}
function closeVentana13(){
	$(".ventana13").toggle(0);
}
function openVentana14(){
	$(".ventana14").toggle(0);
}
function closeVentana14(){
	$(".ventana14").toggle(0);
}
function openVentana15(){
	$(".ventana15").toggle(0);
}
function closeVentana15(){
	location.href="../../control/seguridad/c_logout.php";
}
function openVentana16(){
	$(".ventana16").toggle(0);
}
function closeVentana16(){
	$(".ventana16").toggle(0);
}
function openVentana17(){
	$(".ventana17").toggle(0);
}
function closeVentana17(){
	$(".ventana17").toggle(0);
}
function openVentana18(){
	$(".ventana18").toggle(0);
}

function closeVentana18(){
	$(".ventana18").toggle(0);
}

function openVentana21(){
	$(".ventana21").toggle(0);
}
function closeVentana21(){
	$(".ventana21").toggle(0);
}
function openVentana22(){
	$(".ventana22").toggle(0);
}
function closeVentana22(){
	$(".ventana22").toggle(0);
}
function openVentana23(){
	$(".ventana23").toggle(0);
}
function closeVentana23(){
	$(".ventana23").toggle(0);
}
function openVentana24(){
	$(".ventana24").toggle(0);
}
function closeVentana24(){
	$(".ventana24").toggle(0);
}
function openVentana25(){
	$(".ventana25").toggle(0);
}
function closeVentana25(){
	$(".ventana25").toggle(0);
}
function openVentana26(){
	$(".ventana26").toggle(0);
}
/*
cerrar periodo clausulado
function closeVentana26(){
	$(".ventana26").toggle(0);
}
*/
function openVentana27(){
	$(".ventana27").toggle(0);
}
function closeVentana27(){
	$(".ventana27").toggle(0);
}
function openVentana28(){
	$(".ventana28").toggle(0);
}
function closeVentana28(){
	$(".ventana28").toggle(0);
}
function openVentana29(){
	$(".ventana29").toggle(0);
}
function closeVentana29(){
	$(".ventana29").toggle(0);
}
function openVentana30(){
	$(".ventana30").toggle(0);
}
function closeVentana30(){
	$(".ventana30").toggle(0);
}
function openVentana31(){
	$(".ventana31").toggle(0);
}
function closeVentana31(){
	$(".ventana31").toggle(0);
}
function OpenModalSesionIniciada(){
	$(".ModalSesionIniciada").toggle(0);
}
function CloseModalSesionIniciada(){
	$(".ModalSesionIniciada").toggle(0);
}
function openVentanaDevolFinalizada(){
	$(".DevolcuionFinalizada").toggle(0);
}
function closeVentanaDevolcorFinalizada(){


	/************ ESPERANDO POR NESTOR **************/
	$(".DevolcuionFinalizada").toggle(0);
	var ancho = 200;
	var alto = 100;
	var posicion_x; 
	var posicion_y; 
	posicion_x=(screen.width/2)-(ancho/2); 
	posicion_y=(screen.height/2)-(alto/2); 
	window.open('../../control/c_reportes/c_devolucion/c_dev_nro.php', "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
	//window.open('../../control/c_reportes/c_Recepcion/c_recepcion.php', this.target, 'width=900,height=600');

}
function openVentanaDesincorFinalizada(){
	$(".DesincorFinalizada").toggle(0);
}
function closeVentanaDesincorFinalizada(){


	/************ ESPERANDO POR NESTOR **************/
	$(".DesincorFinalizada").toggle(0);
	var ancho = 200;
	var alto = 100;
	var posicion_x; 
	var posicion_y; 
	posicion_x=(screen.width/2)-(ancho/2); 
	posicion_y=(screen.height/2)-(alto/2); 
	window.open('../../control/c_reportes/c_desincorporacion/c_des_nro.php', "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
	//window.open('../../control/c_reportes/c_Recepcion/c_recepcion.php', this.target, 'width=900,height=600');

}
/******* libreria automatizada ******/
function LibreriaGenerarModalCerrarSesion(value,time){$(".SoloMsjGeneralLibreria .msj-confirmar #id-msj").html(value);$(".SoloMsjGeneralLibreria").toggle(0);setTimeout(function(){$(".SoloMsjGeneralLibreria").fadeOut(1000);location.href="../../control/seguridad/c_logout.php";},time);}

/*********** libreria modal ************/
function LibreriaGenerarModal(valor){
	$(".SoloMsjGeneralLibreria .msj-confirmar #id-msj").html(valor);
	$(".SoloMsjGeneralLibreria").toggle(0);
	setTimeout(function(){ $(".SoloMsjGeneralLibreria").fadeOut(1000); } , 2500);
}

/** igual solo que con mas tiempo **/
function LibreriaGenerarModalMAsTime(valor){
	$(".SoloMsjGeneralLibreria .msj-confirmar #id-msj").html(valor);
	$(".SoloMsjGeneralLibreria").toggle(0);
	setTimeout(function(){ $(".SoloMsjGeneralLibreria").fadeOut(1000); } , 8000);
}
/********* cierre libreria modal *********/

/******* modal para valir al pulsar el mas del bien  ******/
function OpenVentaVlidarMas(){
	$(".VentaVlidarMas").toggle(0);
	setTimeout(function(){ $(".VentaVlidarMas").fadeOut(1000); } , 2500);
	
}
/**********************************************************/

/******* quitar o no bien nacional de la lista *******/
function openVentana33(nodoPadre){
	document.getElementById('guardarNodoPadre').value = nodoPadre;
	$(".ventana33").toggle(0);
}
function closeVentana33(){
	$(".ventana33").toggle(0);
}

function QuitarONoBien(valor){
	if(valor == "Si"){
		//frm.submit();
		closeVentana33();	
		var nodopadre = document.getElementById('guardarNodoPadre').value;
		quitarBien(nodopadre);
	}else{
		closeVentana33();
	}
}
/************* cierre comprobacion quitar lista ***********/

/****** MODAL PARA LA CONSULTA DE LA CONDICION DEL BIEN EN LOS MOVIMINETOS *******/
function ModalCondicion(datos){
	$(".ModalCondicion").toggle(0);
	llamadaAjaxBienDet(datos);
}

function ModalCondicionCosultabien(){
	var datos = $("#n_consul_Bien").val();
	$(".ModalCondicionbienMov").toggle(0);
	llamadaAjaxBienDetConsulMov(datos);
}

function llamadaAjaxBienDetConsulMov(datos){
	$.ajax({
		type: 'POST',
		url: '../../control/movimientos/c_soloConsulBien.php',
		data: ('codigo='+datos+"&temp=CosulBienCodigo"),
		success: function(resp){
			if(resp != ""){ // encontro el codigo en la base de datos
				//console.log(resp);
				document.getElementById('idDAtosAJaxDetalleConsulMov').innerHTML = resp;
			}else{
				console.log("transaccion fallida ...");
			}
		}
	});
}

function llamadaAjaxBienDet(datos){
	var obtenido = datos.split(".");

	//alert("codigo: "+obtenido[0]+" y tipo: "+obtenido[1]);

	var codBien = obtenido[0]; //identificardor de base de datos bien
	var tBien = obtenido[1]; //codigo del tipo del bien
	var codTrue = obtenido[2]; //codigo del bien nacional
	var condicion = obtenido[3]; //condicion del bien nacional

	$.ajax({
		type: 'POST',
		url: '../../control/movimientos/consul_bien_det_modal.php',
		data: ('codigo='+codBien+"&tbien="+tBien+"&trueCod="+codTrue+"&condicion="+condicion+"&temp=si"),
		success: function(resp){
			if(resp != ""){ // encontro el codigo en la base de datos
				//console.log(resp);
				document.getElementById('idDAtosAJaxDetalle').innerHTML = resp;
			}else{
				console.log("transaccion fallida ...");
			}
		}
	});
}

/*********************************** CIERRE ********************************/
function openVentana32(){
	$(".ventana32").toggle(0);
}
function closeVentana32(){
	$(".ventana32").toggle(0);
}
/**********************************************/
function OpenventanaAnularAsig(){
	$(".ventanaAnularAsig").toggle(0);
}
function closeventanaAnularAsig(){
	$(".ventanaAnularAsig").toggle(0);
}
/**********************************************/
function OpenventanaAnularDesin(){
	$(".ventanaAnulardesin").toggle(0);
}
function closeventanaAnularDesin(){
	$(".ventanaAnulardesin").toggle(0);
}
/**********************************************/
function OpenventanaAnularDevol(){
	$(".ventanaAnulardevol").toggle(0);
}
function closeventanaAnularDevol(){
	$(".ventanaAnulardevol").toggle(0);
}
/**********************************************/
function openVentana34(){
	$(".ventana34").toggle(0);
}
/** reporte recepción **/
function closeVentana34(){
	$(".ventana34").toggle(0);
	var ancho = 200;
	var alto = 100;
	var posicion_x; 
	var posicion_y; 
	posicion_x=(screen.width/2)-(ancho/2); 
	posicion_y=(screen.height/2)-(alto/2); 
	window.open('../../control/c_reportes/c_Recepcion/c_recepcion.php', "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
	//window.open('../../control/c_reportes/c_Recepcion/c_recepcion.php', this.target, 'width=900,height=600');
}

function openVentanaModalAsig(){
	$(".VentanaModalAsig").toggle(0);
}
/* reporte asignacion */
function closeVentanaModalAsig(){
	$(".VentanaModalAsig").toggle(0);
	var ancho = 200;
	var alto = 100;
	var posicion_x; 
	var posicion_y; 
	posicion_x=(screen.width/2)-(ancho/2); 
	posicion_y=(screen.height/2)-(alto/2); 
	window.open('../../control/c_reportes/c_asignacion/c_asig_nro.php', "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
	//window.open('../../control/c_reportes/c_Recepcion/c_recepcion.php', this.target, 'width=900,height=600');
}

function openVentana35(){
	$(".ventana35").toggle(0);
}
function closeVentana35(){
	$(".ventana35").toggle(0);
}
function openVentana36(){
	$(".ventana36").toggle(0);
}
function closeVentana36(){
	$(".ventana36").toggle(0);
}
function openVentana37(){
	$(".ventana37").toggle(0);
}
function closeVentana37(){
	$(".ventana37").toggle(0);
}

function ModalConfirmAgrAsig(){
	$(".ventana38").toggle(0);
}
function ModalConfirmAgrAsigColse(){
	$(".ventana38").toggle(0);
}
/*************** inventario recepcion conservar datos anterios al agregar ********************/
function OpenventanaConfirmRecep(){
	$(".ventanaConfirmRecep").toggle(0);
}
function CloseventanaConfirmRecep(){
	$(".ventanaConfirmRecep").toggle(0);
}
function LimpiarSiNoRecep(valor){
	if(valor == "Si"){
		// desea mantener los datos limpio todos excepto
		document.getElementById('textareaBienObser').value = ""; //limpio observación del bien
		document.getElementById('serial_bien_recep').value = ""; //limpio serial del bien
		document.getElementById('cod_bien_R').value = ""; //limpio codigo del bien
		CloseventanaConfirmRecep();
	}else{
		// no desar mantener los datos y limpio todo

		/* tipo texto */
		document.getElementById('textareaBienObser').value = ""; //limpio observación del bien
		document.getElementById('serial_bien_recep').value = ""; //limpio serial del bien
		document.getElementById('cod_bien_R').value = ""; //limpio codigo del bien
		document.getElementById('textareaBienDes').value = ""; //limpio descripción del bien
		document.getElementById('modelo_bien_recep').value = ""; //limpio modelo del bien
		document.getElementById('precio_bien_recep').value = ""; //limpio precio del bien

		/* tipo seleccion */
		document.getElementById('tbien').value = "selec"; //limpio tipo del bien
		document.getElementById('cod_marca').value = 1; //limpio marca del bien
		//document.getElementById('dep_recep').value = "selec"; //limpio Ubicación del bien

		CloseventanaConfirmRecep();
	}
}
/************************** cierre datos anterios recep ***************************/

/*** motivo recepcion ***/
function openModalTipoAnulacion(){
	$(".ModalTipoAnulacion").toggle(0);
}
function CloseModalTipoAnulacion(){
	$(".ModalTipoAnulacion").toggle(0);
}
function AceptarMotivo(){
	CloseModalTipoAnulacion();
	frm.submit();
}
/****** motivo asignacion ****/
function openModalTipoAnulacionAsig(){
	$(".ModalTipoAnulacionAsig").toggle(0);
}
function CloseModalTipoAnulacionAsig(){
	$(".ModalTipoAnulacionAsig").toggle(0);
}
function AceptarMotivoAsig(){
	CloseModalTipoAnulacionAsig();
	frm.submit();
}
/*** motivo desincorporacion ***/
function openModalTipoAnulacionDesin(){
	$(".ModalTipoAnulacionDesin").toggle(0);
}
function CloseModalTipoAnulacionDesin(){
	$(".ModalTipoAnulacionDesin").toggle(0);
}
function AceptarMotivoDesin(){
	CloseModalTipoAnulacionDesin();
	frm.submit();
}
/*** motivo devolcion ***/
function openModalTipoAnulacionDevol(){
	$(".ModalTipoAnulacionDev").toggle(0);
}
function CloseModalTipoAnulacionDevol(){
	$(".ModalTipoAnulacionDev").toggle(0);
}
function AceptarMotivoDevol(){
	CloseModalTipoAnulacionDevol();
	frm.submit();
}

/******* recepcion *******/
function anular(valor){
	if(valor == "Si"){
		//frm.submit();
		closeVentana32();
		openModalTipoAnulacion();	
	}else{
		closeVentana32();
	}
}
/****** asignacion *******/
function anularAsig(valor){
	if(valor == "Si"){
		//frm.submit();
		closeventanaAnularAsig();
		openModalTipoAnulacionAsig();	
	}else{
		closeventanaAnularAsig();
	}
}
/***** desincorporacion ******/
function anularDesin(valor){
	if(valor == "Si"){
		//frm.submit();
		closeventanaAnularDesin();
		openModalTipoAnulacionDesin();	
	}else{
		closeventanaAnularDesin();
	}
}
/***** devolucion ******/
function anularDevol(valor){
	if(valor == "Si"){
		//frm.submit();
		closeventanaAnularDevol();
		openModalTipoAnulacionDevol();	
	}else{
		closeventanaAnularDevol();
	}
}

function confirm_logout(valor){
	if(valor == "Si"){
		location.href="../../control/seguridad/c_logout.php";
	}else{
		closeVentana();
	}
}
function confirm_logout2(valor){
	if(valor == "Si"){
		location.href="../../control/seguridad/c_logout2.php";
	}else{
		closeVentanaSalir2();
	}
}

function guardado(valor){
	if(valor == "Si"){
		frm.submit();
		closeVentana3();	
	}else{
		closeVentana3();
	}
}
function desactivar(valor){
	if(valor == "Si"){
		frm.submit();
		closeVentana7();	
	}else{
		closeVentana7();
	}
}
function activar(valor){
	if(valor == "Si"){
		frm.submit();
		closeVentana8();	
	}else{
		closeVentana8();
	}
}
// function confirm_logout(){
// 	if(!confirm("Está Seguro De Salir Del Sistema ?")){
// 		return false;
// 	}else{
// 		location.href="../../control/seguridad/c_logout.php";
// 	}
// }
function cambio_mayus(input){
	input.value=input.value.toUpperCase();
}

/****************** modal buscar *********************/
function Listar(){
	var submenu = document.getElementById('ventanaModal');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar(){
	var submenu = document.getElementById('ventanaModal');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
/*********************************************************/

/******** MOSTRAR MODAL MOVIMINETO *******/

	function AbrirVentanaMov(){
		//	window.open('../movimientos/ConsultaBienes/asignacion/ConsBienAsig.php', this.target, 'width=900,height=600');
		var fecha = document.getElementById('f_Asig').value;
		alert(fecha);
		//day = new Date();
		//id = day.getTime();
		//iz = (screen.width-780) / 2;
		//ar = (screen.height-550) /2;
		window.open("../movimientos/ConsultaBienes/asignacion/ConsBienAsig.php?fecha="+fecha, this.target,'width=900,height=550,top=50,left=300%');
		//window.open("../movimientos/ConsultaBienes/asignacion/ConsBienAsig.php?fecha="+fecha);
	}
	function QuitarVentanaMov(){
		
	}




/*****************************************/ 

/**************** Modales desarrolladores *****************/
function Listar1(){
	var submenu = document.getElementById('ventanaModal1');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar1(){
	var submenu = document.getElementById('ventanaModal1');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar2(){
	var submenu = document.getElementById('ventanaModal2');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar2(){
	var submenu = document.getElementById('ventanaModal2');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar3(){
	var submenu = document.getElementById('ventanaModal3');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar3(){
	var submenu = document.getElementById('ventanaModal3');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar4(){
	var submenu = document.getElementById('ventanaModal4');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar4(){
	var submenu = document.getElementById('ventanaModal4');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar5(){
	var submenu = document.getElementById('ventanaModal5');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar5(){
	var submenu = document.getElementById('ventanaModal5');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar6(){
	var submenu = document.getElementById('ventanaModal6');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar6(){
	var submenu = document.getElementById('ventanaModal6');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar7(){
	var submenu = document.getElementById('ventanaModal7');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar7(){
	var submenu = document.getElementById('ventanaModal7');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
/************ Mensaje interactivo de cajas de formularios ***********/

function quitarValidacion(){
	document.getElementById("nube").style.visibility = "hidden";
}

/***************** function para descubrir campos de tipo password ******************/
function Convertir(){
	if(document.getElementById("convertir").type == "text"){
		document.getElementById("convertir").type = "password";
		document.getElementById("convertir2").type = "password";
		document.getElementById("convertir3").type = "password";
	}else{
		document.getElementById("convertir").type = "text";
		document.getElementById("convertir2").type = "text";
		document.getElementById("convertir3").type = "text";
	}
}
function Convertir2(){
	if(document.getElementById("convertir4").type == "text"){
		document.getElementById("convertir4").type = "password";
		document.getElementById("convertir5").type = "password";
		document.getElementById("convertir6").type = "password";
	}else{
		document.getElementById("convertir4").type = "text";
		document.getElementById("convertir5").type = "text";
		document.getElementById("convertir6").type = "text";
	}
}
function Convertir3(){
	if(document.getElementById("convertir9").type == "text"){
		document.getElementById("convertir9").type = "password";
	}else{
		document.getElementById("convertir9").type = "text";
	}
}
function Convertir4(){
	if(document.getElementById("convertir11").type == "text"){
		document.getElementById("convertir11").type = "password";
	}else{
		document.getElementById("convertir11").type = "text";
	}
}


/****************** funciones para la modal olvido de bloquear usuario *************************/

/** bloquear **/
	function ejecuta4(valor){
		document.envio_Modal6.ident3.value = valor;
		document.envio_Modal6.submit();
	}
	function openVentana19(valor){
		document.envio_Modal6.valorBotton.value = valor;
		$(".ventana19").toggle(0);
	}
	function closeVentana19(){
		$(".ventana19").toggle(0);
	}
	function bloquear(valor){
		if(valor == "Si"){
			ejecuta4(document.envio_Modal6.valorBotton.value);
			closeVentana19();	
		}else{
			closeVentana19();
		}
	}

	/** desbloquear **/
	function ejecuta5(valor){
		document.envio_Modal7.ident3.value = valor;
		document.envio_Modal7.submit();
	}
	function openVentana20(valor){
		document.envio_Modal7.valorBotton2.value = valor;
		$(".ventana20").toggle(0);
	}
	function closeVentana20(){
		$(".ventana20").toggle(0);
	}
	function desbloquear(valor){
		if(valor == "Si"){
			ejecuta5(document.envio_Modal7.valorBotton2.value);
			closeVentana20();	
		}else{
			closeVentana20();
		}
	}	

	/*validar checkbox y envio de filtro en reportes*/
	function validar_check_reportes(value){
	frm = document.form_general;
	if(frm.est1[0].checked && frm.est1[1].checked){
		if(value == 0){
			frm.est1[0].checked = false;
		}else{
			frm.est1[1].checked = false;
		}
	}

	
}

function envio_filtro(v){
	
 	frm = document.form_general;
 	
	 	
	if(frm.nom.value){ //envio por descripcion
		
		frm.submit();	

	}else if(frm.est1[0].checked){ //Envio por el status activo
	
		frm.submit();
		
	}else if(frm.est1[1].checked){ //envio por el status inactivo
	
		frm.submit();
		
	}else{
		frm.temp.value=v; //envio general
		frm.submit();
	
	}	
}

/*******************************************/