<?php
include_once('m_conexion.php');

class ClsPeriodo extends conex{
	private $datos;
	function ClsPeriodo(){
		$this->conex();
		$this->datos="";
	}
	function bus_Periodo($POST){
		$this->datos=$POST;
		if(isset($this->datos['fecha1']) && $this->datos['fecha1']!="" && isset($this->datos['fecha2']) && $this->datos['fecha2']!="" && isset($this->datos['est1']) && $this->datos['est1']==1){
			$fecha1=$this->fecha_sub($this->datos['fecha1']);
			$fecha2=$this->fecha_sub($this->datos['fecha2']);
			$sql="SELECT * FROM periodo WHERE fecha_inicio BETWEEN '".$fecha1."' and '".$fecha2."' and status='".$this->datos['est1']."' ";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['fecha1']) && $this->datos['fecha1']!="" && isset($this->datos['fecha2']) && $this->datos['fecha2']!="" && isset($this->datos['est1']) && $this->datos['est1']==2){
			$fecha1=$this->fecha_sub($this->datos['fecha1']);
			$fecha2=$this->fecha_sub($this->datos['fecha2']);
			$sql="SELECT * FROM periodo WHERE fecha_inicio BETWEEN '".$fecha1."' and '".$fecha2."' and status='".$this->datos['est1']."' ";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['fecha1']) && $this->datos['fecha1']!="" && isset($this->datos['fecha2']) && $this->datos['fecha2']!="" && isset($this->datos['est1']) && $this->datos['est1']==3){
			$fecha1=$this->fecha_sub($this->datos['fecha1']);
			$fecha2=$this->fecha_sub($this->datos['fecha2']);
			$sql="SELECT * FROM periodo WHERE fecha_inicio BETWEEN '".$fecha1."' and '".$fecha2."' and status='".$this->datos['est1']."' ";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}
		else if(isset($this->datos['fecha1']) && $this->datos['fecha1']!="" && isset($this->datos['fecha2']) && $this->datos['fecha2']!=""){
			$fecha1=$this->fecha_sub($this->datos['fecha1']);
			$fecha2=$this->fecha_sub($this->datos['fecha2']);
			$sql="SELECT * FROM periodo WHERE fecha_inicio BETWEEN '".$fecha1."' and '".$fecha2."' ";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']!=""){
			$sql="SELECT * FROM periodo WHERE status='".$this->datos['est1']."'";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else{
			$sql="SELECT *FROM periodo";
			$rs=$this->ejecuta($sql);
		}
		


		include_once('modelo_pdf/m_pdfPeriodo.php');
		$pdf= new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(45,7,'','',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(35,7,'Fecha de Inicio','BRLT',0);
		$pdf->Cell(30,7,'Fecha de Fin','BRLT',0);
		$pdf->Cell(32,7,'Estatus','BRLT',0);
		$pdf->Ln(7);
		$c=1;
		while($tupla=$this->TraerArreglo($rs)){
			$fecha_inicio=$this->bd_fecha($tupla['fecha_inicio']);
			$fecha_fin=$this->bd_fecha($tupla['fecha_fin']);
			switch ($tupla['status']){
				case 2:
					$s="ABIERTO";
				break;
				case 1:
					$s="NUNCA ABIERTO";
				break;	
				case 3:
					$s="CERRADO";
				break;
			}
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(45,7,'','',0);
			$pdf->Cell(15,7,$c,'BRLT',0);
			$pdf->Cell(35,7,$fecha_inicio,'BRLT',0);
			$pdf->Cell(30,7,$fecha_fin,'BRLT',0);
			$pdf->Cell(32,7,$s,'BRLT',0);
		
			$pdf->Ln();
			$c++;
		}
		$pdf->Output();
	}
	function fecha_sub($fecha){
		$fecha = substr($fecha,6,4).'-'.substr($fecha, 3,2).'-'.substr($fecha,0,2);
		return $fecha;
	}
}

?>