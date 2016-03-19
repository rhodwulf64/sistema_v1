<?php
include_once('m_conexion.php');

class ClsMunicipio extends conex{
	private $datos;

	function ClsMunicipio(){
		$this->conex();
		$this->datos="";
	}
	function buscar($POST){
		$this->datos = $POST;

		$resultado = explode(" ", $_POST['nom']);

		 if(isset($resultado[1]) && isset($this->datos['est1']) && $this->datos['est1']==1){
		  	$sql = "SELECT m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est AND (m.nom_mun like '%".$resultado[0]."%' and e.nom_est like '%".$resultado[1]."%') and m.status='".$this->datos['est1']."'";
		  	
	 		$rs = $this->ejecuta($sql);
	  	}else if(isset($resultado[1]) && isset($this->datos['est1']) && $this->datos['est1']==0){
		  	$sql = "SELECT m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est AND (m.nom_mun like '%".$resultado[0]."%' and e.nom_est like '%".$resultado[1]."%') and m.status='".$this->datos['est1']."'";
		  	
	 		$rs = $this->ejecuta($sql);
		}else if(isset($resultado[1])){
		 	$sql = "SELECT m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est AND (m.nom_mun like '%".$resultado[0]."%' and e.nom_est like '%".$resultado[1]."%') ";
		 	//echo $sql;
		 	$rs = $this->ejecuta($sql);
		
	 	}else if(isset($this->datos['nom']) && $this->datos['nom'] != ""){
	  		$sql = "SELECT m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est AND (m.nom_mun like '".$this->datos['nom']."%' or e.nom_est like '".$this->datos['nom']."%')";
	  		//echo $sql;
	 		$rs = $this->ejecuta($sql);
	  	}
	  	else if(isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql = "SELECT m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est AND  m.status='".$this->datos['est1']."'";
			//echo $sql;
			$rs = $this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql = "SELECT m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est AND  m.status='".$this->datos['est1']."'";
			//echo $sql;
			$rs = $this->ejecuta($sql);
		 }else{

		 	$sql="SELECT m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est";	
			$rs = $this->ejecuta($sql);
		
		 }
	
		include_once('modelo_pdf/m_pdfM.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,7,'','',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0);
		$pdf->Cell(55,7,'Nombre','BRLT',0);
		$pdf->Cell(50,7,'Estado','BRLT',0);
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
			$pdf->Cell(30,7,'','',0);
			$pdf->Cell(15,7,$c,'BRLT',0);
			$pdf->Cell(55,7,$tupla['nom_mun'],'BRLT',0);
			$pdf->Cell(50,7,$tupla['nom_est'],'BRLT',0);
			$pdf->Cell(20,7,$s,'BRLT',0);

			$pdf->Ln();
			$c++;
		}
		$pdf->Output();

	}//cierre funcion
}// cierre de la clase


// 	function bus_municipio(){

// 		$sql="SELECT m.id_mun, m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est";
// 		$bd= new conex();
// 		$rs=$bd->ejecuta($sql);


// 		include_once('m_pdfM.php');
// 		$pdf= new PDF();
// 		$pdf->AliasNbPages();
// 		$pdf->AddPage();
// 		$pdf->Ln(2);

// 		$pdf->SetFont('Arial','B',12);
// 		$pdf->Cell(30,7,'','',0);
// 		$pdf->Cell(15,7,'Nro','BRLT',0);
// 		$pdf->Cell(55,7,'Nombre','BRLT',0);
// 		$pdf->Cell(40,7,'Estado','BRLT',0);
// 		$pdf->Cell(20,7,'Estatus','BRLT',0);
// 		$pdf->Ln(7);
// 		$c=1;
// 		while($tupla=$bd->TraerArreglo($rs)){
// 				if($tupla['status']==1){
// 				$s="ACTIVO";
// 			}else{
// 				$s="INACTIVO";
// 			}
// 			$pdf->SetFont('Arial','',10);
// 			$pdf->Cell(30,7,'','',0);
// 			$pdf->Cell(15,7,$c,'BRLT',0);
// 			$pdf->Cell(55,7,$tupla['nom_mun'],'BRLT',0);
// 			$pdf->Cell(40,7,$tupla['nom_est'],'BRLT',0);
// 			$pdf->Cell(20,7,$s,'BRLT',0);
		
// 			$pdf->Ln();
// 			$c++;
// 		}
// 		$pdf->Output();
// 	}
// 	function bus_municipio_filtro($n){
// 		$espacio=explode(" ", $n);
        
//         //creamos un patron
//         for($a=0;$a<count($espacio);$a++){
//             $condicion[]= " e.nom_est like '$espacio[$a]%' ";
//         }
        
//         $condicional = implode("AND",$condicion);
        
// 		$sql="SELECT  m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.id_est=e.id_est AND m.nom_mun like '".$espacio[0]."%' OR (".$condicional.") ";
        
//        //echo $sql; //imprimela a ver que te imprime
        
// 		$bd= new conex();
// 		$rs=$bd->ejecuta($sql);


// 		include_once('m_pdfM.php');
// 		$pdf= new PDF();
// 		$pdf->AliasNbPages();
// 		$pdf->AddPage();
// 		$pdf->Ln(2);

// 		$pdf->SetFont('Arial','B',12);
// 		$pdf->Cell(30,7,'','',0);
// 		$pdf->Cell(15,7,'Nro','BRLT',0);
// 		$pdf->Cell(55,7,'Nombre','BRLT',0);
// 		$pdf->Cell(50,7,'Estado','BRLT',0);
// 		$pdf->Cell(20,7,'Estatus','BRLT',0);
// 		$pdf->Ln(7);
// 		$c=1;
// 		while($tupla=$bd->TraerArreglo($rs)){
// 				if($tupla['status']==1){
// 				$s="ACTIVO";
// 			}else{
// 				$s="INACTIVO";
// 			}
// 			$pdf->SetFont('Arial','',10);
// 			$pdf->Cell(30,7,'','',0);
// 			$pdf->Cell(15,7,$c,'BRLT',0);
// 			$pdf->Cell(55,7,$tupla['nom_mun'],'BRLT',0);
// 			$pdf->Cell(50,7,$tupla['nom_est'],'BRLT',0);
// 			$pdf->Cell(20,7,$s,'BRLT',0);
		
// 			$pdf->Ln();
// 			$c++;
// 		}
// 		$pdf->Output();
// 	}
// 	function bus_municipio_filtros($n){

// 		$sql="SELECT m.id_mun, m.nom_mun, m.status,e.nom_est FROM municipio as m INNER JOIN estado as e WHERE m.nom_mun='$n' and e.nom_est='$n' ";
// 		$bd= new conex();
// 		$rs=$bd->ejecuta($sql);


// 		include_once('m_pdfM.php');
// 		$pdf= new PDF();
// 		$pdf->AliasNbPages();
// 		$pdf->AddPage();
// 		$pdf->Ln(2);

// 		$pdf->SetFont('Arial','B',12);
// 		$pdf->Cell(30,7,'','',0);
// 		$pdf->Cell(15,7,'Nro','BRLT',0);
// 		$pdf->Cell(55,7,'Nombre','BRLT',0);
// 		$pdf->Cell(50,7,'Estado','BRLT',0);
// 		$pdf->Cell(20,7,'Estatus','BRLT',0);
// 		$pdf->Ln(7);
// 		$c=1;
// 		while($tupla=$bd->TraerArreglo($rs)){
// 				if($tupla['status']==1){
// 				$s="ACTIVO";
// 			}else{
// 				$s="INACTIVO";
// 			}
// 			$pdf->SetFont('Arial','',10);
// 			$pdf->Cell(30,7,'','',0);
// 			$pdf->Cell(15,7,$c,'BRLT',0);
// 			$pdf->Cell(55,7,$tupla['nom_mun'],'BRLT',0);
// 			$pdf->Cell(50,7,$tupla['nom_est'],'BRLT',0);
// 			$pdf->Cell(20,7,$s,'BRLT',0);
		
// 			$pdf->Ln();
// 			$c++;
// 		}
// 		$pdf->Output();
// 	}
// }

?>