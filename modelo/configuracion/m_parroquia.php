<?php
include_once('m_conexion.php');
 //********************************COMIENZO DE LA CLASE DEL OBJETO parroquia**********************************//
class Clsparroquia extends clsConex{
	private $cod_parroq,$nom_parroq,$id_mun,$id_est;
	function Clsparroquia(){
		$this->clsConex();
		$this->cod_parroq="";
		$this->nom_parroq="";
		$this->id_mun="";
		$this->id_est = "";
	}
	function recibir2($c,$i){
		$this->nom_parroq = $c;
		$this->id_mun = $i;
	}
	function recibirIdents($cp,$cm,$ce){
		$this->cod_parroq = $cp;
		$this->id_mun = $cm;
		$this->id_est = $ce;
	}
	function RecibirIdNomParroq($c,$d){
		$this->cod_parroq = $c;
		$this->nom_parroq = $d;
	}
	function recibir($c,$d,$mun){
		$this->cod_parroq = $c;
		$this->nom_parroq = $d;
		$this->id_mun = $mun;
	}
	function incluir(){
		$sql="INSERT INTO parroquia (nom_parroq,id_mun,status) VALUES ('$this->nom_parroq','$this->id_mun','1')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql = "UPDATE parroquia SET nom_parroq='$this->nom_parroq',id_mun='$this->id_mun' WHERE id_parroq='$this->cod_parroq'";
		$this->ejecuta($sql);
	}
	function ConsultarPorDescripcion(){
		$sql = "SELECT * FROM parroquia WHERE nom_parroq='$this->nom_parroq' AND id_mun='$this->id_mun'";
		return $this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT p.id_parroq,p.nom_parroq,p.status,m.id_mun,m.nom_mun FROM parroquia as p inner join municipio as m  WHERE p.id_parroq='$this->cod_parroq' and m.id_mun='$this->id_mun'";
		return $this->ejecuta($sql);
	}
	function buscar(){
		$sql = "SELECT * FROM parroquia WHERE nom_parroq='$this->nom_parroq' AND id_mun='$this->id_mun'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql="UPDATE parroquia SET status='1' WHERE id_parroq='$this->cod_parroq'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT s.id_parroq FROM sede as s WHERE s.id_parroq='".$this->cod_parroq."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE parroquia SET status='0' WHERE id_parroq='$this->cod_parroq'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function Consultar_P_M_E(){
		$sql="SELECT p.id_parroq, p.nom_parroq, p.status, m.id_mun, m.nom_mun, e.id_est, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est";
		return $this->ejecuta($sql);
	}
	function Consultar_P_M_E_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT p.id_parroq, p.nom_parroq, p.status, m.id_mun, m.nom_mun, e.id_est, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and p.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT p.id_parroq, p.nom_parroq, p.status, m.id_mun, m.nom_mun, e.id_est, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and p.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status, m.id_mun, m.nom_mun, e.id_est, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%$valor%' or m.nom_mun like '%$valor%' or e.nom_est like '%$valor%') and p.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status, m.id_mun, m.nom_mun, e.id_est, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%$valor%' or m.nom_mun like '%$valor%' or e.nom_est like '%$valor%') and p.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status, m.id_mun, m.nom_mun, e.id_est, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%$valor%' or m.nom_mun like '%$valor%' or e.nom_est like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status, m.id_mun, m.nom_mun, e.id_est, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%$valor%' or m.nom_mun like '%$valor%' or e.nom_est like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	//************CONSULTA PARA EL COMBO DE parroquia**********************//
	function consultarparroquia(){
		$sql="SELECT p.id_parroq,p.nom_parroq,p.id_mun,p.status,m.nom_mun,e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est";
		return $this->ejecuta($sql);
	}
	//*****************************************************************//
	//**********************************FIN DE LA CLASE*********************************//
	function consultar_municipio(){
		$sql="SELECT *FROM municipio";
		return $this->ejecuta($sql);
	}
}

?>