<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="GestionarRecepcion.js"></script>
	<style type="text/css">
	#formulario_estilo_individual1{
		border-collapse: collapse;
		margin: auto;
		width: 80%;
		border: 1px solid #7B7B7B;
	}
	#formulario_estilo_individual1 tr td button{
		padding: 8px;
		border-radius: 4px;
		margin-top: 20px;
		margin-bottom: 10px;
	}
	#formulario_estilo_individual1 tr td button:hover{
		cursor: pointer;
		opacity: 0.8;
	}
	#formulario_estilo_individual1 tr td#r-paddig{
		/*border: 1px solid #000;*/
		padding: 10px;
	}
	caption{
		border: 1px solid #7B7B7B;
		padding: 10px;

	}
	.caption{
		display: inline-block;
		text-align: center;
		border: 1px solid #000;
		width: 100%;
		border: 1px solid #7B7B7B;
		padding: 8px 0px 8px 0px;
	}

	/*   ESTILOS CRUP  */
		/*#detalle{
			text-align: center;
			border: 1px solid #000;
			width: 100%;
			background: #ccc;
			border: 1px solid #7B7B7B;
		}*/
	/*#detalle tr td#cabecera-crup{
		border-collapse: collapse;
		border: 1px solid #000;
	}
	#detalle tr td#pintacrup{
		background: red;
	}*/

	#cabecera-detalle{
		background: #ccc;
		padding: 8px;
		text-align: center;
	}
	#cabecera-detalle span{
		padding: 5px;
		margin: 15px;
		font-size: 17px;
	}

	/********* detalle *******/
	.nro-recep{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 70%;
		margin-left: -10%;
		padding: 4px;
		border:0px;
		text-align: center;
		resize:none;
		height: 28px;
	}
	.cod_bien_R{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 80%;
		margin-left: -45%;
		padding: 4px;
		border:0px;
		text-align: center;
		resize:none;
		height: 28px;
	}
	.id_tbien{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 92%;
		margin-left: -58%;
		padding: 4px;
		border:0px;
		text-align: center;
		resize:none;
		height: 28px;
	}
	
	.des_bien_recep{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 112%;
		margin-left: -40%;
		padding: 4px;
		border:0px;
		text-align: center;
		resize:none;
		height: 28px;
	}

	.serial_bien_recep{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 82%;
		padding: 4px;
		margin-left: -25%;
		border:0px;
		text-align: center;
		resize:none;
		height: 28px;
	}
	.cod_marca{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 80%;
		padding: 4px;
		margin-left: -45%;
		border:0px;
		text-align: center;
		resize:none;
		height: 28px;
	}
	
	.modelo_bien_recep{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 78%;
		padding: 4px;
		border:0px;
		margin-left: -75%;
		text-align: center;
		resize:none;
		height: 28px;
	}
	
	.precio_bien_recep{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 72%;
		padding: 4px;
		border:0px;
		margin-left: -100%;
		text-align: center;
		resize:none;
		height: 28px;
	}
	.dep_recep{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		width: 110%;
		padding: 4px;
		border:0px;
		margin-left: -100%;
		text-align: center;
		resize:none;
		height: 28px;
	}
	.obser_bien{
		background: #F6F6F6;
		position: relative;
		top: 1.5px;
		margin-left: -70%;
		width: 105%;
		padding: 4px;
		border:0px;
		text-align: center;
		resize:none;
		height: 28px;
	}
	.btn-quitar{
		background: red;
		color: #fff;
		font-weight: 600;
		font-size: 20px;
		position: relative;
		top: 2px;
		width: 30%;
		margin-left: -130%;
		padding: 4px;
		border:0px;
		text-align: center;
		resize:none;
		height: 28px;
	}
	.btn-quitar span{
		position: relative;
		top: -7px;
		margin-left: -5px;
	}
	.btn-quitar:hover{
		cursor: pointer;
		opacity: 0.8;
	}
	</style>
</head>
<body>

<table id="formulario_estilo_individual1">
<form action="c_control.php" method="POST" name="envio_form">
<caption><span id="iconos-recep-mas" title="clic para mostrar la vista de entrada" onclick="Mostrar()" class="icon-plus"></span><span id="iconos-recep-men" title="clic para no mostrar la vista de entrada" onclick="Cerrar()" class="icon-minus"></span>Recepción: Datos de Entrada <span id="ic-ayuda-frm" class="icon-question" title="Clic para ver ayuda"></span></caption>

<!-- ****************************************** Datos para el Rigistro del bien nacional *************************************************-->
	<tr id="datos-entrada-bien4">
		<td id="r-paddig">
			<label>Código del Bien:<span class="asterisco">*</span> </label>
			<input type="text" readonly="readonly" name="cod_bien_R" placeholder="Ingrese Código del Bien">
		</td>
		<td id="r-paddig">
			<label>Tipo Bien:<span class="asterisco">*</span> </label>
			<select name="tbien" disabled="disabled">
				<option value="20010">COMPUTADORA</option>
				<option value="20020">ESCRITORIOS</option>
				<option value="20020">SILLAS</option>
			</select>
		</td>
		<td id="r-paddig">
			<label >Ubicación: <span class="asterisco">*</span> </label>
			<select  name="dep_recep" disabled="disabled">
				<option value="1">ALMACEN1</option>
				<option value="2">ALMACEN2</option>
			</select>
		</td>
	</tr>
	<tr id="datos-entrada-bien5">
		<td id="r-paddig">
			<label>Serial:</label>
			<input type="text" readonly="readonly" name="serial_bien_recep" placeholder="Ingrese Serial del Bien">
		</td>
		<td id="r-paddig">
			<label>Marca: </label>
			<select name="cod_marca" disabled="disabled">
				<option value="1">HP</option>
				<option value="2">SANSUNG</option>
				<option value="3">BLUS</option>
			</select>
		</td>
		<td id="r-paddig">
			<label>Modelo:</label>
			<input type="text" readonly="readonly" name="modelo_bien_recep" placeholder="Ingrese Modelo del Bien Nacional">
		</td>
	</tr>
	<tr id="datos-entrada-bien6">
		<td id="r-paddig">
			<label>Precio:<span class="asterisco">*</span> (Bsf)</label>
			<input type="text" readonly="readonly" name="precio_bien_recep" placeholder="Ingrese precio en bolivares">
		</td>
		<td id="r-paddig">
			<label>Descripción: </label>
			<textarea id="textareaBien" readonly="readonly" name="des_bien_recep" placeholder="Ingrese descripción del bien nacional, este campo es opcional"></textarea>
		</td>
		<td id="r-paddig">
			<label>Observación: </label>
			<textarea id="textareaBien" readonly="readonly" name="obser_bien" placeholder="Ingrese Observación, este campo es opcional "></textarea>
	
			<button type="button" value="add" disabled="disabled" id="r-agregar" name="addService" onclick="agregar()" ><span id="icon-plus" class="icon-plus"></span> Agregar</button>
		</td>
	</tr>
<!-- ****************************************** Cierre del los Datos para el Rigistro del bien nacional *************************************************-->
<tr><td colspan="3">
	<div class="caption">Recepción: Detalle del Bien Nacional</div>
	<div id="cabecera-detalle"> 
		<span >N°</span>
		<span >Código</span>
		<span >Tipo Bien</span>
		<span >Descripción</span>
		<span >Serial</span>
		<span >Marca</span>
		<span >Modelo</span>
		<span >Precio</span>
		<span >Ubicación</span>
		<span >Observación</span>
		<span ></span>
	</div>
</td></tr>
<!-- ******************************************* Detalle del bien nacional *************************************************-->
	<tr>
		<td colspan="3">
			<div id="topLink">
				<table id="detalle" style="text-align:center;">
					<tr><!-- resultado crup mediante innerHTML -->
						<td></td>
					</tr>
				</table>
			</div>
		</td>
	</tr>

	<!-- **** script que hace posible la crup -->
	<script type="text/javascript">
		function quitar(nodoPadre){

		nodoPadre.parentNode.remove(); c--;
		
		}
			var c = 0;
			function agregar(){
				c++;
				tabla = document.getElementById("detalle");
				tr = tabla.insertRow(-1);
				td = tr.insertCell(0);
				td0 = tr.insertCell(1);
				td1 = tr.insertCell(2);
				td2 = tr.insertCell(3);
				td3 = tr.insertCell(4);
				td4 = tr.insertCell(5);
				td5 = tr.insertCell(6);
				td6 = tr.insertCell(7);
				td7 = tr.insertCell(8);
				td8 = tr.insertCell(9);
				td9 = tr.insertCell(10);
				td10 = tr.insertCell(11);

				/* primer input numero autoincremental */
				textarea = document.createElement('textarea');
				textarea.type="text";
				textarea.setAttribute('class','nro-recep');
				textarea.readOnly="readOnly";
				textarea.name="nro_array[]";
				textarea.value = c;

				/* primer input*/
				textarea1 = document.createElement('textarea');
				textarea1.type="text";
				textarea1.setAttribute('class','cod_bien_R');
				textarea1.readOnly="readOnly";
				textarea1.name="cod_bien_R_array[]";
				textarea1.value = document.envio_form.cod_bien_R.value;

				/* segundo input*/
				textarea2 = document.createElement('textarea');
				textarea2.type="text";
				textarea2.readOnly="readOnly";
				textarea2.setAttribute('class','id_tbien');
				textarea2.name="tbien_array[]";
				textarea2.value = document.envio_form.tbien.value;

				/* tercer input textarea */
				textarea3 = document.createElement('textarea');
				textarea3.type="text";
				textarea3.readOnly="readOnly";
				textarea3.setAttribute('class','des_bien_recep');
				textarea3.name="des_bien_recep_array[]";
				textarea3.value = document.envio_form.des_bien_recep.value;

				/* cuarto input*/
				textarea4 = document.createElement('textarea');
				textarea4.type="text";
				textarea4.readOnly="readOnly";
				textarea4.setAttribute('class','serial_bien_recep');
				textarea4.name="serial_bien_recep_array[]";
				textarea4.value = document.envio_form.serial_bien_recep.value;

				/* quinto input textarea */
				textarea5 = document.createElement('textarea');
				textarea5.type="text";
				textarea5.readOnly="readOnly";
				textarea5.setAttribute('class','cod_marca');
				textarea5.name="cod_marca_array[]";
				textarea5.value = document.envio_form.cod_marca.value;

				/* sexto input textarea*/
				textarea6 = document.createElement('textarea');
				textarea6.type="text";
				textarea6.readOnly="readOnly";
				textarea6.setAttribute('class','modelo_bien_recep');
				textarea6.name="modelo_bien_recep_array[]";
				textarea6.value = document.envio_form.modelo_bien_recep.value;

				/* septimo input textarea*/
				textarea7 = document.createElement('textarea');
				textarea7.type="text";
				textarea7.setAttribute('class','precio_bien_recep');
				textarea7.readOnly="readOnly";
				textarea7.name="precio_bien_recep_array[]";
				textarea7.value = document.envio_form.precio_bien_recep.value;

				/* obtavo input textarea*/
				textarea8 = document.createElement('textarea');
				textarea8.type="text";
				textarea8.readOnly="readOnly";
				textarea8.setAttribute('class','dep_recep');
				textarea8.name="dep_recep_array[]";
				textarea8.value = document.envio_form.dep_recep.value;

				/* noveno input textarea*/
				textarea9 = document.createElement('textarea');
				textarea9.type="text";
				textarea9.readOnly="readOnly";
				textarea9.setAttribute('class','obser_bien');
				textarea9.name="obser_bien_array[]";
				textarea9.value = document.envio_form.obser_bien.value;

				td0.appendChild(textarea);
				td1.appendChild(textarea1);
				td2.appendChild(textarea2);
				td3.appendChild(textarea3);
				td4.appendChild(textarea4);
				td5.appendChild(textarea5);
				td6.appendChild(textarea6);
				td7.appendChild(textarea7);
				td8.appendChild(textarea8);
				td9.appendChild(textarea9);
				td10.innerHTML = "<button type='button' class='btn-quitar' onclick='quitar(this.parentNode)' title='clic para quitar el registro' value='del' name='delService'><span>x</span></button>";
			}
	</script>
	<!-- **** cierre del script que hace posible la crup *** -->

<!-- ******************************************* Cierre del Detalle del bien nacional *************************************************-->

<!-- ******************************************* Botonera *************************************************-->
	<tr id="botonera">
		<td  align="center" colspan="3"><br/>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDes"])) echo $_SESSION["opActDes"]; ?>">
			<input type="hidden" name="modificar" />
			<input type="hidden" name="op" />
			<input type="hidden" name="temp"/>	
			<!-- Incluyo la botonera -->
			<button type="button" name="inc" value="Incluir" onclick="General_Recepcion(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" value="Consultar"  name="bus"  onclick="" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" value="Grabar" name="grab" onclick="General_Recepcion(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" value="Anular" name="anu" onclick="" disabled="disabled"><span id="iconos" class="icon-folder-minus"></span><span>Anular</span></button>	
			<!-- <button type="button" value=""           name="sta"    onclick="General_Bien(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des_btn">Desactivar</span></button> -->		
			<button type="button" value="Cancelar" name="cancel" onclick="General_Recepcion(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>
			
<!-- ******************************************* Cierre Botonera *************************************************-->

<!-- ******************************************* Script para la Botonera *************************************************-->
			<script>	
				frm = document.envio_form;
	
				if(frm.cod_bien_R.value!=""){
					// Encontrado_si();
					// frm.cod_tbien.style.cursor = "not-allowed";
					// frm.nom_tbien.style.cursor = "not-allowed";

					// if(frm.opActDes.value != ""){
					// 	if(frm.opActDes.value == "act" ){
					// 		frm.sta.value = "Desactivar";
					// 		document.getElementById('act').style.display = "none";
					// 		document.getElementById('iconos-1').style.display = "none";
					// 	}else{
					// 		frm.sta.value = "Activar";
					// 		document.getElementById('des').style.display = "none";
					// 		document.getElementById('iconos-2').style.display = "none";
					// 		document.getElementById('act').style.display = "inline-block";
					// 		document.getElementById('iconos-1').style.display = "inline-block";
					// 	}
					// }else{
					// 	frm.sta.value = "Activar";
					// 	document.getElementById('des').style.display = "none";
					// 	document.getElementById('iconos-2').style.display = "none";

					// }
				}else{
					document.envio_form.inc.style.background = "#023859";
					document.envio_form.inc.style.color = "#fff";
					document.envio_form.bus.style.background = "#023859";
					document.envio_form.bus.style.color = "#fff";
	

					frm.cod_bien_R.style.cursor = "not-allowed";
					frm.tbien.style.cursor = "not-allowed";
					frm.dep_recep.style.cursor = "not-allowed";

					frm.serial_bien_recep.style.cursor = "not-allowed";
					frm.cod_marca.style.cursor = "not-allowed";
					frm.modelo_bien_recep.style.cursor = "not-allowed";

					frm.precio_bien_recep.style.cursor = "not-allowed";
					frm.des_bien_recep.style.cursor = "not-allowed";
					frm.obser_bien.style.cursor = "not-allowed";

					frm.addService.style.cursor = "not-allowed";




					// frm.nbien.style.cursor = "not-allowed";
					// frm.des.style.cursor = "not-allowed";
					// frm.tbien.style.cursor = "not-allowed";
					// frm.des.style.cursor = "not-allowed";
					// frm.cant.style.cursor = "not-allowed";
					// frm.val.style.cursor = "not-allowed";
					// frm.fecha.style.cursor = "not-allowed";
					// frm.cond.style.cursor = "not-allowed";
					// frm.cod_inv.style.cursor = "not-allowed";
					// frm.con.style.cursor = "not-allowed";

					//document.getElementById('des_btn').style.display = "none";
					//document.getElementById('iconos-2').style.display = "none";
				}
			</script>
<!-- ******************************************* Cierre de Script para la Botonera *************************************************-->
		</td>
	</tr>
</form>
</table>
</body>
</html>