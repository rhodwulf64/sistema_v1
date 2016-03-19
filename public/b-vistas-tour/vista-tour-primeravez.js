

$( ".element-primeravez" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".datosseguridad-tour",
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
			content: "El boton regresamos a los Terminos y Condiciones .",
			placement:"left",
      		duration:"20000"
		},

			{
			element: ".botoneraguardar-tour",
			title: "Bienvenidos",
			content: "El boton Guardar tiene la funcion de terminar y registra los procesos",
			placement:"left",
      		duration:"20000"
		},	
			
			{
			element: ".nuevaclave-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la clave nueva .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".confirmarclave-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la confirmacion de la clave .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".preg1-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la pregunta 1 .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".resp1-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la respuesta 1 .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".preg2-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la pregunta 2 .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".resp2-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la repuesta 2.",
			placement:"left",
      		duration:"20000"
		},
		
	

		
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

	/************************************************/