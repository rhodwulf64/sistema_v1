<?php error_reporting(0);
@session_start();
 include_once('../../modelo/configuracion/m_sede.php');

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_sede = new ClsSede();
		$tupla = $obj_sede->consultar_S_O_PME_ajax($_POST["status"],$_POST["sede"]);
		$c = 1;
		$contenido="";
		while($rs = $obj_sede->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					$contador[$c] = $rs["id_sed"];
					$contador2[$c] = $rs["id_parroq"];
					$contador3[$c] = $rs["id_mun"];
					$contador4[$c] = $rs["id_est"];
					$contador5[$c] = $rs["id_org"];
					 	//$td = $c;
				$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$contador2[$c].'.'.$contador3[$c].'.'.$contador4[$c].'.'.$contador5[$c].'")>
							<td> '.$c.'</td>
							<td> '.$rs["cod_sed"].' - '.$rs["nom_sed"].'</td>
							<td> '.$rs["cod_org"].' - '.$rs["nom_org"].'</td>
							<td> '.$rs["cod_ud"].' - '.$rs["nom_ud"].'</td>
							<td> '.$rs["nom_parroq"].' - '.$rs["nom_mun"].' - '.$rs["nom_est"].'</td>
							<td> <span id="'.$status.'">'.$status.'</span> </td>
							<td><button type="button" value="'.$contador[$c].'.'.$contador2[$c].'.'.$contador3[$c].'.'.$contador4[$c].'.'.$contador5[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
						</tr>';
				$c++;
			}//cierre while
		if($contenido!="")
			echo $contenido;
		else
			echo "<td colspan='7'><span class='no-hay-datos-mostrar'>NO SE ENCONTRARON DATOS</span> </td>";
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
		unset($_SESSION['id_sede']);
		unset($_SESSION['cod_sed']);
		unset($_SESSION['nom_sed']);
		
		unset($_SESSION['id_parroquia']);
		unset($_SESSION['comb_org']);
		unset($_SESSION['sta_sed']);
		unset($_SESSION["opActDesSede"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=sede');break;
	 }
}//cierro la comprovasion de si existe la variable

 function Incluir(){
	$obj_sede = new ClsSede();
	$obj_sede->recibirTodo($_POST);
	$rs = $obj_sede->consultar();

    if($tupla = $obj_sede->converArray($rs)){
    	$_SESSION['res']="yaexiste";
    }else{
    	$obj_sede->incluir();
		$_SESSION['res']="registrado";
    }
  	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=sede'); 
}

 function Modificar(){
	/********************************************************/
	$obj_sede = new ClsSede();
	$obj_sede->recibirTodo($_POST);
	$rs = $obj_sede->ConsultarPorDescripcion();

	/******************************************************/
	if($tupla = $obj_sede->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['id_sede'] = $_SESSION['antiguaoValorCodSede'];
	 	$_SESSION['id_parroquia'] = $_SESSION['antiguaoValorCodParr'];
	 	$_SESSION['comb_org'] = $_SESSION['antiguaoValorCodOrg'];
	}else{
	 	$obj_sede->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION['id_sede']);
		unset($_SESSION['nom_sed']);
		unset($_SESSION['cod_sed']);
		unset($_SESSION['id_parroquia']);
		unset($_SESSION['comb_org']);

	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=sede');
}
function Activar(){
 	$obj_sede = new ClsSede();
	$obj_sede->recibirId($_POST['id_sede']);
	$obj_sede->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesSede"] = "act";
	$_SESSION['id_sede'] = $_SESSION['antiguaoValorCodSede'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=sede');
}
function Desactivar(){
 	$obj_sede = new ClsSede();
	$obj_sede->recibirId($_POST['id_sede']);

	if($obj_sede->desactivar()){
		$_SESSION["opActDesSede"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION['id_sede']);
		unset($_SESSION['nom_sed']);
		unset($_SESSION['cod_sed']);
		unset($_SESSION['id_parroquia']);
		unset($_SESSION['comb_org']);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['id_parroquia'] = $_SESSION['antiguaoValorCodParr'];
		$_SESSION['comb_org'] = $_SESSION['antiguaoValorCodOrg'];
		$_SESSION['id_sede'] = $_SESSION['antiguaoValorCodSede'];
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=sede');
}
function Consultar(){
	if(isset($_POST['ident'])){
		$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
		// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
		// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
		// ejemplo del explode -> $resultado[1]; // codigo2 del estado
		$obj_sede = new ClsSede();
		$obj_sede->recibirIdents($resultado[0],$resultado[1],$resultado[2]);
		$rs = $obj_sede->consultarPorIdents();
		$tupla = $obj_sede->converArray($rs);

		$_SESSION['id_sede']=$tupla['id_sed'];
		$_SESSION['nom_sed']=$tupla['nom_sed'];
		$_SESSION['cod_sed']=$tupla['cod_sed'];
		$_SESSION['id_parroquia']=$tupla['id_parroq'];
		$_SESSION['comb_org']=$tupla['id_org'];

		$_SESSION['antiguaoValorCodSede'] = $_SESSION['id_sede'];
		$_SESSION['antiguaoValorCodParr'] = $_SESSION['id_parroquia'];
		$_SESSION['antiguaoValorCodOrg'] = $_SESSION['comb_org']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
		// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
		// $_SESSION['id_est_p'] = $tupla['id_est'];
		// $_SESSION['nom_est_p'] = $tupla['nom_est'];
		if($tupla['status'] == 1){
		  	$_SESSION["opActDesSede"] = "act";
		}else{
		  	$_SESSION["opActDesSede"] = "des";
		}
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=sede');
	}//cierre comprobacion isset de ident
	
}
	//***********************************FUNCTION PARA EL COMBO DEL CODIGO DE LA SEDE************************//

		function PintaSede($cod){
			$obj_sede = new ClsSede();
			$rs = $obj_sede->consultarSede();
			$c = 0;
			$combSede=array();
			$combSede[$c++] = "<select name='cod_sed' disabled >";
			$combSede[$c++] = "<option selected='selected'>SELECCIONE LA SEDE</option>";
			while($tupla = $obj_sede->converArray($rs)){
				$valor = $tupla['id_sed'];
				$des = $tupla['nom_sed'];
					if($cod == $valor){
						$selec = "selected='selected'";
					}else{
						$selec = "";
					}
					$combSede[$c++]="<option value='".$valor."' ".$selec." >".$des."</option>";
			}
			$combSede[$c++]="</select>";
			return $combSede;
		}
		

	//^*******************************************************************************************************//
		//**********************************CONTROL PARA EL COMBO DEl organismo******************************//
		function PintaOrg($cod){
			$obj_org=new ClsSede();
			$rs=$obj_org->consultar_org();
			$selec="";
			$c=0;
			$combOrg=array();
			$combOrg[$c++]="<select class='CampoMov' name='comb_org' disabled>";
			$combOrg[$c++]="<option selected='selected'>SELECCIONE lA UNIDAD ADMINISTRADORA</option>";
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