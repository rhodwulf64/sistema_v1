<?php
@session_start();
include_once('m_conexion.php');
class ClsUser extends conex{
	
	function ClsUser(){
		$this->conex();
	
	}

	function buscar($POST){
		$this->datos=$POST;
		$resultado=explode(" ",$_POST['nom']);

		if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3]) && isset($this->datos['est1']) && $this->datos['est1']=="D" ){
			$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND (u.login LIKE '%".$resultado[0]."%'AND p.nom_per LIKE '%".$resultado[1]."%' AND p.ape_per LIKE '%".$resultado[2]."%' AND per.nom_perfil LIKE '%".$resultado[3]."%') AND s.status='".$this->datos['est1']."'";
		
		 	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3]) && isset($this->datos['est1']) && $this->datos['est1']=="B" ){
			$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND (u.login LIKE '%".$resultado[0]."%'AND p.nom_per LIKE '%".$resultado[1]."%' AND p.ape_per LIKE '%".$resultado[2]."%' AND per.nom_perfil LIKE '%".$resultado[3]."%') AND s.status='".$this->datos['est1']."'";
		
		 	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3]) && isset($this->datos['est1']) && $this->datos['est1']=="N" ){
			$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND (u.login LIKE '%".$resultado[0]."%'AND p.nom_per LIKE '%".$resultado[1]."%' AND p.ape_per LIKE '%".$resultado[2]."%' AND per.nom_perfil LIKE '%".$resultado[3]."%') AND s.status='".$this->datos['est1']."'";
		
		 	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3]) && isset($this->datos['est1']) && $this->datos['est1']=="E"){
			$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND (u.login LIKE '%".$resultado[0]."%'AND p.nom_per LIKE '%".$resultado[1]."%' AND p.ape_per LIKE '%".$resultado[2]."%' AND per.nom_perfil LIKE '%".$resultado[3]."%') AND s.status='".$this->datos['est1']."'";
			
		 	$rs=$this->ejecuta($sql);

		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3]) && isset($this->datos['est1']) && $this->datos['est1']==""){
			$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND (u.login LIKE '%".$resultado[0]."%'AND p.nom_per LIKE '%".$resultado[1]."%' AND p.ape_per LIKE '%".$resultado[2]."%' AND per.nom_perfil LIKE '%".$resultado[3]."%') AND s.status='".$this->datos['est1']."'";
		
		 	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3])){
			$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND (u.login LIKE '%".$resultado[0]."%'AND p.nom_per LIKE '%".$resultado[1]."%' AND p.ape_per LIKE '%".$resultado[2]."%' AND per.nom_perfil LIKE '%".$resultado[3]."%')";
		
		 	$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['est1']) && $this->datos['est1']=="D" ){
			$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND  s.status='".$this->datos['est1']."'";
		
		 	$rs=$this->ejecuta($sql);

		 }else if(isset($this->datos['est1']) && $this->datos['est1']=="B"){
		 	$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND  s.status='".$this->datos['est1']."'";
		
		 	$rs=$this->ejecuta($sql);
		 }else if(isset($this->datos['est1']) && $this->datos['est1']=="N"){
		 	$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND  s.status='".$this->datos['est1']."'";
		
		 	$rs=$this->ejecuta($sql);
		 }else if(isset($this->datos['est1']) && $this->datos['est1']=="E"){
		 	$sql="SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario AND  s.status='".$this->datos['est1']."'";
		
		 	$rs=$this->ejecuta($sql);

		 }else if(isset($this->datos['nom']) && $this->datos['nom']!=""){
			$sql = "SELECT u.login, p.nom_per,u.fecha_creacion, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s WHERE p.id_per=u.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario and (u.login LIKE '%".$this->datos['nom']."%'OR p.nom_per LIKE '%".$this->datos['nom']."%' OR p.ape_per LIKE '%".$this->datos['nom']."%' OR per.nom_perfil LIKE '%".$this->datos['nom']."%')";
			
		 	$rs=$this->ejecuta($sql);
		}else{
			$sql="SELECT u.login,u.fecha_creacion, p.nom_per, p.ape_per,per.nom_perfil, s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as per INNER JOIN status as s 
		 	WHERE u.id_usuario=p.id_per AND u.id_perfil=per.idperfil AND u.id_usuario=s.id_usuario";
		 	$rs=$this->ejecuta($sql);
		
		}

		include_once('modelo_pdf/m_pdfUser.php');
		$pdf= new PDF('L','mm','Letter');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(4);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(-3,7,'',0);
		$pdf->Cell(15,7,utf8_decode('N°'),'BRLT',0,'C');
		$pdf->Cell(20,7,'Usuario','BRLT',0,'C');
		$pdf->Cell(55,7,'Nombres','BRLT',0,'C');
		$pdf->Cell(55,7,'Apellidos','BRLT',0,'C');
		$pdf->Cell(50,7,'Tipo de Usuario','BRLT',0,'C');
		$pdf->Cell(45,7,'Fecha de Creacion','BRLT',0,'C');
		$pdf->Cell(25,7,'Estatus','BRLT',0,'C');
		
		$pdf->Ln(7);
		$c=1;
		
		while($tupla=$this->TraerArreglo($rs)){
			$pdf->SetFont('Arial','',10);
			if($tupla['status']=='D'){
				$m="DISPONIBLE";
			}else if($tupla['status']=='B'){
				$m="BLOQUEADO";
			}else if($tupla['status']=='N'){
				$m="NUEVO";
			}else{
				$m="ELIMINADO";
			}
			$fecha=$this->fecha_bajada($tupla['fecha_creacion']);
		$pdf->Cell(-3,7,'',0);
		$pdf->Cell(15,7,$c,'BRLT','','C');
		$pdf->Cell(20,7,utf8_decode($tupla['login']),'BRLT',0,'C');
		$pdf->Cell(55,7,utf8_decode($tupla['nom_per']),'BRLT',0,'C');
		$pdf->Cell(55,7,utf8_decode($tupla['ape_per']),'BRLT',0,'C');

		$pdf->Cell(50,7,utf8_decode($tupla['nom_perfil']),'BRLT',0,'C');
		$pdf->Cell(45,7,$fecha,'BRLT',0,'C');
		$pdf->Cell(25,7,$m,'BRLT',0,'C');

		$pdf->Ln();
		$c++;
		}
		
		$pdf->Output();
	}
	function fecha_bajada($fecha){
		$fecha=substr($fecha, 8,2).'-'.substr($fecha, 5,2).'-'.substr($fecha, 0,4);
		return $fecha;
	}
	
}


?>
