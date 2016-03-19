<?php error_reporting(0);
include_once('../../modelo/configuracion/m_condicion.php');
@session_start();

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_condicion = new clsCondicion();
		$tupla = $obj_condicion->consultar_Ajax($_POST["status"],$_POST["condicion"]);
		$c=1;
		$contenido="";
		while($rs = $obj_condicion->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
				$contador[$c] = $rs["id_cond"];

				$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
							<td> '.$c.'</td>
							<td> '.$rs["nom_cond"].'</td>
							<td> <span id="'.$status.'">'.$status.'</span> </td>
							<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
						</tr>';
				$c++;
			}//cierre del while
		if($contenido!="")
			echo $contenido;
		else
			echo "<td colspan='4'><span class='no-hay-datos-mostrar'>NO SE ENCONTRARON DATOS</span> </td>";
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
		case "Desactivar": Des(); break;
		case "Cancelar":
		unset($_SESSION['cod_cond']);
		unset($_SESSION['nom_cond']);
		unset($_SESSION["opActDesCondicion"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=condicion');break;
	}
}//cierro la comprovasion de si existe la variable


function Inc(){
    $obj_condicion = new clsCondicion();
	$obj_condicion->recibir2($_POST["nom_cond"]);
	$rs = $obj_condicion->buscar();

    if($tupla = $obj_condicion->converArray($rs)){
    	$_SESSION['res'] = "yaexiste";
    }else{
    	$obj_condicion->incluir();
		$_SESSION['res'] = "registrado";
    }
 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=condicion');
}
function Bus(){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_condicion = new clsCondicion();
	$obj_condicion->recibir_Cod($resultado[0]);
	$rs = $obj_condicion->consultarPorIdents();
	$tupla = $obj_condicion->converArray($rs);

	$_SESSION['cod_cond']=$tupla['id_cond'];
	$_SESSION['nom_cond']=$tupla['nom_cond'];
	$_SESSION['antiguaoValorCodCond'] = $_SESSION['cod_cond']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
	if($tupla['status'] == 1){
	  	$_SESSION["opActDesCondicion"] = "act";
	}else{
	  	$_SESSION["opActDesCondicion"] = "des";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=condicion");
}
function Mod(){
	$obj_condicion = new clsCondicion();
	$obj_condicion->recibir($_POST["cod_cond"],$_POST["nom_cond"]);
	$rs = $obj_condicion->buscar();

	/******************************************************/
	if($tupla = $obj_condicion->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['cod_cond'] = $_SESSION['antiguaoValorCodCond'];
	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
	}else{
	 	$obj_condicion->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION['cod_cond']);
		unset($_SESSION['nom_cond']);
	 	$_SESSION['res'] = "mod";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=condicion");
}
function Act(){
	$obj_condicion = new clsCondicion();
	$obj_condicion->recibir_Cod($_POST["cod_cond"]);
	$obj_condicion->activar();
	$_SESSION['res'] = "act";
	$_SESSION["opActDesCondicion"] = "act";
	$_SESSION['cod_cond'] = $_SESSION['antiguaoValorCodCond'];
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=condicion");
}
function Des(){
	$obj_condicion = new clsCondicion();
	$obj_condicion->recibir_Cod($_POST["cod_cond"]);

	if($obj_condicion->desactivar()){
		$_SESSION["opActDesCondicion"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION['cod_cond']);
		unset($_SESSION['nom_cond']);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['cod_cond'] = $_SESSION['antiguaoValorCodCond'];
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=condicion");
}

function DibCombCondicion($cod_cond){
	$obj_condicion = new clsCondicion();
	$rs = $obj_condicion->consultar();

	$arreglo = array();
	$cont = 0;

	$arreglocondicion[$cont++] = "<select name='cond' disabled='disabled'>";
	$arreglocondicion[$cont++] = "<option selected='selected'>Seleccione una Condicion</option>";

	while($tupla = $obj_condicion->converArray($rs)){
		$cod_cond = $tupla["id_cond"];
		$descripcion = $tupla["nom_cond"];

		if($cod_cond == $cod_cond){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$arreglocondicion[$cont++] = "<option value='".$cod_cond."' ".$selec."> ".$descripcion."</option>";
	}

	$arreglocondicion[$cont++] = "</select>";
	return $arreglocondicion;
}
?>