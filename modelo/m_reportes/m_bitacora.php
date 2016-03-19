<?php

include_once('m_conexion.php');

class ClsBitacora extends conex{
	private $datos;
	function ClsBitacora(){
		$this->conex();
		$this->datos="";
	}
	function buscar($POST){
		$this->datos = $POST;
		$resultado = explode(" ", $_POST['user']);
		if(isset($this->datos['fecha1']) && $this->datos['fecha1']!="" && isset($this->datos['fecha2']) && $this->datos['fecha2']!=""){
			$fecha1=$this->fecha_sub($this->datos['fecha1']);
			$fecha2=$this->fecha_sub($this->datos['fecha2']);

			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio, s.fecha_fin,s.hora_fin,s.so,s.nom_pc,s.nom_remoto,s.dir_ip,s.dir_mac,s.navegador
        	FROM (sesionuser as s INNER JOIN usuario as u  ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per)
			WHERE s.fecha_inicio  BETWEEN '".$fecha1."' and '".$fecha2."'";
        //echo $sql;
        	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2])){
			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio, s.fecha_fin,s.hora_fin,s.so,s.nom_pc,s.nom_remoto,s.dir_ip,s.dir_mac,s.navegador
        	FROM (sesionuser as s INNER JOIN usuario as u  ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per)
			WHERE u.login LIKE '%".$resultado[0]."%' AND p.nom_per LIKE '%".$resultado[1]."%' AND p.ape_per LIKE '%".$resultado[2]."%'";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['user']) && $this->datos['user']!="" && isset($this->datos['cod_perfil']) && $this->datos['cod_perfil']!="" ){
			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio, s.fecha_fin,s.hora_fin,s.so,s.nom_pc,s.nom_remoto,s.dir_ip,s.dir_mac,s.navegador
        	FROM (sesionuser as s INNER JOIN usuario as u  ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per)
			WHERE (u.login LIKE '%".$this->datos['user']."%' OR p.nom_per LIKE '%".$this->datos['user']."%' OR p.ape_per LIKE '%".$this->datos['user']."%') AND per.idperfil='".$this->datos['cod_perfil']."'";
			
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['user']) && $this->datos['user']!=""){

			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio, s.fecha_fin,s.hora_fin,s.so,s.nom_pc,s.nom_remoto,s.dir_ip,s.dir_mac,s.navegador
        	FROM (sesionuser as s INNER JOIN usuario as u  ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per)
			WHERE u.login LIKE '%".$this->datos['user']."%' OR p.nom_per LIKE '%".$this->datos['user']."%' OR p.ape_per LIKE '%".$this->datos['user']."%'";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['cod_perfil']) && $this->datos['cod_perfil']!=""){
			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio, s.fecha_fin,s.hora_fin,s.so,s.nom_pc,s.nom_remoto,s.dir_ip,s.dir_mac,s.navegador
        	FROM (sesionuser as s INNER JOIN usuario as u  ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per)
        	WHERE per.idperfil='".$this->datos['cod_perfil']."'";
			$rs=$this->ejecuta($sql);
		}
		else{
			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,s.fecha_inicio,s.hora_inicio, s.fecha_fin,s.hora_fin,s.so,s.nom_pc,s.nom_remoto,s.dir_ip,s.dir_mac,s.navegador
        	FROM (sesionuser as s INNER JOIN usuario as u  ON s.id_usuario=u.id_usuario INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per)";
			$rs=$this->ejecuta($sql);
		}

		include_once('modelo_pdf/m_pdf_bitacora.php');
		$pdf= new PDF('L','mm',array(520,620));
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(1,9,'','',0);
		$pdf->Cell(110,9,'Usuario','BRLT',0,'C');
		$pdf->Cell(55,9,'Tipo de Usuario','BRLT',0,'C');
		$pdf->Cell(40,9,'Direccion IP','BRLT',0,'C');
		$pdf->Cell(60,9,'Direccion MAC','BRLT',0,'C');
		$pdf->Cell(60,9,'Nombre de la PC','BRLT',0,'C');
		$pdf->Cell(55,9,'Nombre Remoto','BRLT',0,'C');
		$pdf->Cell(60,9,'Sistema Operativo','BRLT',0,'C');
		$pdf->Cell(60,9,'Navegador','BRLT',0,'C');
		$pdf->Cell(53,9,'Fecha de inicio/Hora','BRLT',0,'C');
		$pdf->Cell(53,9,'Fecha de salida/Hora','BRLT',0,'C');
		$pdf->Ln(9);


		while($tupla=$this->TraerArreglo($rs)){
			// $resultado=explode("\n",$tupla['conc']);
			// $linea=count($resultado);
			$fecha1=$this->fecha_bajada($tupla['fecha_inicio']);
			$fecha2=$this->fecha_bajada($tupla['fecha_fin']);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(1,9,'','',0);

			$pdf->Cell(110,9,$tupla['conc'],'BRLT',0,'C');
			$pdf->Cell(55,9,$tupla['nom_perfil'],'BRLT',0,'C');
			
			$pdf->Cell(40,9,$tupla['dir_ip'],'BRLT',0,'C');
			$pdf->Cell(60,9,$tupla['dir_mac'],'BRLT',0,'C');
			$pdf->Cell(60,9,$tupla['nom_pc'],'BRLT',0,'C');
			$pdf->Cell(55,9,$tupla['nom_remoto'],'BRLT',0,'C');
			$pdf->Cell(60,9,$tupla['so'],'BRLT',0,'C');
			$pdf->Cell(60,9,$tupla['navegador'],'BRLT',0,'C');
			$pdf->Cell(53,9,$fecha1.' / '.$tupla['hora_inicio'],'BRLT',0,'C');
			$pdf->Cell(53,9,$fecha2.' / '.$tupla['hora_fin'],'BRLT',0,'C');
			$pdf->Ln();

		}
		// while($tupla=$this->TraerArreglo($rs)){
		// 		if($tupla['status']==1){
		// 		$s="ACTIVO";
		// 	}else{
		// 		$s="INACTIVO";
		// 	}
		// 	$pdf->SetFont('Arial','',10);
		// 	$pdf->Cell(10,9,'','',0);
		// 	$pdf->Cell(15,9,$c,'BRLT',0);
		// 	$pdf->Cell(50,9,$tupla['nom_parroq'],'BRLT',0);
		// 	$pdf->Cell(50,9,$tupla['nom_mun'],'BRLT',0);
		// 	$pdf->Cell(40,9,$tupla['nom_est'],'BRLT',0);
		// 	$pdf->Cell(20,9,$s,'BRLT',0);

		// 	$pdf->Ln();
		// 	$c++;
		// }
		$pdf->Output();

	}
	function fecha_sub($fecha){
		$fecha = substr($fecha,6,4).'-'.substr($fecha, 3,2).'-'.substr($fecha,0,2);
		return $fecha;
	}
	function fecha_bajada($fecha){
		$fecha = substr($fecha,8,4).'-'.substr($fecha, 5,2).'-'.substr($fecha,0,4);
		return $fecha;
	}
}


?>
