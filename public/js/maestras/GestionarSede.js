/******************* Gestionar Sede ********************/
function General_sede(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.cod_sed.readOnly=false;
		frm.nom_sed.readOnly=false;
	
		frm.comb_org.disabled=false;
		frm.comb_ciu.disabled=false;

		frm.cod_sed.style.cursor="pointer";
		frm.nom_sed.style.cursor="pointer";
		
		frm.comb_org.style.cursor="pointer";
		frm.comb_ciu.style.cursor="pointer";
		frm.cod_sed.focus();
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	}else if(variable == "Consultar" ){
		if(frm.nom_sed.value=="" && frm.comb_ciu.selectedIndex==""){
			consultar();
			frm.nom_sed.readOnly=false;
			frm.comb_ciu.disabled=false;
			frm.comb_ciu.style.cursor="pointer";
			frm.nom_sed.style.cursor="pointer";
			frm.comb_org.style.cursor="pointer";
			frm.nom_sed.focus();
		
		}else{
			frm.temp.value = variable;
			frm.submit();	
		}
	}else if(variable == "Modificar"){
		Mod();
		frm.cod_sed.readOnly=false;
		frm.nom_sed.readOnly=false;
		
		frm.comb_org.disabled=false;
		frm.comb_ciu.disabled=false;
		frm.cod_sed.style.cursor="pointer";
			frm.nom_sed.style.cursor="pointer";
			frm.comb_org.style.cursor="pointer";
		frm.temp.value = variable;
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;
		openVentana7();
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();	
	}else if(variable == "Grabar"){
		if(frm.cod_sed.value==""){
			alert('Debe Ingresar el Codigo de la Sede');
			frm.nom_sed.style.border="1px solid #ccc";
			frm.cod_sed.style.border = "1px solid red";
			frm.comb_ciu.style.border="1px solid #ccc";
			frm.comb_org.style.border="1px solid #ccc";
			frm.cod_sed.focus();
		}else if(frm.nom_sed.value==""){
			alert('Ingrese el nombre de la Sede');
			frm.cod_sed.style.border="1px solid #ccc";
			frm.nom_sed.style.border = "1px solid red";
			frm.comb_ciu.style.border="1px solid #ccc";
			frm.comb_org.style.border="1px solid #ccc";
			frm.nom_sed.focus();
		}else if(frm.comb_org.selectedIndex==""){
			alert('Debe de seleccionar la Unidad Administradora');
			frm.cod_sed.style.border="1px solid #ccc";
			frm.nom_sed.style.border = "1px solid #ccc";
			frm.comb_ciu.style.border="1px solid #ccc";
			frm.comb_org.style.border="1px solid red";
			frm.comb_org.focus();
		}else if(frm.comb_ciu.selectedIndex==""){
			alert('Debe de seleccionar la Parroquia');
			frm.cod_sed.style.border="1px solid #ccc";
			frm.nom_sed.style.border = "1px solid #ccc";
			frm.comb_ciu.style.border="1px solid red";
			frm.comb_org.style.border="1px solid #ccc";
			frm.comb_ciu.focus();
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