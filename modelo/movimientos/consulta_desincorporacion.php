<?php @session_start();
//include_once('../seguridad/m_conexion.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO MUNICIPIO**********************//
class clsDesincorConsul Extends clsConexion{
	
	function clsDesincorConsul(){
		$this->clsConexion();
	}

	function RecibirTodo($POST){
	 	$this->G = $POST;
	}

	function converArray($rs){
	 	return $this->TraerArreglo($rs);
	}

	function Consultar_desincorporacion(){
		//en curso...
		$sql = "SELECT mov.id_mov,mov.nro_document,mov.fecha_reg,mov.hora_reg,mov.fecha_mov,mov.id_tipo_mov,mov.id_per,mov.id_usuario,mov.id_motivo_mov,mov.id_periodo,mov.observacion_mov, per.ced_per as ced_per_desin,per.nom_per as nom_per_desin,per.ape_per as ape_per_desin,user.login,mot_mov.des_motivo_mov,
		tipo_mov.cod_tipo_mov,tipo_mov.nom_tipo_mov,peri.nom_periodo
		FROM movimiento as mov,personal as per,usuario as user,motivo_movimiento as mot_mov,tipo_movimiento as tipo_mov,periodo as peri
		WHERE (mov.id_tipo_mov=tipo_mov.id_tipo_mov) and (mov.id_tipo_mov='4') and (mov.id_per=per.id_per) and (mov.id_usuario=user.id_usuario) and (mov.id_motivo_mov=mot_mov.id_motivo_mov) and (mov.id_periodo=peri.id_periodo)
		and (mov.status='1') order by mov.id_mov desc";
		return $this->ejecuta($sql);
		// del usuario te estas trayendo solo el login falta nombre y apellido
	}
	function Consultar_Cant_Movimientos(){
		$sql = "SELECT count(id_mov) as cantidad FROM movimiento WHERE id_tipo_mov=4 and status=1";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			$cant = $tupla["cantidad"];
			return $cant;
		}
	}
}//cierre clase

?>