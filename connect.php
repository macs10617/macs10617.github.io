<?
$host = "localhost";
$user = "root";
$pass = "root";
$base = "time-money";
$con = mysql_connect($host, $user, $pass); mysql_select_db($base, $con);


if (!$con) { echo "��� ���������� � ����� ������."; exit; }
mysql_query('SET NAMES cp1251', $con);
?>