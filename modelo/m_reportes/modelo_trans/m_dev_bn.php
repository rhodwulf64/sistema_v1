<?php
session_start();
include_once('m_conexion.php');
class ClsDevolcion extends conex{
	private $datos;
	function ClsDevolucion(){
		$this->conex();
		$this->datos="";
	}
	function buscar($POST){
		$this->datos=$POST;

		// if(isset($this->datos['bien']) && $this->datos['bien']==""){

		// }else if(isset($this->datos['bien']) && $this->datos['bien']!=""){

		// }
		
		$c=1; //contador para llevar el control de lo que venga de la bd 1,2,3,4
		$fecha=date('d/m/Y'); //consulta sql para traer datos que van en la cabecera del reporte
		
		$tupla2=$this->TraerArreglo($rs_header); //$content guardo toda la estructura HTML para el reporte

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
			#tabla-recepcion{

				border-collapse:collapse;
				margin-left:30px;
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
			<p align="center">MINISTERIO DEL PODER POPULAR PARA LA JUSTICIA INTERIOR Y PAZ</p>
			<p align="center">CUERPO DE INVESTIGACIONES CIENTIFICAS PENALES Y CRIMININALISTICAS</p>
			<p align="center">SUB DELEGACIÓN ACARIGUA-PORTUGUESA</p><br>
			<pre style="margin-left:380px;">Fecha de Impresión: '.$fecha.'</pre>
			
			<h4 align="center">Devolución de Bienes Nacionales</h4>
			<p style="color:red;font-weight:bold;">Bienes Nacionales Devueltos</p>
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
        $pdf->WriteHTML($html);
      	
	    while($row=$this->TraerArreglo($rs)){

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
                 	<table border="1" align="center" style="border-collapse:collapse;margin-left:-5px;margin-top:-1px;"  >
				        <tr align="center">
					       <td width="80">'.$cantidad.'</td>
					       <td width="60">'.$row['cod_tbien'].'</td>
					       <td width="65">'.$row['cod_bien'].'</td>
					       <td width="355" rowspan="1">'.$row['des_bien'].' '.$marca.' '.$modelo.''.$serial.'</td>
					       <td width="100">'.$row['cod_tipo_mov'].'</td>
                           <td width="110">'.$row['nom_tipo_mov'].'</td>
					       <td width="95" rowspan="2">Bs.'.$row['precio'].'</td>
					       <td width="92" rowspan="2">'.$row['observacion_bien'].'</td>
				        </tr>

			         </table>

                	';


                 $pdf->WriteHTML($html);
               @$valor+=$row['precio'];
                }
                //if(isset($valor)){
	       	    //pinto el footer pie de pagina
                $html='
                    <table border="1" align="center" class="td-individual"  style="border-collapse:collapse;">
                        <tr>
                            <td width="220" align="center" bgcolor="#dedede" id="negrita" style="color:#000;">C.I.C.P.C</td>
                            <td width="580" align="right">TOTAL</td>
                            <td width="95">Bs. '.@$valor.'</td>
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
            	$pdf->WriteHTML($html);
            // }else{
            // 	echo "<script>alert('NO HAY ASIGNACIONES POR ESTE NRO ASIGNACION')</script>";
            // 	return false;
            // }
		$pie="
		<style>
		*{
			font-family:Arial;

			line-height:1px;
			//border:1px solid red;

		}
		.pie{
			//border:1px solid red;
			width:1090px;
			position:absolute;
			bottom:0;
			top:-1px;
			}
		</style>
			<div class='pie'>
		<p align='right'>pagina [[page_cu]]/[[page_nb]]</p>
		<img align='right' style='width:90px;margin-top:2px;' src='../../../public/img/code_car.jpg'/>

		<p>Gerenerado por: ".$_SESSION['nom'].' '.$_SESSION['ape']."</p>
		<p>Derechos Reservados CICPC Sub Delegacion Acarigua</p>
		</div>


		";

		$pdf->WriteHTML($pie); //ejecuta el html

		$pdf->Output(); //salida al navegador del pdf

	}
}

?>