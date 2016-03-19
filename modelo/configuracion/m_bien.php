<?php

include_once("m_conexion.php");

class clsBien extends clsConex
{
	private $nbien,$des,$ctb,$cant,$valor,$fec,$cond,$cod_inv,$concep;

	function clsBien(){
		$this->clsConex();
		$this->nbien="";
		$this->des="";
		$this->ctb="";
		$this->cant="";
		$this->valor="";
		$this->fec="";
		$this->cond="";
		$this->cond_inv="";
		$this->concep="";
	}

	function recibir($nb,$de,$ca,$va,$fe,$con,$co_iv,$conce,$c_t_b){
		$this->nbien=$nb;
		$this->des=$de;
		$this->cant=$ca;
		$this->valor=$va;
		$this->fec=$fe;
		$this->cond=$con;
		$this->cod_inv=$co_iv;
		$this->concep=$conce;
		$this->ctb=$c_t_b;
	}

	function recibir2($nb){
		$this->nbien=$nb;
	}

	function incluir(){
		$sql = "INSERT INTO bien (des_bien,cant,valor,fec_reg,cond,cod_inv,conc,id_tbien) VALUES ('$this->des','$this->cant','$this->valor','$this->fec','$this->cond','$this->cod_inv','$this->concep','$this->ctb')";
		$this->ejecuta($sql);
	}

	function modificar(){
		$sql = "UPDATE bien SET nro_bien='$this->nbien',des_bien='$this->des',cant='$this->cant',valor='$this->valor',fec_reg='$this->fec',cond='$this->cond',cod_inv='$this->cod_inv',conc='$this->concep',id_tbien='$this->ctb' WHERE nro_bien='$this->nbien'";
		$this->ejecuta($sql);
	}

	function buscar(){
		$sql = "SELECT * FROM bien WHERE nro_bien='$this->nbien'";
		return $this->ejecuta($sql);
	}

	function eliminar(){
		$sql = "DELETE FROM bien WHERE nro_bien='$this->nbien'";
		$this->ejecuta($sql);
	}

	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}
?>