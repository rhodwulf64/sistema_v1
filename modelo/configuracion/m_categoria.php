<?php 
include_once("m_conexion.php");

class clsCategoria extends clsConex
{
	private $cod_cat,$nom_cat;

	function clsCategoria(){
		$this->clsConex();
		$this->cod_cat="";
		$this->nom_cat="";
	}
	function recibirId_Cat($id){
		$this->cod_cat = $id;
	}
	function recibir($co,$ca){
		$this->cod_cat=$co;
		$this->nom_cat=$ca;
	}
	function recibirNom($no){
		$this->nom_cat = $no;
	}
	function recibir2($co){
		$this->nom_cat=$co;
	}

	function incluir(){
		$sql = "INSERT INTO categoria (id_categoria,nom_cat,status) VALUES ('$this->cod_cat','$this->nom_cat','1')";
		$this->ejecuta($sql);
	}

	function modificar(){
		$sql = "UPDATE categoria SET id_categoria='$this->cod_cat',nom_cat='$this->nom_cat' WHERE id_categoria='$this->cod_cat'";
		$this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM categoria WHERE id_categoria='".$this->cod_cat."'";
		return $this->ejecuta($sql);
	}
	function buscar(){
		$sql = "SELECT * FROM categoria WHERE nom_cat='$this->nom_cat'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql = "UPDATE categoria SET  status='1' WHERE id_categoria='$this->cod_cat'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT tb.id_categoria FROM tipo_bien as tb WHERE tb.id_categoria='".$this->cod_cat."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE categoria SET  status='0' WHERE id_categoria='$this->cod_cat'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function consultar(){
		$sql = "SELECT * FROM categoria";
		return $this->ejecuta($sql);
	}
	function consultar_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT c.id_categoria, c.nom_cat, c.status FROM categoria as c WHERE c.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT c.id_categoria, c.nom_cat, c.status FROM categoria as c WHERE c.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT c.id_categoria, c.nom_cat, c.status FROM categoria as c WHERE (c.nom_cat like '%$valor%') and c.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT c.id_categoria, c.nom_cat, c.status FROM categoria as c WHERE (c.nom_cat like '%$valor%') and c.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT c.id_categoria, c.nom_cat, c.status FROM categoria as c WHERE (c.nom_cat like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT c.id_categoria, c.nom_cat, c.status FROM categoria as c WHERE (c.nom_cat like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function consultarActivos(){
		$sql = "SELECT * FROM categoria WHERE status='1'";
		return $this->ejecuta($sql);
	}
	function bus_cat(){
		$sql="SELECT *FROM categoria WHERE nom_cat='$this->nom_cat'";
		return $this->ejecuta($sql);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}

?>