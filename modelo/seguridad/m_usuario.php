<?php
// Clase para el usuario y acceder a los datos del mismo

include_once("m_conexion.php");

class usuario extends clsConexion{
	private $log_usu;
	private $pas_usu;
	private $id_usu;
	function __construct(){
		$this->clsConexion(); // se llama al contructor del padre
		$this->log_usu = "";
		$this->pas_usu = "";
		$this->ced  = "";
		$this->nom  = "";
		$this->ape  = "";
		$this->ema  = "";
		$this->telf = "";
		$this->id = "";
		$this->id_per = "";
	}

	function recibirTodos($POST){
		$this->G = $POST;
	}
	function recibirIdents($i){
		$this->id = $i;
	}
	function recibirUsuarioPerfil($id,$idf){
		$this->id = $id;
		$this->id_per = $idf;
	}
	function recibirCedPerf($id_pe,$ce,$i){
		$this->id_per = $id_pe;
		$this->ced = $ce;
		$this->id = $i;
	}
	function idUserIdPer($i,$id_pe,$id_pf){
		$this->id = $i;
		$this->id_per = $id_pe;
		$this->id_perf = $id_pf;
	}
	function recibirModClave($i,$pas,$pasn){
		$this->id = $i;
		$this->pass = $pas;
		$this->passn = $pasn;
	}
	function idPOST($i,$POST){
		$this->id = $i;
		$this->G = $POST;
	}
	function recibir($ci,$no,$ap,$em,$te,$ni,$lo,$pa,$ul) // pasa de parametros todos los datos a cada propiedad de la clase
	{
		$this->ced  = htmlentities(trim($ci));
		$this->nom  = htmlentities(trim($no));
		$this->ape  = htmlentities(trim($ap));
		$this->ema  = htmlentities(trim($em));
		$this->telf = htmlentities(trim($te));
		$this->niv  = htmlentities(trim($ni));
		$this->log_usu = htmlentities(trim($lo));
		$this->pas_usu = htmlentities(trim($pa));
		$this->ultimo = htmlentities(trim($ul));
	}
	function recibirMod($id,$ci,$no,$ap,$em,$te,$ni){
		$this->id = $id;
		$this->ced  = htmlentities(trim($ci));
		$this->nom  = htmlentities(trim($no));
		$this->ape  = htmlentities(trim($ap));
		$this->ema  = htmlentities(trim($em));
		$this->telf = htmlentities(trim($te));
		$this->niv  = htmlentities(trim($ni));
	}
	function recibirModConPass($id,$ci,$no,$ap,$em,$te,$ni,$p1){
		$this->id = $id;
		$this->ced  = htmlentities(trim($ci));
		$this->nom  = htmlentities(trim($no));
		$this->ape  = htmlentities(trim($ap));
		$this->ema  = htmlentities(trim($em));
		$this->telf = htmlentities(trim($te));
		$this->niv  = htmlentities(trim($ni));
		$this->pass_usu  = htmlentities(trim($p1));
	}
	function recibirCed($ci) // pasa de parametro el login del usuario
	{
		$this->ced= htmlentities(trim($ci));
	}
	
	function incluir(){
		$clave = password_hash( $this->ced , PASSWORD_BCRYPT); // encripta la clave 
		// $dir_Mac = $this->returnMacAddress();
		// $dir_Ip = $this->sacarDirIp();
		$sql = "INSERT INTO usuario (login,pass,pass_anterior,intentos,intentos_preg1,intentos_preg2,fecha_creacion,hora_logeo,fecha_logeo,id_perfil,id_per,sesion_iniciada,status_user) values ('$this->ced','$clave','$clave','0','0','0','".date("Y-n-j")."','".date("H:i:s")."','".date("Y-n-j")."','$this->id','$this->id_per','0','1')";
		$this->ejecuta($sql);

		$sql = "SELECT max(id_usuario) as max from usuario";
		$tupla = $this->ejecuta($sql);
		$dato = $this->arreglo($tupla);

		$sql = "INSERT INTO status (motivo,id_usuario,status) VALUES ('NUEVO','".$dato["max"]."','N')";
		$this->ejecuta($sql);
	}

	function LimpiarPreguntasSecurity1($id){
		$sql = 
		"	UPDATE usuario SET intentos_preg1=0 WHERE id_usuario=".$id."
 		";
 		$this->ejecuta($sql);
	}
	function LimpiarPreguntasSecurity2($id){
		$sql = 
		"	UPDATE usuario SET intentos_preg2=0 WHERE id_usuario=".$id."
 		";
 		$this->ejecuta($sql);
	}
	function obj_usrIndex(){
		$sql = "SELECT id_usuario FROM usuario WHERE login=".$this->G." ";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->arreglo($rs);
			return $tupla; 
		}else{
			return false;
		}
	}
	function ValidarInsercionBloqueo($id){
		$sql = "SELECT est.status FROM status as est WHERE est.status='B' and id_usuario=".$id."";
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return true;
		}else{ return false; }
	}
	function insertarIntentosSeguridad1($id){
		$sql = "UPDATE usuario SET intentos_preg1=intentos_preg1+1 WHERE id_usuario='".$id."'";
		$this->ejecuta($sql);
		$sql2 = "SELECT u.intentos_preg1 from usuario as u WHERE u.id_usuario='".$id."'";
		$rs = $this->ejecuta($sql2);
		$tupla = $this->arreglo( $rs );
		return $tupla;
	}
	function insertarIntentosSeguridad2($id){
		$sql = "UPDATE usuario SET intentos_preg2=intentos_preg2+1 WHERE id_usuario='".$id."'";
		$this->ejecuta($sql);
		$sql2 = "SELECT u.intentos_preg2 from usuario as u WHERE u.id_usuario='".$id."'";
		$rs = $this->ejecuta($sql2);
		$tupla = $this->arreglo( $rs );
		return $tupla;
	}
	function validarRespuesta1($idUser){
		$sql = 
		"	SELECT ps.resp1 
			FROM preguntaSeguridad as ps
			WHERE id_usuario=".$idUser." 
		";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->arreglo($rs);

			if ( password_verify( $this->G, $tupla['resp1'] ) ){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function validarRespuesta2($idUser){
		$sql = 
		"	SELECT ps.resp2
			FROM preguntaSeguridad as ps
			WHERE id_usuario=".$idUser." 
		";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->arreglo($rs);

			if ( password_verify( $this->G, $tupla['resp2'] ) ){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function buscarPrimeraSecurity($idUser,$login){
		$sql = 
		"	SELECT ps.preg1,ps.preg2, per.nom_per, per.ape_per
			FROM preguntaSeguridad as ps, personal as per 
			WHERE ps.id_usuario=".$idUser." and per.ced_per=".$login."
		";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->arreglo($rs);
			return $tupla; 
		}else{
			return false;
		}
	}
	function modificar(){
		$sql = "UPDATE usuario SET id_perfil='$this->id_per' WHERE id_usuario='$this->id'";
		$this->ejecuta($sql);
	}
	function consultarPorIdents(){
		$sql = "SELECT * FROM personal WHERE id_per='$this->id'";
		return $this->ejecuta($sql);
	}
	function consultarPeriodo(){
		$sql = "SELECT nom_periodo,id_periodo FROM periodo WHERE status='2'";
		$rs = $this->ejecuta($sql);
		if( $this->como_va() ){
			$tupla = $this->arreglo($rs);
			return $tupla; 
		}else{
			return false;
		}
	}

	function consultarSesionIniciada($id_user){
		$sql = "SELECT id_usuario FROM usuario WHERE id_usuario=".$id_user." and sesion_iniciada=0 ";
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return false;
		}else{
			return true;
		}
	}

	function UpdateSessionIniciada($id_user){
		$sql = "UPDATE usuario SET sesion_iniciada=1 WHERE id_usuario=".$id_user."";
		$this->ejecuta($sql);
	}

	function UpdateSessionIniciadaSalir($id_user){
		$sql = "UPDATE usuario SET sesion_iniciada=0 WHERE id_usuario=".$id_user."";
		$this->ejecuta($sql);
	}
	function InsertBitacAccess($id_user){
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fecha = $obj_fechaHora->ObtenerFechaServer3();
		$hora = $obj_fechaHora->ObtenerHoraServer();
		/***********************************************/

		/***** navegador web, version y plataforma *****/
		$funcionBrowser = $this->obtenerNavegadorWeb();
		$navegador = $funcionBrowser['nombre']; //Nombre del Navegador en Uso
		//$version= $funcionBrowser['version']; //Version
		$plataforma = $funcionBrowser['platforma']; //Plataforma
		/***********************************************/

		/**** sacar direccion ip ****/
		$ip = $this->sacarDirIp();
		/*** sacar direccion mac ****/
		$mac = $this->returnMacAddress();
		/*** proveedor de servicio ****/
		$ProveServicio = gethostbyaddr($ip);

		$sql = "INSERT INTO sesionuser (id_usuario,dir_ip,dir_mac,fecha_inicio,hora_inicio,fecha_fin,hora_fin,nom_pc,nom_remoto,so,navegador) VALUES ('".$id_user."','".$ip."','".$mac."','".$fecha."','".$hora."','0000-00-00','00:00:00','".$ProveServicio."','".gethostname()."','".$plataforma."','".$navegador."')";
		$this->ejecuta($sql);
	}
	function UpdateFechaHoraCierreSession($id_user){
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fecha = $obj_fechaHora->ObtenerFechaServer3();
		$hora = $obj_fechaHora->ObtenerHoraServer();
		/***********************************************/
		$sql = "UPDATE sesionuser set fecha_fin='".$fecha."',hora_fin='".$hora."' WHERE  id_usuario=".$id_user."";
		$this->ejecuta($sql);
	}
	function validarClaveIntranet($clave){
		$sql = "";
	}
	function consultarPorIdentsUser(){
		$sql = "SELECT u.id_usuario,u.login,u.id_perfil,u.id_per,u.status_user,p.nom_per,p.ape_per FROM usuario as u INNER JOIN personal as p ON u.id_usuario='$this->id' and p.id_per=u.id_per";
		return $this->ejecuta($sql);
	}
	function consulta() // busca a un usuario 
	{	
		$sql = "SELECT s.login,s.id_usuario,s.id_per,s.id_perfil,s.pass,s.status_user,p.nom_perfil from usuario as s INNER JOIN perfil as p where s.login = '$this->ced' and p.idperfil=s.id_perfil";
		$tupla = $this->ejecuta($sql);
		if ( $this->como_va() )
			return $tupla; // lo encontro y se tienen datos
		else
			return false; // no se encontro
	}
	function arreglo($rs) // convierte un record set en un arreglo
	{	
		return $this->TraerArreglo($rs);
	}
	function busca_persona( $id ) // busca los datos de una persona
	{	
		$sql = "select * from personal where id_per = '".$id."'";
		$tupla =  $this->ejecuta($sql);
		if ($tupla)
			return $this->arreglo( $tupla );
		return false;
	}
	function UPDATEPRIMERAVEZ(){
		$resp1 = password_hash( $this->G["resp1"] , PASSWORD_BCRYPT); 
		$resp2 = password_hash( $this->G["resp2"] , PASSWORD_BCRYPT);
		$clave = password_hash( $this->G["clave"] , PASSWORD_BCRYPT); 
		$clave3= password_hash($_SESSION['cedula_login'] ,PASSWORD_BCRYPT);
		//$_SESSION['id_usuario'] id_usuario
		//$_SESSION['cedula_login'] login
		$sql = "UPDATE usuario SET  pass='".$clave."',pass_anterior='".$clave3."' WHERE id_usuario='".$_SESSION['id_usuario']."'";
		//echo $sql;
		$this->ejecuta($sql);

		$sql = "UPDATE status SET motivo='DISPONIBLE',status='D' WHERE id_usuario='".$_SESSION['id_usuario']."'";
		//echo $sql;
		$this->ejecuta($sql);

		$sql = "INSERT INTO preguntaSeguridad (preg1,resp1,preg2,resp2,id_usuario) values ('".$this->G["preg1"]."','".$resp1."','".$this->G["preg2"]."','".$resp2."','".$_SESSION['id_usuario']."')";
		//echo $sql;
		$this->ejecuta($sql);
	}
	function modificarCorreo(){
		$sql = "UPDATE personal SET email_per='".$this->G["correo_elect"]."' WHERE id_per='$this->id'";
		return $this->ejecuta($sql);
	}
	function modificarTelefono(){
		$sql = "UPDATE personal SET tlf_per='".$this->G["telefono_ed"]."' WHERE id_per='$this->id'";
		return $this->ejecuta($sql);
	}
	function cosultarPersonas(){
		$sql = "SELECT p.id_per,p.ced_per,p.nom_per,p.ape_per FROM personal as p WHERE id_per not in (select id_per from usuario) and status='1'";
		$tupla =  $this->ejecuta($sql);
		if ($tupla)
			return $tupla;
		return false;
	}
	function cosultarUsuariosBloqueados(){
		$sql = "SELECT u.id_usuario,u.login,u.id_perfil,u.id_per,p.nom_per,p.ape_per,pf.nom_perfil,s.status,s.motivo,s.id_status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as pf INNER JOIN status as s ON u.id_per=p.id_per and u.id_perfil=pf.idperfil and u.id_usuario=s.id_usuario and s.status='B'";
		return $this->ejecuta($sql);
	}
	function cosultarUsuariosActivos(){
		$sql = "SELECT u.id_usuario,u.login,u.id_perfil,u.id_per,u.status_user,p.nom_per,p.ape_per,pf.nom_perfil,s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as pf INNER JOIN status as s ON u.id_per=p.id_per and u.id_perfil=pf.idperfil and u.id_usuario=s.id_usuario and u.status_user='1' and s.status='D'";
		return $this->ejecuta($sql);
	}
	function consultarUsuariosActivosBloq(){
		$sql = "SELECT u.id_usuario,u.login,u.id_perfil,u.id_per,u.status_user,p.nom_per,p.ape_per,pf.nom_perfil,s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as pf INNER JOIN status as s ON u.id_per=p.id_per WHERE u.id_perfil=pf.idperfil and u.id_usuario=s.id_usuario and u.status_user='1' and s.status='D' and s.motivo='DISPONIBLE'
				UNION
				SELECT u.id_usuario,u.login,u.id_perfil,u.id_per,u.status_user,p.nom_per,p.ape_per,pf.nom_perfil,s.status FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as pf INNER JOIN status as s ON u.id_per=p.id_per WHERE u.id_perfil=pf.idperfil and u.id_usuario=s.id_usuario and u.status_user='1' and s.status='N' and s.motivo='NUEVO' ";
				//echo $sql;
		return $this->ejecuta($sql);
	}
	function cosultarUsuarios(){
		$sql = "SELECT u.fecha_creacion,u.id_usuario,u.login,u.id_perfil,u.id_per,u.status_user,p.nom_per,p.ape_per,pf.nom_perfil FROM usuario as u INNER JOIN personal as p INNER JOIN perfil as pf ON u.id_per=p.id_per and u.id_perfil=pf.idperfil";
		return $this->ejecuta($sql);
	}
	function activar(){
		$sql="UPDATE usuario SET status_user='1' WHERE id_usuario='$this->id'";
		$this->ejecuta($sql);
	}
	function desactivar(){
		$sql = "UPDATE usuario SET status_user='0' WHERE id_usuario='$this->id'";
		$this->ejecuta($sql);
	}
	function BloquearUsr($motivo){
		$sql = "UPDATE status SET motivo='$motivo', status='B' WHERE id_usuario='$this->id'";
		$this->ejecuta($sql);
	}
	function DesbloquearUsr(){
		$sql = "UPDATE status SET motivo='DISPONIBLE',status='D' WHERE id_usuario='$this->id'";
		$this->ejecuta($sql);
	}
	function consultSoloClave(){
		$sql = "SELECT usuario.pass FROM usuario WHERE id_usuario='$this->id'";
		return $this->ejecuta($sql);
	}
	function consultSoloClave2($id){
		$sql = "SELECT usuario.pass FROM usuario WHERE id_usuario=".$id."";
		return $this->ejecuta($sql);
	}
	function consultarClave(){
		$sql = "SELECT u.login, u.pass, u.pass_anterior FROM usuario as u WHERE id_usuario='$this->id'";
		//echo $sql;
		return $this->ejecuta($sql);
	}
	function consultarSoloPreguntas($id2){
		$sql = "SELECT ps.preg1, ps.preg2 FROM preguntaSeguridad as ps WHERE id_usuario='$id2'";
		return $this->ejecuta($sql);
	}
	function modificarPreguntas(){
		$sql = "SELECT ps.preg1, ps.resp1, ps.preg2, ps.resp2 FROM preguntaSeguridad as ps WHERE id_usuario='$this->id'";
		$rs = $this->ejecuta($sql);

		$resp1 = password_hash( $this->G["resp1"] , PASSWORD_BCRYPT); 
		$resp2 = password_hash( $this->G["resp2"] , PASSWORD_BCRYPT); 

		if ( $this->como_va() ){ // si se encontro actualizo
			$sql = "UPDATE preguntaSeguridad SET preg1='".$this->G["preg1"]."',resp1='".$resp1."',preg2='".$this->G["preg2"]."',resp2='".$resp2."' WHERE id_usuario='$this->id'";
			$this->ejecuta($sql);
		}else{ // si no se encontro inserto
			$sql = "INSERT INTO preguntaSeguridad (preg1,resp1,preg2,resp2,id_usuario) VALUES ('".$this->G["preg1"]."','".$resp1."','".$this->G["preg2"]."','".$resp2."','$this->id')";
			$this->ejecuta($sql);
		}  
	}
	function modificarClave(){
		$Nclave = password_hash( $this->passn , PASSWORD_BCRYPT);
		$claveAnterior = password_hash( $this->pass , PASSWORD_BCRYPT);
		$sql = "UPDATE usuario SET pass='$Nclave',pass_anterior='$claveAnterior' WHERE id_usuario='$this->id'";
		$this->ejecuta($sql);
	}
	function ReseteroIntentosPreguntas($id){
		$sql = 
		"	UPDATE usuario SET intentos_preg1=0, intentos_preg2=0, intentos=0 WHERE id_usuario=".$id."
 		";
 		$this->ejecuta($sql);
	}
	function registrarUltimaVisita($id){
		/***** TRAER HORA Y FECHA DE BASE DE DATOS ****/
		include_once('sacarHoraFechaServer.php');
		$obj_fechaHora = new clsFechaHora();
		$fecha = $obj_fechaHora->ObtenerFechaServer3();
		$hora = $obj_fechaHora->ObtenerHoraServer();
		/***********************************************/
		$sql = "UPDATE usuario SET intentos='0',hora_logeo='".$hora."',fecha_logeo='".$fecha."' WHERE id_usuario='".$id."'";
		$this->ejecuta($sql);
	}
	function traerUltimaVisita($id_usr){
		// antes de ejecutar la funcion de arriba, traer la fecha y hora de la ultima visita
		$sql = "SELECT u.hora_logeo,u.fecha_logeo FROM usuario as u WHERE id_usuario='".$id_usr."'";
		$tupla =  $this->ejecuta($sql);
		if ($tupla)
			return $this->arreglo( $tupla );
		return false;
	}
	function TraerFechaDeBD($fecha){
		$fec = substr($fecha,8,2)."-".substr($fecha,5,2)."-".substr($fecha,0,4);
		return $fec;
	}
	function insertarIntentos($id){
		$sql = "UPDATE usuario SET intentos=intentos+1 WHERE id_usuario='".$id."'";
		$this->ejecuta($sql);
		$sql = "SELECT u.intentos from usuario as u WHERE id_usuario='".$id."'";
		$rs = $this->ejecuta($sql);
		return $this->arreglo( $rs );
	}
	function busca_en_status($id){
		$sql = "SELECT s.status from status as s WHERE id_usuario='".$id."'";
		return $this->ejecuta($sql);
	}
	function BloquearUsuario($causa,$id){
		$sql = "UPDATE status SET motivo='".$causa."',status='B' WHERE id_usuario='".$id."'";
		$this->ejecuta($sql);
	}
	function validarClave_user($code){
		//$cambio=$password_verify($code,);
		/*$sql = "SELECT pass FROM usuario WHERE pass='".$cambio."' and status_user='1' AND id_usuario='".$_SESSION['id_usuario']."'";
		echo $sql;
		$this->ejecuta($sql);
		if( $this->como_va() ){
			return true;
		}else{ return false; }*/
	}

	function returnMacAddress() {
       // This code is under the GNU Public Licence
       // Written by michael_stankiewicz {don't spam} at yahoo {no spam} dot com
       // Tested only on linux, please report bugs

       // WARNING: the commands 'which' and 'arp' should be executable
      // by the apache user; on most linux boxes the default configuration
      // should work fine

       // Get the arp executable path
        $location = `which arp`;
       // Execute the arp command and store the output in $arpTable
       $arpTable = `arp -a`;
       // Split the output so every line is an entry of the $arpSplitted array
       $arpSplitted = explode("\\n",$arpTable);
       // Get the remote ip address (the ip address of the client, the browser)
       $remoteIp = getenv('REMOTE_ADDR');
       // Cicle the array to find the match with the remote ip address
       foreach ($arpSplitted as $value) {
         // Split every arp line, this is done in case the format of the arp
         // command output is a bit different than expected
          $valueSplitted = explode(" ",$value);
          foreach ($valueSplitted as $spLine) {
           if (preg_match("/$remoteIp/",$spLine)) {
                $ipFound = true;
          }
        // The ip address has been found, now rescan all the string
        // to get the mac address
        if (isset($ipFound)) {
               // Rescan all the string, in case the mac address, in the string
               // returned by arp, comes before the ip address
               // (you know, Murphy's laws)
           reset($valueSplitted);
           foreach ($valueSplitted as $spLine) {
                 if (preg_match("/[0-9a-f][0-9a-f][:-]".
                     "[0-9a-f][0-9a-f][:-]".
                     "[0-9a-f][0-9a-f][:-]".
                    "[0-9a-f][0-9a-f][:-]".
                    "[0-9a-f][0-9a-f][:-]".
                  "[0-9a-f][0-9a-f]/i",$spLine)) {
                     return $spLine;
                  }
              }
         }
        	$ipFound = false;
       }
       }
      return false;
    } // fin MAC

    function sacarDirIp(){
    	/*if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
			
		return $_SERVER['REMOTE_ADDR'];*/
		if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            return $_SERVER["REMOTE_ADDR"];
        }
	}

function obtenerNavegadorWeb()
{
$agente = $_SERVER['HTTP_USER_AGENT'];
$navegador = 'Unknown';
$platforma = 'Unknown';
$version= "";

//Obtenemos la Plataforma
if (preg_match('/linux/i', $agente)) {
$platforma = 'linux';
}
elseif (preg_match('/macintosh|mac os x/i', $agente)) {
$platforma = 'mac';
}
elseif (preg_match('/windows|win32/i', $agente)) {
$platforma = 'windows';
}

//Obtener el UserAgente
if(preg_match('/MSIE/i',$agente) && !preg_match('/Opera/i',$agente))
{
$navegador = 'Internet Explorer';
$navegador_corto = "MSIE";
}
elseif(preg_match('/Firefox/i',$agente))
{
$navegador = 'Mozilla Firefox';
$navegador_corto = "Firefox";
}
elseif(preg_match('/Chrome/i',$agente))
{
$navegador = 'Google Chrome';
$navegador_corto = "Chrome";
}
elseif(preg_match('/Safari/i',$agente))
{
$navegador = 'Apple Safari';
$navegador_corto = "Safari";
}
elseif(preg_match('/Opera/i',$agente))
{
$navegador = 'Opera';
$navegador_corto = "Opera";
}
elseif(preg_match('/Netscape/i',$agente))
{
$navegador = 'Netscape';
$navegador_corto = "Netscape";
}

// Obtenemos la Version
$known = array('Version', $navegador_corto, 'other');
$pattern = '#(?' . join('|', $known) .
')[/ ]+(?[0-9.|a-zA-Z.]*)#';
if (!preg_match_all($pattern, $agente, $matches)) {
//No se obtiene la version simplemente continua
}

$i = count($matches['browser']);
if ($i != 1) {
if (strripos($agente,"Version") < strripos($agente,$navegador_corto)){ $version= $matches['version'][0]; } else { $version= $matches['version'][1]; } } else { $version= $matches['version'][0]; } /*Verificamos si tenemos Version*/ if ($version==null || $version=="") {$version="?";} /*Resultado final del Navegador Web que Utilizamos*/ 

    return array(
	'agente' => $agente,
	'nombre'      => $navegador,
	'version'   => $version,
	'platforma'  => $platforma
	);

}

}// fin de la clase
?>