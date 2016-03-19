/******************* Gestionar Ciudad ********************/
function General_tUser(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.des_tusr.readOnly=false;
		frm.des_tusr.style.cursor='pointer';
		frm.des_tusr.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.des_tusr.value==""){
	// 		consultar();
	// 		frm.des_tusr.readOnly=false;
	// 		frm.des_tusr.style.cursor='pointer';
	// 		frm.des_tusr.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.des_tusr.readOnly=false;
		frm.des_tusr.style.cursor='pointer';
		frm.temp.value = variable;
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;
		openVentana7();	
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();
	}else if(variable == "Grabar"){
		if(!frm.des_tusr.value){
			frm.des_tusr.style.border="1px solid red";
			alert('Debe de Ingresar el tipo de usuario');
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