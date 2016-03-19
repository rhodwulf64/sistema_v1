<?php error_reporting(0);
@session_start();
include_once('../../modelo/configuracion/m_periodo.php');
@$op=$_POST['temp'];
switch ($op){
	case "Incluir":Inc();break;
	case "guardar":Guar();break;
	case "abrir": ConsMixNuncaAbiertos(); break;
	case "cerrar": ConsAbiertos(); break;
	case "Grabar_abrir": Abr(); break;
	case "Grabar_cerrar": CRR(); break;
	case "Cancelar":
	unset($_SESSION["opActDesPeriodo"]);
	if(isset($_SESSION['nom_periodo'])){
		unset($_SESSION['id_periodo']);
		unset($_SESSION['nom_periodo']);
		unset($_SESSION['fecha_inicio']);
		unset($_SESSION['fecha_fin']);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo');break;
	}else if(isset($_SESSION['nom_periodo_abrir'])){
		unset($_SESSION['id_periodo_abrir']);
		unset($_SESSION['nom_periodo_abrir']);
		unset($_SESSION['fecha_inicio_abrir']);
		unset($_SESSION['fecha_fin_abrir']);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=abrir_periodo');
	}else if(isset($_SESSION['nom_periodo_cerrar'])){
		unset($_SESSION['id_periodo_cerrar']);
		unset($_SESSION['nom_periodo_cerrar']);
		unset($_SESSION['fecha_inicio_cerrar']);
		unset($_SESSION['fecha_fin_cerrar']);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cerrar_periodo');
	}
}

function Inc(){
	$arreglo_fecha = array(); // creo un arreglo
	$obj_periodo = new ClsPeriodo();
	$arreglo_fecha = $obj_periodo->buscarPeriodos();

	$_SESSION['nom_periodo'] = $arreglo_fecha[0];
	$_SESSION['fecha_inicio'] = $arreglo_fecha[1];
	$_SESSION['fecha_fin'] = $arreglo_fecha[2];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo');
	// $obj_periodo->recibirInc($_POST['fecha_inicio'],$_POST['fecha_fin']);
	// $rs = $obj_periodo->consultarInc();
	// if ($tupla = $obj_periodo->converArray($rs)){   //comparacion para que las fechas no se encuentren registradas en la bd al incluir
	//   	$_SESSION['res']="yaexiste";
	//   	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo');
	// }else{
	//  	$obj_periodo->incluir();
	// 	$_SESSION['res']="registrado";
	//  	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo');
	// } 
}
function Guar(){
	$obj_periodo = new ClsPeriodo();
	$obj_periodo->recibirTodos($_POST);
	$obj_periodo->Registrar_Periodo();

	unset($_SESSION['id_periodo']);
	unset($_SESSION['nom_periodo']);
	unset($_SESSION['fecha_inicio']);
	unset($_SESSION['fecha_fin']);

	$_SESSION['res'] = "periodoCreado";
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo');
}
/* consultar el estatus del minimo nunca abierto */
function ConsMixNuncaAbiertos(){
	$obj_periodo = new ClsPeriodo();

	if($obj_periodo->ValidarPeriodoAbierto()){
		// ya hay uno abierto
		$_SESSION["res"] = "ExisPeriAbrir";
	}else{
		$rs = $obj_periodo->buscarPeriodosNA();
		$tupla = $obj_periodo->converArray($rs);

		if($tupla["nom_periodo"] != ""){
			$_SESSION['id_periodo_abrir'] = $tupla["id_periodo"];
			$_SESSION['nom_periodo_abrir'] = $tupla["nom_periodo"];
			$_SESSION['fecha_inicio_abrir'] = $obj_periodo->fecha_bajada($tupla["fecha_inicio"]);
			$_SESSION['fecha_fin_abrir'] = $obj_periodo->fecha_bajada($tupla["fecha_fin"]);
		}else{
			$_SESSION["res"] = "NoHayPerioAbrir";
		}
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=abrir_periodo');
}
/* abrir periodo */
function Abr(){
	$obj_periodo = new ClsPeriodo();
	$obj_periodo->abrirPeriodo($_POST["id_periodo"]);
	$_SESSION['res'] = "ExitoAbiertPeriodo";
	$_SESSION['Nom_periodo_mostrar'] = $_POST['nom_periodo'];

	unset($_SESSION['id_periodo_abrir']);
	unset($_SESSION['nom_periodo_abrir']);
	unset($_SESSION['fecha_inicio_abrir']);
	unset($_SESSION['fecha_fin_abrir']);

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=abrir_periodo');
}

/** consultar abiertos para cerrar **/
function ConsAbiertos(){
	$obj_periodo = new ClsPeriodo();

	if($tupla = $obj_periodo->ValidarPeriodoAbiertoParaCerrar()){
		// hay uno abierto
		$fecha_fin = substr($tupla["fecha_fin"],0,4);
		$fecha_actual = substr(date("Y-j-n"),0,4);

		if( strtotime($fecha_actual) > strtotime($fecha_fin)){
		 	$_SESSION['id_periodo_cerrar'] = $tupla["id_periodo"];
		 	$_SESSION['nom_periodo_cerrar'] = $tupla["nom_periodo"];
		 	$_SESSION['fecha_inicio_cerrar'] = $obj_periodo->fecha_bajada($tupla["fecha_inicio"]);
		 	$_SESSION['fecha_fin_cerrar'] = $obj_periodo->fecha_bajada($tupla["fecha_fin"]);
		}else{
		 	//echo "no se puede cerar porque se encuentra en la fecha actual";
		 	$_SESSION["res"] = "ElPeriodIgaulFechaActual";
		}
	}else{
		$_SESSION["res"] = "NoExisPerPaCerrar";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cerrar_periodo');
}
/* cerrar periodo **/
function CRR(){
	$obj_periodo = new ClsPeriodo();
	$obj_periodo->cerrarPeriodo($_POST["id_periodo"]);

	$_SESSION['res'] = "ExitoCerrarPeriodo";

	unset($_SESSION['Nom_periodo_mostrar']);
	unset($_SESSION['id_periodo_cerrar']);
	unset($_SESSION['nom_periodo_cerrar']);
	unset($_SESSION['fecha_inicio_cerrar']);
	unset($_SESSION['fecha_fin_cerrar']);

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cerrar_periodo');
}



// function Act(){
// 	$obj_periodo = new clsPeriodo();
// 	$obj_periodo->recibirId_Peri($_POST["id_periodo"]);
// 	$obj_periodo->activar();
// 	$_SESSION['res'] = "act";
// 	$_SESSION["opActDesPeriodo"] = "act";
// 	$_SESSION['id_periodo'] = $_SESSION['antiguaoValorCodPeri'];
// 	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo");
// }
// function Mod(){
// 	$obj_periodo = new clsPeriodo();
// 	$obj_periodo->recibir($_POST["id_periodo"],$_POST["fecha_inicio"],$_POST["fecha_fin"]);
// 	$rs = $obj_periodo->buscar();

// 	/******************************************************/
// 	if($tupla = $obj_periodo->converArray($rs)){
// 	 	$_SESSION['res']='error_mod';
// 	 	$_SESSION['id_periodo'] = $_SESSION['antiguaoValorCodPeri'];
// 	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
// 	}else{
// 	 	$obj_periodo->modificar();
// 	 	// $rs2=$obj_mun->bus_est();
// 	 	// $tupla2=$obj_mun->converArray($rs2);
// 	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
// 	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
// 	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
// 	 	unset($_SESSION['id_periodo']);
// 		unset($_SESSION['fecha_inicio']);
// 		unset($_SESSION['fecha_fin']);
// 	 	$_SESSION['res'] = "mod";
// 	}
// 	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo");
	
// }
// function Des(){
// 	$obj_periodo = new clsPeriodo();
// 	$obj_periodo->recibirId_Peri($_POST["id_periodo"]);

// 	if($obj_periodo->desactivar()){
// 		$_SESSION["opActDesPeriodo"] = "des";
// 		$_SESSION['res'] = "des";
// 		unset($_SESSION['id_periodo']);
// 		unset($_SESSION['fecha_inicio']);
// 		unset($_SESSION['fecha_fin']);
// 	}else{
// 		$_SESSION["res"] = "error_des";
// 		$_SESSION['id_periodo'] = $_SESSION['antiguaoValorCodPeri'];
// 	}
// 	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo");

	
// }
// function Cons(){
// 	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
// 	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
// 	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
// 	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
// 	$obj_periodo = new clsPeriodo();
// 	$obj_periodo->recibirId_Peri($resultado[0]);
// 	$rs = $obj_periodo->consultarPorIdents();
// 	$tupla = $obj_periodo->converArray($rs);

// 	$_SESSION['id_periodo']=$tupla['id_periodo'];
// 	$_SESSION['fecha_inicio']=$obj_periodo->fecha_bajada($tupla['fecha_inicio']);
// 	$_SESSION['fecha_fin']=$obj_periodo->fecha_bajada($tupla['fecha_fin']);
// 	$_SESSION['antiguaoValorCodPeri'] = $_SESSION['id_periodo']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
// 	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
// 	// $_SESSION['id_est_p'] = $tupla['id_est'];
// 	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
// 	if($tupla['status'] == 1){
// 	  	$_SESSION["opActDesPeriodo"] = "act";
// 	}else{
// 	  	$_SESSION["opActDesPeriodo"] = "des";
// 	}
// 	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=periodo");
// }

//***************************FUNCION PARA PINTAR EL COMBO DE periodo*************************//
function PintaPeriodo($cod){
	$obj_periodo = new ClsPeriodo();
	$rs = $obj_periodo->consultarPeriodo();
	$selec = "";
	$c = 0;
	$combPeriodo=array();
			
	$combPeriodo[$c++] = "<select name='id_periodo' disabled >";
	$combPeriodo[$c++] = "<option selected='selected'>Seleccione una fecha de inicio</option>"; 

	while($tupla = $obj_periodo->converArray($rs)){
		$valor = $tupla['id_periodo'];
		$des = $tupla['fecha_inicio'];

		if($cod == $valor){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combPeriodo[$c++] = "<option value='".$valor."' ".$selec."> ".$des."</option>";
	}
	$combPeriodo[$c++] = "</select>";
	return $combPeriodo;
}
//**********************************************************************************************//
?>