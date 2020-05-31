<b><font color=#cc0000>–ассылка пользовател€м на Email адреса</font></b><br><br>

<b>—писок адресов всех пользователей дл€ рассылки:</b><br><br>

<?
$sql="SELECT * FROM tb_users";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$mail = $row[email];
echo "$mail<br>";
}
?>