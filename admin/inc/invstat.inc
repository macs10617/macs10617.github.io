<b><font color=#cc0000>���������� �������</font></b><br><br>

<?php 
echo "� ������� �������� ����������� �� ������ ������ ������ � �����.<br>
����� ��������� ������������� ������ � ���������� ������ ������������� ��������� �� ��.<br><br>
";

echo "
<b><font color=\"#6699cc\">� ������� ������</font></b>
<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#99ccff\">
<br><img src=\"img/hr_blue.gif\" width=\"100%\" height=\"2\" border=\"0\"><br><br>
<td align=\"center\"><b>ID ������</b></td>
<td align=\"center\"><b>�����</b></td>
<td align=\"center\"><b>����� ������</b></td>
<td align=\"center\"><b>� ���������</b></td>
<td align=\"center\"><b>������� ������</b></td>
<td align=\"center\"><b>������ �����</b></td>
<td align=\"center\"><b>������</b></td>
</tr>
";
$max_on_page=20; //���������� ������ �� ��������

$s=intval($_GET[s]);
if ($s=="") {$s=1;}
$s=str_replace("-","", $s);
$s=str_replace("+","", $s);

$start_num = $s==1?0:($s-1)*$max_on_page;

$count=mysql_query("SELECT id FROM tb_inv");
$countit=mysql_num_rows($count);


$colp=$countit/$max_on_page;
settype($colp, "integer");


$sql="SELECT * FROM tb_inv ORDER BY id DESC LIMIT $start_num, $max_on_page";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

$dates=$row['date'];
$l=strtotime($dates);
$n=time();
$cba=round(abs($n-$l)/60/60);

if ($row[pr] == "10") { $dif1 = 12 - $cba; $vsrok = "12"; }
if ($row[pr] == "25") { $dif1 = 24 - $cba; $vsrok = "24"; }
if ($row[pr] == "50") { $dif1 = 36 - $cba; $vsrok = "36"; }
if ($row[pr] == "75") { $dif1 = 48 - $cba; $vsrok = "48"; }

if ($cba > $vsrok)
{
$vdate = "����� �� ������������ (������������ ����� ������� ���)";
}
else 
{
if ($dif1 == "0") { $dif1 = "����� 1"; }
$vdate = "�� ������������� ������ $dif1 ���(�)";
}
print"<tr>
<td align=\"center\">$row[id]</td>
<td align=\"center\">$row[login]</td>
<td align=\"center\">$row[money] ���.</td>
<td align=\"center\">$row[money2] ���.</td>
<td align=\"center\">$row[pr]%</td>
<td align=\"center\">$cba �����</td>
<td align=\"center\">$vdate</td>
</tr>";
}
print"</table><br>";


$max_on_page2=$max_on_page+1;
if ($countit>$max_on_page) { 
if ($countit>0) { 

$backpage=$s-1;
$nextpage=$s+1;
$bpage=$colp+1;

if ($s==1 | $s=="") {$pb="&lt;&lt; �����";} else {$pb="<a href=index.php?page=invstat&s=$backpage>&lt;&lt; �����</a>";}
if ($countit==0 | $bpage==$s) {$pn="������ &gt;&gt;";} else {$pn="<a href=index.php?page=invstat&s=$nextpage>������ &gt;&gt;</a>";}

if ($countit>0) {
}
print"<font color=#000000><b>�������� #: <font color=#ff0000>$s</font> �� <font color=#ff0000>$bpage</font><br>�������� $max_on_page ������� �� 1 ��������.</b></font><br>$pb | $pn";
}
}

?>


