/******************* Gestionar Ciudad ********************/
function General_ciudad(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.nom_ciu.readOnly=false;
		frm.cod_mun.disabled=false;
		frm.nom_ciu.style.cursor='pointer';
		frm.cod_mun.style.cursor='pointer';
		frm.nom_ciu.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.nom_ciu.value=="" && frm.cod_mun.selectedIndex==""){
	// 		consultar();
	// 		frm.nom_ciu.readOnly=false;
	// 		frm.cod_mun.disabled=false;
	// 		frm.cod_mun.style.cursor="pointer";
	// 		frm.nom_ciu.style.cursor='pointer';
	// 		frm.nom_ciu.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.nom_ciu.readOnly=false;
		frm.cod_mun.disabled=false;
		frm.nom_ciu.style.cursor='pointer';
		frm.cod_mun.style.cursor='pointer';
		frm.temp.value = variable;
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;
			openVentana7();
			
		
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();	
	}else if(variable == "Grabar"){
		if(frm.nom_ciu.value=="" && frm.cod_mun.selectedIndex==""){
			alert("Los Campo Se Encuentra Vacios.");
			frm.nom_ciu.style.border = "1px solid red";
			frm.cod_mun.style.border="1px solid red";
		}else if(frm.nom_ciu.value==""){
			alert('Debe Ingresar el Nombre de la Ciudad');
			frm.nom_ciu.style.border = "1px solid red";
			frm.cod_mun.style.border="1px solid #ccc";

		}else if(frm.cod_mun.selectedIndex==""){
			frm.nom_ciu.style.border = "1px solid #ccc";
			frm.cod_mun.style.border="1px solid red";
			alert('Debe Elegir un Municipio');
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