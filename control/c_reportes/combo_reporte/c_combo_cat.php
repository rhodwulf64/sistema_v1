<?php
include_once('../../modelo/configuracion/m_categoria.php');

function DibCombCategoria($cod){
	$obj_cat = new clsCategoria();
	$rs = $obj_cat->consultarActivos();
	$arregloCat = array();
	$cont = 0;

	$arregloCat[$cont++] = "<select name='cod_cat' class='CampoMovReportes'>";
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