<?php
class conex{

	function conex(){
		$this->conexion=mysql_connect('localhost','job','1234');
		$this->conexion_bd=mysql_select_db('bd_cicpc',$this->conexion);
		if($this->conexion && $this->conexion_bd){
			return true;
		}else{
			return false;
		}
	}
	function ejecuta($sql){
		$this->conex();
		return mysql_query($sql);
	}
	function TraerArreglo($rs){
		return mysql_fetch_array($rs);
	}
	function bd_fecha($fecha){
		$fecha=substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);
		return $fecha;
	}
	function como_va(){
		if ( $this->OmyI->affected_rows > 0 ) // verifica si la operacion ICME se ejecuta bien
			return true;
		else
			return false;
	}

}

?>
