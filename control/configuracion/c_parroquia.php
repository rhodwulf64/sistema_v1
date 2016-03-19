<?php error_reporting(0);
error_reporting(0);
@session_start();
include_once('../../modelo/configuracion/m_parroquia.php');

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_parroquia = new Clsparroquia();
		$tupla = $obj_parroquia->Consultar_P_M_E_Ajax($_POST["status"],$_POST["parroquia"]);
		$c=1;
		$contenido="";
		while($rs = $obj_parroquia->converArray($tupla)){
		 	if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
		 	$contador[$c] = $rs["id_parroq"];
		 	$contador2[$c] = $rs["id_mun"];
		 	$contador3[$c] = $rs["id_est"];
		 	$td = $c;
			$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$contador2[$c].'.'.$contador3[$c].'")>
						<td> '.$c.'</td>
						<td> '.$rs["nom_parroq"].'</td>
						<td> '.$rs["nom_mun"].'</td>
						<td> '.$rs["nom_est"].'</td>
						<td> <span id="'.$status.'">'.$status.'</span> </td>
						<td><button type="button" value="'.$contador[$c].'.'.$contador2[$td].'.'.$contador3[$td].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-pencil"></span></button></td>
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
		case "Incluir":   Inc();break;
		case "Modificar": Mod();break;
		case "Consultar": Con();break;
		case "Activar":   Act();break;
		case "Desactivar":Des();break;
		case "Cancelar":  
		unset($_SESSION['id_parroq']);
		unset($_SESSION['nom_parroq']);
		unset($_SESSION['id_mun']);
		unset($_SESSION['opActDesParroquia']);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=parroquia');break;
	}
}//cierro la comprovasion de si existe la variable

function Inc(){
	$obj_parroquia = new Clsparroquia();
	$obj_parroquia->recibir2($_POST['nom_ciu'],$_POST['cod_mun']);
	$rs = $obj_parroquia->buscar();

    if($tupla = $obj_parroquia->converArray($rs)){
    	$_SESSION['res']="yaexiste";
    }else{
    	$obj_parroquia->incluir();
		$_SESSION['res']="registrado";
    }
    header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=parroquia');
}
function Mod(){
	$obj_parroquia = new Clsparroquia();
	$obj_parroquia->recibir($_POST['cod_ciu'],$_POST['nom_ciu'],$_POST['cod_mun']);
	$rs = $obj_parroquia->ConsultarPorDescripcion();

	/******************************************************/
	if($tupla = $obj_parroquia->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['id_mun'] = $_SESSION['antiguaoValorCodMun'];
	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
	}else{
	 	$obj_parroquia->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION["id_parroq"]);
	 	unset($_SESSION["nom_parroq"]);
	 	unset($_SESSION["id_mun"]);
	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=parroquia');
}
function Act(){
	$obj_parroquia = new Clsparroquia();
	$obj_parroquia->RecibirIdNomParroq($_POST['cod_ciu'],$_POST['nom_ciu']);
	$obj_parroquia->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesParroquia"] = "act";
	$_SESSION['id_mun'] = $_SESSION['antiguaoValorCodMun'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=parroquia');
}
function Des(){
	$obj_parroquia = new Clsparroquia();
	$obj_parroquia->RecibirIdNomParroq($_POST['cod_ciu'],$_POST['nom_ciu']);

	if($obj_parroquia->desactivar()){
		$_SESSION["opActDesParroquia"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION["id_parroq"]);
	 	unset($_SESSION["nom_parroq"]);
	 	unset($_SESSION["id_mun"]);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['id_mun'] = $_SESSION['antiguaoValorCodMun'];
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=parroquia');
}
function Con(){
/************************************************************************************/
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_parroq = new Clsparroquia();
	$obj_parroq->recibirIdents($resultado[0],$resultado[1],$resultado[2]);
	$rs = $obj_parroq->consultarPorIdents();
	$tupla = $obj_parroq->converArray($rs);

	$_SESSION['id_parroq'] = $tupla['id_parroq'];
	$_SESSION['nom_parroq'] = $tupla['nom_parroq'];
	$_SESSION['id_mun'] = $tupla['id_mun'];
	$_SESSION['nom_mun_p'] = $tupla['nom_mun'];
	$_SESSION['antiguaoValorCodMun'] = $_SESSION['id_mun']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
	if($tupla['status'] == 1){
	  	$_SESSION["opActDesParroquia"] = "act";
	}else{
	  	$_SESSION["opActDesParroquia"] = "des";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=parroquia");
}

 //**********************************CONTROL PARA EL COMBO DE parroquia******************************//
		function Pintaparroquia($cod){
			$obj_parroquia=new Clsparroquia();
			$rs=$obj_parroquia->consultarparroquia();
			$selec="";
			$c=0;
			$combParroquia=array();
			$combParroquia[$c++]="<select class='CampoMov' name='comb_ciu' disabled >";
			$combParroquia[$c++]="<option selected='selected'>SELECCIONE LA PARROQUIA</option>";
			while($tupla=$obj_parroquia->converArray($rs)){
				$valor = $tupla['id_parroq'];
				$des = $tupla['nom_parroq'];
				$nom_mun = $tupla['nom_mun'];
				$nom_est = $tupla['nom_est'];
					if($cod==$valor){
						$selec="selected='selected'";
					}else{
						$selec="";
					}
					$combParroquia[$c++]="<option value='".$valor."' ".$selec." >".$des.' - '.$nom_mun.' - '.$nom_est."</option>";
			}
			$combParroquia[$c++]="</select>";
			return $combParroquia;
		}

	//*******************************FIN DEL COMBO parroquia********************************************//
?>