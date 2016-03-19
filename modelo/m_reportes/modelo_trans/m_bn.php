<?php
@session_start();
include_once('m_conexion.php');
class ClsBienNac extends conex{
	private $datos;
	function ClsBienNac(){
		$this->conex();
		$this->datos="";
	}

	function buscar($POST){
		$this->datos=$POST;
		include_once('../../../reportes/html2pdf/html2pdf.class.php');
		$pdf= new HTML2PDF('L','A4','fr'); // instancio la la clase HTML2PDF

		if(isset($this->datos['tbien']) && $this->datos['tbien']=="selec"){//todo los tipo de bienes
			$sql= "SELECT distinct b.`id_bien`,b.`cod_bien`,b.`id_tbien`,b.`serial_bien`,b.`id_marca`,b.`modelo`,b.`des_bien`,b.`id_cond`,b.`precio`,b.`status`,b.`observacion_bien`,ma.id_marca,ma.nom_marca,ma.status,tb.id_tbien,tb.cod_tbien,tb.des_tbien,tb.id_categoria,tb.status,dm.id_detalle_mov,dm.id_mov,dm.id_bien,dm.status,m.id_mov,m.id_dep,d.id_dep,d.nom_dep,d.status,c.id_cond,c.nom_cond,c.status FROM bien_nacional as b INNER JOIN marca as ma INNER JOIN tipo_bien as tb INNER JOIN detalle_movimiento as dm INNER JOIN movimiento as m  INNER JOIN departamento as d INNER JOIN condicion as c WHERE b.id_bien=dm.id_bien and dm.id_mov= m.id_mov and b.status= 1 and b.`id_marca`=ma.id_marca and b.id_tbien=tb.id_tbien and d.id_dep=m.id_dep and c.id_cond=b.`id_cond` and dm.id_detalle_mov in (select max(id_detalle_mov) from detalle_movimiento group by id_bien)";
			$rs=$this->ejecuta($sql);
		}else if(isset($this->datos['tbien']) && $this->datos['tbien']!=""){// un tipo de bien de la lista(combo)
			$sql= "SELECT distinct b.`id_bien`,b.`cod_bien`,b.`id_tbien`,b.`serial_bien`,b.`id_marca`,b.`modelo`,b.`des_bien`,b.`id_cond`,b.`precio`,b.`status`,b.`observacion_bien`,ma.id_marca,ma.nom_marca,ma.status,tb.id_tbien,tb.cod_tbien,tb.des_tbien,tb.id_categoria,tb.status,dm.id_detalle_mov,dm.id_mov,dm.id_bien,dm.status,m.id_mov,m.id_dep,d.id_dep,d.nom_dep,d.status,c.id_cond,c.nom_cond,c.status FROM bien_nacional as b INNER JOIN marca as ma INNER JOIN tipo_bien as tb INNER JOIN detalle_movimiento as dm INNER JOIN movimiento as m  INNER JOIN departamento as d INNER JOIN condicion as c WHERE b.id_bien=dm.id_bien and dm.id_mov= m.id_mov and b.status= 1 and b.`id_marca`=ma.id_marca and b.id_tbien=tb.id_tbien and tb.id_tbien='".$this->datos['tbien']."' and d.id_dep=m.id_dep and c.id_cond=b.`id_cond` and dm.id_detalle_mov in (select max(id_detalle_mov) from detalle_movimiento group by id_bien)";
			//echo $sql;
			$rs=$this->ejecuta($sql);
		}
		


		$c=1; //contador para llevar el control de lo que venga de la bd 1,2,3,4
		$fecha=date('d/m/Y'); //consulta sql para traer datos que van en la cabecera del reporte
		
		$sql="SELECT o.cod_org,o.nom_org,o.cod_ud,o.nom_ud,s.cod_sed,s.nom_sed,e.nom_est,p.nom_parroq,ss.abreviatura_sede FROM organizacion as o INNER JOIN sede as s ON s.id_org=o.id_org INNER JOIN sistema as ss ON ss.id_sed=s.id_sed INNER JOIN parroquia as p ON s.id_parroq=p.id_parroq
		INNER JOIN municipio as m ON p.id_mun=m.id_mun INNER JOIN estado as e ON e.id_est=m.id_est";
        $rs2=$this->ejecuta($sql);
		$tupla1=$this->TraerArreglo($rs2);

		$html='
				<style>
			*{
				font-family:Arial;
			}

			p{
				line-height:0px;
				padding:0px;
				word-spacing:1px;
				margin-top:5px;
			}

			img{
				width:70px;

			}
			#derecho{
				margin-left:910px;

			}
			.header{
				margin-top:-10px;
                  width:1100px;
                  height:10px;
                  position:fixed;
			}
			#tabla-Bienes_Nacionales{

				border-collapse:collapse;
				margin-left:35px;
				text-align:center;
			}
			.header{
				margin-top:-15px;
                //border:1px solid red;
                position:fixed;
			}
            .contenido{

                margin-top:10px;
                //border:1px solid red;
                width:980px;
                height:50px;
                position:relative;
                left:-1000px;
            }
			#negrita{

			font-weight:bold;
			font-size: 16px;
			}
            h4{
            margin-left:200px;
            }
            .td-individual{ /*para mover un td de una table*/
                margin-left:-5px;
            }
           
			</style>

			<div class="header">
			<img src="../../../public/img/logoMinisterio.jpg"/>
			<img id="derecho" src="../../../public/img/logo.png"/>
            <div class="contenido">
			<p align="center">REPÚBLICA BOLIVARIANA DE VENEZUELA</p>
			<p align="center">'.$tupla1['nom_org'].'</p>
			<p align="center">'.$tupla1['nom_ud'].'</p>
			<p align="center">'.$tupla1['nom_sed'].' '.$tupla1['nom_est'].'</p><br>
			<pre style="margin-left:380px;">Fecha de Impresión: '.$fecha.'</pre>
			
			<h4 align="center">Listado de Bienes Nacionales</h4>
            </div>
			</div>
			<!--inicio de tabla del Listado -->

			<table border="0" width="700" height="100" id="tabla-Bienes_Nacionales">
				<tr>
					<td>
						<table border="1" style="border-collapse:collapse;">
		
						<tr>
							<td width="40" border="1" id="negrita" align="center">Nº</td>
							<td width="100" border="1" id="negrita" align="center">Codigo</td>
							<td width="130" border="1" id="negrita" align="center">Tipo de Bien</td>
							<td width="320" border="1" id="negrita" align="center">Descripcion</td>
							<td width="100" border="1" id="negrita" align="center">Precio</td>
							<td width="180" border="1" id="negrita" align="center">Ubicación</td>
							<td width="130" border="1" id="negrita" align="center">Condición</td>
						</tr>
						</table>
					</td>
				</tr>
			</table>
			';


		$pdf->WriteHTML($html);
		$c=1;
		  while($row= $this->TraerArreglo($rs) ){

            if($row['nom_marca']=="NINGUNA MARCA"){
                   $marca=" ";
                        }else{
                         $marca="MARCA ".$row['nom_marca'];
                        }if($row['modelo']=="N/A"){
                            $modelo="";
                        }else{
                            $modelo="MODELO ".$row['modelo'];
                        }if($row['serial_bien']=='N/A'){
                        	$serial="";
                        }else{
                        	$serial=" SERIAL ".$row['serial_bien'];
                        }
                 	$cantidad=1;
                 	

            $html='
            	<table border="1" align="center" style="border-collapse:collapse;margin-left:19px;margin-top:-1px;">
            	<tr>
            			<td width="40" border="1" align="center">'.$c.'</td>
							<td width="100" border="1"  align="center">'.$row['cod_bien'].'</td>
							<td width="130" border="1" align="center">'.$row['des_tbien'].'</td>
							<td width="320" border="1" align="center">'.$row['des_bien'].' '.$marca.' '.$modelo.''.$serial.'</td>
							<td width="100" border="1"  align="center">Bs.'.$row['precio'].'</td>
							<td width="180" border="1"  align="center">'.$row['nom_dep'].'</td>
							<td width="130" border="1"  align="center">'.$row['nom_cond'].'</td>
				</tr>
				</table>

            ';
            $pdf->WriteHTML($html);
            $c++;
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
		<img align='right' style='width:90px;margin-top:5px;' src='../../../public/img/code_car.jpg'/>
		<p style='margin-top:24px;margin-left:1010px;'>".$tupla1['cod_sed'].$tupla1['cod_ud'].$tupla1['cod_org']."</p>
		<p style='margin-top:-25px;position:fixed;'>Gerenerado por: ".$_SESSION['nom'].' '.$_SESSION['ape']."</p>
		<p style='margin-top:0px;position:fixed;'>Algunos Derechos Reservados ".$tupla1['abreviatura_sede']." ".$tupla1['nom_sed']."</p>
		</div>
		</page_footer>
		";

		$pdf->WriteHTML($footer);

		$pdf->Output(); //salida al navegador del pdf

	}
}

?>