<?php
@session_start();
include_once('m_conexion.php');
class ClsDevolucionJdTbien extends conex{
	private $datos;
	function ClsDevolucionJdTbien(){
		$this->conex();
		$this->datos="";
	}

	function buscar($cod,$resp,$cod_tbien){
		
		include_once('../../../reportes/html2pdf/html2pdf.class.php');
		$pdf= new HTML2PDF('L','A4','fr'); // instancio la la clase HTML2PDF
		
		//todo los tipo de bienes
		$sql="SELECT bn.cod_bien,tb.des_tbien,bn.des_bien,bn.serial_bien,bn.modelo,dpto.nom_dep,CONCAT('C.I ',p.ced_per,' ',p.nom_per,' ',p.ape_per) as conc,mar.nom_marca,m.fecha_mov,tm.cod_tipo_mov FROM detalle_movimiento as dm INNER JOIN bien_nacional as bn ON dm.id_bien=bn.id_bien INNER JOIN movimiento as m ON dm.id_mov=m.id_mov INNER JOIN tipo_bien as tb ON bn.id_tbien=tb.id_tbien INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN marca as mar ON bn.id_marca=mar.id_marca INNER JOIN departamento as dpto ON m.id_dep=dpto.id_dep INNER JOIN personal as p ON m.id_resp_dep=p.id_per WHERE dpto.id_dep='".$cod."' AND m.id_resp_dep='".$resp."' AND tb.id_tbien='".$cod_tbien."' AND tm.id_tipo_mov=3";
//echo $sql;
			
			$rs=$this->ejecuta($sql);
		if($cod_tbien=="selec"){
				$sql= "SELECT bn.cod_bien,tb.des_tbien,bn.des_bien,bn.serial_bien,bn.modelo,dpto.nom_dep,CONCAT('C.I ',p.ced_per,' ',p.nom_per,' ',p.ape_per) as conc,mar.nom_marca,m.fecha_mov,tm.cod_tipo_mov FROM detalle_movimiento as dm INNER JOIN bien_nacional as bn ON dm.id_bien=bn.id_bien INNER JOIN movimiento as m ON dm.id_mov=m.id_mov INNER JOIN tipo_bien as tb ON bn.id_tbien=tb.id_tbien INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov INNER JOIN marca as mar ON bn.id_marca=mar.id_marca INNER JOIN departamento as dpto ON m.id_dep=dpto.id_dep INNER JOIN personal as p ON m.id_resp_dep=p.id_per WHERE dpto.id_dep='".$cod."' AND m.id_resp_dep='".$resp."'  AND tm.id_tipo_mov=3 ";
//echo $sql;
			$rs=$this->ejecuta($sql);
 
//echo $sql;
			$rs=$this->ejecuta($sql);
		}
		$rs2=$this->ejecuta($sql);
		$tupla1=$this->TraerArreglo($rs2);
		$fecha_mov=$this->bajada_fecha($tupla1['fecha_mov']);
		$c=1; //contador para llevar el control de lo que venga de la bd 1,2,3,4
		$fecha=date('d/m/Y'); //consulta sql para traer datos que van en la cabecera del reporte


		$sql="SELECT o.cod_org,o.nom_org,o.cod_ud,o.nom_ud,s.cod_sed,s.nom_sed,e.nom_est,p.nom_parroq,ss.abreviatura_sede FROM organizacion as o INNER JOIN sede as s ON s.id_org=o.id_org INNER JOIN sistema as ss ON ss.id_sed=s.id_sed INNER JOIN parroquia as p ON s.id_parroq=p.id_parroq
		INNER JOIN municipio as m ON p.id_mun=m.id_mun INNER JOIN estado as e ON e.id_est=m.id_est";
        $rs3=$this->ejecuta($sql);
		$tupla3=$this->TraerArreglo($rs3);
		

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
				margin-left:19px;
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
			font-size: 14px;
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
			<p align="center">'.$tupla3['nom_org'].'</p>
			<p align="center">'.$tupla3['nom_ud'].'</p>
			<p align="center">'.$tupla3['nom_sed'].'-'.$tupla3['nom_est'].'</p><br>
			<pre style="margin-left:380px;">Fecha de Impresión: '.$fecha.'</pre>
			
			<h4 align="center">Listado por Tipo de Bienes Nacionales Devueltos por el Departamento</h4><br>
            </div>
			</div>
			<!--inicio de tabla del Listado -->
			<p id="negrita">Responsable del Dpto:'.$tupla1['conc'].'</p><p style="margin-top:-14px;" align="right">Fecha de Devolución: '.$fecha_mov.'</p>
			<br>

			<table border="0" align="center" id="tabla-Bienes_Nacionales">
				<tr>
					<td>
						<table border="1" style="border-collapse:collapse;">
		
						<tr>
							<td width="40" border="1" id="negrita" align="center">Nº</td>
							<td width="100" border="1" id="negrita" align="center">Codigo</td>
							<td width="130" border="1" id="negrita" align="center">Tipo de Bien</td>
							<td width="320" border="1" id="negrita" align="center">Descripcion</td>
							
						
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
		<p style='margin-top:24px;margin-left:1010px;'>".$tupla3['cod_sed'].$tupla3['cod_ud'].$tupla3['cod_org']."</p>
		<p style='margin-top:-25px;position:fixed;'>Gerenerado por: ".$_SESSION['nom'].' '.$_SESSION['ape']."</p>
		<p style='margin-top:0px;position:fixed;'>Algunos Derechos Reservados ".$tupla3['abreviatura_sede']." ".$tupla3['nom_sed']."</p>
		</div>
		</page_footer>
		";

		$pdf->WriteHTML($footer);

		$pdf->Output(); //salida al navegador del pdf

	}

	function envio_fecha($fecha){
        $fecha = substr($fecha,6,4).'-'.substr($fecha, 3,2).'-'.substr($fecha,0,2);
		return $fecha;
    }
    function bajada_fecha($fecha){
        $fecha = substr($fecha,8,2).'-'.substr($fecha, 5,2).'-'.substr($fecha,0,4);
		return $fecha;
    }
}

?>