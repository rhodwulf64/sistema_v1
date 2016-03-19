<?php
@session_start();
	//$_SESSION['res']="NO";
	//header("location: ../../vista/protegidas/v_Perfil_Admin.php?accion=r_depart");
include_once('m_conexion.php');
class ClsDepart extends conex{
	private $datos;
	function ClsDepart(){
		$this->conex();
		$this->datos="";
	}

	function buscar($POST){
		$this->datos=$POST;
		$resultado=explode(" ", $_POST['nom']);
		// if(isset($this->datos['temp']) && $this->datos['temp']=="todoPdf"){
		// 	$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($resultado[1]) && isset($this->datos['est1'])){
		// 	$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND (d.nom_dep LIKE '%$resultado[0]%' AND s.nom_sed LIKE '%$resultado[1]%') AND d.status='".$this->datos['est1']."'";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($resultado[1])){
		// 		$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND (d.nom_dep LIKE '%$resultado[0]%' AND s.nom_sed LIKE '%$resultado[1]%')";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos['nom']) && $this->datos['nom']!="" && isset($this->datos['est1'])){
		// 	$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND (d.nom_dep LIKE '%".$this->datos['nom']."%' OR s.nom_sed LIKE '%".$this->datos['nom']."%') AND d.status='".$this->datos['est1']."'";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos['nom']) && $this->datos['nom']!=""){
		// 	$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND (d.nom_dep LIKE '%".$this->datos['nom']."%' OR s.nom_sed LIKE '%".$this->datos['nom']."%')";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos['est1'])){
		// 	$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND d.status='".$this->datos['est1']."'";
		// 	$rs=$this->ejecuta($sql);
		// }
		
		if( isset($resultado[0]) && isset($resultado[1]) && isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND (d.nom_dep LIKE '%".$resultado[0]."%' AND s.nom_sed LIKE '%".$resultado[1]."%') AND d.status='".$this->datos['est1']."'";
		 	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND (d.nom_dep LIKE '%".$resultado[0]."%' AND s.nom_sed LIKE '%".$resultado[1]."%') AND d.status='".$this->datos['est1']."'";
		 	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1])){
			$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND (d.nom_dep LIKE '%".$resultado[0]."%' AND s.nom_sed LIKE '%".$resultado[1]."%')";
		 	$rs=$this->ejecuta($sql);
		}else if( isset($this->datos['nom']) && $this->datos['nom']!=""){
			$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed AND (d.nom_dep LIKE '%".$this->datos['nom']."%' OR s.nom_sed LIKE '%".$this->datos['nom']."%')";
		 	$rs=$this->ejecuta($sql);
			
		}else if(isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed  and d.status='".$this->datos['est1']."'";
		 	$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed  and d.status='".$this->datos['est1']."'";
		 	$rs=$this->ejecuta($sql);
		}else{
		 	$sql="SELECT d.id_dep, d.nom_dep,d.status, s.nom_sed FROM departamento as d INNER JOIN sede as s WHERE d.id_sed=s.id_sed";
		 	$rs=$this->ejecuta($sql);
		}

		include_once('modelo_pdf/m_pdfD.php');
		$pdf= new PDF('P','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(20,7,'Nro','BRLT',0);
		$pdf->Cell(70,7,'Departamento','BRLT',0);
		$pdf->Cell(80,7,'Sede','BRLT',0);
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
		$pdf->Cell(20,7,$c,'BRLT',0);
		$pdf->Cell(70,7,utf8_decode($tupla['nom_dep']),'BRLT',0);
		$pdf->Cell(80,7,utf8_decode($tupla['nom_sed']),'BRLT',0);
		$pdf->Cell(20,7,$s,'BRLT',0);
		$pdf->Ln();
		$c++;
		}
		$pdf->Output();
	}
	
		
		
}
?>