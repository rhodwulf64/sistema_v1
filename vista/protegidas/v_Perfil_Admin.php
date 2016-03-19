<?php session_start();
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3){ // posee el nivel de administrador

		include_once('../../modelo/configuracion/m_sistema.php');
		include_once('../../modelo/seguridad/sacarHoraFechaServer.php');
		$obj_sistema = new clsSistema();
		$datos_sistema = $obj_sistema->mostrarDatos();
		
		function VlidarSesion(){
			//validar constantemente el inicio de sesion
			$obj_sistema = new clsSistema();
			$validarSesion = $obj_sistema->ValidarInicioSesionPerfil($_SESSION['id_usuario']);
			if( $validarSesion == true ){
				$_SESSION["resIndex"] = "sesionFinalizadaGraciasAOtra";
				header("location: ../../control/seguridad/c_logout.php");
			}
		}
		if(!empty($_GET['accion'])){
			$accion = $_GET['accion'];
			VlidarSesion();
		}else{
			$accion = "v_Bienvenido.php"; //variable por default
			VlidarSesion();
		}
		// $Entrada = $_SESSION["HoraEntrada"]; // se verifica q que hora se entro
  //   	$Actual  = date("Y-n-j H:i:s");  // se toma la hora actual
  //   	$Tiempo  = (strtotime( $Actual ) - strtotime( $Entrada ) ); // calculo del tiempo
 		
  //   //comparamos el tiempo transcurrido 1 minutos es: 1*60 = 60 segundos
		// if($Tiempo >= 7080){ //2 horas
  //     		header("Location: ../../control/seguridad/c_logout.php");
  //     	}
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<!-- <meta http-equiv="refresh" content="7078"> --> <!-- se regresca la pantalla cada 5 segundos -->
	<meta charset="utf-8" />
	<!-- ****************** css ******************* -->
	<link rel="stylesheet" type="text/css" href="../../public/css/estilos_intranet.css" />
	<link rel="stylesheet" type="text/css" href="../../public/css/menu_acordion.css" />
	<link rel="shortcut icon" href="../../public/img/favicon/favicon_cicpc.ico" />
	<link rel="stylesheet" type="text/css" href="../../public/style.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/ventanas_modales.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/formularioYBotonera.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/msj_iconos.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/sistema.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/header.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/desarrolladores.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/reportes.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/calendario/calendario.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/movimientos/recepcion.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/movimientos/bootstrap-tour-standalone.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/media_screen.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/barra_de_progreso.css">

	<!-- ****************** script **************** -->
	<script type="text/javascript" src="../../public/js/jquery/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="../../public/js/jquery/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="../../public/bootstrap-tour/build/js/bootstrap-tour-standalone.js"></script> 
	<script type="text/javascript" src="../../public/js/jquery/main.js"></script>
	<script type="text/javascript" src="../../public/js/libreria.js"></script>
	<script type="text/javascript" src="../../public/js/botonera.js"></script>
	<script type="text/javascript" src="../../public/js/validar_L_N.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarUsuario.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarTipoUser.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarTbien.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarBien.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarCondicion.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarDepart.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarCargo.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarSede.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarCiudad.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarMunicipio.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarEstado.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarProveedor.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarCategoria.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarMarca.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarModelo.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/Gestionar_Organizacion.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarPeriodo.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarPersonal.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarUsuario.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarMotivo.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/Gestionar_Concepto.js"></script>
	<script type="text/javascript" src="../../public/js/movimientos/GestionarRecepcion.js"></script>
	<script type="text/javascript" src="../../public/js/movimientos/GestionarAsignacion.js"></script>
	<script type="text/javascript" src="../../public/js/movimientos/GestionarDesincorporacion.js"></script>
	<script type="text/javascript" src="../../public/js/movimientos/GestionarDevolucion.js"></script>
	<script type="text/javascript" src="../../public/js/maestras/GestionarSistema.js"></script>
	<script type="text/javascript" src="../../public/js/calendario/calendario.js"></script>
	<script type="text/javascript" src="../../public/js/barra_de_progreso.js"></script>

	<!-- ********************* TRANSACTION *******************-->
	<!-- <script type="text/javascript" src="../../public/js/inventario/I_asignacion.js"></script> -->


	<script type="text/javascript">
		$(document).ready(main);
		var contador = 1;

		function main(){
			$("#icono-menu-Intranet").click(function(){

				if(contador == 1){
				
					$(".acordeon").toggle(400);
					$("#contenido_izquierda").css({
						'transition' : 'all 0.4s ease-in-out',
						'width' : '3%',
						'visibility' : 'hidden'
					});
					$("#modulo-sis").css({
						'visibility' : 'hidden'
					});
					$("#contenido_centro").css({
						'transition' : 'all 0.4s ease-in-out',
						'width' : '97%'
					});
					$("#mesaje-bienvenida").css({
						'text-align' : 'center'
					});
					$("div #img-centro").css({
						'transition' : 'all 0.4s ease-in-out',
						'left' : '80px'
					});
					$("#barra-modulos-iconos p").css({
						'transition' : 'all 0.4s ease-in-out',
						'width' : '3%',
						'visibility' : 'hidden'
					});
					$("#barra-modulos-iconos").css({
						'transition' : 'all 0.4s ease-in-out',
						'width' : '3%',
						'border-right' : '13px solid #fff'
					});
					/**** detalle transaccion recepcion***/
					$("#cabecera-detalle span#n1").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '-3%'
					});
					$("#cabecera-detalle span#n2").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '5%'
					});
					$("#cabecera-detalle span#n3").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '5%'
					});
					$("#cabecera-detalle span#n4").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n5").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n6").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n7").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n8").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n9").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n10").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					contador = 0;
					
				}else{
					$(".acordeon").toggle(400);
					$("#contenido_izquierda").css({
						'transition' : 'all 0.4s ease-in-out',
						'width' : '18%',
						'visibility' : 'visible'
					});
					$("#modulo-sis").css({
						'visibility' : 'visible'
					});
					$("#contenido_centro").css({
						'transition' : 'all 0.4s ease-in-out',
						'width' : '82%'
					});
					$("#mesaje-bienvenida").css({
						'text-align' : 'left'
					});
					$("div #img-centro").css({
						'transition' : 'all 0.4s ease-in-out',
						'left' : '0px'
					});
					$("#barra-modulos-iconos p").css({
						'transition' : 'all 0.4s ease-in-out',
						'width' : '100%',
						'visibility' : 'visible'
					});
					$("#barra-modulos-iconos").css({
						'transition' : 'all 0.4s ease-in-out',
						'width' : '233px',
						'border-right' : '13px solid #ccc'
					});
					/**** detalle transaccion recepcion ***/
					$("#cabecera-detalle span#n1").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '-3%'
					});
					$("#cabecera-detalle span#n2").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n3").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n4").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n5").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n6").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '3%'
					});
					$("#cabecera-detalle span#n7").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '4%'
					});
					$("#cabecera-detalle span#n8").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '3%'
					});
					$("#cabecera-detalle span#n9").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '3%'
					});
					$("#cabecera-detalle span#n10").css({
						'transition' : 'all 0.4s ease-in-out',
						'margin-left' : '3%'
					});
					contador = 1;
				}
			});
		}
	</script>
</head>
<body>
<!-- ************************************ barra de progreso **************************************-->
<?php if( isset($_SESSION["cargar-img-Admin-inicio"]) && $_SESSION["cargar-img-Admin-inicio"] != "" ){ ?>
	
	<script type="text/javascript">
		setInterval(prog, 100);
		setTimeout(function(){ $("#cargando-from-logeando").fadeOut(0); } , 5300);
	</script>

	<div id="cargando-from-logeando">
		<img src="../../public/img/logo23.png">
		<p>cargando, <?php if(isset($_SESSION["nom_perfil_login"])) echo $_SESSION["nom_perfil_login"]." ";echo $_SESSION['nom']." ".$_SESSION['ape']?> </p> 
		<p id="progressnum"></p> 
		<div id="progressbar">
			<div id="indicador"></div>
		</div>
	</div>
<?php unset($_SESSION["cargar-img-Admin-inicio"]); } ?>
<!-- ************************************ cierre barra de progreso **************************************-->

<div class="contenedor">
	<div class="header"><!-- cabezera -->
		<div class="logo-barra"><img src="../../public/img/logo-barra.png"></div>  <!-- logotipo -->
		<div class="nav">
		<div class="logo"><img class="logo1-tour" src="../../public/img/logo23.png"><span class="titulo-tour"> <p>Sistema &nbsp;de &nbsp;Bienes &nbsp;Nacionales &nbsp;<?php if(isset($datos_sistema["abreviatura_sede"])) echo $datos_sistema["abreviatura_sede"]; if(isset($datos_sistema["nom_sed"])) echo " ".$datos_sistema["nom_sed"]; ?></p></span></div>
			 <div class="menu_bar">
				<a  href="#" class="bt-menu"><span class="icon-menu"></span></a>
			</div> 
		<ul id="menu"> 
			<!-- <li id="identificacion" title="click para ver solicitudes"><a href="?accion=msj"><span id="iconos" class="icon-envelop"></span></a></li>  -->
			<li class='perfil-tour' id="identificacion" title="clic para Editar el perfil de usuario"><a href="<?php if ( ($_SESSION['nivel'] == 1) || ($_SESSION['nivel'] == 2) || ($_SESSION['nivel'] == 3) && ($_SESSION['statusTablaEstatus'] == 'D') && ($_SESSION["userSessionIniciada"] != '') )  echo "?accion=perfil"; ?>"><span id="iconos" class="icon-user-tie"></span><?php if(isset($_SESSION["nom_perfil_login"])) echo $_SESSION["nom_perfil_login"].": ";echo $_SESSION['nom']." ".$_SESSION['ape']?></a></li> 
		 <li> <a class="element-vis-admin"> <span class="icon-magic-wand"></span> </a> </li> </ul>
		</div> 
	</div>	<!-- cierre div cabecera -->
	<!--contenido-->

	<div id="contenido" class="limpiar">

			
			<div id="barra-modulos-iconos" >
				<span id="icono-menu-Intranet" title="clic para ocultar o mostrar el menu" class="icon-menu3 icono1-tour "></span>
				<p><span style="margin-left:35px;"></span><span id="modulo-sis">Módulos del Sistema</span></p>
			</div>
		<!--contenido izquierda-->

			<div id="contenido_izquierda" class="modulo-tour">		
			
				<!-- Contenedor -->
				<div id="acordeon" class="acordeon">
					<ul>
<?php if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3 )  {  
	if( $_SESSION['statusTablaEstatus'] == 'D') { ?>
<!-- ****************************************************** Modulo de Inicio *************************************************************-->
						<li class="inicio-tour">
							<a href="?accion=inicio" title="Clic para abrir el Módulo de Inicio"><span id="iconos" class="icon-home"></span>Inicio</a>
						</li>
	<!-- ****************************************************** Cieere Módulo de Inicio *************************************************************-->

	<!-- ****************************************************** Modulo EStructura Organizativa *************************************************************-->
					<?php if( $_SESSION['nivel'] == 1){ ?>   
						<li class='active has-sub organizativa-tour'><a href='#' title="Clic para abrir el Módulo de Estructura organizativa"><span id="iconos" class="icon-bookmarks"></span>Estructura Organizativa<span id="flecha-one" class="fa fa-angle-down"></span></a>
						    <ul>
	<?php  if( $_SESSION['nivel'] == 1){ ?>    <li><a href="?accion=organizacion">Organismo</a></li> 
						        <li class='last'><a href="?accion=sede">Sede</a></li>
						        <li><a href="?accion=dep">Departamento</a></li>
						        <li><a href="?accion=cargo" onclick="location.href='../../modelo/seguridad/m_limpiar_variables_sessiones.php'" >Cargo</a></li> 
								<li><a href="?accion=personal">Personal</a></li> <?php } ?>
	<?php  if( $_SESSION['nivel'] == 1){ ?>	 <li><a href="?accion=concepto">Concepto</a></li> <?php } ?>
						    </ul>
					    </li>
					<?php } ?> 
	<!-- ****************************************************** Cierre Módulo EStructura Organizativa *************************************************************-->

	<!-- ****************************************************** Modulo de Estructura Geografica *************************************************************-->
					<?php if( $_SESSION['nivel'] == 1){ ?> 
						<li class='active has-sub geografica-tour'><a href='#' title="Clic para abrir el Módulo de Estrucutra Geográfica"><span id="iconos" class="icon-location2"></span>Estructura Geográfica<span id="flecha-one" class="fa fa-angle-down"></span></a>
						    <ul>
						 		<li class='last'><a href="?accion=estado">Estado</a></li>
						        <li><a href="?accion=municipio">Municipio</a></li>
						        <li class='last'><a href="?accion=parroquia">Parroquia</a></li>
						    </ul>
					    </li>
					<?php } ?>
	<!-- ****************************************************** Cierre Modulo de Estructura Geografica *************************************************************-->

	<!-- ****************************************************** Modulo de Bienes Nacionales (Configuracion )*************************************************************-->
					    <li class='active has-sub bienesnacionales-tour'><a href='#' title="Clic para abrir el Módulo de Bienes Nacionales"><span id="iconos" class="icon-stack"></span>Bienes Nacionales<span id="flecha-one" class="fa fa-angle-down"></span></a>
							<ul>
							<?php if( $_SESSION['nivel'] == 1){ ?>
						        <li class='has-sub'><a href='#'>Configuración<span id="flecha-one2" class="fa fa-angle-down"></span></a>
						            <ul>
						               <li><a href="?accion=periodo">Crear Período</a></li>
						               <li><a href="?accion=categoria">Categoría</a></li>
						               <li><a href="?accion=tbien">Tipo Bien</a></li>
						               <li><a href="?accion=proveedor">Proveedor</a></li>
						               <li><a href="?accion=motivo">Motivo</a></li>
						               <li><a href="?accion=marca">Marca</a></li>
						               <!-- <li><a href="?accion=modelo">Modelo</a></li> -->
						               <li class='last'><a href="?accion=condicion">Condición</a></li>
						            </ul>
						        </li>
						    <?php } ?>
	<!-- ****************************************************** Cierre Modulo de Bienes Nacionales (configuracion) *************************************************************-->

	<!-- ****************************************************** Modulo de Bienes Nacionales (Movimiento) *************************************************************-->
						       <?php if( $_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ ?>
						         <li class='has-sub'><a href='#'>Inventario<span id="flecha-one2" class="fa fa-angle-down"></span></a>
						            <ul>
						        <?php } ?>
						       
				<?php if( $_SESSION['nivel'] == 1){ ?> <li><a href="?accion=abrir_periodo">Abrir Período</a></li> <?php } ?>
				<?php if( $_SESSION['nivel'] == 1){ ?> <li><a href="?accion=cerrar_periodo">Cerrar Período</a></li> <?php } ?>
				<?php if( $_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ ?> <li><a href="?accion=recepcion">Recepción</a></li>
						               <li><a href="?accion=asignacion">Asignación</a></li>
						               <li><a href="?accion=devolucion">Devolución</a></li>
						        <?php } ?>
						             <?php if( $_SESSION['nivel'] == 1 ){ ?> <li class='last'><a href="?accion=desincorporacion">Desincorporación</a></li> <?php } ?>
						        <?php if( $_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ ?>
						               <li class='last'><a href="?accion=consulta_bien">Consultar Bien Nacional</a></li>
						       	<?php } ?>
						       		<?php if( $_SESSION['nivel'] == 3){ ?> 
						       			 <li><a href="?accion=consulta_bien2">Consultar Bien Nacional</a></li>
						       		<?php } ?>
						       	 <?php if( $_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ ?>
						            </ul>
						         </li>
						        <?php } ?>
						    </ul> 
					    </li>
	<!-- ****************************************************** Cierre Modulo de Bienes Nacionales(Movimiento) *************************************************************-->

	<!-- ****************************************************** Modulo de Reportes *************************************************************-->
					     <li class='active has-sub reportes-tour'><a href='#' title="Clic para abrir el Módulo de Reportes"><span id="iconos" class="icon-file-text2"></span>Reportes<span id="flecha-one" class="fa fa-angle-down"></span></a>
						     <ul>
						    <?php if( $_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ ?>
						     	<li class='has-sub'><a href='#'>Estructura Organizativa<span id="flecha-one2" class="fa fa-angle-down"></span></a>
						            <ul>
						            	<li><a href="?accion=r_org">Organismo</a></li>
						            	<li class='last'><a href="?accion=r_sede">Sede</a></li>
						            	<li><a href="?accion=r_depart">Departamento</a></li>
						               <li><a href="?accion=r_cargo">Cargo</a></li>
						               <li><a href="?accion=r_personal">Personal</a></li>
						            </ul>
						        </li>
						    <?php } ?>
						    <?php if( $_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ ?>
						        <li class='has-sub'><a href='#'>Estructura Geográfica<span id="flecha-one2" class="fa fa-angle-down"></span></a>
						            <ul>
						                <li class='last'><a href="?accion=r_estado">Estado</a></li>
						       			<li><a href="?accion=r_municipio">Municipio</a></li>
						        		<li class='last'><a href="?accion=r_parroq">Parroquia</a></li>
						            </ul>
						        </li>
						    <?php } ?>
						        <li class='has-sub'><a href='#'>Bienes Nacionales<span id="flecha-one2" class="fa fa-angle-down"></span></a>
						            <ul>
						         <?php if( $_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ ?>
						               <li><a href="?accion=r_inv">Bien Nacional</a></li>
						               <li><a href="?accion=r_recepcion">Recepción</a></li>
						               <li><a href="?accion=r_asignacion">Asignación</a></li>
						               <li><a href="?accion=r_devolucion">Devolución</a></li>
						        <?php } ?>
						        <?php if( $_SESSION['nivel'] == 1 ){ ?> <li class='last'><a href="?accion=r_des">Desincorporación</a></li> <?php } ?>
						        <?php if( $_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2){ ?>
						               <li><a href="?accion=r_cat">Categoria</a></li>
						               <li><a href="?accion=r_tbien">Tipo Bien</a></li>
						               <li><a href="?accion=r_prov">Proveedor</a></li>
						               <li><a href="?accion=r_motivo">Motivo</a></li>
						               <li><a href="?accion=r_marca">Marca</a></li>
						               <li><a href="?accion=r_condicion">Condición</a></li>
						               <li><a href="?accion=r_periodo">Período</a></li>
						        <?php } ?>
						        <?php if( $_SESSION['nivel'] == 3){ ?> 
						        	   <li><a href="?accion=r_asig_jd">Asignación</a></li>
						        	   <li><a href="?accion=r_dev_jd">Devolución</a></li>
						        <?php } ?>
						            </ul>
						        </li>
						    <?php if( $_SESSION['nivel'] == 1 ){ ?>
						    	 <li class='has-sub'><a href='#'>Seguridad<span id="flecha-one2" class="fa fa-angle-down"></span></a>
						            <ul>
						            	<li><a href="?accion=r_Tuser">Tipo de Usuario</a></li>
						             	<li><a href="?accion=r_usuario">Usuario</a></li>
						             	<li ><a href="?accion=v_inv_bmov">Bitacora de Movimientos</a></li>
					            		<li><a href="?accion=r_bitacora">Bitacora de Acceso</a></li>
						            </ul>
						        </li>
						      <?php } ?>
						    </ul>
						</li>
	<!-- ****************************************************** Cierre Modulo de Reportes *************************************************************-->

	<!-- ****************************************************** Modulo de Seguridad *************************************************************-->
					    <li class='active has-sub seguridad-tour'><a href='#' title="Clic para abrir el Módulo de Seguridad"><span id="iconos" class="icon-eye"></span>Seguridad<span id="flecha-one" class="fa fa-angle-down"></span></a>
					        <ul>
					        <?php if( $_SESSION['nivel'] == 1 ){ ?>  <li><a href="?accion=tUser">Tipo de Usuario</a></li>
						        <li><a href="?accion=menu_usuarios">Usuario</a></li> 
						      
						    <?php } ?>
						        <li><a href="?accion=perfil">Editar Perfil</a></li>
						    <?php if( $_SESSION['nivel'] == 1 ){ ?> <li class='last'><a href="?accion=bitacora_mov">Bitacora de Movimiento</a></li>
					           	<li><a href="?accion=bitacora_acess">Bitacora de Acceso</a></li>
					            <li class='last'><a href="?accion=sistema">Sistema</a></li> <?php } ?>
					        </ul>
					    </li>
	<!-- ****************************************************** Cierre Modulo de Seguridad *************************************************************-->

	<!-- ****************************************************** Modulo de Ayuda *************************************************************-->
					    <li class='active has-sub ayuda-tour'><a href='#' title="Clic para abrir el Módulo de Ayuda"><span id="iconos" class="icon-question"></span>Ayuda<span id="flecha-one" class="fa fa-angle-down"></span></a>
					        <ul>
					           <li><a href="?accion=acerca_de">Acerca de...</a></li>
					            <li class='last'><a href="?accion=manual_sistema">Manuales</a></li>
					            <li class='last'><a href="?accion=terminos">Terminos y Condiciones</a></li>
					        </ul>
					    </li>
	<!-- ****************************************************** Cierre Modulo de Ayuda *************************************************************-->

	<!-- ****************************************************** Modulo de Salir (Cerrar Sessión) *************************************************************-->
					    <li class='salir-tour'><a onclick="openVentana()" title="clic para salir del Sistema"><span id="iconos" class="icon-lock"></span>Salir</a></li>
	<!-- ****************************************************** Cierre Modulo de Salir (Cerrar Sessión) *************************************************************-->
					</ul><!-- fin ul-->
				</div>
			</div>
<?php }else{ ?>

		<?php if( $_SESSION["userSessionIniciada"] == "userSessionIniciada" ){ ?>

															<!-- acectar terminos y condiciones -->

						<!-- ****************************************************** Modulo de Salir (Cerrar Sessión) *************************************************************-->
					    <li class='salir-tour'><a onclick="openVentanaSalir2()" title="clic para salir del Sistema"><span id="iconos" class="icon-lock"></span>Salir</a></li>
						<!-- ****************************************************** Cierre Modulo de Salir (Cerrar Sessión) *************************************************************-->
				</div>
			</div>


		<?php }else{ ?>

															<!-- acectar terminos y condiciones -->

						<!-- ****************************************************** Modulo de Salir (Cerrar Sessión) *************************************************************-->
					    <li class='salir-tour'><a onclick="openVentana()" title="clic para salir del Sistema"><span id="iconos" class="icon-lock"></span>Salir</a></li>
	<!-- ****************************************************** Cierre Modulo de Salir (Cerrar Sessión) *************************************************************-->
				</div>
			</div>

		<?php } ?>

			
	<!-- ****************************************************** Cieere Módulo de Inicio *************************************************************-->
<?php } /* cierre condicion de status 'D' */ }  /*cierre condicion de los 3 nieveles*/ ?>

<!-- ** script para mostrar un msj de cargando mientras se carga toda la vista ** -->
<script type="text/javascript">
	//$("#contenedor-formularios")
	/*$(document).ready(function() {    
		$('#cargando-from').html('<p>Cargando... <img style="position:relative; float:left; width:30px; margin:0% 50% 0% 50%;" src="../../public/img/loading2.gif"/></p>');
		//setTimeout(function(){ //funcion a ejecutar } , 2000);	
	}); */
	$(".contenedor-formularios").hide(); //oculto por default
	$(window).load(function () {
		$("#cargando-from").hide(); 
		$(".contenedor-formularios").show();
	});   
</script>
<!-- *** cierre script cargando *** -->

		<!--contenido derecha-->	
		<div id="contenido_centro">
				<!--incluyes los formylarios-->
				<div id="cargando-from"><p>Cargando, por favor espere ... </p> <img src="../../public/img/ajax-loader-face.gif"/></div>
				<?php 
					if ( ($_SESSION['nivel'] == 1) || ($_SESSION['nivel'] == 2) || ($_SESSION['nivel'] == 3) ){
						
						if($_SESSION['statusTablaEstatus'] == 'D'){

							if(is_file("../configuracion/v_".$accion.".php")){
								include_once("../configuracion/v_".$accion.".php");
							}else if(is_file("../movimientos/v_".$accion.".php")){
								include_once("../movimientos/v_".$accion.".php");
							}else if(is_file("../seguridad/v_".$accion.".php")){
								include_once("../seguridad/v_".$accion.".php");
							}else if(is_file("../ayuda/v_".$accion.".php")){
								include_once("../ayuda/v_".$accion.".php");
							}else if(is_file("../../reportes/bien_nacional/".$accion.".php")){
								include_once("../../reportes/bien_nacional/".$accion.".php");
							}else if(is_file("../../reportes/estructura_geo/".$accion.".php")){
								include_once("../../reportes/estructura_geo/".$accion.".php");
							}else if(is_file("../../reportes/estructura_organizativa/".$accion.".php")){
								include_once("../../reportes/estructura_organizativa/".$accion.".php");
							}else if(is_file("../../reportes/seguridad/".$accion.".php")){
								include_once("../../reportes/seguridad/".$accion.".php");
							}else if(is_file("../../reportes/vista_cosulta_rep/".$accion.".php")){
		                        include_once("../../reportes/vista_cosulta_rep/".$accion.".php");
		                    }else{
								include_once("../sistema/v_Bienvenido.php"); // vista por default
							}
						}else{
							if( isset($_SESSION['visAceptoTerminosAceptados']) && $_SESSION['visAceptoTerminosAceptados'] != ""){
								if(is_file("../seguridad/termycond/v_".$accion.".php")){
									include_once("../seguridad/termycond/v_".$accion.".php");
								}else{
									include_once("../seguridad/termycond/v_actualizarDatos_PrimeraVes.php");
								}
							}else{

								if( isset($_SESSION['visDefaultTerminoAceptar']) && $_SESSION['visDefaultTerminoAceptar'] != ""){
									include_once("../seguridad/termycond/v_aceptar_terminos.php");
								}else{

									include_once("../seguridad/termycond/v_actualizarDatos_PrimeraVes.php");
								}

							}
						}

					} // cierre condicional de niveles
				?> 
				<!--aqui se cierra-->
		</div>	
	</div><!--cierre del contenido-->
<!--pie de paginma-->
	<div class="footer"><!-- pie de página (footer)-->
<!--***************************************************************************************************-->
		<?php include_once("../sistema/v_footer.php"); ?>
		
<!--***************************************************************************************************-->
	</div>
</div> <!-- cierre del div contenedor -->

<!-- ********************* Modales ******************-->
				<!-- msj -->
	<?php include_once("../sistema/v_modales.php"); ?>

				<!-- buscar -->
	<!-- <?php //include_once("../sistema/v_modal_buscar.php");?> -->
<!-- ************************************************S-->
<?php
	}
	else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}
else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}

	if(isset($_SESSION['res'])){ // existe un msj
		if($_SESSION['res']=="logAdmin"){
			echo "<script>openVentana2();</script>";
		}else if($_SESSION['res']=='registrado'){
			echo "<script>openVentana4();</script>";
		}else if($_SESSION['res']=='yaexiste'){
			echo "<script>closeVentana6();</script>"; 
		}else if($_SESSION['res']=='mod'){
			echo "<script>openVentana11();</script>";
		}else if($_SESSION['res']=='NO'){
			echo "<script>openVentana5();</script>";
		}else if($_SESSION['res']=='des'){
			echo "<script>openVentana9();</script>";
		}else if($_SESSION['res']=='act'){
			echo "<script>openVentana10();</script>";
		}else if($_SESSION["res"]=='staUno'){
			echo "<script>alert('El Registro se encuetra desactivado, porfavor activar');</script>";
		}else if($_SESSION["res"]=='yesCed'){
			echo "<script>alert('La Cédula Ya se Encuentra Registrada');</script>";
		}else if($_SESSION["res"]=='NotCed'){
			echo "<script>alert('Cédula No Registrada');</script>";
		}else if($_SESSION['res']=="error_mod"){
			echo "<script>openVentana12();</script>";
		}else if($_SESSION['res']=='error_des'){
			echo "<script>openVentana13();</script>";
		}else if($_SESSION['res']=='des_e_No'){
			echo "<script>alert('no se puede desactivar');</script>";
		}else if($_SESSION['res']=='ClaveModificada'){
			echo "<script>openVentana15();</script>";
		}else if($_SESSION['res']=='NoClaveIgualAntIntra'){
			echo "<script>openVentana16();</script>";
		}else if($_SESSION['res']=='UserIncorrerIntranet'){
			echo "<script>openVentana14();</script>";
		}else if($_SESSION['res']=='NoClaveIgualIntra'){
			echo  "<script>openVentana17();</script>";
		}else if($_SESSION['res']=='PregModificada'){
			echo  "<script>openVentana18();</script>";
		}else if($_SESSION['res']=='CorreoModificada'){
			echo  "<script>openVentana23();</script>";
		}else if($_SESSION['res']=='TelfModificada'){
			echo  "<script>openVentana24();</script>";
		}else if($_SESSION['res']=='userBloqueado'){
			echo  "<script>openVentana22();</script>";
		}else if($_SESSION['res']=='userDesBloqueado'){
			echo  "<script>openVentana21();</script>";
		}else if($_SESSION['res']=='ExisPeriAbrir'){
			echo  "<script>openVentana30();</script>";
		}else if($_SESSION['res']=='NoHayPerioAbrir'){
			echo  "<script>openVentana29();</script>";
		}else if($_SESSION['res']=='ExitoAbiertPeriodo'){
			echo  "<script>openVentana28();</script>";
		}else if($_SESSION['res']=='NoExisPerPaCerrar'){
			echo  "<script>openVentana27();</script>";
		}else if($_SESSION['res']=='ExitoCerrarPeriodo'){
			echo  "<script>openVentana26();</script>";
		}else if($_SESSION['res'] == 'ElPeriodIgaulFechaActual'){
			echo  "<script>openVentana25();</script>";
		}else if($_SESSION['res'] == 'periodoCreado'){
			echo  "<script>openVentana31();</script>";
		}else if($_SESSION['res'] == "recepcionFinalizada"){
			echo  "<script>openVentana34();</script>";
		}else if($_SESSION['res'] == "recepcionError"){
			echo  "<script>openVentana35();</script>";
		}else if($_SESSION['res'] == "AnulaRecepcion"){
			echo "<script>LibreriaGenerarModal(\"Recepción anulada con Éxito.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>\");</script>";
			//echo  "<script>openVentana36();</script>";
		}else if($_SESSION['res'] == "AnulaRecepcionError"){
			echo "<script>LibreriaGenerarModal(\"Anulación de Recepción Fallida<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>\");</script>";
			//echo  "<script>openVentana37();</script>";
		}else if($_SESSION['res'] == "anuRecepTrazaError"){
			echo "<script>LibreriaGenerarModalMAsTime('Los Bienes Nacionales pertenecientes a esta recepción ya han tenido movimiento así que, la anulación de dicha recepción no podrá realizarse.');</script>";
		}else if($_SESSION['res'] == "asignacionFinalizada"){
			echo  "<script>openVentanaModalAsig();</script>";
		}else if($_SESSION['res'] == "anuAsigTrazaError"){
			echo "<script>LibreriaGenerarModalMAsTime('Los Bienes Nacionales pertenecientes a esta Asignación ya han tenido movimiento así que, la anulación de dicha Asignación no podrá realizarse.');</script>";
		}else if($_SESSION['res'] == "AnulaAsignacion"){
			echo "<script>LibreriaGenerarModal(\"Asignación anulada con Éxito.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>\");</script>";
		}else if($_SESSION['res'] == "AnulaDesincorporacion"){
			echo "<script>LibreriaGenerarModal(\"Desincorporación anulada con Éxito.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>\");</script>";
		}else if($_SESSION['res'] == "AnulaAsignacionError"){
			echo "<script>LibreriaGenerarModal(\"Anulación de asignación Fallida<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>\");</script>";
		}else if($_SESSION['res'] == "AnulaDesincorporacionError"){
			echo "<script>LibreriaGenerarModal(\"Anulación de desincorporación Fallida<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>\");</script>";
		}else if($_SESSION['res'] == "DesincorError"){
			echo "<script>LibreriaGenerarModal(\"Desincorporación Fallida<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>\");</script>";
		}else if($_SESSION['res'] == "DesincorFinalizada"){
			echo  "<script>openVentanaDesincorFinalizada();</script>";
		}else if($_SESSION['res'] == "devolucionFinalizada"){
			echo  "<script>openVentanaDevolFinalizada();</script>";
		}else if($_SESSION['res'] == "devolucionError"){
			echo "<script>LibreriaGenerarModal(\"Devolución Fallida<br><br><span style='font-size:25px;color:green;' class='icon-cross'></span>\");</script>";
		}else if($_SESSION['res'] == "anuDevTrazaError"){
			echo "<script>LibreriaGenerarModalMAsTime('Los Bienes Nacionales pertenecientes a esta Devolución ya han tenido movimiento así que, la anulación de dicha recepción no podrá realizarse.');</script>";
		}else if($_SESSION['res'] == "AnulaDevolucion"){
			echo "<script>LibreriaGenerarModal(\"Devolución anulada con Éxito.<br><br><span style='font-size:25px;color:green;' class='icon-checkmark'></span>\");</script>";
		}else if($_SESSION['res'] == "AnulaDevolucionError"){
			echo "<script>LibreriaGenerarModal(\"Anulación de Devolución Fallida<br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>\");</script>";
		}else if($_SESSION['res'] == "AnulaFallidaPorPeriodoRecep"){
			echo "<script>LibreriaGenerarModalMAsTime(\"Ésta Recepción no podrá ser anulada ya que el Período en la cual se realizó pertenece a uno anterior al actual\");</script>";
		}else if($_SESSION['res'] == "AnulaFallidaPorPeriodoAsig"){
			echo "<script>LibreriaGenerarModalMAsTime(\"Ésta Asignación no podrá ser anulada ya que el Período en la cual se realizó pertenece a uno anterior al actual\");</script>";
		}else if($_SESSION['res'] == "AnulaFallidaPorPeriodoDev"){
			echo "<script>LibreriaGenerarModalMAsTime(\"Ésta Devolución no podrá ser anulada ya que el Período en la cual se realizó pertenece a uno anterior al actual\");</script>";
		}else if($_SESSION['res'] == "AnulaFallidaPorPeriodoDesin"){
			echo "<script>LibreriaGenerarModalMAsTime(\"Ésta Desincorporación no podrá ser anulada ya que el Período en la cual se realizó pertenece a uno anterior al actual\");</script>";
		}
		unset($_SESSION["res"]); //destruyo la variable para que no siga apareciendo al pulsar f5 
	}
?>
</body>
</html>
<!-- ************************** Incluyo los archivos que hacen posible la ayuda guiada *********************** -->
<!-- *************** // Estructura Organizativa // *************** -->
<!--  ayuda general Admin  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-general-Admin.js"></script>

<!--  ayuda organismo  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-organismo.js"></script>

<!--  ayuda sede  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-sede.js"></script>

<!--  ayuda departamento  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-departamento.js"></script>

<!--  ayuda personal  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-personal.js"></script>

<!--  ayuda cargo  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-cargo.js"></script>

<!--  ayuda concepto  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-concepto.js"></script>


<!-- *************** // Estructura Geográfica // *************** -->
<!--  ayuda estado  -->

<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-estado.js"></script>

<!--  ayuda municipio  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-municipio.js"></script>

<!--  ayuda parroquia  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-parroquia.js"></script>

<!-- *************** // Seguridad // *************** -->

<!--  ayuda tipodeusuario  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-tipodeusuario.js"></script>

<!--  ayuda usuario  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-usuario.js"></script>
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-asignarusuario.js"></script>

<!--  ayuda editar perfil  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-editarperfil.js"></script>

<!--  ayuda sistema  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-sistema.js"></script>

<!-- *************** // Ayuda // *************** -->
<!--  ayuda acerca de..  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-acercade.js"></script>
<!--  ayuda manuales  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-manuales.js"></script>
<!--  ayuda terminos y condiciones  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-terminosycondiciones.js"></script>

<!-- ***************** // Bienes Nacionales //  Configuracion **************** -->
<!--  Abrir Periodo  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-crearperiodo.js"></script>

<!--  Abrir categoria  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-categoria.js"></script>

<!--  Abrir tipo bien  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-tipobien.js"></script>

<!--  Abrir Proveedor  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-proveedor.js"></script>

<!--  Abrir motivo  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-motivo.js"></script>

<!--  Abrir marca  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-marca.js"></script>

<!--  Abrir condicion  -->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-condicion.js"></script>

<!-- ** bienes nacionales (configuracion) **-->

<!-- ** recepcion(configuracion) **-->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-recepcion.js"></script>

<!-- ** asignacion (configuracion) **-->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-asignacion.js"></script>

<!-- ** devolucion (configuracion) **-->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-devolucion.js"></script>

<!-- ** desincorporacion (configuracion) **-->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-desincorporacion.js"></script>

<!-- ** consultar bienes (configuracion) **-->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-consultabienes.js"></script>

<!-- ** Abrir y cerrar Periodo (configuracion) **-->
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-abrirperiodo.js"></script>
<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-cerrarperiodo.js"></script>

<!--  ayuda crear periodo  -->
<script type="text/javascript" src=""></script>

<!-- ** PRIMERA VEZ **-->

<script type="text/javascript" src="../../public/b-vistas-tour/vista-tour-primeravez.js"></script>
<!--  ayuda Abrir Periodo  -->
<script type="text/javascript" src=""></script>

<!-- ********************* // Reportes // ********************* -->

<!-- ********************* // seguridad // ******************** -->

<!-- ********************** // ayuda // *********************** -->



<!-- ******************************************** cierre ayuda guiada ***************************************** -->



<script type="text/javascript">
//document.oncontextmenu = function(){ alert("disculpe por su seguridad y la nuestra esta funcionalidad a sido deshabilitada"); return false; }
</script>