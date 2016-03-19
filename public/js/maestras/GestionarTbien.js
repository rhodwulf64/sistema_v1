/******************* Gestionar tipo de Bien ********************/
function General_tbien(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable=="Incluir"){
		Act();
		frm.cod_tbien.readOnly=false;
		frm.nom_tbien.readOnly = false;
		frm.cod_cat.disabled=false;
		
		// cursor sobre el formulario
		frm.cod_tbien.style.cursor="pointer";
		frm.nom_tbien.style.cursor = "pointer";
		frm.cod_cat.style.cursor="pointer";
	
		frm.cod_tbien.focus();

		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.nom_tbien.value=="" && frm.cod_cat.selectedIndex==""){
	// 		consultar();
	// 		frm.cod_cat.disabled=false;
	// 		frm.cod_cat.style.cursor="pointer";
	// 		frm.nom_tbien.readOnly=false;
	// 		frm.nom_tbien.style.cursor="pointer";
	// 		frm.nom_tbien.focus();
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.temp.value = variable;
		frm.cod_tbien.readOnly=false;
		frm.nom_tbien.readOnly=false;
		frm.cod_cat.disabled=false;
		frm.cod_tbien.style.cursor="pointer";
		frm.cod_cat.style.cursor="pointer";
		frm.nom_tbien.style.cursor = "pointer";

	}else if(variable == "Desactivar"){
		
			frm.temp.value = variable;
			openVentana7();
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();	
	}else if(variable == "Grabar"){
		if(frm.cod_tbien.value=="" && frm.nom_tbien.value=="" && frm.cod_cat.selectedIndex==0 ){
			alert("Los Campos Se Encuentra Vacios");
			frm.nom_tbien.style.border = "1px solid red";
			frm.cod_cat.style.border="1px solid red";
			frm.cod_tbien.style.border="1px solid red";
		}else if(frm.cod_tbien.value==""){
			alert('Debe Ingresar el numero del tipo de bien');
			frm.cod_tbien.style.border="1px solid red";
			frm.nom_tbien.style.border="1px solid #ccc";
			frm.cod_cat.style.border="1px solid #ccc";
		}else if(frm.nom_tbien.value==""){
			alert('Debe Ingresar el nombre del tipo de bien')
			frm.nom_tbien.style.border="1px solid red";
			frm.cod_cat.style.border="1px solid #ccc";
		}else if(frm.cod_cat.selectedIndex==0){
			alert('Debe elegir una categoria');
			frm.cod_cat.style.border="1px solid red";
			frm.nom_tbien.style.border="1px solid #ccc";
		}else{
			closeVentana3();
		}		
	}
}