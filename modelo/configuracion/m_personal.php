<?php
// Clase para el usuario y acceder a los datos del mismo

include_once("m_conexion.php");

class clsPersonal extends clsConex{
	private $Datos, $id;
	function clsPersonal()
	{
		$this->clsConex(); // se llama al contructor del padre
		$this->Datos = "";
		$this->id = "";
	}
	function recibir($POST) // pasa de parametros todos los datos a cada propiedad de la clase
	{
		$this->Datos = $POST;
	}
	function recibirIdents($pe,$ca,$de){
		$this->id_per = $pe;
		$this->id_car = $ca;
		$this->id_dep = $de;
	}
	function recibirMod($i,$POST){
		$this->id = $i;
		$this->Datos  = $POST;
	}
	function recibirId($i){
		$this->id = $i;
	}
	function registra(){
		$sql = "INSERT INTO personal (ced_per,nom_per,ape_per,tlf_per,email_per,status,id_cargo,id_dep) VALUES ('".$this->Datos["ced"]."','".$this->Datos["nom"]."','".$this->Datos["ape"]."','".$this->Datos["telf"]."','".$this->Datos["email"]."','1','".$this->Datos["car"]."','".$this->Datos["dep"]."')";
		$this->ejecuta($sql);
	}
	function modificar(){
		$sql="UPDATE personal SET ced_per='".$this->Datos["ced"]."',nom_per='".$this->Datos["nom"]."',ape_per='".$this->Datos["ape"]."',tlf_per='".$this->Datos["telf"]."',email_per='".$this->Datos["email"]."', id_cargo='".$this->Datos["car"]."',id_dep='".$this->Datos["dep"]."' WHERE id_per='".$this->Datos["idced"]."'";
		$this->ejecuta($sql);
	}
	function consulta() // busca a un usuario 
	{	
		$sql = "SELECT * FROM personal WHERE ced_per = '".$this->Datos["ced"]."'";
		$tupla = $this->ejecuta($sql);
		if ( $this->como_va() )
			return $tupla; // lo encontro y se tienen datos
		else
			return false; // no se encontro
	}
	function consultaUnicidad($id){
		$sql = "SELECT * FROM personal WHERE ced_per = '".$this->Datos["ced"]."' and id_per!='".$id."'";
		$tupla = $this->ejecuta($sql);
		if ( $this->como_va() )
			return $tupla; // lo encontro y se tienen datos
		else
			return false; // no se encontro
	}
	function consultarPorIdents(){
		$sql = "SELECT p.id_per, p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.id_car, d.id_dep FROM personal as p INNER JOIN departamento as d INNER JOIN cargo as c WHERE p.id_per='".$this->id_per."' and c.id_car='".$this->id_car."' and d.id_dep='".$this->id_dep."'";
		return $this->ejecuta($sql); 
	}
	function arreglo($rs) // convierte un record set en un arreglo
	{	
		return $this->TraerArreglo($rs);
	}
	function busca_persona( $id ) // busca los datos de una persona
	{	
		$sql = "SELECT * FROM personal where id_per = '".$id."'";
		$tupla =  $this->ejecuta($sql);
		if ($tupla)
			return $this->arreglo( $tupla );
		return false;
	}
	function consutar_P_D_C(){
		$sql = "SELECT p.id_per, p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.id_car, c.nom_car, d.nom_dep, d.id_dep FROM personal as p INNER JOIN departamento as d INNER JOIN cargo as c WHERE p.id_cargo=c.id_car and p.id_dep=d.id_dep";
		return $this->ejecuta($sql); 
	}
	function consutar_P_D_C_Ajax($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT p.id_per, p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.id_car, c.nom_car, d.nom_dep, d.id_dep FROM personal as p INNER JOIN departamento as d INNER JOIN cargo as c WHERE p.id_cargo=c.id_car and p.id_dep=d.id_dep and p.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT p.id_per, p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.id_car, c.nom_car, d.nom_dep, d.id_dep FROM personal as p INNER JOIN departamento as d INNER JOIN cargo as c WHERE p.id_cargo=c.id_car and p.id_dep=d.id_dep and p.status='0'";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT p.id_per, p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.id_car, c.nom_car, d.nom_dep, d.id_dep FROM personal as p INNER JOIN departamento as d INNER JOIN cargo as c WHERE p.id_cargo=c.id_car and p.id_dep=d.id_dep and (p.ced_per like '%$valor%' or p.nom_per like '%$valor%' or p.ape_per like '%$valor%' or p.tlf_per like '%$valor%' or p.email_per like '%$valor%' or c.nom_car like '%$valor%' or d.nom_dep like '%$valor%') and p.status='1'";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT p.id_per, p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.id_car, c.nom_car, d.nom_dep, d.id_dep FROM personal as p INNER JOIN departamento as d INNER JOIN cargo as c WHERE p.id_cargo=c.id_car and p.id_dep=d.id_dep and (p.ced_per like '%$valor%' or p.nom_per like '%$valor%' or p.ape_per like '%$valor%' or p.tlf_per like '%$valor%' or p.email_per like '%$valor%' or c.nom_car like '%$valor%' or d.nom_dep like '%$valor%') and p.status='0'";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT p.id_per, p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.id_car, c.nom_car, d.nom_dep, d.id_dep FROM personal as p INNER JOIN departamento as d INNER JOIN cargo as c WHERE p.id_cargo=c.id_car and p.id_dep=d.id_dep and (p.ced_per like '%$valor%' or p.nom_per like '%$valor%' or p.ape_per like '%$valor%' or p.tlf_per like '%$valor%' or p.email_per like '%$valor%' or c.nom_car like '%$valor%' or d.nom_dep like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT p.id_per, p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.id_car, c.nom_car, d.nom_dep, d.id_dep FROM personal as p INNER JOIN departamento as d INNER JOIN cargo as c WHERE p.id_cargo=c.id_car and p.id_dep=d.id_dep and (p.ced_per like '%$valor%' or p.nom_per like '%$valor%' or p.ape_per like '%$valor%' or p.tlf_per like '%$valor%' or p.email_per like '%$valor%' or c.nom_car like '%$valor%' or d.nom_dep like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}
	function activar(){
		$sql="UPDATE personal SET status='1' WHERE id_per='".$this->id."'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "SELECT u.id_usuario FROM usuario as u WHERE u.id_usuario='".$this->id."'";
		$rs = $this->ejecuta($sql);
		if($this->como_va()){
			return false;
		}else{
			/* modifico en la tabla personal */
			$sql = "UPDATE personal SET status='0' WHERE id_per='".$this->id."'";
			$this->ejecuta($sql);
			return true;
		}
	}

	/**** consulta para el combo ****/
	function CedNomApePersonal(){
		$sql = "SELECT * FROM personal WHERE status='1'";
		return $this->ejecuta($sql);
	}
	function CedNomApePersonalDep(){
		$sql = "SELECT * FROM personal WHERE status='1'";
		return $this->ejecuta($sql);
	}
}// fin de la clase
?>