<?php
include("header.php");
?>


<h2>�������� �����</h2>


<?php
$name = $_POST[name]; 
$email = $_POST[email]; 
$mess = $_POST[mess]; 
$login = $rowus[login];
if ($login == "") { $login = "��������� ���������� �� �� ��������."; }

if ($name == "")
{
echo "<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" celyaadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� �� ����� ���.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; 
include("footer.php"); 
exit;
} 
else 
if ($email == "")
{
echo "<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" celyaadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� �� ����� ���� e-mail.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; 
include("footer.php"); 
exit;
}
else 
if ($mess == "")
{
echo "<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" celyaadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� �� ����� ����� ���������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; 
include("footer.php"); 
exit;
}
else
$to = "admin@time-money.biz";
$headers = "Content-type: text/plain; charset = windows-1251";
$subject = "����������� ���������";
$message = "��� �����������: $name \nE-mail �����������: $email \n����� ���������: $mess \n����� ������������: $login";
$send = mail ($to, $subject, $message, $headers);
if ($send == 'true')
{
echo "<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" celyaadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">��������� ������� ���������� � ������ ��������� time-money.biz. �� �������� � ���� � ��������� �����.</font></b></td></table>";
}
else 
{echo "<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" celyaadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��������� �� ����������. ��������� �������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; 
include("footer.php"); 
exit;
}
?>

<?php
include("footer.php");
?>