<?php error_reporting(0);
error_reporting(0);
@session_start();
include_once('../../modelo/configuracion/m_municipio.php');

//esto es para la busqueda rapida con ajax

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_municipio = new ClsMunicipio();
		$tupla = $obj_municipio->Consultar_M_E_Ajax($_POST["status"],$_POST["municipio"]);
		$c=1;
		$contenido="";
		while($rs = $obj_municipio->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
				$contador[$c] = $rs["id_mun"];
				$contador1[$c] = $rs["id_est"];
				//$td = $c;
				$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$contador1[$c].'")>
				<td> '.$c.'</td>
				<td> '.$rs["nom_mun"].'</td>
				<td> '.$rs["nom_est"].'</td>
				<td> <span id="'.$status.'">'.$status.'</span> </td>
				<td><button type="button" value="'.$contador[$c].'.'.$contador1[$c].'" title="clic para consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
				</tr>';
			$c++;
		}
		if($contenido!="")
			echo $contenido;
		else
			echo "<td colspan='6'> <span class='no-hay-datos-mostrar'> NO &nbsp;SE &nbsp;ENCONTRARON &nbsp;DATOS </span> </td>";
	}
}else{
	if(isset( $_POST['temp'])) 
		@$op = $_POST['temp'];
			else
				@$op = 'Consultar';


	//***************************************Control para la botonera ******************************//
	switch ($op){
		case "Incluir":Inc();break;
		case "Modificar":Mod();break;
		case "Consultar":Cons();break;
		case "Desactivar":Des();break;
		case "Activar":Act();break;
		case "Cancelar":
		unset($_SESSION['cod_mun']);
		unset($_SESSION['nom_mun']);
		unset($_SESSION['cod_est_m']);
		unset($_SESSION['des_est_m']);
		unset($_SESSION['opActDesMunicipio']);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=municipio'); break;
	}
}//cierro la comprovasion de si existe la variable

function Inc(){
	$obj_mun = new ClsMunicipio();
	$obj_mun->recibir2($_POST['nom_mun'],$_POST['cod_est_m']);
	$rs = $obj_mun->ConsultarPorDescripcion();

    if($tupla = $obj_mun->converArray($rs)){
   		$_SESSION['res'] = "yaexiste";
    }else{
   		$obj_mun->incluir();
		$_SESSION['res'] = "registrado";
    }
    header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=municipio');
}

function Act(){
	$obj_mun=new ClsMunicipio();
	$obj_mun->recibir($_POST['cod_mun'],$_POST['nom_mun']);
	$obj_mun->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesMunicipio"] = "act";
	$_SESSION['cod_est_m'] = $_SESSION['antiguaoValorCodEst'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=municipio');
}
function Mod(){
	$obj_mun = new ClsMunicipio();
	$obj_mun->recibir($_POST['cod_mun'],$_POST['nom_mun'],$_POST['cod_est_m']);
	$rs = $obj_mun->ConsultarPorDescripcion();

	if($tupla = $obj_mun->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['cod_est_m'] = $_SESSION['antiguaoValorCodEst'];
	}else{
	 	$obj_mun->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION["cod_mun"]);
	 	unset($_SESSION["nom_mun"]);
	 	unset($_SESSION["cod_est_m"]);
	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=municipio');
}
function Des(){
	$obj_mun = new ClsMunicipio();
	$obj_mun->recibirCod($_POST['cod_mun']);

	if($obj_mun->desactivar()){
		$_SESSION["opActDesMunicipio"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION["cod_est_m"]);
		unset($_SESSION["nom_mun"]);
		unset($_SESSION["cod_mun"]);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['cod_est_m'] = $_SESSION['antiguaoValorCodEst'];
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=municipio');
}
function Cons(){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_mun = new ClsMunicipio();
	$obj_mun->recibirIdents($resultado[0],$resultado[1]);
	$rs = $obj_mun->consultarPorIdents();
	$tupla = $obj_mun->converArray($rs);

	$_SESSION['cod_mun']=$tupla['id_mun'];
	$_SESSION['nom_mun']=$tupla['nom_mun'];
	$_SESSION['cod_est_m']=$tupla['id_est'];
	$_SESSION['antiguaoValorCodEst'] = $_SESSION['cod_est_m']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado

if(isset($tupla['status'])){
	if($tupla['status'] == 1){
	 	$_SESSION["opActDesMunicipio"] = "act";
	}else{
	 	$_SESSION["opActDesMunicipio"] = "des";
	}
}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=municipio");
}

//***************************FUNCION PARA PINTAR EL COMBO DE MUNICIPIO*************************//
function PintaMunicipio($cod){
	$obj_mum = new ClsMunicipio();
	$rs = $obj_mum->consultarMunicipioEstado();
	$selec = "";
	$c = 0;

	$combMunicipio[$c++] = "<select class='CampoMov' name='cod_mun' disabled >";
	$combMunicipio[$c++] = "<option selected='selected'>SELECCIONE UN MUNICIPIO</option>"; 

	while($tupla = $obj_mum->converArray($rs)){
		$estado = $tupla['nom_est'];
		$id_mun = $tupla['id_mun'];
		$nom_mun_p = $tupla['nom_mun'].' - ';

		if($cod == $id_mun){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combMunicipio[$c++] = "<option value='".$id_mun."' ".$selec."> ".$nom_mun_p." EDO - ".$estado."</option>";
	}
	$combMunicipio[$c++] = "</select>";
	return $combMunicipio;
}
//**********************************************************************************************//
?>