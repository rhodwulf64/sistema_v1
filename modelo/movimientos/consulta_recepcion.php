<?php @session_start();
include_once('../seguridad/m_conexion.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO MUNICIPIO**********************//
class clsRecepcionConsul Extends clsConexion{
	
	function clsRecepcionConsul(){
		$this->clsConexion();
	}

	function RecibirTodo($POST){
	 	$this->G = $POST;
	}

	function converArray($rs){
	 	return $this->TraerArreglo($rs);
	}

	function Consultar_Recepcion(){
		$sql = "SELECT mov.id_mov,mov.nro_document,mov.fecha_reg,mov.hora_reg,mov.fecha_mov,mov.id_tipo_mov,mov.id_prov,mov.id_per,mov.id_usuario,mov.id_motivo_mov,mov.id_periodo,mov.id_dep,mov.observacion_mov, per.ced_per,per.nom_per,per.ape_per,user.login,mot_mov.des_motivo_mov,
		tipo_mov.cod_tipo_mov,tipo_mov.nom_tipo_mov,prov.des_prov,peri.nom_periodo,depart.nom_dep 
		FROM movimiento as mov INNER JOIN personal as per INNER JOIN usuario as user INNER JOIN motivo_movimiento as mot_mov INNER JOIN tipo_movimiento as tipo_mov INNER JOIN proveedor as prov INNER JOIN periodo as peri INNER JOIN departamento as depart
		WHERE mov.id_tipo_mov=tipo_mov.id_tipo_mov and mov.id_tipo_mov='1' and mov.id_prov=prov.id_prov and mov.id_per=per.id_per and mov.id_usuario=user.id_usuario and mov.id_motivo_mov=mot_mov.id_motivo_mov and mov.id_periodo=peri.id_periodo
		and mov.id_dep=depart.id_dep and mov.status='1' order by mov.id_mov desc";
		return $this->ejecuta($sql);
		// del usuario te estas trayendo solo el login falta nombre y apellido
	}
	function Consultar_Cant_Movimientos(){
		$sql = "SELECT count(id_mov) as cantidad FROM movimiento WHERE id_tipo_mov=1 and status=1";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			$cant = $tupla["cantidad"];
			return $cant;
		}
	}
}//cierre clase

?>