<?php
include("header.php");
?>
<h2><center>Последние выплаты</center></h2>
<?php


$s_count=mysql_query("SELECT COUNT(id) FROM tb_payme WHERE flag='1'");
$s_row=mysql_fetch_row($s_count);


if ($s_row[0]<1) {print"</table><br><br><table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Выплат еще не было.</font></b></td></table>"; include("footer.php"); exit;}


function yandex_link_bar($s, $count, $pages_count, $show_link)
{

if ($pages_count == 1) return false;
$sperator = ' ';

$style = 'style="color: #ff0000; text-decoration: none;"';
$begin = $s - intval($show_link / 2);
unset($show_dots);


if ($pages_count <= $show_link + 1) $show_dots = 'no';

if (($begin > 2) && ($pages_count - $show_link > 2)) {
echo '<a '.$style.' href='.$_server['php_self'].'?s=1> &lt;&lt; </a> ';
}
for ($j = 0; $j <= $show_link; $j++)
{
$i = $begin + $j;

if ($i < 1) continue;

if (!isset($show_dots) && $begin > 1) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.($i-1).'><b>...</b></a> ';
$show_dots = "no";
}

if ($i > $pages_count) break;
if ($i == $s) {
echo ' <a '.$style.' ><b><u>'.$i.'</u></b></a> ';
} else {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.$i.'>'.$i.'</a> ';
}

if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

if (($j == $show_link) && ($i < $pages_count)) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.($i+1).'><b>...</b></a> ';
}
}

if ($begin + $show_link + 1 < $pages_count) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.$pages_count.'> &gt;&gt; </a>';
}
return true;
}



$perpage = 10;

$s=$_GET['s'];

if ($s=="") {
$s="1";
} 



$count = mysql_numrows(mysql_query("SELECT id FROM tb_payme WHERE flag='1'"));
$pages_count = ceil($count / $perpage);


if ($s > $pages_count) $s = $pages_count;
$start_pos = ($s - 1) * $perpage;


$result = mysql_query("SELECT * FROM tb_payme WHERE flag='1' ORDER BY id DESC LIMIT $start_pos, $perpage");
while ($row = mysql_fetch_array($result)) {

$sqlus2="SELECT img, id, login FROM tb_users WHERE login='$row[login]'";
$resultus2=mysql_query($sqlus2);
$rowus2=mysql_fetch_array($resultus2);


if ($rowus2[img]!="") {
$img_avt_120="<img src=\"img_foto_120?$rowus2[id].$rowus2[img]\" width=\"30\" border=\"0\">";
} else {
$img_avt_120="<img src=\"img/avt_120.gif\" width=\"30\" border=\"0\">";
}

if ($row[op]==1) {$op="Qiwi";}
if ($row[op]==2) {$op="Perfect Money";}

$last_number=substr($row[text],0,10);

print"
<table width=\"100%\" border=\"0\">
<tr>
<td valign=\"top\" width=\"120\" align=\"center\">
<br>
<b>$rowus2[login]</b><br>
</td>
<td valign=\"top\">
<b>Сумма выплаты:</b> $row[summa] руб.<br>
<b>Платёжная система:</b> $op<br>
<b>Статус выплаты:</b> <font color=\"#00cc00\">Обработана</font>
</td></tr>
</table>
<br><br><img src=\"img/hr_blue.gif\" width=\"100%\" height=\"2\" border=\"0\"><br><br>";


}


print"<br><br><b>Страницы:</b>";

yandex_link_bar($s, $count, $pages_count, 10);
?>

<?php
include("footer.php");
?>