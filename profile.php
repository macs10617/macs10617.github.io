<?php
include("header.php");
?>

<h2><center>������� ��������</center></h2>

<?php


if ($rowus[login]=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� ������� � �������� ���������� ������������������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}



if ($_GET["page"]=="save") {

$country=htmlspecialchars($_POST[country]);
$rris=intval($_POST[rris]);
$sec=intval($_POST[sec]);

if ($country=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� ������� ������� ������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

// rris='$rris'

$update="UPDATE tb_users SET country='$country', sec_flag='$sec' WHERE login='$rowus[login]'";
mysql_query($update);

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">���� ������ ������� ��������.</font></b></td></table><br><br><i>�� ������ �������������� �� �������� ������� ����� 3 ���...</i>";
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

if ($password3!=$rowus[password]) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� ������� �������� ������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

if ($password=="" OR strlen($password) > 25) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� �� ������� ����� ������ ��� �� ��������� 25 ��������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

if ($password!=$password2) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��������� ������ �� ���������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}


$updus="UPDATE tb_users SET password='$password' WHERE id='$rowus[id]'";
mysql_query($updus);

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">��� ������ ������� �������! ��� ����������� ������ ���������� ����������������.</font></b></td></table>";


include("footer.php"); exit;

}






if ($_GET["page"]=="mail_key") {

if ($rowus[mail_flag]=="0") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� e-mail ��� �����������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

$md=htmlspecialchars($_GET[md]);


if ($md!=$rowus[mail_wait]) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��������� ������ �� ����������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}


$update1="UPDATE tb_users SET mail_flag='0', mail_wait='' WHERE login='$rowus[login]'";
mysql_query($update1);


print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">��� e-mail ����� ������� �����������.</font></b></td></table>";


include("footer.php"); exit;

}




if ($_GET["page"]=="send_mail") {

if ($rowus[mail_flag]=="0") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� e-mail ��� �����������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

$email=htmlspecialchars($_POST[email]);
$email=strtolower($email);

if (!preg_match("/^[a-z0-9\.\-_]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$/is", $email) or $email=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� ������� ������� e-mail �����.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

$count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE email='$email' AND login!='$rowus[login]'");
$row_mail=mysql_fetch_row($count);

if ($row_mail[0]>0) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ������ e-mail ����� ��� ���������������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}



$keyto=mt_rand(111111,999999);
$keyto=md5("$keyto");



$update1="UPDATE tb_users SET email='$email', mail_wait='$keyto' WHERE login='$rowus[login]'";
mysql_query($update1);


$message="������������! ��� ������������� e-mail �� ����� time-money.biz ��������� �� ������: http://time-money.biz/profile?page=mail_key&md=$keyto";

mail("$email", "time-money.biz - ������������� e-mail", $message, 
     "From: admin@time-money.biz \r\n" 
    ."X-Mailer: PHP/" . phpversion());

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">�� ��� e-mail <u>$email</u> ������� ������ ��� �������������.</font></b></td></table>";


include("footer"); exit;

}




if ($_GET["page"]=="mail") {

if ($rowus[mail_flag]=="0") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� e-mail ��� �����������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer"); exit;}


print"<form class=\"form-3\" action=\"profile?page=send_mail\" method=\"POST\">
<b>��� e-mail:</b><br>
<input type=\"text\" name=\"email\" size=\"30\" maxlength=\"25\" value=\"$rowus[email]\">
<input type=\"submit\" value=\"������� ������ �������������\">
</form>";


include("footer.php"); exit;

}








if ($rowus[mail_flag]=="0") {$mail_flag="<font color=\"#ff0000\">(�� �����������)</font> - <a href=\"profile?page=mail\">����������� &gt;&gt;</a>";} else {$mail_flag="";}

if ($rowus[referer]!="") {$referer="$rowus[referer]";} else {$referer="�����������";}

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

<b>��� �����:</b> <?php print"$rowus[login]"; ?><br>
<b>��� e-mail:</b> <?php print"$rowus[email]"; ?><br>
<b>��� �������:</b> <?php print"$referer"; ?><br>
<br>
<form class="form-3" action="profile?page=save" method="POST">
<b>������:</b><br>
<select id="round4" name="country">
<option value="ru" <?php print"$checked1"; ?>>������</option>
<option value="ua" <?php print"$checked2"; ?>>�������</option>
<option value="by" <?php print"$checked3"; ?>>����������</option>
<option value="kz" <?php print"$checked4"; ?>>���������</option>
<option value="">- - -</option>
<option value="all" <?php print"$checked5"; ?>>������ ������</option>
</select>
<br><br>

<?
if (1==0) {
?>

<img src="img/rris.gif" width="100" height="100" border="0"><br>

<b>���� (����� ������������<br>
���������������� �������):</b><br>
<select id="round4" name="rris">
<option value="0" <?php print"$checkedr1"; ?>>������� (�������������)</option>
<option value="1" <?php print"$checkedr2"; ?>>��������</option>
</select>
<br><br>
<?
}
?>
<?
if (1==0) {
?>
<b>������������� �����:</b><br>
<font color="#999999"><small>������� ��� ������� �� �������������������� �����.<br>
��� ������ ����� �� ��� e-mail ����� ������������ ������ ��� �����.</small></font><br>
<select id="round4" name="sec">
<option value="1" <?php print"$checkeds1"; ?>>������� (�������������)</option>
<option value="0" <?php print"$checkeds2"; ?>>��������</option>
</select>
<br><br>
<?
}
?>
<input class="button blue medium" type="submit" value="���������">
</form>
<br>
<h2>����� ������</h2>


<form class="form-3" action="profile?page=post_password" method="POST">
<b>����� ������:</b><br>
<input type="password" name="password" size="30" maxlength="25"><br>
<b>��������� ������:</b><br>
<input type="password" name="password2" size="30" maxlength="25"><br><br>
<b>������ ������:</b><br>
<input type="password" name="password3" size="30" maxlength="25"><br><br>
<input class="button blue medium" type="submit" value="������� ������">
</form>





<?php
include("footer.php");
?>