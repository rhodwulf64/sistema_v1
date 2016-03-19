<?php
@session_start();
include_once("m_conexion.php");

class clsCargo extends clsConex
{
	private $cod,$car;

	function clsCargo(){
		$this->clsConex();
		$this->cod="";
		$this->car="";
	}

	function recibir($co,$ca){
		$this->cod=$co;
		$this->car=$ca;
	}

	function recibir2($co){
		$this->car=$co;
	}

	function incluir(){
		$sql = "INSERT INTO cargo (id_car,nom_car,status) VALUES ('$this->cod','$this->car','1')";
		$this->ejecuta($sql);
	}

	function modificar(){
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE cargo SET id_car='$this->cod',nom_car='$this->car' WHERE id_car='$this->cod'";
			$this->ejecuta($sql);
		}	
	}

	function buscar(){
		$sql = "SELECT * FROM cargo WHERE id_car='$this->car'";
		return $this->ejecuta($sql);
	}

	function buscarPorDescripcion(){
		$sql = "SELECT * FROM cargo WHERE nom_car='$this->car'";
		return $this->ejecuta($sql);
	}

	function activar(){
		$sql = "UPDATE cargo SET  status='1' WHERE id_car='$this->cod'";
		$this->ejecuta($sql);
	}
	
	function desactivar(){
		$sql = "SELECT p.id_cargo FROM personal as p WHERE p.id_cargo='".$this->cod."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
		 	return false;
		}else{
			$sql = "UPDATE cargo SET status='0' WHERE id_car='$this->cod'";
			$this->ejecuta($sql);
			return true;
		}
	}

	function consultar($indice,$cantidad_mostrar){
		$sql = "SELECT * FROM cargo LIMIT $indice,$cantidad_mostrar";
		return $this->ejecuta($sql);
	}
	function consultarStatus(){
		$sql = "SELECT * FROM cargo WHERE status='1'";
		return $this->ejecuta($sql);
	}

	function CountRegistros(){
		$sql = "SELECT count(*) as cant FROM cargo";
		$consulta = $this->ejecuta($sql);
		$cantidad = $this->converArray($consulta);
		$cant = $cantidad["cant"];
		return $cant;
	} 

	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function consultar_Ajax($status,$valor,$indice,$cantidad_mostrar){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM cargo as c WHERE c.status='1' LIMIT $indice,$cantidad_mostrar";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM cargo as c WHERE c.status='0' LIMIT $indice,$cantidad_mostrar";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM cargo as c WHERE (c.nom_car like '%$valor%') and c.status='1' LIMIT $indice,$cantidad_mostrar";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM cargo as c WHERE (c.nom_car like '%$valor%') and c.status='0' LIMIT $indice,$cantidad_mostrar";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM cargo as c WHERE (c.nom_car like '%$valor%') LIMIT $indice,$cantidad_mostrar";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM cargo as c WHERE (c.nom_car like '%$valor%') LIMIT $indice,$cantidad_mostrar";
			return $this->ejecuta($sql);
		}
	}
	function mod_nom(){
		$sql="SELECT  *FROM cargo WHERE nom_car='$this->car'";
		return $this->ejecuta($sql);
	}

}
?>