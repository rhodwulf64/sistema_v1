<?php
include_once("m_conexion.php");

class clsModelo extends clsConex
{
	private $cod_modelo,$nom_mod;

	function clsModelo(){
		$this->clsConex();
		$this->cod_modelo="";
		$this->nom_mod="";
	}

	function recibir($co,$ca){
		$this->cod_modelo=$co;
		$this->nom_mod=$ca;
	}

	function recibir2($co){
		$this->nom_mod=$co;
	}

	function incluir(){
		$sql = "INSERT INTO modelo (id_modelo,nom_mod,status) VALUES ('$this->cod_modelo','$this->nom_mod','1')";
		$this->ejecuta($sql);
	}

	function modificar(){
		$sql = "UPDATE modelo SET id_modelo='$this->cod_modelo',nom_mod='$this->nom_mod' WHERE id_modelo='$this->cod_modelo'";
		$this->ejecuta($sql);
	}

	function buscar(){
		$sql = "SELECT * FROM modelo WHERE nom_mod='$this->nom_mod'";
		return $this->ejecuta($sql);
	}

	function activar(){
		$sql = "UPDATE modelo SET  status='1' WHERE id_modelo='$this->cod_modelo'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "UPDATE modelo SET  status='0' WHERE id_modelo='$this->cod_modelo'";
		$this->ejecuta($sql);
	}

	function consultar(){
		$sql = "SELECT * FROM modelo";
		return $this->ejecuta($sql);
	}
	function bus_modelo(){
		$sql="SELECT *FROM modelo WHERE nom_mod='$this->nom_mod'";
		return $this->ejecuta($sql);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}

?>