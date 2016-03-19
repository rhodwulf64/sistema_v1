<?php
include_once('m_conexion.php');
class clsBitacoraAccess extends clsConexion{

	function clsBitacoraAccess(){
		$this->clsConexion();
	}

	function consulta($indice,$cantidad_mostrar){
		$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio,s.fecha_fin,s.hora_fin,s.dir_ip,s.dir_mac,s.nom_pc,s.nom_remoto,s.so,s.navegador
		FROM (sesionuser as s INNER JOIN usuario as u ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per) order by id_sesionUser desc LIMIT $indice,$cantidad_mostrar";
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
		$sql = "SELECT count(*) as cant FROM sesionuser";
		$consulta = $this->ejecuta($sql);
		$cantidad = $this->converArray($consulta);
		$cant = $cantidad["cant"];
		return $cant;
	} 
}
?>