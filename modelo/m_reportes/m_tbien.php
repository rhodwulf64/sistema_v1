<?php

include_once('m_conexion.php');
class ClsTbien extends conex{
	private $datos;
	function ClsTbien(){
		$this->conex();
		$this->datos="";
	}

	function buscar($POST){
		$this->datos = $POST;

		$resultado = explode(" ", $_POST['nom']);

		
			
		 if(isset($resultado[1]) && isset($this->datos['est1']) ){
			$sql="SELECT  t.cod_tbien, t.des_tbien, t.status, c.nom_cat FROM tipo_bien as t INNER JOIN categoria as c WHERE t.id_categoria=c.id_categoria AND(t.cod_tbien LIKE '%".$resultado[0]."%' AND t.des_tbien LIKE '%".$resultado[1]."%' AND c.nom_cat LIKE '%".$resultado[2]."%' )AND t.status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);
		}else if(isset($resultado[1])){
			$sql="SELECT  t.cod_tbien, t.des_tbien, t.status, c.nom_cat FROM tipo_bien as t INNER JOIN categoria as c WHERE t.id_categoria=c.id_categoria AND(t.cod_tbien LIKE '%".$resultado[0]."%' AND t.des_tbien LIKE '%".$resultado[1]."%' AND c.nom_cat LIKE '%".$resultado[2]."%' )";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['nom']) && $this->datos['nom']!="" && isset($this->datos['est1'])){
			$sql="SELECT  t.cod_tbien, t.des_tbien, t.status, c.nom_cat FROM tipo_bien as t INNER JOIN categoria as c WHERE t.id_categoria=c.id_categoria AND(t.cod_tbien LIKE '%".$this->datos['nom']."%' OR t.des_tbien LIKE '%".$this->datos['nom']."%' OR c.nom_cat LIKE '%".$this->datos['nom']."%' ) AND t.status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['nom']) && $this->datos['nom']!=""){
			$sql="SELECT  t.cod_tbien, t.des_tbien, t.status, c.nom_cat FROM tipo_bien as t INNER JOIN categoria as c WHERE t.id_categoria=c.id_categoria AND(t.cod_tbien LIKE '%".$this->datos['nom']."%' OR t.des_tbien LIKE '%".$this->datos['nom']."%' OR c.nom_cat LIKE '%".$this->datos['nom']."%')";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']!=""){
			$sql="SELECT  t.cod_tbien, t.des_tbien, t.status, c.nom_cat FROM tipo_bien as t INNER JOIN categoria as c WHERE t.id_categoria=c.id_categoria AND t.status='".$this->datos['est1']."'";
			$rs=$this->ejecuta($sql);
		}else{
			$sql="SELECT  t.cod_tbien, t.des_tbien, t.status, c.nom_cat FROM tipo_bien as t INNER JOIN categoria as c WHERE t.id_categoria=c.id_categoria";
			$rs=$this->ejecuta($sql);
		}

		include_once('modelo_pdf/m_pdfTbien.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(10,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(20,7,'Codigo','BRLT',0);
		$pdf->Cell(70,7,'Tipo de Bien','BRLT',0);
		$pdf->Cell(80,7,'Categoria','BRLT',0);
		$pdf->Cell(20,7,'Estatus','BRLT',0);
		$pdf->Ln(7);
		$c=1;
		while($tupla=$this->TraerArreglo($rs)){
				$pdf->SetFont('Arial','',10);
			if($tupla['status']==1){
				$s="ACTIVO";
			}else{
				$s="INACTIVO";
			}
		$pdf->Cell(10,7,$c,'BRLT',0);
		$pdf->Cell(20,7,$tupla['cod_tbien'],'BRLT',0);
		$pdf->Cell(70,7,$tupla['des_tbien'],'BRLT',0);
		$pdf->Cell(80,7,$tupla['nom_cat'],'BRLT',0);
		$pdf->Cell(20,7,$s,'BRLT',0);
		$pdf->Ln();
		$c++;
		}
		$pdf->Output();
	}
}
?>