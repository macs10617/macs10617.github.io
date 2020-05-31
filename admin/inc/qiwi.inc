<b><font color=#cc0000>Пополнения баланса Qiwi</font></b><br><br>

<?php 
$sql="SELECT * FROM tb_stat";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

echo "
Всего пополнений через Qiwi - $row[money2] рублей.<br><br>
";

if ($_GET["p"]==ok)
{
$date=date("Y-m-d H:i:s");
$id=htmlspecialchars($_POST[id]);
if ($id == "") { echo "Не выбрана заявка"; exit; }
$sql="SELECT * FROM tb_qiwi WHERE id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$add1="UPDATE tb_users SET money=money+$row[money] WHERE login='$row[login]'";
mysql_query($add1);
$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$row[login]','Пополнение баланса Qiwi','+$row[money]','$date','0')";
mysql_query($add2);
$add3="UPDATE tb_stat SET money2=money2+$row[money] WHERE id='1'";
mysql_query($add3);
$delete="DELETE FROM tb_qiwi WHERE id='$id'";
mysql_query($delete);
echo "Заявка $row[id] подтверждена.<br>Пользователю <b>$row[login]</b> зачислено <b>$row[money]</b> рублей<br><br><a href=\"index.php?page=qiwi\">Вернуться на страницу заявок</a>";
exit;
} 

if ($_GET["p"]==del)
{
$id=htmlspecialchars($_POST[id]);
if ($id == "") { echo "Не выбрана заявка"; exit; }
$sql="SELECT * FROM tb_qiwi WHERE id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

$delete="DELETE FROM tb_qiwi WHERE id='$id'";
mysql_query($delete);
echo "Заявка $row[id] удалена.<br><br><a href=\"index.php?page=qiwi\">Вернуться на страницу заявок</a>";
exit;
} 


echo "
<b><font color=\"#00C43A\">» Заявки на пополнение баланса</font></b>
<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#99ccff\">
<br><img src=\"img/hr_green.gif\" width=\"100%\" height=\"2\" border=\"0\"><br><br>
<td align=\"center\"><b>ID заявки</b></td>
<td align=\"center\"><b>Логин</b></td>
<td align=\"center\"><b>Сумма платежа</b></td>
<td align=\"center\"><b>Дата платежа</b></td>
<td align=\"center\"><b>Код транзакции</b></td>
<td align=\"center\"><b>Возможный номер</b></td>
<td align=\"center\"><b>Подтвердить</b></td>
<td align=\"center\"><b>Удалить</b></td>
</tr>
";
$max_on_page=20; //Количество данных на странице

$s=intval($_GET[s]);
if ($s=="") {$s=1;}
$s=str_replace("-","", $s);
$s=str_replace("+","", $s);

$start_num = $s==1?0:($s-1)*$max_on_page;

$count=mysql_query("SELECT id FROM tb_qiwi");
$countit=mysql_num_rows($count);


$colp=$countit/$max_on_page;
settype($colp, "integer");


$sql="SELECT * FROM tb_qiwi ORDER BY id DESC LIMIT $start_num, $max_on_page";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

$ok = "<form method=\"post\" action=\"index.php?page=qiwi&p=ok\">
<input type=\"hidden\" name=\"id\" value=\"$row[id]\">
<input type=\"submit\" value=\"Подтвердить\">
</form>";

$delete = "<form method=\"post\" action=\"index.php?page=qiwi&p=del\">
<input type=\"hidden\" name=\"id\" value=\"$row[id]\">
<input type=\"submit\" value=\"Удалить\">
</form>";

print"<tr>
<td align=\"center\">$row[id]</td>
<td align=\"center\">$row[login]</td>
<td align=\"center\">$row[money] рублей</td>
<td align=\"center\">$row[date]</td>
<td align=\"center\">$row[payid]</td>
<td align=\"center\">$row[phone]</td>
<td align=\"center\">$ok</td>
<td align=\"center\">$delete</td>
</tr>";
}
print"</table><br>";


$max_on_page2=$max_on_page+1;
if ($countit>$max_on_page) { 
if ($countit>0) { 

$backpage=$s-1;
$nextpage=$s+1;
$bpage=$colp+1;

if ($s==1 | $s=="") {$pb="&lt;&lt; Назад";} else {$pb="<a href=index.php?page=invstat&s=$backpage>&lt;&lt; Назад</a>";}
if ($countit==0 | $bpage==$s) {$pn="Вперед &gt;&gt;";} else {$pn="<a href=index.php?page=invstat&s=$nextpage>Вперед &gt;&gt;</a>";}

if ($countit>0) {
}
print"<font color=#000000><b>Страница #: <font color=#ff0000>$s</font> из <font color=#ff0000>$bpage</font><br>Показаны $max_on_page вкладов на 1 страницу.</b></font><br>$pb | $pn";
}
}

?>

