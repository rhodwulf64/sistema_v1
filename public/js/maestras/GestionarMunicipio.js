/******************* Gestionar Municipio ********************/
function General_municipio(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		frm.nom_mun.readOnly=false;
		frm.nom_mun.style.cursor='pointer';
		frm.cod_est_m.style.cursor='pointer';
		frm.cod_est_m.disabled=false;
		frm.nom_mun.focus();
		Act();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	/*}else if(variable == "Consultar"){
		if(frm.nom_mun.value==""){
			consultar();
			frm.cod_est.style.cursor='pointer';
			frm.nom_mun.style.cursor='pointer';
			frm.nom_mun.readOnly=false;
			frm.cod_est.disabled=false;
			frm.nom_mun.focus();
		}else if(frm.cod_est.selectedIndex==0){
			alert("debe de seleccionar un estado");
			frm.cod_est.style.border='1px solid red';
		}else{	
			frm.temp.value = variable;
			frm.submit();	
		}
	*/}else if(variable == "Modificar"){
		Mod();
		frm.nom_mun.readOnly=false;
		frm.cod_est_m.disabled=false;
		frm.nom_mun.style.cursor='pointer';
		frm.cod_est_m.style.cursor='pointer';
		frm.temp.value = variable;
	}else if(variable == "Desactivar"){
		
			frm.temp.value = variable;
			openVentana7(); 
		
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();
	}else if(variable == "Grabar"){
		if(frm.nom_mun.value=="" && frm.cod_est_m.selectedIndex==""){
			alert("Los Campo Se Encuentra Vacios.");
			frm.nom_mun.style.border = "1px solid red";
			frm.cod_est_m.style.border="1px solid red";
		}else if(frm.nom_mun.value==""){
			alert('Debe Ingresar El nombre del Municipio');
			frm.nom_mun.style.border = "1px solid red";
			frm.cod_est_m.style.border="1px solid #ccc";
		}else if(frm.cod_est_m.selectedIndex==""){
			frm.cod_est_m.style.border="1px solid red";
			frm.nom_mun.style.border = "1px solid #ccc";
			alert('Debe Elegir un Estado');
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