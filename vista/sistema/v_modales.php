
<div class="ventana">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está Seguro de Salir del Sistema?</span><br>
		<input type="button" id="si" name="desac" onclick="confirm_logout(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="confirm_logout(this.value)" value="No">
	</div>
</div>

<div class="ventanaSalir2">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está Seguro de Salir del Sistema?</span><br>
		<input type="button" id="si" name="desac" onclick="confirm_logout2(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="confirm_logout2(this.value)" value="No">
	</div>
</div>

<div class="ventana2">
	<div class="msj-confirmar2">
		<span id="id-msj">BIENVENIDO <?php if(isset($_SESSION["nom_perfil_login"])) echo $_SESSION["nom_perfil_login"].", ";echo $_SESSION['nom']." ".$_SESSION['ape']?></span><br>
		<input type="button" id="si" onkeypress="if (event.keyCode == 13) closeVentana2()" onclick="closeVentana2()" value="Aceptar">	
	</div>
</div>

<div class="ventana3">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de guardar estos datos?</span><br>
		<input type="button" id="si" name="desac" onclick="guardado(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="guardado(this.value)" value="No">
	</div>
</div>

<div class="ventana4">
	<div class="msj-confirmar">
		<span id="id-msj">Registro Exitoso</span><br>
		<input type="button" id="si" onclick="closeVentana4()" value="Aceptar">	
	</div>
</div>

<div class="ventana5">
	<div class="msj-confirmar">
		<span id="id-msj">Registro no Encontrado</span><br>
		<input type="button" id="si" onclick="closeVentana5()" value="Aceptar">	
	</div>
</div>

<div class="ventana6">
	<div class="msj-confirmar">
		<span id="id-msj">Los Datos ya se Encuentran Registrados</span><br>
		<input type="button" id="si" onclick="closeVentana6()" value="Aceptar">	
	</div>
</div>

<div class="ventana7">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de desactivar estos datos?</span><br>
		<input type="button" id="si" name="desac" onclick="desactivar(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="desactivar(this.value)" value="No">
	</div>
</div>

<div class="ventana8">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de activar estos datos?</span><br>
		<input type="button" id="si" name="desac" onclick="activar(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="activar(this.value)" value="No">
	</div>
</div>

<div class="ventana9">
	<div class="msj-confirmar">
		<span id="id-msj">Registro Desactivado con Éxito</span><br>
		<input type="button" id="si" onclick="closeVentana9()" value="Aceptar">	
	</div>
</div>

<div class="ventana10">
	<div class="msj-confirmar">
		<span id="id-msj">Registro Activado con Éxito</span><br>
		<input type="button" id="si" onclick="closeVentana10()" value="Aceptar">	
	</div>
</div>

<div class="ventana11">
	<div class="msj-confirmar">
		<span id="id-msj">Registro Modificado Con Éxito</span><br>
		<input type="button" id="si" onclick="closeVentana11()" value="Aceptar">	
	</div>
</div>
<div class="ventana12">
	<div class="msj-confirmar">
		<span id="id-msj">Este Registro ya Existe</span><br>
		<input type="button" id="si" onclick="closeVentana12()" value="Aceptar">	
	</div>
</div>
<div class="ventana13">
	<div class="msj-confirmar">
		<span id="id-msj">El registro no puede ser desactivado porque está siendo utilizado</span><br>
		<input type="button" id="si" onclick="closeVentana13()" value="Aceptar">	
	</div>
</div>
<!-- *********** Modales para el Módulo de Editar Perfil ************ -->
<div class="ventana14">
	<div class="msj-confirmar">
		<span id="id-msj">Su Clave de Usuario es Incorrecta</span><br>
		<input type="button" id="si" onclick="closeVentana14()" value="Aceptar">	
	</div>
</div>
<div class="ventana15">
	<div class="msj-confirmar">
		<span id="id-msj">Su Clave ha sido Modificada</span><br>
		<input type="button" id="si" onclick="closeVentana15()" value="Aceptar">	
	</div>
</div>
<div class="ventana16">
	<div class="msj-confirmar">
		<span id="id-msj">Su clave no puede ser igual a la anterior</span><br>
		<input type="button" id="si" onclick="closeVentana16()" value="Aceptar">	
	</div>
</div>
<div class="ventana17">
	<div class="msj-confirmar">
		<span id="id-msj">Su clave no puede ser igual a la actual</span><br>
		<input type="button" id="si" onclick="closeVentana17()" value="Aceptar">	
	</div>
</div>
<div class="ventana18">
	<div class="msj-confirmar">
		<span id="id-msj">Las preguntas fueron Modificadas</span><br>
		<input type="button" id="si" onclick="closeVentana18()" value="Aceptar">	
	</div>
</div>
<!--  Bloque y desbloqueo de usuarios -->

<div class="ventana19">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de Bloquear este Usuario?</span><br>
		<input type="button" id="si" onclick="bloquear(this.value)" value="Si">	
		<input type="button" id="no" onclick="bloquear(this.value)" value="No">
	</div>
</div>
<div class="ventana20">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de Desbloquear este Usuario?</span><br>
		<input type="button" id="si" onclick="desbloquear(this.value)" value="Si">	
		<input type="button" id="no" onclick="desbloquear(this.value)" value="No">
	</div>
</div>
<div class="ventana21">
	<div class="msj-confirmar">
		<span id="id-msj">El Usuario ha sido Desbloqueado con Éxito</span><br>
		<input type="button" id="si" onclick="closeVentana21()" value="Aceptar">	
	</div>
</div>
<div class="ventana22">
	<div class="msj-confirmar">
		<span id="id-msj">El Usuario ha sido Bloqueado con Éxito</span><br>
		<input type="button" id="si" onclick="closeVentana22()" value="Aceptar">	
	</div>
</div>
<div class="ventana23">
	<div class="msj-confirmar">
		<span id="id-msj">El Correo fue Modificado</span><br>
		<input type="button" id="si" onclick="closeVentana23()" value="Aceptar">	
	</div>
</div>
<div class="ventana24">
	<div class="msj-confirmar">
		<span id="id-msj">El Número de Teléfono fué Modificado</span><br>
		<input type="button" id="si" onclick="closeVentana24()" value="Aceptar">	
	</div>
</div>
<div class="ventana25">
	<div class="msj-confirmar">
		<span id="id-msj">El período actual se encuentra en vigencia</span><br>
		<input type="button" id="si" onclick="closeVentana25()" value="Aceptar">	
	</div>
</div>
<div class="ventana26">
	<div class="msj-confirmar">
		<span id="id-msj">Período cerrado con Éxito, deberá de cerrar sesion para guardar los cambios</span><br>
		<input type="button" id="si" onclick="closeVentana15()" value="Aceptar">	
	</div>
</div>
<div class="ventana27">
	<div class="msj-confirmar">
		<span id="id-msj">No hay período abierto</span><br>
		<input type="button" title="Clic para abrir un período" id="si" name="desac" onclick="location.href='v_Perfil_Admin.php?accion=abrir_periodo'" value="Abrir Período">	
		<input type="button" title="Clic para cerrar la ventana" id="no" name="desac" onclick="closeVentana27()" value="Cancelar">	
	</div>
</div>
<div class="ventana28">
	<div class="msj-confirmar">
		<span id="id-msj">Período abierto con Éxito, deberá de cerrar sesion para guardar los cambios</span><br>
		<input type="button" id="si" onclick="closeVentana15()" value="Aceptar">	
	</div>
</div>
<div class="ventana29">
	<div class="msj-confirmar">
		<span id="id-msj">No hay período creado</span><br>
		<input type="button" title="Clic para crear un período" id="si" name="desac" onclick="location.href='v_Perfil_Admin.php?accion=periodo'" value="Crear Período">	
		<input type="button" title="Clic para cerrar la ventana" id="no" name="desac" onclick="closeVentana29()" value="Cancelar">	
	</div>
</div>
<div class="ventana30">
	<div class="msj-confirmar">
		<span id="id-msj">Ya se encuentra un período abierto deberá de cerrarlo primero</span><br>
		<input type="button" title="Clic para cerrar un período" id="si" name="desac" onclick="location.href='v_Perfil_Admin.php?accion=cerrar_periodo'" value="Cerrar Período">	
		<input type="button" title="Clic para cerrar la ventana" id="no" name="desac" onclick="closeVentana30()" value="Cancelar">	
	</div>
</div>
<div class="ventana31">
	<div class="msj-confirmar">
		<span id="id-msj">Período creado con Éxito, ¿Desea abrirlo?</span><br>
		<input type="button" title="Clic para abrir un período" id="si" name="desac" onclick="location.href='v_Perfil_Admin.php?accion=abrir_periodo'" value="Abrir Período">	
		<input type="button" title="Clic para cerrar la ventana" id="no" name="desac" onclick="closeVentana31()" value="Cancelar">	
	</div>
</div>

<!-- modal condicion del bien nacional -->
<div class="ModalCondicion" id="ModalCondicion">
	<div class="estilos-ModalCondicion" id="idDAtosAJaxDetalle">			
		<!-- datos desde ajax -->
	</div>
</div>

<!-- modal condicion del bien nacional -->
<div class="ModalCondicionbienMov" id="ModalCondicionbienMov">
	<div class="estilos-ModalCondicion" id="idDAtosAJaxDetalleConsulMov">			
		<!-- datos desde ajax -->
	</div>
</div>

<div class="ventana32">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de Anular ésta Recepción?</span><br>
		<input type="button" id="si" name="desac" onclick="anular(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="anular(this.value)" value="No">
	</div>
</div> 

<div class="ventanaAnularAsig">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de Anular ésta Asignación?</span><br>
		<input type="button" id="si" name="desac" onclick="anularAsig(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="anularAsig(this.value)" value="No">
	</div>
</div> 

<div class="ventanaAnulardesin">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de Anular ésta Desincorporación?</span><br>
		<input type="button" id="si" name="desac" onclick="anularDesin(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="anularDesin(this.value)" value="No">
	</div>
</div> 

<div class="ventanaAnulardevol">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de Anular ésta Devolución?</span><br>
		<input type="button" id="si" name="desac" onclick="anularDevol(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="anularDevol(this.value)" value="No">
	</div>
</div> 

<div class="ventana33">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de quitar éste Bien Nacional de la lista?</span><br>
		<input type="hidden" name="guardarNodoPadre" id="guardarNodoPadre">
		<input type="button" id="si" name="nodoPadreModal" onclick="QuitarONoBien(this.value)" value="Si">	
		<input type="button" id="no" name="nodoPadreModal" onclick="QuitarONoBien(this.value)" value="No">
	</div>
</div> 

<div class="ventana34">
	<div class="msj-confirmar">
		<span id="id-msj">Recepción Realizada con Éxito. N° <?php if(isset($_SESSION['nroRecepAutoincremental'])) echo $_SESSION['nroRecepAutoincremental']; ?></span><br>
		<input type="button" id="si" onclick="closeVentana34()" value="Aceptar">	
	</div>
</div>

<div class="DesincorFinalizada">
	<div class="msj-confirmar">
		<span id="id-msj">Desincorporación Realizada con Éxito. N° <?php if(isset($_SESSION['nroDesAutoincremental'])) echo $_SESSION['nroDesAutoincremental']; ?></span><br>
		<input type="button" id="si" onclick="closeVentanaDesincorFinalizada()" value="Aceptar">	
	</div>
</div>
<div class="DevolcuionFinalizada">
	<div class="msj-confirmar">
		<span id="id-msj">Devolución Realizada con Éxito. N° <?php if(isset($_SESSION['nroDevAutoincremental'])) echo $_SESSION['nroDevAutoincremental']; ?></span><br>
		<input type="button" id="si" onclick="closeVentanaDevolcorFinalizada()" value="Aceptar">	
	</div>
</div>
<div class="VentanaModalAsig">
	<div class="msj-confirmar">
		<span id="id-msj">Asignación Realizada con Éxito. N° <?php if(isset($_SESSION['nroAsigAutoincremental'])) echo $_SESSION['nroAsigAutoincremental']; ?></span><br>
		<input type="button" id="si" onclick="closeVentanaModalAsig()" value="Aceptar">	
	</div>
</div>

<div class="ventana35">
	<div class="msj-confirmar">
		<span id="id-msj">Recepción Fallida</span><br>
		<input type="button" id="si" onclick="closeVentana35()" value="Aceptar">	
	</div>
</div>

<div class="ventana36">
	<div class="msj-confirmar">
		<span id="id-msj">La Recepción Fué anulada con Éxito</span><br>
		<input type="button" id="si" onclick="closeVentana36()" value="Aceptar">	
	</div>
</div>

<div class="ventana37">
	<div class="msj-confirmar">
		<span id="id-msj">Anulación de Recepción Fallida</span><br>
		<input type="button" id="si" onclick="closeVentana37()" value="Aceptar">	
	</div>
</div>

<div class="ventana38">
	<div class="msj-confirmar">
		<span id="id-msj">¿Está seguro de agregar los Bien Nacional seleccionados?</span><br>
		<input type="button" id="si" name="desac" onclick="ModalConfirmAgrAsigColse(),agregar()" value="Si">	
		<input type="button" id="no" name="desac" onclick="ModalConfirmAgrAsigColse()" value="No">
	</div>
</div> 

<div class="ventanaConfirmRecep">
	<div class="msj-confirmar">
		<span id="id-msj">¿Desea conservar los datos anteriores?</span><br>
		<input type="button" id="si" name="desac" onclick="LimpiarSiNoRecep(this.value)" value="Si">	
		<input type="button" id="no" name="desac" onclick="LimpiarSiNoRecep(this.value)" value="No">
	</div>
</div> 

<div class="VentaVlidarMas">
	<div class="msj-confirmar">
		<span id="id-msj">Disculpe, debe de hacer clic en el boton nuevo.</span><br>	
	</div>
</div>
<!--   ************ libreria ************ -->
<div class="SoloMsjGeneralLibreria">
	<div class="msj-confirmar">
		<span id="id-msj"></span><br>	
	</div>
</div>
<!-- ************************************ -->

<div class="ModalSesionIniciada">
	<div class="estilos-ModalTipoAnulacion">
		<!--<span class='btn-quitar-modal' title="clic para cerrar la ventana" onclick="CloseModalTipoAnulacion()">X</span>-->
		<table>
			<caption>disculpe ya uste tiene una sesion iniciada</caption>
			<tr>
				<td> 
					cancelando ...
				</td>
			</tr>
		</table>
	</div>
</div>

<?php  

	if(isset($_SESSION['nroDevAutoincremental'])){
		unset($_SESSION['nroDevAutoincremental']);
	}

?>