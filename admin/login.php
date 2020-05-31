<? session_start();

require("../connect.php");

if ($_SESSION["brut"]>2) {
header ("Location: /login_error_brut.php");
exit('<META HTTP-EQUIV="REFRESH" CONTENT="0;/login_error_brut.php">');
}


$login=htmlspecialchars($_POST[login]);
$password=htmlspecialchars($_POST[password]);
$login=strtolower($login);
$password=strtolower($password);

$date=time();
$ip1=$_SERVER["HTTP_X_FORWARDED_FOR"];
$ip2=$_SERVER["REMOTE_ADDR"];
if ($ip1!="") {$ip="$ip1";} else {$ip="$ip2";}
$agent=getenv('HTTP_USER_AGENT');

$select="SELECT login, password FROM tb_users WHERE login='{$login}' AND password='{$password}' LIMIT 1";
$sql=mysql_query($select);
if (mysql_num_rows($sql)==1) {

$_SESSION["user"]=$login;
$_SESSION["password"]=$password;




// Проверка на мульти-аккаунты
$sqlus="SELECT ip FROM tb_users WHERE login='$login'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);


$bl1_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE ip='$ip' AND password='$password' AND login!='$login'");
$bl1_row=mysql_fetch_row($bl1_count);

if ($bl1_row[0]>0) {
$update="UPDATE tb_users SET bl='1', bl_text='Автоматическая блокировка (1). Нарушение пользовательского соглашения по пункту 3.3' WHERE login='$login'";
mysql_query($update);
}

$bl2_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE ip='$ip' AND agent='$agent' AND login!='$login'");
$bl2_row=mysql_fetch_row($bl2_count);

if ($bl2_row[0]>0) {
$update="UPDATE tb_users SET bl='1', bl_text='Автоматическая блокировка (2). Нарушение пользовательского соглашения по пункту 3.3' WHERE login='$login'";
mysql_query($update);
}

$bl3_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE password='$password' AND agent='$agent' AND login!='$login'");
$bl3_row=mysql_fetch_row($bl3_count);

if ($bl3_row[0]>0) {
$update="UPDATE tb_users SET bl='1', bl_text='Автоматическая блокировка (3). Нарушение пользовательского соглашения по пункту 3.3' WHERE login='$login'";
mysql_query($update);
}


$update="UPDATE tb_users SET all_ip='$ip, $rowus[all_ip]' WHERE login='$login'";
mysql_query($update);



mysql_close($con);

header ("Location: index.php");
exit('<META HTTP-EQUIV="REFRESH" CONTENT="0;index.php">');
} else {

$brut=$_SESSION["brut"];
if ($brut=="") {
$_SESSION["brut"]=1;
} else {
$brut2=$brut+1;
$_SESSION["brut"]=$brut2;
}



header ("Location: /login_error.php");
exit('<META HTTP-EQUIV="REFRESH" CONTENT="0;/login_error.php">');
}
?>