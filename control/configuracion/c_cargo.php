<?php error_reporting(0);
include_once('../../modelo/configuracion/m_cargo.php');
include_once("../../public/lib/Zebra_Pagination.php");  //Paginacion 
@session_start();

//esto es para la busqueda rapida con ajax
if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){

	$obj_cargo = new clsCargo();
	$paginacion = new Zebra_Pagination();
	
	$total_cargos = $obj_cargo->CountRegistros();
	$cantidad_mostrar = 6; // limite 
	$indice = ((1- 1) * $cantidad_mostrar); // arreglar el primer uno tiene que ser una variable de paginacion no un 1 estatico OJO
	/** carga la data de sebra pagination **/
	
	$paginacion->records($total_cargos); // cantidad total de registro
	$paginacion->records_per_page($cantidad_mostrar); // mostrar cuantos registros queremos en cada pagina
	$paginacion->padding(false);

	$tupla = $obj_cargo->consultar_Ajax($_POST["status"],$_POST["cargo"],$indice,$cantidad_mostrar);

	$c=1;
	$contenido = "";
	while($rs = $obj_cargo->converArray($tupla)){
		if($rs["status"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
			$contador[$c] = $rs["id_car"];
			$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
						<td> '.$c.'</td>
						<td> '.$rs["nom_car"].'</td>
						<td> <span id="'.$status.'">'.$status.' </span></td>
						<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
					</tr>';
				$c++; 
			}
			if($contenido!="")
				echo $contenido;
			else
				echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>";
	}
}else{
	if(isset( $_POST['temp'])) 
		@$op = $_POST['temp'];
			else
				@$op = 'Consultar';


	//***************************************Control para la botonera ******************************//
	switch ($op) {
		case "Incluir":   Inc(); break;
		case "Consultar": Bus(); break;
		case "Modificar": Mod(); break;
		case "Activar": Act(); break;
		case "paginacionAjax": PagAjax(); break;
		case "Desactivar": Des(); break;
		case "Cancelar":
		unset($_SESSION['cod']);
		unset($_SESSION['car']);
		unset($_SESSION["opActDesCargo"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cargo');break;
	}
}//cierro la comprovasion de si existe la variable

function PagAjax(){
	$obj_cargo = new clsCargo();
	$paginacion = new Zebra_Pagination();
	
	$total_cargos = $obj_cargo->CountRegistros();
	$cantidad_mostrar = 6; // limite 
	$indice = (($_POST["nroPaginacion"]- 1) * $cantidad_mostrar);
	/** carga la data de sebra pagination **/
	
	$paginacion->records($total_cargos); // cantidad total de registro
	$paginacion->records_per_page($cantidad_mostrar); // mostrar cuantos registros queremos en cada pagina
	$paginacion->padding(false);

	$tupla = $obj_cargo->consultar($indice,$cantidad_mostrar);

	while($rs = $obj_cargo->converArray($tupla)){
	 	if($rs["status"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
	 	$contador[$c] = $rs["id_car"];
		$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
					<td> '.$rs["id_car"].'</td>
					<td> '.$rs["nom_car"].'</td>
					<td> <span id="'.$status.'">'.$status.' </span></td>
					<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
				</tr>';
		$c++; 
	}
	if($contenido!=""){
		echo $contenido;
	}
}
function Inc(){
	$obj_cargo = new clsCargo();
	$obj_cargo->recibir($_POST["cod"],$_POST["car"]);
	$rs=$obj_cargo->buscarPorDescripcion();
    if($tupla=$obj_cargo->converArray($rs)){
    	$_SESSION['res']="yaexiste";
 
    }else{
    	$obj_cargo->incluir();
    	$_SESSION['res']="registrado";
    }
	    header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cargo');
}
function Bus(){
if(isset($_POST["ident"])){
	$obj_cargo = new clsCargo();
	$obj_cargo->recibir2($_POST["ident"]);
	$rs = $obj_cargo->buscar();
	$tupla = $obj_cargo->converArray($rs);

	$_SESSION['cod']=$tupla['id_car'];
	$_SESSION['car']=$tupla['nom_car']; 

	if(isset($tupla['status'])){
		if($tupla['status'] == 1){
			$_SESSION["opActDesCargo"] = "act";
		}else{
			$_SESSION["opActDesCargo"] = "des";
		}
	}

	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cargo");
}
}
function Mod(){
	$obj_cargo = new clsCargo();
	$obj_cargo->recibir($_POST["cod"],$_POST["car"]);
	$rs = $obj_cargo->buscarPorDescripcion();
	$tupla = $obj_cargo->converArray($rs);
	if($tupla['nom_car']==$_POST['car']){//comparo la tupla con el form sino son iguales modifico
		$_SESSION['res'] = "error_mod";
		header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cargo");
	}else{
		$obj_cargo->modificar();
		// $rs2=$obj_cargo->mod_nom();
		// $tupla2=$obj_cargo->converArray($rs2);
		// $_SESSION['car']=$tupla2['nom_car'];
		unset($_SESSION['cod']);
		unset($_SESSION['car']);
		$_SESSION['res']="mod";
	}
	
	
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cargo");
}
function Act(){
	$obj_cargo = new clsCargo();
	$obj_cargo->recibir($_POST["cod"],$_POST["car"]);
	$obj_cargo->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesCargo"] = "act";
	// unset($_SESSION['cod']);
	// unset($_SESSION['car']);
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cargo");
}
function Des(){
	$obj_cargo = new clsCargo();
	$obj_cargo->recibir($_POST["cod"],$_POST["car"]);

	if($obj_cargo->desactivar()){
		$_SESSION["opActDesCargo"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION['cod']);
		unset($_SESSION['car']);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['id_mun'] = $_SESSION['antiguaoValorCodMun'];
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=cargo");
}

function DibCombCargo($cod){
	$obj_cargo = new clsCargo();
	$rs = $obj_cargo->consultarStatus();

	$arreglotbien = array();
	$cont = 0;

	$arregloCargo[$cont++] = "<select name='car' class='CampoMov' disabled='disabled'>";
	$arregloCargo[$cont++] = "<option value='seleccione' selected='selected'>SELECCIONE CARGO</option>";

	while($tupla = $obj_cargo->converArray($rs)){
		$codigo = $tupla["id_car"];
		$descripcion = $tupla["nom_car"];

		if($codigo == $cod){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$arregloCargo[$cont++] = "<option value='".$codigo."' ".$selec."> ".$descripcion."</option>";
	}

	$arregloCargo[$cont++] = "</select>";
	return $arregloCargo;
}
?>