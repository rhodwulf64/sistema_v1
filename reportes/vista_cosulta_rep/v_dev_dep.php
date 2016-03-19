<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_devolucion/c_dev_dep.php" target="_blank" name="envio_form">
<tr>
        <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_devolucion';">

<td colspan="3"><h2>Reporte: Listado  de Devoluciones por Departamento</h2></td>    
</tr>
<tr>
<td> <label class="Reportes">Departamento:</label>
<?php
  include_once('../../control/c_reportes/combo_reporte/c_combo_dep.php');
    $ArrayDep = array();
      $combDep = "";
    if(isset($_SESSION['cod_dep_p'])){
      $combDep=$_SESSION['cod_dep_p'];
    }
    $ArrayDep=DibCombtDepartamento($combDep);

    foreach ($ArrayDep as $elemento){
      echo $elemento;
    }
  ?>
</td>
</tr>
<tr>
<input type="hidden" name="temp"/>
<td colspan="2"><input type="button" id="repor" value="Reporte" onclick="envio(this.value)"/></td>        
</tr>
</form>
</table>
<script type="text/javascript">
function envio(valor){
    frm=document.envio_form;
    frm.temp.value=valor;
    frm.submit();
}

</script>