<?php
error_reporting(0);
include_once('m_conexion.php');
	
class ClsGraficoMovFecha extends conex{
	private $datos;
	function ClsGraficoMovFecha(){
		$this->conex();
		$this->datos="";
	}

	function Grafico($POST){
		$this->datos=$POST;
		include_once('../../../public/jpgraph/src/jpgraph.php');
		include_once('../../../public/jpgraph/src/jpgraph_bar.php');
		//include_once('../../../reportes/html2pdf/html2pdf.class.php');
		//$pdf= new HTML2PDF('P','A4','es');
		
		 if(isset($this->datos['fecha1']) &&isset($this->datos['fecha2']) ){
			$fecha1=$this->envio_fecha($this->datos['fecha1']);
			$fecha2=$this->envio_fecha($this->datos['fecha2']);
		$sql="SELECT m.id_mov,tm.nom_tipo_mov,tm.cod_tipo_mov,tm.id_tipo_mov,m.fecha_mov
		FROM movimiento as m INNER JOIN tipo_movimiento as tm ON m.id_tipo_mov=tm.id_tipo_mov
		WHERE m.fecha_mov BETWEEN '".$fecha1."' and '".$fecha2."'";
		//echo $sql;
		$rs=$this->ejecuta($sql);
		}else{
			return false;
		}
		while($tupla=$this->TraerArreglo($rs)){
				if($tupla['cod_tipo_mov']==21 && $tupla['id_tipo_mov']==1){
				$labels[]=utf8_decode("|AS|");
			}else if($tupla['cod_tipo_mov']==21 && $tupla['id_tipo_mov']==2){
				$labels[]=utf8_decode("|RC|");
			}else if($tupla['cod_tipo_mov']==11){
				$labels[]=utf8_decode("|DV|");
			}else{
				$labels[]=utf8_decode("|DS|");
			}
			
			$datos[]=$tupla['id_mov'];
			
		}
		//formato general del grafico
		$obj_graph= new Graph(900,400);
		
		$obj_graph->SetScale("textint");
		//$obj_graph->SetCenter();
		$obj_graph->title->Set('Estadisticas de movimientos por fecha');
		$obj_graph->xaxis->title->Set("Movimientos");
		$obj_graph->xaxis->SetTickLabels($labels);
		$obj_graph->yaxis->title->Set("Numero de Movimientos");
		$obj_graph->SetMarginColor('#fff');
		//formato para el grafico con datos
		$obj_barplot= new BarPlot($datos);
		$obj_barplot->SetFillGradient("#2B3E69","#fff",GRAD_HOR);
		$obj_barplot->SetWidth(50);
		
		
		$obj_graph->Add($obj_barplot);
		//salida al navegador
		
		$obj_graph->Stroke();
	
		
	}
	function envio_fecha($fecha){
        $fecha = substr($fecha,6,4).'-'.substr($fecha, 3,2).'-'.substr($fecha,0,2);
		return $fecha;
    }
}

?>