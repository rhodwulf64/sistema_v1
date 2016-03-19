<?php
//include_once('m_conexion.php');
class clsBitacora extends clsConexion{

	function clsBitacora(){
		$this->clsConexion();
	}

	function consulta($indice,$cantidad_mostrar){
		$sql = 
		"	SELECT mm.tipo_motivo AS TIPO_MOVIMIENTO,m.id_mov as NRO_MOVIMIENTO,tmm.des_motivo_mov,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,pr.des_prov as PROVEEDOR_RECEPCION,'ALMACEN' AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO, perf.nom_perfil, m.status

			FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b, proveedor as pr, perfil as perf, motivo_movimiento as tmm

			WHERE (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_prov=pr.id_prov) and (m.id_tipo_mov=1) and (us.id_perfil=perf.idperfil) and (tmm.id_motivo_mov=m.id_motivo_mov)

			UNION

			SELECT mm.tipo_motivo AS TIPO_MOVIMIENTO,m.id_mov as NRO_MOVIMIENTO,tmm.des_motivo_mov,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,'NO APLICA' as PROVEEDOR_RECEPCION,dp.nom_dep AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO, perf.nom_perfil, m.status

			FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b, departamento as dp, perfil as perf, motivo_movimiento as tmm

			WHERE (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_dep=dp.id_dep) and (m.id_tipo_mov=2) and (us.id_perfil=perf.idperfil) and (tmm.id_motivo_mov=m.id_motivo_mov)

			UNION

			SELECT mm.tipo_motivo AS TIPO_MOVIMIENTO,m.id_mov as NRO_MOVIMIENTO,tmm.des_motivo_mov,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,'NO APLICA' as PROVEEDOR_RECEPCION,'NO APLICA' AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO, perf.nom_perfil ,m.status

			FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b, perfil as perf, motivo_movimiento as tmm

			WHERE (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_tipo_mov<>1 and m.id_tipo_mov<>2) and (us.id_perfil=perf.idperfil) and (tmm.id_motivo_mov=m.id_motivo_mov)

			ORDER BY 2 LIMIT $indice,$cantidad_mostrar
		";
		return $this->ejecuta($sql);
	}

	function consultarCantRegisMov(){
		$sql = 
		"   SELECT
		    SUM(CASE WHEN id_tipo_mov = 1 and status=1 THEN 1 ELSE 0 END) cantRec,
		    SUM(CASE WHEN id_tipo_mov = 2 and status=1 THEN 1 ELSE 0 END) cantAsg,
		    SUM(CASE WHEN id_tipo_mov = 3 and status=1 THEN 1 ELSE 0 END) cantDev,
		    SUM(CASE WHEN id_tipo_mov = 4 and status=1 THEN 1 ELSE 0 END) cantDes,
		     
		    SUM(CASE WHEN id_tipo_mov = 1 and status=0 THEN 1 ELSE 0 END) cantRecAnu,
		    SUM(CASE WHEN id_tipo_mov = 2 and status=0 THEN 1 ELSE 0 END) cantAsgAnu,
		    SUM(CASE WHEN id_tipo_mov = 3 and status=0 THEN 1 ELSE 0 END) cantDevAnu,
		    SUM(CASE WHEN id_tipo_mov = 4 and status=0 THEN 1 ELSE 0 END) cantDesAnu
		FROM movimiento;
		";
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
		$sql = "SELECT count(*) as cant FROM movimiento";
		$consulta = $this->ejecuta($sql);
		$cantidad = $this->converArray($consulta);
		$cant = $cantidad["cant"];
		return $cant;
	} 

}
?>