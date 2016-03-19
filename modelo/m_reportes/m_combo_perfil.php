<?php
include_once('m_conexion.php');

class ClsPerfil extends conex{
	function ClsPerfil(){
		$this->conex();
	}

	function consulta(){
		$sql="SELECT *FROM perfil WHERE status='1'";
		return $this->ejecuta($sql);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}

?>