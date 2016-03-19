<?php
// Clase para el usuario y acceder a los datos del mismo

include_once("m_conexion.php");

class clsSistema extends clsConex{

	function clsSistema(){
		$this->clsConex();
	}

	public function mostrarDatos(){
			$sql = "SELECT s.mision,s.vision,s.logo,s.quienes_somos,s.obj_general,s.obj_especifico,s.abreviatura_sede, se.nom_sed,s.telefono,s.correo,s.direccion,s.rif FROM sistema as s INNER JOIN sede as se WHERE se.id_sed=s.id_sed";
		$tupla = $this->ejecuta($sql);
		return $this->ConverArray($tupla);
	}

	protected function ConverArray($rs){
		return $this->TraerArreglo($rs);
	}

	function ValidarInicioSesionPerfil($id_user){
		$sql = "SELECT id_usuario FROM usuario WHERE id_usuario=".$id_user." and sesion_iniciada=0 ";
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return true;
		}else{
			return false;
		}
	}

}// fin de la clase

?>