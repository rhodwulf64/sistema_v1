<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "sede"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');
?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_sede.php",true);

		$('#cargando').html('<td colspan="10"><img style="position:relative; float:left; width:30px; margin:0% 50% 0% 50%;" src="../../public/img/loading2.gif"/></td>');
		ajax.onreadystatechange=function(){
			if(ajax.readyState == 4 ){

				$("#cargando").show();
				$("#datosAjax").html(ajax.responseText);
				
				setTimeout(function(){ $("#cargando").hide(); var tiempo = 4; } , 1000);	

				//document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		
		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&sede="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&sede="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&sede="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>

<table id="formulario_estilo_individual1">
<form action="../../control/configuracion/c_sede.php" method="POST" name="envio_form" autocomplete="off">
	<caption class="sede-tour">Sede <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-sede ayuda-local-frm ayudaguiada-tour"></span><a style="color:#fff;" href="../pdf_link/Estructura organizativa/Sede1.pdf" target="_black"> <span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
		<input type="hidden" name="id_sede" value="<?php if(isset($_SESSION['id_sede'])) echo $_SESSION['id_sede'];?>">
		<tr >
			<td class="MensajesAyuda codigosede-tour" id="r-paddig" style="width:100%;">	
				<label for="cod_sed ">Código de la Sede:<span class="asterisco">*</span></label><br>
				<input type="text" class="CampoMov" onkeyup="quitarValidacion()" title="Ingrese el código de la sede"readonly="readonly" placeholder="Ingrese solo números" size="4" id="cod_sed" name="cod_sed" value="<?php if(isset($_SESSION['cod_sed'])) echo $_SESSION['cod_sed'];?>" onkeypress="return SoloNumeros(event)" >
				<span id="nube" class="nube" style="">Solo se Permiten Números</span>
			</td>
			<td id="r-paddig" class="nombresede-tour">	
				<label for="nom_sed" >Nombre de la Sede:<span class="asterisco">*</span></label><br>
				<input type="text" class="CampoMov" name="nom_sed" title="Ingrese el nombre de la sede" placeholder="Ingrese solo letras"  onkeypress="return SoloLetras(event)" onkeyup="cambio_mayus(this)" readonly="readonly" value="<?php if(isset($_SESSION['nom_sed'])) echo $_SESSION['nom_sed'];?>">
			</td>
		</tr>	
		<tr>
			<td id="r-paddig" style="width:50%;" class="nombreunidad-tour">	
				<label for="nom_ud" >Nombre de la Unidad Administradora:<span class="asterisco">*</span></label><br>
				<?php
				include_once('../../control/configuracion/c_sede.php');
				$combOrg=array();
				$codOrg="";
				if(isset($_SESSION['comb_org']))
					$codOrg=$_SESSION['comb_org'];
						  
				$cboOrg=PintaOrg($codOrg);
						
				foreach ($cboOrg as $elemento) 
					echo $elemento;
				?>
			</td>
			<td id="r-paddig" class="nombreparroquia-tour">
				<label for="">Nombre de la Parroquia:<span class="asterisco">*</span></label>
				<?php
					include_once('../../control/configuracion/c_parroquia.php');
					$combCiudad=array();
					$codCiudad="";
					if(isset($_SESSION['id_parroquia']))
					$codCiudad=$_SESSION['id_parroquia'];
						  
					$cboCiudad=Pintaparroquia($codCiudad);
						
					foreach ($cboCiudad as $elemento) 
						echo $elemento;
				?>
			</td>
		</tr>
			<!-- <td align="right">	
				<label for="cod_org">Cód. Organismo </label>
			</td>
			<td>
				<input type="text" readonly="readonly" placeholder="Ingrese el Código del Organismo" size="4" id="cod_org" name="cod_org" value="<?php //if(isset($_SESSION['cod_org'])) echo $_SESSION['cod_org'];?>" onkeypress="return SoloNumeros(event)" ><span class="asterisco">*</span>
			</td> -->	
		<!-- <tr>
			<td align="right">	
				<label for="nom_org">Nombre : </label>
			</td>
			<td> -->
				<!-- <select name="nom_org" disabled>
					<option value="0">Seleccione un Organismo</option>
					<option value="MINISTERIO DEL PODER POPULAR PARA LA JUSTICIA INTERIOR Y PAZ" <?php //if(isset($_SESSION['nom_org'])) if($_SESSION['nom_org']=='MINISTERIO DEL PODER POPULAR PARA LA JUSTICIA INTERIOR Y PAZ') echo "selected='selected'";?>>MINISTERIO DEL PODER POPULAR PARA LA JUSTICIA INTERIOR Y PAZ</option>
				</select>
				<span class="asterisco">*</span>
				
			</td>
		</tr> -->
			<!-- <td align="right">	
				<label for="cod_ud">Cód. Unidad Admin : </label>
			</td> -->
			
		<tr class="botonera-tour" id="botonera">
		<td align="center" colspan="2"><br>
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesSede"])) echo $_SESSION["opActDesSede"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" class="botoneranuevo-tour" title="Clic para Incluir una sede" name="inc" value="Incluir" onclick="General_sede(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar una sede" value="Consultar"  name="bus" onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" class="botoneraguardar-tour" title="Clic para Guardar una sede" value="Grabar" name="grab" onclick="General_sede(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" class="botoneramodificar-tour" title="Clic para Modificar una sede" value="Modificar"  name="mod" onclick="General_sede(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" class="botoneraactivar-tour" value="" name="sta" onclick="General_sede(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span title="Clic para activar la sede" id="act">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="Clic para desactivar la sede">Desactivar</span></button>		
			<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación"  value="Cancelar"   name="cancel" onclick="General_sede(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<!--<button type="button" title="Clic para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button>-->
			<script>
				frm = document.envio_form;
				
				if(frm.id_sede.value != ""){
					Encontrado_si();
					frm.nom_sed.style.cursor = "not-allowed";
					frm.cod_sed.style.cursor = "not-allowed";
					frm.comb_org.style.cursor="not-allowed";
					frm.comb_ciu.style.cursor="not-allowed";

					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
						}else{
							frm.mod.disabled = true;
							frm.mod.style.background = "#ccc";
							frm.mod.style.color = "#666666";
							frm.sta.value = "Activar";
							document.getElementById('des').style.display = "none";
							document.getElementById('iconos-2').style.display = "none";
							document.getElementById('act').style.display = "inline-block";
							document.getElementById('iconos-1').style.display = "inline-block";
						}
					}else{
						frm.sta.value = "Desactivar";
						document.getElementById('act').style.display = "none";
						document.getElementById('iconos-1').style.display = "none";
					}
				
				}else{
					Inicio_Deafault();
					
					frm.cod_sed.style.cursor="not-allowed";
					frm.nom_sed.style.cursor="not-allowed";
					
					frm.comb_ciu.style.cursor="not-allowed";
					frm.comb_org.style.cursor="not-allowed";

					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
				}
			</script>
		</td>
	</tr>
	</form>
</table>
<br>					
<!-- incluyo el mensajde de que los campos son obligatorios -->
	    <?php include_once("../sistema/camposObligatorios.php");?>
<!-- incluyo ventana modal -->
<?php include_once("../consultaModal/v_modal_sede.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar las Sedes de la organizaciòn
			<u>ejemplo:</u><br> Sede: Sub Delegaciòn Acarigua<br>
			El boton "Consultar" permite ver las sedes registradas hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Sede. </p>
		</td>
	</tr>
</table>

<?php
	}else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}
?>
