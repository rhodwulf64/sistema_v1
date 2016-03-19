/******************* Gestionar Estado ********************/
function General_estado(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.nom_est.readOnly=false;
		frm.nom_est.style.cursor ="pointer";
		frm.nom_est.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	/*}else if(variable == "Consultar"){
		if(frm.nom_est.value==""){
			consultar();
			frm.nom_est.readOnly=false;
			frm.nom_est.style.cursor ="pointer";
			frm.nom_est.focus();
		}else{
			frm.temp.value = variable;
			frm.submit();	
		}
	}*/
	}else if(variable == "Modificar"){
		Mod();
		frm.temp.value = variable;
		frm.nom_est.readOnly = false;

		frm.nom_est.style.cursor = "pointer";
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;	
		openVentana7();
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();	
	}else if(variable == "Grabar"){
		if(frm.nom_est.value==""){
			alert("El Campo Se Encuentra Vacio");
			frm.nom_est.style.border = "1px solid red";
			frm.nom_est.focus();
		}else{
			if(frm.modificar.value == "si"){
				frm.modificar.value = "";
				closeVentana3();
			}else{
				closeVentana3();
			}
		}		
	}
}