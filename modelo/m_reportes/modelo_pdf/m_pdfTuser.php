<?php
@session_start();
include_once('../../reportes/fpdf/fpdf.php');

class PDF extends FPDF{
	
	function Header(){

		
		$this->Image('../../public/img/logoMinisterio.jpg',10,4,20);
		$this->Image('../../public/img/cic.png',180,4,25);

		
		$this->SetFont('Arial','',10);
		$this->Ln(10);

		include_once('../../modelo/m_reportes/m_conexion.php');
		$bd= new conex();
		$sql="SELECT o.cod_org,o.nom_org,o.cod_ud,o.nom_ud,s.cod_sed,s.nom_sed,e.nom_est,p.nom_parroq,ss.abreviatura_sede FROM organizacion as o INNER JOIN sede as s ON s.id_org=o.id_org INNER JOIN sistema as ss ON ss.id_sed=s.id_sed INNER JOIN parroquia as p ON s.id_parroq=p.id_parroq
		INNER JOIN municipio as m ON p.id_mun=m.id_mun INNER JOIN estado as e ON e.id_est=m.id_est";
        $rs2=$bd->ejecuta($sql);
		$tupla1=$bd->TraerArreglo($rs2);
		$_SESSION['barcode']=$tupla1['cod_sed'].$tupla1['cod_ud'].$tupla1['cod_org'];
		$_SESSION['abrev_rep']=$tupla1['abreviatura_sede'];
			$_SESSION['nom_sed_rep']=$tupla1['nom_sed'];
		$this->Text(73,15,'REPUBLICA BOLIVARIANA DE VENEZUELA','C',0);
		$this->Text(40,20,$tupla1['nom_org'],'C',0);
		$this->Text(45,25,$tupla1['nom_ud'],'C',0);
		$this->Text(70,30,$tupla1['nom_sed'].'-'.$tupla1['nom_est'],'C',0);
		$this->Ln(18);
		$this->SetFont('Arial','B',14);
		$this->Cell(0,10,'Listado de Tipo de Usuarios',0,0,'C');
		
		date_default_timezone_set('America/Caracas');
		$hora=time();
		$fecha=date('d/m/Y - g:i-A',$hora);//fecha actual de la pc
		$this->SetFont('Arial','I',10);
		$this->Ln(4);
		$this->Cell(0,15,'Fecha:'.' '.$fecha,'',1,'R');
		
		$this->Ln(2);

		//***************************************************************************************//
	}
			function Footer(){
		$this->Ln(2);
		
		$this->SetY(-16);

		$this->SetFont('Arial','I',8);
		$this->Cell(-.1,-5,'Generado por: '.utf8_decode($_SESSION['nom']).' '.utf8_decode($_SESSION['ape']),0,'');

		$this->Cell(148,3,'Algunos Derechos Reservados por el '.$_SESSION['abrev_rep'].' '.$_SESSION['nom_sed_rep'],0,'');

		$this->Cell(48,-10,'Pagina'.$this->PageNo().'/{nb}','',0,'R');
		$this->Image('../../public/img/code_car.jpg',185,260,25);
		$this->Cell(0,7,$_SESSION['barcode'],'',0,'R');
	}
}