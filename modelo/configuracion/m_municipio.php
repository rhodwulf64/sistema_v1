<?php
include_once('m_conexion.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO MUNICIPIO**********************//
class ClsMunicipio extends clsConex{
	private $cod_mun,$des_mun,$cod_est;
	function ClsMunicipio(){
		$this->clsConex();
		$this->cod_mun="";
		$this->des_mun="";
		$this->cod_est="";
	}
	function recibir($c,$d,$co){
		$this->cod_mun=$c;
		$this->des_mun=$d;
		$this->cod_est=$co;
	}
	function recibirCod($co){
		$this->cod_mun=$co;
	}
	function recibir2($d,$c){
		$this->des_mun=$d;
		$this->cod_est=$c;
	}
	function recibirIdents($idm,$ide){
		$this->cod_mun = $idm;
		$this->cod_est = $ide;
	}
	function incluir(){
		$sql="INSERT INTO municipio (nom_mun,id_est,status) VALUES ('$this->des_mun','$this->cod_est','1')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql="UPDATE municipio SET nom_mun='$this->des_mun',id_est='$this->cod_est' WHERE id_mun='$this->cod_mun'";
		$this->ejecuta($sql);
	}
	function ConsultarPorDescripcion(){
		$sql = "SELECT * FROM municipio WHERE nom_mun='$this->des_mun' AND id_est='$this->cod_est'";
		return $this->ejecuta($sql);
	}
	function consultar(){
		$sql = "SELECT m.id_mun, m.id_est FROM municipio as m WHERE m.id_mun='".$this->cod_mun."' and m.id_est='".$this->cod_est."'";
		return $this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql="SELECT * FROM municipio WHERE id_mun='$this->cod_mun' and id_est='$this->cod_est'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql="UPDATE municipio SET status='1' WHERE id_mun='$this->cod_mun'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql="SELECT p.id_mun FROM parroquia as p WHERE p.id_mun='".$this->cod_mun."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql="UPDATE municipio SET status='0' WHERE id_mun='$this->cod_mun'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function bus_est(){
		$sql="SELECT m.id_mun, m.nom_mun, m.status, m.id_est FROM municipio as m INNER JOIN estado as e WHERE m.id_mun='$this->cod_est'";
		return $this->ejecuta($sql);
	}
	function Consultar_M_E(){
		$sql="SELECT m.id_mun, m.nom_mun, m.status, e.id_est, e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est";
		return $this->ejecuta($sql);
	}
	function Consultar_M_E_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT m.id_mun, m.nom_mun, m.status, e.id_est, e.nom_est FROM municipio as m INNER JOIN estado as e WHERE e.id_est=m.id_est and m.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT m.id_mun, m.nom_mun, m.status, e.id_est, e.nom_est FROM municipio as m INNER JOIN estado as e WHERE e.id_est=m.id_est and m.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql="SELECT m.id_mun, m.nom_mun, m.status, e.id_est, e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est and (m.nom_mun like '%$valor%' or e.nom_est like '%$valor%') and m.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql="SELECT m.id_mun, m.nom_mun, m.status, e.id_est, e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est and (m.nom_mun like '%$valor%' or e.nom_est like '%$valor%') and m.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql="SELECT m.id_mun, m.nom_mun, m.status, e.id_est, e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est and (m.nom_mun like '%$valor%' or e.nom_est like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql="SELECT m.id_mun, m.nom_mun, m.status, e.id_est, e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est and (m.nom_mun like '%$valor%' or e.nom_est like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	//*****************************FUNCION PARA EL COMBO MUNICIPIO *************************//

		function consultarMunicipioEstado(){
			$sql = "SELECT m.id_mun, m.nom_mun, e.nom_est FROM municipio as m INNER JOIN estado as e on m.id_est=e.id_est and m.status='1'";
			return $this->ejecuta($sql);
		}
	//*************************************************************************************//
		function cons_estado(){
			$sql = "SELECT *FROM estado";
			return $this->ejecuta($sql);
		}
}
?>