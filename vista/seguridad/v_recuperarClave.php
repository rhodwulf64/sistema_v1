<style type="text/css">
	
#regresar{
	float:right;
	padding: 5px;
	border-radius:3px;
}
#regresar:hover{
	cursor: pointer;
	background: #fff;
	color: #000;
}

</style>

<script type="text/javascript">
	function BuscarUser(){
		var usr = $("#BusUser").val();

		$.ajax({
			type: 'POST',
			url: 'control/seguridad/c_ProcessRecClave.php', 
			data: ('hacer=opeBusUser&usr='+usr),
			success: function(resp){
				//console.log(resp);
				if( resp == "UserNoEncontrado" ){
					LibreriaGenerarModal("El usuario "+usr+" no existe. <br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>");
				}else if( resp == "UsuarioBloqPreg1" ){
					return LibreriaGenerarModal("El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.. <br><br>");
				}else{
					$("#acceso2").html(resp);
				}
			
			}
		});
	}

	function Pregunt1(){
		var res = $("#Resp1").val();

		$.ajax({
			type: 'POST',
			url: 'control/seguridad/c_ProcessRecClave.php', 
			data: ('hacer=opeResp1&res='+res),
			success: function(resp){
				//console.log(resp);
				if( resp == "fallo" ){
					LibreriaGenerarModal("Respuesta Incorrecta. <br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>");
				}else if( resp == "UsuarioBloqPreg1" ){
					Intranet();
					LibreriaGenerarModal("El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.. <br><br>");
				}else if( resp == "BloqueadoNuevo" ){
					Intranet();
					return LibreriaGenerarModal("El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.. <br><br>");
				}else{
					$("#acceso2").html(resp);
				}
			
			}
		});
	}

	function Pregunt2(){
		var res = $("#Resp2").val();

		$.ajax({
			type: 'POST',
			url: 'control/seguridad/c_ProcessRecClave.php', 
			data: ('hacer=opeResp2&res='+res),
			success: function(resp){
				//console.log(resp);
				if( resp == "fallo" ){
					LibreriaGenerarModal("Respuesta Incorrecta. <br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>");
				}else if( resp == "UsuarioBloqPreg1" ){
					Intranet();
					LibreriaGenerarModal("El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.. <br><br>");
				}else if( resp == "BloqueadoNuevo" ){
					Intranet();
					return LibreriaGenerarModal("El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.. <br><br>");
				}else{
					$("#acceso2").html(resp);
				}
			
			}
		});
	}

	function validarClaveGuardadoIndex(pass1,pass2){

		var pass1Id = document.getElementById("pass1");
		var pass2Id = document.getElementById("pass2");

		if(pass1 == ""){
			LibreriaGenerarModal("Ingrese nueva clave<br><br>************");
			pass1Id.style.border="1px solid red";
			pass2Id.style.border="1px solid #ccc";
			pass1Id.focus();
			return false;
		}else if(pass1.length <8 || pass1.length >30){
			pass1Id.style.border="1px solid red";
			pass2Id.style.border="1px solid #ccc";
			LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
			pass1Id.focus();
			return false;
		}else if(pass2 == ""){
			LibreriaGenerarModal("Ingrese nuevamente su clave<br><br>************");
			pass1Id.style.border="1px solid #ccc";
			pass2Id.style.border="1px solid red";
			pass2Id.focus();
			return false;
		}else if(pass2.length <8 || pass2.length >30){
			pass1Id.style.border="1px solid #ccc";
			pass2Id.style.border="1px solid red";
			LibreriaGenerarModal("la clave tiene que estar entre los 8 y 30 caracteres");
			pass2Id.focus();
			return false;
		}else if(pass1 != pass2){
			pass1Id.style.border="1px solid red";
			pass2Id.style.border="1px solid red";
			LibreriaGenerarModal("las claves no coinciden <br><br>******<br><br>************");
			pass2Id.focus();
		}else{
			pass1Id.style.border="1px solid #ccc";
			pass2Id.style.border="1px solid #ccc";
			return true;
		}
	}

	function GuardarClave(){
		var pass1 = $("#pass1").val();
		var pass2 = $("#pass2").val();
		//validacion javascript front-end

		if( validarClaveGuardadoIndex(pass1,pass2) ){

			$.ajax({
				type: 'POST',
				url: 'control/seguridad/c_ProcessRecClave.php', 
				data: ('hacer=CambioClave&pass1='+pass1+"&pass2="+pass2),
				success: function(resp){
					//console.log(resp);
					/*if( resp == "fallo" ){
						LibreriaGenerarModal("Respuesta Incorrecta. <br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>");
					}else if( resp == "UsuarioBloqPreg1" ){
						LibreriaGenerarModal("El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.. <br><br>");
					}else if( resp == "BloqueadoNuevo" ){
						return LibreriaGenerarModal("El Usuario se encuentra suspendido, para mayor información contácte al Administrador del sistema.. <br><br>");
					}else{
						$("#acceso2").html(resp);
					}*/
					if( resp == "claveModificada" ){
						Intranet();
						return LibreriaGenerarModal("Su Clave ha sido Modificada con Éxito. <br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>");
					}
				}
			});

		}
	}


	function limpiarPre1(){
		var res = $("#Resp1").val("");
	}
	function limpiarPre2(){
		var res = $("#Resp2").val("");
	}
	function limpiarfrm3(){
		var res = $("#pass1").val("");
		var res = $("#pass2").val("");
	}
	function BusUser(){
		var res = $("#BusUser").val("");
	}
</script>

<table id="acceso2">
	<caption><span class="icon-users"></span> ¿Olvidó su Clave? <span id="regresar" title="clic para regresar al formulario de acceso" onclick="Intranet()" class="icon-arrow-left2"></span></caption>
	<form action="control/seguridad/c_ProcessRecClave.php" method="POST" name="frm_envioBusUser" id="frm_envioBusUser" >
		<tr>
			<td><br>
				<label class="clr-acceso" for="BusUser">&nbsp;&nbsp;Usuario: </label><br>
				<span class="icon-user"></span><input type="text"  onpaste="return false" oncontextmenu="return false"  maxlength="12"  onkeypress="return SoloNumeros(event);" class="usr" id="BusUser" name="usr" placeholder="Ingrese su Usuario" />
			</td>
		</tr>
		<tr  id="botonera">
			<td >
				<input type="button" title="clic para consultar usuario" class="bt-principal" value="Buscar" onclick="BuscarUser()" />
				<input type="button" title="clic pala limpiar el campo de usuario" onclick="BusUser()" value="Cancelar"/>			
				<br><br>
			</td>
		</tr> 
	</form>
</table>