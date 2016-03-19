<?php
@session_start();
include_once('m_conexion.php');

class ClsSistema extends clsConexion{
	private $datos;
	function ClsSistema(){
		$this->clsConexion();
		$this->datos="";
	}

	function sistema($POST){
		$this->datos=$POST;
		if(isset($this->datos['qs']) && $this->datos['qs']!=""){
			$sql="UPDATE sistema SET quienes_somos='".$this->datos['qs']."' WHERE id_usuario='".$_SESSION['id_usuario']."' ";
			$this->ejecuta($sql);
		}else if(isset($this->datos['mis']) && $this->datos['mis']!=""){
			$sql="UPDATE sistema SET mision='".$this->datos['mis']."' WHERE id_usuario='".$_SESSION['id_usuario']."' ";
			$this->ejecuta($sql);
		}else if(isset($this->datos['vis']) && $this->datos['vis']!=""){
			$sql="UPDATE sistema SET vision='".$this->datos['vis']."' WHERE id_usuario='".$_SESSION['id_usuario']."' ";
			$this->ejecuta($sql);
		}else if(isset($this->datos['d_obG']) && $this->datos['d_obG']!="" && isset($this->datos['d_obE']) && $this->datos['d_obE']!=""){
			$sql="UPDATE sistema SET obj_general='".$this->datos['d_obG']."', obj_especifico='".$this->datos['d_obE']."' WHERE id_usuario='".$_SESSION['id_usuario']."' ";
			$this->ejecuta($sql);
		}else if(isset($this->datos['tele']) && $this->datos['tele']!="" && isset($this->datos['corre']) && $this->datos['corre']!="" && isset($this->datos['dir']) && $this->datos['dir']!="" && isset($this->datos['rif_des']) && $this->datos['rif_des']!=""){
			$sql="UPDATE sistema SET telefono='".$this->datos['tele']."', correo='".$this->datos['corre']."', direccion='".$this->datos['dir']."', rif='".$this->datos['rif_des']."' WHERE id_usuario='".$_SESSION['id_usuario']."' ";
			//echo $sql;
			$this->ejecuta($sql);
		}else if(isset($this->datos['cod']) && $this->datos['cod']!="" && isset($this->datos['abrev']) && $this->datos['abrev']!=""){
			$sql="UPDATE sistema SET id_sed='".$this->datos['cod']."', abreviatura_sede='".$this->datos['abrev']."' WHERE id_usuario='".$_SESSION['id_usuario']."' ";
			//echo $sql;
			$this->ejecuta($sql);
		}
	}

	function consulta(){
		$sql="SELECT *FROM sistema";
		$rs = $this->ejecuta($sql);
		
		$tupla=$this->TraerArreglo($rs);
		
	}
}
?>
