<?php
include("header.php");
?>

<h2>��� ��������</h2>

<?php


if ($rowus[login]=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� ������� � �������� ���������� ������������������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}


if ($_GET["page"]=="ref_text") {

print"�� ������ ������� ��������� ����������, ������� ����� ������ ��� ���� ��������. ���������� ������������ ������, �� ���� ��������� �������, ���� �� ����� ������� ������������� (�� ������� ����� ������). ����� �� ���������� �� ���������.
<br><br>
<b><font color=\"#ff0000\">���������:</font></b><br>
- ������������ ������ ��� ������� ����������� ������;<br>
- ������������ ������������� ������� � ����������.
<br><br>
<form class=\"form-3\" action=\"refferals?page=save_ref_text\" method=\"POST\">
<b>� ����������:</b> <font color=\"#999999\">[2000 ��������]</font><br>
<textarea rows=\"5\" cols=\"50\" name=\"text\">$rowus[ref_text]</textarea><br><br>
<input class=\"button blue medium\" type=\"submit\" value=\"���������\">
</form>
";


include("footer.php"); exit;}

if ($_GET["page"]=="save_ref_text") {

$text=htmlspecialchars($_POST[text]);

if (strlen($text) > 2000) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ����� �� ������ ��������� 2000 ��������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}



$update="UPDATE tb_users SET ref_text='$text' WHERE login='$rowus[login]'";
mysql_query($update);


print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">���������� ������� ��������� � ��� ������������ ����� ���������.</font></b></td></table><br><br><i>�� ������ �������������� �� �������� ��������� ����� 3 ���...</i>";
?>
<script language="JavaScript" type="text/javascript">
function Go(){ 
location="refferals"; 
} 
setTimeout( 'Go()', 3000 ); 
</script>

<?php

include("footer.php"); exit;}






$folder=intval($_GET[folder]);

if ($folder<0 OR $folder>3) {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��������� ����� �� ����������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}


if ($rowus[folder2]=="") {$f_n2="����� 1";} else {$f_n2="$rowus[folder2]";}
if ($rowus[folder3]=="") {$f_n3="����� 2";} else {$f_n3="$rowus[folder3]";}





if ($_GET["page"]=="rename_folder") {

print"<form class=\"form-3\" action=\"refferals?page=save_folder\" method=\"POST\">
<input type=\"text\" size=\"30\" value=\"����� �����\" disabled><br>
<input type=\"text\" size=\"30\" value=\"����������\" disabled><br>
<input type=\"text\" name=\"folder2\" size=\"30\" value=\"$f_n2\" maxlength=\"15\"><br>
<input type=\"text\" name=\"folder3\" size=\"30\" value=\"$f_n3\" maxlength=\"15\"><br>
<input class=\"button blue medium\" type=\"submit\" value=\"���������\">
</form>
";


include("footer.php"); exit;}


if ($_GET["page"]=="save_folder") {

$folder2_n=htmlspecialchars($_POST[folder2]);
$folder3_n=htmlspecialchars($_POST[folder3]);

$update="UPDATE tb_users SET folder2='$folder2_n', folder3='$folder3_n' WHERE login='$rowus[login]'";
mysql_query($update);

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">����� ������� ���������������.</font></b></td></table><br><br><i>�� ������ �������������� �� �������� ��������� ����� 3 ���...</i>";
?>
<script language="JavaScript" type="text/javascript">
function Go(){ 
location="refferals"; 
} 
setTimeout( 'Go()', 3000 ); 
</script>

<?php

include("footer.php"); exit;}




if ($_GET["page"]=="folder") {

$id=intval($_POST[id]);
$folder2=intval($_POST[folder]);

$sqlref="SELECT referer FROM tb_users WHERE id='$id'";
$resultref=mysql_query($sqlref);
$rowref=mysql_fetch_array($resultref);

if ($rowref[referer]!=$rowus[login]) {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� �� ������ ��������� ������ ���������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}


$update="UPDATE tb_users SET folder='$folder2' WHERE id='$id'";
mysql_query($update);

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">������� ������� ��������� � ������ �����.</font></b></td></table><br><br><i>�� ������ �������������� �� �������� ��������� ����� 3 ���...</i>";
?>
<script language="JavaScript" type="text/javascript">
function Go(){ 
location="refferals?folder=<?php print"$folder"; ?>"; 
} 
setTimeout( 'Go()', 3000 ); 
</script>

<?php

include("footer.php"); exit;}







if ($_GET["page"]=="search") {

$type=intval($_POST[type]);
$text=htmlspecialchars($_POST[text]);

if ($text=="" or strlen($text) > 25 or strlen($text) < 4) {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ������� ����� ������� �� 4 �� 25 ��������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

if ($type!="1" AND $type!="2") {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ������� ��������� �������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

if ($type=="1") {$metode="login";}
if ($type=="2") {$metode="http_referer";}

$v_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE referer='$rowus[login]' AND $metode LIKE '%$text%'");
$v_row=mysql_fetch_row($v_count);

if ($v_row[0]<1) {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �� ������ ������� ������ �� �������. ���������� ��������� ������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}




$sql="SELECT * FROM tb_users WHERE referer='$rowus[login]' AND $metode LIKE '%$text%'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){



 


if ($row[http_referer]!="") {$sr=substr($row[http_referer],0,25);$hr=" � ����� <b>$sr...</b>";} else {$hr="";}
if ($row[status]==0) {$status="<small><font color=\"#999999\">(������� ��������� ����$hr)</font></small>";}


if ($row[online]=="") {$online="���";} else {$row[online]=date("d.m.Y �. H:i",$row[online]); $online="$row[online]";}

print"
<table border=\"0\" width=\"100%\">
<tr>
<td valign=\"top\" align=\"center\" width=\"50\">
$img_avt_30
</td>
<td>

<b>�����:</b> $row[login] $status<br>
<b>��������� ����:</b> $online<br>
<b>����������:</b><br>
<small>
����� ������� �� ������ <b>$row[all_ref]</b> ���������<br>
<form action=\"refferals?page=folder&folder=$folder\" method=\"POST\">
<b>����������� � �����:</b>
<select id=\"round4\" name=\"folder\">
<option value=\"0\">����� �����</option>
<option value=\"1\">����������</option>
<option value=\"2\">$f_n2</option>
<option value=\"3\">$f_n3</option>
</select>
<input type=\"hidden\" name=\"id\" value=\"$row[id]\">
<input class=\"button blue medium\" type=\"submit\" value=\"OK\">
</form>



<img src=\"img/hr_blue.gif\" width=\"80%\" height=\"1\" border=\"0\"><br><br>
</td></tr></table>

<br><br>
";


}







include("footer.php"); exit;}








if ($folder=="" or $folder=="0") {$fl1="folder2";} else {$fl1="folder";}
if ($folder=="1") {$fl2="folder2";} else {$fl2="folder";}
if ($folder=="2") {$fl3="folder2";} else {$fl3="folder";}
if ($folder=="3") {$fl4="folder2";} else {$fl4="folder";}


print"


<b>����� ���������:</b><br>
<img src=\"img/$fl1.gif\" width=\"18\" height=\"18\" border=\"0\" align=\"absmiddle\"> <a href=\"refferals?folder=0\">����� �����</a>
<img src=\"img/$fl2.gif\" width=\"18\" height=\"18\" border=\"0\" align=\"absmiddle\"> <a href=\"refferals?folder=1\">����������</a>
<img src=\"img/$fl3.gif\" width=\"18\" height=\"18\" border=\"0\" align=\"absmiddle\"> <a href=\"refferals?folder=2\">$f_n2</a>
<img src=\"img/$fl4.gif\" width=\"18\" height=\"18\" border=\"0\" align=\"absmiddle\"> <a href=\"refferals?folder=3\">$f_n3</a>
<br><br>
<img src=\"img/edit_folder.gif\" width=\"18\" height=\"18\" border=\"0\" align=\"absmiddle\"> <a href=\"refferals?page=rename_folder\">������������� �����</a>
<br>
<br>
";




















$s_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE referer='$rowus[login]' AND folder='$folder'");
$s_row=mysql_fetch_row($s_count);


if ($s_row[0]<1) {print"<br><table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">� ������ ����� ��� ���������...</font></b></td></table>"; include("footer.php"); exit;}


print"� ������ ����� <b>$s_row[0]</b> ���������<br><br>";









function yandex_link_bar($s, $folder, $count, $pages_count, $show_link)
{

if ($pages_count == 1) return false;
$sperator = ' ';

$style = 'style="color: #ff0000; text-decoration: none;"';
$begin = $s - intval($show_link / 2);
unset($show_dots);


if ($pages_count <= $show_link + 1) $show_dots = 'no';

if (($begin > 2) && ($pages_count - $show_link > 2)) {
echo '<a '.$style.' href='.$_server['php_self'].'?s=1&folder='.$folder.'> &lt;&lt; </a> ';
}
for ($j = 0; $j <= $show_link; $j++)
{
$i = $begin + $j;

if ($i < 1) continue;

if (!isset($show_dots) && $begin > 1) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.($i-1).'&folder='.$folder.'><b>...</b></a> ';
$show_dots = "no";
}

if ($i > $pages_count) break;
if ($i == $s) {
echo ' <a '.$style.' ><b><u>'.$i.'</u></b></a> ';
} else {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.$i.'&folder='.$folder.'>'.$i.'</a> ';
}

if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

if (($j == $show_link) && ($i < $pages_count)) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.($i+1).'&folder='.$folder.'><b>...</b></a> ';
}
}

if ($begin + $show_link + 1 < $pages_count) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.$pages_count.'&folder='.$folder.'> &gt;&gt; </a>';
}
return true;
}



$perpage = 10;

$s=$_GET['s'];

if ($s=="") {
$s="1";
} 








$count = mysql_numrows(mysql_query("SELECT id FROM tb_users WHERE referer='$rowus[login]' AND folder='$folder'"));
$pages_count = ceil($count / $perpage);


if ($s > $pages_count) $s = $pages_count;
$start_pos = ($s - 1) * $perpage;




$result = mysql_query("SELECT * FROM tb_users WHERE referer='$rowus[login]' AND folder='$folder' ORDER BY id DESC LIMIT $start_pos, $perpage");
while ($row = mysql_fetch_array($result)) {

if ($row[img]!="") {
$img_avt_30="<img src=\"img_foto_30?$row[id].$row[img]\" width=\"30\" border=\"0\">";
} else {
$img_avt_30="<img src=\"img/avt_30.gif\" width=\"30\" border=\"0\">";
}


if ($row[http_referer]!="") {$sr=substr($row[http_referer],0,25);$hr=" � ����� <b>$sr...</b>";} else {$hr="";}
if ($row[status]==0) {$status="<small><font color=\"#999999\">(������� ��������� ����$hr)</font></small>";}


if ($row[online]=="") {$online="���";} else {$row[online]=date("d.m.Y �. H:i",$row[online]); $online="$row[online]";}

print"
<table border=\"0\" width=\"100%\">
<tr>
<td valign=\"top\" align=\"center\" width=\"50\">
$img_avt_30
</td>
<td>

<b>�����:</b> $row[login] $status<br>
<b>��������� ����:</b> $online<br>
<b>����������:</b><br>
<small>
����� ������� �� ������ <b>$row[all_ref]</b> ���������<br>
</small>
<form class=\"form-3\" action=\"refferals?page=folder&folder=$folder\" method=\"POST\">
<b>����������� � �����:</b>
<select id=\"round4\" name=\"folder\">
<option value=\"0\">����� �����</option>
<option value=\"1\">����������</option>
<option value=\"2\">$f_n2</option>
<option value=\"3\">$f_n3</option>
</select>
<input type=\"hidden\" name=\"id\" value=\"$row[id]\">
<input class=\"button blue medium\" type=\"submit\" value=\"OK\">
</form>



<img src=\"img/hr_blue.gif\" width=\"80%\" height=\"1\" border=\"0\"><br><br>
</td></tr></table>

<br>
";




}


print"<br><br><b>��������:</b>";

yandex_link_bar($s, $folder, $count, $pages_count, 10);
?>




<?php
include("footer.php");
?>