<?php
include_once('../../modelo/configuracion/m_conexion.php');
class clsConsultaRecep extends clsConex{
    function clsConsultaRecep(){
        $this->clsConex();
    }
    function consultar(){
        $sql="SELECT *FROM reporte";
       return  $this->ejecuta($sql);
    }
    function converArray($rs){
        return $this->TraerArreglo($rs);
    }
}
?>