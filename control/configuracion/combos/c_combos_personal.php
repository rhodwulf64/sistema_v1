<?php 
//***************************FUNCION PARA PINTAR EL COMBO DEL PERSONAL *************************//
include_once('../../modelo/configuracion/m_personal.php');

function DibCombPersonal($cod){
	$obj_per = new clsPersonal();
	$rs = $obj_per->CedNomApePersonal();
	$combPersonal = array();
	$selec = "";
	$c = 0;

	$combPersonal[$c++] = "<select name='id_personal_recep' disabled='disabled' class='CampoMov'>";
	$combPersonal[$c++] = "<option value='selec' selected='selected'>SELECCIONE UN RESPONSABLE</option>"; 

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

//***************************FUNCION PARA PINTAR EL COMBO DEL PERSONAL DEPARTAMENTO *************************//


function DibCombPersonalDep($cod){
	$obj_per = new clsPersonal();
	$rs = $obj_per->CedNomApePersonalDep();
	$combPersonalDep = array();
	$selec = "";
	$c = 0;

	$combPersonalDep[$c++] = "<select name='id_personal_asig' id='id_personal_asig' disabled='disabled' class='CampoMov'>";
	$combPersonalDep[$c++] = "<option value='selec' selected='selected'>SELECCIONE UN RESPONSABLE</option>"; 

	while($tupla = $obj_per->arreglo($rs)){
		$id_personal_asig = $tupla['id_per'];
		$ced_personal_asig = $tupla['ced_per'];
		$nom_personal_asig = $tupla['nom_per'];
		$ape_personal_asig = $tupla['ape_per'];

		if($cod == $id_personal_asig){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combPersonalDep[$c++] = "<option value='".$id_personal_asig."' ".$selec."> ".$ced_personal_asig.' - '.$nom_personal_asig.' '.$ape_personal_asig."</option>";
	}
	$combPersonalDep[$c++] = "</select>";
	return $combPersonalDep;
}
//**********************************************************************************************//

?>