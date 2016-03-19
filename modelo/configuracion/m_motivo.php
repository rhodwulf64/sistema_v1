<?php
include_once('m_conexion.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO motivo_movimiento**********************//
class ClsMotivo extends clsConex{
	private $id_motivo,$des_motivo,$tipo_motivo;

	//variables para la paginacion
	public $inicio, $cantidad, $nroPaginas;

	function ClsMotivo(){
		$this->clsConex();
		$this->id_motivo="";
		$this->des_motivo="";
		$this->tipo_motivo="";

		$this->inicio = 0;
		$this->cantidad = 5;

	}
	function recibir($c,$d,$co){
		$this->id_motivo=$c;
		$this->des_motivo=$d;
		$this->tipo_motivo=$co;
	}
	function recibirCod($co){
		$this->id_motivo=$co;
	}
	function recibir2($d,$c){
		$this->des_motivo=$d;
		$this->tipo_motivo=$c;
	}
	function recibirIdents($idm){
		$this->id_motivo = $idm;
		
	}
	function incluir(){
		$sql="INSERT INTO motivo_movimiento (des_motivo_mov,tipo_motivo,status) VALUES ('$this->des_motivo','$this->tipo_motivo','1')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql="UPDATE motivo_movimiento SET des_motivo_mov='$this->des_motivo',tipo_motivo='$this->tipo_motivo' WHERE id_motivo_mov='$this->id_motivo'";
		$this->ejecuta($sql);
	}
	function motivoDeBloqueo(){
	 	$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='BLOQUEOUS' and status='1'";
	 	return $this->ejecuta($sql);
	}
	function ConsultarPorDescripcion(){
		$sql = "SELECT * FROM motivo_movimiento WHERE des_motivo_mov='$this->des_motivo' AND tipo_motivo='$this->tipo_motivo'";
		return $this->ejecuta($sql);
	}
	function consultar(){
		$sql = "SELECT m.id_mun, m.tipo_motivo FROM motivo_movimiento as m WHERE m.id_mun='".$this->id_motivo."' and m.tipo_motivo='".$this->tipo_motivo."'";
		return $this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql="SELECT * FROM motivo_movimiento WHERE id_motivo_mov='$this->id_motivo'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql="UPDATE motivo_movimiento SET status='1' WHERE id_motivo_mov='$this->id_motivo'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		// $sql="SELECT m.id_motivo_mov FROM movimiento as m WHERE m.id_motivo_mov='".$this->id_motivo."'";
		// $rs = $this->ejecuta($sql);
		// if($this->como_va()){
		// 	return false;
		// }else{
			$sql="UPDATE motivo_movimiento SET status='0' WHERE id_motivo_mov='$this->id_motivo'";
			$this->ejecuta($sql);
		//}
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function bus_est(){
		$sql="SELECT m.id_mun, m.des_motivo_mov, m.status, m.tipo_motivo FROM motivo_movimiento as m INNER JOIN estado as e WHERE m.id_mun='$this->tipo_motivo'";
		return $this->ejecuta($sql);
	}
	
	//*****************************FUNCION PARA EL COMBO motivo_movimiento *************************//
	function motivoDeRecepcion(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='RECEPCIÓN' and status='1'";
		return $this->ejecuta($sql);
	}
		
	//*************************************************************************************//
	//*****************************FUNCION PARA EL COMBO motivo_movimiento ****************//
	function motivoDeAnulacion(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='ANULACIÓNRE' and status='1'";
		return $this->ejecuta($sql);
	}
	//*************************************************************************************//
	//*****************************FUNCION PARA EL COMBO motivo_movimiento ****************//
	function motivoDeAnulacionAsig(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='ANULACIÓNAS' and status='1'";
		return $this->ejecuta($sql);
	}
	//*************************************************************************************//
	//*****************************FUNCION PARA EL COMBO motivo_movimiento ****************//
	function motivoDeAnulacionDesin(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='ANULACIÓNDS' and status='1'";
		return $this->ejecuta($sql);
	}
	//*************************************************************************************//
	//*****************************FUNCION PARA EL COMBO motivo_movimiento ****************//
	function motivoDeAnulacionDev(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='ANULACIÓNDV' and status='1'";
		return $this->ejecuta($sql);
	}
	//*************************************************************************************//
	//*****************************FUNCION PARA EL COMBO motivo_movimiento ****************//
	function motivoDeAsignacion(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='ASIGNACIÓN' and status='1'";
		return $this->ejecuta($sql);
	}
	//*************************************************************************************//
	function motivoDeDevolucion(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='DEVOLUCIÓN' and status='1'";
		return $this->ejecuta($sql);
	}
	//*************************************************************************************//
	function motivoDeAnulacionDesAnul(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='ANULACIÓNDS' and status='1'";
		return $this->ejecuta($sql);
	}
	function motivoDeDesin(){
		$sql = "SELECT * FROM motivo_movimiento WHERE tipo_motivo='DESINCORPORACIÓN' and status='1'";
		return $this->ejecuta($sql);
	}

		function Consultarr(){
			$sql = "SELECT * FROM motivo_movimiento limit $this->inicio,$this->cantidad";
			return $this->ejecuta($sql);
		}

		function nroPaginasPorRegistro(){
			$sql = "SELECT count(*) as cod FROM motivo_movimiento";
			$consulta = $this->ejecuta($sql);
			$data = $this->converArray($consulta);
			$cantidad = $data["cod"];
			$totalPaginas = ceil($cantidad/$this->cantidad); //divido la cantidad de registros de la BD / la cantidad de registros a mostrar y lo redondedo para obtener el numero de paginas
			return $totalPaginas;
		}

		function Consultarr_Ajax($status,$valor){
			if($status == "1" && $valor == "" ){ //busco por estatus activos
				$sql = "SELECT * FROM motivo_movimiento as m WHERE m.status='1'";
				return $this->ejecuta($sql);
			}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
				$sql = "SELECT * FROM motivo_movimiento as m WHERE m.status='0'";
				return $this->ejecuta($sql);
			}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
				$sql = "SELECT * FROM motivo_movimiento as m WHERE (m.des_motivo_mov like '%$valor%' or m.tipo_motivo like '%$valor%') and m.status='1'";
				return $this->ejecuta($sql);
			}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
				$sql = "SELECT * FROM motivo_movimiento as m WHERE (m.des_motivo_mov like '%$valor%' or m.tipo_motivo like '%$valor%') and m.status='0'";
				return $this->ejecuta($sql);
			}else if($valor != ""){ //busco solo por nombres
				$sql = "SELECT * FROM motivo_movimiento as m WHERE (m.des_motivo_mov like '%$valor%' or m.tipo_motivo like '%$valor%')";
				return $this->ejecuta($sql);
			}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
				$sql = "SELECT * FROM motivo_movimiento as m WHERE (m.des_motivo_mov like '%$valor%' or m.tipo_motivo like '%$valor%')";
				return $this->ejecuta($sql);
			}
		}
}
?>