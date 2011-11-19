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
</head>
<body>
<?php
$dia = date(d);
$mes = date(m);
$ano = date(Y);
$id_usuario = $_SESSION['id_usuario'];
$_SESSION['dia']=$dia;
$_SESSION['mes']=$mes;
$_SESSION['ano']=$ano;
$_SESSION['hoy']=($dia."-".$mes."-".$ano);

// print $dia."-".$mes."-".$ano."<br />";
?>

<?php
extract($_POST);
// numero de dias segun mes y año
$num = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
?>
<?php
/*
$query0="SELECT * FROM avisos WHERE fecha BETWEEN '$ano-$mes-01' AND '$ano-$mes-$num';";
$query1=mysql_query($query0);
$query2=mysql_fetch_row($query1);

while( $rec3 = mysql_fetch_row($query1) ){
		print $rec3[0].$rec3[1].$rec3[2]."<br />";
	}
*/
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
				$query10="SELECT aviso FROM avisos WHERE usuario_id = '$id_usuario' AND fecha = '$fecha'";
				$query11=mysql_query($query10);
				while( $aviso = mysql_fetch_row($query11) ){
					print "<a href='javascript:onClick=alert(\"".$aviso[0]."\")'>X</a>";
				}
				print "</li>";
			} else{
				print"<li>".$i."<br />";
				$query10="SELECT aviso FROM avisos WHERE usuario_id = '$id_usuario' AND fecha = '$fecha'";
				$query11=mysql_query($query10);
				while( $aviso = mysql_fetch_row($query11) ){
					print "<a href='javascript:onClick=alert(\"".$aviso[0]."\")'>X</a>";
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
