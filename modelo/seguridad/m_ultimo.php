<?php 
	require_once("m_conexion.php");
	class ultimo extends clsConexion{
		private $campo, $tabla;

		function ultimo(){
			$this->clsConexion();
			$this->campo = "";
			$this->tabla = "";
		} 
		function recibirUltimo($c,$t){
			$this->campo=$c;
			$this->tabla=$t;
		}
		function traerUltimo(){
			$sql = "SELECT max($this->campo) as max from $this->tabla";
			$tupla = $this->ejecuta($sql);
			$dato = $this->arreglo($tupla);
			return $dato["max"]+1;
		}
		function arreglo($rs){	
			return $this->TraerArreglo($rs);
		}
		
	}
 ?>