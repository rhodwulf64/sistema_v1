<?php @session_start();
include_once('m_conexion.php');
 //****************************COMIENZO DE LA CLASE DEL OBJETO MUNICIPIO**********************//
class clsRecepcion extends clsConexion{
	private $G;
	
	function clsRecepcion(){
		$this->clsConexion();
		$this->G = "";
	}

	function RecibirTodo($POST){
		$this->G = $POST;
	}
	function incluir(){
		$transaccion = false; // inicializo la variable en false
		$this->inicio_trans(); // inicializo la trasaccion
		
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fecha = $obj_fechaHora->ObtenerFechaServer3();
		$hora = $obj_fechaHora->ObtenerHoraServer();
		$fechaDeLlegada = $obj_fechaHora->SubirFechaServer($this->G["f_lL"]); //transformo la fecha a ser legible por la base de datos
			
		/***********************************************/
		/** sql para insertar en la tabla movimiento (cabecera) de la transaccion **/
		$sql = "INSERT INTO movimiento (nro_document,fecha_reg,hora_reg,fecha_mov,id_tipo_mov,id_prov,id_per,id_usuario,id_motivo_mov,id_periodo,id_dep,id_resp_dep,observacion_mov,id_usuario_anulacion,fecha_anulacion,id_motivo_anulacion,status) VALUES('".$this->G["n_D"]."','".$fecha."','".$hora."','".$fechaDeLlegada."','".$this->G["tipo_de_mov"]."','".$this->G["cod_prov"]."','".$this->G["id_personal_recep"]."','".$_SESSION["id_usuario"]."','".$this->G["id_motivo_mov"]."','".$_SESSION['id_periodo_mostrar']."','".$this->G["dep_recep"]."','0','".$this->G["obser_cabecera"]."','','0000-00-00','0','1')";
		$this->ejecuta($sql);

		/* compruebo si inserto en la tabla movimiento*/
		if ( $this->como_va() ){ //pregunto si se realizo la consulta anterior
			
		/* consulto el ultimo id del movimiento para insertar en el bien y luego en el detalle */
		$sql = "SELECT max(id_mov) as max FROM movimiento WHERE status='1' and id_usuario='".$_SESSION['id_usuario']."' and nro_document='".$this->G["n_D"]."' and fecha_reg='".$fecha."'";
		$tupla = $this->ejecuta($sql);
		$dato = $this->converArray($tupla); //ultimo id de la tabla movimiento

		 /* compruebo si encontro el ultimo id */
		 if( $this->como_va() ){

				/* inserto en la tabla bien nacional */
		 		$c = 0; //contador para recorrer las posiciones del vector
		 		foreach($this->G["nro_array"] as $elementos){
		 			/* inserto en la tabla bien nacional */
		 		$sql = "INSERT INTO  bien_nacional (cod_bien,id_tbien,serial_bien,id_marca,modelo,des_bien,id_cond,precio,fecha_ent,status,observacion_bien) VALUES('".$this->G["cod_bien_R_array"][$c]."','".$this->G["tbien_array"][$c]."','".$this->G["serial_bien_recep_array"][$c]."','".$this->G["cod_marca_array"][$c]."','".$this->G["modelo_bien_recep_array"][$c]."','".$this->G["des_bien_recep_array"][$c]."','1','".$this->G["precio_bien_recep_array"][$c]."','".$fechaDeLlegada."','1','".$this->G["obser_bien_array"][$c]."')";
		 		$this->ejecuta($sql);
		 		
				/* compruebo si inserto en la tabla bien nacional */
					if( $this->como_va() ){

						/* consulto el ultimo id del bien nacional para insertar en el detalle */
						$sql = "SELECT max(id_bien) as max FROM bien_nacional WHERE cod_bien='".$this->G["cod_bien_R_array"][$c]."'";
						$tupla2 = $this->ejecuta($sql);
						$dato2 = $this->converArray($tupla2); // ultimo id de la tabla bien nacional

						/* compruebo para ver si en realidad inserto y si me trae la consulta */
						if( $this->como_va() ){

							/* inserto en la tabla detalle del bien nacional */
							$sql = "INSERT INTO detalle_movimiento (id_mov,id_bien,status) VALUES ('".$dato["max"]."','".$dato2["max"]."','1')";
							$this->ejecuta($sql);

							/* verifico si se insertaron datos en la tabla detalle */
							if( $this->como_va() ){
								$transaccion = true;
							}else{
								$transaccion = false;
							}

						}else{
							$transaccion = false;
						}
						
					}else{
						$transaccion = false;
					}
					$c++; // incremento el contador del for
				}//cierre for
			}else{
				$transaccion = false;
			}
		}else{
			$transaccion = false;
		}
		if( $transaccion ){
		 	$this->fin_trans(); // finalizo la transaccion con exito
		 	$Ult_nr_Mov = $dato["max"];
		 	return $Ult_nr_Mov;
		}else{
		 	$this->deshacer_trans(); // finalizo la transaccion fallida 
	 		return false;
		}
	}//fin funcion 
	function ValidarPeriodoAnulacion($id_mov){
		$sql = 
		"	SELECT m.id_periodo 
			FROM movimiento as m
			WHERE m.id_mov=".$id_mov." and m.id_periodo=".$_SESSION["id_periodo_mostrar"]."
		";
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return true;
		}else { return false; }
	}
	function Consultar_Cant_Movimientos(){
		$sql = "SELECT count(id_mov) as cantidad FROM movimiento WHERE id_tipo_mov=1 and status=1";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			$cant = $tupla["cantidad"];
			return $cant;
		}
	}
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
	function ConsulCabRece($idRecep){
		$sql = "SELECT mv.observacion_mov FROM movimiento as mv WHERE id_mov='".$idRecep."'";
		return $this->ejecuta($sql);
	}
	function traerDeparYRespos($idResp,$idDep){
		if( $idResp == "" ){
			$sql = 
			"	SELECT CONCAT('C.I. ',ced_per,' - ',nom_per,' ',ape_per) as perso, dep.nom_dep 
				FROM personal as per INNER JOIN departamento as dep
				WHERE per.id_per='".$idResp."' and dep.id_dep='".$idDep."'
			";
		}else if( $idResp != ""){
			$sql = 
			"	SELECT CONCAT('C.I. ',ced_per,' - ',nom_per,' ',ape_per) as perso, dep.nom_dep 
				FROM personal as per INNER JOIN departamento as dep
				WHERE dep.id_dep='".$idDep."'
			";
		}
		
		$rs = $this->ejecuta($sql);
		$tupla = $this->converArray($rs);
		return $tupla;

	}
	function formatearFecha($fec_Lleg){
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fechaFormateada = $obj_fechaHora->traerFecha2($fec_Lleg); 
		return $fechaFormateada;
	}
	function validarCodigodelBien($codigo){
		$sql = "SELECT cod_bien FROM bien_nacional WHERE cod_bien='".$codigo."' and status='1' ";
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return true;
		}else{ return false; }
	}
	function ConsultarBienParaModalDetalle($cod){
		$sql = "SELECT mov.id_dep,mov.id_resp_dep FROM movimiento as mov WHERE id_mov in (SELECT max(id_mov) FROM detalle_movimiento WHERE id_bien='".$cod."' and status='1') ";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			return $tupla;
		}else{
			return false;
		}
	}
	function consultarPorSoloCodigo($codigo_bien){
		$sql = 
			"	SELECT b_n.id_bien,t_bn.cod_tbien, cond.nom_cond
				FROM bien_nacional as b_n INNER JOIN tipo_bien as t_bn INNER JOIN condicion as cond 
				WHERE cod_bien='".$codigo_bien."' and  b_n.id_tbien=t_bn.id_tbien and b_n.id_cond=cond.id_cond and b_n.status='1'
			";
			
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			return $tupla;
		}else{
			return false;
		}
	}
	function ConsultarBienParaModalDetalleMov($cod){
		$sql = "SELECT mov.id_dep,mov.id_resp_dep FROM movimiento as mov WHERE id_mov in (SELECT max(id_mov) FROM detalle_movimiento WHERE id_bien='".$cod."' and status='1') ";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->converArray($rs);
			return $tupla;
		}else{
			return false;
		}
	}
		
	function consultarBien($id_mov){
		//$sql = "SELECT b_n.id_bien,b_n.cod_bien,b_n.id_tbien,b_n.serial_bien,b_n.id_marca,b_n.modelo,b_n.des_bien,b_n.id_cond,b_n.precio,b_n.fecha_ent,b_n.observacion_bien, FROM bien_nacional as b_n INNER JOIN marca as mar INNER JOIN tipo_bien as tb INNER JOIN condicion as cond";
		//consulto la trazabilidad del bien nacional en la tabla detalle 	

		$sql = 
		"	SELECT b_n.id_bien,b_n.cod_bien,b_n.id_tbien,b_n.serial_bien,b_n.id_marca,b_n.modelo,b_n.des_bien,b_n.id_cond,b_n.precio,b_n.fecha_ent,b_n.observacion_bien,cond.nom_cond, mar.nom_marca,tbien.cod_tbien,tbien.des_tbien
			FROM detalle_movimiento as d_m INNER JOIN bien_nacional as b_n INNER JOIN condicion as cond INNER JOIN marca as mar INNER JOIN tipo_bien as tbien
			WHERE id_mov=$id_mov and d_m.id_bien=b_n.id_bien and mar.id_marca=b_n.id_marca and cond.id_cond=b_n.id_cond and b_n.id_tbien=tbien.id_tbien and d_m.status='1'
		";

		return $this->ejecuta($sql);          
	}
	function consultarTrazabilidadBien($bien){

		$sql = "SELECT count(id_bien) as cantidad FROM `detalle_movimiento` as d_m WHERE d_m.id_bien='".$bien."' and d_m.status='1'";
		$rs = $this->ejecuta($sql);
		$cantidad = $this->converArray($rs);

		if($cantidad['cantidad'] > 1){
			$resultado = true;
		}else{
			$resultado = false;
		}
		
		return $resultado;
	}
	function anularRecepcion($idRecep,$MotAnulacion){
		$transaccion = false; // inicializo la variable en false
		$this->inicio_trans(); // inicializo la trasaccion
		//actualizo el status				
	
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fecha = $obj_fechaHora->ObtenerFechaServer3();
			
		/***********************************************/

		$sql = "UPDATE movimiento SET status='0' WHERE id_mov='".$idRecep."'";
		$this->ejecuta($sql);

		if( $this->como_va() ){
			/* inserto los datos correspondiente de la anulacion en la tabla movimientos */
			$sql = "UPDATE movimiento SET id_usuario_anulacion='".$_SESSION["id_usuario"]."', fecha_anulacion='".$fecha."', id_motivo_anulacion='".$MotAnulacion."' WHERE id_mov='".$idRecep."'";
			$this->ejecuta($sql);

			if( $this->como_va() ){

				/* actulizo el status en la tabla detalle del movimiento */
				$sql = "UPDATE detalle_movimiento SET status='0' WHERE id_mov='".$idRecep."'";
				$this->ejecuta($sql);


				if( $this->como_va() ){

					/* busco en la tabla detalle el id del bien nacional mediante el id de la recepcion para llegar a los bienes pertenecientes en su*/
					$sql = "SELECT id_bien FROM detalle_movimiento WHERE id_mov='".$idRecep."'";
					$rs = $this->ejecuta($sql);
					if( $this->como_va() ){
						/* actualizo en la tabla bien */
						while ( $tupla = $this->converArray($rs) ) {
							$sql = "UPDATE bien_nacional SET status='0' WHERE id_bien ='".$tupla["id_bien"]."'";
							$this->ejecuta($sql);
						}
							
						if( $this->como_va() ){
							$transaccion = true;
						}else{
							$transaccion = false;
						}
						
					}else{
						$transaccion = false;
					}

				}else{
					$transaccion = false;
				}


			}else{
				$transaccion = false;
			}

		}else{
			$transaccion = false;
		}


		if( $transaccion ){
		 	$this->fin_trans(); // finalizo la transaccion con exito
		 	return true;
		}else{
		 	$this->deshacer_trans(); // finalizo la transaccion fallida 
	 		return false;
		}
	}


}//cierre clase

?>