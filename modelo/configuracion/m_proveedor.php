<?php
include_once("m_conexion.php");

class clsProveedor extends clsConex
{
	private $cod_prov,$des_prov,$prov_rif;

	function clsProveedor(){
		$this->clsConex();
		$this->cod_prov="";
		$this->des_prov="";
		$this->prov_rif="";
	}

	function recibir($co,$ca,$p){
		$this->cod_prov=$co;
		$this->des_prov=$ca;
		$this->prov_rif=$p;
	}

	function recibir2($co){
		$this->des_prov=$co;
	}
	function recibirId_Prov($co){
		$this->cod_prov=$co;
	}
	function incluir(){
		$sql = "INSERT INTO proveedor (id_prov,des_prov,rif_prov,status) VALUES ('$this->cod_prov','$this->des_prov','$this->prov_rif','1')";
		$this->ejecuta($sql);
	}

	function modificar(){
		$sql = "UPDATE proveedor SET id_prov='$this->cod_prov',des_prov='$this->des_prov',rif_prov='$this->prov_rif' WHERE id_prov='$this->cod_prov'";
		$this->ejecuta($sql);
	}

	function buscar(){
		$sql = "SELECT * FROM proveedor WHERE des_prov='$this->des_prov' and rif_prov='$this->prov_rif'";
		return $this->ejecuta($sql);
	}

	function activar(){
		$sql = "UPDATE proveedor SET  status='1' WHERE id_prov='$this->cod_prov'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		// $sql = "SELECT m.id_prov FROM movimiento as m WHERE m.id_prov='".$this->cod_prov."'";
		// $rs = $this->ejecuta($sql);
		// if($this->como_va()){
		// 	return false;
		// }else{
		 	$sql = "UPDATE proveedor SET status='0' WHERE id_prov='$this->cod_prov'";
			$this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM proveedor WHERE id_prov='$this->cod_prov'";
		return $this->ejecuta($sql);
	}
	function consultar(){
		$sql = "SELECT * FROM proveedor";
		return $this->ejecuta($sql);
	}
	function consultarStatusActivos(){
		$sql = "SELECT * FROM proveedor WHERE status='1'";
		return $this->ejecuta($sql);
	}
	function consultar_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM proveedor as p WHERE p.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM proveedor as p WHERE p.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM proveedor as p WHERE (p.des_prov like '%$valor%') and p.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM proveedor as p WHERE (p.des_prov like '%$valor%') and p.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM proveedor as p WHERE (p.des_prov like '%$valor%') OR (p.rif_prov LIKE '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM proveedor as p WHERE (p.des_prov like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function bus_prov(){
		$sql="SELECT *FROM proveedor WHERE des_prov='$this->des_prov'";
		return $this->ejecuta($sql);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}

?>