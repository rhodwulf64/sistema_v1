<?php
include_once("m_conexion.php");

class clsMarca extends clsConex
{
	private $cod_marca,$nom_marca;

	function clsMarca(){
		$this->clsConex();
		$this->cod_marca="";
		$this->nom_marca="";
	}

	function recibir($co,$ca){
		$this->cod_marca=$co;
		$this->nom_marca=$ca;
	}
	function recibirId_Mar($co){
		$this->cod_marca=$co;
	}
	function recibir2($no){
		$this->nom_marca=$no;
	}
	function incluir(){
		$sql = "INSERT INTO marca (id_marca,nom_marca,status) VALUES ('$this->cod_marca','$this->nom_marca','1')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql = "UPDATE marca SET nom_marca='$this->nom_marca' WHERE id_marca='$this->cod_marca'";
		$this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM marca WHERE id_marca='$this->cod_marca'";
		return $this->ejecuta($sql);
	}
	function buscar(){
		$sql = "SELECT * FROM marca WHERE nom_marca='$this->nom_marca'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql = "UPDATE marca SET status='1' WHERE id_marca='$this->cod_marca'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT bn.id_marca FROM bien_nacional as bn WHERE bn.id_marca='".$this->cod_marca."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE marca SET status='0' WHERE id_marca='$this->cod_marca'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function consultar(){
		$sql = "SELECT * FROM marca WHERE status='1' or status='0'";
		return $this->ejecuta($sql);
	}
	function consultarActivos(){
		$sql = "SELECT * FROM marca WHERE status='1' or status='2'";
		return $this->ejecuta($sql);
	}
	function consultar_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM marca as m WHERE m.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM marca as m WHERE m.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM marca as m WHERE (m.nom_marca like '%$valor%') and m.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM marca as m WHERE (m.nom_marca like '%$valor%') and m.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM marca as m WHERE (m.nom_marca like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM marca as m WHERE (m.nom_marca like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function bus_marca(){
		$sql="SELECT *FROM marca WHERE nom_marca='$this->nom_marca' WHERE status='1' or status='0'";
		return $this->ejecuta($sql);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}

?>