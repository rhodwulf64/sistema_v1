<?php
include_once('m_conexion.php');
class ClsPersonal extends conex{
	private $datos;
	function ClsPersonal(){
		$this->conex();
		$this->datos="";
	}
	function buscar($POST){
		$this->datos=$POST;
		$resultado=explode(" ",$_POST['nom']);

		 if(isset($resultado[1]) && isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.nom_car, d.nom_dep FROM personal as p INNER JOIN cargo as c INNER JOIN departamento as d WHERE p.id_cargo=c.id_car and d.id_dep=p.id_dep and (p.ced_per LIKE '%$resultado[0]%' AND p.nom_per LIKE '%$resultado[1]%' AND p.ape_per LIKE '%$resultado[2]%') AND p.status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);

		}else if(isset($resultado[1]) && isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.nom_car, d.nom_dep FROM personal as p INNER JOIN cargo as c INNER JOIN departamento as d WHERE p.id_cargo=c.id_car and d.id_dep=p.id_dep and (p.ced_per LIKE '%$resultado[0]%' AND p.nom_per LIKE '%$resultado[1]%' AND p.ape_per LIKE '%$resultado[2]%') AND p.status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);
		}else if(isset($resultado[1])){
			$sql="SELECT p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.nom_car, d.nom_dep FROM personal as p INNER JOIN cargo as c INNER JOIN departamento as d WHERE p.id_cargo=c.id_car and d.id_dep=p.id_dep and (p.ced_per LIKE '%$resultado[0]%' AND p.nom_per LIKE '%$resultado[1]%' AND p.ape_per LIKE '%$resultado[2]%')";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['nom']) && $this->datos['nom']!="" && isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.nom_car, d.nom_dep FROM personal as p INNER JOIN cargo as c INNER JOIN departamento as d WHERE p.id_cargo=c.id_car and d.id_dep=p.id_dep and (p.ced_per LIKE '%".$this->datos['nom']."%' AND p.nom_per LIKE '%".$this->datos['nom']."%' AND p.ape_per LIKE '%".$this->datos['nom']."%') AND p.status='".$this->datos['est1']."'";
			//echo $sql;
			$rs=$this->ejecuta($sql);

		}else if(isset($this->datos['nom']) && $this->datos['nom']!=""){
			$sql="SELECT p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.nom_car, d.nom_dep FROM personal as p INNER JOIN cargo as c INNER JOIN departamento as d WHERE p.id_cargo=c.id_car and d.id_dep=p.id_dep and (p.ced_per LIKE '%".$this->datos['nom']."%' OR p.nom_per LIKE '%".$this->datos['nom']."%' OR p.ape_per LIKE '%".$this->datos['nom']."%')";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']!=""){
			$sql="SELECT p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.nom_car, d.nom_dep FROM personal as p INNER JOIN cargo as c INNER JOIN departamento as d WHERE p.id_cargo=c.id_car and d.id_dep=p.id_dep  AND p.status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);

		}else{
			$sql="SELECT p.ced_per, p.nom_per, p.ape_per, p.tlf_per, p.email_per, p.status, c.nom_car, d.nom_dep FROM personal as p INNER JOIN cargo as c INNER JOIN departamento as d WHERE p.id_cargo=c.id_car and d.id_dep=p.id_dep ";
			$rs=$this->ejecuta($sql);
		}
		

		include_once('modelo_pdf/m_pdfPer.php');
		$pdf= new PDF('P','mm',array(400,500));
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(4);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(-4,7,'',0);
		$pdf->Cell(12,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(20,7,'Cedula','BRLT',0,10);
		$pdf->Cell(55,7,'Nombres','BRLT',0);
		$pdf->Cell(60,7,'Apellidos','BRLT',0);
		$pdf->Cell(27,7,'Telefono','BRLT',0);
		$pdf->Cell(63,7,'Correo','BRLT',0);
		$pdf->Cell(55,7,'Cargo','BRLT',0);
		$pdf->Cell(65,7,'Departamento','BRLT',0);
		$pdf->Cell(25,7,'Estatus','BRLT',8);
		$pdf->Ln(0);

		$c=1;
		while($tupla=$this->TraerArreglo($rs)){
			$pdf->SetFont('Arial','',10);
			if($tupla['status']==1){
				$s="ACTIVO";
			}else{
				$s="INACTIVO";
			}
			if($tupla['email_per']==""){
				$correo="NO POSEE";
			}else{
				$correo=$tupla['email_per'];
			}
			$pdf->Cell(-4,7,'',0);
			$pdf->Cell(12,7,$c,'BRLT',0);
			$pdf->Cell(20,7,$tupla['ced_per'],'BRLT',0);
			$pdf->Cell(55,7,utf8_decode($tupla['nom_per']),'BRLT',0);
			$pdf->Cell(60,7,utf8_decode($tupla['ape_per']),'BRLT',0);
			$pdf->Cell(27,7,$tupla['tlf_per'],'BRLT',0);
			$pdf->Cell(63,7,$correo,'BRLT',0);
			$pdf->Cell(55,7,$tupla['nom_car'],'BRLT',0);
			$pdf->Cell(65,7,$tupla['nom_dep'],'BRLT',0);
			$pdf->Cell(25,7,$s,'BRLT',0);
			$pdf->Ln();
			$c++;
		}
		$pdf->Output();
	}
}

?>