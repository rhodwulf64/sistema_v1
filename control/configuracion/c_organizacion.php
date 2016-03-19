<?php error_reporting(0);
@session_start();
include_once('../../modelo/configuracion/m_organizacion.php');

//esto es para la busqueda rapida con ajax
if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_org = new ClsOrganizacion();
		$tupla = $obj_org->consultar_org_Ajax($_POST["status"],$_POST["organismo"]);
		$c=1;
		$contenido="";
		while($rs = $obj_org->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
			$contador[$c] = $rs["id_org"];
				$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
							<td> '.$c.'</td>
							<td> '.$rs["cod_org"].' - '.$rs["nom_org"].'</td>
							<td> '.$rs["cod_ud"].' - '.$rs["nom_ud"].'</td>
							<td> <span id="'.$status.'">'.$status.' </span></td>
							<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
						</tr>';
				$c++; 
		}
		if($contenido!="")
			echo $contenido;
		else
			echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO &nbsp;SE &nbsp;ENCONTRARON &nbsp;DATOS</span> </td>";
	}
}else{
	if(isset( $_POST['temp'])) 
		@$op = $_POST['temp'];
			else
				@$op = 'Consultar';


	//***************************************Control para la botonera ******************************//
	 switch ($op) {
		case "Incluir":	   Incluir();break;
		case "Modificar":  Modificar();break;
		case "Consultar":  Consultar();break;
		case "Activar":    Activar();break;
		case "Desactivar": Desactivar();break;
		case "Cancelar":
		unset($_SESSION['id_org']);
		unset($_SESSION['nom_org']);
		unset($_SESSION['cod_org']);
		
		unset($_SESSION['nom_ud']);
		unset($_SESSION['cod_ud']);
		unset($_SESSION['sta_sed']);
		unset($_SESSION["opActDesOrganismo"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=organizacion');break;
	 }
}//cierro la comprovasion de si existe la variable

function Incluir(){
	$obj_organizacion = new ClsOrganizacion();
	$obj_organizacion->recibirTodosMenosId($_POST['cod_org'],$_POST['nom_org'],$_POST['cod_ud'],$_POST['nom_ud']);
	$rs = $obj_organizacion->ConsultarPorTodoMenosId();

    if($tupla = $obj_organizacion->converArray($rs)){
    	$_SESSION['res']="yaexiste";
    }else{
    	$obj_organizacion->incluir();
		$_SESSION['res']="registrado";
    }
 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=organizacion'); 
}

function Modificar(){
	/***********************************************************************************/
	$obj_organizacion = new ClsOrganizacion();
	$obj_organizacion->recibir($_POST['id_org'],$_POST['cod_org'],$_POST['nom_org'],$_POST['cod_ud'],$_POST['nom_ud']);
	$rs = $obj_organizacion->ConsultarPorTodoMenosId();

	/******************************************************/
	if($tupla = $obj_organizacion->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['id_org'] = $_SESSION['antiguaoValoridOrg'];
	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
	}else{
	 	$obj_organizacion->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION["id_org"]);
	 	unset($_SESSION["cod_org"]);
	 	unset($_SESSION["nom_org"]);
	 	unset($_SESSION["cod_ud"]);
	 	unset($_SESSION["nom_ud"]);
	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=organizacion');
}
function Activar(){
 	$obj_organizacion = new ClsOrganizacion();
	$obj_organizacion->recibirId_org($_POST['id_org']);
	$obj_organizacion->activar();
	$_SESSION['res'] = "act";
	$_SESSION["opActDesOrganismo"] = "act";
	$_SESSION['id_org'] = $_SESSION['antiguaoValoridOrg'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=organizacion');
}
function Desactivar(){
	$obj_organizacion = new ClsOrganizacion();
	$obj_organizacion->recibirId_org($_POST['id_org']);

	if($obj_organizacion->desactivar()){
		$_SESSION["opActDesOrganismo"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION["id_org"]);
	 	unset($_SESSION["cod_org"]);
	 	unset($_SESSION["nom_org"]);
	 	unset($_SESSION["cod_ud"]);
	 	unset($_SESSION["nom_ud"]);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['id_org'] = $_SESSION['antiguaoValoridOrg'];
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=organizacion');
}
function Consultar(){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_organizacion = new ClsOrganizacion();
	$obj_organizacion->recibirId_org($resultado[0]);
	$rs = $obj_organizacion->consultarPorIdents();
	$tupla = $obj_organizacion->converArray($rs);

	$_SESSION['id_org']=$tupla['id_org'];
	$_SESSION['cod_org']=$tupla['cod_org'];
	$_SESSION['nom_org']=$tupla['nom_org'];
	$_SESSION['nom_ud']=$tupla['nom_ud'];
	$_SESSION['cod_ud']=$tupla['cod_ud'];
	$_SESSION['antiguaoValoridOrg'] = $_SESSION['id_org']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
if(isset($tupla['status'])){
	if($tupla['status'] == 1){
	  	$_SESSION["opActDesOrganismo"] = "act";
	}else{
	  	$_SESSION["opActDesOrganismo"] = "des";
	}
}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=organizacion");
}
	//***********************************FUNCTION PARA EL COMBO DEL CODIGO DE LA organizacion************************//

		function Pintaorganizacion($cod){
			$obj_organizacion = new ClsOrganizacion();
			$rs = $obj_organizacion->consultarorganizacion();
			$c = 0;
			$comborganizacion=array();
			$comborganizacion[$c++] = "<select name='nom_org' disabled >";
			$comborganizacion[$c++] = "<option selected='selected'>Seleccione la organizacion</option>";
			while($tupla = $obj_organizacion->converArray($rs)){
				$valor = $tupla['id_org'];
				$des = $tupla['nom_ud'];
					if($cod == $valor){
						$selec = "selected='selected'";
					}else{
						$selec = "";
					}
					$comborganizacion[$c++]="<option value='".$valor."' ".$selec." >".$des."</option>";
			}
			$comborganizacion[$c++]="</select>";
			return $comborganizacion;
		}
		

	//^*******************************************************************************************************//
		//**********************************CONTROL PARA EL COMBO DEl organismo******************************//
		function PintaOrg($cod){
			$obj_org=new ClsOrganizacion();
			$rs=$obj_org->consultar_org();
			$selec="";
			$c=0;
			$combOrg=array();
			$combOrg[$c++]="<select name='cod_ud' disabled >";
			$combOrg[$c++]="<option selected='selected'>Seleccione la Unidad Administrativa</option>";
			while($tupla=$obj_org->converArray($rs)){
				$valor=$tupla['id_org'];
				$des=$tupla['nom_ud'];
					if($cod==$valor){
						$selec="selected='selected'";
					}else{
						$selec="";
					}
					$combOrg[$c++]="<option value='".$valor."' ".$selec." >".$des."</option>";
			}
			$combOrg[$c++]="</select>";
			return $combOrg;
		}

	//*******************************FIN DEL COMBO CIUDAD********************************************//
?>