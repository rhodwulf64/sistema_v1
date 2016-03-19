<?php 
//***************************FUNCION PARA PINTAR EL COMBO DE MOTIVO DE RECEPCION *************************//
include_once('../../modelo/configuracion/m_motivo.php');

function DibCombMotivo($cod){
	$obj_motivo = new ClsMotivo();
	$rs = $obj_motivo->motivoDeRecepcion();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select name='id_motivo_mov' disabled='disabled' class='CampoMov'>";
	$combMotivo[$c++] = "<option value='selec' disabled='disabled' selected='selected'>SELECCIONE UN MOTIVO</option>"; 

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
//**********************************************************************************************//
//***************************FUNCION PARA PINTAR EL COMBO DE MOTIVO DE ANULACIÓN RECEPCION *************************//
function DibCombMotivoAnulacion($cod){
	$obj_motivoAnu = new ClsMotivo();
	$rs = $obj_motivoAnu->motivoDeAnulacion();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select id='id_motivo_anu' name='id_motivo_anu' class='id_motivo_anu'>";
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
//**********************************************************************************************//
//***************************FUNCION PARA PINTAR EL COMBO DE MOTIVO DE ASIGNACIÓN *************************//
function DibCombMotivoAsignacion($cod){
	$obj_motivoAsig = new ClsMotivo();
	$rs = $obj_motivoAsig->motivoDeAsignacion();
	$combMotivoAS = array();
	$selec = "";
	$c = 0;

	$combMotivoAS[$c++] = "<select name='id_motivo_asig' disabled='disabled' class='CampoMov'";
	$combMotivoAS[$c++] = "<option value='selec' selected='selected'>SELECCIONE UN MOTIVO</option>"; 

	while($tupla = $obj_motivoAsig->converArray($rs)){
		$id_motivo_as = $tupla['id_motivo_mov'];
		$des_motivo_as = $tupla['des_motivo_mov'];

		if($cod == $id_motivo_as){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combMotivoAS[$c++] = "<option value='".$id_motivo_as."' ".$selec."> ".$des_motivo_as."</option>";
	}
	$combMotivoAS[$c++] = "</select>";
	return $combMotivoAS;
}
//**********************************************************************************************//
//***************************FUNCION PARA PINTAR EL COMBO DE MOTIVO DE ASIGNACIÓN *************************//
function DibCombMotivoDevolucion($cod){
	$obj_motivoDevo = new ClsMotivo();
	$rs = $obj_motivoDevo->motivoDeDevolucion();
	$combMotivoAS = array();
	$selec = "";
	$c = 0;

	$combMotivoAS[$c++] = "<select name='id_motivo_dev' id='id_motivo_dev' disabled='disabled' class='CampoMov'";
	$combMotivoAS[$c++] = "<option value='selec' selected='selected'>SELECCIONE UN MOTIVO</option>"; 

	while($tupla = $obj_motivoDevo->converArray($rs)){
		$id_motivo_as = $tupla['id_motivo_mov'];
		$des_motivo_as = $tupla['des_motivo_mov'];

		if($cod == $id_motivo_as){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combMotivoAS[$c++] = "<option value='".$id_motivo_as."' ".$selec."> ".$des_motivo_as."</option>";
	}
	$combMotivoAS[$c++] = "</select>";
	return $combMotivoAS;
}
//**********************************************************************************************//
//***************************FUNCION PARA PINTAR EL COMBO DE MOTIVO DE ANULACIÓN ASIGNACIÓN *************************//
function DibCombMotivoAnulacionAsig($cod){
	$obj_motivoAnu = new ClsMotivo();
	$rs = $obj_motivoAnu->motivoDeAnulacionAsig();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select id='id_motivo_anu_asig' name='id_motivo_anu_asig' class='id_motivo_anu'>";
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
//**********************************************************************************************//
//***************************FUNCION PARA PINTAR EL COMBO DE MOTIVO DE ANULACIÓN ASIGNACIÓN *************************//
function DibCombMotivoAnulacionDesin($cod){
	$obj_motivoAnu = new ClsMotivo();
	$rs = $obj_motivoAnu->motivoDeAnulacionDesin();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select id='id_motivo_anu_desin' name='id_motivo_anu_desin' class='id_motivo_anu'>";
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
//**********************************************************************************************//
//***************************FUNCION PARA PINTAR EL COMBO DE MOTIVO DE ANULACIÓN DEVOLUCIÓN *************************//
function DibCombMotivoAnulacionDevol($cod){
	$obj_motivoAnu = new ClsMotivo();
	$rs = $obj_motivoAnu->motivoDeAnulacionDev();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = "<select id='id_motivo_anu_asig' name='id_motivo_anu_asig' class='id_motivo_anu'>";
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
//**********************************************************************************************//
//*************************** FUNCION PARA PINTAR EL COMBO DE MOTIVO DE DESINCORPORACIÓN *************************//
function DibCombMotivoDesincorporacion($cod){
	$cboMotivoDesi = new ClsMotivo();
	$rs = $cboMotivoDesi->motivoDeDesin();
	$combMotivoDES = array();
	$selec = "";
	$c = 0;

	$combMotivoDES[$c++] = "<select name='id_motivo_desin' disabled='disabled' class='CampoMov'";
	$combMotivoDES[$c++] = "<option value='selec' selected='selected'>SELECCIONE UN MOTIVO</option>"; 

	while($tupla = $cboMotivoDesi->converArray($rs)){
		$id_motivo_des = $tupla['id_motivo_mov'];
		$des_motivo_des = $tupla['des_motivo_mov'];

		if($cod == $id_motivo_des){
			$selec = "selected='selected'";
		}else{
			$selec = "";
		}
		$combMotivoDES[$c++] = "<option value='".$id_motivo_des."' ".$selec."> ".$des_motivo_des."</option>";
	}
	$combMotivoDES[$c++] = "</select>";
	return $combMotivoDES;
}
//**********************************************************************************************//
//*************************** FUNCION PARA PINTAR EL COMBO DE MOTIVO DE BLOQUEOS *************************//
function DibCombMotivoBloq($cod){
	$obj_motivo = new ClsMotivo();
	$rs = $obj_motivo->motivoDeBloqueo();
	$combMotivo = array();
	$selec = "";
	$c = 0;

	$combMotivo[$c++] = '<select id="motivo" onchange="combo_bloq(this.value)" name="motivo<?php echo $c;?>" class="CampoMov">';
	$combMotivo[$c++] = "<option value='selec' disabled='disabled' selected='selected'>SELECCIONE UN MOTIVO</option>"; 

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
//**********************************************************************************************//



?>