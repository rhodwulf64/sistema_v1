function botoneraPersonalizada(value){

	var frm = document.envio_form_contacto;

	if( value == "edit" ){

		frm.edit.style.background = "#ccc";
		frm.edit.style.color = "#666";

		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";
		frm.guardar.style.background = "#023859";
		frm.guardar.style.color = "#fff";

		frm.des_tlf.style.cursor="pointer";
		frm.des_correo.style.cursor="pointer";
		frm.des_ubicacion.style.cursor="pointer";
		frm.rif.style.cursor="pointer";

		frm.des_tlf.readOnly=false;
		frm.des_correo.readOnly=false;
		frm.des_ubicacion.readOnly=false;
		frm.rif.readOnly=false;

		frm.edit.disabled=true;
		frm.cancel.disabled=false;
		frm.guardar.disabled=false;

		frm.des_tlf.focus();
		
	}else if(value == "cancel"){
		frm.edit.style.background = "#023859";
		frm.edit.style.color = "#fff";

		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666";
		frm.guardar.style.background = "#ccc";
		frm.guardar.style.color = "#666";

		frm.des_tlf.style.cursor="not-allowed";
		frm.des_correo.style.cursor="not-allowed";
		frm.des_ubicacion.style.cursor="not-allowed";
		frm.rif.style.cursor="not-allowed";

		frm.des_tlf.readOnly=true;
		frm.des_correo.readOnly=true;
		frm.des_ubicacion.readOnly=true;
		frm.rif.readOnly=true;

		frm.edit.disabled=false;
		frm.cancel.disabled=true;
		frm.guardar.disabled=true;

		frm.des_tlf.value=frm.d_tlf.value;
		frm.des_correo.value=frm.d_correo.value;
		frm.des_ubicacion.value=frm.d_ubicacion.value;
		frm.rif.value=frm.d_rif.value;
	}
}
function guardar_contacto(){
	var telefono=$("#des_tlf").val();
	var correo=$("#des_correo").val();
	var direccion=$("#des_ubicacion").val();
	var rif=$("#des_rif").val();

	$.ajax({
		type: "POST",
		url: "../../control/seguridad/c_sistema.php",
		data: ("tele="+telefono+"&corre="+correo+"&dir="+direccion+"&rif_des="+rif),
		success: function(respuesta){
			//console.log(respuesta);
			LibreriaGenerarModal("Registro Exitoso.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>");
			
			guardado_contacto();
		}
	});
}

function guardado_contacto(){
		var frm = document.envio_form_contacto;
		frm.edit.style.background = "#023859";	
		frm.edit.style.color = "#fff";

		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666";
		frm.guardar.style.background = "#ccc";
		frm.guardar.style.color = "#666";

		frm.des_tlf.style.cursor="not-allowed";
		frm.des_correo.style.cursor="not-allowed";
		frm.des_ubicacion.style.cursor="not-allowed";
		frm.rif.style.cursor="not-allowed";

		frm.des_tlf.readOnly=true;
		frm.des_correo.readOnly=true;
		frm.des_ubicacion.readOnly=true;
		frm.rif.readOnly=true;

		frm.edit.disabled=false;
		frm.cancel.disabled=true;
		frm.guardar.disabled=true;
}


function botoneraPersonalizada1(value){
	var frm=document.envio_form_qs;
	if(value == "edit"){

		frm.edit.style.background = "#ccc";
		frm.edit.style.color = "#666";

		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";
		frm.guardar.style.background = "#023859";
		frm.guardar.style.color = "#fff";

		frm.des_qs.style.cursor="pointer";
		frm.des_qs.readOnly=false;

		frm.edit.disabled=true;
		frm.cancel.disabled=false;
		frm.guardar.disabled=false;

		frm.des_qs.focus();
	}else if(value == "cancel"){
		frm.edit.style.background = "#023859";
		frm.edit.style.color = "#fff";

		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666";
		frm.guardar.style.background = "#ccc";
		frm.guardar.style.color = "#666";

		frm.des_qs.style.cursor="not-allowed";
	

		frm.des_qs.readOnly=true;
		

		frm.edit.disabled=false;
		frm.cancel.disabled=true;
		frm.guardar.disabled=true;

		frm.des_qs.value=frm.d_qs.value;
		

	}
}

function guardar_qs(){
	var quienes_somos=$("#des_qs").val();

	$.ajax({
		type: "POST",
		url:  "../../control/seguridad/c_sistema.php",
		data: ("qs="+quienes_somos),
		success:function(){
			LibreriaGenerarModal("Registro Exitoso.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>");
			guardado_qs();
		}
	});
}
function guardado_qs(){
	var frm = document.envio_form_qs;
	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";

	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666";

	frm.des_qs.style.cursor="not-allowed";
	

	frm.des_qs.readOnly=true;
		

	frm.edit.disabled=false;
	frm.cancel.disabled=true;
	frm.guardar.disabled=true;
}

function botoneraPersonalizada2(value){
	var frm=document.envio_form_mision;

	if(value=="edit"){
		frm.edit.style.background = "#ccc";
		frm.edit.style.color = "#666";

		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";
		frm.guardar.style.background = "#023859";
		frm.guardar.style.color = "#fff";

		frm.des_mision.style.cursor="pointer";
		

		frm.des_mision.readOnly=false;
		

		frm.edit.disabled=true;
		frm.cancel.disabled=false;
		frm.guardar.disabled=false;

		frm.des_mision.focus();
	}else if(value =="cancel"){
		frm.edit.style.background = "#023859";
		frm.edit.style.color = "#fff";

		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666";
		frm.guardar.style.background = "#ccc";
		frm.guardar.style.color = "#666";

		frm.des_mision.style.cursor="not-allowed";
	

		frm.des_mision.readOnly=true;
		

		frm.edit.disabled=false;
		frm.cancel.disabled=true;
		frm.guardar.disabled=true;

		frm.des_mision.value=frm.d_mision.value;
	}


}
function guardar_mis(){
	var mision=$("#des_mision").val();

	$.ajax({
		type: "POST",
		url:  "../../control/seguridad/c_sistema.php",
		data: ("mis="+mision),
		success:function(){
			LibreriaGenerarModal("Registro Exitoso.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>");
			guardar_mision();
		}
	});
}

function guardar_mision(){
	var frm = document.envio_form_mision;
	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";

	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666";

	frm.des_mision.style.cursor="not-allowed";
	

	frm.des_mision.readOnly=true;
		

	frm.edit.disabled=false;
	frm.cancel.disabled=true;
	frm.guardar.disabled=true;
}

function botoneraPersonalizada3(value){
	var frm=document.envio_form_vision;

	if(value == "edit"){
		frm.edit.style.background = "#ccc";
		frm.edit.style.color = "#666";

		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";
		frm.guardar.style.background = "#023859";
		frm.guardar.style.color = "#fff";

		frm.des_vision.style.cursor="pointer";
		frm.des_vision.readOnly=false;

		frm.edit.disabled=true;
		frm.cancel.disabled=false;
		frm.guardar.disabled=false;

		frm.des_vision.focus();
	}else if(value == "cancel"){
		frm.edit.style.background = "#023859";
		frm.edit.style.color = "#fff";

		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666";
		frm.guardar.style.background = "#ccc";
		frm.guardar.style.color = "#666";

		frm.des_vision.style.cursor="not-allowed";
	

		frm.des_vision.readOnly=true;
		

		frm.edit.disabled=false;
		frm.cancel.disabled=true;
		frm.guardar.disabled=true;

		frm.des_vision.value=frm.d_vision.value;
	}
}

function guardar_vision(){
	var vision=$("#des_vision").val();

	$.ajax({
		type: "POST",
		url: "../../control/seguridad/c_sistema.php",
		data: ("vis="+vision),
		success:function(){
			LibreriaGenerarModal("Registro Exitoso.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>");
			guardado_vision();
		}

	});
}
function guardado_vision(){
	var frm = document.envio_form_vision;
	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";

	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666";

	frm.des_vision.style.cursor="not-allowed";
	

	frm.des_vision.readOnly=true;
		

	frm.edit.disabled=false;
	frm.cancel.disabled=true;
	frm.guardar.disabled=true;
}
function botoneraPersonalizada4(value){
	var frm=document.envio_form_obj;

	if(value == "edit"){
		frm.edit.style.background = "#ccc";
		frm.edit.style.color = "#666";

		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";
		frm.guardar.style.background = "#023859";
		frm.guardar.style.color = "#fff";

		frm.des_objG.style.cursor="pointer";
		frm.des_objG.readOnly=false;
		frm.des_objE.style.cursor="pointer";
		frm.des_objE.readOnly=false;

		frm.edit.disabled=true;
		frm.cancel.disabled=false;
		frm.guardar.disabled=false;

		frm.des_objG.focus();
	}else if(value == "cancel"){
		frm.edit.style.background = "#023859";
		frm.edit.style.color = "#fff";

		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666";
		frm.guardar.style.background = "#ccc";
		frm.guardar.style.color = "#666";

		frm.des_objG.style.cursor="pointer";
		frm.des_objG.readOnly=true;
		frm.des_objE.style.cursor="pointer";
		frm.des_objE.readOnly=true;

		

		frm.edit.disabled=false;
		frm.cancel.disabled=true;
		frm.guardar.disabled=true;

		frm.des_objG.value=frm.d_obG.value;
		frm.des_objE.value=frm.d_obE.value;
	}
}
function guardado_obj(){
	var frm = document.envio_form_obj;
	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";

	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666";

	frm.des_objG.style.cursor="pointer";
	frm.des_objG.readOnly=true;
	frm.des_objE.style.cursor="pointer";
	frm.des_objE.readOnly=true;
		

	frm.edit.disabled=false;
	frm.cancel.disabled=true;
	frm.guardar.disabled=true;
}
function guardar_obj(){
	var objG=$("#des_objG").val();
	var objE=$("#des_objE").val();
	$.ajax({
		type: "POST",
		url: "../../control/seguridad/c_sistema.php",
		data: ("d_obE="+objE+"&d_obG="+objG),
		success:function(){
			LibreriaGenerarModal("Registro Exitoso.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>");
			guardado_obj();
		}

	});
}

function botoneraPersonalizada5(value){
	var frm=document.envio_form_sede;

	if(value == "edit"){
		frm.edit.style.background = "#ccc";
		frm.edit.style.color = "#666";

		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";
		frm.guardar.style.background = "#023859";
		frm.guardar.style.color = "#fff";

		frm.abrev_sed.style.cursor="pointer";
		frm.abrev_sed.readOnly=false;
		frm.cod_sed.style.cursor="pointer";
		frm.cod_sed.disabled=false;

		frm.edit.disabled=true;
		frm.cancel.disabled=false;
		frm.guardar.disabled=false;

		frm.abrev_sed.focus();
	}else if(value == "cancel"){
		frm.edit.style.background = "#023859";
		frm.edit.style.color = "#fff";

		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666";
		frm.guardar.style.background = "#ccc";
		frm.guardar.style.color = "#666";

		frm.abrev_sed.style.cursor="pointer";
		frm.abrev_sed.readOnly=true;
		frm.cod_sed.style.cursor="pointer";
		frm.cod_sed.disabled=true;

		

		frm.edit.disabled=false;
		frm.cancel.disabled=true;
		frm.guardar.disabled=true;

		frm.abrev_sed.value=frm.d_abrev_sed.value;
		frm.cod_sed.value=frm.d_cod_sed.value;
	}
}
function guardar_sede(){
	var abreviatura=$("#abrev_sed").val();
	var combo_sede=$("#cod_sed").val();
	$.ajax({
		type: "POST",
		url: "../../control/seguridad/c_sistema.php",
		data: ("abrev="+abreviatura+"&cod="+combo_sede),
		success:function(){
			LibreriaGenerarModalCerrarSesion("Registro Exitoso, se cerrará la sesión para guardar los cambios.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>",3000);
			guardado_sede();
		}

	});
}
function guardado_sede(){
	var frm = document.envio_form_sede;
	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";

	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666";

	frm.abrev_sed.style.cursor="pointer";
	frm.abrev_sed.readOnly=true;
	frm.cod_sed.style.cursor="pointer";
	frm.cod_sed.disabled=true;
		

	frm.edit.disabled=false;
	frm.cancel.disabled=true;
	frm.guardar.disabled=true;
}