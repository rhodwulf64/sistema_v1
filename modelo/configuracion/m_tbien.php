<?php
include_once("m_conexion.php");

class clstBien extends clsConex
{

	private $ntbien,$cod_tbien,$des_tbien,$id_cat,$id_tbien;

	function clstBien(){
		$this->clsConex();
		$this->ntbien="";
		$this->cod_tbien="";
		$this->des_tbien="";
		$this->id_cat="";
	}
	function recibirCodNomIdCat($codt,$des,$icat){
		$this->cod_tbien=$codt;
		$this->des_tbien=$des;
		$this->id_cat=$icat;
	}
	function recibir($ntb,$codt,$des,$icat){
		$this->ntbien=$ntb;
		$this->cod_tbien=$codt;
		$this->des_tbien=$des;
		$this->id_cat=$icat;
	}
	function codigos($idt,$id_c){
		$this->id_tbien= $idt;
		$this->id_cat = $id_c;
	}
	function recibirId($id){
		$this->id_tbien= $id;
	}
	function recibir2($cod,$i){
		$this->des_tbien=$cod;
		$this->id_cat=$i;
	}

	function incluir(){
		$sql = "INSERT INTO tipo_bien(id_tbien,cod_tbien,des_tbien,id_categoria,status) 
		VALUES ('$this->ntbien','$this->cod_tbien','$this->des_tbien','$this->id_cat','1')";
		$this->ejecuta($sql);
	}

	function modificar(){
		$sql = "UPDATE tipo_bien SET cod_tbien='$this->cod_tbien',des_tbien='$this->des_tbien',id_categoria='$this->id_cat' WHERE id_tbien='$this->ntbien'";
		$this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM tipo_bien WHERE id_tbien='".$this->id_tbien."' AND  id_categoria='".$this->id_cat."'";
		return $this->ejecuta($sql);
	}
	function buscar(){
		$sql = "SELECT *FROM tipo_bien WHERE des_tbien='$this->des_tbien' AND id_categoria='$this->id_cat'";
		return $this->ejecuta($sql);
	}
	function ConsTodosWhere(){
		$sql = "SELECT tb.cod_tbien,tb.des_tbien,tb.id_categoria FROM tipo_bien as tb WHERE cod_tbien='$this->cod_tbien' AND des_tbien='$this->des_tbien' AND id_categoria='$this->id_cat'";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql = "UPDATE tipo_bien SET status='1' WHERE id_tbien='$this->id_tbien'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT bn.id_tbien FROM bien_nacional as bn WHERE bn.id_tbien='".$this->id_tbien."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			$sql = "UPDATE tipo_bien SET status='0' WHERE id_tbien='$this->id_tbien'";
			$this->ejecuta($sql);
			return true;
		}
	}
	function consultar(){
		$sql = "SELECT * FROM tipo_bien";
		return $this->ejecuta($sql);
	}
	function consultarActivos(){
		$sql = "SELECT * FROM tipo_bien WHERE status='1'";
		return $this->ejecuta($sql);
	}
	function consultar_Tb_C(){
		$sql="SELECT tb.id_tbien, tb.cod_tbien, tb.des_tbien, tb.status, c.id_categoria, c.nom_cat FROM tipo_bien as tb INNER JOIN categoria as c WHERE tb.id_categoria=c.id_categoria";
		return $this->ejecuta($sql);
	}
	function consultar_Tb_C_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql="SELECT tb.id_tbien, tb.cod_tbien, tb.des_tbien, tb.status, c.id_categoria, c.nom_cat FROM tipo_bien as tb INNER JOIN categoria as c WHERE tb.id_categoria=c.id_categoria and tb.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql="SELECT tb.id_tbien, tb.cod_tbien, tb.des_tbien, tb.status, c.id_categoria, c.nom_cat FROM tipo_bien as tb INNER JOIN categoria as c WHERE tb.id_categoria=c.id_categoria and tb.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql="SELECT tb.id_tbien, tb.cod_tbien, tb.des_tbien, tb.status, c.id_categoria, c.nom_cat FROM tipo_bien as tb INNER JOIN categoria as c WHERE tb.id_categoria=c.id_categoria and (c.nom_cat like '%$valor%' or tb.des_tbien like '%$valor%' or tb.cod_tbien like '%$valor%') and tb.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql="SELECT tb.id_tbien, tb.cod_tbien, tb.des_tbien, tb.status, c.id_categoria, c.nom_cat FROM tipo_bien as tb INNER JOIN categoria as c WHERE tb.id_categoria=c.id_categoria and (c.nom_cat like '%$valor%' or tb.des_tbien like '%$valor%' or tb.cod_tbien like '%$valor%') and tb.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql="SELECT tb.id_tbien, tb.cod_tbien, tb.des_tbien, tb.status, c.id_categoria, c.nom_cat FROM tipo_bien as tb INNER JOIN categoria as c WHERE tb.id_categoria=c.id_categoria and (c.nom_cat like '%$valor%' or tb.des_tbien like '%$valor%' or tb.cod_tbien like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql="SELECT tb.id_tbien, tb.cod_tbien, tb.des_tbien, tb.status, c.id_categoria, c.nom_cat FROM tipo_bien as tb INNER JOIN categoria as c WHERE tb.id_categoria=c.id_categoria and (c.nom_cat like '%$valor%' or tb.des_tbien like '%$valor%' or tb.cod_tbien like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function bus_cat(){
		$sql="SELECT *FROM categoria";
		return $this->ejecuta($sql);
	}
}

?>
	