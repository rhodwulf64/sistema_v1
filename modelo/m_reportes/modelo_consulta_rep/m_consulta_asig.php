<?php
include_once('../../modelo/configuracion/m_conexion.php');
class clsConsultaAsig extends clsConex{
    function clsConsultaAsig(){
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