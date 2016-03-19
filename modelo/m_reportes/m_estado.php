<?php
include_once('m_conexion.php');

class ClsEstado extends conex{
	function ClsEstado(){
		$this->conex();
	}
	function bus_estado(){//busqueda de todo

		$sql="SELECT *FROM estado";
		$bd= new conex();
		$rs=$bd->ejecuta($sql);


		include_once('modelo_pdf/m_pdfE.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(50,7,'','',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(60,7,'Nombre','BRLT',0);
		$pdf->Cell(17,7,'Estatus','BRLT',0);
		$pdf->Ln(7);
		$c=1;
		while($tupla=$bd->TraerArreglo($rs)){
				if($tupla['status']==1){
				$s="ACTIVO";
			}else{
				$s="INACTIVO";
			}
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(50,7,'','',0);
			$pdf->Cell(15,7,$c,'BRLT',0);
			$pdf->Cell(60,7,$tupla['nom_est'],'BRLT',0);
			$pdf->Cell(17,7,$s,'BRLT',0);
		
			$pdf->Ln();
			$c++;
		}
		$pdf->Output();
	}
	function bus_estado_filtro($p){//filtro individual

		$sql="SELECT *FROM estado where nom_est like '".$p."%' or status like '".$p."%'";
		$bd= new conex();
		$rs=$bd->ejecuta($sql);


		include_once('modelo_pdf/m_pdfE.php');
		$pdf= new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(50,7,'','',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(60,7,'Nombre','BRLT',0);
		$pdf->Cell(17,7,'Estatus','BRLT',0);
		$pdf->Ln(7);
		$c=1;
		while($tupla=$bd->TraerArreglo($rs)){
				if($tupla['status']==1){
				$s="ACTIVO";
			}else if($tupla['status']==0){
				$s="INACTIVO";
			}
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(50,7,'','',0);
			$pdf->Cell(15,7,$c,'BRLT',0);
			$pdf->Cell(60,7,$tupla['nom_est'],'BRLT',0);
			$pdf->Cell(17,7,$s,'BRLT',0);
		
			$pdf->Ln();
			$c++;
		}
		$pdf->Output();
	}
	function bus_estado_filtros($p,$s){//datos con estatus filtros

		$sql="SELECT *FROM estado where nom_est  like '".$p."%' AND status='$s' ";
		$bd= new conex();
		$rs=$bd->ejecuta($sql);


		include_once('modelo_pdf/m_pdfE.php');
		$pdf= new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(50,7,'','',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(60,7,'Nombre','BRLT',0);
		$pdf->Cell(17,7,'Estatus','BRLT',0);
		$pdf->Ln(7);
		$c=1;
		while($tupla=$bd->TraerArreglo($rs)){
				if($tupla['status']==1){
				$s="ACTIVO";
			}else if($tupla['status']==0){
				$s="INACTIVO";
			}
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(50,7,'','',0);
			$pdf->Cell(15,7,$c,'BRLT',0);
			$pdf->Cell(60,7,$tupla['nom_est'],'BRLT',0);
			$pdf->Cell(17,7,$s,'BRLT',0);
		
			$pdf->Ln();
			$c++;
		}
		$pdf->Output();
	}
}

?>