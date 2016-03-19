/******************* Gestionar Devolución ********************/
function validarCabeceraDev(){
	frm = document.envio_form;
	if(frm.n_Devolucion.value == ""){
		LibreriaGenerarModal("Debe de ingresar el número de devolución");

		CerrarBien();
		Mostrar();

		frm.n_Devolucion.style.border = "1px solid red";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.f_Dev.style.border = "1px solid #ccc";
		frm.dep.style.border = "1px solid #ccc";
		frm.id_personal_asig.style.border = "1px solid #ccc";
		frm.id_motivo_dev.style.border = "1px solid #ccc";
		frm.n_Devolucion.focus();
		return false;
	}else if(frm.id_personal_recep.value == "selec"){
		LibreriaGenerarModal("Debe de seleccionar el responsable de la devolución");

		CerrarBien();
		Mostrar();

		frm.n_Devolucion.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid red";
		frm.f_Dev.style.border = "1px solid #ccc";
		frm.dep.style.border = "1px solid #ccc";
		frm.id_personal_asig.style.border = "1px solid #ccc";
		frm.id_motivo_dev.style.border = "1px solid #ccc";
		frm.id_personal_recep.focus();
		return false;
	}else if(frm.f_Dev.value == ""){
		LibreriaGenerarModal("Debe de seleccionar fecha de la devolución");

		CerrarBien();
		Mostrar();

		frm.n_Devolucion.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.f_Dev.style.border = "1px solid red";
		frm.dep.style.border = "1px solid #ccc";
		frm.id_personal_asig.style.border = "1px solid #ccc";
		frm.id_motivo_dev.style.border = "1px solid #ccc";
		frm.f_Dev.focus();
		return false;
	}else if(frm.dep.value == "selec"){
		LibreriaGenerarModal("Debe de seleccionar el departamento de donde se devolverán los Bienes");

		CerrarBien();
		Mostrar();

		frm.n_Devolucion.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.f_Dev.style.border = "1px solid #ccc";
		frm.dep.style.border = "1px solid red";
		frm.id_personal_asig.style.border = "1px solid #ccc";
		frm.id_motivo_dev.style.border = "1px solid #ccc";
		frm.dep.focus();
		return false;
	}else if(frm.id_personal_asig.value == "selec"){
		LibreriaGenerarModal("Debe de seleccionar el departamento de donde se devolverán los Bienes");

		CerrarBien();
		Mostrar();

		frm.n_Devolucion.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.f_Dev.style.border = "1px solid #ccc";
		frm.dep.style.border = "1px solid #ccc";
		frm.id_personal_asig.style.border = "1px solid red";
		frm.id_motivo_dev.style.border = "1px solid #ccc";
		frm.id_personal_asig.focus();
		return false;
	}else if(frm.id_motivo_dev.value == "selec"){
		LibreriaGenerarModal("Debe de seleccionar motivo de devolución");

		CerrarBien();
		Mostrar();

		frm.n_Devolucion.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.f_Dev.style.border = "1px solid #ccc";
		frm.dep.style.border = "1px solid #ccc";
		frm.id_personal_asig.style.border = "1px solid #ccc";
		frm.id_motivo_dev.style.border = "1px solid red";
		frm.id_motivo_dev.focus();
		return false;
	}else{
		frm.n_Devolucion.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.f_Dev.style.border = "1px solid #ccc";
		frm.dep.style.border = "1px solid #ccc";
		frm.id_personal_asig.style.border = "1px solid #ccc";
		frm.id_motivo_dev.style.border = "1px solid #ccc";
		return true;
	}
}

function validarMotivoAnulacionAsig(){
	if( document.getElementById('id_motivo_anu_asig').value == "selec" ){
		LibreriaGenerarModal("debe de seleccionar un motivo de anulación");
	}else{
		AceptarMotivoAsig();
	}
}
function validarBtnConsBienDev(){

	if( validarCabeceraDev() ){

		frm = document.envio_form;
		frm.n_Devolucion.style.border = "1px solid #ccc";
		frm.id_personal_recep.style.border = "1px solid #ccc";
		frm.f_Dev.style.border = "1px solid #ccc";
		frm.dep.style.border = "1px solid #ccc";
		frm.id_personal_asig.style.border = "1px solid #ccc";
		frm.id_motivo_dev.style.border = "1px solid #ccc";
			
		//buscarAjaxBien();
		//AbrirVentanaMov();
		buscarAjaxBien();
		Listar1();
	}

}// fin funcion 

function General_Devolucion(v){
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
			document.envio_form.busBienAsig.disabled=false;

			document.envio_form.inc.style.background = "#ccc";
			document.envio_form.inc.style.color = "#666666";
			document.envio_form.bus.style.background = "#ccc";
			document.envio_form.bus.style.color = "#666666";
			document.envio_form.grab.style.background = "#023859";
			document.envio_form.grab.style.color = "#fff";
			document.envio_form.cancel.style.background = "#023859";
			document.envio_form.cancel.style.color = "#fff";
			document.envio_form.busBienAsig.style.background = "#023859";
			document.envio_form.busBienAsig.style.color = "#fff";

			CerrarBien();
			Mostrar();

			document.getElementById('validarCaberaLlena').value = "desbloqueada";
			/****** formulario *******/
			frm.n_Devolucion.readOnly = false;
			frm.id_personal_recep.disabled = false;
			frm.f_Dev.disabled = false;
			frm.dep.disabled = false;
			frm.id_personal_asig.disabled = false;
			frm.id_motivo_dev.disabled = false;
			frm.obser_cabecera.readOnly = false;			
			frm.busBienAsig.disabled = false;
			/*** cursores ****/
			frm.n_Devolucion.style.cursor = "pointer";
			frm.id_personal_recep.style.cursor = "pointer";
			frm.f_Dev.style.cursor = "pointer";
			frm.dep.style.cursor = "pointer";
			frm.id_personal_asig.style.cursor = "pointer";
			frm.id_motivo_dev.style.cursor = "pointer";
			frm.obser_cabecera.style.cursor = "pointer";
			frm.busBienAsig.style.cursor = "pointer";

			frm.temp.value = variable;

			frm.n_Devolucion.focus();
		}else{
			openVentana27();
		}
	}else if(variable == "Cancelar"){
		document.envio_form.inc.disabled=true;
		document.envio_form.bus.disabled=true;
		document.envio_form.grab.disabled=false;
		document.envio_form.cancel.disabled=false;
		document.envio_form.busBienAsig.disabled=false;
		
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
	 		OpenventanaAnularDevol();
		}else{
			openVentana27();
		}
	}else if(variable == "Grabar"){
		/****** formulario *******/

		if( validarCabeceraDev() ){
			if( contadorNro == 0 ){
				LibreriaGenerarModal("por lo menos debe de agregar un Bien Nacional a la lista");
			}else{
				frm.n_Devolucion.readOnly = false;
				frm.id_personal_recep.disabled = false;
				frm.f_Dev.disabled = false;
				frm.dep.disabled = false;
				frm.id_personal_asig.disabled = false;
				frm.id_motivo_dev.disabled = false;
				frm.obser_cabecera.readOnly = false;
				frm.temp.value = variable;
				closeVentana3();
			}
		}
	}
}