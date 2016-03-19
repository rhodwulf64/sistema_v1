<?php
include_once('../../modelo/configuracion/m_proveedor.php');

function DibCombProveedor($cod){
	$obj_proveedor = new clsProveedor();
	$rs = $obj_proveedor->consultarStatusActivos();

	$arreglo = array();
	$cont = 0;

	$arregloproveedor[$cont++] = "<select name='cod_prov'  class='CampoMovReportes'>";
	$arregloproveedor[$cont++] = "<option disabled='disabled' selected='selected'>SELECCIONE UN PROVEEDOR</option>";

	while($tupla = $obj_proveedor->converArray($rs)){
		$cod_prov = $tupla["id_prov"];
		$descripcion = $tupla["des_prov"];

		if($cod_prov == $cod){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$arregloproveedor[$cont++] = "<option value='".$cod_prov."' ".$selec."> ".$descripcion."</option>";
	}

	$arregloproveedor[$cont++] = "</select>";
	return $arregloproveedor;
}
?>