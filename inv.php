<?
include("header.php");

if ($sitestart == "0") { echo "<h2><center>�������������</center></h2><br><br> <font color=red>���������� ����� �������� ����� ������ �������.</font>"; include("footer.php"); exit; }
?>

<h2><center>�������������</center></h2>

<? 
if ($rowus[login]=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� ������� � ������ �������� ���������� ������������������ ��� �������������� � �������!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}
$mn = $rowus[money];
$date=date("Y-m-d H:i:s");
?>

<?
if ($_GET["page"]=="inv_v") 
{
$id=htmlspecialchars($_POST[id]);
$money2=htmlspecialchars($_POST[money2]);
$sql="SELECT * FROM tb_inv WHERE id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

$dates=$row['date'];
$l=strtotime($dates);
$n=time();
$cba=round(abs($n-$l)/60/60);

if ($row[pr] == "10") { $it = 12 - $cba; $vsrok = "12"; }
if ($row[pr] == "25") { $it = 24 - $cba; $vsrok = "24"; }
if ($row[pr] == "50") { $it = 36 - $cba; $vsrok = "36"; }
if ($row[pr] == "75") { $it = 48 - $cba; $vsrok = "48"; }

if ($id == "") { echo "������ ��������."; include "footer.php";  exit;}
if ($row[login] != $rowus[login]) { echo "������� �������� ����� ����������."; include "footer.php";  exit;}
if ($money2 != $row[money2]) { echo "������� ������."; include "footer.php";  exit;}
if ($cba < $vsrok) { echo "�� ��������� �������� ����������, ���� �������� �� ��������."; include "footer.php"; exit; }
 
$add1="UPDATE tb_users SET money=money+$row[money2] WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','������� ���������� � $row[pr]%','$row[money2]','$date','0')";
mysql_query($add2);

$delete="DELETE FROM tb_inv WHERE id='$id'";
mysql_query($delete);

$upd_st1="UPDATE tb_stat SET vinv=vinv+$row[money2] WHERE id='1'";
mysql_query($upd_st1);

$ustat2="UPDATE tb_users SET vinv=vinv+$row[money2] WHERE login='$rowus[login]'";
mysql_query($ustat2);

echo "<u>���������� � ���������� ������� �������� �� ��� ����</u><br><br>";
echo "<b>����� ����������:</b> $row[id]<br>";
echo "<b>����� ����������:</b> $row[money] ������<br>";
echo "<b>�� ��������:</b> $row[money2] ������ [+$row[pr]% � ����������]";
include("footer.php"); 
exit;
}

if ($_GET["page"]=="inv_ok") 
{
$inv=htmlspecialchars($_POST[inv]);
$summa=htmlspecialchars($_POST[summa]);
$ref = $rowus[referer];
$refs = $summa/100*13;

if ($inv == "") { echo "�� ������ �������� ���� ����������."; include "footer.php"; exit; }


if ($inv == "plan4")
{
$pr = "10";
$srok = "12";
$tarif = "����� &quot;12&quot; - 12 ����� +10% � ����������";
$pl = $summa/100*(100+$pr);
if ($mn < $summa) { echo "�� ����� ������� �� ������� ������� ��� ����������. ��������� ��� ������."; include "footer.php";  exit;}
if ($summa < 100) { echo "����������� ����� ���������� �� ���������� ���� ������ 100 ������."; include "footer.php";  exit;}
if ($summa > 2000) { echo "������������ ����� ���������� �� ���������� ���� ������ 2000 ������."; include "footer.php";  exit;}

$add1="UPDATE tb_users SET money=money-$summa WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','���������� �� ���� $srok ����(��)','$summa','$date','1')";
mysql_query($add2);

$add3="INSERT INTO tb_inv (login, money, money2, pr, date) VALUES ('$rowus[login]','$summa','$pl','$pr','$date')";
mysql_query($add3);

if (!empty($ref))
{
$add4="UPDATE tb_users SET money=money+$refs WHERE login='$ref'";
mysql_query($add4);

$add5="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$ref','������� � ������ ������ �������� $rowus[login] (13%)','$refs','$date','0')";
mysql_query($add5);

$add6="UPDATE tb_stat SET vinv=vinv+$refs WHERE id='1'";
mysql_query($add6);

$ustat1="UPDATE tb_users SET vinv=vinv+$refs WHERE login='$ref'";
mysql_query($ustat1);
}

$add7="UPDATE tb_stat SET sinv=sinv+$summa WHERE id='1'";
mysql_query($add7);

$upd_st="UPDATE tb_stat SET inv=inv+1 WHERE id='1'";
mysql_query($upd_st);

$ustat="UPDATE tb_users SET sinv=sinv+$summa WHERE login='$rowus[login]'";
mysql_query($ustat);

echo "<u>���������� ������� ����������������</u><br><br>";
echo "<b>�������� ����</b> - $tarif.<br>";
echo "<b>���� ����� ����������</b> - $summa ������.<br>";
echo "<b>���� ����������</b> - $srok ����(��).<br>";
echo "<b>������� ����������</b> - $pr%.<br>";
if (!empty($ref)) { echo "<b>��� ������� ($ref) �������</b> - $refs ������. (13%)<br>"; }
echo "<b>�� �������� ����� $srok ����(��)</b> - $pl ������.";
include "footer.php"; exit;
}

if ($inv == "plan5")
{
$pr = "25";
$srok = "24";
$tarif = "����� &quot;24&quot; - 24 ����� +25% � ����������";
$pl = $summa/100*(100+$pr);
if ($mn < $summa) { echo "�� ����� ������� �� ������� ������� ��� ����������. ��������� ��� ������."; include "footer.php";  exit;}
if ($summa < 200) { echo "����������� ����� ���������� �� ���������� ���� ������ 200 ������."; include "footer.php";  exit;}
if ($summa > 5000) { echo "������������ ����� ���������� �� ���������� ���� ������ 5000 ������."; include "footer.php";  exit;}

$add1="UPDATE tb_users SET money=money-$summa WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','���������� �� ���� $srok ����(��)','$summa','$date','1')";
mysql_query($add2);

$add3="INSERT INTO tb_inv (login, money, money2, pr, date) VALUES ('$rowus[login]','$summa','$pl','$pr','$date')";
mysql_query($add3);

if (!empty($ref))
{
$add4="UPDATE tb_users SET money=money+$refs WHERE login='$ref'";
mysql_query($add4);

$add5="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$ref','������� � ������ ������ �������� $rowus[login] (13%)','$refs','$date','0')";
mysql_query($add5);

$add6="UPDATE tb_stat SET vinv=vinv+$refs WHERE id='1'";
mysql_query($add6);

$ustat1="UPDATE tb_users SET vinv=vinv+$refs WHERE login='$ref'";
mysql_query($ustat1);
}

$add7="UPDATE tb_stat SET sinv=sinv+$summa WHERE id='1'";
mysql_query($add7);

$upd_st="UPDATE tb_stat SET inv=inv+1 WHERE id='1'";
mysql_query($upd_st);

$ustat="UPDATE tb_users SET sinv=sinv+$summa WHERE login='$rowus[login]'";
mysql_query($ustat);

echo "<u>���������� ������� ���������������</u><br><br>";
echo "<b>�������� ����</b> - $tarif.<br>";
echo "<b>���� ����� ����������</b> - $summa ������.<br>";
echo "<b>���� ����������</b> - $srok ����(��).<br>";
echo "<b>������� ����������</b> - $pr%.<br>";
if (!empty($ref)) { echo "<b>��� ������� ($ref) �������</b> - $refs ������. (13%)<br>"; }
echo "<b>�� �������� ����� $srok ����(��)</b> - $pl ������.";
include "footer.php"; exit;
}

if ($inv == "plan6")
{
$pr = "50";
$srok = "36";
$tarif = "����� &quot;36&quot; - 36 ����� +50% � ����������";
$pl = $summa/100*(100+$pr);
if ($mn < $summa) { echo "�� ����� ������� �� ������� ������� ��� ����������. ��������� ��� ������."; include "footer.php";  exit;}
if ($summa < 300) { echo "����������� ����� ���������� �� ���������� ���� ������ 300 ������."; include "footer.php";  exit;}
if ($summa > 9000) { echo "������������ ����� ���������� �� ���������� ���� ������ 9000 ������."; include "footer.php";  exit;}

$add1="UPDATE tb_users SET money=money-$summa WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','���������� �� ���� $srok ����(��)','$summa','$date','1')";
mysql_query($add2);

$add3="INSERT INTO tb_inv (login, money, money2, pr, date) VALUES ('$rowus[login]','$summa','$pl','$pr','$date')";
mysql_query($add3);

if (!empty($ref))
{
$add4="UPDATE tb_users SET money=money+$refs WHERE login='$ref'";
mysql_query($add4);

$add5="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$ref','������� � ������ ������ �������� $rowus[login] (13%)','$refs','$date','0')";
mysql_query($add5);

$add6="UPDATE tb_stat SET vinv=vinv+$refs WHERE id='1'";
mysql_query($add6);

$ustat1="UPDATE tb_users SET vinv=vinv+$refs WHERE login='$ref'";
mysql_query($ustat1);
}

$add7="UPDATE tb_stat SET sinv=sinv+$summa WHERE id='1'";
mysql_query($add7);

$upd_st="UPDATE tb_stat SET inv=inv+1 WHERE id='1'";
mysql_query($upd_st);

$ustat="UPDATE tb_users SET sinv=sinv+$summa WHERE login='$rowus[login]'";
mysql_query($ustat);

echo "<u>���������� ������� ���������������</u><br><br>";
echo "<b>�������� ����</b> - $tarif.<br>";
echo "<b>���� ����� ����������</b> - $summa ������.<br>";
echo "<b>���� ����������</b> - $srok ����(��).<br>";
echo "<b>������� ����������</b> - $pr%.<br>";
if (!empty($ref)) { echo "<b>��� ������� ($ref) �������</b> - $refs ������. (13%)<br>"; }
echo "<b>�� �������� ����� $srok ����(��)</b> - $pl ������.";
include "footer.php"; exit;
}


if ($inv == "plan7")
{
$pr = "75";
$srok = "48";
$tarif = "����� &quot;48&quot; - 48 ����� +75% � ����������";
$pl = $summa/100*(100+$pr);
if ($mn < $summa) { echo "�� ����� ������� �� ������� ������� ��� ����������. ��������� ��� ������."; include "footer.php";  exit;}
if ($summa < 500) { echo "����������� ����� ���������� �� ���������� ���� ������ 500 ������."; include "footer.php";  exit;}
if ($summa > 15000) { echo "������������ ����� ���������� �� ���������� ���� ������ 15000 ������."; include "footer.php";  exit;}

$add1="UPDATE tb_users SET money=money-$summa WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','���������� �� ���� $srok ����(��)','$summa','$date','1')";
mysql_query($add2);

$add3="INSERT INTO tb_inv (login, money, money2, pr, date) VALUES ('$rowus[login]','$summa','$pl','$pr','$date')";
mysql_query($add3);

if (!empty($ref))
{
$add4="UPDATE tb_users SET money=money+$refs WHERE login='$ref'";
mysql_query($add4);

$add5="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$ref','������� � ������ ������ �������� $rowus[login] (13%)','$refs','$date','0')";
mysql_query($add5);

$add6="UPDATE tb_stat SET vinv=vinv+$refs WHERE id='1'";
mysql_query($add6);

$ustat1="UPDATE tb_users SET vinv=vinv+$refs WHERE login='$ref'";
mysql_query($ustat1);
}

$add7="UPDATE tb_stat SET sinv=sinv+$summa WHERE id='1'";
mysql_query($add7);

$upd_st="UPDATE tb_stat SET inv=inv+1 WHERE id='1'";
mysql_query($upd_st);

$ustat="UPDATE tb_users SET sinv=sinv+$summa WHERE login='$rowus[login]'";
mysql_query($ustat);

echo "<u>���������� ������� ���������������</u><br><br>";
echo "<b>�������� ����</b> - $tarif.<br>";
echo "<b>���� ����� ����������</b> - $summa ������.<br>";
echo "<b>���� ����������</b> - $srok ����(��).<br>";
echo "<b>������� ����������</b> - $pr%.<br>";
if (!empty($ref)) { echo "<b>��� ������� ($ref) �������</b> - $refs ������. (13%)<br>"; }
echo "<b>�� �������� ����� $srok ����(��)</b> - $pl ������.";
include "footer.php"; exit;
}


}
?>

<form class="form-3" action="inv?page=inv_ok" method="POST">
<b> �������� �������� ����:</b>
<select id="round4" name="inv">
<option value="plan4">����� &quot;12&quot; - 12 ����� ������ +10% � ���������� (���������� �� 100 �� 2000 ������)</option>
<option value="plan5">����� &quot;24&quot; - 24 ����� ������ +25% � ���������� (���������� �� 200 �� 5000 ������)</option>
<option value="plan6">����� &quot;36&quot; - 36 ����� ������ +50% � ���������� (���������� �� 300 �� 9000 ������)</option>
<option value="plan7">����� &quot;48&quot; - 48 ����� +75% � ���������� (���������� �� 500 �� 15000 ������)</option>
</select><br>
<b> ������� ����� ����������</b>
<input  onkeyup="this.value = this.value.replace (/\D/, '')" type="text" name="summa" size="15" maxlength="14" value="0">
<input class="button blue medium" type="submit" value="������� ����������">
</form>


<?
include "footer.php";
?>
