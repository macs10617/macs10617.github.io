<b><font color=#cc0000>Объявления рефералам</font></b>
<?



if ($_GET["p"]==del) {


$update="UPDATE tb_users SET ref_text='' WHERE id='$_GET[id]'";
mysql_query($update);


print" / <font color=#00cc00><b>Объявление успешно удалено!</b></font>";

}
print"<br><br><table border=1 cellspacing=0 cellpadding=0 width=100%>
<tr bgcolor=#cccccc>
<th>Пользователь</th>
<th>Текст</th>
<th>Функции</th>
</tr>";



$select=mysql_query("SELECT * FROM tb_users WHERE ref_text!=''");
while ($row=mysql_fetch_array($select)) {

print"<tr><td align=center><a href=\"index.php?page=search&p=edit&name=$row[login]\" target=\"_blank\">$row[login]</td><td align=center>$row[ref_text]</td>
<td align=center><a href=index.php?page=ref_text&p=del&id=$row[id]>Удалить</a></td></tr>";
}

print"</table><br><br>";

?>
