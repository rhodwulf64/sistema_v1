<?php

include_once('m_conexion.php');

class ClsBitacoraMov extends conex{
	private $datos;
	function ClsBitacoraMov(){
		$this->conex();
		$this->datos="";
	}
	function buscar($POST){
		$this->datos = $POST;
		$resultado = explode(" ", $_POST['user']);
		if(isset($this->datos['fecha1']) && $this->datos['fecha1']!="" && isset($this->datos['fecha2']) && $this->datos['fecha2']!=""){
			$fecha1=$this->fecha_sub($this->datos['fecha1']);
			$fecha2=$this->fecha_sub($this->datos['fecha2']);

			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,m.fecha_mov,m.hora_reg ,tm.nom_tipo_mov,tm.cod_tipo_mov,mm.tipo_motivo,mm.des_motivo_mov 
		FROM  usuario as u  INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per
		 INNER JOIN movimiento as m ON m.id_usuario=u.id_usuario 
		 INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN motivo_movimiento as mm ON m.id_motivo_mov=mm.id_motivo_mov 
			WHERE m.fecha_mov  BETWEEN '".$fecha1."' and '".$fecha2."'";
        //echo $sql;
        	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2])){
			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,m.fecha_mov,m.hora_reg ,tm.nom_tipo_mov,tm.cod_tipo_mov,mm.tipo_motivo,mm.des_motivo_mov 
		FROM  usuario as u  INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per
		 INNER JOIN movimiento as m ON m.id_usuario=u.id_usuario 
		 INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN motivo_movimiento as mm ON m.id_motivo_mov=mm.id_motivo_mov
			WHERE u.login LIKE '%".$resultado[0]."%' AND p.nom_per LIKE '%".$resultado[1]."%' AND p.ape_per LIKE '%".$resultado[2]."%'";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['user']) && $this->datos['user']!="" && isset($this->datos['cod_perfil']) && $this->datos['cod_perfil']!="" ){
			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,m.fecha_mov,m.hora_reg ,tm.nom_tipo_mov,tm.cod_tipo_mov,mm.tipo_motivo,mm.des_motivo_mov 
		FROM usuario as u  INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per
		 INNER JOIN movimiento as m ON m.id_usuario=u.id_usuario 
		 INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN motivo_movimiento as mm ON m.id_motivo_mov=mm.id_motivo_mov
			WHERE (u.login LIKE '%".$this->datos['user']."%' OR p.nom_per LIKE '%".$this->datos['user']."%' OR p.ape_per LIKE '%".$this->datos['user']."%') AND per.idperfil='".$this->datos['cod_perfil']."'";
			
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['user']) && $this->datos['user']!=""){

			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,m.fecha_mov,m.hora_reg ,tm.nom_tipo_mov,tm.cod_tipo_mov,mm.tipo_motivo,mm.des_motivo_mov 
		FROM  usuario as u INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per
		 INNER JOIN movimiento as m ON m.id_usuario=u.id_usuario 
		 INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN motivo_movimiento as mm ON m.id_motivo_mov=mm.id_motivo_mov
			WHERE u.login LIKE '%".$this->datos['user']."%' OR p.nom_per LIKE '%".$this->datos['user']."%' OR p.ape_per LIKE '%".$this->datos['user']."%'";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['cod_perfil']) && $this->datos['cod_perfil']!=""){
			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,m.fecha_mov,m.hora_reg ,tm.nom_tipo_mov,tm.cod_tipo_mov,mm.tipo_motivo,mm.des_motivo_mov 
		FROM  usuario as u  INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per
		 INNER JOIN movimiento as m ON m.id_usuario=u.id_usuario 
		 INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN motivo_movimiento as mm ON m.id_motivo_mov=mm.id_motivo_mov
			WHERE per.idperfil='".$this->datos['cod_perfil']."'";
			$rs=$this->ejecuta($sql);
		}
		else{
			$sql="SELECT (SELECT CONCAT('C.I ',u.login,' ',p.nom_per,' ',p.ape_per,' ')) as conc,per.nom_perfil,m.fecha_mov,m.hora_reg ,tm.nom_tipo_mov,tm.cod_tipo_mov,mm.tipo_motivo,mm.des_motivo_mov 
		FROM usuario as u INNER JOIN perfil as per ON per.idperfil=u.id_perfil INNER JOIN personal as p ON u.id_per=p.id_per
		 INNER JOIN movimiento as m ON m.id_usuario=u.id_usuario 
		 INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN motivo_movimiento as mm ON m.id_motivo_mov=mm.id_motivo_mov";
			$rs=$this->ejecuta($sql);
		}

		include_once('modelo_pdf/m_pdf_bitacora_mov.php');
		$pdf= new PDF('L','mm',array(200,320));
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		$pdf->SetFont('Arial','b',12);
		$pdf->Cell(5,7,'','',0);
		$pdf->Cell(95,7,'Usuario','BRLT',0,'C');
		$pdf->Cell(50,7,'Tipo de Usuario','BRLT',0,'C');
		$pdf->Cell(50,7,'Movimiento','BRLT',0,'C');
		$pdf->Cell(50,7,'Motivo','BRLT',0,'C');
		$pdf->Cell(50,7,'Fecha Movimiento/Hora','BRLT',0,'C');
		$pdf->Ln(7);


		while($tupla=$this->TraerArreglo($rs)){
			// $resultado=explode("\n",$tupla['conc']);
			// $linea=count($resultado);
			$fecha1=$this->fecha_bajada($tupla['fecha_mov']);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(5,7,'','',0);

			$pdf->Cell(95,7,$tupla['conc'],'BRLT',0,'C');
			$pdf->Cell(50,7,$tupla['nom_perfil'],'BRLT',0,'C');
			$pdf->Cell(50,7,utf8_decode($tupla['tipo_motivo']),'BRLT',0,'C');
			$pdf->Cell(50,7,$tupla['des_motivo_mov'],'BRLT',0,'C');
			$pdf->Cell(50,7,$fecha1.' / '.$tupla['hora_reg'],'BRLT',0,'C');
			$pdf->Ln();

		}
		// while($tupla=$this->TraerArreglo($rs)){
		// 		if($tupla['status']==1){
		// 		$s="ACTIVO";
		// 	}else{
		// 		$s="INACTIVO";
		// 	}
		// 	$pdf->SetFont('Arial','',10);
		// 	$pdf->Cell(10,7,'','',0);
		// 	$pdf->Cell(15,7,$c,'BRLT',0);
		// 	$pdf->Cell(50,7,$tupla['nom_parroq'],'BRLT',0);
		// 	$pdf->Cell(50,7,$tupla['nom_mun'],'BRLT',0);
		// 	$pdf->Cell(40,7,$tupla['nom_est'],'BRLT',0);
		// 	$pdf->Cell(20,7,$s,'BRLT',0);

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
