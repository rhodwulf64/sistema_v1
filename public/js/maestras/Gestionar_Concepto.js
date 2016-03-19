/******************* Gestionar desgo ********************/
function General_concepto(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.des_concepto.readOnly=false;
		frm.des_concepto.style.cursor="pointer";
		frm.des_concepto.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	/*}else if(variable == "Consultar"){
		if(frm.des.value==""){
			consultar();
			frm.des.style.cursor="pointer";
			frm.des.readOnly=false;
			frm.des.focus();
		}else{
			frm.temp.value = variable;
			frm.submit();	
		}
	*/}else if(variable == "Modificar"){
		Mod();
		frm.des_concepto.style.cursor="pointer";
		frm.temp.value = variable;
		frm.des_concepto.readOnly=false;
		frm.des_concepto.focus();
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;	
		openVentana7();
	}else if(variable == "Activar"){
		frm.temp.value = variable;	
		openVentana8();
	}else if(variable == "Grabar"){
		if(frm.des_concepto.value==""){
			alert("El Campo Se Encuentra Vacio");
			frm.des.style.border = "1px solid red";
				frm.des.focus();
		}else{
			closeVentana3(); // funcion de libreria.js
		}		
	}
}