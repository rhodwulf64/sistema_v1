

$( ".element-consultabienes" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".consulta-tour",
			title: "Bienvenidos",
			content: "Nombre del Formulario Seleccionado",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".periodo-tour",
			title: "Bienvenidos",
			content: "Nos Señala el periodo Actual en el que estamos trabajando",
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
			element: ".botoneraconsultar-tour",
			title: "Bienvenidos",
			content: "El boton Consultar hace la funcion de buscar los bienes. .",
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
			element: ".codigobien-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el codigo del bien para encontrar los bienes.",
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

	/************************************************/