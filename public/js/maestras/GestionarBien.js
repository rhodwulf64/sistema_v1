/*funcion para frm Bien*/
function automatico(v){
	frm = document.envio_form;
	var condicion;
	if(v=="21"){
		condicion = "Incorporacion de bien";
		frm.con.value = condicion;
	}else if(v=="02"){
		condicion = "Inventario Inicial";
		frm.con.value = condicion;
	}else{
		frm.con.value = "";
	}
} 

function General_Bien(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	if(variable=="Incluir"){
		Act();
		frm.des.readOnly = false;
		frm.tbien.disabled = false;
		frm.val.readOnly = false;
		frm.fecha.readOnly = false;
		frm.cond.disabled = false;
		frm.cod_inv.readOnly = false;

		frm.des.style.cursor = "pointer";
		frm.tbien.style.cursor = "pointer";
		frm.des.style.cursor = "pointer";
		frm.val.style.cursor = "pointer";
		frm.fecha.style.cursor = "pointer";
		frm.cond.style.cursor = "pointer";
		frm.cod_inv.style.cursor = "pointer";

		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.temp.value = variable;
		frm.submit();
	}else if(variable == "Consultar"){
		if(frm.nom_tbien.value==""){
			consultar();
			frm.nom_tbien.readOnly=false;
			frm.nom_tbien.style.cursor="pointer";
			frm.nom_tbien.focus();
		}else{
			frm.temp.value = variable;
			frm.submit();	
		}
	}else if(variable == "Modificar"){
		Mod();
		frm.temp.value = variable;
		frm.cod_tbien.readOnly=false;
		frm.nom_tbien.readOnly=false;

		frm.cod_tbien.style.cursor = "pointer";
		frm.nom_tbien.style.cursor = "pointer";

	}else if(variable == "Desactivar"){
		if(!confirm("¿seguro de Desactivar Estos Datos?")){
			return false;
		}else{
			frm.temp.value = variable;
			frm.submit();	
		}
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		frm.submit();	
	}else if(variable == "Grabar"){
		// if(frm.des.value=="" && frm.tbien.value=="" && frm.val.value=="" && frm.fecha.value=="" && frm.cond.value=="" && frm.cod_inv.value==""){
		// 	alert("Porfavor Rellene Los Campos");
		// 	frm.des.style.border = "1px solid red";
		// 	frm.tbien.style.border = "1px solid red";
		// 	frm.des.style.border = "1px solid red";
		// 	frm.val.style.border = "1px solid red";
		// 	frm.fecha.style.border = "1px solid red";
		// 	frm.cond.style.border = "1px solid red";
		// 	frm.cod_inv.style.border = "1px solid red";
		// }else{
			frm.submit();
		//}		
	}

	// if(frm.des.value==""){
	// 	alert("El Campos Descripción esta vacio.");
	// 	frm.des.style.border="1px solid red";
	// 	frm.tbien.style.border="1px solid #ccc";
	// }else if(frm.tbien.selectedIndex==0){
	// 	alert("Debe Elegir un Tipo de Bien.");
	// 	frm.tbien.style.border="1px solid red";
	// 	frm.des.style.border="1px solid #ccc";
	// }else if(frm.valor.value==""){
	// 	alert("El Campo Valor esta Vacio.");
	// 	frm.valor.style.border="1px solid red";
	// 	frm.tbien.style.border="1px solid #ccc";
	// }else if(frm.fecha.value==""){
	// 	alert("El campo Fecha esta vacio.");
	// 	frm.fecha.style.border='1px solid red';
		
	// }else if(frm.cond[0].checked==false || frm.cond[1].checked==false || frm.cond[2].checked==false){
	// 	alert("Debe elegir una Condicion.");
	// }else if(frm.cod_inv.value==""){
	// 	alert("El Campo codigo de Inventario esta vacio.");
	// 	frm.cod_inv.style.border="1 px solid red";
	// }else{
	// 	frm.submit();
	// }
}