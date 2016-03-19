<?php
@session_start();
include_once('m_conexion.php');
class ClsTuser extends conex{
	private $datos;
	function ClsTuser(){
		$this->conex();
		$this->datos="";
	
	}

	function buscar($POST){
		$this->datos=$POST;
		$resultado=explode(" ",$_POST['nom']);
		
	 if(isset($this->datos['nom']) && $this->datos['nom']!="" && isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT p.nom_perfil, p.status FROM perfil as p WHERE p.nom_perfil like '%".$this->datos['nom']."%' and p.status='".$this->datos['est1']."' ";
			
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['nom']) && $this->datos['nom']!="" && isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT p.nom_perfil, p.status FROM perfil as p WHERE p.nom_perfil like '%".$this->datos['nom']."%' and p.status='".$this->datos['est1']."' ";
			
			$rs=$this->ejecuta($sql);

		}else if(isset($this->datos['nom']) && $this->datos['nom']!="" ){
			$sql="SELECT p.nom_perfil, p.status FROM perfil as p WHERE p.nom_perfil LIKE '".$this->datos['nom']."%'";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1'])){
			$sql="SELECT p.nom_perfil, p.status FROM perfil as p WHERE  p.status='".$this->datos['est1']."' ";
			
			$rs=$this->ejecuta($sql);
		}else{
			$sql="SELECT *FROM perfil";
			$rs=$this->ejecuta($sql);
		}

		include_once('modelo_pdf/m_pdfTuser.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(4);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(45,7,'',0);
		$pdf->Cell(20,7,'Nro','BRLT',0);
		$pdf->Cell(70,7,'Nombre','BRLT',0);
		$pdf->Cell(20,7,'Estatus','BRLT',0);
		
		$pdf->Ln(7);
		$c=1;
		
		while($tupla=$this->TraerArreglo($rs)){
			$pdf->SetFont('Arial','',10);
			if($tupla['status']==1){
				$m="ACTIVO";
			}else{
				$m="INACTIVO";
			}
		$pdf->Cell(45,7,'',0);
		$pdf->Cell(20,7,$c,'BRLT',0);

		$pdf->Cell(70,7,utf8_decode($tupla['nom_perfil']),'BRLT',0);

		$pdf->Cell(20,7,$m,'BRLT',0);

		$pdf->Ln();
		$c++;
		}
		
		$pdf->Output();
	}
	
}


?>