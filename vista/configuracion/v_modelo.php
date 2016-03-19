<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ // posee el nivel de administrador
?>	
<table id="formulario">
	<form method="POST" action="../../control/configuracion/c_modelo.php" name="envio_form" id="formulario_estilo">
	<caption>Modelo<span id="ic-ayuda-frm" class="icon-question"></span></caption>
		<input type="hidden"  name="cod_modelo" value="<?php if(isset($_SESSION['cod_modelo'])) echo $_SESSION['cod_modelo'];?>" />
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>	
				<label for="nom_modelo">Modelo:<span class="asterisco">*</span></label><br>
				<input type="text"  title="Ingrese el nombre del modelo"readonly="readonly" onkeyup="cambio_mayus(this)" placeholder="Ingrese solo letras y carácteres" size="25" id="nom_modelo" name="nom_modelo" value="<?php if(isset($_SESSION['nom_modelo'])) echo $_SESSION['nom_modelo'];?>"  />
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
		<tr id="botonera">
		<td align="center" colspan="3"><br>
			<input type="hidden" name="NoEncon"  value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
			<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDes"])) echo $_SESSION["opActDes"]; ?>">
			<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
			<input type="hidden" name="modificar" >
			<input type="hidden" name="temp">
			<input type="hidden" name="op">

			<!-- Incluyo la botonera -->
			<button type="button" title="Click para Incluir un nuevo modelo"name="inc" value="Incluir" onclick="General_modelo(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>				
			<button type="button" title="Click para Consultar un modelo"value="Consultar"  name="bus"    onclick="General_modelo(this.value)" ><span id="iconos" class="icon-search"></span>Consultar</button>
			<button type="button" title="Click para Guardar un modelo"value="Grabar"     name="grab"   onclick="General_modelo(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
			<button type="button" title="Click para Modificar un modelo"value="Modificar"  name="mod"    onclick="General_modelo(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
			<button type="button" title="Click para Desactivar un modelo"value=""           name="sta"    onclick="General_modelo(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des">Desactivar</span></button>		
			<button type="button" title="Click para Cancelar la operaciòn"value="Cancelar"   name="cancel" onclick="General_modelo(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>			
			<button type="button" title="Click para Listar los datos" value="Listar" name="list" onclick="Listar()" disabled="disabled"><span id="iconos" class="icon-file-text"></span><span>Listar</span></button>
			<script>
				frm = document.envio_form;
				
				if(frm.cod_modelo.value!=""){
					Encontrado_si();
					frm.nom_modelo.style.cursor = "not-allowed";
				

					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
							document.getElementById('nClave').style.display = "none";
						}else{
							frm.sta.value = "Activar";
							document.getElementById('des').style.display = "none";
							document.getElementById('iconos-2').style.display = "none";
							document.getElementById('nClave').style.display = "none"
							document.getElementById('act').style.display = "inline-block";
							document.getElementById('iconos-1').style.display = "inline-block";
						}
					}else{
						frm.sta.value = "Desactivar";
						document.getElementById('act').style.display = "none";
						document.getElementById('iconos-1').style.display = "none";
						document.getElementById('nClave').style.display = "none";
					}
				
				}else if(frm.NoEncon.value == "NO"){
					consultar();
					
					frm.nom_modelo.style.cursor = "not-allowed";
					
					frm.nom_modelo.readOnly = false;
					frm.nom_modelo.style.border = "1px solid #0F0FA6";	
					frm.nom_modelo.style.cursor = "pointer";
					frm.nom_modelo.focus();
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
					document.getElementById('nClave').style.display = "none";	
				}else{
					Inicio_Deafault();
					
					frm.nom_modelo.style.cursor = "not-allowed";
					
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
					document.getElementById('nClave').style.display = "none";
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
	<?php include_once("../sistema/v_modal_buscar.php");?>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">mensaje de ayuda sobre la maestra mostrada ...</p>
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