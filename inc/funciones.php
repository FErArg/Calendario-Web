<?php
$ip = $_SERVER['REMOTE_ADDR'];
$navegador = $_SERVER['HTTP_USER_AGENT'];
$os = getOS($_SERVER['HTTP_USER_AGENT']);
if ($_SESSION['log'] != '1') {
	if ( isset($usuario) ){
		$_SESSION['log'] = '1';
		mysql_query("INSERT INTO visitas (usuario, ip, navegador, os) 
			values ('$usuario','$ip','$navegador','$os')");
	} else{
		$_SESSION['log'] = '1';
		$usuario = 'anonimo';
		mysql_query("INSERT INTO visitas (usuario, ip, navegador, os) 
			values ('$usuario','$ip','$navegador','$os')");
	}
}
?>
<?php
function avisoshoy($fecha,$id_usuario){
	$query0="SELECT aviso FROM avisos WHERE fecha = '$fecha' AND usuario_id = '$id_usuario'";
	$query1=mysql_query($query0);
	$query2=mysql_fetch_row($query1);
	return $query2[0];
}

function avisoshoy2($fecha,$id_usuario){
	$query30="SELECT aviso FROM avisos WHERE fecha = '$fecha' AND usuario_id = '$id_usuario'";
	$query31 = mysql_query($query30);
	$query32 = mysql_num_rows($query31);
	return $query32;
}
?>
<?php
// convierte nro de mes en nombre de mes
function fmes($mes0){
	if ($mes0== 1) {
		$mesN = 'Enero';
	} elseif ($mes0== 2) {
		$mesN = 'Febrero';
	} elseif ($mes0== 3) {
		$mesN = 'Marzo';
	} elseif ($mes0== 4) {
		$mesN = 'Abril';
	} elseif ($mes0== 5) {
		$mesN = 'Mayo';
	} elseif ($mes0== 6) {
		$mesN = 'Junio';
	} elseif ($mes0== 7) {
		$mesN = 'Julio';
	} elseif ($mes0== 8) {
		$mesN = 'Agosto';
	} elseif ($mes0== 9) {
		$mesN = 'Septiembre';
	} elseif ($mes0== 10) {
		$mesN = 'Octubre';
	} elseif ($mes0== 11) {
		$mesN = 'Noviembre';
	} else {
		$mesN = 'Diciembre';
	}
	return $mesN;
}

// tipo de OS
function getOS($userAgent) {
  // Create list of operating systems with operating system name as array key 
	$oses = array (
		'iPhone' => '(iPhone)',
		'Windows 3.11' => 'Win16',
		'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)', // Use regular expressions as value to identify operating system
		'Windows 98' => '(Windows 98)|(Win98)',
		'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
		'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
		'Windows 2003' => '(Windows NT 5.2)',
		'Windows Vista' => '(Windows NT 6.0)|(Windows Vista)',
		'Windows 7' => '(Windows NT 6.1)|(Windows 7)',
		'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
		'Windows ME' => 'Windows ME',
		'Open BSD'=>'OpenBSD',
		'Sun OS'=>'SunOS',
		'Linux'=>'(Linux)|(X11)',
		'Safari' => '(Safari)',
		'Macintosh'=>'(Mac_PowerPC)|(Macintosh)',
		'QNX'=>'QNX',
		'BeOS'=>'BeOS',
		'OS/2'=>'OS/2',
		'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
	);

	foreach($oses as $os=>$pattern){ // Loop through $oses array
    // Use regular expressions to check operating system type
		if(eregi($pattern, $userAgent)) { // Check if a value in $oses array matches current user agent.
			return $os; // Operating system was matched so return $oses key
		}
	}
	return 'Unknown'; // Cannot find operating system so return Unknown
}
?>
