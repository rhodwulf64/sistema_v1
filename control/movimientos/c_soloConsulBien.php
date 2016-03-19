<?php @session_start();
include_once("../../modelo/movimientos/m_recepcion.php");



if(isset($_POST['temp']) && $_POST['temp'] == "CosulBienCodigo"){

	$obj_recepcion = new clsRecepcion(); //creo mi objeto
	$RS = $obj_recepcion->consultarPorSoloCodigo($_POST['codigo']);

	if( $RS != false ){
		$responsable = "";
		if( $tupla = $obj_recepcion->ConsultarBienParaModalDetalleMov($RS['id_bien']) ){
			

			/* consultar los departamentos y los responssables de los departamentos */
			$tupla2 = $obj_recepcion->traerDeparYRespos($tupla["id_resp_dep"],$tupla["id_dep"]);

			if( $tupla["id_resp_dep"] > 0 ){ 
				$responsable = "Responsable del Departamento: ".$tupla2["perso"];
			}else{
				$responsable = "";
			}

			$tabla = 
			' 	<span class="btn-quitar-modal" title="clic para cerrar la ventana" onclick="ModalCondicionCosultabien()">X</span>
				<span> DATOS DEL BIEN NACIONAL, Tipo: '.$RS['cod_tbien'].'. Código: '.$_POST['codigo'].'. <br> 
					Condición: <span class=""> '.$RS['nom_cond'].'</span>
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
		}
	}else{
		echo '<span class="btn-quitar-modal" title="clic para cerrar la ventana" onclick="ModalCondicionCosultabien()">X</span>';
		echo "<span style='font-size:18px; font-weight:900;'><br><br><br>No se encontró Bien Nacional con el código '".$_POST['codigo']."' </span>";
		echo "<br><br><br><span style='font-size:25px;color:red;' class='icon-cross'></span>";
	}
	

}
?>