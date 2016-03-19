/******************* Gestionar Cargo ********************/
function General_cargo(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.car.readOnly=false;
		frm.car.style.cursor="pointer";
		frm.car.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	/*}else if(variable == "Consultar"){
		if(frm.car.value==""){
			consultar();
			frm.car.style.cursor="pointer";
			frm.car.readOnly=false;
			frm.car.focus();
		}else{
			frm.temp.value = variable;
			frm.submit();	
		}
	*/}else if(variable == "Modificar"){
		Mod();
		frm.car.style.cursor="pointer";
		frm.temp.value = variable;
		frm.car.readOnly=false;
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;	
		openVentana7();
	}else if(variable == "Activar"){
		frm.temp.value = variable;	
		openVentana8();
	}else if(variable == "Grabar"){
		if(frm.car.value==""){
			alert("El Campo Se Encuentra Vacio");
			frm.car.style.border = "1px solid red";
				frm.car.focus();
		}else{
			closeVentana3(); // funcion de libreria.js
		}		
	}
}