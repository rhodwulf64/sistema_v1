<?php
include_once('m_conexion.php');
class ClsMarca extends conex{

	function ClsMarca(){
		$this->conex();
	}
	function bus_marca(){

		$sql="SELECT *FROM marca";
		$rs=$this->ejecuta($sql);

		include_once('modelo_pdf/m_pdfMARCA.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(1);
		$pdf->SetDrawColor('70','70','70'); 

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(45,7,'',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'TBRL',0,10);
		$pdf->Cell(75,7,'Nombre','TBRL',0);
		$pdf->Cell(25,7,'Estatus','TBRL',8);
		$pdf->Ln(0);

		$c=1;
		while($tupla=$this->TraerArreglo($rs)){
			$pdf->SetDrawColor('70','70','70'); 
			$pdf->SetFont('Arial','',10);
			$pdf->SetFillColor('92','91','91');

			if($tupla['status']==1){
				$s="ACTIVO";
			}else{
				$s="INACTIVO";
			}

			$pdf->Cell(45,7,'',0);
			$pdf->Cell(15,7,$c,'TBRL',0);
			$pdf->Cell(75,7,utf8_decode($tupla['nom_marca']),'TBRL',0);
			$pdf->Cell(25,7,$s,'TBRL',0);
			$pdf->Ln();
			$c++;
		}

		$pdf->Output();
	}
	function bus_marca_filtro($n){

		$sql="SELECT *FROM marca WHERE nom_marca like '".$n."%' OR status like '".$n."%'";
		$rs=$this->ejecuta($sql);

		include_once('modelo_pdf/m_pdfMARCA.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(1);
		$pdf->SetDrawColor('70','70','70'); 

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(45,7,'',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'TBRL',0,10);
		$pdf->Cell(75,7,'Nombre','TBRL',0);
		$pdf->Cell(25,7,'Estatus','TBRL',8);
		$pdf->Ln(0);

		$c=1;
		while($tupla=$this->TraerArreglo($rs)){
			$pdf->SetDrawColor('70','70','70'); 
			$pdf->SetFont('Arial','',10);
			$pdf->SetFillColor('92','91','91');

			if($tupla['status']==1){
				$s="ACTIVO";
			}else{
				$s="INACTIVO";
			}

			$pdf->Cell(45,7,'',0);
			$pdf->Cell(15,7,$c,'TBRL',0);
			$pdf->Cell(75,7,utf8_decode($tupla['nom_marca']),'TBRL',0);
			$pdf->Cell(25,7,$s,'TBRL',0);
			$pdf->Ln();
			$c++;
		}

		$pdf->Output();
	}
	function bus_marca_filtros($n,$p){

		$sql="SELECT *FROM marca WHERE nom_marca like '".$n."%' AND status like '".$p."%'";
		$rs=$this->ejecuta($sql);

		include_once('modelo_pdf/m_pdfMARCA.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(1);
		$pdf->SetDrawColor('70','70','70'); 

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(45,7,'',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'TBRL',0,10);
		$pdf->Cell(75,7,'Nombre','TBRL',0);
		$pdf->Cell(25,7,'Estatus','TBRL',8);
		$pdf->Ln(0);

		$c=1;
		while($tupla=$this->TraerArreglo($rs)){
			$pdf->SetDrawColor('70','70','70'); 
			$pdf->SetFont('Arial','',10);
			$pdf->SetFillColor('92','91','91');

			if($tupla['status']==1){
				$s="ACTIVO";
			}else{
				$s="INACTIVO";
			}

			$pdf->Cell(45,7,'',0);
			$pdf->Cell(15,7,$c,'TBRL',0);
			$pdf->Cell(75,7,utf8_decode($tupla['nom_marca']),'TBRL',0);
			$pdf->Cell(25,7,$s,'TBRL',0);
			$pdf->Ln();
			$c++;
		}

		$pdf->Output();
	}
}

?>