/******************* Gestionar Categoria ********************/
function General_categoria(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.nom_cat.readOnly=false;
		frm.nom_cat.style.cursor="pointer";
		frm.nom_cat.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.nom_cat.value==""){
	// 		consultar();
	// 		frm.nom_cat.style.cursor="pointer";
	// 		frm.nom_cat.readOnly=false;
	// 		frm.nom_cat.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.nom_cat.style.cursor="pointer";
		frm.temp.value = variable;
		frm.nom_cat.readOnly=false;
	}else if(variable == "Desactivar"){
		
			frm.temp.value = variable;
			openVentana7();
		
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();	
	}else if(variable == "Grabar"){
		if(frm.nom_cat.value==""){
			alert("El Campo Se Encuentra Vacio");
			frm.nom_cat.style.border = "1px solid red";
		}else{
			closeVentana3();
		}		
	}
}