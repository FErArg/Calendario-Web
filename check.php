<?php
/****************************************************************************************
#     Copyright (c) 2008, 2009, 2010, 2011 Fernando A. Rodriguez para SerInformaticos.es
#
#     Este programa es software libre: usted puede redistribuirlo y / o modificarlo
#     bajo los términos de la GNU General Public License publicada por la
#     la Free Software Foundation, bien de la versión 3 de la Licencia, o de
#     la GPL2, o cualquier versión posterior.
#
#     Este programa se distribuye con la esperanza de que sea útil,
#     pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de
#     COMERCIABILIDAD o IDONEIDAD PARA UN PROPÓSITO PARTICULAR. Véase el
#     GNU General Public License para más detalles.
#
#     Usted debería haber recibido una copia de la Licencia Pública General de GNU
#     junto con este programa. Si no, visite <http://www.gnu.org/licenses/>.
#
#     Puede descargar la version completa de la GPL3 en este enlace: 
#     	< http://www.serinformaticos.es/index.php?file=kop804.php >
#
#	 Para mas información puede contactarnos :
#
#		Teléfono (+34) 961 19 60 62
#
#		Email	info@serinformaticos.es
#
#		MSn:	info@serinformaticos.es
#
#		Twitter	@SerInformaticos
#
#		Web:	www.SerInformaticos.es
#
*****************************************************************************************/
?>
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
