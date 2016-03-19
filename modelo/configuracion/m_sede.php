<?php
include_once('m_conexion.php');
//******************************COMIENZO DE LA CLASE PARA EL OBJETO SEDE**********************************//
class ClsSede extends Clsconex{
	private $G,$id_sede,$cod_sed,$des_sed,$cod_org,$cod_parroq;
	function ClsSede(){
		$this->Clsconex();
		$this->id_sede=0;
		$this->cod_sed="";
		$this->des_sed="";
		$this->cod_parroq="";
		$this->cod_org="";
		$this->G = "";
	}
	function recibir($id,$ds,$cs,$cc,$dud){
		$this->id_sede=$id;
		$this->des_sed=$ds;
		$this->cod_sed=$cs;
		
		$this->cod_parroq=$cc;
		$this->cod_org=$dud;
	}
	function recibir2($c,$i){
		$this->des_sed=$c;
		$this->cod_parroq=$i;
	}
	function recibirId($id){
		$this->id_sede = $id;
	}
	function recibirIdents($idse,$idPar,$idOr){
		$this->id_sede=$idse;
		$this->cod_parroq=$idPar;
		$this->cod_org = $idOr;
	}
	function recibirTodo($POST){
		$this->G = $POST;
	}
	function incluir(){
		$sql = "INSERT INTO sede (nom_sed,cod_sed,id_parroq,id_org,status) VALUES('".$this->G['nom_sed']."','".$this->G['cod_sed']."','".$this->G['comb_ciu']."','".$this->G['comb_org']."','1')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql="UPDATE sede SET nom_sed='".$this->G['nom_sed']."',cod_sed='".$this->G['cod_sed']."',id_parroq='".$this->G['comb_ciu']."',id_org='".$this->G['comb_org']."' WHERE id_sed='".$this->G['id_sede']."'";
		$this->ejecuta($sql);
	}
	function consultar_S_O_PME(){
		$sql = "SELECT s.id_sed,s.nom_sed,s.cod_sed,s.id_parroq,s.id_org,s.status,p.nom_parroq,p.id_mun,m.nom_mun,m.id_est,e.nom_est,o.cod_org,o.nom_org,o.cod_ud,o.nom_ud FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN  municipio as m INNER JOIN estado as e WHERE s.id_org=o.id_org and s.id_parroq=p.id_parroq and p.id_mun=m.id_mun and m.id_est=e.id_est";
		return $this->ejecuta($sql);
	}
	function consultar_S_O_PME_ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT s.id_sed,s.nom_sed,s.cod_sed,s.id_parroq,s.id_org,s.status,p.nom_parroq,p.id_mun,m.nom_mun,m.id_est,e.nom_est,o.cod_org,o.nom_org,o.cod_ud,o.nom_ud FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN  municipio as m INNER JOIN estado as e WHERE s.id_org=o.id_org and s.id_parroq=p.id_parroq and p.id_mun=m.id_mun and m.id_est=e.id_est and p.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT s.id_sed,s.nom_sed,s.cod_sed,s.id_parroq,s.id_org,s.status,p.nom_parroq,p.id_mun,m.nom_mun,m.id_est,e.nom_est,o.cod_org,o.nom_org,o.cod_ud,o.nom_ud FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN  municipio as m INNER JOIN estado as e WHERE s.id_org=o.id_org and s.id_parroq=p.id_parroq and p.id_mun=m.id_mun and m.id_est=e.id_est and p.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql="SELECT s.id_sed,s.nom_sed,s.cod_sed,s.id_parroq,s.id_org,s.status,p.nom_parroq,p.id_mun,m.nom_mun,m.id_est,e.nom_est,o.cod_org,o.nom_org,o.cod_ud,o.nom_ud FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN  municipio as m INNER JOIN estado as e WHERE s.id_org=o.id_org and s.id_parroq=p.id_parroq and p.id_mun=m.id_mun and m.id_est=e.id_est and (s.nom_sed like '%$valor%' or s.cod_sed like '%$valor%' or o.cod_org like '%$valor%' or o.nom_org like '%$valor%' or o.cod_ud like '%$valor%' or o.nom_ud like '%$valor%' or p.nom_parroq like '%$valor%' or m.nom_mun like '%$valor%' or e.nom_est like '%$valor%') and p.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql="SELECT s.id_sed,s.nom_sed,s.cod_sed,s.id_parroq,s.id_org,s.status,p.nom_parroq,p.id_mun,m.nom_mun,m.id_est,e.nom_est,o.cod_org,o.nom_org,o.cod_ud,o.nom_ud FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN  municipio as m INNER JOIN estado as e WHERE s.id_org=o.id_org and s.id_parroq=p.id_parroq and p.id_mun=m.id_mun and m.id_est=e.id_est and (s.nom_sed like '%$valor%' or s.cod_sed like '%$valor%' or o.cod_org like '%$valor%' or o.nom_org like '%$valor%' or o.cod_ud like '%$valor%' or o.nom_ud like '%$valor%' or p.nom_parroq like '%$valor%' or m.nom_mun like '%$valor%' or e.nom_est like '%$valor%') and p.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql="SELECT s.id_sed,s.nom_sed,s.cod_sed,s.id_parroq,s.id_org,s.status,p.nom_parroq,p.id_mun,m.nom_mun,m.id_est,e.nom_est,o.cod_org,o.nom_org,o.cod_ud,o.nom_ud FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN  municipio as m INNER JOIN estado as e WHERE s.id_org=o.id_org and s.id_parroq=p.id_parroq and p.id_mun=m.id_mun and m.id_est=e.id_est and (s.nom_sed like '%$valor%' or s.cod_sed like '%$valor%' or o.cod_org like '%$valor%' or o.nom_org like '%$valor%' or o.cod_ud like '%$valor%' or o.nom_ud like '%$valor%' or p.nom_parroq like '%$valor%' or m.nom_mun like '%$valor%' or e.nom_est like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql="SELECT s.id_sed,s.nom_sed,s.cod_sed,s.id_parroq,s.id_org,s.status,p.nom_parroq,p.id_mun,m.nom_mun,m.id_est,e.nom_est,o.cod_org,o.nom_org,o.cod_ud,o.nom_ud FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN  municipio as m INNER JOIN estado as e WHERE s.id_org=o.id_org and s.id_parroq=p.id_parroq and p.id_mun=m.id_mun and m.id_est=e.id_est and (s.nom_sed like '%$valor%' or s.cod_sed like '%$valor%' or o.cod_org like '%$valor%' or o.nom_org like '%$valor%' or o.cod_ud like '%$valor%' or o.nom_ud like '%$valor%' or p.nom_parroq like '%$valor%' or m.nom_mun like '%$valor%' or e.nom_est like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function consultar(){
		$sql = "SELECT * FROM sede as s  WHERE s.cod_sed='".$this->G['cod_sed']."' and s.id_parroq='".$this->G['comb_ciu']."' and s.id_org='".$this->G['comb_org']."'";
		return $this->ejecuta($sql);
	}
	function ConsultarPorDescripcion(){
		$sql = "SELECT s.id_sed FROM sede as s WHERE s.cod_sed='".$this->G['cod_sed']."' and s.id_parroq='".$this->G['comb_ciu']."' and s.id_org='".$this->G['comb_org']."'";
		return $this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT s.id_sed,s.cod_sed,s.nom_sed,s.id_parroq,s.id_org,s.status FROM sede as s  WHERE s.id_sed='".$this->id_sede."' and s.id_parroq='".$this->cod_parroq."' and s.id_org='".$this->cod_org."'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql = "UPDATE sede SET status='1' WHERE id_sed='$this->id_sede'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT d.id_sed, s.id_sed FROM departamento as d INNER JOIN sistema as s WHERE d.id_sed='".$this->id_sede."' or s.id_sed='".$this->id_sede."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE sede SET status='0' WHERE id_sed='$this->id_sede' ";
			$this->ejecuta($sql);
			return true;
		}
	}
	function converArray($rs){
		return	$this->TraerArreglo($rs);
	}
	//**************************************FUNCION PARA CONSULTAR LA SEDE**********************//
	function consultarSede(){
		$sql="SELECT *FROM sede";
		return $this->ejecuta($sql);
	}

	//******************************************************************************************//
	function consultar_org(){
		$sql="SELECT *FROM organizacion";
		return $this->ejecuta($sql);
	}
	//***************************FIN DE LA CLASE DEL OBJETO SEDE***********************************************//
	function cons_parroq(){
		$sql="SELECT *FROM parroquia";
		return $this->ejecuta($sql);
	}
}
?>