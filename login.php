<? session_start();

require("connect.php");

if ($_SESSION["brut"]>10) {
header ("Location: login_error_brut");
exit;
}


$login=htmlspecialchars($_POST[login]);
$password=htmlspecialchars($_POST[password]);
$login=strtolower($login);

$date=time();
$ip1=$_SERVER["HTTP_X_FORWARDED_FOR"];
$ip2=$_SERVER["REMOTE_ADDR"];
if ($ip1!="") {$ip="$ip1";} else {$ip="$ip2";}
$agent=getenv('HTTP_USER_AGENT');

$select="SELECT login, password FROM tb_users WHERE login='{$login}' AND password='{$password}' LIMIT 1";
$sql=mysql_query($select);
if (mysql_num_rows($sql)==1) {

// Проверка на мульти-аккаунты
$sqlus="SELECT ip, sec_flag, email, online, referer, all_ip FROM tb_users WHERE login='$login'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);

if ($rowus[sec_flag]=="1") {

$keyto=mt_rand(111111,999999);
$md=md5($keyto);

$message="Был осуществлен вход в аккаунт $login на сервисе cleanest-city.ru с IP адреса: $ip и браузера: $agent. Чтобы войти в аккаунт, перейдите по этой ссылке - http://cleanest-city.ru/login2?md=$md";

mail("$rowus[email]", "cleanest-city.ru - Подтверждение входа в аккаунт", $message, 
     "From: cleanestcity@gmail.com \r\n" 
    ."X-Mailer: PHP/" . phpversion());

$update="UPDATE tb_users SET sec_md='$md' WHERE login='$login'";
mysql_query($update);

} else {

$_SESSION["user"]=$login;
$_SESSION["password"]=$password;

} // Конец защиты sec_flag




$bl1_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE ip='$ip' AND password='$password' AND login!='$login'");
$bl1_row=mysql_fetch_row($bl1_count);

if ($bl1_row[0]>0) {
$update="UPDATE tb_users SET bl='1', bl_text='Регистрация более одного аккаунта в системе.' WHERE login='$login'";
mysql_query($update);
}

$bl2_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE ip='$ip' AND agent='$agent' AND login!='$login'");
$bl2_row=mysql_fetch_row($bl2_count);

if ($bl2_row[0]>0) {
$update="UPDATE tb_users SET bl='1', bl_text='Регистрация более одного аккаунта в системе.' WHERE login='$login'";
mysql_query($update);
}

$bl3_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE password='$password' AND agent='$agent' AND login!='$login'");
$bl3_row=mysql_fetch_row($bl3_count);

if ($bl3_row[0]>0) {
$update="UPDATE tb_users SET bl='1', bl_text='Регистрация более одного аккаунта в системе.' WHERE login='$login'";
mysql_query($update);
}






$update="UPDATE tb_users SET all_ip='$ip, $rowus[all_ip]' WHERE login='$login'";
mysql_query($update);


mysql_close($con);



if ($rowus[sec_flag]=="1") {
header ("Location: send_md");
exit('<META HTTP-EQUIV="REFRESH" CONTENT="0;send_md">');
} else {
header ("Location: account");
exit('<META HTTP-EQUIV="REFRESH" CONTENT="0;account">');
}


} else {

$brut=$_SESSION["brut"];
if ($brut=="") {
$_SESSION["brut"]=1;
} else {
$brut2=$brut+1;
$_SESSION["brut"]=$brut2;
}



header ("Location: login_error");
exit('<META HTTP-EQUIV="REFRESH" CONTENT="0;login_error">');
}
?>