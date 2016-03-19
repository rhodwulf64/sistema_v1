/******************* Gestionar Departamento ********************/
function General_depart(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.nom_dep.readOnly=false;
		frm.cod_sed.disabled=false;
		frm.nom_dep.focus();
		frm.nom_dep.style.cursor="pointer";
		frm.cod_sed.style.cursor="pointer";
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.nom_dep.value=="" && frm.cod_sed.selectedIndex==0){
	// 		consultar();
	// 		frm.nom_dep.style.cursor="pointer";
	// 		frm.cod_sed.style.cursor="pointer";
	// 		frm.nom_dep.readOnly=false;
	// 		frm.cod_sed.disabled=false;
	// 		frm.nom_dep.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.nom_dep.focus();
		frm.nom_dep.style.cursor="pointer";
		frm.cod_sed.style.cursor="pointer";
		frm.temp.value = variable;
		frm.nom_dep.readOnly=false;
		frm.cod_sed.disabled=false;

	}else if(variable == "Desactivar"){
		
			frm.temp.value = variable;
			openVentana7();
		
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();
	}else if(variable == "Grabar"){
		if(frm.nom_dep.value=="" && frm.cod_sed.selectedIndex==""){
			alert("Los Campos Se Encuentra Vacios");
			frm.nom_dep.style.border = "1px solid red";
			frm.cod_sed.style.border = "1px solid red";
		}else if(frm.nom_dep.value==""){
			alert('Ingrese el Nombre del Departamento');
			frm.nom_dep.style.border = "1px solid red";
			frm.cod_sed.style.border = "1px solid #ccc";
		}else if(frm.cod_sed.selectedIndex==""){
			alert('Debe Elegir una Sede');
			frm.nom_dep.style.border = "1px solid #ccc";
			frm.cod_sed.style.border = "1px solid red";
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