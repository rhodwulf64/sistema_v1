$( ".element-sede" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".sede-tour",
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
			element: ".codigosede-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el codigo de la sede a registrar.",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".nombresede-tour",
			title: "Bienvenidos",
			content: "En este campo Ingresamos el nombre de la sede.",
			placement:"left",
      		duration:"20000"
		},	{
			element: ".nombreunidad-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el codigo de la unidad Administradora.",
			placement:"left",
      		duration:"20000"
		},
			{
			element: ".nombreparroquia-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el nombre la parroquia.",
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