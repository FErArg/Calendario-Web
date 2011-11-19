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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Prueba1</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<table style="text-align: center; width: 100%; heigh: 100%;">
	<tr style="vertical-align: middle; text-align: center;">
		<td>
	<div class="login-block">
			<form action="check.php" method="post">
				<table>
				<tr>
					<td>Usuario</td>
					<td><input type="text" name="usuario" size=10 /></td>
				</tr>
				<tr>
					<td>Clave</td>
					<td><input type="password" name="clave" size=10 /></td>
				</tr>
				<tr>
					<td><input type="hidden" name="login" /></td>
					<td></td>
				</tr>
				<tr>
					<td><p class="submit-wrap"><input type="reset"></p></td>
					<td><p class="submit-wrap"><input name="send" type="submit"></p></td>
				</tr>
				</table>
			</form>
 </div>
	</td>
 </tr>
 </table>
<?php	
include ("$inc/footerI.php");
?>
</body>
</html>
