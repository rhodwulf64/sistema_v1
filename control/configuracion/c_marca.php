<?php error_reporting(0);
include_once('../../modelo/configuracion/m_marca.php');
@session_start();


if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_marca = new clsMarca();
		$tupla = $obj_marca->consultar_Ajax($_POST["status"],$_POST["marca"]);
		$c=1;
		$contenido="";
		while($rs = $obj_marca->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					$contador[$c] = $rs["id_marca"];
				$contenido.='<tr onclick=ejecuta("'.$contador[$c].'")>
							<td> '.$c.'</td>
							<td> '.$rs["nom_marca"].'</td>
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
		case "Incluir":   Inclu(); break;
		case "Consultar": Busc(); break;
		case "Modificar": Modifi(); break;
		case "Activar": Activa(); break;
		case "Desactivar": Desactiva(); break;
		case "Cancelar":
		unset($_SESSION['cod_marca']);
		unset($_SESSION['nom_marca']);
		unset($_SESSION["opActDesMarca"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=marca');break;
	}
}//cierro la comprovasion de si existe la variable

function Inclu(){
	$obj_marca = new clsMarca();
	$obj_marca->recibir2($_POST["nom_marca"]);
	$rs = $obj_marca->buscar();

    if($tupla = $obj_marca->converArray($rs)){
    	$_SESSION['res']="yaexiste";
    }else{
    	$obj_marca->incluir();
		$_SESSION['res']="registrado";
    }
 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=marca');
}
function Busc(){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_marca = new clsMarca();
	$obj_marca->recibirId_Mar($resultado[0]);
	$rs = $obj_marca->consultarPorIdents();
	$tupla = $obj_marca->converArray($rs);

	$_SESSION['cod_marca']=$tupla['id_marca'];
	$_SESSION['nom_marca']=$tupla['nom_marca'];
	$_SESSION['antiguaoValorCodMar'] = $_SESSION['cod_marca']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
	if($tupla['status'] == 1){
	  	$_SESSION["opActDesMarca"] = "act";
	}else{
	  	$_SESSION["opActDesMarca"] = "des";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=marca");
}
function Modifi(){
	$obj_marca = new clsMarca();
	$obj_marca->recibir($_POST["cod_marca"],$_POST["nom_marca"]);
	$rs = $obj_marca->buscar();

	/******************************************************/
	if($tupla = $obj_marca->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['cod_marca'] = $_SESSION['antiguaoValorCodMar'];
	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
	}else{
	 	$obj_marca->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION['cod_marca']);
		unset($_SESSION['nom_marca']);
	 	$_SESSION['res'] = "mod";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=marca");
}
function Activa(){
	$obj_marca = new clsMarca();
	$obj_marca->recibirId_Mar($_POST["cod_marca"]);
	$obj_marca->activar();
	$_SESSION['res'] = "act";
	$_SESSION["opActDesMarca"] = "act";
	$_SESSION['cod_marca'] = $_SESSION['antiguaoValorCodMar'];
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=marca");
}
function Desactiva(){
	$obj_marca = new clsMarca();
	$obj_marca->recibirId_Mar($_POST["cod_marca"]);

	if($obj_marca->desactivar()){
		$_SESSION["opActDesMarca"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION['cod_marca']);
		unset($_SESSION['nom_marca']);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['cod_marca'] = $_SESSION['antiguaoValorCodMar'];
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=marca");

}

function DibCombMarca($cod){
	$obj_marca = new clsMarca();
	$rs = $obj_marca->consultarActivos();

	$arreglo = array();
	$cont = 0;

	$arreglomarca[$cont++] = "<select id='cod_marca' name='cod_marca' disabled='disabled' class='CampoMov'>";
	//$arreglomarca[$cont++] = "<option value='0' selected='selected'>Ninguna Marca</option>";

	while($tupla = $obj_marca->converArray($rs)){
		$cod_marca = $tupla["id_marca"];
		$descripcion = $tupla["nom_marca"];

		if($cod_marca == $cod){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$arreglomarca[$cont++] = "<option value='".$cod_marca."' ".$selec."> ".$descripcion."</option>";
	}

	$arreglomarca[$cont++] = "</select>";
	return $arreglomarca;
}
?>