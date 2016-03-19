
$( ".element-acercade" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".sistema1-tour",
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
			element: ".acercade-tour",
			title: "Bienvenidos",
			content: "Este campo es la maestra seleccionada.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".nombredelsoftware-tour",
			title: "Bienvenidos",
			content: "En este campo observamos el nombre completo del Software.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".versiondelsoftware-tour",
			title: "Bienvenidos",
			content: "En este campo observamos la version actual del Sistema",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".desarrolladores-tour",
			title: "Bienvenidos",
			content: "En este campo podemos ver los desarrolladores existentes del sistema.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".robertoolomos-tour",
			title: "Bienvenidos",
			content: "Haciendo clic en este campo observaremos la funcion que ejercio en el sistema e informacion completa de Roberto Olmos.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".danielgudino-tour",
			title: "Bienvenidos",
			content: "Haciendo clic en este campo observaremos la funcion que ejercio en el sistema e informacion completa de Daniel Gudiño.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".nestorinfante-tour",
			title: "Bienvenidos",
			content: "Haciendo clic en este campo observaremos la funcion que ejercio en el sistema e informacion completa de Nestor Infante.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".oscarmendez-tour",
			title: "Bienvenidos",
			content: "Haciendo clic en este campo observaremos la funcion que ejercio en el sistema e informacion completa de Oscar Mendez.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".jesuspirela-tour",
			title: "Bienvenidos",
			content: "Haciendo clic en este campo observaremos la funcion que ejercio en el sistema e informacion completa de Jesus Pirela.",
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

