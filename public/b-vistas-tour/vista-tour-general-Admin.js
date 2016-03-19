$( ".element-vis-admin" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".logo1-tour",
			title: "Bienvenidos",
			content: "Este es el logotipo de la Delegacion que tiene como titulo CICPC SUB DELEGACION ACARIGUA.",
			placement:"auto",
      		duration:"20000"
		},
		{
			element: ".titulo-tour",
			title: "Bienvenidos",
			content: "El titulo del la Sub Delegacion ACARIGUA.",
			placement:"auto",
      		duration:"20000"
		},
		{
			element: ".bienvenida-tour",
			title: "Bienvenidos",
			content: "Este mensaje da la bienvenida al Sistema.",
			placement:"auto",
      		duration:"20000"
		},
		{
			element: ".icono1-tour",
			title: "Bienvenidos",
			content: "Este icono hace la funcion de desplegar o desaparecer el Modulo de Sistema.",
			placement:"auto",
      		duration:"20000"
		},
		{
			element: ".modulo-tour",
			title: "Bienvenidos",
			content: "A nuestra izquierda encontramos el Modulo de Sistema con todos los procesos principales a realizar.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".inicio-tour",
			title: "Bienvenidos",
			content: "Pulsando aqui podemos regresar a la pantalla principal.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".organizativa-tour",
			title: "Bienvenidos",
			content: "La Estructura Organizativa se clasifica en Organismo, Sede, Departamento, Cargo y Personal.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".geografica-tour",
			title: "Bienvenidos",
			content: "La estructura Geografica se clasifica en Estado, Municipio y Parroquia.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".bienesnacionales-tour",
			title: "Bienvenidos",
			content: "Los Bienes Nacionales se clasifican por Configuración e Inventario.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".reportes-tour",
			title: "Bienvenidos",
			content: "Los reportes son clasficiados por cada proceso, Estructura Organizativa, Geografica, Bienes Nacionales y Seguridad.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".seguridad-tour",
			title: "Bienvenidos",
			content: "La Seguridad se clasifica en Tipo de Usuario, Usuario, Editar Perfil, Bitacora de Acceso y Sistema.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".ayuda-tour",
			title: "Bienvenidos",
			content: "La Ayuda se clasifica en Acerca de, Manuales y por ultimo Terminos y Condiciones.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".salir-tour",
			title: "Bienvenidos",
			content: "Esta ventana solo cierra la Sesion del Sistema.",
			placement:"right",
      		duration:"20000"
		},
		{
			element: ".perfil-tour",
			title: "Bienvenidos",
			content: "Aqui encontramos al Usuario o Responsable conectado pulsando aqui podemos Editar nuestro perfil modificando asi (Claves, Preguntas, Correo y Telefono.)",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".organismo-tour",
			title: "Bienvenidos",
			content: "Aqui encontramos al Usuario o Responsable conectado pulsando aqui podemos Editar nuestro perfil modificando asi (Claves, Preguntas, Correo y Telefono.)",
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