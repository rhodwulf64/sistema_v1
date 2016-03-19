<?php
include_once('m_conexion.php');
class ClsDep extends clsConex{
	private $cod_dep,$des_dep,$idsede,$G;
	function ClsDep(){
		$this->clsConex();
		$this->cod_dep="";
		$this->des_dep="";
		$this->idsede="";
		$this->G = "";
	}
	function recibir($c,$d,$cs){
		$this->cod_dep=$c;
		$this->des_dep=$d;
		$this->idsede=$cs;
	}
	function RecGeneral($POST){
		$this->G = $POST;
	}
	function recibir2($c,$i){
		$this->des_dep=$c;
		$this->idsede=$i;
	}
	function recibirIdents2($cd,$cs){
		$this->cod_dep = $cd;
		$this->cod_sed = $cs;
	}
	function recibirIdents($idm){
		$this->cod_dep = $idm;
	}
	function recibirCod($co){
		$this->cod_dep=$co;
	}
	function incluir(){
		
		if(isset($this->G['deposito']) && $this->G['deposito'] == 1){
			$deposito = 1;
		}else{
			$deposito = 0;
		}

		$sql="INSERT INTO departamento(nom_dep,id_sed,deposito,status) VALUES('".$this->G['nom_dep']."','".$this->G['cod_sed']."','".$deposito."','1')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql="UPDATE departamento SET id_dep='$this->cod_dep',nom_dep='$this->des_dep',id_sed='$this->idsede' WHERE id_dep='$this->cod_dep'";
		$this->ejecuta($sql);
	}
	function consultar(){
		$sql="SELECT *FROM departamento WHERE nom_dep='$this->des_dep' AND id_sed='$this->idsede'";
		return $this->ejecuta($sql);
	}
	function ConsultarPorDescripcion(){
		$sql = "SELECT * FROM departamento WHERE nom_dep='$this->des_dep' AND id_sed='$this->idsede'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql="UPDATE departamento SET status='1' WHERE id_dep='$this->cod_dep'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT p.id_dep FROM personal as p WHERE p.id_dep='".$this->cod_dep."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
		 	return false;
		}else{
			$sql = "UPDATE departamento SET status='0' WHERE id_dep='$this->cod_dep'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function cons_sede(){
		$sql="SELECT *FROM sede";
		return $this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT d.id_dep, d.nom_dep, d.status,s.id_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_dep='$this->cod_dep' and d.id_sed=s.id_sed";
		return $this->ejecuta($sql);
	}
	function Consultar_D_S(){
		$sql="SELECT d.id_dep, d.nom_dep, d.status,d.id_sed, s.id_sed, s.nom_sed, s.cod_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed";
		return $this->ejecuta($sql);
	}
	function Consultar_D_S_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT d.id_dep, d.nom_dep, d.status,d.id_sed, s.id_sed, s.nom_sed, s.cod_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and d.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT d.id_dep, d.nom_dep, d.status,d.id_sed, s.id_sed, s.nom_sed, s.cod_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and d.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT d.id_dep, d.nom_dep, d.status,d.id_sed, s.id_sed, s.nom_sed, s.cod_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and (d.nom_dep like '%$valor%' or s.nom_sed like '%$valor%' or d.status like '%$valor%' or s.cod_sed like '%$valor%') and d.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT d.id_dep, d.nom_dep, d.status,d.id_sed, s.id_sed, s.nom_sed, s.cod_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and (d.nom_dep like '%$valor%' or s.nom_sed like '%$valor%' or d.status like '%$valor%' or s.cod_sed like '%$valor%') and d.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT d.id_dep, d.nom_dep, d.status,d.id_sed, s.id_sed, s.nom_sed, s.cod_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and (d.nom_dep like '%$valor%' or s.nom_sed like '%$valor%' or d.status like '%$valor%' or s.cod_sed like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT d.id_dep, d.nom_dep, d.status,d.id_sed, s.id_sed, s.nom_sed, s.cod_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and (d.nom_dep like '%$valor%' or s.nom_sed like '%$valor%' or d.status like '%$valor%' or s.cod_sed like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	//**************************************FUNCION PARA CONSULTAR LA DEP**********************//
	function consultarDep(){
		$sql="SELECT *FROM departamento";
		return $this->ejecuta($sql);
	}
	function consultarDepStatus(){
		$sql="SELECT d.id_dep, d.nom_dep, d.status ,s.id_sed, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and d.status='1'";
		return $this->ejecuta($sql);
	}
	function consultarActivosAlmacen(){
		$sql="SELECT d.id_dep, d.nom_dep, d.status ,s.id_sed, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and d.deposito='1' and d.status='1'";
		return $this->ejecuta($sql);
	}
	function consultarDepart(){
		$sql="SELECT d.id_dep, d.nom_dep, d.status ,s.id_sed, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed and d.deposito='0' and d.status='1'";
		return $this->ejecuta($sql);
	}
	//******************************************************************************************//
}

?>