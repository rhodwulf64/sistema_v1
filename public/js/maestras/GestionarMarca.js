/******************* Gestionar Marca********************/
function General_marca(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.nom_marca.readOnly=false;
		frm.nom_marca.style.cursor="pointer";
		frm.nom_marca.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.nom_marca.value==""){
	// 		consultar();
	// 		frm.nom_marca.style.cursor="pointer";
	// 		frm.nom_marca.readOnly=false;
	// 		frm.nom_marca.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.nom_marca.style.cursor="pointer";
		frm.temp.value = variable;
		frm.nom_marca.readOnly=false;
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;
		openVentana7();
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();
	}else if(variable == "Grabar"){
		if(frm.nom_marca.value==""){
			alert("El Campo Se Encuentra Vacio");
			frm.nom_marca.style.border = "1px solid red";
		}else{
			closeVentana3();
		}		
	}
}