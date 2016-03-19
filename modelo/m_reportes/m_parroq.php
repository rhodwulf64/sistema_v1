<?php
include_once('m_conexion.php');

class ClsParroquia extends conex{
	private $datos,$temp;
	function ClsParroquia(){
		$this->conex();
		$this->datos="";
		$this->temp="";
	}
	function buscar($POST){
		$this->datos = $POST;
		$resultado = explode(" ", $_POST['nom']);

		/*******************************JABBA*****************************/
		// if(isset($this->datos["est1"]) && $this->datos["est1"] == "1" && $this->datos["nom"] ==""){ //busco por estatus activos
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and p.status='1'";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos["est1"]) && $this->datos["est1"] == "0" && $this->datos["nom"] ==""){ //busco por estatus inactivos
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and p.status='0'";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos["est1"]) && $this->datos["est1"] == "1" && isset($this->datos["nom"]) && $this->datos["nom"] !="" ){ //busco por caalquiera de los 3 nombres 
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$this->datos["nom"]."%' or m.nom_mun like '%".$this->datos["nom"]."%' or e.nom_est like '%".$this->datos["nom"]."%') and p.status='1'";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos["est1"]) && $this->datos["est1"] == "0" && isset($this->datos["nom"]) && $this->datos["nom"] !="" ){
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$this->datos["nom"]."%' or m.nom_mun like '%".$this->datos["nom"]."%' or e.nom_est like '%".$this->datos["nom"]."%') and p.status='0'";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos["nom"]) && $this->datos["nom"] !="" && (!isset($this->datos["est1"])) && (!isset($resultado[1])) && (!isset($resultado[3]))){
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$this->datos["nom"]."%' or m.nom_mun like '%".$this->datos["nom"]."%' or e.nom_est like '%".$this->datos["nom"]."%')";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($resultado[0]) && isset($resultado[1]) && (!isset($resultado[2])) && (!isset($this->datos["est1"]))){
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$resultado[0]."%' and m.nom_mun like '%".$resultado[1]."%')";
		// 	$rs = $this->ejecuta($sql);
		// }else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && (!isset($this->datos["est1"]))){
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$resultado[0]."%' and m.nom_mun like '%".$resultado[1]."%' and e.nom_est like '%".$resultado[2]."%')";
		// 	$rs = $this->ejecuta($sql);
		// }else if((isset($resultado[0])) && isset($resultado[1]) && (isset($resultado[2])) && (isset($this->datos["est1"])) && $this->datos["est1"]==1){
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$resultado[0]."%' and m.nom_mun like '%".$resultado[1]."%' and e.nom_est LIKE '%".$resultado[2]."%') and p.status='".$this->datos['est1']."'";
			
		// 	$rs = $this->ejecuta($sql);
		// }else if(isset($resultado[0]) && (isset($resultado[1])) && (isset($resultado[2])) && (isset($this->datos["est1"])) && $this->datos["est1"]==0){	
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$resultado[0]."%' and m.nom_mun like '%".$resultado[1]."%' and e.nom_est like '%".$resultado[2]."%') and p.status='".$this->datos['est1']."'";
			
		// 	$rs = $this->ejecuta($sql);
		// }else{
		// 	$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est";
		// 	$rs=$this->ejecuta($sql);
		// }
		/*******************************************************************************************/
		
		if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$resultado[0]."%' and m.nom_mun like '%".$resultado[1]."%' and e.nom_est LIKE '%".$resultado[2]."%') and p.status='".$this->datos['est1']."'";
			$rs = $this->ejecuta($sql);
		}else if (isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$resultado[0]."%' and m.nom_mun like '%".$resultado[1]."%' and e.nom_est LIKE '%".$resultado[2]."%') and p.status='".$this->datos['est1']."'";
			$rs = $this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) ){
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$resultado[0]."%' and m.nom_mun like '%".$resultado[1]."%' and e.nom_est LIKE '%".$resultado[2]."%')";
			$rs = $this->ejecuta($sql);
		}else if(isset($this->datos['nom']) && $this->datos['nom']!=""){
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est and (p.nom_parroq like '%".$this->datos["nom"]."%' or m.nom_mun like '%".$this->datos["nom"]."%' or e.nom_est like '%".$this->datos["nom"]."%')";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est  and p.status='".$this->datos['est1']."'";
			$rs = $this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est  and p.status='".$this->datos['est1']."'";
			$rs = $this->ejecuta($sql);
		}else{
			$sql="SELECT p.id_parroq, p.nom_parroq, p.status,m.nom_mun, e.nom_est FROM parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE p.id_mun=m.id_mun and m.id_est=e.id_est";
			$rs=$this->ejecuta($sql);
		}



		include_once('modelo_pdf/m_pdfP.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','b',12);
		$pdf->Cell(10,7,'','',0);
		$pdf->Cell(10,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(55,7,'Nombre','BRLT',0);
		$pdf->Cell(50,7,'Municipio','BRLT',0);
		$pdf->Cell(40,7,'Estado','BRLT',0);
		$pdf->Cell(20,7,'Estatus','BRLT',0);
		$pdf->Ln(7);
		$c=1;
		while($tupla=$this->TraerArreglo($rs)){
				if($tupla['status']==1){
				$s="ACTIVO";
			}else{
				$s="INACTIVO";
			}
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(10,7,'','',0);
			$pdf->Cell(10,7,$c,'BRLT',0);
			$pdf->Cell(55,7,$tupla['nom_parroq'],'BRLT',0);
			$pdf->Cell(50,7,$tupla['nom_mun'],'BRLT',0);
			$pdf->Cell(40,7,$tupla['nom_est'],'BRLT',0);
			$pdf->Cell(20,7,$s,'BRLT',0);
		
			$pdf->Ln();
			$c++;
		}
		$pdf->Output();

	}
}

?>