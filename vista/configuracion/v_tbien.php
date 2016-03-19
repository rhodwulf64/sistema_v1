<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador

	$_SESSION["operativa-vista"] = "tipo_bien"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../../modelo/seguridad/m_limpiar_variables_sessiones.php');

?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../../control/configuracion/c_tbien.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML = ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		
		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&tbien="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&tbien="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&tbien="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<table id="formulario_estilo_individual1">
	<form action="../../control/configuracion/c_tbien.php" method="POST" name="envio_form" id="formulario_estilo" autocomplete="off">
		<input type="hidden" name="ntbien" value="<?php if(isset($_SESSION['ntbien'])) echo $_SESSION['ntbien']; ?>">
		<caption class="tipobien-tour">Tipo de Bien Nacional <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-tipobien ayuda-local-frm ayudaguiada-tour"></span> <a style="color:#fff;" href="../pdf_link/Bienes nacionales/Tipo de Bien1.pdf" target="_black"><span id="ic-ayuda-frm" class="icon-question ayudapdf-tour" title="Clic para ver ayuda"></span></a></caption>
		 <tr>
		 	<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="codigo-tour">
				<label for="cod_tbien">Código:<span class="asterisco">*</span></label> <br>
				<input type="text" id="cod_tbien" class='CampoMov' title="Ingrese el código del tipo de bien" readonly="readonly" size="13" placeholder="Ingrese solo números" name="cod_tbien" value="<?php if(isset($_SESSION['cod_tbien'])) echo $_SESSION['cod_tbien']; ?>" onkeypress="return SoloNumeros(event)" />
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr> 
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="nombretipobien-tour">
				<label for="nom_tbien">Nombre del Tipo de Bien:<span class="asterisco">*</span></label><br>
				<input type="text" class='CampoMov' title="Ingrese el nombre del tipo de bien"readonly="readonly" onkeyup="cambio_mayus(this)" id="nom_tbien" placeholder="Ingrese solo letras" value="<?php if(isset($_SESSION['nom_tbien'])) echo $_SESSION['nom_tbien']; ?>" name="nom_tbien" onkeypress="return SoloLetras(event)" />
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="nombrecategoria-tour">
				<label for="nom_cat">Nombre de la Categoria:<span class="asterisco">*</span></label><br>
				<?php
					include_once('../../control/configuracion/c_categoria.php');
					$combOrg=array();
					$cod_cat="";
					if(isset($_SESSION['cod_cat_tb']))
					$cod_cat=$_SESSION['cod_cat_tb'];
						  
					$cboCat= DibCombCategoria($cod_cat);
						
					foreach ($cboCat as $elemento) 
						echo $elemento;		   
				?>
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<!-- </tr>
		<tr>
			<td align="right">
				<label for="nom_marca">Marca:&nbsp;</label>
			</td>
			<td>
			
			<?php
				/*include_once('../../control/configuracion/c_marca.php');
				$combMarca=array();
				$cod_Marca="";
				if(isset($_SESSION['cod_marca']))
				$cod_Marca=$_SESSION['cod_marca'];
						  
				$cboMarca= DibCombMarca($cod_Marca);
						
				foreach ($cboMarca as $elemento) 
					echo $elemento;		
					*/   
			?>
			<span class="asterisco">*</span>
			</td>
		</tr>
		<tr>
			<td align="right">
				<label for="nom_model">Modelo:&nbsp;</label>
			</td>
			<td>
				
			<?php
				/*include_once('../../control/configuracion/c_modelo.php');
				$combOrg=array();
				$cod_Model="";
				if(isset($_SESSION['cod_modelo']))
				$cod_Model=$_SESSION['cod_modelo'];
						  
				$cboModel= DibCombModelo($cod_Model);
						
				foreach ($cboModel as $elemento) 
					echo $elemento;		
					*/   
			?>
			<span class="asterisco">*</span>
			</td>
		</tr>-->
		<tr  id="botonera" class="botonera-tour">
			<td align="center" colspan="3"><br/>
				<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
				<input type="hidden" name="opActDees" value="<?php if(isset($_SESSION["opActDeesTipoBien"])) echo $_SESSION["opActDeesTipoBien"]; ?>">
				<input type="hidden" name="modificar" />
				<input type="hidden" name="op" />
				<input type="hidden" name="temp"/>

				<!-- Incluyo la botonera -->
				<button type="button" class="botoneranuevo-tour" title="Clic para Incluir un tipo de bien"name="inc" value="Incluir" onclick="General_tbien(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
				<button type="button" class="botoneraconsultar-tour" title="Clic para Consultar un tipo de bien"value="Consultar"  name="bus"    onclick="Listar()" ><span id="iconos" class="icon-search"></span>Consultar</button>
				<button type="button" class="botoneraguardar-tour" title="Clic para Guardar un tipo de bien"value="Grabar"     name="grab"   onclick="General_tbien(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
				<button type="button" class="botoneramodificar-tour" title="Clic para Modificar un tipo de bien"value="Modificar"  name="mod"    onclick="General_tbien(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
				<button type="button" class="botoneraactivar-tour" value="" name="sta"    onclick="General_tbien(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="Clic para activar el tipo de bien">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des"title="Clic para desactivar el tipo de bien">Desactivar</span></button>		
				<button type="button" class="botoneracancelar-tour" title="Clic para Cancelar la operación"value="Cancelar"   name="cancel" onclick="General_tbien(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>
				<!-- <button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button> -->
				<script>	
				frm = document.envio_form;
				var boton = document.getElementById('sta');
				if(frm.nom_tbien.value!=""){
					Encontrado_si();
					
					frm.nom_tbien.style.cursor = "not-allowed";
					frm.cod_tbien.style.cursor="not-allowed";
					frm.cod_cat.style.cursor="not-allowed";
				
					if(frm.opActDees.value != ""){
						if(frm.opActDees.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
							document.getElementById('nClave').style.display = "none";
						}else{
							frm.mod.disabled = true;
							frm.mod.style.background = "#ccc";
							frm.mod.style.color = "#666666";
							frm.sta.value = "Activar";
							document.getElementById('des').style.display = "none";
							document.getElementById('iconos-2').style.display = "none";
							document.getElementById('nClave').style.display = "none"
							document.getElementById('act').style.display = "inline-block";
							document.getElementById('iconos-1').style.display = "inline-block";
						}
					}else{
						frm.sta.value = "desactivar";
						document.getElementById('act').style.display = "none";
						document.getElementById('iconos-1').style.display = "none";
					}

				}else if(frm.NoEncon.value == "NO"){
					consultar();
				
					frm.nom_tbien.style.cursor = "not-allowed";
					frm.cod_cat.disabled=false;
					frm.cod_cat.style.cursor='pointer';
					frm.cod_cat.style.border = "1px solid #0F0FA6";
					frm.nom_tbien.readOnly = false;
					frm.nom_tbien.style.border = "1px solid #0F0FA6";	
					frm.nom_tbien.style.cursor = "pointer";
					frm.nom_tbien.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";	
				}else if(frm.NoEncon.value == "yesCed" || frm.NoEncon.value == "NotCed"){
					Act();
					
					frm.nom_tbien.readOnly = false;

					// cursor sobre el formulario
					
					frm.nom_tbien.style.cursor = "pointer";

					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
				}else{
					Inicio_Deafault();
					frm.cod_tbien.style.cursor="not-allowed";
					frm.nom_tbien.style.cursor = "not-allowed";
					frm.cod_cat.style.cursor="not-allowed";
				

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
<?php include_once("../consultaModal/v_modal_tbien.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar los Tipos de Bienes Nacionales.
			<u>ejemplo:</u><br> - Tipo de Bien: Computadores<br>
			El boton "Consultar" permite ver los Tipos de Bienes registrados hasta el momento.<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Tipo de Bien. </p>
		</td>
	</tr>
</table>

<?php
	}
	else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}
else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}
?>