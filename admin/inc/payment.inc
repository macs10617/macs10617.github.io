<b><font color=#cc0000>�������� ��������� ��������</font></b>
<br><br>
<center><b>��������� �������</b></center>
<br>
<?
print"<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#99ccff\">

<td align=\"center\"><b>����</b></td>
<td align=\"center\"><b>������������</b></td>
<td align=\"center\"><b>�����</b></td>
<td align=\"center\"><b>����������</b></td>
</tr>";

$max_on_page=50; //���������� ������ �� ��������

$s=intval($_GET[s]);
if ($s=="") {$s=1;}
$s=str_replace("-","", $s);
$s=str_replace("+","", $s);

$start_num = $s==1?0:($s-1)*$max_on_page;

$count=mysql_query("SELECT id FROM tb_history");
$countit=mysql_num_rows($count);


$colp=$countit/$max_on_page;
settype($colp, "integer");


$sql="SELECT * FROM tb_history ORDER BY id DESC LIMIT $start_num, $max_on_page";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

if ($row[flag]==1) {$color="#ff0000";} else {$color="#00cc00";}

print"<tr>
<td align=\"center\">$row[date]</td>
<td align=\"center\">$row[login]</td>
<td align=\"center\"><font color=\"$color\">$row[money] $rowcg[money]</font></td>
<td align=\"center\">$row[text]</td>
</tr>";

$it++;
}

print"</table>";


if ($countit==0) {print"<br><br><center><i><font color=\"#999999\">��� �������� � ��������.</font></i></center><br><br><hr><br><br>";}

$max_on_page2=$max_on_page+1;
if ($countit>$max_on_page) { 
if ($countit>0) { 

$backpage=$s-1;
$nextpage=$s+1;
$bpage=$colp+1;

if ($s==1 | $s=="") {$pb="&lt;&lt; �����";} else {$pb="<a href=index.php?page=payment&s=$backpage>&lt;&lt; �����</a>";}
if ($countit==0 | $bpage==$s) {$pn="������ &gt;&gt;";} else {$pn="<a href=index.php?page=payment&s=$nextpage>������ &gt;&gt;</a>";}

if ($countit>0) {
if ($it=="") {print"<b><font color=#ff0000>������! �������� �������� ���! ��������� �����!</font></b><br><br>";}
}
print"<font color=#000000><b>�������� #: <font color=#ff0000>$s</font> �� <font color=#ff0000>$bpage</font><br>�������� ��������� 50 �������.</b></font><br>$pb | $pn";
}
}





?>
</table>