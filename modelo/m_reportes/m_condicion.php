<?php
@session_start();
include_once('m_conexion.php');
class ClsCondicion extends conex{
	
	function ClsCondicion(){
		$this->conex();
	
	}

	function bus_condicion(){
		$sql="SELECT *FROM condicion";
		$bd= new Conex();
		$rs=$bd->ejecuta($sql);


		include_once('modelo_pdf/m_pdf.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(4);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(55,7,'',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(50,7,'Nombre','BRLT',0);
		$pdf->Cell(20,7,'Estatus','BRLT',0);
		
		$pdf->Ln(7);
		$c=1;
		
		while($tupla=$bd->TraerArreglo($rs)){
			$pdf->SetFont('Arial','',10);
			if($tupla['status']==1){
				$m="ACTIVO";
			}else{
				$m="INACTIVO";
			}
		$pdf->Cell(55,7,'',0);
		$pdf->Cell(15,7,$c,'BRLT',0);

		$pdf->Cell(50,7,utf8_decode($tupla['nom_cond']),'BRLT',0);

		$pdf->Cell(20,7,$m,'BRLT',0);

		$pdf->Ln();
		$c++;
		}
		
		$pdf->Output();
	}
	function bus_condicion_filtro($p){ //filtro nombre y status individuales
		$sql="SELECT *FROM condicion WHERE nom_cond like '".$p."%' OR status LIKE '".$p."%'";
		$bd= new Conex();
		$rs=$bd->ejecuta($sql);


		include_once('modelo_pdf/m_pdf.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(4);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(55,7,'',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(50,7,'Nombre','BRLT',0);
		$pdf->Cell(20,7,'Estatus','BRLT',0);
		
		$pdf->Ln(7);
		$c=1;
		
		while($tupla=$bd->TraerArreglo($rs)){
			$pdf->SetFont('Arial','',10);
			if($tupla['status']==1){
				$m="ACTIVO";
			}else{
				$m="INACTIVO";
			}
		$pdf->Cell(55,7,'',0);
		$pdf->Cell(15,7,$c,'BRLT',0);

		$pdf->Cell(50,7,utf8_decode($tupla['nom_cond']),'BRLT',0);

		$pdf->Cell(20,7,$m,'BRLT',0);

		$pdf->Ln();
		$c++;
		}
		
		$pdf->Output();
	}
	function bus_condicion_filtros($p,$n){ //filtros combinados nombre y status
		$sql="SELECT *FROM condicion WHERE nom_cond LIKE '".$p."%' AND status LIKE '".$n."' ";
		$bd= new Conex();
		$rs=$bd->ejecuta($sql);


		include_once('modelo_pdf/m_pdf.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(4);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(55,7,'',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(50,7,'Nombre','BRLT',0);
		$pdf->Cell(20,7,'Estatus','BRLT',0);
		
		$pdf->Ln(7);
		$c=1;
		
		while($tupla=$bd->TraerArreglo($rs)){
			$pdf->SetFont('Arial','',10);
			if($tupla['status']==1){
				$m="ACTIVO";
			}else{
				$m="INACTIVO";
			}
		$pdf->Cell(55,7,'',0);
		$pdf->Cell(15,7,$c,'BRLT',0);

		$pdf->Cell(50,7,utf8_decode($tupla['nom_cond']),'BRLT',0);

		$pdf->Cell(20,7,$m,'BRLT',0);

		$pdf->Ln();
		$c++;
		}
		
		$pdf->Output();
	}
	
}


?>