<b><font color=#cc0000>�������� ������������� �� Email ������</font></b><br><br>

<b>������ ������� ���� ������������� ��� ��������:</b><br><br>

<?
$sql="SELECT * FROM tb_users";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$mail = $row[email];
echo "$mail<br>";
}
?>