<?php 
	error_reporting(0);
@session_start();
include_once('../../modelo/configuracion/m_tbien.php');

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_tbien = new clstBien();
		$tupla = $obj_tbien->consultar_Tb_C_Ajax($_POST["status"],$_POST["tbien"]);
		$c=1;
		$contenido="";
		while($rs = $obj_tbien->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
				$contador[$c] = $rs["id_tbien"];
				$contador2[$c] = $rs["id_categoria"];
				$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$contador2[$c].'")>
						<td> '.$c.'</td>
						<td> '.$rs["cod_tbien"].'</td>
						<td> '.$rs["des_tbien"].'</td>
						<td> '.$rs["nom_cat"].'</td>
						<td> <span id="'.$status.'">'.$status.'</span> </td>
						<td><button type="button" value="'.$contador[$c].'.'.$contador2[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
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
	switch($op){
		case "Incluir":   Inc(); break;
		case "Consultar": Bus(); break;
		case "Modificar": Mod(); break;
		case "Activar":Act();break;
		case "Desactivar":Des();break;
		case "Cancelar":
		unset($_SESSION["ntbien"]);
		unset($_SESSION['cod_tbien']);
		unset($_SESSION["nom_tbien"]);
		unset($_SESSION['cod_cat_tb']);
		unset($_SESSION["opActDeesTipoBien"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tbien');break;
	}
}//cierro la comprovasion de si existe la variable

function Inc(){
    $obj_tbien = new clstBien();
	$obj_tbien->recibirCodNomIdCat($_POST['cod_tbien'],$_POST["nom_tbien"],$_POST["cod_cat"]);
	$rs = $obj_tbien->ConsTodosWhere();

    if($tupla = $obj_tbien->converArray($rs)){
    	$_SESSION['res']="yaexiste";
    }else{
    	$obj_tbien->incluir();
		$_SESSION['res']="registrado";
    }
 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tbien');
}
function Bus(){
	/*****************************************/
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_tbien = new clstBien();
	$obj_tbien->codigos($resultado[0],$resultado[1]);
	$rs = $obj_tbien->consultarPorIdents();
	$tupla = $obj_tbien->converArray($rs);

	$_SESSION['ntbien']=$tupla['id_tbien'];
	$_SESSION['cod_tbien']=$tupla['cod_tbien'];
	$_SESSION['nom_tbien']=$tupla['des_tbien'];
	$_SESSION['cod_cat_tb']=$tupla['id_categoria'];
	$_SESSION['antiguaoValorCodtb'] = $_SESSION['ntbien'];
	$_SESSION['antiguaoValorCodCatTb'] = $_SESSION['cod_cat_tb']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
	if($tupla['status'] == 1){
	  	$_SESSION["opActDeesTipoBien"] = "act";
	}else{
	  	$_SESSION["opActDeesTipoBien"] = "des";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tbien');
}
function Mod(){
	$obj_tbien = new clstBien();
	$obj_tbien->recibir($_POST["ntbien"],$_POST['cod_tbien'],$_POST["nom_tbien"],$_POST["cod_cat"]);
	$rs = $obj_tbien->ConsTodosWhere();

	/******************************************************/
	if($tupla = $obj_tbien->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['ntbien'] = $_SESSION['antiguaoValorCodtb'];
	 	$_SESSION['cod_cat_tb'] = $_SESSION['antiguaoValorCodCatTb'];
	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
	}else{
	 	$obj_tbien->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION['ntbien']);
		unset($_SESSION['cod_tbien']);
		unset($_SESSION['nom_tbien']);
		unset($_SESSION['cod_cat_tb']);
	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tbien');
}
function Act(){
	$obj_tbien = new clstBien();
	$obj_tbien->recibirId($_POST["ntbien"]);
	$obj_tbien->activar();
	$_SESSION['res'] = "act";
	$_SESSION["opActDeesTipoBien"] = "act";
	$_SESSION['ntbien'] = $_SESSION['antiguaoValorCodtb'];
	$_SESSION['cod_cat_tb'] = $_SESSION['antiguaoValorCodCatTb'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tbien');
}
function Des(){
	$obj_tbien = new clstBien();
	$obj_tbien->recibirId($_POST["ntbien"]);

	if($obj_tbien->desactivar()){
		$_SESSION["opActDeesTipoBien"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION['ntbien']);
		unset($_SESSION['cod_tbien']);
		unset($_SESSION['nom_tbien']);
		unset($_SESSION['cod_cat_tb']);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['ntbien'] = $_SESSION['antiguaoValorCodtb'];
	 	$_SESSION['cod_cat_tb'] = $_SESSION['antiguaoValorCodCatTb'];
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=tbien');
}

?>