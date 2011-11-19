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
