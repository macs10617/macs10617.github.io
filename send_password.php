<?php
include("header.php");
?>
<h2>������������ ������</h2>

<?php


if ($_GET["page"]=="post") {



$email=htmlspecialchars($_POST[email]);


if (!preg_match("/^[a-z0-9\.\-_]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$/is", $email) or $email=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� ������� ������� e-mail �����.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}


$sql_se="SELECT * FROM tb_users WHERE email='$email'";
$result_se=mysql_query($sql_se);        
$row_se=mysql_fetch_array($result_se);


if ($row_se[id]=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ������ e-mail ����� �� ���������������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

$message="������������! �� ��������� ������ �� ������� ����. ��� �����: $row_se[login] ��� ������: $row_se[password]";

mail("$email", "��� ���� - �������������� ������", $message, 
     "From: admin@time-money.biz \r\n" 
    ."X-Mailer: PHP/" . phpversion());


print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">������ ������� ������ �� ��� �������� ���� $email.</font></b></td></table>";


include("footer.php"); exit;

}

?>



<form class="form-3" action="send_password?page=post" method="POST">
<b>������� e-mail:</b><br>
<small><font color="#999999">������ ����� ������ �� ��� �������� ����</font></small><br>
<input type="text" name="email" size="35" maxlength="30">

<input class="button blue medium" type="submit" value="������� ������">
</form>

<?php
include("footer.php");
?>