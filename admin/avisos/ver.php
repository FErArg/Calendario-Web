<?php
$dir0="../../";
$dir1="../";
$inc=$dir0."/inc";
include("$inc/incluir.php");
if ( isset($_SESSION['AuthenticatedAD']) AND $_SESSION['AuthenticatedAD'] == 1 ){
$menu1="../../";
$menu2="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin</title>
	<style media="all" type="text/css">@import "<?php echo $dir1; ?>css/all.css";</style>
</head>
<body>
<div id="main">
	<div id="header">
		<a href="index.html" class="logo"><img src="<?php echo $dir1; ?>img/logo.gif" width="101" height="29" alt="" /></a>
		<ul id="top-navigation">
			<?php include($dir1.'menu1.php'); ?>
		</ul>
	</div>
	<div id="middle">
		<div id="left-column">
			<h3>Header</h3>
			<ul class="nav">
				<?php include($dir1.'menu2.php'); ?>
			</ul>
<!--		<a href="#" class="link">Link here</a>
			<a href="#" class="link">Link here</a> -->
		</div>
		<div id="center-column">
			<div class="top-bar">
				<!--<a href="#" class="button">ADD NEW </a>-->
				<h1>SerInformaticos</h1>
				<div class="breadcrumbs"><a href="#">Página Principal</a> / <a href="#">Contenido</a></div>
			</div><br />
		  <div class="select-bar">
		    <label>
		    <input type="text" name="textfield" />
		    </label>
		    <label>
			<input type="submit" name="Submit" value="Search" />
			</label>
		  </div>
			<div class="table">
				<img src="<?php echo $dir1; ?>img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="<?php echo $dir1; ?>img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<table class="listing" cellpadding="0" cellspacing="0">
					<tr>
						<th class="first" width="177">Usuario</th>
						<th>ID</th>
						<th>Aviso</th>
						<th class="last">Fecha</th>
					</tr>
					<?php
					$query10="SELECT id, aviso, fecha, usuario_id FROM avisos ORDER BY fecha DESC";
					$query11=mysql_query($query10);
					while( $registro = mysql_fetch_row($query11) ){
						$query20="SELECT usuario FROM usuarios WHERE id = '$registro[3]'";
						$query21=mysql_query($query20);
						$query22=mysql_fetch_row($query21);
						print "<tr>";
							print "<td class=\"first style1\">".$query22[0]."</td>";
							print "<td>".$registro[0]."</td>";
							print "<td>".$registro[1]."</td>";
							print "<td class=\"last\">".$registro[2]."</td>";
						print "</tr>";
					}
					echo mysql_error();
					?>
				</table>
			</div>
		  <div class="table">
	        <p>&nbsp;</p>
		  </div>
		</div>
		<div id="right-column">
			<strong class="h">INFO</strong>
			<div class="box">Esto es Solo una Demo de SerInformaticos, muchas funciones no están habilitadas ni terminadas </div>
	  </div>
	</div>
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