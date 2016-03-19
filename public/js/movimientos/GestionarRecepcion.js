/******************* Gestionar recepcion ********************/
function validarCabeceraRecep(){
	frm = document.envio_form;
	if(frm.n_D.value == ""){
		LibreriaGenerarModal("Debe de ingresar el número de documento");

		CerrarBien();
		Mostrar();

		frm.n_D.style.border = "1px solid red";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.n_D.focus();
		ValidarBienDisableTrueTour();
		return false;
	}else if(frm.f_lL.value == ""){
		LibreriaGenerarModal("Debe de ingresar fecha de llegada del bien nacional");

		CerrarBien();
		Mostrar();

		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid red";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.f_lL.focus();
		ValidarBienDisableTrueTour();
		return false;
	}else if(frm.cod_prov.value == "selec"){
		LibreriaGenerarModal("Debe de seleccionar proveedor");

		CerrarBien();
		Mostrar();

		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid red";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.cod_prov.focus();
		ValidarBienDisableTrueTour();
		return false;
	}else if(frm.id_personal_recep.value == "selec"){
		LibreriaGenerarModal("Debe de seleccionar responsable de la recepción");
		CerrarBien();
		Mostrar();

		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid red";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.id_personal_recep.focus();
		ValidarBienDisableTrueTour();
		return false;
	}else if(frm.id_motivo_mov.value == "selec"){
		LibreriaGenerarModal("debe de seleccionar un motivo de recepeción");

		CerrarBien();
		Mostrar();

		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid red";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.id_motivo_mov.focus();
		ValidarBienDisableTrueTour();
		return false;
	}else{
		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		return true;
	}
}

function validarMotivoAnulacionRecep(){
	if( document.getElementById('id_motivo_anu').value == "selec" ){
		LibreriaGenerarModal("Debe de seleccionar un motivo de anulación");
	}else{
		AceptarMotivo();
	}
}

function validarBienNacional(){
	frm = document.envio_form;
	if(frm.cod_bien_R.value == ""){
		LibreriaGenerarModal("Ingrese Código del Bien Nacional");

		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid red";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.cod_bien_R.focus();
		return false;
	}else if(frm.tbien.value == "selec"){
		LibreriaGenerarModal("Debe de seleccionar Tipo de Bien Nacional");

		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid red";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.tbien.focus();
		return false;
	}else if(frm.dep_recep.value == "selec"){
		LibreriaGenerarModal("Debe de seleccionar Ubicacion del Bien Nacional ¿que almacen?");

		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid red";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.dep_recep.focus();
		return false;
	}else if(frm.precio_bien_recep.value == ""){
		LibreriaGenerarModal("Ingrese Precio en Bolivares del Bien Nacional");

		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid red";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		frm.precio_bien_recep.focus();
		return false;
	}else{
		frm.n_D.style.border = "1px solid #ccc";
		frm.cod_prov.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.id_motivo_mov.style.border = "1px solid #ccc";
		frm.obser_cabecera.style.border = "1px solid #ccc";
		frm.f_lL.style.border = "1px solid #ccc";

		frm.cod_bien_R.style.border = "1px solid #ccc";
		frm.tbien.style.border = "1px solid #ccc";
		frm.dep_recep.style.border = "1px solid #ccc";
		frm.serial_bien_recep.style.border = "1px solid #ccc";
		frm.cod_marca.style.border = "1px solid #ccc";
		frm.modelo_bien_recep.style.border = "1px solid #ccc";
		frm.precio_bien_recep.style.border = "1px solid #ccc";
		frm.des_bien_recep.style.border = "1px solid #ccc";
		frm.obser_bien.style.border = "1px solid #ccc";
		return true;
	}
}

function validacionBienParaAgragar(){

	if( validarBienNacional() ){
		agregar();
	}
}

function ValidarBienDisableTrueTour(){
	document.envio_form.addService.disabled=true;

	frm.cod_bien_R.readOnly = true;
	frm.tbien.disabled = true;
	frm.dep_recep.disabled = true;

	frm.serial_bien_recep.readOnly = true;
	frm.cod_marca.disabled = true;
	frm.modelo_bien_recep.readOnly = true;

	frm.precio_bien_recep.readOnly = true;
	frm.des_bien_recep.readOnly = true;
	frm.obser_bien.readOnly = true;


	/*cursores*/
	document.envio_form.addService.style.background = "#ccc";
	document.envio_form.addService.style.color = "#666666";

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

}

function ValidarBienDisableTour(){

	document.envio_form.addService.disabled=false;

	frm.cod_bien_R.readOnly = false;
	frm.tbien.disabled = false;
	frm.dep_recep.disabled = false;

	frm.serial_bien_recep.readOnly = false;
	frm.cod_marca.disabled = false;
	frm.modelo_bien_recep.readOnly = false;

	frm.precio_bien_recep.readOnly = false;
	frm.des_bien_recep.readOnly = false;
	frm.obser_bien.readOnly = false;


	/*cursores*/
	document.envio_form.addService.style.background = "#023859";
	document.envio_form.addService.style.color = "#fff";

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

}



function General_Recepcion(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){

		if(document.getElementById('validarPeriodo').value != ""){
			/************ botonera ***********/
			document.envio_form.inc.disabled=true;
			document.envio_form.bus.disabled=true;
			document.envio_form.grab.disabled=false;
			document.envio_form.cancel.disabled=false;
			

			document.envio_form.inc.style.background = "#ccc";
			document.envio_form.inc.style.color = "#666666";
			document.envio_form.bus.style.background = "#ccc";
			document.envio_form.bus.style.color = "#666666";
			document.envio_form.grab.style.background = "#023859";
			document.envio_form.grab.style.color = "#fff";
			document.envio_form.cancel.style.background = "#023859";
			document.envio_form.cancel.style.color = "#fff";

			CerrarBien();
			Mostrar();

			frm.f_lL.disabled = false;

			document.getElementById('validarCaberaLlena').value = "desbloqueada";
			/****** formulario *******/
			//frm.n_R.readOnly = false;
			frm.n_D.readOnly = false;
			// frm.f_lL.readOnly = false;

			frm.cod_prov.disabled = false;
			frm.id_personal_recep.disabled = false;
			frm.id_motivo_mov.disabled = false;
			frm.obser_cabecera.readOnly = false;			
			frm.tbien.disabled = true;

			/*** cursores ****/
			//frm.n_R.style.cursor = "pointer";
			frm.n_D.style.cursor = "pointer";
			// frm.f_lL.style.cursor = "pointer";

			frm.cod_prov.style.cursor = "pointer";
			frm.id_personal_recep.style.cursor = "pointer";
			frm.id_motivo_mov.style.cursor = "pointer";
						
			frm.temp.value = variable;

			frm.n_D.focus();
		}else{
			openVentana27();
		}
	}else if(variable == "Cancelar"){
		document.envio_form.inc.disabled=true;
		document.envio_form.bus.disabled=true;
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
	}else if(variable =="Anular"){
		if(document.getElementById('validarPeriodo').value != ""){
			frm.temp.value = variable;
	 		openVentana32();
		}else{
			openVentana27();
		}
	}else if(variable == "Grabar"){
		if( validarCabeceraRecep() ){

			if( c == 1 ){
				LibreriaGenerarModal("por lo menos debe de agregar un Bien Nacional a la lista");
			}else{
				frm.cod_prov.disabled = false;
				frm.id_personal_recep.disabled = false;
				frm.id_motivo_mov.disabled = false;
				frm.f_lL.disabled=false;
				frm.temp.value = variable;
				closeVentana3();
			}
		}
	} //cierre el if de grabar
}/// cierre funcion