<?php
@session_start();
include_once('../../reportes/fpdf/fpdf.php');

class PDF extends FPDF{
	
	function Header(){

		
		$this->Image('../../public/img/logoMinisterio.jpg',10,4,20);
		$this->Image('../../public/img/cic.png',180,4,25);

		
		$this->SetFont('Arial','',10);
		$this->Ln(10);

		$this->Text(73,15,'REPUBLICA BOLIVARIANA DE VENEZUELA','C',0);
		$this->Text(50,20,$_SESSION['nom_org_report'],0);
		$this->Text(45,25,'CUERPO DE INVESTIGACIONES CIENTIFICAS PENALES Y CRIMINALISTICAS','C',0);
		$this->Text(70,30,'SUB DELEGACION ACARIGUA-PORTUGUESA','C',0);
		$this->Ln(18);
		$this->SetFont('Arial','B',14);
		$this->Cell(0,10,'Listado de Organismo',0,0,'C');
		
		$fecha=date('d/m/Y');//fecha actual de la pc
		$this->SetFont('Arial','I',8);
		$this->Ln(4);
		$this->Cell(0,15,'Fecha:'.' '.$fecha,'',1,'R');
		
		$this->Ln(2);

		//***************************************************************************************//
	}
			function Footer(){
		$this->Ln(2);
		
		$this->SetY(-18);

		$this->SetFont('Arial','I',8);
		$this->Cell(-.1,-5,'Generado por: '.utf8_decode($_SESSION['nom']).' '.utf8_decode($_SESSION['ape']),0,'');

		$this->Cell(148,3,'Derechos Reservados por el CICPC Sub Delegacion Acarigua',0,'');

		$this->Cell(48,-10,'Pagina'.$this->PageNo().'/{nb}','',0,'R');
		$this->Image('../../public/img/code_car.jpg',182,258,25);
		
	}
}