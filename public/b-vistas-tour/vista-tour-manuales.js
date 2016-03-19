

$( ".element-manuales" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".manuales-tour",
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
			element: ".manualdeusuario-tour",
			title: "Bienvenidos",
			content: "En este campo podra observar en Archivo PDF el Manual de Usuario.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".manualdesistema-tour",
			title: "Bienvenidos",
			content: "En este campo podra observar en Archivo PDF el Manual de Sistema.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".manualnormasyprocedimientos-tour",
			title: "Bienvenidos",
			content: "En este campo podra observar en Archivo PDF el Manual de Normas y Procedimientos.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".manualdeinstalacion-tour",
			title: "Bienvenidos",
			content: "En este campo podra observar en Archivo PDF el Manual de Instalacion.",
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

