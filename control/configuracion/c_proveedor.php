<?php error_reporting(0);
include_once('../../modelo/configuracion/m_proveedor.php');
@session_start();

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_proveedor = new clsProveedor();
		$tupla = $obj_proveedor->consultar_Ajax($_POST["status"],$_POST["proveedor"]);
		$c=1;
		$contenido = "";
		while($rs = $obj_proveedor->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
				$contador[$c] = $rs["id_prov"];
				$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
							<td> '.$c.'</td>
							<td> '.$rs["des_prov"].'</td>
							<td> '.$rs["rif_prov"].'</td>
							<td> <span id="'.$status.'">'.$status.'</span> </td>
							<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
						</tr>';
				$c++;
			}//cierre del while
		if($contenido!="")
			echo $contenido;
		else
			echo "<td colspan='6'><span class='no-hay-datos-mostrar'>NO SE ENCONTRARON DATOS</span> </td>";
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
		unset($_SESSION['cod_prov']);
		unset($_SESSION['des_prov']);
		unset($_SESSION['prov_rif']);
		unset($_SESSION["opActDesProveedor"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=proveedor');break;
	}
}//cierro la comprovasion de si existe la variable


function Inc(){
	$obj_proveedor = new clsProveedor();
	$obj_proveedor->recibir($_POST["cod_prov"],$_POST["des_prov"],$_POST["prov_rif"]);
	$rs=$obj_proveedor->buscar();
    if($tupla=$obj_proveedor->converArray($rs)){
    	if($tupla['status']==1 || $tupla['status']==0){
    		$_SESSION['res']="yaexiste";
    		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=proveedor');
    	}
    }else{
    	$obj_proveedor->incluir();
    	$_SESSION['res']="registrado";
	    header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=proveedor');
    }
}
function Bus(){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_proveedor = new clsProveedor();
	$obj_proveedor->recibirId_Prov($resultado[0]);
	$rs = $obj_proveedor->consultarPorIdents();
	$tupla = $obj_proveedor->converArray($rs);

	$_SESSION['cod_prov']=$tupla['id_prov'];
	$_SESSION['des_prov']=$tupla['des_prov'];
	$_SESSION['prov_rif']=$tupla['rif_prov'];
	$_SESSION['antiguaoValorCodProv'] = $_SESSION['cod_prov']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
	if($tupla['status'] == 1){
	  	$_SESSION["opActDesProveedor"] = "act";
	}else{
	  	$_SESSION["opActDesProveedor"] = "des";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=proveedor");
}
function Mod(){
	$obj_proveedor = new clsProveedor();
	$obj_proveedor->recibir($_POST["cod_prov"],$_POST["des_prov"],$_POST["prov_rif"]);
	$rs = $obj_proveedor->buscar();
	if($tupla = $obj_proveedor->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['cod_prov'] = $_SESSION['antiguaoValorCodProv'];
	 
	}else{
	 	$obj_proveedor->modificar();
	 
	 	unset($_SESSION['cod_prov']);
		unset($_SESSION['des_prov']);
		unset($_SESSION['prov_rif']);
	 	$_SESSION['res'] = "mod";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=proveedor");
}
function Act(){
	$obj_proveedor = new clsProveedor();
	$obj_proveedor->recibir($_POST["cod_prov"],$_POST["des_prov"],$_POST["prov_rif"]);
	$obj_proveedor->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesProveedor"] = "act";
	$_SESSION['cod_prov'] = $_SESSION['antiguaoValorCodProv'];
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=proveedor");
}
function Des(){
	$obj_proveedor = new clsProveedor();
	$obj_proveedor->recibirId_Prov($_POST["cod_prov"]);
	$obj_proveedor->desactivar();
		//$_SESSION["opActDesProveedor"] = "des";
	$_SESSION['res'] = "des";
	unset($_SESSION['cod_prov']);
	unset($_SESSION['des_prov']);
	unset($_SESSION['prov_rif']);
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=proveedor");
}

function DibCombProveedor($cod){
	$obj_proveedor = new clsProveedor();
	$rs = $obj_proveedor->consultarStatusActivos();

	$arreglo = array();
	$cont = 0;

	$arregloproveedor[$cont++] = "<select name='cod_prov' disabled='disabled' class='CampoMov'>";
	$arregloproveedor[$cont++] = "<option value='selec' disabled='disabled' selected='selected'>SELECCIONE UN PROVEEDOR</option>";

	while($tupla = $obj_proveedor->converArray($rs)){
		$cod_prov = $tupla["id_prov"];
		$descripcion = $tupla["des_prov"];

		if($cod_prov == $cod){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$arregloproveedor[$cont++] = "<option value='".$cod_prov."' ".$selec."> ".$descripcion."</option>";
	}

	$arregloproveedor[$cont++] = "</select>";
	return $arregloproveedor;
}
?>