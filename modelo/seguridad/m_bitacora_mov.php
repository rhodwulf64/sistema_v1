<?php
//include_once('m_conexion.php');
class clsBitacora extends clsConexion{

	function clsBitacora(){
		$this->clsConexion();
	}

	function consulta(){
		$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio,m.fecha_mov ,tm.nom_tipo_mov,tm.cod_tipo_mov,mm.des_motivo_mov,mm.tipo_motivo 
		FROM (sesionuser as s INNER JOIN usuario as u ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per) INNER JOIN movimiento as m ON m.id_usuario=u.id_usuario INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN motivo_movimiento as mm ON m.id_motivo_mov=mm.id_motivo_mov";
		return $this->ejecuta($sql);
	}

	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function fecha_salida($fecha){
		$fecha=substr($fecha, 8,4).'-'.substr($fecha, 5,2).'-'.substr($fecha, 0,4);
		return $fecha;
	}

	function CountRegistros(){
		$sql = "SELECT count(*) as cant FROM cargo";
		$consulta = $this->ejecuta($sql);
		$cantidad = $this->converArray($consulta);
		$cant = $cantidad["cant"];
		return $cant;
	} 
}
?>