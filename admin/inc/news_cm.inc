<b><font color=#cc0000>Комментарии к новостям сайта</font></b>

<?

if ($_GET["p"]==add) {

$upd="UPDATE tb_news_cm SET flag='0' WHERE id='$_GET[id]'";
mysql_query($upd);

print" / <font color=#00cc00><b>Комментарий успешно добавлен.</b></font>";
}


if ($_GET["p"]==del) {

$delete="DELETE FROM tb_news_cm WHERE id='$_GET[id]'";
mysql_query($delete);

print" / <font color=#00cc00><b>Комментарий успешно удален.</b></font>";
}



print"<br><br>";

$sql="SELECT * FROM tb_news_cm WHERE flag='1' ORDER BY id ASC";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

print"

<table width=100% border=0>
<td>
<b>Логин пользователя:</b> <a href=index.php?page=search&p=edit&name=$row[user] target=_blank>$row[user]</a><br>
<b>Дата:</b> $row[date]<br>
<b>Комментарий:</b> $row[text]<br>
<a href=index.php?page=news_cm&p=add&id=$row[id]>Добавить</a> / <a href=index.php?page=news_cm&p=del&id=$row[id]>Удалить</a>
</td>
<td></table>";
}
?>
</table>