<?php @session_start();
include_once('../seguridad/m_conexion.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO MUNICIPIO**********************//
class clsDevolucionConsul Extends clsConexion{
	
	function clsDevolucionConsul(){
		$this->clsConexion();
	}

	function RecibirTodo($POST){
	 	$this->G = $POST;
	}

	function converArray($rs){
	 	return $this->TraerArreglo($rs);
	}

	function Consultar_devolucion(){
		$sql = "SELECT mov.id_mov,mov.nro_document,mov.fecha_reg,mov.hora_reg,mov.fecha_mov,mov.id_tipo_mov,mov.id_per,mov.id_usuario,mov.id_motivo_mov,mov.id_periodo,mov.id_dep,mov.id_resp_dep,mov.observacion_mov, per.ced_per as ced_per_dev,per.nom_per as nom_per_dev,per.ape_per as ape_per_dev,user.login,mot_mov.des_motivo_mov,
		tipo_mov.cod_tipo_mov,tipo_mov.nom_tipo_mov,peri.nom_periodo,depart.nom_dep,resp.ced_per as ced_per_resp,resp.nom_per as nom_per_resp,resp.ape_per as ape_per_resp
		FROM movimiento as mov,personal as per, personal as resp,usuario as user,motivo_movimiento as mot_mov,tipo_movimiento as tipo_mov,periodo as peri,departamento as depart
		WHERE (mov.id_tipo_mov=tipo_mov.id_tipo_mov) and (mov.id_tipo_mov='3') and (mov.id_per=per.id_per) and (mov.id_resp_dep=resp.id_per) and (mov.id_usuario=user.id_usuario) and (mov.id_motivo_mov=mot_mov.id_motivo_mov) and (mov.id_periodo=peri.id_periodo)
		and (mov.id_dep=depart.id_dep) and (mov.status='1') order by mov.id_mov desc";
		return $this->ejecuta($sql);
		// del usuario te estas trayendo solo el login falta nombre y apellido
	}
	function Consultar_Cant_Movimientos(){
		$sql = "SELECT count(id_mov) as cantidad FROM movimiento WHERE id_tipo_mov=3 and status=1";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			$cant = $tupla["cantidad"];
			return $cant;
		}
	}
}//cierre clase

?>