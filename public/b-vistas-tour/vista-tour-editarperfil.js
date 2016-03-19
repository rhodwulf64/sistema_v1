

$( ".element-editarperfil" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".perfil1-tour",
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
			element: ".cambiarclave-tour",
			title: "Bienvenidos",
			content: "En este campo podra cambiar su clave.",
			placement:"left",
      		duration:"20000"
		},


{			element: ".claveactual-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la clave actual.",
			placement:"left",
      		duration:"20000"
		},

		{
			element: ".nuevaclave-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la nueva clave.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".confirmarclave-tour",
			title: "Bienvenidos",
			content: "En este campo confirmamos la clave.",
			placement:"left",
      		duration:"20000"
		},
{
			element: ".botoneranuevo-tour",
			title: "Bienvenidos",
			content: "En este botton editamos todo.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneraguardar-tour",
			title: "Bienvenidos",
			content: "En este botton guardamos los cambios.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneracancelar-tour",
			title: "Bienvenidos",
			content: "En este botton cancelamos todo.",
			placement:"left",
      		duration:"20000"
		},

		{
			element: ".cambiarpreguntasdeseguridad-tour",
			title: "Bienvenidos",
			content: "En este campo podra cambiar sus preguntas de seguridad.",
			placement:"left",
      		duration:"20000"
		},




{			element: ".clavedeusuario-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la clave del usuario.",
			placement:"left",
      		duration:"20000"
		},

		{
			element: ".preg1-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la pregunta 1.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".resp1-tour",
			title: "Bienvenidos",
			content: "En este campo respondemos la respuesta 1.",
			placement:"left",
      		duration:"20000"
		},

		{
			element: ".preg2-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la pregunta 2",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".resp2-tour",
			title: "Bienvenidos",
			content: "En este campo respondemos la respuesta 2",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneranuevo1-tour",
			title: "Bienvenidos",
			content: "En este botton editamos todo.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneraguardar1-tour",
			title: "Bienvenidos",
			content: "En este botton guardamos los cambios.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneracancelar2-tour",
			title: "Bienvenidos",
			content: "En este botton cancelamos todo.",
			placement:"left",
      		duration:"20000"
		},



		{
			element: ".cambiarcorreo-tour",
			title: "Bienvenidos",
			content: "En este campo podra cambiar su correo electronico.",
			placement:"left",
      		duration:"20000"
		},


		{
			element: ".clavedeusuario1-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la clave actual.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".nuevocorreoelectronico-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el correo electronico nuevo.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneranuevo3-tour",
			title: "Bienvenidos",
			content: "En este botton editamos todo.",
			placement:"left",
      		duration:"20000"
		},

		{
			element: ".botoneraguardar3-tour",
			title: "Bienvenidos",
			content: "En este botton guardamos los cambios.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneracancelar3-tour",
			title: "Bienvenidos",
			content: "En este botton cancelamos todo.",
			placement:"left",
      		duration:"20000"
		},

		{
			element: ".cambiarnumerodetelefono-tour",
			title: "Bienvenidos",
			content: "En este campo podra cambiar su numero telefonico.",
			placement:"left",
      		duration:"20000"
		},
	{
			element: ".clavedeusuario3-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la clave actual.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".nuevonumerodetelefono-tour",
			title: "Bienvenidos",
			content: "En este campo ingregamos el nuevo numero de telefono.",
			placement:"left",
      		duration:"20000"
		},
{
			element: ".botoneranuevo4-tour",
			title: "Bienvenidos",
			content: "En este botton editamos todo.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneraguardar4-tour",
			title: "Bienvenidos",
			content: "En este botton guardamos los cambios.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".botoneracancelar4-tour",
			title: "Bienvenidos",
			content: "En este botton cancelamos todo.",
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


