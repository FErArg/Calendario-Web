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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Prueba1</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type="text/javascript" src="view.js"></script>
	<script type="text/javascript" src="calendar.js"></script>
</head>
<body>
<?php
$_SESSION['mes'] = $_SESSION['mes'] + 1;
If ($_SESSION['mes'] > '12'){
	$_SESSION['mes'] = '1';
	$_SESSION['ano'] = $_SESSION['ano'] + 1;
}
If ($_SESSION['mes'] < '1' ){
	$_SESSION['mes'] = '12';
	$_SESSION['ano'] = $_SESSION['ano'] - 1;
}	
// -------------------------------------------
$dia = $_SESSION['dia'];
$mes = $_SESSION['mes'];
$ano = $_SESSION['ano'];
$hoy = $_SESSION['hoy'];
$id_usuario = $_SESSION['id_usuario'];
// -------------------------------------------
// print $dia."-".$mes."-".$ano."<br />".$hoy;
?>

<?php
extract($_POST);
// numero de dias segun mes y año
$num = cal_days_in_month(CAL_GREGORIAN, $mes, $ano); // 31
?>
<div class="cabecera">
	<h2>Cabecera</h2><br />
<?php
$fechahoy = $ano."-".$mes."-".$dia;
print "<p id=\"avisoshoy\">";
$avisoshoy0 = avisoshoy2($fechahoy,$id_usuario);
if ( $avisoshoy0 == 'NULL' ){
	$avisoshoy0 = '0';
}
print "Tiene ".$avisoshoy0." para Hoy ".$fechahoy;
print "</p>";
echo mysql_error();
?>
</div> <!-- CAB -->
<div class="izquierda">
	<h1> <?php print fmes($mes)."-".$ano; ?> </h1>
	<ol class="calendar" start="6">
	<li id="thismonth">
		<ul>
			<li>Lunes</li><li>Martes</li><li>Miércoles</li><li>Jueves</li><li>Viernes</li><li>Sábado</li><li>Domingo</li>
		</ul>
	</li>
	<li id="lastmonth">
		<ul>
		<?php
			$i = 1;
			// suma espacios en blanco para empezar
			// el día en la posicion correcta en el almanaque
				$h=mktime(0, 0, 0, $mes, $i, $ano);
				$dw=date("w", $h);
				$j='2'; 
				if ( $dw != '0'){
					while ( $j <= $dw ){
						print"<li> </li>";
						$j++;
					}
				}
		?>
		</ul>
	</li>
	<li id="thismonth">
		<ul>
		<?php
		// imprime el numero de día y el día en cada recuadro
		while ( $i <= $num ){
			$h=mktime(0, 0, 0, $mes, $i, $ano);
			$fecha = $ano."-".$mes."-".$i;
			if ( $i == $dia){
				print"<li id=\"hoy\">".$i."<br />";
				$aviso = avisoshoy($fecha,$id_usuario);
				if ( isset($aviso) ){
					print "<a href='javascript:onClick=alert(\"".$aviso."\")'>X</a>";
				}
				print "</li>";
			} else{
				print"<li>".$i."<br />";
				$aviso = avisoshoy($fecha,$id_usuario);
				if ( isset($aviso) ){
					// print $aviso;
					print "<a href='javascript:onClick=alert(\"".$aviso."\")'>X</a>";
				}
				print "</li>";
			}
			$i++;
		}
		?>
		</ul>
	</li>
	</ol>
</div> <!-- IZQ -->
<div class="derecha">
	<h1>Menu</h1>
	<?php include('menu.php'); ?>
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
</body>
</html>
