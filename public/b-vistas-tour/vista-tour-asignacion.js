function MostrarBienTourAsig(){
	var submenu4 = document.getElementById('datos-entrada-bien4');

				//submenu.style.visibility = "visible";
				submenu4.style.visibility = "visible";
				submenu4.style.position = "relative";
	
				document.getElementById('iconos-recep-bien-men').style.display = "inline";
				document.getElementById('iconos-recep-bien-mas').style.display = "none";
				Cerrar();
			 }

$( ".element-asignacion" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".asignacion-tour",
			title: "Bienvenidos",
			content: "Nombre del Formulario Seleccionado",
			placement:"left",
      		duration:"20000"
		},

			{
			element: ".ayudapdf-tour",
			title: "Bienvenidos",
			content: "Al hacer clic sobre el incono se mostrara un archivo PDF con una ayuda sobre el formulario seleccionado",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".ayudaguiada-tour",
			title: "Bienvenidos",
			content: "Al hacer clic aqui se activa el Tour de Ayuda Guiada.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".periodoasignacion-tour",
			title: "Bienvenidos",
			content: "En este campo observamos el periodo en el que estamos trabajando actualmente .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botonera-tour",
			title: "Bienvenidos",
			content: "El boton Nuevo - Consultar - Guardar - Modificar - Desactivar - Cancelar .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneranuevo-tour",
			title: "Bienvenidos",
			content: "El boton Nuevo funciona para habilitar todas las cajas de texto para procesar .",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneraconsultar-tour",
			title: "Bienvenidos",
			content: "El boton Consultar hace la funcion de buscar los registros guardados .",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneraguardar-tour",
			title: "Bienvenidos",
			content: "El boton Guardar tiene la funcion de terminar y registra los procesos",
			placement:"left",
      		duration:"20000"
		},	{
			element: ".botoneramodificar-tour",
			title: "Bienvenidos",
			content: "El boton Modificar hablitar las cajas de textos para correjir algun fallo registrado",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneradesactivar-tour",
			title: "Bienvenidos",
			content: "El boton Anular tiene como funcion de aplicar el efecto sobre la recepcion.",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneraactivar-tour",
			title: "Bienvenidos",
			content: "El boton Activar tiene como funcion de revertir los registros Desactivados .",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneracancelar-tour",
			title: "Bienvenidos",
			content: "Este boton cancela toda la operacion.",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".numeroasignacion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el numero de asignacion.",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".responsableasignacion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el responsable de la asignacion.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".departamentoasignacion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la el departamento donde vamos asignar.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".responsabledepartamento-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el resposable de ese departamento.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".fechaasignacion-tour",
			title: "Bienvenidos",
			content: "En este campo la fecha de la asignacion .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".motivoasignacion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el motivo por el cual asignamos el bien nacional .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".observacionasignacion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos observaciones del bien nacional .",
			placement:"left",
      		duration:"20000"
		}
		
	

		
		],
		backdrop: true,
		storage: false,
		animation:true,
		template: "<div class='popover tour' style='background-color:#D6D6D6'> \
		<div class='arrow'></div> \
		<h3 class='popover-title' style='background-color:#D6D6D6'></h3> \
		<div class='popover-content'></div> \
		<div class='popover-navigation'> \
		<button class='btn btn-default' data-role='prev'>« Ant.</button> \
		<span data-role='separator'>|</span> \
		<button class='btn btn-default' data-role='next'>Sig. »</button> \
		<button class='btn btn-primary' data-role='end'>Cerrar</button> \
		</div> \
		</div>",
	});
		// Initialize the tour
		tour.init();
		// Start the tour
		tour.start();

		
});
	//document.oncontextmenu = function(){ alert("disculpe por su seguridad y la nuestra esta funcionalidad a sido deshabilitada"); return false; }


$( ".element-asignacion2" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".asignacion2-tour",
			title: "Bienvenidos",
			content: "Nombre del Formulario Seleccionado",
			placement:"left",
      		duration:"20000"
		},

		{
			element: ".ayudaguiada2-tour",
			title: "Bienvenidos",
			content: "Al hacer clic aqui se activa el Tour de Ayuda Guiada.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botonera-tour",
			title: "Bienvenidos",
			content: "El boton Nuevo - Consultar - Guardar - Modificar - Desactivar - Cancelar .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneranuevo-tour",
			title: "Bienvenidos",
			content: "El boton Nuevo funciona para habilitar todas las cajas de texto para procesar .",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneraconsultar-tour",
			title: "Bienvenidos",
			content: "El boton Consultar hace la funcion de buscar los registros guardados .",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneraguardar-tour",
			title: "Bienvenidos",
			content: "El boton Guardar tiene la funcion de terminar y registra los procesos",
			placement:"left",
      		duration:"20000"
		},	{
			element: ".botoneramodificar-tour",
			title: "Bienvenidos",
			content: "El boton Modificar hablitar las cajas de textos para correjir algun fallo registrado",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneradesactivar-tour",
			title: "Bienvenidos",
			content: "El boton Desactivar tiene como funcion de revertir los registros activados .",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneraactivar-tour",
			title: "Bienvenidos",
			content: "El boton Anular tiene como funcion de aplicar el efecto sobre la recepcion.",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".botoneracancelar-tour",
			title: "Bienvenidos",
			content: "Este boton cancela toda la operacion.",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".biennacionalesdisponibles-tour",
			title: "Bienvenidos",
			content: "En este boton consultaremos los bienes nacionales existentes. .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".asignaciondetalle-tour",
			title: "Bienvenidos",
			content: "En este campo observamos todos los bienes nacinales agregados para recepcionar .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".todoslosdetalles-tour",
			title: "Bienvenidos",
			content: "En este campo observamos todos los registrados hasta ahora .",
			placement:"left",
      		duration:"20000"
		}
		
		
		
	

		
		],
		backdrop: true,
		storage: false,
		animation:true,
		template: "<div class='popover tour' style='background-color:#D6D6D6'> \
		<div class='arrow'></div> \
		<h3 class='popover-title' style='background-color:#D6D6D6'></h3> \
		<div class='popover-content'></div> \
		<div class='popover-navigation'> \
		<button class='btn btn-default' data-role='prev'>« Ant.</button> \
		<span data-role='separator'>|</span> \
		<button class='btn btn-default' data-role='next'>Sig. »</button> \
		<button class='btn btn-primary' data-role='end'>Cerrar</button> \
		</div> \
		</div>",
	});
		// Initialize the tour
		tour.init();
		// Start the tour
		tour.start();
		MostrarBienTourAsig();
		
});
	//document.oncontextmenu = function(){ alert("disculpe por su seguridad y la nuestra esta funcionalidad a sido deshabilitada"); return false; }

	/************************************************/