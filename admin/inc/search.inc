<b><font color=#cc0000>����� ������������</font></b>
<?


if ($_GET["p"]==save) {

$add=$_POST[add_vip]*86400;

$update="UPDATE tb_users SET login='$_POST[login]', password='$_POST[password]', email='$_POST[email]', referer='$_POST[referer]', money='$_POST[money]', chat_mod='$_POST[chat_mod]', country='$_POST[country]', click='$_POST[click]', click2='$_POST[click2]', click3='$_POST[click3]', ads_pc='$_POST[ads_pc]', money_ref='$_POST[money_ref]', bl='$_POST[bl]', no_bl='$_POST[no_bl]', bl_text='$_POST[bl_text]', text_all='$_POST[text_all]', bonus='$_POST[bonus]', bonus2='$_POST[bonus2]', rb='$_POST[rb]', task_pc='$_POST[task_pc]', action='$_POST[action]', action_pc='$_POST[action_pc]', vip='$_POST[vip]', flag_pay='$_POST[flag_pay]', sec_flag='$_POST[sec_flag]', credit_vz='$_POST[credit_vz]', credit_vr='$_POST[credit_vr]', phone='$_POST[phone]' WHERE id='$_POST[id]'";
mysql_query($update);

if ($add>0) {
$update1="UPDATE tb_users SET vip=vip+$add WHERE id='$_POST[id]'";
mysql_query($update1);

}


print" / <font color=#00cc00><b>������������ ������� ��������������!</b></font>";

}

if ($_GET["p"]==edit) {

$login=$_GET["name"];

$sql="SELECT * FROM tb_users WHERE login='$login'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);


print"
<form action=index.php?page=search&p=view method=POST target=_blank>
<b>IP:</b> $row[ip]
<input type=hidden name=search value=\"$row[ip]\">
<input type=hidden name=metode value=\"ip\">
<input type=submit value=&gt;&gt;>
</form>

<b>IP all:</b> $row[all_ip]

<form action=index.php?page=search&p=view method=POST target=_blank>
<b>Agent:</b> $row[agent]
<input type=hidden name=search value=\"$row[agent]\">
<input type=hidden name=metode value=\"agent\">
<input type=submit value=&gt;&gt;>
</form>
<br>
<form action=index.php?page=search&p=view method=POST target=_blank>
<input type=hidden name=search value=\"$row[password]\">
<input type=hidden name=metode value=\"password\">
<input type=submit value=\"�������� ������� ������\">
</form>
<br>

<br><br>

";

$st_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE referer='$row[login]'");
$st_row=mysql_fetch_row($st_count);

$tek_time=time();
$tek_on=$row[online]+600;

if ($row[online]==0) {$last_time="�� ������� � �������";} else {
$last_time=date("d.m.Y �. � H:i",$row[online]);
}
$on_date=date("d.m.Y");
$on_date2=substr($last_time,0,10);
$on_date3=substr($last_time,13,21);

if ($on_date==$on_date2) {$it_date_on="������� $on_date3";} else {$it_date_on="$last_time";}


if ($tek_on>$tek_time) {$ya_online="<b><font color=\"#00cc00\">On-line</font></b>";} else {$ya_online="<b><font color=\"#ff0000\">Off-line</font></b><br><small>��������� ���� ���:<br>$it_date_on</small>";}

print"$ya_online<br><br>
<b>����� ���������:</b> $st_row[0] ��.<br>

<hr>



<form method=post action=index.php?page=search&p=save>
<b>ID:</b> $row[id]
<input type=hidden name=id value=$row[id]>
<br>
<b>�����:</b><br><input type=text name=login readonly=readonly value=$row[login]>
<br>
<b>������:</b><br><input type=text name=password readonly=readonly value=\"$row[password]\">
<br>
<b>E-mail:</b><br><input type=text name=email value=\"$row[email]\">
<br>
<b>������:</b><br><input type=text name=country value=\"$row[country]\">
<br>
<b>Referer:</b><br><input type=text name=referer value=\"$row[referer]\">
<br>
<b>������:</b><br><input type=text name=money value=\"$row[money]\">
<br>
<b>�������:</b><br>+ <input type=text name=phone value=\"$row[phone]\">
<br>
<hr>
<b>��������� ����:</b><br><input type=text name=chat_mod value=\"$row[chat_mod]\">
<br>
<b>����������:</b><br><input type=text name=bl value=\"$row[bl]\">
<br>
<b>������� ����������:</b><br><input type=text name=bl_text value=\"$row[bl_text]\">
<br>
<b>�������������� �������������:</b><br><input type=text name=no_bl value=\"$row[no_bl]\">
<br>
<b>������������� e-mail:</b><br><input type=text name=sec_flag value=\"$row[sec_flag]\">
<br>
<br>
<b>�������������� ����������:</b><br>
<textarea name=text_all rows=\"5\" cols=\"50\">$row[text_all]</textarea>
<hr>


<input type=submit value=���������>
</form>


<hr>



<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#99ccff\">

<td align=\"center\"><b>#</b></td>
<td align=\"center\"><b>����</b></td>
<td align=\"center\"><b>�����</b></td>
<td align=\"center\"><b>�����</b></td>
</tr>
";



$sql="SELECT * FROM tb_history WHERE login='$row[login]' ORDER BY id DESC LIMIT 10";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){





print"<tr>

<td align=\"center\">$row[id]</td>
<td align=\"center\">$row[date]</td>
<td align=\"center\">$row[money] ���.</td>
<td align=\"center\">$row[text]</td>
</tr>";


}

print"</table>


<hr>



<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#99ccff\">

<td align=\"center\"><b>#</b></td>
<td align=\"center\"><b>����</b></td>
<td align=\"center\"><b>�����</b></td>
<td align=\"center\"><b>���������� ��� �������</b></td>
<td align=\"center\"><b>���������</b></td>
</tr>
";



$sqlr="SELECT * FROM tb_payme WHERE login='$name' ORDER BY id DESC LIMIT 10";
$resultr=mysql_query($sqlr);
while($rowr=mysql_fetch_array($resultr)){


if ($rowr[flag]==0) {$flag="<font color=\"#999999\">�������</font>";}
if ($rowr[flag]==1) {$flag="<font color=\"#00cc00\">���������</font>";}
if ($rowr[flag]==2) {$flag="<font color=\"#ff0000\">��������</font>";}



print"<tr>

<td align=\"center\">$rowr[id]</td>
<td align=\"center\">$rowr[date]</td>
<td align=\"center\">$rowr[summa] ���.</td>
<td align=\"center\">$rowr[text]</td>
<td align=\"center\">$flag</td>
</tr>";


}

print"</table>";









exit;
}

if ($_GET["p"]==view) {

$search=$_POST["search"];
$metode=$_POST["metode"];
if ($search=="") {print"<br><br>������������ �� ������!"; exit;}

print"<br><br><table border=1 cellspacing=0 cellpadding=0 width=100%>
<tr bgcolor=#cccccc>
<th>ID</th>
<th>�����</th>
<th>������</th>
<th>�������</th>
<th>�������</th>
</tr>";



$select=mysql_query("SELECT * FROM tb_users WHERE $metode LIKE '%$search%'");
while ($row=mysql_fetch_array($select)) {

if ($row[bl]==1) {$bl="<br><font color=#ff0000><b>����������</b></font>";} else {$bl="";}

print"<tr><td align=center>$row[id]</td><td align=center><small>$row[login]<br>$row[password] $bl</small></td>
<td align=center>$row[money] / $row[all_ads_money]</td><td align=center><small>$row[agent]<br><u>$row[ip]</u></small></td><td align=center><a href=index.php?page=search&p=edit&name=$row[login]>��������</a></td></tr>";
}




print"</table><br><br>";

}



?>

<form action=index.php?page=search&p=view method=POST>
<b>�����:</b><br>
<input type=text size=25 name=search>
<br><br>
<b>����� � ����:</b><br>
<select name=metode>
<option value=id>ID</option>
<option value=login>�����</option>
<option value=password>������</option>
<option value=email>E-mail</option>
<option value=ip>IP</option>
<option value=ip_all>IP all</option>
<option value=agent>�����</option>
<option value=referer>Referer</option>
<option value=phone>�������</option>
</select>
<br><br>
<input type=submit value=�����>
</form>