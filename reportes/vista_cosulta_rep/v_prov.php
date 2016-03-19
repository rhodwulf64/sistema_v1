<link rel="stylesheet" type="text/css" href="../../public/style.css">
    <form method="POST" action="../../control/c_reportes/c_Recepcion/c_recep_prov.php" target="_blank" name="envio_form">
<table id="btn-home-table">
<tr>

<td colspan="3"><h2>Reporte: Recepciones por Proveedor</h2></td>
</tr>
<tr>
    <input type="button" name="btnSalir" id="btnSalir" value="Volver" onclick="location.href='?accion=r_recepcion';">
<td id="r-paddig"><label class="Reportes">Proveedor:</label>
        <?php
                include_once('../../control/c_reportes/combo_reporte/c_prov.php');
                $cboProv = array();
                $cod_cat = "";
                if(isset($_SESSION['id_prov_recep']))
                    $cod_p = $_SESSION['id_prov_recep'];
                else
                    $cod_p = "";

                $cboProv = DibCombProveedor($cod_p);

                foreach ($cboProv as $elemento)
                    echo $elemento;
            ?>
</td>

</tr>
<tr>
    <input type="hidden" name="op"/>
<td colspan="2"><input type="button" id="repor" value="Reporte" onclick="envio(this.value)"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function envio(v){
    frm=document.envio_form;
    if(frm.cod_prov.selectedIndex==""){
        alert('Debe Ingresar la Descripcion del Proveedor');
        frm.cod_prov.style.border="1px solid red";
        frm.cod_prov.focus();
    }else{
        frm.op.value=v;
        frm.submit();
    }

}

</script>

<?php
@session_start();
?>
<script>
var //volver="<?php echo $_SESSION['res2']; ?>";
if(volver){
    alert('epa no esta');
}
</script>
