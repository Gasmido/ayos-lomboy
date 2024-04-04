<?php
$sname = "localhost";
$uname = "u950419810_WilsonPoge6969";
$passw  ="Wilson65174PaSq44451#";
$dbname = "u950419810_brgy";

$connn = mysqli_connect($sname, $uname, $passw, $dbname);

if (!$connn) {
	echo "Connection Failed";
}
?>