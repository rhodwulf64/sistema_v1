<?php
include_once('m_conexion.php');
@session_start(); //no la uso
class ClsRecepcion extends conex{
	private $datos; //variable para traer name por POST
    
	function ClsRecepcion(){
		$this->conex();
		$this->datos="";
	}

	function buscar_cat($nom){
		//recibo los datos POST lo guardo en una varibale datos

		
		include_once('../../../reportes/html2pdf/html2pdf.class.php');
		$pdf= new HTML2PDF('L','A4','fr'); // instancio la la clase HTML2PDF

		$c=1; //contador para llevar el control de lo que venga de la bd 1,2,3,4
		$fecha=date('d/m/Y'); //consulta sql para traer datos que van en la cabecera del reporte
		$sql_header="SELECT s.cod_sed, s.nom_sed, org.cod_org, org.nom_org, org.cod_ud, org.nom_ud,sis.direccion,p.nom_per,p.ape_per,p.ced_per,car.nom_car FROM sede as s INNER JOIN organizacion as org INNER JOIN sistema as sis INNER JOIN movimiento as m INNER JOIN personal as p INNER JOIN cargo as car WHERE s.id_sed=sis.id_sed and s.id_org=org.id_org and m.id_per=p.id_per  and car.id_car=p.id_cargo";
		$rs_header=$this->ejecuta($sql_header);
		$tupla2=$this->TraerArreglo($rs_header); //$content guardo toda la estructura HTML para el reporte

		$tupla2=$this->TraerArreglo($rs_header); //$content guardo toda la estructura HTML para el reporte
		 $sql="SELECT o.cod_org,o.nom_org,o.cod_ud,o.nom_ud,s.cod_sed,s.nom_sed,e.nom_est,p.nom_parroq,ss.abreviatura_sede FROM organizacion as o INNER JOIN sede as s ON s.id_org=o.id_org INNER JOIN sistema as ss ON ss.id_sed=s.id_sed INNER JOIN parroquia as p ON s.id_parroq=p.id_parroq
		INNER JOIN municipio as m ON p.id_mun=m.id_mun INNER JOIN estado as e ON e.id_est=m.id_est";
        $rs2=$this->ejecuta($sql);
		$tupla1=$this->TraerArreglo($rs2);

		$content='
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
			}
			#tabla-recepcion{
				
				border-collapse:collapse;
				margin-left:30px;
			}
			.header{
				margin-top:-15px;
                //border:1px solid red;
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
			<p align="center">'.$tupla1['nom_sed'].'-'.$tupla1['nom_est'].'</p><br>
			<pre style="margin-left:380px;">Fecha de Impresión: '.$fecha.'</pre>
			
			<h4 align="center">Recepción</h4>
            </div>
			</div>
		
			
			<!--inicio de tabla de la recepcion -->
			
					<table border="0" width="1000" height="100" id="tabla-recepcion">
			<tr>
				<td>
				<table border="1">
					<tr >
						<td colspan="6"  width="1000" align="center" id="negrita">FORMATO DE BIENES NACIONALES</td>
			
					</tr>
					<tr >
						<td width="40" border="0"></td>
						<td width="1" align="center">X</td>
						<td border="0" id="negrita">BIENES MUEBLES</td>
						<td width="10"></td>
						<td border="0" id="negrita">MATERIALES</td>
					</tr>
					<tr>
					<td border="0" colspan="6" align="center" id="negrita">ORGANISMO</td>
					</tr>
					<tr>
					<td align="center" id="negrita">CODIGO:</td>
					<td>'.$tupla2['cod_org'].'</td>
					<td border="0">DENOMINACION: '.$tupla2['nom_org'].'</td>
					</tr>
					
					<tr><td border="0" colspan="6"  align="center" id="negrita">UNIDAD ADMINISTRADORA</td></tr>

					<tr>
					<td align="center" id="negrita">CODIGO:</td>
					<td> '.$tupla2['cod_ud'].'</td>
					<td border="0">DENOMINACION: '.$tupla2['nom_ud'].'</td>
					</tr>
					<tr><td border="0" colspan="6" align="center" id="negrita">DEPENDENCIA USUARIA</td></tr>

					<tr>
					<td align="center" id="negrita">CODIGO:</td>
					<td>'.$tupla2['cod_sed'].'</td>
					<td border="0">DENOMINACION: '.$tupla2['nom_sed'].'</td>
					</tr>
					</table >
					<table border="1" >
						<tr><td border="0" width="1004" colspan="16" align="center" id="negrita">DIRECCION DEL DESPACHO</td></tr>

					<tr>
					<td align="center" width="0" id="negrita">DIRECCION:</td>
					
					<td border="0">UBICACION: '.$tupla2['direccion'].'</td>
					</tr>
					<tr><td border="0" colspan="7" align="center" id="negrita">RESPONSABLE DEL USO</td></tr>

					<tr>
					<td align="center" id="negrita">NOMBRE Y APELLIDO:</td>
					
					<td border="0" >'.$tupla2['nom_per'].' '.$tupla2['ape_per'].'</td>
					<td border="" ></td>
					<td border="" ></td>
					<td border="1" colspan="0" id="negrita" >CARGO: '.$tupla2['nom_car'].' </td>
					</tr>
					
					
					</table > <!--COMIENZO DE LA TABLA PARA EL BIEN NACIONAL -->
					<table border="1" style="border-collapse:collapse;"  width="1000" >
				<tr align="center">
					<td width="80" id="negrita">CANTIDAD</td>
					<td width="60" id="negrita">CODIGO</td>
					<td width="65" id="negrita">N° DE BIEN</td>
					<td width="355" rowspan="1" id="negrita">DESCRIPCION</td>
					<td colspan="2" rowspan="0" id="negrita">INVENTARIO</td>
					<td width="95" rowspan="2" id="negrita">VALOR</td>
					<td width="92" rowspan="2" id="negrita">CONDICION</td>
				</tr>
					<tr align="center" >
						<td colspan="3" border="1" bgcolor="#ccc"  ></td>
						<td border="1"></td>
					
						<td  width="100" id="negrita">CODIGO</td>
						<td width="110" id="negrita">CONCEPTO</td>


					</tr>
			</table>
				</td>
				</tr>
			</table>	
			
		';
         $pdf->WriteHTML($content); //ejecuta el pdf 
    
      $sql="SELECT bn.cod_bien,bn.serial_bien,bn.des_bien,m.nom_marca,bn.modelo,tb.cod_tbien,tb.des_tbien,bn.precio,bn.observacion_bien,bn.fecha_ent, c.nom_cond,p.nom_periodo,prov.des_prov,tmov.cod_tipo_mov,tmov.nom_tipo_mov, mov.nro_document,per.nom_per,us.login FROM bien_nacional as bn INNER JOIN marca as m
         INNER JOIN tipo_bien as tb INNER JOIN condicion as c INNER JOIN detalle_movimiento as dm INNER JOIN movimiento as mov 
         INNER JOIN periodo as p INNER JOIN proveedor as prov INNER JOIN tipo_movimiento as tmov 
         INNER JOIN personal as per INNER JOIN usuario as us INNER JOIN categoria as cat
          WHERE cat.id_categoria='$nom' and mov.status=1 and tmov.id_tipo_mov=1 and tmov.cod_tipo_mov=21 and bn.status=1 and m.id_marca=bn.id_marca and tb.id_tbien=bn.id_tbien  and c.id_cond=bn.id_cond and dm.id_mov=mov.id_mov and dm.id_bien=bn.id_bien and mov.id_periodo=p.id_periodo and prov.id_prov=mov.id_prov and tmov.id_tipo_mov=mov.id_tipo_mov and mov.id_per=per.id_per and mov.id_usuario=us.id_usuario and cat.id_categoria=tb.id_categoria";

	       $rs=$this->ejecuta($sql); //se pinta el reporte la parte del bien nacional row es como tupla luego le cmabio el nombre
             while($row=$this->TraerArreglo($rs)) {
                 		
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
                    $valor=$row['precio'];
                    
                 	$conten='
                 	<table border="1" align="center" style="border-collapse:collapse;margin-left:-5px;margin-top:-1px;"  >
				        <tr align="center">
					       <td width="80">'.$cantidad.'</td>
					       <td width="60">'.$row['cod_tbien'].'</td>
					       <td width="65">'.$row['cod_bien'].'</td>
					       <td width="355" rowspan="1">'.$row['des_bien'].' '.$marca.' '.$modelo.' '.$serial.'</td>
					       <td width="100">'.$row['cod_tipo_mov'].'</td>
                           <td width="110">'.$row['nom_tipo_mov'].'</td>
					       <td width="95" rowspan="2">Bs.'.$valor.'</td>
					       <td width="92" rowspan="2">'.$row['observacion_bien'].'</td>
				        </tr>
					      
			         </table>
                        
                	';
                        
                	
                 	$pdf->WriteHTML($conten);
                 	@$total=$total+$valor;
                }
                     //pinto el footer pie de pagina
                $medio='
                    <table border="1" align="center" class="td-individual"  style="border-collapse:collapse;">
                        <tr>
                            <td width="220" align="center" bgcolor="#dedede" id="negrita" style="color:#000;">C.I.C.P.C</td>
                            <td width="580" align="right">TOTAL</td>
                            <td width="95">Bs. '.@$total.'</td>
                            <td width="90"></td>
                        </tr>
                        <tr>
                        <td colspan="4" align="center" id="negrita">RESPONSABLE DEL PATRIMONIAL PRIMARIO</td>
                        </tr>
                        <tr align="center">
                        <td id="negrita" >CEDULA DE IDENTIDAD</td>
                        <td id="negrita" >NOMBRES Y APELLIDOS</td>
                        <td id="negrita" colspan="2">CARGO</td>
                        </tr>
                        <tr align="center">
                        <td>'.$tupla2['ced_per'].'</td>
                        <td>'.$tupla2['nom_per'].' '.$tupla2['ape_per'].'</td>
                        <td colspan="2">'.$tupla2['nom_car'].'</td>
                        </tr>
                    </table>
                
                ';
            $pdf->WriteHTML($medio);
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