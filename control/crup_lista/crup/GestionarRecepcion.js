/******************* Gestionar Departamento ********************/
function General_Recepcion(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){

			/************ botonera ***********/
			document.envio_form.inc.disabled=true;
			document.envio_form.bus.disabled=true;
			document.envio_form.anu.disabled=true;
			document.envio_form.grab.disabled=false;
			document.envio_form.cancel.disabled=false;
			document.envio_form.addService.disabled=false;

			document.envio_form.inc.style.background = "#ccc";
			document.envio_form.inc.style.color = "#666666";
			document.envio_form.bus.style.background = "#ccc";
			document.envio_form.bus.style.color = "#666666";
			document.envio_form.anu.style.background = "#ccc";
			document.envio_form.anu.style.color = "#666666";
			document.envio_form.grab.style.background = "#023859";
			document.envio_form.grab.style.color = "#fff";
			document.envio_form.cancel.style.background = "#023859";
			document.envio_form.cancel.style.color = "#fff";
			document.envio_form.addService.style.background = "#023859";
			document.envio_form.addService.style.color = "#fff";
			/****** formulario *******/
			// frm.n_R.readOnly = false;
			// frm.n_D.readOnly = false;
			// frm.f_lL.readOnly = false;

			// frm.cod_prov.disabled = false;
			// frm.id_personal_recep.disabled = false;
			// frm.id_motivo_mov.disabled = false;
			// frm.obser_cabecera.readOnly = false;			

			frm.cod_bien_R.readOnly = false;
			frm.tbien.disabled = false;
			frm.dep_recep.disabled = false;

			frm.serial_bien_recep.readOnly = false;
			frm.cod_marca.disabled = false;
			frm.modelo_bien_recep.readOnly = false;

			frm.precio_bien_recep.readOnly = false;
			frm.des_bien_recep.readOnly = false;
			frm.obser_bien.readOnly = false;

			/*** cursores ****/
			// frm.n_R.style.cursor = "pointer";
			// frm.n_D.style.cursor = "pointer";
			// frm.f_lL.style.cursor = "pointer";

			// frm.cod_prov.style.cursor = "pointer";
			// frm.id_personal_recep.style.cursor = "pointer";
			// frm.id_motivo_mov.style.cursor = "pointer";
						

			frm.cod_bien_R.style.cursor = "pointer";
			frm.tbien.style.cursor = "pointer";
			frm.dep_recep.style.cursor = "pointer";

			frm.serial_bien_recep.style.cursor = "pointer";
			frm.cod_marca.style.cursor = "pointer";
			frm.modelo_bien_recep.style.cursor = "pointer";

			frm.precio_bien_recep.style.cursor = "pointer";
			frm.des_bien_recep.style.cursor = "pointer";
			frm.obser_bien.style.cursor = "pointer";

			frm.addService.style.cursor = "pointer";


			frm.temp.value = variable;

			frm.cod_bien_R.focus();
	}else if(variable == "Cancelar"){
		document.envio_form.inc.disabled=true;
		document.envio_form.bus.disabled=true;
		document.envio_form.anu.disabled=true;
		document.envio_form.grab.disabled=false;
		document.envio_form.cancel.disabled=false;
		document.envio_form.addService.disabled=false;

		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.nom_dep.value=="" && frm.cod_sed.selectedIndex==0){
	// 		consultar();
	// 		frm.nom_dep.style.cursor="pointer";
	// 		frm.cod_sed.style.cursor="pointer";
	// 		frm.nom_dep.readOnly=false;
	// 		frm.cod_sed.disabled=false;
	// 		frm.nom_dep.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	// }else if(variable == "Modificar"){
	// 	Mod();
	// 	frm.nom_dep.focus();
	// 	frm.nom_dep.style.cursor="pointer";
	// 	frm.cod_sed.style.cursor="pointer";
	// 	frm.temp.value = variable;
	// 	frm.nom_dep.readOnly=false;
	// 	frm.cod_sed.disabled=false;

	// }else if(variable == "Desactivar"){
		
			// frm.temp.value = variable;
			// openVentana7();
		
	// }else if(variable == "Activar"){
	// 	frm.temp.value = variable;
	// 	openVentana8();
	}else if(variable == "Grabar"){
		frm.temp.value = variable;
		frm.submit();
	}
}