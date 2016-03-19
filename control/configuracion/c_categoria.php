<?php error_reporting(0);
error_reporting(0);
@session_start();
include_once('../../modelo/configuracion/m_categoria.php');

if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_cat = new clsCategoria();
		$tupla = $obj_cat->consultar_Ajax($_POST["status"],$_POST["categoria"]);
		$c=1;
		$contenido="";
		while($rs = $obj_cat->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					$contador[$c] = $rs["id_categoria"];

				$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
							<td> '.$c.'</td>
							<td> '.$rs["nom_cat"].'</td>
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
		case "Incluir":   Incluir(); break;
		case "Consultar": Buscar(); break;
		case "Modificar": Modificar(); break;
		case "Activar": Activar(); break;
		case "Desactivar": Desactivar(); break;
		case "Cancelar":
		unset($_SESSION['cod_cat']);
		unset($_SESSION['nom_cat']);
		unset($_SESSION["opActDesCategoria"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=categoria');break;
	}
}//cierro la comprovasion de si existe la variable

function Incluir(){
    $obj_cat = new clsCategoria();
	$obj_cat->recibirNom($_POST["nom_cat"]);
	$rs = $obj_cat->buscar();

    if($tupla = $obj_cat->converArray($rs)){
    	$_SESSION['res']="yaexiste";
    }else{
    	$obj_cat->incluir();
		$_SESSION['res']="registrado";
    }
 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=categoria');
}
function Buscar(){
	$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
	// ejemplo del explode -> $resultado[0]; // codigo1 del parroquia
	// ejemplo del explode -> $resultado[1]; // codigo2 del municipio
	// ejemplo del explode -> $resultado[1]; // codigo2 del estado
	$obj_cat = new clsCategoria();
	$obj_cat->recibirId_Cat($resultado[0]);
	$rs = $obj_cat->consultarPorIdents();
	$tupla = $obj_cat->converArray($rs);

	$_SESSION['cod_cat']=$tupla['id_categoria'];
	$_SESSION['nom_cat']=$tupla['nom_cat'];
	$_SESSION['antiguaoValorCodCat'] = $_SESSION['cod_cat']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['antiguaoValorDesMun'] = $_SESSION['nom_mun_p']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
	// $_SESSION['id_est_p'] = $tupla['id_est'];
	// $_SESSION['nom_est_p'] = $tupla['nom_est'];
	if($tupla['status'] == 1){
	  	$_SESSION["opActDesCategoria"] = "act";
	}else{
	  	$_SESSION["opActDesCategoria"] = "des";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=categoria");
}
function Modificar(){
	/***********************************************************************************/
	$obj_cat = new clsCategoria();
	$obj_cat->recibir($_POST["cod_cat"],$_POST["nom_cat"]);
	$rs = $obj_cat->buscar();

	/******************************************************/
	if($tupla = $obj_cat->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['cod_cat'] = $_SESSION['antiguaoValorCodCat'];
	 	// $_SESSION['nom_mun_p'] = $_SESSION['antiguaoValorDesMun'];
	}else{
	 	$obj_cat->modificar();
	 	// $rs2=$obj_mun->bus_est();
	 	// $tupla2=$obj_mun->converArray($rs2);
	 	// $_SESSION['cod_mun']=$tupla['id_mun'];
	 	// $_SESSION['nom_mun']=$tupla['nom_mun'];
	 	// $_SESSION['cod_est_m']=$tupla['id_est'];
	 	unset($_SESSION['cod_cat']);
		unset($_SESSION['nom_cat']);
	 	$_SESSION['res'] = "mod";
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=categoria");
}
function Activar(){
	$obj_cat = new clsCategoria();
	$obj_cat->recibir($_POST["cod_cat"]);
	$obj_cat->activar();
	$_SESSION['res'] = "act";
	$_SESSION["opActDesCategoria"] = "act";
	$_SESSION['cod_cat'] = $_SESSION['antiguaoValorCodCat'];
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=categoria");
}
function Desactivar(){
	$obj_cat = new clsCategoria();
	$obj_cat->recibir($_POST["cod_cat"]);

	if($obj_cat->desactivar()){
		$_SESSION["opActDesCategoria"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION['cod_cat']);
		unset($_SESSION['nom_cat']);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['cod_cat'] = $_SESSION['antiguaoValorCodCat'];
	}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=categoria");
}

function DibCombCategoria($cod){
	$obj_cat = new clsCategoria();
	$rs = $obj_cat->consultarActivos();

	$arregloCat = array();
	$cont = 0;

	$arregloCat[$cont++] = "<select class='CampoMov' name='cod_cat' disabled='disabled'>";
	$arregloCat[$cont++] = "<option selected='selected'>SELECCIONE CATEGORIA</option>";

	while($tupla = $obj_cat->converArray($rs)){
		$cod_cat = $tupla["id_categoria"];
		$descripcion = $tupla["nom_cat"];

		if($cod_cat == $cod){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$arregloCat[$cont++] = "<option value='".$cod_cat."' ".$selec."> ".$descripcion."</option>";
	}

	$arregloCat[$cont++] = "</select>";
	return $arregloCat;
}
?>