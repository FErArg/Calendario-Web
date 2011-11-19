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
$inc="../inc/";
include("$inc/incluirU.php");
if ( isset($_SESSION['Authenticated']) AND $_SESSION['Authenticated'] == 1 ){
$dir1="../../";
$id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
	<style media="all" type="text/css">@import "calendar.css";</style>
	<script type="text/javascript" src="view.js"></script>
	<script type="text/javascript" src="calendar.js"></script>
</head>
<body>
<div class="cabecera">
<h1>Ver todos los Avisos</h1>
</div> <!-- CAB -->
<div class="izquierda">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="2">Agregar Aviso</th>
					</tr>
					<tr>
						<td colspan="2">
							<form action="agregar2.php" method="post" accept-charset="utf-8">
							<table>
								<tr>
									<td><label for="element_3_1">Día</label></td>
									<td><input id="element_3_1" name="dia" class="element text" size="2" maxlength="2" value="" type="text"></td>
								</tr>
								<tr>
									<td><label for="element_3_2">Mes</label></td>
									<td><input id="element_3_2" name="mes" class="element text" size="2" maxlength="2" value="" type="text"></td>
								</tr>
								<tr>
									<td><label for="element_3_3">Año</label></td>
									<td><input id="element_3_3" name="ano" class="element text" size="4" maxlength="4" value="" type="text"></td>
								</tr>
								<tr>
									<td>Seleccione Día en Calendario</td>
									<td><span id="calendar_3">
									<img id="cal_img_3" class="datepicker" src="images/calendar.gif" alt="Selección de día.">	
									</span>
									<script type="text/javascript">
										Calendar.setup({
										inputField	 : "element_3_3",
										baseField    : "element_3",
										displayArea  : "calendar_3",
										button		 : "cal_img_3",
										ifFormat	 : "%B %e, %Y",
										onSelect	 : selectEuropeDate
										});
									</script>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Texto del Aviso</strong></td>
						<td class="last"><input type="text" class="text" name="aviso" /></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="reset" value="Limpiar">
							<input id="saveForm" class="button_text" type="submit" name="submit" value="Enviar" />
						</td>
					</tr>
				</table>
</div>
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
