<?php
include_once('../../modelo/configuracion/m_sede.php');
		function PintaSede_sistema($cod){
			$obj_sede = new ClsSede();
			$rs = $obj_sede->consultarSede();
			$c = 0;
			$combSede=array();
			$combSede[$c++] = "<select name='cod_sed' id='cod_sed' disabled >";
			$combSede[$c++] = "<option value=''>SELECCIONE LA SEDE</option>";
			while($tupla = $obj_sede->converArray($rs)){
				$valor = $tupla['id_sed'];
				$des = $tupla['nom_sed'];
					if($cod == $valor){
						$selec = "selected='selected'";
					}else{
						$selec = "";
					}
					$combSede[$c++]="<option value='".$valor."' ".$selec." >".$des."</option>";
			}
			$combSede[$c++]="</select>";
			return $combSede;
		}
?>