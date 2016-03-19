<?php
include_once("m_conexion.php");

class clsCondicion extends clsConex
{
	private $cod_cond,$nom_cond;

	function clsCondicion(){
		$this->clsConex();
		$this->cod_cond="";
		$this->nom_cond="";
	}

	function recibir($co,$ca){
		$this->cod_cond=$co;
		$this->nom_cond=$ca;
	}
	function recibir_Cod($co){
		$this->cod_cond=$co;
	}
	function recibir2($no){
		$this->nom_cond=$no;
	}

	function incluir(){
		$sql = "INSERT INTO condicion (id_cond,nom_cond,status) VALUES ('$this->cod_cond','$this->nom_cond','1')";
		$this->ejecuta($sql);
	}

	function modificar(){
		$sql = "UPDATE condicion SET nom_cond='$this->nom_cond' WHERE id_cond='$this->cod_cond'";
		$this->ejecuta($sql);
	}

	function buscar(){
		$sql = "SELECT * FROM condicion WHERE nom_cond='$this->nom_cond'";
		return $this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM condicion WHERE id_cond='$this->cod_cond'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql = "UPDATE condicion SET  status='1' WHERE id_cond='$this->cod_cond'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT bn.id_cond FROM bien_nacional as bn WHERE bn.id_cond='".$this->cod_cond."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE condicion SET  status='0' WHERE id_cond='$this->cod_cond'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function consultar(){
		$sql = "SELECT * FROM condicion";
		return $this->ejecuta($sql);
	}
	function consultar_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM condicion as c WHERE c.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM condicion as c WHERE c.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM condicion as c WHERE (c.nom_cond like '%$valor%') and c.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM condicion as c WHERE (c.nom_cond like '%$valor%') and c.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM condicion as c WHERE (c.nom_cond like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM condicion as c WHERE (c.nom_cond like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function bus_condicion(){
		$sql="SELECT *FROM condicion WHERE nom_cond='$this->nom_cond'";
		return $this->ejecuta($sql);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}

?>