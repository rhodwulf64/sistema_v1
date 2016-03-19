
	<?php @session_start();?>
<span id="spanSede">
<form method="POST" action="../../control/seguridad/c_sistema.php" name="envio_form_sede" >
	<table id="formulario" >
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td>
				<span id="frm-perfil-titulo">Asignar Sede al Sistema</span>
			</td>
			<?php
				if(isset($datos_sistema['nom_sed']) && $datos_sistema['nom_sed']==""){
					echo "<td><span style='background:red;color:white; padding:5px;border-radius:4px;' class='espacio-frm-unico-campo-Izquierdo'>No Hay Sede Asignada</span></td>";
				}else{

					echo "<td><span class='espacio-frm-unico-campo-Izquierdo'>Sede Actual: ".@$datos_sistema['nom_sed']."</span></td>";
				}

			?>
			
			
		</tr>
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td class="sede-tour">
				<label for="cod_tbien">Sede:<span class="asterisco">*</span></label><br>
					<?php
					include_once('../../control/configuracion/combos/c_combo_sed.php');
					
					$cboSede = array();
					
					if(isset($_SESSION['cod_sed_s'])){
						$codSede = $_SESSION['cod_sed_s'];
					}else{
						$codSede = "";
					}
					
					$cboSede = PintaSede_sistema($codSede);
						
					foreach ($cboSede as $elementos){
						echo $elementos;   
					}
				?>
			</td>
			<td class="abreviaturasede-tour">
				<label for="abrev_sed" style="margin-left:20px;">Abreviatura de la Sede:<span class="asterisco">*</span></label><br>
				<input type="text" readonly="readonly" onblur="cambio_mayus(this)" value="<?php if(isset($_SESSION['abrev_int'])) echo $_SESSION['abrev_int'];?>" name="abrev_sed" style="margin-left:20px;width:80%;" id="abrev_sed"  placeholder="ejemplo CICPC" />
			</td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
	
		<tr>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td><span class="espacio-frm-unico-campo-derecho"></span></td>
			<td align="center" colspan="2">
			<input type="hidden" name="d_abrev_sed"  value="<?php if(isset($_SESSION['abrev_int'])) echo $_SESSION['abrev_int'];?>"/>
			<input type="hidden" name="d_cod_sed"    value="<?php if(isset($_SESSION['cod_sed_s'])) echo $_SESSION['cod_sed_s'];?>"/>
			<button  id="botonera2" class="botoneranuevo-tour" title="Clic para editar la sede" type="button" name="edit" value="Incluir" onclick="botoneraPersonalizada5(this.name)"><span id="iconos" class="icon-pencil"></span><span>Editar</span></button>
			<button  disabled="disabled" id="botonera2" class="botoneraguardar-tour" title="Clic para guardar la sede" type="button" name="guardar" value="Incluir" onclick="guardar_sede()"><span  id="iconos" class="icon-file-empty"></span><span>Guardar</span></button>				
			<button disabled="disabled" id="botonera2" class="botoneracancelar-tour" title="Clic para cancelar la operación" type="button" value="Consultar"  name="cancel"    onclick="botoneraPersonalizada5(this.name)" ><span id="iconos" class="icon-cross"></span>Cancelar</button>
			</td>
			
			<td><span class="espacio-frm-unico-campo-Izquierdo"></span></td>
		</tr>
</table>
</form>
<br>					
<!-- incluyo el mensajde de que los campos son obligatorios -->
	<table class="msj-asterisco">
		<tr>
			<td> 
				<span class="msj">Los Campos Con <span class="asterisco-1">*</span>Son Obligatorios<span>
			</td>
		</tr>
	</table>
<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">En este formulario podra configurar la Sede donde se usara el sistema
			<br>
			El Boton ayuda le facilita la descripciòn de cada operacion para el formulario Sistema. </p>
		</td>
	</tr>
</table>
</span>
<script type="text/javascript">
	var frm=document.envio_form_sede;
	frm.edit.style.background = "#023859";
	frm.edit.style.color = "#fff";
	frm.cancel.style.background = "#ccc";
	frm.cancel.style.color = "#666666";
	frm.guardar.style.background = "#ccc";
	frm.guardar.style.color = "#666666";

	frm.abrev_sed.style.cursor="not-allowed";
	frm.cod_sed.style.cursor="not-allowed";

</script>