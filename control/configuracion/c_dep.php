<?php  error_reporting(0);
include_once('../../modelo/configuracion/m_dep.php');
@session_start();

//esto es para la busqueda rapida con ajax
if(isset($_POST["operacion"])){
	if($_POST["operacion"]=="busquedaAjax"){
		$obj_dep = new ClsDep();
		$tupla = $obj_dep->Consultar_D_S_Ajax($_POST["status"],$_POST["depart"]);
		$c=1;
		$contenido="";
		while($rs = $obj_dep->converArray($tupla)){
			if($rs["status"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
			$contador[$c] = $rs["id_dep"];
			$contador2[$c] = $rs["id_sed"];
			$contenido.='<tr class="tbody" onclick=ejecuta("'.$contador[$c].'.'.$contador2[$c].'")>
						<td> '.$c.'</td>
						<td> '.$rs["nom_dep"].'</td>
						<td> '.$rs["cod_sed"].' - '.$rs["nom_sed"].'</td>
						<td> <span id="'.$status.'">'.$status.' </span></td>
						<td><button type="button" value="'.$contador[$c].'.'.$contador2[$c].'" title="clic para Consultar el registro" id="Editar" onclick="ejecuta(this.value)"><span id="iconosE" class="icon-checkmark"></span></button></td>
					</tr>';
				$c++; 
			}
			if($contenido!="")
				echo $contenido;
			else
				echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>";
	}
}else{
	if(isset( $_POST['temp'])) 
		@$op = $_POST['temp'];
			else
				@$op = 'Consultar';


	//***************************************Control para la botonera ******************************//
	switch ($op) {
		case "Incluir"  :Incu();break;
		case "Modificar":Modi();break;
		case "Consultar":Cons();break;
		case "Activar": Acti();break;
		case "Desactivar":Desa();break;
		case "Cancelar":
		unset($_SESSION['cod_dep']);
		unset($_SESSION['nom_dep']);
		unset($_SESSION['cod_sed']);
		unset($_SESSION["opActDesDepart"]);
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=dep');break;
	}
}//cierro la comprovasion de si existe la variable

function Incu(){
	$obj_dep = new ClsDep();
	$obj_dep->RecGeneral($_POST);
	$rs=$obj_dep->consultar();
	
    if($tupla=$obj_dep->converArray($rs)){
    	$_SESSION['res']="yaexiste";
    	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=dep');
    }else{
    	$_SESSION['res']="registrado";
    	$obj_dep->incluir();
		header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=dep');
	}
    
}
	function Modi(){
	$obj_dep = new ClsDep();
	$obj_dep->recibir($_POST['cod_dep'],$_POST['nom_dep'],$_POST['cod_sed']);
	$rs = $obj_dep->ConsultarPorDescripcion();

	if($tupla = $obj_dep->converArray($rs)){
	 	$_SESSION['res']='error_mod';
	 	$_SESSION['id_dep'] = $_SESSION['antiguaoValorCodDep'];
	}else{
	 	$obj_dep->modificar();
	 
	 	unset($_SESSION["cod_dep"]);
	 	unset($_SESSION["nom_dep"]);
	 	unset($_SESSION["id_sed"]);
	 	$_SESSION['res'] = "mod";
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=dep');
		
	}
	function Acti(){
	$obj_dep=new ClsDep();
	$obj_dep->recibir($_POST['cod_dep'],$_POST['nom_dep'],$_POST['cod_sed']);
	$obj_dep->activar();
	$_SESSION['res']="act";
	$_SESSION["opActDesDepart"] = "act";
	$_SESSION['id_sed'] = $_SESSION['antiguaoValorCodDep'];
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=dep');
	}
function Desa(){
	$obj_dep = new ClsDep;
	$obj_dep->recibirCod($_POST['cod_dep']);

	if($obj_dep->desactivar()){
		$_SESSION["opActDesDepart"] = "des";
		$_SESSION['res'] = "des";
		unset($_SESSION["cod_dep"]);
	 	unset($_SESSION["nom_dep"]);
	 	unset($_SESSION["id_sed"]);
	}else{
		$_SESSION["res"] = "error_des";
		$_SESSION['id_sed'] = $_SESSION['antiguaoValorCodDep'];
	}
	header('location: ../../vista/protegidas/v_Perfil_Admin.php?accion=dep');
}
function Cons(){
	if(isset($_POST['ident'])){
		$resultado = explode(".", $_POST['ident']); // exploto donde encuentre un punto para dividir los codigos
		// ejemplo del explode -> $resultado[0]; // codigo1 del municipio
		// ejemplo del explode -> $resultado[1]; // codigo2 del estado
		$obj_dep = new ClsDep();
		$obj_dep->recibirIdents2($resultado[0],$resultado[1]);
		$rs = $obj_dep->consultarPorIdents();
		$tupla = $obj_dep->converArray($rs);

		$_SESSION['cod_dep']=$tupla['id_dep'];
		$_SESSION['nom_dep']=$tupla['nom_dep'];
		$_SESSION['cod_sed']=$tupla['id_sed'];
		$_SESSION['antiguaoValorCodDep'] = $_SESSION['id_dep']; // guardo el valor con que busco por primera vez para mostrarlo en caso de que el registro que desea modificar ya este registrado
		if(isset($tupla['status'])){
			if($tupla['status'] == 1){
			 	$_SESSION["opActDesDepart"] = "act";
			}else{
			 	$_SESSION["opActDesDepart"] = "des";
			}
		}
		header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=dep");
	}
}
	
	//***********************************FUNCTION PARA EL COMBO DE DEPARTAMENTO************************//

		function PintaDep($cod){
			$obj_dep = new ClsDep();
			$rs = $obj_dep->consultarDepStatus();
			$c = 0;
			$combDep=array();
			//onchange='completarComboRespoDep(this)'    -> funcion del combo
			$combDep[$c++] = "<select name='dep' id='dep' class='CampoMov' disabled='disabled'>";
			$combDep[$c++] = "<option value='selec' selected='selected'>SELECCIONE DEPARTAMENTO</option>";
			while($tupla = $obj_dep->converArray($rs)){
				$valor = $tupla['id_dep'];
				$des = $tupla['nom_dep'];
				$sed = $tupla['nom_sed'];
					if($cod == $valor){
						$selec = "selected='selected'";
					}else{
						$selec = "";
					}
					$combDep[$c++]="<option value='".$valor."' ".$selec." >".$des.' - '.$sed."</option>";
			}
			$combDep[$c++]="</select>";
			return $combDep;
		}
		

	//^*******************************************************************************************************//
?>