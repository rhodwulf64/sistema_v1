<?php 
//***************************FUNCION PARA PINTAR EL COMBO DE TIPO DE BIEN RECEPCIÓN *************************//
include_once('../../modelo/configuracion/m_tbien.php');

function DibCombtTBienRecep($cod){
	$obj_tbien = new clstBien();
	$rs = $obj_tbien->consultarActivos();

	$arreglotbien = array();
	$cont = 0;

	$arreglotbien[$cont++] = "<select name='tbien' id='tbien' class='CampoMov'>";
	$arreglotbien[$cont++] = "<option value='selec' selected='selected'>SELECCIONE TIPO DE BIEN NACIONAL</option>";

	while($tupla = $obj_tbien->converArray($rs)){
		$codigo = $tupla["id_tbien"];
		$cod_predefinido = $tupla["cod_tbien"];
		$descripcion = $tupla["des_tbien"];

		if($codigo == $cod){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$arreglotbien[$cont++] = "<option value='".$codigo."' ".$selec."> ".$cod_predefinido.' - '.$descripcion."</option>";
	}

	$arreglotbien[$cont++] = "</select>";
	return $arreglotbien;
}

//**********************************************************************************************//

//***************************FUNCION PARA PINTAR EL COMBO DE TIPO DE BIEN ASIGNACIÓN *************************//
include_once('../../modelo/configuracion/m_tbien.php');

function DibCombtTBien($cod){
	$obj_tbien = new clstBien();
	$rs = $obj_tbien->consultarActivos();

	$arreglotbien = array();
	$cont = 0;

	$arreglotbien[$cont++] = "<select name='tbien' id='tbien' class='CampoMov' onchange='buscarAjaxBien()'>";
	$arreglotbien[$cont++] = "<option value='selec' selected='selected'>SELECCIONE TIPO DE BIEN NACIONAL</option>";

	while($tupla = $obj_tbien->converArray($rs)){
		$codigo = $tupla["id_tbien"];
		$cod_predefinido = $tupla["cod_tbien"];
		$descripcion = $tupla["des_tbien"];

		if($codigo == $cod){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$arreglotbien[$cont++] = "<option value='".$codigo."' ".$selec."> ".$cod_predefinido.' - '.$descripcion."</option>";
	}

	$arreglotbien[$cont++] = "</select>";
	return $arreglotbien;
}

//**********************************************************************************************//



?>