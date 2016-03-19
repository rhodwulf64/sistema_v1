<?php
@session_start();
include_once('../../modelo/m_reportes/m_combo_perfil.php');

function DibComboPerfil($cod){

	$obj_perfil = new ClsPerfil();
	$rs = $obj_perfil->consulta();

	$arreglo = array();
	$cont = 0;

	$ArregloPerfil[$cont++] = "<select name='cod_perfil'  style='padding:8px;'>";
	$ArregloPerfil[$cont++] = "<option value='' selected='selected'>SELECCIONE UN TIPO DE USUARIO</option>";

	while($tupla = $obj_perfil->converArray($rs)){
		$cod_perfil = $tupla["idperfil"];
		$nombre = $tupla["nom_perfil"];
		//$_SESSION['cod_perfil']=$cod_perfil;
		if($cod_perfil == $cod){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$ArregloPerfil[$cont++] = "<option value='".$cod_perfil."' ".$selec."> ".$nombre."</option>";
	}

	$ArregloPerfil[$cont++] = "</select>";
	return $ArregloPerfil;
}
?>