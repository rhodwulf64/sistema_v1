<?php 
//***************************FUNCION PARA PINTAR EL COMBO DE MOTIVO *************************//
include_once('../../modelo/configuracion/m_personal.php');

function DibCombPersonal($cod){
	$obj_per = new clsPersonal();
	$rs = $obj_per->CedNomApePersonal();
	$combPersonal = array();
	$selec = "";
	$c = 0;

	$combPersonal[$c++] = "<select name='id_personal_recep'  class='CampoMovReportes'>";
	$combPersonal[$c++] = "<option value='selec' disabled='disabled' selected='selected'>SELECCIONE UN RESPONSABLE</option>"; 

	while($tupla = $obj_per->arreglo($rs)){
		$id_personal_recep = $tupla['id_per'];
		$ced_personal_recep = $tupla['ced_per'];
		$nom_personal_recep = $tupla['nom_per'];
		$ape_personal_recep = $tupla['ape_per'];

		if($cod == $id_personal_recep){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combPersonal[$c++] = "<option value='".$id_personal_recep."' ".$selec."> ".$ced_personal_recep.' - '.$nom_personal_recep.' '.$ape_personal_recep."</option>";
	}
	$combPersonal[$c++] = "</select>";
	return $combPersonal;
}
//**********************************************************************************************//


?>