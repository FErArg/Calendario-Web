<?php
$inc="inc";
include("$inc/incluirI.php");
?>
<?php
if( isset($_POST['login']) ){
//	extract($_POST);
$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$clave = filter_var($_POST['clave'], FILTER_SANITIZE_STRING);

		if ( $usuario AND $clave ){ 			
			$getuser="SELECT clave, grupo, id FROM usuarios WHERE usuario = '$usuario'";
			$getuser1=mysql_query($getuser);
			$datosDB=mysql_fetch_row($getuser1);

			$claveMD5=md5($clave);
			
			if ( isset($datosDB[0]) AND $datosDB[0] == $claveMD5 ){
				if ( $datosDB[1] == '1' ){
					// actualiza fecha e ip de ultimo login de cliente
					mysql_query("INSERT INTO visitas (usuario, ip, navegador, os) 
						values ('$usuario','$ip','$navegador','$os')");
					$_SESSION['AuthenticatedAD'] = 1;
					$_SESSION['id_usuarioAD'] = $datosDB[2];
					session_write_close();
					echo "<meta http-equiv='refresh' content='0;URL=admin/'>";
					// echo '1';
				} else{
					// actualiza fecha e ip de ultimo login de cliente
					mysql_query("INSERT INTO visitas (usuario, ip, navegador, os) 
						values ('$usuario','$ip','$navegador','$os')");
					$_SESSION['Authenticated'] = 1;
					$_SESSION['id_usuario'] = $datosDB[2];
					session_write_close();
					echo "<meta http-equiv='refresh' content='0;URL=usuario/'>";					
					// echo '2';
				}

			}else{
				$_SESSION['Authenticated'] = 0;
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}
		}else{
			print"<br /><br />";
			print"<h3>Error en Datos</h3>";
			print"<br />\n<a href=\"index.php\">Volver</a><br /><br />\n";
		}	
}	
if( isset($_GET['logout']) ){
	session_destroy();
	header('Location: index.php');
	echo "<meta http-equiv='refresh' content='0;URL=../'>";
}
?>
<?php 
require("$inc/footerI.php"); 
?>
