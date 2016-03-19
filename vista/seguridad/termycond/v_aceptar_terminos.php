<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3){ // posee el nivel de administrador
?>

<style type="text/css">

	.div-terminos{
		background-color: #FFF;
		height: 500px;
		width: 100%;
		padding: 10px;
		box-shadow: 0em 0em 12px #ccc;
		overflow: scroll;
		overflow-x:hidden;
	}	

	#cabecera{
		position: relative;
	    top: 2000px;
		display: inline-block;
		border:1px solid  #ccc;
		color:#FFF;
		padding: 10px;
		margin-left: -10px;
		top:-10px;
		font-size: 19px;
		text-align: left;
		width: 102%;
		background-color: #023859;
	}
	.terminos-tour{
		position: relative;
		text-align:justify;
		padding-top: 4px;
		top: -5px;
		max-height: 400px;
		overflow: scroll;
		overflow-x:hidden;
	}
	#negrita{
		font-weight: bold;
	}
	#acepto_terminos{
		margin: 35px 0px 10px 0px;
	}
	#siguiente{
		padding: 9px 15px;
		border-radius: 3px;
		border:1px solid #C4C4C4;
		margin-top: 4px;
	}
	#siguiente{
		background: #023859;
		color: #fff;
	}
	#siguiente:hover{
		cursor: pointer;
		opacity: 0.9;
	}
	.botonera-terminos{
		margin: 20px 20px 0px 0px;
		float: right;
	}
</style>
<span id="cabecera" class"terminos-tour">Términos y Condiciones <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-terminos ayuda-local-frm ayudaguiada-tour"></span></span>
<div class="terminos-tour terminosycondiciones-tour">
	
	<span id="negrita">1.	Necesidad de Registro</strong></span>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;Por regla general, para el acceso al módulo de noticias de la Página Web  no será necesario contar con un usuario. No obstante, la utilización de determinados servicios como la intranet estará condicionada a poseer un usuario previamente registrado por el administrador de la página Web, posteriormente el usuario al momento de ingresar por primera vez al sito  deberá completar los campos del formulario de registro con datos válidos. El usuario registrado deberá verificar que la información que pone a disposición del Sistema de Gestión de Bienes Nacionales del CICPC (ahora en adelante llamado SGBNCICPC) sea exacta, precisa y verdadera, asimismo asumirá el compromiso de actualizar los Datos Personales cada vez que los mismos sufran modificaciones. Los Usuarios Registrados garantizan y responden, en cualquier caso, de la veracidad, exactitud, vigencia y autenticidad de los Datos Personales puestos a disposición del SGBNCICPC.<p>
	<br>
	<span id="negrita">2.	Obligación de mantener actualizados los Datos Personales.</span>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;Los Datos Personales introducidos por todo Usuario en la Página Web, deberán ser exactos, actuales y veraces en todo momento. SGBNCICPC se reserva el derecho de solicitar algún comprobante y/o dato adicional a efectos de corroborar los Datos Personales, y de suspender temporal y/o definitivamente a aquellos Usuarios cuyos datos no hayan podido ser confirmados.<p>
	<br>
	<span id="negrita">3.	Acceso a la cuenta personal y obligación de confidencialidad de la Clave de Seguridad.</span>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;El empleado tendrá acceso a un usuario personal mediante el ingreso de nombre de usuario y clave de seguridad. Esta Clave de Seguridad es personal e intransferible. El Usuario se obliga a mantener en estricta confidencialidad su Clave de Seguridad. El Usuario será, en todo caso, responsable por todo daño, perjuicio, lesión o detrimento que del incumplimiento de esta obligación de confidencialidad se genere por cualquier causa.<p>
	<p>El usuario es personal para el trabajador, único e intransferible, y está prohibido que un mismo Usuario posea más de una Cuenta. El Usuario será responsable por todas las operaciones efectuadas desde su Cuenta, pues el acceso a la misma está restringido al ingreso y uso de su Clave de Seguridad, de conocimiento exclusivo del Usuario y cuya confidencialidad es de su exclusiva responsabilidad. El Usuario se compromete a notificar al SGBNCICPC de forma inmediata y por un medio idóneo, fehaciente, eficiente y eficaz, cualquier uso no autorizado de su Cuenta, así como el ingreso por terceros no autorizados a la misma. Se encuentra prohibida la venta, cesión, transferencia o transmisión de la Cuenta bajo cualquier título, ya sea oneroso o gratuito.
	SGBNCICPC se reserva el derecho de cancelar un usuario previamente registrado, cuando a su sola discreción considere que no se ha dado cumplimiento a la totalidad de las pautas establecidas en los Términos y Condiciones, sin que esté obligado a comunicar o exponer las razones de su decisión y sin que ello genere derecho a indemnización o resarcimiento alguno a favor del Usuario alcanzado por dicha decisión.</p>
	<br>
	<span id="negrita"> 4.	Normas generales de utilización de la Página Web.</span>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;El Usuario se obliga a utilizar la Página Web y todo su contenido y servicios conforme a lo establecido en la ley, la moral, el orden público, los presentes Términos y Condiciones. Asimismo, se obliga a hacer un uso adecuado de los servicios y/o contenidos de la Página Web y a no emplearlos para realizar actividades ilícitas o constitutivas de delito, que atenten contra los derechos del personal y/o personas ajenas a la organización y que infrinjan la regulación sobre propiedad intelectual e industrial, o cualesquiera otras normas del ordenamiento jurídico que puedan resultar aplicables y, en especial, el principio de buena fe que obliga a actuar leal, correcta y honestamente tanto en los tratos preliminares, celebración y ejecución de todo contrato. Como consecuencia de lo anterior, el Usuario se obliga a no difundir, transmitir, introducir y poner a disposición de personal ajeno a la organización, cualquier tipo de material e información (datos, contenidos, mensajes, dibujos, archivos, imagen, fotografías, software, etc.) que sean contrarios a la ley, la moral, el orden público y los presentes Términos y Condiciones de Uso.</p>
</div>
<hr>
<input type="checkbox" name="acepto_terminos" id="acepto_terminos"> He Leído y acepto los Términos y Condiciones.
<form method="POST" name="btn_form" action="" >
	<span class="botonera-terminos">
		<button type="button" class="botoneranuevo-tour" title="Clic para avanzar al siguiente proceso" name="inc" id="siguiente" value="Next" onclick="validarTerminosCheckbox()"><span id="iconos" class="icon-arrow-right2"></span><span>Siguiente</span></button>				
	</span>
</form>
<script type="text/javascript">
	
	function validarTerminosCheckbox(){
		var checkbox = document.getElementById('acepto_terminos');
		if( checkbox.checked ){


			$.ajax({
				type: 'POST',
				url: '../../control/seguridad/c_usuario.php',
				data: ("temp=frm_terminosYCondiciones"),
				success: function(resp){
					if(resp != ""){ // encontro el codigo en la base de datos
						location.href = "?accion=actualizarDatos_PrimeraVes";
					}
				}
			});
		}else{
			LibreriaGenerarModal("Debe de aceptar los términos y condiciones para continuar");
		}
	}

</script>
<!--***************************************************************************************************-->
<?php
	}
	else{ // entro pero este no es el nivel autorizado
		include_once("../../vista/seguridad/v_msj_no_autorizado.php");
	}
}
else{  // trata de entrar sin autenticar
	include_once("../../vista/seguridad/v_msj_identificar.php");
}
?>

