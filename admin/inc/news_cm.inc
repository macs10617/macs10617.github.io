<b><font color=#cc0000>����������� � �������� �����</font></b>

<?

if ($_GET["p"]==add) {

$upd="UPDATE tb_news_cm SET flag='0' WHERE id='$_GET[id]'";
mysql_query($upd);

print" / <font color=#00cc00><b>����������� ������� ��������.</b></font>";
}


if ($_GET["p"]==del) {

$delete="DELETE FROM tb_news_cm WHERE id='$_GET[id]'";
mysql_query($delete);

print" / <font color=#00cc00><b>����������� ������� ������.</b></font>";
}



print"<br><br>";

$sql="SELECT * FROM tb_news_cm WHERE flag='1' ORDER BY id ASC";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

print"

<table width=100% border=0>
<td>
<b>����� ������������:</b> <a href=index.php?page=search&p=edit&name=$row[user] target=_blank>$row[user]</a><br>
<b>����:</b> $row[date]<br>
<b>�����������:</b> $row[text]<br>
<a href=index.php?page=news_cm&p=add&id=$row[id]>��������</a> / <a href=index.php?page=news_cm&p=del&id=$row[id]>�������</a>
</td>
<td></table>";
}
?>
</table>