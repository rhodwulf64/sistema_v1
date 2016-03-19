<?php @session_start();
include_once("../../modelo/movimientos/m_recepcion.php");

//$sql = "SELECT mov.id_dep,mov.id_resp_dep FROM movimiento as mov WHERE id_mov in (SELECT max(id_mov) FROM detalle_movimiento WHERE id_bien=21) and status='1'";


if(isset($_POST['temp']) && $_POST['temp'] == "si"){

	$obj_recepcion = new clsRecepcion(); //creo mi objeto


	$responsable = "";
	if( $tupla = $obj_recepcion->ConsultarBienParaModalDetalle($_POST['codigo']) ){
		

		/* consultar los departamentos y los responssables de los departamentos */
		$tupla2 = $obj_recepcion->traerDeparYRespos($tupla["id_resp_dep"],$tupla["id_dep"]);

		if( $tupla["id_resp_dep"] > 0 ){ 
			$responsable = "Responsable del Departamento: ".$tupla2["perso"];
		}else{
			$responsable = "";
		}

		if($_POST['condicion'] == "DISP"){ 
			$ClaseCond= "DISP";
			$descripCond = "Disponible";
		}else if($_POST['condicion'] == "ASIG" ){ 
			$ClaseCond= "ASIG";
			$descripCond = "Asignado";
		}else{	
		 	$ClaseCond= "DESI";
		 	$descripCond = "Desincorporado";
		}



		$tabla = 
		' 	<span class="btn-quitar-modal" title="clic para cerrar la ventana" onclick="ModalCondicion()">X</span>

			<span> DATOS DEL BIEN NACIONAL, Tipo: '.$_POST['tbien'].'. Código: '.$_POST['trueCod'].'. <br> 
				Condición: <span class=""> '.$descripCond.'</span>
			</span> <br><br>

			<table>
				<caption>Ubicación Actual y/o Responsable Encargado.</caption>
				<tr>
					<td> 
						<span id="contenido-bien-Modal-detalle">
							Departamento Actual: '.$tupla2["nom_dep"].'<br>
							'.$responsable.'
						</span>
					</td>
				</tr>
			</table>
		';

		echo $tabla; //el codigo ya esta en la base de datos
	}else{
		echo "fallo";
	}

	

	//echo $_POST['codigo'];

	/*

	if( $tabla ){
		echo $tabla;
	}else{
		echo "fatal error ...";
	}*/
}
?>


			
		