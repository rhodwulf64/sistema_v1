<?php error_reporting(0);
@session_start();
include_once('../../modelo/configuracion/m_motivo.php');

//esto es para la paginacion
if($_POST["operacion"]=="paginacionAjax"){
	$obj_motivo = new ClsMotivo();
	$obj_motivo->inicio = $this->cantidad * (intval($_POST["irA"])-1);
	$consulta = $obj_motivo->Consultarr();
	$rs = $obj_motivo->converArray($consulta);
	echo "inicio: ".$obj_motivo->inicio;
	echo "irA: ".$_POST["irA"];
	
}


if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_motivo = new ClsMotivo();
		$tupla = $obj_motivo->Consultarr_Ajax($_POST["status"],$_POST["motivo"]);
		$c=1;
		$contenido="";
		while($rs = $obj_motivo->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo"; }else{ $status= "Inactivo"; }
				$contador[$c] = $rs["id_motivo_mov"];

				$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'")>
							<td> '.$c.'</td>
							<td> '.$rs["des_motivo_mov"].'</td>
							<td> '.$rs["tipo_motivo"].'</td>
							<td> <span id="'.$status.'">'.$status.'</span> </td>
							<td><button type="button" value="'.$contador[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
						</tr>';
				$c++;
			}//cierre del while
		if($contenido!="")
			echo $contenido;
		else
			echo "<td colspan='5'><span class='no-hay-datos-mostrar'>NO SE ENCONTRARON DATOS</span> </td>";
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
		unset($_SESSION['id_motivo']);
		unset($_SESSION['des_motivo']);
		unset($_SESSION['tipo_motivo']);
		unset($_SESSION["opActDesMotivo"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=motivo'); break;
	}
}//cierro la comprovasion de si existe la variable

function Inc(){
	$obj_motivo = new ClsMotivo();
	$obj_motivo->recibir2($_POST['des_motivo'],$_POST['tipo_motivo']);
	$rs = $obj_motivo->ConsultarPorDescripcion();

    if($tupla = $obj_motivo->converArray($rs)){
   		$_SESSION['res'] = "yaexiste";
    }else{
   		$obj_motivo->incluir();
		$_SESSION['res'] = "registrado";
    }
    header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=motivo');
}

function Act(){
	$obj_motivo=new ClsMotivo();
	$obj_motivo->recibir($_POST['id_motivo'],$_POST['des_motivo'],$_POST['tipo_motivo']);
	$obj_motivo->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesMotivo"] = "act";
	$_SESSION['id_motivo'] = $_SESSION['antiguaoValorCodMoti'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=motivo');
}
function Mod(){
	$obj_motivo = new ClsMotivo();
	$obj_motivo->recibir($_POST['id_motivo'],$_POST['des_motivo'],$_POST['tipo_motivo']);
	$rs = $obj_motivo->ConsultarPorDescripcion();

	if($tupla = $obj_motivo->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['id_motivo'] = $_SESSION['antiguaoValorCodMoti'];
	}else{
	 	$obj_motivo->modificar();
	 
	 	unset($_SESSION["id_motivo"]);
	 	unset($_SESSION["des_motivo"]);
	 	unset($_SESSION["tipo_motivo"]);
	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=motivo');
}
function Des(){
	$obj_motivo = new ClsMotivo();
	$obj_motivo->recibirCod($_POST['id_motivo']);

	$obj_motivo->desactivar();
		//$_SESSION["opActDesMotivo"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION["id_motivo"]);
	 	unset($_SESSION["des_motivo"]);
	 	unset($_SESSION["tipo_motivo"]);

	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=motivo');
}
function Cons(){
	if(isset($_POST['ident'])){
		$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
		// ejemplo del explode -> $resultado[0]; // codigo1 del municipio
		// ejemplo del explode -> $resultado[1]; // codigo2 del estado
		$obj_motivo = new ClsMotivo();
		$obj_motivo->recibirIdents($resultado[0]);
		$rs = $obj_motivo->consultarPorIdents();
		$tupla = $obj_motivo->converArray($rs);

		$_SESSION['id_motivo']=$tupla['id_motivo_mov'];
		$_SESSION['des_motivo']=$tupla['des_motivo_mov'];
		$_SESSION['tipo_motivo']=$tupla['tipo_motivo'];
		$_SESSION['antiguaoValorCodMoti'] = $_SESSION['id_motivo']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado

		if($tupla['status'] == 1){
		 	$_SESSION["opActDesMotivo"] = "act";
		}else{
		 	$_SESSION["opActDesMotivo"] = "des";
		}
		header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=motivo");
	}
}

?>