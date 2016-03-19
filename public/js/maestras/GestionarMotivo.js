/******************* Gestionar Motivo ********************/
function General_motivo(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		frm.des_motivo.readOnly=false;
		frm.des_motivo.style.cursor='pointer';
		frm.tipo_motivo.style.cursor='pointer';
		frm.tipo_motivo.disabled=false;
		frm.des_motivo.focus();
		Act();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	/*}else if(variable == "Consultar"){
		if(frm.des_motivo.value==""){
			consultar();
			frm.cod_est.style.cursor='pointer';
			frm.des_motivo.style.cursor='pointer';
			frm.des_motivo.readOnly=false;
			frm.cod_est.disabled=false;
			frm.des_motivo.focus();
		}else if(frm.cod_est.selectedIndex==0){
			alert("debe de seleccionar un estado");
			frm.cod_est.style.border='1px solid red';
		}else{	
			frm.temp.value = variable;
			frm.submit();	
		}
	*/}else if(variable == "Modificar"){
		Mod();
		frm.des_motivo.readOnly=false;
		frm.tipo_motivo.disabled=false;
		frm.des_motivo.style.cursor='pointer';
		frm.tipo_motivo.style.cursor='pointer';
		frm.temp.value = variable;
	}else if(variable == "Desactivar"){
		
			frm.temp.value = variable;
			openVentana7(); 
		
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();
	}else if(variable == "Grabar"){
		if(frm.des_motivo.value=="" && frm.tipo_motivo.selectedIndex==""){
			alert("Los Campo Se Encuentra Vacios.");
			frm.des_motivo.style.border = "1px solid red";
			frm.tipo_motivo.style.border="1px solid red";
		}else if(frm.des_motivo.value==""){
			alert('Debe Ingresar el Nombre del Motivo');
			frm.des_motivo.style.border = "1px solid red";
			frm.tipo_motivo.style.border="1px solid #ccc";
		}else if(frm.tipo_motivo.selectedIndex==""){
			frm.tipo_motivo.style.border="1px solid red";
			frm.des_motivo.style.border = "1px solid #ccc";
			alert('Debe Elegir un Tipo de Motivo');
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