<?php
ob_start();
session_start();
include_once('m_conexion.php');
class ClsSede extends conex{
	private $datos;
	function ClsSede(){
		$this->conex();
		$this->datos="";
	}

	function buscar($POST){
		$this->datos=$POST;
		$resultado=explode(" ",$_POST['nom']);


		// if(isset($this->datos['temp']) && $this->datos['temp']=="todoPdf"){
		// 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est";
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($resultado[1]) && isset($this->datos['est1'])){
		// 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND(s.cod_sed LIKE '%$resultado[0]%' AND s.nom_sed LIKE '%$resultado[1]%' AND o.cod_ud LIKE '%$resultado[2]%' and o.nom_ud LIKE '%$resultado[3]%' AND o.cod_org LIKE '%$resultado[4]%' AND o.nom_org LIKE '%$resultado[5]%' AND p.nom_parroq LIKE '%$resultado[6]%') AND s.status='".$this->datos['est1']."'";
			
		// 	$rs=$this->ejecuta($sql);

		// }else if(isset($resultado[1])){
		// 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND(s.cod_sed LIKE '%$resultado[0]%' AND s.nom_sed LIKE '%$resultado[1]%' AND o.cod_ud LIKE '%$resultado[2]%' and o.nom_ud LIKE '%$resultado[3]%' AND o.cod_org LIKE '%$resultado[4]%' AND o.nom_org LIKE '%$resultado[5]%' AND p.nom_parroq LIKE '%$resultado[6]%') ";
			
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos['nom']) && $this->datos['nom']!="" && isset($this->datos['est1'])){
		// 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND(s.cod_sed LIKE '%".$this->datos['nom']."%' OR s.nom_sed LIKE '%".$this->datos['nom']."%' OR o.cod_ud LIKE '%".$this->datos['nom']."%' OR o.nom_ud LIKE '%".$this->datos['nom']."%' OR o.cod_org LIKE '%".$this->datos['nom']."%' OR o.nom_org LIKE '%".$this->datos['nom']."%' OR p.nom_parroq LIKE '%".$this->datos['nom']."%') AND s.status='".$this->datos['est1']."'";
			
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos['nom']) && $this->datos['nom']!=""){
		// 		$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND(s.cod_sed LIKE '%".$this->datos['nom']."%' OR s.nom_sed LIKE '%".$this->datos['nom']."%' OR o.cod_ud LIKE '%".$this->datos['nom']."%' OR o.nom_ud LIKE '%".$this->datos['nom']."%' OR o.cod_org LIKE '%".$this->datos['nom']."%' OR o.nom_org LIKE '%".$this->datos['nom']."%' OR p.nom_parroq LIKE '%".$this->datos['nom']."%')";
			
		// 	$rs=$this->ejecuta($sql);
		// }else if(isset($this->datos['est1'])){
		// 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND s.status='".$this->datos['est1']."'";
			
		// 	$rs=$this->ejecuta($sql);
		// }
		
		if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3]) && isset($resultado[4]) && isset($resultado[5]) && isset($resultado[6]) && isset($this->datos['est1']) && $this->datos['est1']==1){
			$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND(s.cod_sed LIKE '%".$resultado[0]."%' AND s.nom_sed LIKE '%".$resultado[1]."%' AND o.cod_ud LIKE '%".$resultado[2]."%' AND o.nom_ud LIKE '%".$resultado[3]."%' AND o.cod_org LIKE '%".$resultado[4]."%'AND o.nom_org LIKE '%".$resultado[5]."%' AND p.nom_parroq LIKE '%".$resultado[6]."%') AND s.status='".$this->datos['est1']."' ";		
			//echo $sql;
		 	$rs=$this->ejecuta($sql);
		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3]) && isset($resultado[4]) && isset($resultado[5]) && isset($resultado[6]) && isset($this->datos['est1']) && $this->datos['est1']==0){
			$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND(s.cod_sed LIKE '%".$resultado[0]."%' AND s.nom_sed LIKE '%".$resultado[1]."%' AND o.cod_ud LIKE '%".$resultado[2]."%' AND o.nom_ud LIKE '%".$resultado[3]."%' AND o.cod_org LIKE '%".$resultado[4]."%'AND o.nom_org LIKE '%".$resultado[5]."%' AND p.nom_parroq LIKE '%".$resultado[6]."%') AND s.status='".$this->datos['est1']."' ";		
			//echo $sql;
		 	$rs=$this->ejecuta($sql);

		}else if(isset($resultado[0]) && isset($resultado[1]) && isset($resultado[2]) && isset($resultado[3]) && isset($resultado[4]) && isset($resultado[5]) && isset($resultado[6]) ){
			$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND(s.cod_sed LIKE '%".$resultado[0]."%' AND s.nom_sed LIKE '%".$resultado[1]."%' AND o.cod_ud LIKE '%".$resultado[2]."%' AND o.nom_ud LIKE '%".$resultado[3]."%' AND o.cod_org LIKE '%".$resultado[4]."%' AND o.nom_org LIKE '%".$resultado[5]."%' AND p.nom_parroq LIKE '%".$resultado[6]."%') ";		
				//echo $sql;
		 	$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['nom']) && $this->datos['nom']!=""){
		 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND(s.cod_sed LIKE '%".$this->datos['nom']."%' OR s.nom_sed LIKE '%".$this->datos['nom']."%' OR o.cod_ud LIKE '%".$this->datos['nom']."%' OR o.nom_ud LIKE '%".$this->datos['nom']."%' OR o.cod_org LIKE '%".$this->datos['nom']."%' OR o.nom_org LIKE '%".$this->datos['nom']."%' OR p.nom_parroq LIKE '%".$this->datos['nom']."%') ";		
				//echo $sql;
		 	$rs=$this->ejecuta($sql);
		 }else if( isset($this->datos['est1']) && $this->datos['est1']==1){
		 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND s.status='".$this->datos['est1']."'";		
				//echo $sql;
		 	$rs=$this->ejecuta($sql);
		 }else if( isset($this->datos['est1']) && $this->datos['est1']==0){
		 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est AND s.status='".$this->datos['est1']."'";		
				//echo $sql;
		 	$rs=$this->ejecuta($sql);
		 }else{
		 	$sql="SELECT s.cod_sed, s.nom_sed,s.status ,o.cod_ud,o.nom_ud,o.cod_org,o.nom_org, p.nom_parroq, m.nom_mun, e.nom_est FROM sede as s INNER JOIN organizacion as o INNER JOIN parroquia as p INNER JOIN municipio as m INNER JOIN estado as e WHERE s.id_parroq=p.id_parroq and s.id_org=o.id_org and p.id_parroq=m.id_mun and m.id_est=e.id_est";		

		 	$rs=$this->ejecuta($sql);
		 }

		include_once('../../reportes/html2pdf/html2pdf.class.php');
		$pdf= new HTML2PDF('P','A4','es');

		$c=1;
		date_default_timezone_set('America/Caracas');
		$hora=time();
		$fecha=date('d/m/Y - g:i-A',$hora);
		$sql="SELECT o.cod_org,o.nom_org,o.cod_ud,o.nom_ud,s.cod_sed,s.nom_sed,e.nom_est,p.nom_parroq,ss.abreviatura_sede FROM organizacion as o INNER JOIN sede as s ON s.id_org=o.id_org INNER JOIN sistema as ss ON ss.id_sed=s.id_sed INNER JOIN parroquia as p ON s.id_parroq=p.id_parroq
		 INNER JOIN municipio as m ON p.id_mun=m.id_mun INNER JOIN estado as e ON e.id_est=m.id_est";
            $rs2=$this->ejecuta($sql);
		$tupla1=$this->TraerArreglo($rs2);
		$conten="
				<style>
			*{
				font-family:Arial;
			}
			table {
				width:50%;
				 border-collapse:collapse;

			}
			table  td{

				width:40%;
				border:.2px solid black;
				


			}
			table td{
				line-space:10px;
				white-space:pre-wrap;

			}
			p{
				line-height:-10em;
				margin-top:1px;
			}
			#nro td{
				width:1px;

			}
			img{
				width:50px;

			}
			#derecho{
				margin-left:645px;
			}
			</style>
			<img src='../../public/img/logoMinisterio.jpg'/>
			<img id='derecho' src='../../public/img/logo.png'/>
			<p align='center'>REPUBLICA BOLIVARIANA DE VENEZUELA</p>
			<p align='center'>".$tupla1['nom_org']."</p>
			<p align='center'>".$tupla1['nom_ud']."</p>
			<p align='center'>".$tupla1['nom_sed'].'-'.$tupla1['nom_est']."</p>
			<pre style='margin-left:500px;'>Fecha  de Impresión: $fecha</pre>
			<br><br>
			<h4 align='center'>Listado de Sedes</h4><br>

			<table  align='center'>
			<tr>
			<td style='width:35px;'><strong>Nro</strong></td>
			<td><strong>Nombre de Sede</strong></td>
			<td><strong>Nombre de Unidad Administradora</strong></td>
			<td><strong>Nombre del Organismo</strong></td>
			<td><strong>Nombre de Parroquia</strong></td>
			<td style='width:60px;'><strong>Estatus</strong></td>
			</tr>
			</table>
			
		";
		$pdf->WriteHTML($conten);
		while($row=$this->TraerArreglo($rs)) {
				if($row['status']==1){
					$s="ACTIVO";
				}else{
					$s="INACTIVO";
				}
			$cod_sed=$row['cod_sed'];
			$content="
			<table align='center'>
			<tr>
			<td style='width:35px;'>".$c."</td>
			
			<td>".$cod_sed.' - '.$row['nom_sed']."</td>
			<td>".$row['cod_ud'].' - '.$row['nom_ud']."</td>
			<td>".$row['cod_org'].' - '.$row['nom_org']."</td>
			<td>".$row['nom_parroq'].' - '.$row['nom_mun'].' -<br> '.$row['nom_est']."</td>
			<td style='width:60px;'>".$s."</td>
			</tr>

			</table>
			
			";
			
			$c++;
			$pdf->WriteHTML($content);
		}
		$footer="<page_footer>
		<style>
		*{
			font-family:Arial;
			font-size:12px;
			line-height:1px;
		}
		#pie{
			//border:1px solid red;
		}
		</style>
		<div id='pie'>
		<p align='right'>pagina [[page_cu]]/[[page_nb]]</p>
		<img align='right' style='width:90px;margin-top:5px;' src='../../public/img/code_car.jpg'/>
		<p  style='margin-top:24px;margin-left:685px;'>".$tupla1['cod_sed'].$tupla1['cod_ud'].$tupla1['cod_org']."</p>
		<p style='margin-top:-25px;position:fixed;'>Gerenerado por: ".$_SESSION['nom'].' '.$_SESSION['ape']."</p>
		<p style='margin-top:0px;position:fixed;'>Algunos Derechos Reservados ".$tupla1['abreviatura_sede']." ".$tupla1['nom_sed']."</p>
		</div>
		</page_footer>
		";

		$pdf->WriteHTML($footer);
		
		$pdf->Output();
		
		
	}
}
ob_end_clean();
?>