<? include "header.php"; ?>
<h2><center>���������� ������� ����� QIWI-������.</center></h2><br>
<?
if ($rowus[login]=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� ������� � ������ �������� ���������� ������������������!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}
$money = $_POST[money];
$payid = $_POST[payid];
$date=date("Y-m-d H:i:s");

if (isset ($money)) 
{
if ($payid == "") { echo "�� ������ e-mail"; include "footer.php"; exit; }
$add="INSERT INTO tb_qiwi (login, money, date, payid, phone) VALUES ('$rowus[login]','$money','$date','$payid','$rowus[phone]')";
mysql_query($add);
echo "
<b>������ ������� � ����� ���������� � ��������� �����.</b><br><br>
<b>��� �����:</b> <u>$rowus[login]</u><br>
<b>�����, ������� ����� ��������� �� ��� ����:</b> <u>$money ������</u><br>
<b>��� �������:</b> <u>$payid</u><br><br>
<u>������ �������������� � ���� �� 5 ����� �� 3 �����. (� ������� �����). ������� ����� � 16:00 �� 03:00 �� ����������� �������</u><br><br>
<b>����� ���������� �������, ��������� ��������� ������ �������������� <br>
� �������� �� �������� �������������, ����� �������� ����������.";
include("footer.php"); 
exit;
}
else { echo "������! ��������� �� �������� ���������� ����� � ��������� �������.";  include "footer.php"; exit; }
?>

<? include "footer.php"; ?>