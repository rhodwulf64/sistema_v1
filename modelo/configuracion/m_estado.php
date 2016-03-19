<?php
include_once('m_conexion.php');
class ClsEstado extends clsConex{
	private $cod,$des;
	function ClsEstado(){
		$this->clsConex();
		$this->cod="";
		$this->des="";
	}
	function recibir($c,$n){
		$this->cod=filter_var($c,FILTER_SANITIZE_STRING);
		$this->des=filter_var($n,FILTER_SANITIZE_STRING);
	}
	function recibirDes($n){
		$this->des = $n;
	}
	function recibir2($co){
		$this->cod = $co;
	}
	function incluir(){
		$sql="INSERT INTO estado (nom_est,status)  VALUES('$this->des','1')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql="UPDATE  estado SET nom_est='$this->des' WHERE id_est='$this->cod'";
		$this->ejecuta($sql);
	}
	function ConsultarTodo(){
		$sql = "SELECT * FROM estado";
		return $this->ejecuta($sql);
	}
	function ConsultarTodo_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM estado as e WHERE (e.status like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM estado as e WHERE (e.status like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM estado as e WHERE (e.nom_est like '%$valor%' and e.status like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM estado as e WHERE (e.nom_est like '%$valor%' and e.status like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM estado as e WHERE (e.nom_est like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM estado as e WHERE (e.nom_est like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function consultar(){
		$sql="SELECT * FROM  estado WHERE id_est='$this->cod'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql="UPDATE estado set status='1' WHERE id_est='$this->cod'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql="SELECT m.id_est FROM municipio as m WHERE m.id_est='".$this->cod."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql="UPDATE estado SET status='0' WHERE id_est='$this->cod'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function getEstado($rs){
		return $this->TraerArreglo($rs);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function bus_estado(){
		$sql="SELECT * FROM estado WHERE nom_est='$this->des'";
		return $this->ejecuta($sql);
	}

	//*********************************FUNCION PARA CONSULTAR EL ESTADO***********************************//
		function consultarEstado(){
			$sql="SELECT * FROM estado WHERE status='1'";
			return $this->ejecuta($sql);
		}

	//**********************************************************************************************//
}
?>