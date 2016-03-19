<?php
// Clase para el usuario y acceder a los datos del mismo

require_once("m_conexion.php");

class clstUser Extends clsConexion{
	private $nom, $id;
	function clstUser(){
		$this->clsConexion(); // se llama al contructor del padre
		$this->id = "";
		$this->nom = "";
	}
	function recibirMod($id,$no){
		$this->id = $id;
		$this->nom = $no;
	}
	function recibirId($i){
		$this->id = $i;
	}
	function recibirNom($no){
		$this->nom = $no;
	}
	function incluir(){
		$sql = "INSERT INTO perfil (nom_perfil,status) VALUES ('$this->nom','1')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql = "UPDATE perfil SET nom_perfil='$this->nom' WHERE idperfil='$this->id'";
		$this->ejecuta($sql);
	}
	function consultar(){	
		$sql = "SELECT * FROM perfil";
		return $this->ejecuta($sql);
	}
	function consultarActivos(){
		$sql = "SELECT * FROM perfil WHERE status='1'";
		return $this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM perfil WHERE idperfil='$this->id'";
		return $this->ejecuta($sql);
	}
	function buscar(){
		$sql = "SELECT * FROM perfil WHERE nom_perfil='$this->nom'";
		return $this->ejecuta($sql);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function activar(){
		$sql = "UPDATE perfil SET status='1' WHERE idperfil='$this->id'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT u.id_perfil FROM usuario as u WHERE u.id_perfil='".$this->id."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE perfil SET status='0' WHERE idperfil='$this->id'";
			$this->ejecuta($sql);
			return true;
		}
	}
}// fin de la clase
?>