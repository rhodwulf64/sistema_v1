<link rel="stylesheet" type="text/css" href="../../public/style.css">
<table id="btn-home-table">
    <form method="POST" action="../../control/c_reportes/c_Recepcion/c_recep_cat.php" target="_blank" name="envio_form">
<tr>
     <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_recepcion';">
<td colspan="3"><h2>Reporte: Listado Por Categoria</h2></td>    
</tr>
<tr>
<td><label class="Reportes">Categoria: </label>
    <?php
        include_once('../../control/c_reportes/combo_reporte/c_combo_cat.php');
         $combOrg=array();
        $cod_cat="";
        if(isset($_SESSION['cod_cat_tb']))
            $cod_cat=$_SESSION['cod_cat_tb'];
                          
            $cboCat= DibCombCategoria($cod_cat);
                        
            foreach ($cboCat as $elemento) 
            echo $elemento;        
    ?>
</td>

</tr>
<tr>
    <input type="hidden" name="op"/>
<td colspan="2"><input type="button" id="repor" value="Reporte" onclick="envio(this.value)"/></td>        
</tr>
</form>
</table>
<script type="text/javascript">
function envio(v){
    frm=document.envio_form;
    if(frm.cod_cat.selectedIndex==""){
        alert('Debe Ingresar el Nombre de la Categoria')
        frm.cod_cat.style.border="1px solid red";
        frm.cod_cat.focus();
    }else{
    frm.op.value=v;
    frm.submit();
    }
}

</script>
