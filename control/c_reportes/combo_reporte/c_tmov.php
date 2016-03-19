<?php
include_once('../../modelo/configuracion/m_motivo.php');

function DibCombMotivo($cod){
	$obj_motivo = new ClsMotivo();
	$rs = $obj_motivo->motivoDeRecepcion();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select name='id_motivo_mov'  class='CampoMovReportes'>";
	$combMotivo[$c++] = "<option disabled='disabled' selected='selected'>SELECCIONE UN MOTIVO</option>";

	while($tupla = $obj_motivo->converArray($rs)){
		$id_motivo_mov = $tupla['id_motivo_mov'];
		$des_motivo_mov = $tupla['des_motivo_mov'];

		if($cod == $id_motivo_mov){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combMotivo[$c++] = "<option value='".$id_motivo_mov."' ".$selec."> ".$des_motivo_mov."</option>";
	}
	$combMotivo[$c++] = "</select>";
	return $combMotivo;
}
function DibCombMotivoAsig_jd($cod){
	$obj_motivo = new ClsMotivo();
	$rs = $obj_motivo->motivoDeAsignacion();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select name='id_motivo_mov'  class='CampoMovReportes'>";
	$combMotivo[$c++] = "<option value=''>SELECCIONE UN MOTIVO</option>";

	while($tupla = $obj_motivo->converArray($rs)){
		$id_motivo_mov = $tupla['id_motivo_mov'];
		$des_motivo_mov = $tupla['des_motivo_mov'];

		if($cod == $id_motivo_mov){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combMotivo[$c++] = "<option value='".$id_motivo_mov."' ".$selec."> ".$des_motivo_mov."</option>";
	}
	$combMotivo[$c++] = "</select>";
	return $combMotivo;
}
function DibCombMotivoDev_jd($cod){
	$obj_motivo = new ClsMotivo();
	$rs = $obj_motivo->motivoDeDevolucion();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select name='motivo_mov'  class='CampoMovReportes'>";
	$combMotivo[$c++] = "<option value=''>SELECCIONE UN MOTIVO</option>";

	while($tupla = $obj_motivo->converArray($rs)){
		$id_motivo_mov = $tupla['id_motivo_mov'];
		$des_motivo_mov = $tupla['des_motivo_mov'];

		if($cod == $id_motivo_mov){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combMotivo[$c++] = "<option value='".$id_motivo_mov."' ".$selec."> ".$des_motivo_mov."</option>";
	}
	$combMotivo[$c++] = "</select>";
	return $combMotivo;
}
?>
