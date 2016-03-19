<?php
// Clase para acceder al SMBD MYSql utilizando mysqli Orientado a Objetos
class clsConexion{
	private $OmyI;

	function clsConexion()  // constructor de la clase
	{
		$servidor="localhost";
		$bd="bd_cicpc";
		$usuario="job";
		$clave="1234";
		$this->OmyI = new  mysqli( $servidor, $usuario, $clave, $bd );// se crea un objeto mysqli conecta SMDB y BD
	}
	function ejecuta($sql)
	{
		if ( mysqli_connect_error() ) // existe algun error al conectar
			die( "No se conecta: " . mysqli_connect_error() );
		$result = $this->OmyI->query( $sql ); // se ejecuta el query
		return $result;
	}
	function como_va(){
		if ( $this->OmyI->affected_rows > 0 ) // verifica si la operacion ICME se ejecuta bien
			return true;
		else
			return false;
	}
	function TraerArreglo($rs){ // convierte un record set en un arreglo
		return $rs->fetch_array(MYSQLI_ASSOC);
	}
}	
?>