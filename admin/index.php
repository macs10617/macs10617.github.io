<? session_start();
error_reporting( E_ERROR );
function ob_saveCookieAfter($s)
{
      setcookie("page_size_after", strlen($s),time()+10);
      return $s;
}
function ob_saveCookieBefore($s)
{
      setcookie("page_size_before", strlen($s),time()+10);
      return $s;
}
ob_start("ob_saveCookieAfter");
ob_start("ob_gzhandler",9);
ob_start("ob_saveCookieBefore");


require("../connect.php");

$user=$_SESSION["user"];

if ($user!="admin") {

?>

<form action="login.php" method="POST">
<b>��� �����:</b><br>
<input type="text" name="login" maxlength="25" size="20">
<br>
<b>��� ������:</b><br>
<input type="password" name="password" maxlength="25" size="20">
<br>
<br>
<input type="submit" value="����� �� ��������" name="submit">
</form>

<?php } else {
?>

<html>
<head>
<title>Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>


<table width=100% border=0>
<td width=250 valign=top>
<table width=100% style="BORDER: #000000 1px solid" cellspacing="0" cellpadding="3" background=bg.gif>
<td>
<b>����:</b>
<br>
� <a href="index.php">������� ��������</a><br>
� <a href="index.php?page=search">����� ������������</a><br>
� <a href="../index.php" target=_blank>������� �� ����</a><br>
<b>������:</b>
<br>
� <a href="index.php?page=invstat">���������� �������</a><br>
<b>�������:</b>
<br>
� <a href="index.php?page=qiwi">���������� ������� Qiwi</a><br>
� <a href="index.php?page=add_money">��������� ������</a><br>
� <a href="index.php?page=payment">������� ��������</a><br>
<b>�������:</b>
<br>
� <a href="index.php?page=pay2">������� � ��������</a><br>
<b>�������:</b>
<br>
� <a href="index.php?page=news">����������/��������������</a><br>
� <a href="index.php?page=news_cm">����������� � ��������</a><br>
<b>��������:</b>
<br>
� <a href="index.php?page=ref_text">���������� ���������</a><br>
<b>��������:</b>
<br>
� <a href="index.php?page=mess">������ E-mail</a><br>
</td>
</table>
</td>
<td valign=top>
<table width=100% style="BORDER: #000000 1px solid" cellspacing="0" cellpadding="3">
<td>
<?
if (isset($_GET['page']) == false)
{
include("inc/index.inc");
$_GET['page'] = 'index';
}
else 
{
if (ereg ("[a-z]", $_GET['page']) and file_exists("inc/".$_GET['page'].".inc") == true)
{ 
include("inc/".$_GET['page'].".inc");
}
else 
{ 
include("inc/404.inc"); 
}
}
?>
</td>
</table>
</td>
</table>
</body>
</html>
<?
}
ob_end_flush();
exit();
?>