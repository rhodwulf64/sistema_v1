/**************** Acceso a Intranet ****************/
function Control_acceso_Intranet(v){
	var frm = document.envio_form;
	frm.ope.value = v;

	if (!frm.usr.value && !frm.pas.value){
		$("#usr").css({
			'box-shadow':'0em 0em 0.3em red',
		});
		$("#pas").css({
			'box-shadow':'0em 0em 0.3em red',
		});
		frm.usr.focus();
	}else if(!frm.usr.value){
		// alert("El Campo Usuario Está Vacio");
		// frm.usr.style.background="#FFF8F8";
		// frm.pas.style.background="#FFF";
		$("#usr").css({
			'box-shadow':'0em 0em 0.3em red',
		});
		$("#pas").css({
			'box-shadow':'0em 0em 0.2em #848484',
		});
		frm.usr.focus();
	}else if(!frm.pas.value){
		// alert("El Campo Contraseña Está Vacio");
		// frm.pas.style.background="#FFF8F8";
		// frm.usr.style.background="#FFF";
		$("#pas").css({
			'box-shadow':'0em 0em 0.3em red',
		});
		$("#usr").css({
			'box-shadow':'0em 0em 0.2em #848484',
		});
		frm.pas.focus();
	}else{
		frm.submit();
	}
}
function validarUser(){
	var frm = document.envio_form;

	if(!frm.usr.value){
		// frm.usr.style.background="#FFF8F8";
		// frm.pas.style.background="#FFF";
		$("#usr").css({
			'box-shadow':'0em 0em 0.3em red',
		});
	}
}
function validarPass(){
	var frm = document.envio_form;
	if(!frm.pas.value){
			// frm.pas.style.background="#FFF8F8";
			// frm.usr.style.background="#FFF";
		$("#pas").css({
			'box-shadow':'0em 0em 0.3em red',
		});
	}
}
function limpiarUsr(){
	var frm = document.envio_form;

	if(!frm.usr.value){
		// frm.usr.style.background="#FFF8F8";
		// frm.pas.style.background="#FFF";
		$("#usr").css({
			'box-shadow':'0em 0em 0.2em #848484',
		});
	}
}
function limpiarPass(){
	var frm = document.envio_form;
	if(!frm.pas.value){
			// frm.pas.style.background="#FFF8F8";
			// frm.usr.style.background="#FFF";
		$("#pas").css({
			'box-shadow':'0em 0em 0.2em #848484',
		});
	}
}