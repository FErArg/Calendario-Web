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
$inc="../inc";
include("$inc/incluirU.php");
if ( isset($_SESSION['Authenticated']) AND $_SESSION['Authenticated'] == 1 ){
$dir1="../../";
$id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ver todos los Avisos</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>
<div class="cabecera">
<h1>Ver todos los Avisos</h1>
</div> <!-- CAB -->
<div class="izquierda">
<table class="listing" cellpadding="0" cellspacing="0" border="1">
	<tr>
		<th class="first" width="100">Usuario</th>
		<th width="20">ID</th>
		<th width="200">Aviso</th>
		<th width="30" class="last">Fecha</th>
	</tr>
	<?php
	$query0 = " SELECT usuario_id, id, aviso, fecha FROM avisos WHERE usuario_id = '$id_usuario' ";
	$query1 = mysql_query($query0);
	while( $registro = mysql_fetch_row($query1) ){
		$query00="SELECT usuario FROM usuarios WHERE id = '$id_usuario'";
		$query01=mysql_query($query00);
		$query02=mysql_fetch_row($query01);
		$usuario0 = $query02[0];
		print "<tr>";
		print "<td class=\"first style1\">".$usuario0."</td>";
		print "<td>".$registro[1]."</td>";
		print "<td>".$registro[2]."</td>";
		print "<td class=\"last\">".$registro[3]."</td>";
		print "</tr>";
	}
	?>
</table>
</div> <!-- IZQ -->
<div class="derecha">
	<h2>Menú</h2>
<?php
 include('menu.php');
?>
</div> <!-- DER -->
	<div id="footer">
	<?php
	} else{
		print"<h3>No ha iniciado Sesión Correctamente</h3><br />\n";
		print"<br />\n<a href=\"../index.php\" class=\"botonR\">Volver</a><br /><br />\n";
	}
	include("$inc/footer.php");
	?>
	</div>
</div>
</body>
</html>
