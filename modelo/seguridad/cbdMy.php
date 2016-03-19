<?php
// Clase para acceder al SMBD MYSql utilizando el metodo basico (algo obsoleto)
class clsConex{
	private $servidor;
	private $bd;
	private $usuario;
	private $clave;
	private $conexion;
	protected function clsConex() // constructor de la clase
	{
		$this->servidor="localhost";
		$this->bd="clase1";
		$this->usuario="job";
		$this->clave="1234";
	}
	function conecta()
	{
		$this->conexion = mysql_connect( $this->servidor, $this->usuario, $this->clave); // se conecta al SMBD
		if ($this->conexion && mysql_select_db( $this->bd, $this->conexion)) // se conecta al BD
			return true;
		else
			die( "No se conecta: " . mysql_error() );
	}
	protected function ejecuta($sql)
	{
		$this->conecta();
		return mysql_query($sql); // se ejecuta el query
	}
	function como_va(){
		// verifica si la operacion ICME se ejecuta bien
		if ( mysql_affected_rows() > 0 or ($result && mysql_num_rows( $result ) > 0) ) 
			return true;
		else
			return false;
	}
	function TraerArreglo($rs){ // convierte un record set en un arreglo
		return mysql_fetch_array($rs);
	}
}	
?>