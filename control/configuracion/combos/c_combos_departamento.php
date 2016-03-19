<?php 
//***************************FUNCION PARA PINTAR EL COMBO DEPARTAMENTO EN RECEPCION *************************//
include_once('../../modelo/configuracion/m_dep.php');

		function DibCombtDepartamento($cod){
			$obj_dep = new ClsDep();
			$rs = $obj_dep->consultarActivosAlmacen();
			$c = 0;
			$combDep=array();
			$combDep[$c++] = "<select name='dep_recep' id='dep_recep' disabled='disabled' class='CampoMov'>";
			$combDep[$c++] = "<option value='selec' disabled='disabled' selected='selected'>SELECCIONE UBICACIÓN</option>";
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

//**********************************************************************************************//

//***************************FUNCION PARA PINTAR EL COMBO DEPARTAMENTO EN DESINCORPORACIÓN *************************//
		function DibCombtDepartamentoDesin($cod){
			$obj_dep_Desi = new ClsDep();
			$rs = $obj_dep_Desi->consultarActivosAlmacen();
			$c = 0;
			$combDep=array();
			$combDep[$c++] = "<select name='dep_desin' id='dep_desin' class='CampoMov' onchange='buscarAjaxAlmacen()'>";
			$combDep[$c++] = "<option value='selec' disabled='disabled' selected='selected'>SELECCIONE ALMACEN</option>";
			while($tupla = $obj_dep_Desi->converArray($rs)){
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

//**********************************************************************************************//
?>