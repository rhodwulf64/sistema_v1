<?php
include_once('m_conexion.php');
class clsBitacora extends clsConexion{

	function clsBitacora(){
		$this->clsConexion();
	}

	function consulta(){
		$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio, s.fecha_fin,s.hora_fin,tm.nom_tipo_mov,tm.cod_tipo_mov,mm.des_motivo_mov 
		FROM (sesionuser as s INNER JOIN usuario as u ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per) INNER JOIN movimiento as m ON m.id_usuario=u.id_usuario INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN motivo_movimiento as mm ON m.id_motivo_mov=mm.id_motivo_mov";
		return $this->ejecuta($sql);
	}

	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}
?>