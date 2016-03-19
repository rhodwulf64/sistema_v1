<?php
include_once('../../modelo/configuracion/m_dep.php');
function DibCombtDepartamento($cod){
	$obj_dep = new ClsDep();
	$rs = $obj_dep->consultarDepart();
	$c = 0;
	$combDep=array();
	$combDep[$c++] = "<select name='cod_dep' title='Eliga el Departamento' class='CampoMovReportes'>";
	$combDep[$c++] = "<option value='seleccione' selected='selected'>SELECCIONE UBICACIÓN</option>";
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

?>