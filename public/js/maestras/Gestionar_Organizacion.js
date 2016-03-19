/******************* Gestionar organizacion ********************/
function General_organizacion(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable == "Incluir"){
		Act();
		frm.cod_org.readOnly=false;
		frm.nom_org.readOnly=false;
		frm.cod_org.focus();
		frm.cod_ud.readOnly=false;
		frm.nom_ud.readOnly=false;

		frm.cod_org.style.cursor="pointer";
		frm.nom_org.style.cursor="pointer";
		
		frm.cod_ud.style.cursor="pointer";
		frm.nom_ud.style.cursor="pointer";

		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.nom_ud.value==""){
	// 		consultar();
			
	// 		frm.nom_ud.readOnly=false
	// 		frm.cod_org.style.cursor="pointer";
	// 		frm.nom_org.style.cursor="pointer";
	// 		frm.cod_ud.style.cursor="pointer";
	// 		frm.nom_ud.style.cursor="pointer";
	// 		frm.nom_ud.focus();
		
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.cod_org.readOnly=false;
		frm.nom_org.readOnly=false;
		
		frm.cod_ud.readOnly=false;
		frm.nom_ud.readOnly=false;
		frm.cod_org.style.cursor="pointer";
			frm.nom_org.style.cursor="pointer";
			frm.cod_ud.style.cursor="pointer";
			frm.nom_ud.style.cursor="pointer";
		frm.temp.value = variable;
	}else if(variable == "Desactivar"){
	
			frm.temp.value = variable;
			openVentana7();
		
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();	
	}else if(variable == "Grabar"){
		if(frm.nom_org.value=="" && frm.cod_org.value=="" && frm.cod_ud.value=="" && frm.nom_ud.value==""){
			alert("Los Campo Se Encuentra Vacios.");
			frm.nom_org.style.border = "1px solid red";
			frm.cod_org.style.border="1px solid red";
			frm.nom_org.style.border = "1px solid red";
			frm.cod_org.style.border="1px solid red";
			frm.nom_ud.style.border = "1px solid red";
			frm.cod_ud.style.border="1px solid red";
			frm.nom_ud.style.border="1px solid red";
		}else if(frm.cod_org.value==""){
			alert('Debe Ingresar el Codigo de la organizacion');
			frm.nom_org.style.border="1px solid #ccc";
			frm.cod_org.style.border = "1px solid red";
			frm.cod_org.style.border="1px solid #ccc";
		}else if(frm.nom_org.value==""){
			alert('Ingrese el nombre de la organizacion');
			frm.cod_org.style.border="1px solid #ccc";
			frm.nom_org.style.border = "1px solid red";
			frm.cod_org.style.border="1px solid #ccc";
		}else if(frm.cod_ud.value==""){
			alert('Debe ingresar codigo de la  Unidad Administradora');
			frm.cod_ud.style.border = "1px solid red";
			frm.nom_ud.style.border="1px solid #ccc";
			frm.nom_org.style.border="1px solid #ccc";
		}else if(frm.nom_ud.value==""){
			alert('Debe ingresar el nombre de la Unidad Administradora');

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