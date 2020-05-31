<?
$sqryvar="Select sum(summa) from tb_payme WHERE flag='0'";
$iqryvar=mysql_query($sqryvar);
$tot1=mysql_result($iqryvar,0,0);

print"<b><font color=#cc0000>Выплаты в ожидании на сумму $tot1 руб.</font></b>";
?>

<?

if ($_GET["p"]==post) {

$upd1="UPDATE tb_payme SET flag='$_POST[flag]', text='$_POST[text]' WHERE id='$_POST[id]'";
mysql_query($upd1);

$upd_st="UPDATE tb_stat SET payme=payme+$_POST[summa] WHERE id='1'";
mysql_query($upd_st);

print" / <font color=#00cc00><b>Данные выплаты успешно изменены!</b></font>";
}


print"<br><br>";

$sql="SELECT * FROM tb_payme WHERE flag='0' ORDER BY id ASC LIMIT 25";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

$sqlus="SELECT * FROM tb_users WHERE login='$row[login]'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);

if ($row[op]==1) {$op="<b>Qiwi</b>";}

print"

<table width=100% border=0>
<td>
<b>Логин пользователя:</b> <a href=index.php?page=search&p=edit&name=$row[login] target=_blank>$row[login]</a><br>
<b>Сумма:</b> $row[summa] руб.<br>
<b>Дата заказа:</b> $row[date]<br>
<form action=index.php?page=pay2&p=post method=POST>
<B>Код ваучера:</b> <input type=text name=text value=\"\">
<br>
<b>Статус выплаты</b><br>
<input type=text name=flag value=\"$row[flag]\">
<input type=hidden name=id value=\"$row[id]\">
<input type=hidden name=summa value=\"$row[summa]\">
<br>
<i>Примечание:</i><br>
<u>0</u> - <b>Выплата в обработке</b><br>
<u>1</u> - <b>Выплата сделана</b><br>

<br><br>
<input type=submit value=\"Изменить\">
</form>

</td>
<td>";

print"</td>
</table>


<br><hr>

";}
?>
</table>