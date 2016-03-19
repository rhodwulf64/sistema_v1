<?php
include_once('../../modelo/configuracion/m_motivo.php');
function DibCombMotivoAnulacion($cod){
	$obj_motivoAnu = new ClsMotivo();
	$rs = $obj_motivoAnu->motivoDeAnulacionAsig();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select name='id_motivo_anu' class='CampoMovReportes'>";
	$combMotivo[$c++] = "<option value='selec' disabled='disabled' selected='selected'>SELECCIONE UN MOTIVO</option>"; 

	while($tupla = $obj_motivoAnu->converArray($rs)){
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