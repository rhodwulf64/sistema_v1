

$( ".element-usuario" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".usuario-tour",
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
			element: ".asignarusuario-tour",
			title: "Bienvenidos",
			content: "En este campo nos despliega una vista donde vamos asigar cada usuario.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".bloquearusuario-tour",
			title: "Bienvenidos",
			content: "En este campo nos muestra los usuarios que han sido bloqueados.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".desbloquearusuario-tour",
			title: "Bienvenidos",
			content: "En este campo nos muestra los usuarios que han sido desbloqueados.",
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
