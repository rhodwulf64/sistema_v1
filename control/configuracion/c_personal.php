<?php session_start();
include_once("../../modelo/configuracion/m_personal.php");

//esto es para la busqueda rapida con ajax
if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
	$obj_personal = new clsPersonal();
	$tupla = $obj_personal->consutar_P_D_C_Ajax($_POST["status"],$_POST["personal"]);
	$c=1;
	$contenido="";
	while($rs = $obj_personal->arreglo($tupla)){
		if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
			$contador[$c] = $rs["id_per"];
			$contador2[$c] = $rs["id_car"];
			$contador3[$c] = $rs["id_dep"];
			//$td = $c;
			$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$contador2[$c].'.'.$contador3[$c].'")>
				<td> '.$c.'</td>
				<td> '.$rs["ced_per"].'</td>
				<td> '.$rs["nom_per"].'</td>
				<td> '.$rs["ape_per"].'</td>
				<td> '.$rs["nom_car"].'</td>
				<td> '.$rs["nom_dep"].'</td>
				<td> '.$rs["tlf_per"].'</td>
				<td> '.$rs["email_per"].'</td>
				<td> <span id="'.$status.'">'.$status.'</span> </td>
				<td><button type="button" value="'.$contador[$c].'.'.$contador2[$c].'.'.$contador3[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
			</tr>';
			$c++;
		}
		if($contenido!="")
			echo $contenido;
		else
			echo "<td colspan='10'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>";
	}
}else{
	if(isset( $_POST['temp'])) 
		@$op = $_POST['temp'];
			else
				@$op = 'Consultar';


	//***************************************Control para la botonera ******************************//
	switch ($op) {
		case "Incluir":	Inc();break;
		case "Modificar":  Mod(); break;
		case "Consultar":  Cons();break;
		case "bus_ind":  busCed(); break;
		case "Activar":    Act();break;
		case "Desactivar": Des();break;
		case "Cancelar":
		unset($_SESSION["idced"]);
		unset($_SESSION["ced_per"]);
		unset($_SESSION["nom_per"]);
		unset($_SESSION["ape_per"]);
		unset($_SESSION["nom_car"]);
		unset($_SESSION["nom_dep"]);
		unset($_SESSION["telf_per"]);
		unset($_SESSION["email_per"]);
		unset($_SESSION["cod_cargo_p"]);
		unset($_SESSION["cod_dep_p"]);
		unset($_SESSION["opActDesPersonal"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=personal');break;
	 }
}//cierro la comprovasion de si existe la variable

function Inc(){
	$obj_personal = new clsPersonal();
	$obj_personal->recibir($_POST);
	$tupla = $obj_personal->consulta();
	if($tupla){
	 	$_SESSION["res"] = "yaexiste";
	 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=personal');
	}else{
	 	$obj_personal->registra();
	 	$_SESSION["res"] = "registrado";
	 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=personal');
	}
}

function Mod(){
	$obj_personal = new clsPersonal();
	$obj_personal->recibir($_POST);
	$rs = $obj_personal->consultaUnicidad($_POST["idced"]);

	/*************************************************************************************/
	if($rs){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['id_per'] = $_SESSION['antiguaoValorCodPer'];
	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
	}else{
	 	$obj_personal->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION["idced"]);
		unset($_SESSION["ced_per"]);
		unset($_SESSION["nom_per"]);
		unset($_SESSION["ape_per"]);
		unset($_SESSION["cod_cargo_p"]);
		unset($_SESSION["cod_dep_p"]);
		unset($_SESSION["telf_per"]);
		unset($_SESSION["email_per"]);
	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=personal');
}
function Cons(){
if(isset($_POST['ident'])){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_personal = new clsPersonal();
	$obj_personal->recibirIdents($resultado[0],$resultado[1],$resultado[2]);
	$rs = $obj_personal->consultarPorIdents();
	$tupla = $obj_personal->arreglo($rs);

	$_SESSION["idced"] = $tupla["id_per"];
	$_SESSION["ced_per"] = $tupla["ced_per"];
	$_SESSION["nom_per"] = $tupla["nom_per"];
	$_SESSION["ape_per"] = $tupla["ape_per"];
	$_SESSION["cod_cargo_p"] = $tupla["id_car"];
	$_SESSION["cod_dep_p"] = $tupla["id_dep"];
	$_SESSION["telf_per"] = $tupla["tlf_per"];
	$_SESSION["email_per"] = $tupla["email_per"];
	$_SESSION['antiguaoValorCodPer'] = $_SESSION['idced'];
	$_SESSION['antiguaoValorCodCar'] = $_SESSION['cod_cargo_p'];
	$_SESSION['antiguaoValorCodDep'] = $_SESSION['cod_dep_p'];
	 // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
	if($tupla['status'] == 1){
	  	$_SESSION["opActDesPersonal"] = "act";
	}else{
	  	$_SESSION["opActDesPersonal"] = "des";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=personal');
}
}
function Act(){
	$obj_personal = new clsPersonal();
	$obj_personal->recibirId($_POST["idced"]);
	$obj_personal->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesPersonal"] = "act";
	$_SESSION['idced'] = $_SESSION['antiguaoValorCodPer'];
	$_SESSION['cod_cargo_p'] = $_SESSION['antiguaoValorCodCar'];
	$_SESSION['cod_dep_p'] = $_SESSION['antiguaoValorCodDep'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=personal');
}
function Des(){
	$obj_personal = new clsPersonal();
	$obj_personal->recibirId($_POST["idced"]);

	if($obj_personal->desactivar()){
		$_SESSION["opActDesPersonal"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION["idced"]);
		unset($_SESSION["ced_per"]);
		unset($_SESSION["nom_per"]);
		unset($_SESSION["ape_per"]);
		unset($_SESSION["nom_car"]);
		unset($_SESSION["nom_dep"]);
		unset($_SESSION["telf_per"]);
		unset($_SESSION["email_per"]);
		unset($_SESSION["cod_cargo_p"]);
		unset($_SESSION["cod_dep_p"]);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['idced'] = $_SESSION['antiguaoValorCodPer'];
		$_SESSION['cod_cargo_p'] = $_SESSION['antiguaoValorCodCar'];
		$_SESSION['cod_dep_p'] = $_SESSION['antiguaoValorCodDep'];
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=personal');
}
?>