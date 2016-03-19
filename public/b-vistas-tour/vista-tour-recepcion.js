

$( ".element-recepcion" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".recepcion-tour",
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
			element: ".periodorecepcion-tour",
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
			element: ".numerodedocumento-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el numero de documento .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".fechadellegada-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la fecha de llegada del bien nacional .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".proveedor-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el proveedor que brindo el bien nacional.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".responsablerecepcion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el responsable de la recepcion del bien .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".motivorecepcion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el motivo por el cual recepcionamos el bien nacional .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".observacionrecepcion-tour",
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

function mostrarBienTour(){
	var submenu4 = document.getElementById('datos-entrada-bien4');
	var submenu5 = document.getElementById('datos-entrada-bien5');
	var submenu6 = document.getElementById('datos-entrada-bien6');
	//submenu.style.visibility = "visible";
	submenu4.style.visibility = "visible";
	submenu5.style.visibility = "visible";
	submenu6.style.visibility = "visible";

	submenu4.style.position = "relative";
	submenu5.style.position = "relative";
	submenu6.style.position = "relative";

	document.getElementById('iconos-recep-bien-men').style.display = "inline";
	document.getElementById('iconos-recep-bien-mas').style.display = "none";
	Cerrar();
}

//document.oncontextmenu = function(){ alert("disculpe por su seguridad y la nuestra esta funcionalidad a sido deshabilitada"); return false; }



$( ".element-recepcion2" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".recepcion2-tour",
			title: "Bienvenidos",
			content: "Nombre del Formulario Seleccionado",
			placement:"left",
      		duration:"20000"
		},

			{
			element: ".ayudapdf2-tour",
			title: "Bienvenidos",
			content: "Al hacer clic sobre el incono se mostrara un archivo PDF con una ayuda sobre el formulario seleccionado",
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
			element: ".codigotipobien-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el codigo del bien nacional .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".tipobien-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el tipo del bien .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".ubicacion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el almacen donde se va recepcionar .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".serial-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el serial del bien nacional .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".marca-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la marca del bien nacional .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".modelo-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el modelo del bien .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".precio-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos el precio del bien nacional .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".descripcion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos la descripcion del bien nacinal .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".observacion-tour",
			title: "Bienvenidos",
			content: "En este campo ingresamos una observacion del bien nacional .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".bottonagregar-tour",
			title: "Bienvenidos",
			content: "Este botton se activar cuando los campos necesarios esten llenos. .",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".recepciondetalle-tour",
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
		mostrarBienTour();
		
});
	//document.oncontextmenu = function(){ alert("disculpe por su seguridad y la nuestra esta funcionalidad a sido deshabilitada"); return false; }

	/************************************************/