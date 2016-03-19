<?php
@session_start();
include_once("m_conexion.php");

class clsConcepto extends clsConex
{
	private $des;
	private $cod;
	
	function clsConcepto(){
		$this->clsConex();
		$this->des="";
		$this->cod="";
		
	}
	function recibir($d){
		$this->des=$d;

	}
	function recibir2($co, $d){
		$this->cod=$co;
		$this->des=$d;
	}
	function recibir3($co){
		$this->cod=$co;
	}
	function incluir(){
		$sql="INSERT INTO motivo_movimiento( des_motivo_mov, tipo_motivo, status) VALUES ( '$this->des','BLOQUEOUS', '1')";
		$this->ejecuta($sql);
	}
	function ConsultarTodo(){
		$sql="SELECT * FROM motivo_movimiento WHERE tipo_motivo='BLOQUEOUS'";
		return $this->ejecuta($sql);
	}
	function buscar(){
		$sql = "SELECT * FROM motivo_movimiento WHERE id_motivo_mov='$this->cod' ";
		return $this->ejecuta($sql);
	}
	function buscarT(){
		$sql = "SELECT * FROM motivo_movimiento WHERE des_motivo_mov='$this->des'";
		return $this->ejecuta($sql);
	}
	function buscarPorDescripcion(){
		$sql = "SELECT * FROM motivo_movimiento WHERE des_motivo_mov='$this->des'";
		return $this->ejecuta($sql);
	}
	function modificar(){
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE motivo_movimiento SET des_motivo_mov='$this->des' WHERE id_motivo_mov='$this->cod'";
			//echo $sql;
			$this->ejecuta($sql);
		}	
	}
	function desactivar(){
		 $sql="SELECT m.id_motivo_mov FROM motivo_movimiento as m WHERE m.id_motivo_mov='".$this->cod."'";

		$rs = $this->ejecuta($sql);
		//if($this->como_va()){
			//return false;
		//}else{
			 $sql="UPDATE motivo_movimiento SET status='0' WHERE id_motivo_mov='".$this->cod."'";
			
			$this->ejecuta($sql);
			//return true;
		//}
	}
	function activar(){
		$sql = "UPDATE motivo_movimiento SET  status='1' WHERE id_motivo_mov='$this->cod'";
		$this->ejecuta($sql);
	}
	function Arreglo($rs){
		return $this->TraerArreglo($rs);
	}
	function consultar_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM motivo_movimiento as m WHERE m.status='1' and m.tipo_motivo='BLOQUEOUS'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM motivo_movimiento as m WHERE m.status='0'and m.tipo_motivo='BLOQUEOUS'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM motivo_movimiento as m WHERE (m.des_motivo_mov like '%$valor%') and m.status='1' and m.tipo_motivo='BLOQUEOUS'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM motivo_movimiento as m WHERE (m.des_motivo_mov like '%$valor%') and m.status='0' and m.tipo_motivo='BLOQUEOUS'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM motivo_movimiento as m WHERE (m.des_motivo_mov like '%$valor%') and m.tipo_motivo='BLOQUEOUS'";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM motivo_movimiento as m WHERE (m.des_motivo_mov like '%$valor%') and m.tipo_motivo='BLOQUEOUS'";
			return $this->ejecuta($sql);
		}
	}

	function CountRegistros(){
		$sql = "SELECT count(*) as cant FROM motivo_movimiento";
		$consulta = $this->ejecuta($sql);
		$cantidad = $this->converArray($consulta);
		$cant = $cantidad["cant"];
		return $cant;
	
	}
}
?>