function validarClaveAjax(){
	var clave = $('#convertir').val();
	
		$.ajax({
			type: 'POST',
			url: '../../control/seguridad/c_usuario.php',
			data: ('clave='+clave+"&temp=validarClaveIntranet"),
			success: function(resp){
				//console.log(resp);
				if (resp == 0){
					LibreriaGenerarModal("La Clave de usuario es incorrecta.<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>");
					$('.claveIntranetUser').css({
						'border' : '1px solid red'
					});
				}else{
					$('.claveIntranetUser').css({
						'border' : '1px solid #ccc'
					});
					GuardarCambiosClave();
				}
			}
		});
		
	}//cierre condicione disabled	
function GuardarCambiosClave(){
	var clave = $('#convertir').val();
	var n_clave = $('#convertir2').val();
		$.ajax({
			type: 'POST',
			url: '../../control/seguridad/c_usuario.php',
			data: ('clave='+clave+"&clave_nueva="+n_clave+"&temp=ModClaIntranet"),
			success: function(resp){
				//console.log(resp);
				if (resp == 1){
					LibreriaGenerarModal("la clave nueva no puede ser igual a la acutual.<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>");
					$('.claveIntranetUserNueva').css({
						'border' : '1px solid red'
					});
					$('.claveIntranetUserCNueva').css({
						'border' : '1px solid red'
					});
				}else if(resp == 2){
					LibreriaGenerarModal("la clave nueva no puede ser igual a la anterior.<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>");
					$('.claveIntranetUserNueva').css({
						'border' : '1px solid #ccc'
					});
					$('.claveIntranetUserCNueva').css({
						'border' : '1px solid red'
					});
				}else{
					openVentana15();
				}
			}
		});
}		
function Cambiar_Clave(valor){
	var frm = document.envio_form2;
	frm.temp.value = valor;
	if(frm.c_actual.value == ""){
		LibreriaGenerarModal("Ingrese clave actual<br><br>************");
		frm.c_actual.style.border="1px solid red";
		frm.n_clave.style.border="1px solid #ccc";
		frm.n_c_clave.style.border="1px solid #ccc";
		frm.c_actual.focus();
	}else if(frm.c_actual.value.length <8 || frm.c_actual.value.length >30){
		LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
		frm.c_actual.style.border="1px solid red";
		frm.n_clave.style.border="1px solid #ccc";
		frm.n_c_clave.style.border="1px solid #ccc";
		frm.c_actual.focus();
	}else if(frm.n_clave.value == ""){
		LibreriaGenerarModal("Ingrese nueva clave<br><br>************");
		frm.c_actual.style.border="1px solid #ccc";
		frm.n_clave.style.border="1px solid red";
		frm.n_c_clave.style.border="1px solid #ccc";
		frm.n_clave.focus();
	}else if(frm.n_clave.value.length <8 || frm.n_clave.value.length >30){
		frm.c_actual.style.border="1px solid #ccc";
		frm.n_clave.style.border="1px solid red";
		frm.n_c_clave.style.border="1px solid #ccc";
		LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
		frm.n_clave.focus();
	}else if(frm.n_c_clave.value == ""){
		frm.c_actual.style.border="1px solid #ccc";
		frm.n_clave.style.border="1px solid #ccc";
		frm.n_c_clave.style.border="1px solid red";
		LibreriaGenerarModal("confirme su clave<br><br>************");
		frm.n_c_clave.focus();
	}else if(frm.n_c_clave.value.length <8 || frm.n_c_clave.value.length >30){
		frm.c_actual.style.border="1px solid #ccc";
		frm.n_clave.style.border="1px solid #ccc";
		frm.n_c_clave.style.border="1px solid red";
		LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
		frm.n_c_clave.focus();
	}else if(frm.n_c_clave.value != frm.n_clave.value){
		frm.c_actual.style.border="1px solid #ccc";
		frm.n_clave.style.border="1px solid red";
		frm.n_c_clave.style.border="1px solid red";
		LibreriaGenerarModal("las claves no coinciden <br><br>******<br><br>************");
		frm.n_clave.focus();
	}else{
		validarClaveAjax();
		//frm.submit();
	}
}

function munipulaciondeBotonera(value){
	var frm = document.envio_form2;
	if( value == "editar"){
		frm.editar.style.background = "#ccc";
		frm.editar.style.color = "#666666";
		frm.grab.style.background = "#023859";
		frm.grab.style.color = "#fff";
		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";

		frm.c_actual.readOnly = false;
		frm.n_clave.readOnly = false;
		frm.n_c_clave.readOnly = false;

		frm.editar.disabled = true;
		frm.grab.disabled = false;
		frm.cancel.disabled = false;

		frm.c_actual.style.cursor = "pointer";
		frm.n_clave.style.cursor = "pointer";
		frm.n_c_clave.style.cursor = "pointer";

		frm.c_actual.focus();
	}else if( value == "cancel"){
		frm.editar.style.background = "#023859";
		frm.editar.style.color = "#fff";
		frm.grab.style.background = "#ccc";
		frm.grab.style.color = "#666666";
		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666666";

		frm.c_actual.style.border="1px solid #ccc";
		frm.n_clave.style.border="1px solid #ccc";
		frm.n_c_clave.style.border="1px solid #ccc";

		frm.c_actual.value = "";
		frm.n_clave.value = "";
		frm.n_c_clave.value = "";

		frm.editar.disabled = false;
		frm.grab.disabled = true;
		frm.cancel.disabled = true;

		frm.c_actual.style.cursor = "not-allowed";
		frm.n_clave.style.cursor = "not-allowed";
		frm.n_c_clave.style.cursor = "not-allowed";

		frm.c_actual.readOnly = true;
		frm.n_clave.readOnly = true;
		frm.n_c_clave.readOnly = true;
	}
}
function munipulaciondeBotoneraPre(value){
	var frm = document.envio_form3;
	if( value == "editar"){
		frm.editar.style.background = "#ccc";
		frm.editar.style.color = "#666666";
		frm.grab.style.background = "#023859";
		frm.grab.style.color = "#fff";
		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";

		frm.c_user.readOnly = false;
		frm.preg1.disabled = false;
		frm.resp1.readOnly = false;
		frm.preg2.readOnly = false;
		frm.resp2.readOnly = false;

		frm.editar.disabled = true;
		frm.grab.disabled = false;
		frm.cancel.disabled = false;

		

		frm.c_user.style.cursor="pointer";
		frm.preg1.style.cursor="pointer";
		frm.resp1.style.cursor="pointer";
		frm.preg2.style.cursor="pointer";
		frm.resp2.style.cursor="pointer";

		frm.c_user.focus();
	}else if( value == "cancel"){
		frm.editar.style.background = "#023859";
		frm.editar.style.color = "#fff";
		frm.grab.style.background = "#ccc";
		frm.grab.style.color = "#666666";
		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666666";

		

		frm.c_user.style.border="1px solid #ccc";
		frm.preg1.style.border="1px solid #ccc";
		frm.resp1.style.border="1px solid #ccc";
		frm.preg2.style.border="1px solid #ccc";
		frm.resp2.style.border="1px solid #ccc";

		frm.c_user.value="";
		frm.preg1.value="selec";
		frm.resp1.value="";
		frm.preg2.value="";
		frm.resp2.value="";

		frm.editar.disabled = false;
		frm.grab.disabled = true;
		frm.cancel.disabled = true;

		frm.c_user.style.cursor = "not-allowed";
		frm.preg1.style.cursor = "not-allowed";
		frm.resp1.style.cursor = "not-allowed";
		frm.preg2.style.cursor = "not-allowed";
		frm.resp2.style.cursor = "not-allowed";


		frm.c_user.readOnly = true;
		frm.preg1.disabled =  true;
		frm.resp1.readOnly =  true;
		frm.preg2.readOnly =  true;
		frm.resp2.readOnly =  true;
	
	}
}
function Cambiar_Preguntas(valor){
	var frm = document.envio_form3;
	frm.temp.value = valor;
	if(frm.c_user.value == ""){
		LibreriaGenerarModal("Ingrese clave de usuario");
		frm.c_user.style.border="1px solid red";
		frm.preg1.style.border="1px solid #ccc";
		frm.preg2.style.border="1px solid #ccc";
		frm.resp1.style.border="1px solid #ccc";
		frm.resp2.style.border="1px solid #ccc";
		frm.c_user.focus();
	}else if(frm.c_user.value.length <8 || frm.c_user.value.length >30){
		LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
		frm.c_user.style.border="1px solid red";
		frm.preg1.style.border="1px solid #ccc";
		frm.preg2.style.border="1px solid #ccc";
		frm.resp1.style.border="1px solid #ccc";
		frm.resp2.style.border="1px solid #ccc";
		frm.c_user.focus();
	}else if(frm.preg1.value == "selec"){
		LibreriaGenerarModal("Seleccione Pregunta de seguridad 1");
		frm.c_user.style.border="1px solid #ccc";
		frm.preg1.style.border="1px solid red";
		frm.preg2.style.border="1px solid #ccc";
		frm.resp1.style.border="1px solid #ccc";
		frm.resp2.style.border="1px solid #ccc";
		frm.preg1.focus();
	}else if(frm.resp1.value == ""){
		LibreriaGenerarModal("Ingrese la Respuesta de seguridad 1");
		frm.c_user.style.border="1px solid #ccc";
		frm.preg1.style.border="1px solid #ccc";
		frm.preg2.style.border="1px solid #ccc";
		frm.resp1.style.border="1px solid red";
		frm.resp2.style.border="1px solid #ccc";
		frm.resp1.focus();
	}else if(frm.preg2.value == ""){
		LibreriaGenerarModal("Seleccione Pregunta de seguridad 2");
		frm.c_user.style.border="1px solid #ccc";
		frm.preg1.style.border="1px solid #ccc";
		frm.preg2.style.border="1px solid red";
		frm.resp1.style.border="1px solid #ccc";
		frm.resp2.style.border="1px solid #ccc";
		frm.preg2.focus();
	}else if(frm.resp2.value == ""){
		LibreriaGenerarModal("Ingrese la Respuesta de seguridad 2");
		frm.c_user.style.border="1px solid #ccc";
		frm.preg1.style.border="1px solid #ccc";
		frm.preg2.style.border="1px solid #ccc";
		frm.resp1.style.border="1px solid #ccc";
		frm.resp2.style.border="1px solid red";
		frm.resp2.focus();
	}else{
		frm.submit();
	}
}
function munipulaciondeBotoneraCor(value){
	var frm = document.envio_form4;
	if( value == "editar"){
		frm.editar.style.background = "#ccc";
		frm.editar.style.color = "#666666";
		frm.grab.style.background = "#023859";
		frm.grab.style.color = "#fff";
		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";

		frm.c_user2.readOnly = false;
		frm.correo_elect.readOnly = false;
		

		frm.editar.disabled = true;
		frm.grab.disabled = false;
		frm.cancel.disabled = false;

		

		frm.c_user2.style.cursor="pointer";
		frm.correo_elect.style.cursor="pointer";
		

		frm.c_user2.focus();
	}else if( value == "cancel"){
		frm.editar.style.background = "#023859";
		frm.editar.style.color = "#fff";
		frm.grab.style.background = "#ccc";
		frm.grab.style.color = "#666666";
		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666666";

		

		frm.c_user2.style.border="1px solid #ccc";
		frm.correo_elect.style.border="1px solid #ccc";
	

		frm.c_user2.value="";
		frm.correo_elect.value="";


		frm.editar.disabled = false;
		frm.grab.disabled = true;
		frm.cancel.disabled = true;

		frm.c_user2.style.cursor = "not-allowed";
		frm.correo_elect.style.cursor = "not-allowed";
	


		frm.c_user2.readOnly = true;
		frm.correo_elect.readOnly =  true;
	
	
	}
}



function Cambiar_Correo(valor){
	var frm = document.envio_form4;
	frm.temp.value = valor;
	if(frm.c_user2.value == ""){
		LibreriaGenerarModal("Ingrese clave de usuario");
		frm.c_user2.style.border="1px solid red";
		frm.correo_elect.style.border="1px solid #ccc";
		frm.c_user2.focus();
	}else if(frm.c_user2.value.length <8 || frm.c_user2.value.length >30){
		LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
		frm.c_user2.style.border="1px solid red";
		frm.correo_elect.style.border="1px solid #ccc";
		frm.c_user2.focus();
	}else if(frm.correo_elect.value == ""){
		LibreriaGenerarModal("Ingrese Correo Electrónico");
		frm.c_user2.style.border="1px solid #ccc";
		frm.correo_elect.style.border="1px solid red";
		frm.correo_elect.focus();
	}else{
		frm.submit();
	}
}
function munipulaciondeBotoneraTlf(value){
	var frm = document.envio_form5;
	if( value == "editar"){
		frm.editar.style.background = "#ccc";
		frm.editar.style.color = "#666666";
		frm.grab.style.background = "#023859";
		frm.grab.style.color = "#fff";
		frm.cancel.style.background = "#023859";
		frm.cancel.style.color = "#fff";

		frm.c_user3.readOnly = false;
		frm.telefono_ed.readOnly = false;
		

		frm.editar.disabled = true;
		frm.grab.disabled = false;
		frm.cancel.disabled = false;

		

		frm.c_user3.style.cursor="pointer";
		frm.telefono_ed.style.cursor="pointer";
		

		frm.c_user3.focus();
	}else if( value == "cancel"){
		frm.editar.style.background = "#023859";
		frm.editar.style.color = "#fff";
		frm.grab.style.background = "#ccc";
		frm.grab.style.color = "#666666";
		frm.cancel.style.background = "#ccc";
		frm.cancel.style.color = "#666666";

		

		frm.c_user3.style.border="1px solid #ccc";
		frm.telefono_ed.style.border="1px solid #ccc";
	

		frm.c_user3.value="";
		frm.telefono_ed.value="";


		frm.editar.disabled = false;
		frm.grab.disabled = true;
		frm.cancel.disabled = true;

		frm.c_user3.style.cursor = "not-allowed";
		frm.telefono_ed.style.cursor = "not-allowed";
	


		frm.c_user3.readOnly = true;
		frm.telefono_ed.readOnly =  true;
	
	
	}
}

function Cambiar_Tlf(valor){
	var frm = document.envio_form5;
	frm.temp.value = valor;
	if(frm.c_user3.value == ""){
		LibreriaGenerarModal("Ingrese clave de usuario");
		frm.c_user3.style.border="1px solid red";
		frm.telefono_ed.style.border="1px solid #ccc";
		frm.c_user3.focus();
	}else if(frm.c_user3.value.length <8 || frm.c_user3.value.length >30){
		LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
		frm.c_user3.style.border="1px solid red";
		frm.telefono_ed.style.border="1px solid #ccc";
		frm.c_user3.focus();
	}else if(frm.telefono_ed.value == ""){
		LibreriaGenerarModal("Ingrese El número de teléfono");
		frm.c_user3.style.border="1px solid #ccc";
		frm.telefono_ed.style.border="1px solid red";
		frm.telefono_ed.focus();
	}else{
		frm.submit();
	}
}
//******************* Gestionar Usuario ********************/
function General_Usuario(v){
	var frm = document.envio_form;
	frm.op.value = v;
	var variable = frm.op.value;
	// if(variable == "Incluir"){
	// 	frm.nom_mun.readOnly=false;
	// 	frm.nom_mun.style.cursor='pointer';
	// 	frm.cod_est_m.style.cursor='pointer';
	// 	frm.cod_est_m.disabled=false;
	// 	frm.nom_mun.focus();
	// 	Act();
	// 	frm.temp.value = variable;
	if(variable == "Cancelar"){
	 	Can();
	 	frm.temp.value = variable;
	 	frm.submit();
	// }else if(variable == "Consultar"){
	// 	if(frm.nom_mun.value==""){
	// 		consultar();
	// 		frm.cod_est.style.cursor='pointer';
	// 		frm.nom_mun.style.cursor='pointer';
	// 		frm.nom_mun.readOnly=false;
	// 		frm.cod_est.disabled=false;
	// 		frm.nom_mun.focus();
	// 	}else if(frm.cod_est.selectedIndex==0){
	// 		alert("debe de seleccionar un estado");
	// 		frm.cod_est.style.border='1px solid red';
	// 	}else{	
	// 		frm.temp.value = variable;
	// 		frm.submit();	
	// 	}
	//}else 
	}else if(variable == "Modificar"){
		Mod();
		frm.id_perfil.disabled = false;
		frm.id_perfil.style.cursor='pointer';
		frm.temp.value = variable;
	}else if(variable == "Desactivar"){
		frm.temp.value = variable;
		openVentana7(); 
	}else if(variable == "Activar"){
		frm.temp.value = variable;
		openVentana8();
	}else if(variable == "Grabar"){
		if(frm.id_perfil.selectedIndex==""){
			frm.id_perfil.style.border="1px solid red";
		}else{
			if(frm.modificar.value == "si"){
				frm.modificar.value = "";
				frm.temp.value = "Modificar";
				closeVentana3(); 
			}else{
				frm.temp.value = "Incluir";
				closeVentana3(); 
			}
		}

	}// fin para guardar
}



// /*funcion para frm Usuario*/
// function automatico_usuario(v){
// 	var frm = document.envio_form;
// 	var cedula = frm.ced.value;
// 	frm.login.value = cedula;
// } 

// /******************* Gestionar Usuario ********************/
// function ActPass(v){
// 	var frm = document.envio_form;
// 	if(document.getElementById("clave1").style.display == "none"){
// 		frm.pass1.readOnly = true;
// 		frm.pass2.readOnly = true;
// 		frm.pass1.style.cursor = "not-allowed";
// 		frm.pass2.style.cursor = "not-allowed";

// 		document.getElementById("asterisco-unico-M").style.display = "none";
// 		document.getElementById("asterisco-unico-ocul-M").style.display = "inline-block";
// 		document.getElementById("icon-blocked").style.display = "none";
// 		document.getElementById("icon-spinner9").style.display = "inline-block";
// 		document.getElementById("clave1").style.display = "inline-block";
// 		document.getElementById("nClave").style.display = "none";
// 		frm.actpass.value = "no";
// 	}else{
// 		frm.actpass.value = "si";
// 		alert("modificará la clave del usuario");
// 		frm.pass1.readOnly = false;
// 		frm.pass2.readOnly = false;
// 		frm.pass1.style.cursor = "pointer";
// 		frm.pass2.style.cursor = "pointer";

// 		document.getElementById("asterisco-unico-M").style.display = "none";
// 		document.getElementById("asterisco-unico-ocul-M").style.display = "inline-block";
// 		document.getElementById("icon-blocked").style.display = "inline-block";
// 		document.getElementById("icon-spinner9").style.display = "none";
// 		document.getElementById("clave1").style.display = "none";
// 		document.getElementById("nClave").style.display = "inline-block";
// 	}
// }