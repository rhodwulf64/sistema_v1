
function General_Personal(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	//var ema = frm.ema.value;
	//var re=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	if(variable == "Incluir"){
		Act();
		frm.ced.readOnly = false;
		frm.nom.readOnly = false;
		frm.ape.readOnly = false;
		frm.dep.disabled = false;
		frm.car.disabled = false;
		frm.telf.readOnly = false;
		frm.email.readOnly = false;

		frm.ced.focus();
		// cursor sobre el formulario
		frm.ced.style.cursor = "pointer";
		frm.nom.style.cursor = "pointer";
		frm.ape.style.cursor = "pointer";
		frm.dep.style.cursor = "pointer";
		frm.car.style.cursor = "pointer";
		frm.telf.style.cursor = "pointer";
		frm.email.style.cursor = "pointer";
		// activo la busqueda independiente
		frm.temp.value = variable;
	}else if(variable == "Cancelar"){
		Can();
		frm.modificar.value = ""; //desabilito el grabar para el modificar
		frm.NoEncon.value = ""; //desabilito el grabar para el modificar
		frm.opActDes.value = ""; //desabilito el grabar para el modificar
		frm.temp.value = variable;
		frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.ced.value==""){
	// 		frm.ced.readOnly = false;
	// 		consultar();
	// 		frm.ced.style.border = "1px solid #0F0FA6";	
	// 		frm.ced.style.cursor = "pointer";
	// 		frm.ced.focus();	
	// 	}else{
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	}else if(variable == "Modificar"){
		Mod();
		frm.ced.readOnly = false;
		frm.nom.readOnly = false;
		frm.ape.readOnly = false;
		frm.dep.disabled = false;
		frm.car.disabled = false;
		frm.telf.readOnly = false;
		frm.email.readOnly = false;

		frm.ced.focus();
		// cursor sobre el formulario
		frm.ced.style.cursor = "pointer";
		frm.nom.style.cursor = "pointer";
		frm.ape.style.cursor = "pointer";
		frm.dep.style.cursor = "pointer";
		frm.car.style.cursor = "pointer";
		frm.telf.style.cursor = "pointer";
		frm.email.style.cursor = "pointer";
		frm.temp.value = variable;
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;	
		openVentana7();
	}else if(variable == "Activar"){
		frm.temp.value = variable;	
		openVentana8();
	}else if(variable == "Grabar"){
		if(frm.ced.value == ""){
			alert("El campo cédula se encuentra vacio");
			frm.ced.style.border="1px solid red";
			frm.nom.style.border="1px solid #ccc";
			frm.ape.style.border="1px solid #ccc";
			frm.dep.style.border="1px solid #ccc";
			frm.car.style.border="1px solid #ccc";
			frm.telf.style.border="1px solid #ccc";
			frm.email.style.border="1px solid #ccc";
			frm.ced.focus();
		}else if(frm.ced.value.length < 6){
			alert("La cédula no puede ser menor a 6 carácteres");
			frm.ced.style.border="1px solid red";
			frm.nom.style.border="1px solid #ccc";
			frm.ape.style.border="1px solid #ccc";
			frm.dep.style.border="1px solid #ccc";
			frm.car.style.border="1px solid #ccc";
			frm.telf.style.border="1px solid #ccc";
			frm.email.style.border="1px solid #ccc";
			frm.ced.focus();
		}else if(frm.nom.value == ""){
			alert("El Campo Nombre se encuentra vacio");
			frm.ced.style.border="1px solid #ccc";
			frm.nom.style.border="1px solid red";
			frm.ape.style.border="1px solid #ccc";
			frm.dep.style.border="1px solid #ccc";
			frm.car.style.border="1px solid #ccc";
			frm.telf.style.border="1px solid #ccc";
			frm.email.style.border="1px solid #ccc";
			frm.nom.focus();
		}else if(frm.nom.value.length < 3){
			alert("El Nombre no puede ser menor a 3 letras");
			frm.ced.style.border="1px solid #ccc";
			frm.nom.style.border="1px solid red";
			frm.ape.style.border="1px solid #ccc";
			frm.dep.style.border="1px solid #ccc";
			frm.car.style.border="1px solid #ccc";
			frm.telf.style.border="1px solid #ccc";
			frm.email.style.border="1px solid #ccc";
			frm.nom.focus();
		}else if(frm.ape.value == ""){
			alert("El campo Apellido se encuentra vacio");
			frm.ced.style.border="1px solid #ccc";
			frm.nom.style.border="1px solid #ccc";
			frm.ape.style.border="1px solid red";
			frm.dep.style.border="1px solid #ccc";
			frm.car.style.border="1px solid #ccc";
			frm.telf.style.border="1px solid #ccc";
			frm.email.style.border="1px solid #ccc";
			frm.ape.focus();
		}else if(frm.ape.value.length < 3){
			alert("El Apellido no puede ser menor a 3 letras");
			frm.ced.style.border="1px solid #ccc";
			frm.nom.style.border="1px solid #ccc";
			frm.ape.style.border="1px solid red";
			frm.dep.style.border="1px solid #ccc";
			frm.car.style.border="1px solid #ccc";
			frm.telf.style.border="1px solid #ccc";
			frm.email.style.border="1px solid #ccc";
			frm.ape.focus();
		}else if(frm.car.value == "seleccione"){
			alert("seleccione un cargo");
			frm.ced.style.border="1px solid #ccc";
			frm.nom.style.border="1px solid #ccc";
			frm.ape.style.border="1px solid #ccc";
			frm.dep.style.border="1px solid #ccc";
			frm.car.style.border="1px solid red";
			frm.telf.style.border="1px solid #ccc";
			frm.email.style.border="1px solid #ccc";
			frm.car.focus();
		}else if(frm.dep.value == "seleccione"){
			alert("seleccione un departamento");
			frm.ced.style.border="1px solid #ccc";
			frm.nom.style.border="1px solid #ccc";
			frm.ape.style.border="1px solid #ccc";
			frm.dep.style.border="1px solid red";
			frm.car.style.border="1px solid #ccc";
			frm.telf.style.border="1px solid #ccc";
			frm.email.style.border="1px solid #ccc";
			frm.dep.focus();
		}else if(frm.telf.value != ""){
			if(frm.telf.value.length != 11){
				alert("El numero telefónico contiene 11 dígitos");
				frm.ced.style.border="1px solid #ccc";
				frm.nom.style.border="1px solid #ccc";
				frm.ape.style.border="1px solid #ccc";
				frm.dep.style.border="1px solid #ccc";
				frm.car.style.border="1px solid #ccc";
				frm.telf.style.border="1px solid red";
				frm.email.style.border="1px solid #ccc";
				frm.telf.focus();	
			}else{
				if(frm.modificar.value == "si"){
					frm.modificar.value = "";
					closeVentana3();
				}else{
					closeVentana3();
				}
			}	
		// }else if(frm.email.value != ""){
		// 	alert("El campo Correo se encuentra vacio");
		// 	frm.ced.style.border="1px solid #ccc";
		// 	frm.nom.style.border="1px solid #ccc";
		// 	frm.ape.style.border="1px solid #ccc";
		// 	frm.dep.style.border="1px solid #ccc";
		// 	frm.car.style.border="1px solid #ccc";
		// 	frm.telf.style.border="1px solid #ccc";
		// 	frm.email.style.border="1px solid red";
		// 	frm.email.focus();
		/*}else if(frm.ema.value != ""){
			var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		    if (!expr.test(frm.ema.value)){
		        alert("Error: La dirección de correo " + frm.ema.value + " es incorrecta.");
		        frm.ced.style.border="1px solid #ccc";
				frm.nom.style.border="1px solid #ccc";
				frm.ape.style.border="1px solid #ccc";
				frm.ema.style.border="1px solid red";
				frm.telf.style.border="1px solid #ccc";
				frm.login.style.border="1px solid #ccc";
				frm.pass1.style.border="1px solid #ccc";
				frm.pass2.style.border="1px solid #ccc";
				frm.niv.style.border="1px solid #ccc";
		    }*/
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
