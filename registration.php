<?php
include("header.php");
?>


<h2>Регистрация</h2>

<?php

if ($rowus[login]!="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы уже зарегистрированы.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



$ip1=$_SERVER["HTTP_X_FORWARDED_FOR"];
$ip2=$_SERVER["REMOTE_ADDR"];
if ($ip1!="") {$ip="$ip1";} else {$ip="$ip2";}

$strip=strlen("$ip");
if ($strip>15) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Запрещено регистрироваться используя прокси-сервер. Отключите прокси-сервер в настройках Вашего браузера и продолжите регистрацию.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



$bl1_count=mysql_query("SELECT COUNT(*) FROM tb_bl_ip WHERE ip='$ip'");
$bl1_row=mysql_fetch_row($bl1_count);



if ($bl1_row[0]>0) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для Вас доступ к данной странице запрещен.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



if ($_GET["page"]=="post") {

$login=htmlspecialchars($_POST[login]);
$login=strtolower($login);
$email=htmlspecialchars($_POST[email]);
$email=strtolower($email);
$country=htmlspecialchars($_POST[country]);
$ref_post=htmlspecialchars($_POST[referer]);
$phone=htmlspecialchars($_POST[phone]);


$password=htmlspecialchars($_POST[password]);
$password2=htmlspecialchars($_POST[password2]);

$agent=getenv('HTTP_USER_AGENT');
$ip=$_SERVER['REMOTE_ADDR']; 


if ($agent=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы не можете зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($login=="" or strlen($login) > 25 or strlen($login) < 5 or $login=="admin") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы неверно указали логин.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if (!preg_match("/^[a-z0-9\.\-_]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$/is", $email) or $email=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы неверно указали e-mail адрес.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($country=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы неверно указали страну.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($password=="" or strlen($password) > 25 or strlen($password) < 5) {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы неверно указали пароль. Пароль должен состоять минимум из 5 символов.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($password!=$password2) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Пароль подтверждения не совпадает.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE login='$login'");
$row_login=mysql_fetch_row($count);

$count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE email='$email'");
$row_mail=mysql_fetch_row($count);

if ($row_login[0]>0) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Данный логин уже зарегистрирован.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($row_mail[0]>0) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Данный e-mail адрес уже зарегистрирован.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

$count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE password='$password'");
$row_pass=mysql_fetch_row($count);


if ($row_pass[0]>3) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы используете распространенный пароль, который чаще всего используют другие пользователи. Смените пароль на более сложный, чтобы избежать взлома.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$bl1_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE ip='$ip' AND password='$password'");
$bl1_row=mysql_fetch_row($bl1_count);





$status="0";


if ($ref_post!="") {

$sqlref="SELECT money_ref FROM tb_users WHERE login='$ref_post'";
$resultref=mysql_query($sqlref);
$rowref=mysql_fetch_array($resultref);

$ref_pc=$rowref[money_ref]+$rowcg[money_ref];

$update1="UPDATE tb_users SET all_ref=all_ref+1 WHERE login='$ref_post'";
mysql_query($update1);

} else {

// Функция автореферал


$randar=array (1 => '1', '2'); 
$rrar=$randar[mt_rand(1,2)];

if ($rrar=="1") {

$update2="UPDATE tb_users SET ar_ref=ar_ref+1 WHERE login='$row_st[ar_login]'";
mysql_query($update2);

$update3="UPDATE tb_stat SET ar_all=ar_all+1 WHERE id='1'";
mysql_query($update3);

$ref_post=$row_st[ar_login];
$status="2";
}

}


$add="INSERT INTO tb_users (login, email, password, ip, agent, http_referer, country, referer, status, mail_flag, phone) VALUES ('$login','$email','$password','$ip','$agent','$http_referer','$country','$ref_post','$status','1','$phone')";
mysql_query($add);

$upd_st="UPDATE tb_stat SET users=users+1 WHERE id='1'";
mysql_query($upd_st);

$rlogin = $ref_post;

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">Ваш аккаунт успешно зарегистрирован.</font></b></td></table>

<br><br>


<form method=\"POST\" action=\"login.php\">
<input type=\"hidden\" name=\"login\" value=\"$login\">
<input type=\"hidden\" name=\"password\" value=\"$password\">
<input type=\"submit\" name=\"submit\" value=\"Войти на сайт\">
</form>";

include("footer.php"); exit;

}
?>
<br>
<form class="form-3" action="registration.php?page=post" method="POST">
<div id="loginblock">
 <div id="regblocktitle"><b>Логин:</b></div> 
 <div id="regblockform"><input type="text" name="login" size="40" maxlength="25"></div> 
 </div> 
<br>
<div id="loginblock">
 <div id="regblocktitle"><b>Ваш e-mail адрес:</b></div> 
 <div id="regblockform"><input type="text" name="email" size="40" maxlength="60"></div> 
 </div> 
 <br>
 
 <div id="regblocktitle"><b>Страна в которой вы проживаете:</b></div> <br>
 
 <select name="country">
<option value="ru">Россия</option>
<option value="ua">Украина</option>
<option value="by">Белоруссия</option>
<option value="kz">Казахстан</option>
</select> 
  <br><br>
 
<div id="loginblock">
 <div id="regblocktitle"><b>Пароль:</b></div> 
 <div id="regblockform"><input type="password" name="password" size="40" maxlength="25"></div> 
 </div> <br>
 
 <div id="loginblock">
 <div id="regblocktitle"><b>Повторите пароль:</b></div> 
 <div id="regblockform"><input type="password" name="password2" size="40" maxlength="25"></div> 
 </div> <br>



<?php

if ($referer!="") {print"<b>Вас привел на сайт:</b> $referer<br><br>";}

?>

<input type="hidden" name="referer" value="<?php print"$referer"; ?>"><br>
<input type="checkbox" name="rules" value="1">&nbsp&nbsp&nbspРегистрируясь вы подтверждаете свое согласие с условиями <a href="rules.php" title="Пользовательское соглашение">пользовательского соглашения</a>.
<br><br>
<input type="submit" value="Зарегистрироваться">
</form>

<?php
include("footer.php");
?>