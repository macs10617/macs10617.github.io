<?php
include("header.php");
?>

<h2><center>История ваших операций на проекте</center></h2>


<?php

if ($rowus[login]=="") {print"<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

print"<table class=\"simple-little-table\" width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" ><tr>

<th align=\"center\"><b>Дата</b></th>
<th align=\"center\"><b>Сумма</b></th>
<th align=\"center\"><b>Информация</b></th>
</tr>";




$s_count=mysql_query("SELECT COUNT(id) FROM tb_history WHERE login='$rowus[login]'");
$s_row=mysql_fetch_row($s_count);


if ($s_row[0]<1) {print"</table><br><br><table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">На вашем аккаунте нет операций.</font></b></td></table>"; include("footer.php"); exit;}

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



$count = mysql_numrows(mysql_query("SELECT id FROM tb_history WHERE login='$rowus[login]'"));
$pages_count = ceil($count / $perpage);


if ($s > $pages_count) $s = $pages_count;
$start_pos = ($s - 1) * $perpage;




$result = mysql_query("SELECT * FROM tb_history WHERE login='$rowus[login]' ORDER BY id DESC LIMIT $start_pos, $perpage");
while ($row = mysql_fetch_array($result)) {

if ($row[flag]==1) {$color="#ff0000";} else {$color="#00cc00";}

print"<tr>
<td align=\"center\">$row[date]</td>
<td align=\"center\"><font color=\"$color\">$row[money] $rowcg[money]</font></td>
<td align=\"center\">$row[text]</td>
</tr>";



}


print"</table><br><br><b>Страницы:</b>";

yandex_link_bar($s, $count, $pages_count, 10);



?>





<?php
include("footer.php");
?>