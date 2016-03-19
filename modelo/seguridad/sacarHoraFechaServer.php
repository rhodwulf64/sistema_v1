<?php
// Clase para el usuario y acceder a los datos del mismo

include_once("m_conexion.php");

class clsFechaHora extends clsConexion{

	function clsFechaHora(){
		$this->clsConexion();
	}

	/** obtengo fecha de base de datos formtato 00 de '' de 0000 **/
	public function ObtenerFechaServer(){
		$sql = "SELECT CURDATE() as fecha";
		$fechaServer = $this->ConverArray($this->ejecuta($sql)); // la paso a un arreglo asociativo
		$fecha = $this->traerFecha($fechaServer["fecha"]);// volteo la fecha a formato criollito
		return $fecha;
	}
	protected function traerFecha($fec){
		$meses = Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$fechaServer = (substr($fec,8,2).' de '.$meses[substr($fec,5,2)-1].' de '.substr($fec,0,4));
		return $fechaServer;
	}
	/** obtengo fecha de base de datos formtato 00-00-000 **/
	public function ObtenerFechaServer2(){
		$sql = "SELECT CURDATE() as fecha";
		$fechaServer = $this->ConverArray($this->ejecuta($sql)); // la paso a un arreglo asociativo
		$fecha = $this->traerFecha2($fechaServer["fecha"]);// volteo la fecha a formato criollito
		return $fecha;
	}
	protected function traerFecha2($fec){
		$fechaServer = substr($fec,8,2).'-'.substr($fec,5,2).'-'.substr($fec,0,4);
		return $fechaServer;
	}
	/** obtengo fecha de base de datos tal cual en formtato 0000-00-00 **/
	public function ObtenerFechaServer3(){
		$sql = "SELECT CURDATE() as fecha";
		$fechaServer = $this->ConverArray($this->ejecuta($sql)); // la paso a un arreglo asociativo
		return $fechaServer['fecha'];
	}

	/****** OBTENER HORA FORMATO DE 24 *******/
	public function ObtenerHoraServer(){
		$sql = "SELECT CURTIME() as hora";
		$HoraServer = $this->ConverArray($this->ejecuta($sql));
		return $HoraServer["hora"];
	}

	protected function ConverArray($rs){
		return $this->TraerArreglo($rs);
	}

}// fin de la clase

?>