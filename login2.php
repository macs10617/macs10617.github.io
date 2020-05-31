<? session_start();

require("connect.php");

$md=htmlspecialchars($_GET[md]);

if ($md=="") {
header ("Location: login_error");
exit;
}

$sqlus="SELECT login, password FROM tb_users WHERE sec_md='$md'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);

if ($rowus=="") {

header ("Location: login_error");

} else {

$_SESSION["user"]=$rowus[login];
$_SESSION["password"]=$rowus[password];

$update="UPDATE tb_users SET sec_md='' WHERE login='$rowus[login]'";
mysql_query($update);

header ("Location: account");

}


mysql_close($con);

?>