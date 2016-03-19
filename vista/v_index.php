<?php @session_start();
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED); // opcional. 

	if (isset($_SESSION['nivel'])){
		if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
			header("location: vista/protegidas/v_Perfil_Admin.php");
		}
	}
	include_once('modelo/configuracion/m_sistema.php');
	include_once('modelo/seguridad/sacarHoraFechaServer.php');
	$obj_sistema = new clsSistema();
	$datos_sistema = $obj_sistema->mostrarDatos();
	$_SESSION['vision_int']=$datos_sistema["vision"];
	$_SESSION['mision_int']=$datos_sistema["mision"];
	$_SESSION['quienes_somos_int']=$datos_sistema["quienes_somos"];
	$_SESSION['obj_gene_int']=$datos_sistema["obj_general"];
	$_SESSION['obj_esp_int']=$datos_sistema["obj_especifico"];
	//$_SESSION['cod_sed_int']=$datos_sistema["id_sed"];
	//$_SESSION['nom_sed_int']="";
	$_SESSION['abrev_int']=$datos_sistema["abreviatura_sede"];
	$_SESSION['tlf_int']=$datos_sistema["telefono"];
	$_SESSION['rif_int']=$datos_sistema["rif"];
	$_SESSION['direccion_int']=$datos_sistema["direccion"];
	$_SESSION['correo_int']=$datos_sistema["correo"];


	if(!empty($_GET['accion'])){
		$accion = $_GET['accion'];
	}else{
		$accion = "vista/sistema/v_inicio.php";
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido Al CICPC Sub Delegación Acarigua</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="public/css/home_page.css"> 
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<link rel="shortcut icon" href="public/img/favicon/favicon_cicpc.ico"/>
	<link rel="stylesheet" type="text/css" href="public/css/ventanas_modales.css">
	<link rel="stylesheet" type="text/css" href="public/css/formularioYBotonera.css">
	<link rel="stylesheet" type="text/css" href="public/css/msj_iconos.css">
	<link rel="stylesheet" type="text/css" href="public/css/sistema.css">
	<link rel="stylesheet" type="text/css" href="public/css/header.css">
	<!-- <link rel="stylesheet" type="text/css" href="public/css/slide.css"> -->
	<link rel="stylesheet" type="text/css" href="public/css/media_screen.css">
	<link rel="stylesheet" type="text/css" href="public/css/footer.css">
	
	<script type="text/javascript" src="public/js/jquery/jquery-2.1.3.min.js"></script>
	<!-- <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'></script>-->
	<script type="text/javascript" src="public/js/libreria.js"></script>
	<script type="text/javascript" src="public/js/validar_L_N.js"></script>
	<script type="text/javascript" src="public/js/acceso.js"></script>
	<!--<script type="text/javascript" src="public/js/jquery/seleccionMenu.js"></script>-->
	<!--<script type="text/javascript" src="public/js/slide.js"></script>-->
	<!-- <script type="text/javascript" src="public/js/jquery/btn_ir_arriba.js"></script>-->

	<!-- *************************************** -->


	<!-- *************************************** -->
	<style type="text/css">
		.activo{
			background-color: #fff;
			color: #000;
		}
	</style>
</head>
<body topmargin="0" marginheight="0" onBeforeUnload="return antesdecerrar()">

<!-- ************************************ barra de progreso **************************************-->
<?php if( isset($_SESSION["cargar-img-Admin-cierre"]) && $_SESSION["cargar-img-Admin-cierre"] != "" ){ ?>
	
	<script type="text/javascript">
		setTimeout(function(){ $("#cargando-from-index").fadeOut(0); } , 1200);
	</script>

	<div id="cargando-from-index">
		<img id="logo" src="public/img/logo23.png">
		<p>cerrando, por favor espere ...</p> <img id="carga-index" src="public/img/ajax-loader-face.gif">
		<!-- <p id="progressnum"></p> -->
		<!-- <div id="progressbar">
			<div id="indicador"></div>
		</div> -->
	</div>
<?php unset($_SESSION["cargar-img-Admin-cierre"]); /*session_destroy(); */} ?>
<!-- ************************************ cierre barra de progreso **************************************-->

<noscript>Para utilizar las funcionalidades completas de este Sistema es necesario tener JavaScript habilitado. Aquí están las <a href="http://www.enable-javascript.com/es/" target="_blank"> <br> instrucciones para habilitar JavaScript en tu navegador web</a>.</noscript>
<div class="contenedor"><!-- Contenedor General -->
	<div class="header"><!-- cabezera -->
		<div class="logo-barra"><img src="public/img/logo-barra.png"></div>
		<div class="nav" id="menu">
			<div class="logo"><img src="public/img/logo23.png"><span><p>Sistema &nbsp;de &nbsp;Bienes &nbsp;Nacionales &nbsp;<?php if(isset($datos_sistema["abreviatura_sede"])) echo $datos_sistema["abreviatura_sede"]; if(isset($datos_sistema["nom_sed"])) echo " ".$datos_sistema["nom_sed"]; ?></p></span></div>
			<div class="menu_bar">
				<a href="#" class="bt-menu"><span class="icon-menu"></span></a>
			</div> 
			<ul>
				<li><a class="seleccion-menu-home InicioaddClass" href="?accion=inicio"><span class="icon-home"></span>Inicio</a></li>
				<li><a class="seleccion-menu-home InformacionaddClass" href="?accion=informacion"><span class="icon-file-text"></span>Nosotros</a></li>
				<li><a class="seleccion-menu-home contactoaddClass" href="?accion=contacto"><span class="icon-mail4"></span>Contacto</a></li>
			</ul>
		</div>
	</div>	<!-- cierre cabecera -->
	<div class="main"><!-- Contenido Principal -->
		<?php 
			if(is_file("vista/sistema/v_".$accion.".php")){
				include_once("vista/sistema/v_".$accion.".php");
			}else{
				include_once("vista/sistema/v_inicio.php");
			}
		?>
	</div> <!-- cierre contenido principal -->
	<div class="footer"><!-- pie de página (footer) -->
		<?php include_once("vista/sistema/v_footer.php"); ?>
	</div>
</div><!-- Cierre del contenedor General -->
<!-- ********************* Modales ******************-->
				<!-- msj -->
	<?php include_once("sistema/v_modales.php"); ?>
</body>
</html>

<script>

/******** bloquear click derecho del mouse *******/

//document.oncontextmenu = function(){ alert("disculpe por su seguridad y la nuestra esta funcionalidad a sido deshabilitada"); return false; }

/************************************************/

</script>

