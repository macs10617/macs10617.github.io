<b><font color=#cc0000>�������� ������</font></b>

<?
if ($_GET["p"]==post) {

$upd="UPDATE tb_users SET money=money+$_POST[money] WHERE login='$_POST[login]'";
mysql_query($upd);

$date=date("d.m.Y �. � H:i");
$add="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$_POST[login]','���������� �������','$_POST[money]','$date','0')";
mysql_query($add);

$update1="UPDATE tb_stat SET money2=money2+$_POST[money] WHERE id='1'";
mysql_query($update1);

print" / <font color=#00cc00><b>������ ������� ��������!</b></font>";
}
?>




<form action="index.php?page=add_money&p=post" method="POST">
<b>�����:</b><br>
<input type="text" name="login">
<br>
<b>����� ����������:</b><br>
<input type="text" name="money" value="0.00">
<br><br>
<input type="submit" value="��������">
</form>