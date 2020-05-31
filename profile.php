<?php
include("header.php");
?>

<h2><center>Профиль аккаунта</center></h2>

<?php


if ($rowus[login]=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к странице необходимо зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



if ($_GET["page"]=="save") {

$country=htmlspecialchars($_POST[country]);
$rris=intval($_POST[rris]);
$sec=intval($_POST[sec]);

if ($country=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы неверно указали страну.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

// rris='$rris'

$update="UPDATE tb_users SET country='$country', sec_flag='$sec' WHERE login='$rowus[login]'";
mysql_query($update);

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">Ваши данные успешно изменены.</font></b></td></table><br><br><i>Вы будете перенаправлены на страницу профиля через 3 сек...</i>";
?>
<script language="JavaScript" type="text/javascript">
function Go(){ 
location="profile"; 
} 
setTimeout( 'Go()', 3000 ); 
</script>

<?php

include("footer.php"); exit;}







if ($_GET["page"]=="post_password") {


$password=htmlspecialchars($_POST[password]);
$password2=htmlspecialchars($_POST[password2]);
$password3=htmlspecialchars($_POST[password3]);

if ($password3!=$rowus[password]) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы указали неверный пароль.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($password=="" OR strlen($password) > 25) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы не указали новый пароль или он превышает 25 символов.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($password!=$password2) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Введенные пароли не совпадают.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$updus="UPDATE tb_users SET password='$password' WHERE id='$rowus[id]'";
mysql_query($updus);

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">Ваш пароль успешно изменен! Для продолжения работы необходимо авторизироваться.</font></b></td></table>";


include("footer.php"); exit;

}






if ($_GET["page"]=="mail_key") {

if ($rowus[mail_flag]=="0") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Ваш e-mail уже подтвержден.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

$md=htmlspecialchars($_GET[md]);


if ($md!=$rowus[mail_wait]) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Указанной ссылки не существует.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$update1="UPDATE tb_users SET mail_flag='0', mail_wait='' WHERE login='$rowus[login]'";
mysql_query($update1);


print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">Ваш e-mail адрес успешно подтвержден.</font></b></td></table>";


include("footer.php"); exit;

}




if ($_GET["page"]=="send_mail") {

if ($rowus[mail_flag]=="0") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Ваш e-mail уже подтвержден.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

$email=htmlspecialchars($_POST[email]);
$email=strtolower($email);

if (!preg_match("/^[a-z0-9\.\-_]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$/is", $email) or $email=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы неверно указали e-mail адрес.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

$count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE email='$email' AND login!='$rowus[login]'");
$row_mail=mysql_fetch_row($count);

if ($row_mail[0]>0) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Данный e-mail адрес уже зарегистрирован.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



$keyto=mt_rand(111111,999999);
$keyto=md5("$keyto");



$update1="UPDATE tb_users SET email='$email', mail_wait='$keyto' WHERE login='$rowus[login]'";
mysql_query($update1);


$message="Здравствуйте! Для подтверждения e-mail на сайте time-money.biz перейдите по ссылке: http://time-money.biz/profile?page=mail_key&md=$keyto";

mail("$email", "time-money.biz - Подтверждение e-mail", $message, 
     "From: admin@time-money.biz \r\n" 
    ."X-Mailer: PHP/" . phpversion());

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">На Ваш e-mail <u>$email</u> выслана ссылка для подтверждения.</font></b></td></table>";


include("footer"); exit;

}




if ($_GET["page"]=="mail") {

if ($rowus[mail_flag]=="0") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Ваш e-mail уже подтвержден.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer"); exit;}


print"<form class=\"form-3\" action=\"profile?page=send_mail\" method=\"POST\">
<b>Ваш e-mail:</b><br>
<input type=\"text\" name=\"email\" size=\"30\" maxlength=\"25\" value=\"$rowus[email]\">
<input type=\"submit\" value=\"Выслать ссылку подтверждения\">
</form>";


include("footer.php"); exit;

}








if ($rowus[mail_flag]=="0") {$mail_flag="<font color=\"#ff0000\">(не подтвержден)</font> - <a href=\"profile?page=mail\">подтвердить &gt;&gt;</a>";} else {$mail_flag="";}

if ($rowus[referer]!="") {$referer="$rowus[referer]";} else {$referer="Отсутствует";}

if ($rowus[country]=="ru") {$checked1="selected";}
if ($rowus[country]=="ua") {$checked2="selected";}
if ($rowus[country]=="by") {$checked3="selected";}
if ($rowus[country]=="kz") {$checked4="selected";}
if ($rowus[country]=="all") {$checked5="selected";}

if ($rowus[rris]=="0") {$checkedr1="selected";}
if ($rowus[rris]=="1") {$checkedr2="selected";}

if ($rowus[sec_flag]=="1") {$checkeds1="selected";}
if ($rowus[sec_flag]=="0") {$checkeds2="selected";}

?>

<b>Ваш логин:</b> <?php print"$rowus[login]"; ?><br>
<b>Ваш e-mail:</b> <?php print"$rowus[email]"; ?><br>
<b>Ваш реферер:</b> <?php print"$referer"; ?><br>
<br>
<form class="form-3" action="profile?page=save" method="POST">
<b>Страна:</b><br>
<select id="round4" name="country">
<option value="ru" <?php print"$checked1"; ?>>Россия</option>
<option value="ua" <?php print"$checked2"; ?>>Украина</option>
<option value="by" <?php print"$checked3"; ?>>Белоруссия</option>
<option value="kz" <?php print"$checked4"; ?>>Казахстан</option>
<option value="">- - -</option>
<option value="all" <?php print"$checked5"; ?>>Другая страна</option>
</select>
<br><br>

<?
if (1==0) {
?>

<img src="img/rris.gif" width="100" height="100" border="0"><br>

<b>РРИС (Режим Рекомендаций<br>
Интеллектуальной Системы):</b><br>
<select id="round4" name="rris">
<option value="0" <?php print"$checkedr1"; ?>>Включен (рекомендуется)</option>
<option value="1" <?php print"$checkedr2"; ?>>Отключен</option>
</select>
<br><br>
<?
}
?>
<?
if (1==0) {
?>
<b>Подтверждение входа:</b><br>
<font color="#999999"><small>Защитит Ваш аккаунт от несанкционированного входа.<br>
При каждом входе на Ваш e-mail будет отправляться ссылка для входа.</small></font><br>
<select id="round4" name="sec">
<option value="1" <?php print"$checkeds1"; ?>>Включен (рекомендуется)</option>
<option value="0" <?php print"$checkeds2"; ?>>Отключен</option>
</select>
<br><br>
<?
}
?>
<input class="button blue medium" type="submit" value="Сохранить">
</form>
<br>
<h2>Смена пароля</h2>


<form class="form-3" action="profile?page=post_password" method="POST">
<b>Новый пароль:</b><br>
<input type="password" name="password" size="30" maxlength="25"><br>
<b>Повторите пароль:</b><br>
<input type="password" name="password2" size="30" maxlength="25"><br><br>
<b>Старый пароль:</b><br>
<input type="password" name="password3" size="30" maxlength="25"><br><br>
<input class="button blue medium" type="submit" value="Сменить пароль">
</form>





<?php
include("footer.php");
?>