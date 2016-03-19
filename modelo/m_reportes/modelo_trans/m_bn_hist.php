<?php
@session_start();
include_once('m_conexion.php');

class ClsBienNacHist extends conex{
	private $datos;

	function ClsBienNacHist(){
		$this->conex();
		
	}
	function fechab($f){
		$f=substr($f, 8,5).'-'.substr($f, 5,2).'-'.substr($f, 0,4);
		return $f;
	}
	function buscar($c){
		include_once('../../../reportes/html2pdf/html2pdf.class.php');
		$pdf= new HTML2PDF('L','A3','es'); // instancio la la clase HTML2PDF

		$sql_header="SELECT b.id_bien, b.cod_bien, b.id_tbien, b.serial_bien, b.id_marca, b.modelo, b.des_bien, b.id_cond, b.precio, b.status, b.observacion_bien, tb.id_tbien, tb.cod_tbien, tb.des_tbien, tb.id_categoria, tb.status, c.id_categoria, c.nom_cat, c.status, ma.id_marca, ma.nom_marca, con.id_cond, con.nom_cond, con.status FROM bien_nacional as b INNER JOIN tipo_bien as tb INNER JOIN categoria as c INNER JOIN marca as ma INNER JOIN condicion as con WHERE b.cod_bien='".$c."' and b.id_tbien=tb.id_tbien and tb.id_categoria=c.id_categoria and b.id_marca=ma.id_marca and  b.id_cond=con.id_cond and b.status=1";
		$rs_header=$this->ejecuta($sql_header);


		// $sql = 
		// "	SELECT mm.tipo_motivo AS TIPO_MOVIMIENTO,m.id_mov as NRO_MOVIMIENTO,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,pr.des_prov as PROVEEDOR_RECEPCION,'ALMACEN' AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO

		// 	FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b, proveedor as pr

		// 	WHERE m.status=1 AND (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_prov=pr.id_prov) and (m.id_tipo_mov=1) and (b.cod_bien=".$c.")

		// 	UNION

		// 	SELECT mm.tipo_motivo AS TIPO_MOVIMIENTO,m.id_mov as NRO_MOVIMIENTO,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,'NO APLICA' as PROVEEDOR_RECEPCION,dp.nom_dep AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO

		// 	FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b, departamento as dp

		// 	WHERE m.status=1 AND (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_dep=dp.id_dep) and (m.id_tipo_mov=2) and (b.cod_bien=".$c.")

		// 	UNION

		// 	SELECT mm.tipo_motivo AS TIPO_MOVIMIENTO,m.id_mov as NRO_MOVIMIENTO,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,'NO APLICA' as PROVEEDOR_RECEPCION,'NO APLICA' AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO

		// 	FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b

		// 	WHERE m.status=1 AND (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_tipo_mov<>1 and m.id_tipo_mov<>2) and (b.cod_bien=".$c.")

		// 	ORDER BY 2

		// ";

		$sql="
			SELECT mm.des_motivo_mov,m.id_mov as NRO_MOVIMIENTO,mm.tipo_motivo AS TIPO_MOVIMIENTO,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,pr.des_prov as PROVEEDOR_RECEPCION,'ALMACEN' AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO,peri.nom_periodo

			FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b, proveedor as pr,periodo as peri

			WHERE m.status=1 AND (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_prov=pr.id_prov) and (m.id_tipo_mov=1) and (b.cod_bien=".$c.") and (peri.id_periodo=m.id_periodo)

			UNION

			SELECT mm.des_motivo_mov,m.id_mov as NRO_MOVIMIENTO,mm.tipo_motivo AS TIPO_MOVIMIENTO,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,'NO APLICA' as PROVEEDOR_RECEPCION,dp.nom_dep AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO,peri.nom_periodo

			FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b, departamento as dp, periodo as peri

			WHERE m.status=1 AND (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_dep=dp.id_dep) and (m.id_tipo_mov=2) and (b.cod_bien=".$c.") and (peri.id_periodo=m.id_periodo)

			UNION

			SELECT mm.des_motivo_mov,m.id_mov as NRO_MOVIMIENTO,mm.tipo_motivo AS TIPO_MOVIMIENTO,m.nro_document AS NRO_DOCUMENTO,m.fecha_mov AS FECHA_MOVIMIENTO,m.fecha_reg AS FECHA_REGISTRO,m.observacion_mov AS OBSERVACION,CONCAT('C.I. ',per.ced_per,' - ',per.nom_per,' ',per.ape_per) as RESPONSABLE,'NO APLICA' as PROVEEDOR_RECEPCION,'NO APLICA' AS DEPARTAMENTO_ASIGNACION,CONCAT('C.I. ',pu.ced_per,' - ',pu.nom_per,' ',pu.ape_per) as USUARIO,peri.nom_periodo

			FROM movimiento as m, motivo_movimiento as mm, personal as per, usuario as us, personal as pu,detalle_movimiento as dm,bien_nacional as b, periodo as peri

			WHERE m.status=1 AND (m.id_motivo_mov= mm.id_motivo_mov) AND (m.id_per=per.id_per) and (m.id_usuario=us.id_usuario) and (us.id_per=pu.id_per) and (dm.id_mov=m.id_mov) and (b.id_bien=dm.id_bien) and (m.id_tipo_mov<>1 and m.id_tipo_mov<>2) and (b.cod_bien=".$c.") and (peri.id_periodo=m.id_periodo)

			ORDER BY 2 


		";

		/* $sql="SELECT dm.id_detalle_mov,mm.tipo_motivo, b.cod_bien,m.nro_document,m.fecha_reg,m.fecha_mov,m.observacion_mov,tm.nom_tipo_mov,pr.des_prov,mm.des_motivo_mov, p.nom_periodo,d.nom_dep 
			FROM bien_nacional as b INNER JOIN detalle_movimiento as dm INNER JOIN movimiento as m INNER JOIN tipo_movimiento as tm inner JOIN proveedor as pr INNER JOIN motivo_movimiento as mm INNER JOIN periodo as p INNER JOIN departamento as d 
			WHERE b.id_bien=dm.id_bien and dm.status=1 and dm.id_mov=m.id_mov and m.id_tipo_mov=tm.id_tipo_mov and m.id_prov=pr.id_prov and m.id_periodo= p.id_periodo and m.id_motivo_mov= mm.id_motivo_mov and m.id_dep=d.id_dep and m.status=1 and tm.id_tipo_mov=1 and b.cod_bien='".$c."' 
			UNION
			SELECT dm.id_detalle_mov,mm.tipo_motivo, b.cod_bien,m.nro_document,m.fecha_reg,m.fecha_mov,m.observacion_mov,tm.nom_tipo_mov,CONCAT('C.I. ',`ced_per`,' - ',`nom_per`,' ',`ape_per`),mm.des_motivo_mov, p.nom_periodo,d.nom_dep 
			FROM bien_nacional as b INNER JOIN detalle_movimiento as dm INNER JOIN movimiento as m INNER JOIN tipo_movimiento as tm INNER JOIN motivo_movimiento as mm INNER JOIN periodo as p INNER JOIN departamento as d INNER JOIN personal as per
			WHERE b.id_bien=dm.id_bien and dm.status=1 and dm.id_mov=m.id_mov and m.id_tipo_mov=tm.id_tipo_mov and m.id_periodo= p.id_periodo and m.id_motivo_mov= mm.id_motivo_mov and m.id_dep=d.id_dep and m.status=1 and m.id_resp_dep=per.id_per and tm.id_tipo_mov In (1,2,3,4) and b.cod_bien='".$c."'
			order by 1";*/
		$rs=$this->ejecuta($sql);

		$fecha=date('d/m/Y');


		$tupla2=$this->TraerArreglo($rs_header);
		
		  if($tupla2['nom_marca']=="NINGUNA MARCA"){
                   $marca=" ";
                        }else{
                         $marca="MARCA ".$tupla2['nom_marca'];
                        }if($tupla2['modelo']=="N/A"){
                            $modelo="";
                        }else{
                            $modelo="MODELO ".$tupla2['modelo'];
                        }if($tupla2['serial_bien']=='N/A'){
                        	$serial="";
                        }else{
                        	$serial=" SERIAL ".$tupla2['serial_bien'];
                        }
                        $sql="SELECT o.cod_org,o.nom_org,o.cod_ud,o.nom_ud,s.cod_sed,s.nom_sed,e.nom_est,p.nom_parroq,ss.abreviatura_sede FROM organizacion as o INNER JOIN sede as s ON s.id_org=o.id_org INNER JOIN sistema as ss ON ss.id_sed=s.id_sed INNER JOIN parroquia as p ON s.id_parroq=p.id_parroq
		INNER JOIN municipio as m ON p.id_mun=m.id_mun INNER JOIN estado as e ON e.id_est=m.id_est";
        $rs2=$this->ejecuta($sql);
		$tupla1=$this->TraerArreglo($rs2);
		$html='
			<style>
			*{
				font-family:Arial;
				font-size:15px;
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
				margin-left:1390px;

			}
			.header{
				margin-top:-10px;
                  width:1100px;
                  height:10px;
                  position:fixed;
			}
			#tabla-Bienes_Nacionales{

				border-collapse:collapse;
				margin-left:210px;
			}
			.header{
				margin-top:-15px;
                //border:1px solid red;
               margin-left:10px;
               width:100%;
			}
            .contenido{

                margin-top:-50px;
                //border:1px solid red;
                width:980px;
                height:50px;
                position:relative;
                left:120px;
            }
			#negrita{

			font-weight:bold;
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
			</div>
            <div class="contenido">
			<p align="center">REPÚBLICA BOLIVARIANA DE VENEZUELA</p>
			<p align="center">'.$tupla1['nom_org'].'</p>
			<p align="center">'.$tupla1['nom_ud'].'</p>
			<p align="center">'.$tupla1['nom_sed'].' '.$tupla1['nom_est'].'</p><br>
			<pre style="margin-left:580px;">Fecha de Impresión: '.$fecha.'</pre>
			
			<h4 align="center">Historial de Bienes Nacionales</h4>
            </div>
			<
			<!--inicio de tabla de la recepcion -->

			<table border="1" width="700" height="100" id="tabla-Bienes_Nacionales"> 
				<tr>
					<td>
						<table border="1"  style="border-collapse:collapse;">
							<tr>
							<td width="1125"  id="negrita" align="center">BIEN NACIONAL</td>
						
							
						</tr>
						</table>
						<table border="0"  style="border-collapse:collapse;">
							<tr>
							<td width="110"  id="negrita" align="center">Codigo del Bien:</td>
							<td width="40"  align="center">'.$tupla2['cod_bien'].'</td>
							<td width="130"  id="negrita" align="center">Tipo de Bien</td>
							<td width="220"  align="center">'.$tupla2['des_tbien'].'</td>
							<td width="100"  id="negrita" align="center">Categoria:</td>
							<td width="330"   align="center">'.$tupla2['nom_cat'].'</td>
							
						</tr>
						</table>
						<table border="0"  style="border-collapse:collapse; margin-top:5px;">
							<tr>
							<td width="110"  id="negrita" align="center">Descripcion:</td>
							<td width="220"  align="center">'.$tupla2['des_bien'].' '.$marca.' '.$modelo.''.$serial.'</td>
							<td width="130"  id="negrita" align="center">Observacion: </td>
							<td width="220"  align="center">'.$tupla2['observacion_bien'].'</td>
							<td width="100"  id="negrita" align="center">Precio:</td>
							<td width="100"   align="center">'.$tupla2['precio'].'</td>
							
						</tr>
						</table>
						<table border="1"  style="border-collapse:collapse;">
							<tr>
							<td width="1125"  id="negrita" align="center">Historial de Movimientos</td>
						</tr>
						</table>
						<table border="0"  style="border-collapse:collapse; margin-top:5px;">
							<tr>
							<td width="80" border="1"  id="negrita" align="center">Nro. Documento</td>
							<td width="80"  border="1" align="center" id="negrita">Fecha de registro</td>
							<td width="80"  border="1" id="negrita" align="center">Fecha del movimiento </td>
							<td width="155" border="1" align="center" id="negrita">Tipo de movimiento</td>
							<td width="100"  border="1" id="negrita" align="center">Resp. Mov.</td>
							<td width="100"  border="1" id="negrita" align="center">Motivo</td>
							<td width="150"  border="1" id="negrita" align="center">Observacion</td>
							<td width="100"  border="1" id="negrita" align="center">Proveedor</td>
							<td width="140"  border="1" id="negrita" align="center">Departamento</td>
							<td width="80"  border="1" id="negrita" align="center">Periodo</td>
						</tr>
						</table>
					</td>
				</tr>
			</table>
		';
			$pdf->WriteHTML($html);
			while($tupla= $this->TraerArreglo($rs) ){
				$fecha_reg=$this->fechab($tupla['FECHA_REGISTRO']);
				$fecha_mov=$this->fechab($tupla['FECHA_MOVIMIENTO']);
			 	$html='

						<table border="0"  style="border-collapse:collapse; margin-left: 210px;">
							<tr>
							<td width="82" border="1"   align="center">'.$tupla['NRO_DOCUMENTO'].'</td>
							<td width="80"  border="1" align="center" >'.$fecha_reg.'</td>
							<td width="80"  border="1"  align="center">'.$fecha_mov.'</td>
							<td width="155" border="1" align="center">'.$tupla['TIPO_MOVIMIENTO'].'</td>
							<td width="100"  border="1"  align="center">'.$tupla['RESPONSABLE'].'</td>
							<td width="100"  border="1"  align="center">'.$tupla['des_motivo_mov'].'</td>
							<td width="150"  border="1" align="center">'.$tupla['OBSERVACION'].'</td>
							<td width="100"  border="1"  align="center">'.$tupla['PROVEEDOR_RECEPCION'].'</td>
							<td width="140"  border="1" align="center">'.$tupla['DEPARTAMENTO_ASIGNACION'].'</td>
							<td width="82"  border="1" align="center">'.$tupla['nom_periodo'].'</td>
						</tr>
						</table>';
			$pdf->WriteHTML($html);		
			 }	
			
		$footer="<page_footer>
		<style>
		*{
			font-family:Arial;
			font-size:15px;
			line-height:1px;
		}
		#pie{
			//border:1px solid red;
		}
		</style>
		<div id='pie'>
		<p align='right'>pagina [[page_cu]]/[[page_nb]]</p>
		<img align='right' style='width:100px;margin-top:5px;' src='../../../public/img/code_car.jpg'/>
		<p style='margin-top:26px;margin-left:1465px;'>".$tupla1['cod_sed'].$tupla1['cod_ud'].$tupla1['cod_org']."</p>
		<p style='margin-top:-23px;position:fixed;'>Gerenerado por: ".$_SESSION['nom'].' '.$_SESSION['ape']."</p>
		<p style='margin-top:0px;position:fixed;'>Algunos Derechos Reservados ".$tupla1['abreviatura_sede']." ".$tupla1['nom_sed']."</p>
		</div>
		</page_footer>
		";

		$pdf->WriteHTML($footer);

		$pdf->Output();
	}

}

?>