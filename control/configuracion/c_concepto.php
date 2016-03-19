<?php //error_reporting(0);
include_once('../../modelo/configuracion/m_concepto.php');
//include_once("../../public/lib/Zebra_Pagination.php");  //Paginacion 
@session_start();


if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_marca = new clsConcepto();
		$tupla = $obj_marca->consultar_Ajax($_POST["status"],$_POST["concepto"]);
		$c=1;
		$contenido="";
		while($rs = $obj_marca->Arreglo($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
					$contador[$c] = $rs["id_motivo_mov"];
				$contenido.='<tr class="tbody"  onclick=ejecuta("'.$contador[$c].'")>
							<td> '.$c.'</td>
							<td> '.$rs["des_motivo_mov"].'</td>
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
		}

	//***************************************Control para la botonera ******************************//
	switch ($op){
		case "Incluir":   Inc(); break;
		case "Consultar": Bus(); break;
		case "Modificar": Mod(); break;
		case "Activar": Act(); break;
		case "paginacionAjax": PagAjax(); break;
		case "Desactivar": Des(); break;
		case "Cancelar":
		unset($_SESSION['cod_concep']);
		unset($_SESSION['des_concep']);
		unset($_SESSION["opActDesconcep"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto');break;
	}
function Inc(){
	$obj_concep= new clsConcepto();
	$obj_concep->recibir($_POST['des_concepto']);
	$rs = $obj_concep->buscarT();
	//$obj_concep->incluir();
	//header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto');

	 if($tupla = $obj_concep->Arreglo($rs)){
    	$_SESSION['res']="yaexiste";
    }else{
    	$obj_concep->incluir();
		$_SESSION['res']="registrado";
    }
 	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto');
}
function Bus(){
if(isset($_POST["ident"])){
	$obj_concep = new clsConcepto();
	$obj_concep->recibir2($_POST["ident"]);
	$rs = $obj_concep->buscar();
	$tupla = $obj_concep->Arreglo($rs);

	$_SESSION['cod_concep']=$tupla['id_motivo_mov'];
	$_SESSION['des_concep']=$tupla['des_motivo_mov']; 

	if(isset($tupla['status'])){
		if($tupla['status'] == 1){
			$_SESSION["opActDesconcep"] = "act";
		}else{
			$_SESSION["opActDesconcep"] = "des";
		}
	}

	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto");
}
}	
function Mod(){
	$obj_concep = new clsConcepto();
	$obj_concep->recibir2($_POST['cod_concepto'],$_POST['des_concepto']);
	$rs = $obj_concep->buscarPorDescripcion();
	$tupla = $obj_concep->Arreglo($rs);
	if($tupla['des_motivo_mov']==$_POST['des_concepto']){//comparo la tupla con el form sino son iguales modifico
		$_SESSION['res'] = "error_mod";
		header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto");
	}else{
		$obj_concep->modificar();
		unset($_SESSION['cod_concep']);
		unset($_SESSION['des_concep']);
		$_SESSION['res']="mod";
	}
	
	
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto");
}
// function Des(){
// 	$obj_concep=new clsConcepto();
// 	$obj_concep->recibir3($_POST['cod_concepto']);
	
// 	if($obj_concep->desactivar()){
		
// 		//$_SESSION["res"] = "des";
// 		//unset($_SESSION['cod_concep']);
// 		//unset($_SESSION['des_concep']);
// 		//header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto');
// 	}else{
// 		//$_SESSION["res"] = "error_des";
// 		//unset($_SESSION['cod_concep']);
// 		//unset($_SESSION['des_concep']);
// 		//header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto');
// 	}
// }
function Des(){
	$obj_concep = new clsConcepto();
	$obj_concep->recibir3($_POST["cod_concepto"]);

	$obj_concep->desactivar();
		$_SESSION["opActDesconcep"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION['cod_concep']);
		unset($_SESSION['des_concep']);
	//}else{
		//$_SESSION["res"] = "error_des";
	  	//$_SESSION['cod_concep'] = $_SESSION['antiguaoValorCodConcep'];
	//}
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto");
}
function Act(){
	$obj_cargo = new clsConcepto();
	$obj_cargo->recibir2($_POST["cod_concepto"],$_POST["des_concepto"]);
	$obj_cargo->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesconcep"] = "act";
	// unset($_SESSION['cod']);
	// unset($_SESSION['car']);
	header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=concepto");
}
?>
