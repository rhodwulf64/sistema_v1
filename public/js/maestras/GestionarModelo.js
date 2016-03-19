/******************* Gestionar Modelo********************/
function General_modelo(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.nom_modelo.readOnly=false;
		frm.nom_modelo.style.cursor="pointer";
		frm.nom_modelo.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	}else if(variable == "Consultar"){
		if(frm.nom_modelo.value==""){
			consultar();
			frm.nom_modelo.style.cursor="pointer";
			frm.nom_modelo.readOnly=false;
			frm.nom_modelo.focus();
		}else{
			frm.temp.value = variable;
			frm.submit();	
		}
	}else if(variable == "Modificar"){
		Mod();
		frm.nom_modelo.style.cursor="pointer";
		frm.temp.value = variable;
		frm.nom_modelo.readOnly=false;
	}else if(variable == "Desactivar"){
		if(!confirm("¿seguro de Desactivar Estos Datos?")){
			return false;
		}else{
			frm.temp.value = variable;
			frm.submit();	
		}
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		frm.submit();	
	}else if(variable == "Grabar"){
		if(frm.nom_modelo.value==""){
			alert("El Campo Se Encuentra Vacio");
			frm.nom_modelo.style.border = "1px solid red";
		}else{
			frm.submit();
		}		
	}
}