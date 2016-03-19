<?php
include_once('m_conexion.php');
//******************************COMIENZO DE LA CLASE PARA EL OBJETO organizacion**********************************//
class ClsOrganizacion extends clsConex{
	private $cod_org,$nom_org,$cod_ud,$nom_ud,$id_org;
	function ClsOrganizacion(){
		$this->clsConex();
		$this->cod_org="";
		$this->nom_org="";
		$this->cod_ud="";
		$this->nom_ud="";
		$this->id_org="";
	}
	function recibir($id,$ds,$cs,$d,$cc){
		$this->id_org = $id;
		$this->cod_org=$ds;
		$this->nom_org=$cs;
		$this->cod_ud=$d;
		$this->nom_ud=$cc;
	}
	function recibirTodosMenosId($ds,$cs,$d,$cc){
		$this->cod_org=$ds;
		$this->nom_org=$cs;
		$this->cod_ud=$d;
		$this->nom_ud=$cc;
	}
	function recibirId_org($id){
		$this->id_org = $id;
	}
	function recibir2($c){
		$this->nom_ud=$c;
	}
		
	function incluir(){
		$sql="INSERT INTO organizacion (cod_org,nom_org,cod_ud,nom_ud,status) VALUES ('$this->cod_org','$this->nom_org','$this->cod_ud','$this->nom_ud','1')";
		echo $sql;
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql="UPDATE organizacion SET cod_org='$this->cod_org',nom_org='$this->nom_org',nom_ud='$this->nom_ud',cod_ud='$this->cod_ud' WHERE id_org='$this->id_org'";
		$this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM organizacion WHERE id_org='".$this->id_org."'";
		return $this->ejecuta($sql);
	}
	function ConsultarPorTodoMenosId(){
		$sql = "SELECT * FROM organizacion WHERE cod_org='$this->cod_org' AND nom_org='$this->nom_org' AND cod_ud='$this->cod_ud' AND nom_ud='$this->nom_ud'";
		return $this->ejecuta($sql);
	}
	function consultar(){
		$sql="SELECT *FROM organizacion WHERE nom_ud='$this->nom_ud'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql="UPDATE organizacion SET status='1' WHERE id_org='$this->id_org'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT s.id_org FROM sede as s  WHERE s.id_org='".$this->id_org."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE organizacion SET status='0' WHERE id_org='$this->id_org'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function converArray($rs){
		return	$this->TraerArreglo($rs);
	}
	function bus_org(){
		$sql="SELECT *FROM organizacion WHERE cod_ud='$this->cod_ud'";
		return $this->ejecuta($sql);
	}
	//**************************************FUNCION PARA CONSULTAR LA organizacion**********************//

	function consultar_org(){
		$sql = "SELECT * FROM organizacion";
		return $this->ejecuta($sql);
	}
	function consultar_org_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM organizacion as o WHERE o.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM organizacion as o WHERE o.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM organizacion as o WHERE (o.nom_org like '%$valor%' or o.cod_org like '%$valor%' or o.nom_ud like '%$valor%' or o.cod_ud like '%$valor%') and o.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM organizacion as o WHERE (o.nom_org like '%$valor%' or o.cod_org like '%$valor%' or o.nom_ud like '%$valor%' or o.cod_ud like '%$valor%') and o.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM organizacion as o WHERE (o.nom_org like '%$valor%' or o.cod_org like '%$valor%' or o.nom_ud like '%$valor%' or o.cod_ud like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM organizacion as o WHERE (o.nom_org like '%$valor%' or o.cod_org like '%$valor%' or o.nom_ud like '%$valor%' or o.cod_ud like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	
}
?>