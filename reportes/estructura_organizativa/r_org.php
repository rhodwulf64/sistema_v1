<link rel="stylesheet" type="text/css" href="../../public/style.css">

<form method="POST" action="../../control/c_reportes/c_org.php" name="form_general">
<table id="btn-home-table">

	<tr>
		<td>
		<h2 class="filtrarreporte-tour">Filtrar Reporte de Organismo <span title="Clic para ver ayuda guiada"class="icon-magic-wand element2 ayuda-local-frm ayudaguiada-tour"></span> </h2><br>
		<span id="tReport" class="tiporeporte-tour">Tipo de Reporte: <input type="radio" name="tr" checked="checked" /> PDF <input type="radio" name="tr" /> EXCEL </span>
		<br>
		<input type="hidden" name="temp"> <!--variable oculta para envio -->
		<span id="filtrado" class="estatusreporte-tour">Estatus: <input type="checkbox" onclick="validar_check_reportes(this.value)" name="est1" value="1" id="est1"/> Activo <input type="checkbox" id="est1" onclick="validar_check_reportes(this.value)" name="est1" value="0" /> Inactivo </span><br>
		<input type="text" name="nom" onkeypress="return SoloLetras(event)" onblur="cambio_mayus(this)" placeholder="ingrese solo Letras" />
		<button type='button' name="env" id="btn-unico" title="Clic para generar el reporte" onclick="document.form_general.target='_blank';envio_filtro(this.value)"  value='todoPdf'  class="buscarreporte-tour">Reporte</button>
		</td>
	</tr>
</table>
</form>


<table>
	<tr>
		<td>
			<p id="mesaje-descrip-maestra">Nota: en la caja de texto ingrese el nombre del Organismo, la busqueda puede ser por aproximidad. Ejemplo: p, pa, pae ... paez. </p>
		</td>
	</tr>
</table>



<script type="text/javascript">

		/*$('.element').click(function(){
			tour.start();
		});*/

$( ".element2" ).click(function() {
	var tour = new Tour({
		steps: [
		{
			element: ".filtrarreporte-tour",
			title: "Bienvenidos",
			content: "En este campo vamos a buscar un Reporte",
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
			element: ".tiporeporte-tour",
			title: "Bienvenidos",
			content: "En este campo podra espesificar que tipo de reporte desea imprimir, EXCEL o PDF.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".estatusreporte-tour",
			title: "Bienvenidos",
			content: "En este campo podra buscar detalladamente si solo necesitamos reportes Activos o Inactivos.",
			placement:"left",
      		duration:"20000"
		},
		{
			element: ".buscarreporte-tour",
			title: "Bienvenidos",
			content: "Hacemos clic en este Botton para buscar el resporte.",
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
</script>
