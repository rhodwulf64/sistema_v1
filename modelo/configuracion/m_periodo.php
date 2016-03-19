<?php
include_once("m_conexion.php");

class clsPeriodo extends clsConex
{
	private $G;

	function clsPeriodo(){
		$this->clsConex();
		$this->G = "";
	}
	function recibirTodos($POST){
		$this->G = $POST;
	}

	function Registrar_Periodo(){
		$fecha = $this->fecha_subida($this->G["fecha_inicio"]);
		$fecha2 = $this->fecha_subida($this->G["fecha_fin"]);
		 
		$sql = "INSERT INTO periodo (nom_periodo,fecha_inicio,fecha_fin,status) VALUES ('".$this->G["nom_periodo"]."','$fecha','$fecha2','1')";
		$this->ejecuta($sql);
	}

	/******************* metodos nuevos *********************/
	function buscarPeriodos(){
		$sql = "SELECT p.id_periodo FROM periodo as p";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			// hay fechas en la tabla periodo
			$sql = "SELECT p.nom_periodo, p.fecha_inicio, p.fecha_fin FROM periodo as p WHERE p.id_periodo in (SELECT max(id_periodo) as max FROM periodo as p)";
			$rs = $this->ejecuta($sql); //ejecuto la consulta
			$tupla= $this->converArray($rs); // convierto la consuta en un array asociativo
			$fecha = $this->fecha_bajada($tupla['fecha_fin']); // volteo la fecha

			$arreglo_fecha = array(); // creo un arreglo

			// $dia = substr($fecha,0,2);
			// $mes = substr($fecha,3,2);
			$ano = substr($fecha,6,4);

			/*** fecha de inicio **/
			$dia_I_n = '01'; // inicio del dia del periodo
			$mes_I_n = '01'; // inicio del mes del periodo
			$ano_I_n = $ano + 1; // incremento 1 al año

			/*** fecha fin **/
			$dia_F_n = 31; // inicio del dia del periodo
			$mes_F_n = 12; // inicio del mes del periodo

			$arreglo_fecha[0] = $ano_I_n;
			$arreglo_fecha[1] = $dia_I_n.'-'.$mes_I_n.'-'.$ano_I_n;
			$arreglo_fecha[2] = $dia_F_n.'-'.$mes_F_n.'-'.$ano_I_n;
			return $arreglo_fecha;
		}else{
			// no hay fechas en la tabla periodo y me voy a sistema
			$sql = "SELECT s.ultimo_periodo FROM sistema as s"; //consulto la fecha en tabla sistema
			$rs = $this->ejecuta($sql); //ejecuto la consulta
			$tupla = $this->converArray($rs); // convierto la consuta en un array asociativo
			$fecha = $this->fecha_bajada($tupla['ultimo_periodo']); // volteo la fecha
			$arreglo_fecha = array(); // creo un arreglo

			// $dia = substr($fecha,0,2);
			// $mes = substr($fecha,3,2);
			$ano = substr($fecha,6,4);

			/*** fecha de inicio **/
			$dia_I_n = '01'; // inicio del dia del periodo
			$mes_I_n = '01'; // inicio del mes del periodo
			$ano_I_n = $ano + 1; // incremento 1 al año

			/*** fecha fin **/
			$dia_F_n = 31; // inicio del dia del periodo
			$mes_F_n = 12; // inicio del mes del periodo

			$arreglo_fecha[0] = $ano_I_n;
			$arreglo_fecha[1] = $dia_I_n.'-'.$mes_I_n.'-'.$ano_I_n;
			$arreglo_fecha[2] = $dia_F_n.'-'.$mes_F_n.'-'.$ano_I_n;
			return $arreglo_fecha;
		//	return $formateo;
		}
	}

	function ValidarPeriodoAbierto(){
		$sql = "SELECT p.id_periodo, p.status FROM periodo as p WHERE p.status='2'";
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return true;
		}else{
			return false;
		}
	}
	function buscarPeriodosNA(){
		$sql_ul = "SELECT min(id_periodo) as min from periodo WHERE status='1'";
		$tupla = $this->ejecuta($sql_ul);
		$dato = $this->converArray($tupla);

		$sql = "SELECT p.id_periodo, p.nom_periodo, p.fecha_inicio, p.fecha_fin FROM periodo as p WHERE p.id_periodo='".$dato["min"]."'";
		return $this->ejecuta($sql); //ejecuto la consulta
	}
	function abrirPeriodo($periodo){
		$sql = "UPDATE periodo SET status='2' WHERE id_periodo='".$periodo."'";
		$this->ejecuta($sql);
	}
	function cerrarPeriodo($periodo){
		$sql = "UPDATE periodo SET status='3' WHERE id_periodo='".$periodo."'";
		$this->ejecuta($sql);
	}
	function fecha_subida($fecha){ 
		$fecha = substr($fecha,6,4).'-'.substr($fecha, 3,2).'-'.substr($fecha,0,2);
		return $fecha;
	}
	function fecha_bajada($fecha){
		$fecha = substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);
		return $fecha;
	}
	function TraerPeriodoPorId($valor){
		$sql = "SELECT * FROM periodo WHERE id_periodo='$valor'";
		return $this->ejecuta($sql);
	}
	function ValidarPeriodoAbiertoParaCerrar(){
		$sql = "SELECT * FROM periodo as p WHERE p.status='2'";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			return $tupla;
		}else{
			return false;
		}
	}


	/********************************************************/
	function modificar(){
		$sql = "UPDATE periodo SET id_periodo='$this->id_periodo',fecha_inicio='$this->fecha_inicio',fecha_fin='$this->fecha_fin' WHERE id_periodo='$this->id_periodo'";
		$this->ejecuta($sql);
	}

	function buscar(){
		$sql = "SELECT * FROM periodo WHERE fecha_inicio='$this->fecha_inicio'";
		return $this->ejecuta($sql);
	}

	function activar(){
		$sql = "UPDATE periodo SET  status='1' WHERE id_periodo='$this->id_periodo'";
		$this->ejecuta($sql);
	}
	
	function desactivar(){
		$sql = "SELECT dm.id_periodo FROM detalle_movimiento as dm WHERE dm.id_periodo='".$this->id_periodo."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE periodo SET status='0' WHERE id_periodo='$this->id_periodo'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function consultarInc(){
		$fecha = $this->fecha_subida($this->fecha_inicio);
		$sql = "SELECT periodo.fecha_inicio FROM periodo WHERE fecha_inicio='$fecha'";
		return $this->ejecuta($sql);
	}
	function consultar(){
		$sql = "SELECT * FROM periodo";
		return $this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM periodo WHERE id_periodo='$this->id_periodo'";
		return $this->ejecuta($sql);
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}

?>