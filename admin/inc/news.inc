<b><font color=#cc0000>������� �����</font></b>


<?

if ($_GET["p"]==add) {
$title=$_POST["title"];
$text=$_POST["text"];
$dateto=date("d.m.Y �. � H:i");
$add="INSERT INTO tb_news (date, title, text) VALUES ('$dateto', '$title', '$text')";
mysql_query($add);
print" / <font color=#00cc00><b>������� ������� ���������!</b></font>";
}


if ($_GET["p"]==del) {
$id=$_GET["id"];
$delete="DELETE FROM tb_news WHERE id='$id'";
mysql_query($delete);
print" / <font color=#00cc00><b>������� ������� �������!</b></font>";
}
?>
<br><br>
<form action=index.php?page=news&p=add method=POST>
<b>���� �������:</b><br>
<input type=text size=25 name=title>
<br><br>
<b>����� �������:</b><br>
<textarea cols=50 rows=5 name=text></textarea>
<br><br>
<input type=submit value="�������� �������">
</form>
<br><br>

<table border=1 cellspacing=0 cellpadding=0 width=100%>
<tr bgcolor=#cccccc>
<th>�������</th>
<th>�������</th>
</tr>
<?
$sql="SELECT * FROM tb_news ORDER BY id DESC";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

print"<tr><td><b>$row[title]</b><br>$row[text]</td><td align=center><a href=index.php?page=news&p=del&id=$row[id]>�������</a></td></tr>";}
?>
</table>