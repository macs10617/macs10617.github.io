<?php
session_start(); 
include("connect.php");

header("Content-type: text/html; charset=windows-1251");

$ttime=time()-600;

print"
<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\"><tr bgcolor=\"#99ccff\">
<td align=\"center\"><b>�����</b></td>
<td align=\"center\"><b>��������</b></td>
</tr>
";

$user=$_SESSION["user"];

$sqlus="SELECT * FROM tb_users WHERE login='$user'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);

$sql="SELECT login, online_page, referer FROM tb_users WHERE id!='1' AND online>$ttime ORDER BY online DESC";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

if ($row[online_page]=="/account.php") {$pagei="���������� ��������";}
if ($row[online_page]=="/profile.php") {$pagei="������� ��������";}
if ($row[online_page]=="/rekl.php") {$pagei="��������� ���������";}
if ($row[online_page]=="/online.php") {$pagei="������������ ������";}
if ($row[online_page]=="/chat.php") {$pagei="������ ���";}
if ($row[online_page]=="/history.php") {$pagei="������� ��������";}
if ($row[online_page]=="/index.php") {$pagei="������� ��������";}
if ($row[online_page]=="/my_ref.php") {$pagei="������ ���������";}
if ($row[online_page]=="/new_img.php") {$pagei="����� �������";}
if ($row[online_page]=="/news.php") {$pagei="������� �����";}
if ($row[online_page]=="/pay.php") {$pagei="���������� �������";}
if ($row[online_page]=="/qiwi.php") {$pagei="���������� �������. ��������� ������� QIWI-�������.";}
if ($row[online_page]=="/pay_money.php") {$pagei="����� �������";}
if ($row[online_page]=="/registration.php") {$pagei="�����������";}
if ($row[online_page]=="/rules.php") {$pagei="������� �������";}
if ($row[online_page]=="/send_password.php") {$pagei="�������������� ������";}
if ($row[online_page]=="/user_pay.php") {$pagei="��������� �������";}
if ($row[online_page]=="/sendmail.php") {$pagei="�������� �����";}
if ($row[online_page]=="/inv.php") {$pagei="����������";}
if ($row[online_page]=="/faq.php") {$pagei="FAQ";}
if ($row[online_page]=="/404.php") {$pagei="������ 404 (����� �������� �� ����������)";}
if ($row[referer]==$rowus[login]) {$ref1="<img src=\"img/my_r.gif\" width=\"16\" height=\"16\" border=\"0\" align=\"absmiddle\">";} else {$ref1="";}
print"<tr>
<td align=\"center\">$row[login] $ref1</td>
<td align=\"center\">$pagei</td>
</tr>";
}
print"</table>";

?>