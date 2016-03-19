<?php

include_once('m_conexion.php');
class ClsMotivo extends conex{
	private $datos;
	function ClsMotivo(){
		$this->conex();
		$this->datos="";
	}

	function bus_motivo($POST){
		$this->datos=$POST;
		$resultado=explode(" ", $_POST['nom']);
	
		if(isset($resultado[0]) && isset($resultado[1]) && isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT *FROM motivo_movimiento WHERE des_motivo_mov like '".$resultado[0]."%' and tipo_motivo like '".$resultado[1]."%' and status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT *FROM motivo_movimiento WHERE des_motivo_mov like '".$resultado[0]."%' and tipo_motivo like '".$resultado[1]."%' and status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) ){
			$sql="SELECT *FROM motivo_movimiento WHERE des_motivo_mov like '".$resultado[0]."%' and tipo_motivo like '".$resultado[1]."%' ";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['nom']) && $this->datos['nom']!=""){
			$sql="SELECT *FROM motivo_movimiento WHERE des_motivo_mov like '%".$this->datos['nom']."%' OR tipo_motivo like '%".$this->datos['nom']."%' ";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT *FROM motivo_movimiento WHERE status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT *FROM motivo_movimiento WHERE status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);
		}else{
		    $sql="SELECT *FROM motivo_movimiento";
		    $rs=$this->ejecuta($sql);
		}
		
		include_once('modelo_pdf/m_pdfMOTIVO.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(1);
		$pdf->SetDrawColor('70','70','70'); 

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(10,7,'',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'TBRL',0,10);
		$pdf->Cell(75,7,'Descripcion','TBRL',0);
		$pdf->Cell(60,7,'Tipo de Movimiento','TBRL',0);
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

			$pdf->Cell(10,7,'',0);
			$pdf->Cell(15,7,$c,'TBRL',0);
			$pdf->Cell(75,7,utf8_decode($tupla['des_motivo_mov']),'TBRL',0);
			$pdf->Cell(60,7,utf8_decode($tupla['tipo_motivo']),'TBRL',0);
			$pdf->Cell(25,7,$s,'TBRL',0);
			$pdf->Ln();
			$c++;
		}

		$pdf->Output();
	}

}

?>