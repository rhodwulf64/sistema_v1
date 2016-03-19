/******************* Gestionar Municipio ********************/
function General_periodo(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		// frm.nom_periodo.readOnly=false;
		// frm.fecha_inicio.readOnly=false;
		// frm.fecha_fin.readOnly=false;

		// frm.nom_periodo.style.cursor='pointer';
		// frm.fecha_inicio.style.cursor='pointer';
		// frm.fecha_fin.style.cursor='pointer';

		//frm.nom_periodo.focus();
		
		/****** btn personalizada *****/
		// document.envio_form.inc.disabled=true;
		// document.envio_form.grab.disabled=false;
		// document.envio_form.cancel.disabled=false;

		// document.envio_form.inc.style.background = "#ccc";
		// document.envio_form.inc.style.color = "#666666";

		// document.envio_form.grab.style.background = "#023859";
		// document.envio_form.grab.style.color = "#fff";
		// document.envio_form.cancel.style.background = "#023859";
		// document.envio_form.cancel.style.color = "#fff";

		/******************************/
		frm.temp.value = variable;
		frm.submit();
	}else if(variable == "abrir"){
		frm.temp.value = "abrir";
		frm.submit();
	}else if(variable == "cerrar"){
		frm.temp.value = "cerrar";
		frm.submit();
	}else if(variable == "Cancelar"){
		/****** btn personalizada *****/
		/******************************/
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.fecha_inicio.value==""){
	// 		consultar();
	// 		frm.fecha_inicio.style.cursor='pointer';
	// 		frm.fecha_inicio.readOnly=false;
	// 		frm.fecha_inicio.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	// }else if(variable == "Modificar"){
	// 	Mod();
	// 	frm.fecha_inicio.readOnly=false;
	// 	frm.fecha_fin.readOnly=false;
	// 	frm.fecha_inicio.style.cursor='pointer';
	// 	frm.fecha_fin.style.cursor='pointer';
	// 	frm.temp.value = variable;
	// }else if(variable == "Desactivar"){
	// 	frm.temp.value = variable;
	// 	openVentana7();
	// }else if(variable == "Activar"){
	// 	frm.temp.value = variable;
	// 	frm.submit();	
	// }else 
	}else if(variable == "Grabar_abrir"){
		frm.temp.value = "Grabar_abrir";
		closeVentana3();
	}else if(variable == "Grabar_cerrar"){
		frm.temp.value = "Grabar_cerrar";
		closeVentana3();
	}else if(variable == "Grabar"){
		frm.temp.value = "guardar";
		closeVentana3();
	}
}