/******************* Gestionar Proveedor********************/
function General_proveedor(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.des_prov.readOnly=false;
		frm.des_prov.style.cursor="pointer";
		frm.prov_rif.style.cursor="pointer";
		frm.prov_rif.readOnly=false;
		frm.des_prov.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.des_prov.value==""){
	// 		consultar();
	// 		frm.des_prov.style.cursor="pointer";
	// 		frm.des_prov.readOnly=false;
	// 		frm.des_prov.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.des_prov.style.cursor="pointer";
		frm.temp.value = variable;
		frm.des_prov.readOnly=false;
		frm.prov_rif.style.cursor="pointer";
		frm.prov_rif.readOnly=false;
		frm.des_prov.focus();
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;
		openVentana7();
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		frm.submit();	
	}else if(variable == "Grabar"){
		if(frm.des_prov.value==""){
			alert("El Campo Se Encuentra Vacio");
			frm.des_prov.style.border = "1px solid red";
		}else{
			closeVentana3();
		}		
	}
}