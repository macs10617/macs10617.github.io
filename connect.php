<?
$host = "localhost";
$user = "root";
$pass = "root";
$base = "time-money";
$con = mysql_connect($host, $user, $pass); mysql_select_db($base, $con);


if (!$con) { echo "Нет соединения с базой данных."; exit; }
mysql_query('SET NAMES cp1251', $con);
?>