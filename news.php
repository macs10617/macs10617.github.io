<?php
include("header.php");
?>

<h2><center>Новости сайта</center></h2>

<?php


if ($_GET["page"]=="post_c") {

if ($rowus[login]=="") {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($rowus[id]!="1") {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы не можете добавить ответ.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$id=intval($_POST[id]);
$id2=intval($_POST[id2]);
$text=htmlspecialchars($_POST[text]);

if ($text=="" OR strlen($text) > 360) {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы не указали текст или он превышает 360 символов.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$update="UPDATE tb_news_cm SET text2='$text' WHERE id='$id2'";
mysql_query($update);


print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">Ваш комментарий успешно добавлен.</font></b></td></table><br><br><i>Вы будете перенаправлены на страницу новостей через 5 сек...</i>";
?>
<script language="JavaScript" type="text/javascript">
function Go(){ 
location="<?php print"news?page=comments&id=$id"; ?>"; 
} 
setTimeout( 'Go()', 5000 ); 
</script>

<?php


include("footer.php"); exit;

}



if ($_GET["page"]=="post") {

if ($rowus[login]=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



$id=intval($_POST[id]);
$text=htmlspecialchars($_POST[text]);

$sqlqw="SELECT * FROM tb_news WHERE id='$id'";
$resultqw=mysql_query($sqlqw);
$rowqw=mysql_fetch_array($resultqw);

if ($rowqw[id]=="") {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Данной новости не существует!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


if ($text=="" OR strlen($text) > 360) {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы не указали текст или он превышает 360 символов.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$date=date("d.m.Y г. в H:i");
$add="INSERT INTO tb_news_cm (user, text, date, num, flag) VALUES ('$rowus[login]','$text','$date','$id','1')";
mysql_query($add);

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">Ваш комментарий отправлен на проверку и будет добавлен в течение 24 часов.</font></b></td></table><br><br><i>Вы будете перенаправлены на страницу новостей через 3 сек...</i>";
?>
<script language="JavaScript" type="text/javascript">
function Go(){ 
location="<?php print"news?page=comments&id=$id"; ?>"; 
} 
setTimeout( 'Go()', 3000 ); 
</script>

<?php


include("footer.php"); exit;

}




if ($_GET["page"]=="del") {

$id=intval($_GET[id]);
$id2=intval($_GET[id2]);

if ($rowus[login]=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($rowus[chat_mod]=="0") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Недостаточно прав.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$sqlqw="SELECT * FROM tb_news_cm WHERE id='$id'";
$resultqw=mysql_query($sqlqw);
$rowqw=mysql_fetch_array($resultqw);

if ($rowqw[id]=="") {print"<table id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Данного комментария не существует!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

$delete="DELETE FROM tb_news_cm WHERE id='$id'";
mysql_query($delete);

print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">Комментарий успешно удален.</font></b></td></table><br><br><i>Вы будете перенаправлены на страницу новостей через 3 сек...</i>";
?>
<script language="JavaScript" type="text/javascript">
function Go(){ 
location="<?php print"news?page=comments&id=$id2"; ?>"; 
} 
setTimeout( 'Go()', 3000 ); 
</script>

<?php

include("footer.php"); exit;

}



if ($_GET["page"]=="comments") {

$id=intval($_GET[id]);

$sqlqw="SELECT * FROM tb_news WHERE id='$id'";
$resultqw=mysql_query($sqlqw);
$rowqw=mysql_fetch_array($resultqw);

if ($rowqw[id]=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Данной новости не существует!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}


$sqlqw2="SELECT id FROM tb_news ORDER BY id DESC LIMIT 1";
$resultqw2=mysql_query($sqlqw2);
$rowqw2=mysql_fetch_array($resultqw2);

if ($rowus[login]!="") {
if ($rowus[news]!=$rowqw2[id]) {

$upd="UPDATE tb_users SET news='$rowqw2[id]' WHERE id='$rowus[id]'";
mysql_query($upd);

}


}


$rowqw[text]=str_replace("\n","<br>",$rowqw[text]);
$rowqw[text]=str_replace("\n","<br>",$rowqw[text]);
$rowqw[text]=str_replace("[b]","<b>",$rowqw[text]);
$rowqw[text]=str_replace("[/b]","</b>",$rowqw[text]);
$rowqw[text]=str_replace("[i]","<i>",$rowqw[text]);
$rowqw[text]=str_replace("[/i]","</i>",$rowqw[text]);
$rowqw[text]=str_replace("[u]","<u>",$rowqw[text]);
$rowqw[text]=str_replace("[/u]","</u>",$rowqw[text]);


print"<img src=\"img/news.gif\" width=\"16\" height=\"16\" border=\"0\" align=\"absmiddle\"> <b><font color=\"#ff9933\">$rowqw[title]</font></b><br>$rowqw[text]<br><font color=\"#999999\">Дата добавления: $rowqw[date] г.</font><br><br><img src=\"img/hr_blue.gif\" width=\"100%\" height=\"2\" border=\"0\"><br><br>


";





$s_count=mysql_query("SELECT COUNT(id) FROM tb_news_cm WHERE num='$rowqw[id]'");
$s_row=mysql_fetch_row($s_count);


if ($s_row[0]>0) {






function yandex2_link_bar($s, $num, $count, $pages_count, $show_link)
{

if ($pages_count == 1) return false;
$sperator = ' ';

$style = 'style="color: #ff0000; text-decoration: none;"';
$begin = $s - intval($show_link / 2);
unset($show_dots);


if ($pages_count <= $show_link + 1) $show_dots = 'no';

if (($begin > 2) && ($pages_count - $show_link > 2)) {
echo '<a '.$style.' href='.$_server['php_self'].'?s=1&id='.$num.'&page=comments> &lt;&lt; </a> ';
}
for ($j = 0; $j <= $show_link; $j++)
{
$i = $begin + $j;

if ($i < 1) continue;

if (!isset($show_dots) && $begin > 1) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.($i-1).'&id='.$num.'&page=comments><b>...</b></a> ';
$show_dots = "no";
}

if ($i > $pages_count) break;
if ($i == $s) {
echo ' <a '.$style.' ><b><u>'.$i.'</u></b></a> ';
} else {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.$i.'&id='.$num.'&page=comments>'.$i.'</a> ';
}

if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

if (($j == $show_link) && ($i < $pages_count)) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.($i+1).'&id='.$num.'&page=comments><b>...</b></a> ';
}
}

if ($begin + $show_link + 1 < $pages_count) {
echo ' <a '.$style.' href='.$_server['php_self'].'?s='.$pages_count.'&id='.$num.'&page=comments> &gt;&gt; </a>';
}
return true;
}



$perpage = 10;

$s=$_GET['s'];

if ($s=="") {
$s="1";
} 








$count = mysql_numrows(mysql_query("SELECT id FROM tb_news_cm WHERE num='$rowqw[id]'"));
$pages_count = ceil($count / $perpage);


if ($s > $pages_count) $s = $pages_count;
$start_pos = ($s - 1) * $perpage;




$result = mysql_query("SELECT * FROM tb_news_cm WHERE num='$rowqw[id]' AND flag='0' ORDER BY id DESC LIMIT $start_pos, $perpage");
while ($stat = mysql_fetch_array($result)) {

$stat[text]=str_replace("\n","<br>",$stat[text]);

$sqlus2="SELECT img, id, login FROM tb_users WHERE login='$stat[user]'";
$resultus2=mysql_query($sqlus2);
$rowus2=mysql_fetch_array($resultus2);


if ($rowus2[img]!="") {
$img_avt_30="<img src=\"img_foto_30?$rowus2[id].$rowus2[img]\" width=\"30\" border=\"0\">";
} else {
$img_avt_30="<img src=\"img/avt_30.gif\" width=\"30\" border=\"0\">";
}

if ($rowus[login]!="") {
if ($rowus[chat_mod]==1) {
$del_link="<br><br><a href=\"news?page=del&id=$stat[id]&id2=$stat[num]\">[Удалить сообщение]</a>";
}

if ($rowus[id]==1) {
$c_link="<br><br><form action=\"news?page=post_c\" method=\"POST\">
<input type=\"text\" name=\"text\" size=\"50\" maxlength=\"360\">
<input type=\"hidden\" name=\"id\" value=\"$stat[num]\">
<input type=\"hidden\" name=\"id2\" value=\"$stat[id]\">
<input type=\"submit\" value=\"Добавить\">
</form>";
}


}





if ($stat[text2]!="") {$text2="<br><b><font color=\"#ff0000\">Ответ: $stat[text2]</font></b><br>";} else {$text2="";}

print"
<table width=\"100%\" border=\"0\">
<tr>
<td valign=\"top\" width=\"80\" align=\"center\">
$img_avt_30<br>
$rowus2[login]

</td>
<td valign=\"top\">
$stat[text]<br>$text2

<small><font color=\"#999999\">$stat[date]</font></small>

$del_link $c_link

</td></tr>
</table>
<br><br><img src=\"img/hr_blue.gif\" width=\"100%\" height=\"2\" border=\"0\"><br><br>";



}


print"<br><br><b>Страницы:</b>";

$nm=$rowqw[id];
yandex2_link_bar($s, $nm, $count, $pages_count, 10);
print"<br><br>";

}



if ($rowus[login]!="") {

$news2="SELECT id FROM tb_news ORDER BY id DESC LIMIT 1";
$cnews2=mysql_query($news2);
$rownews2=mysql_fetch_array($cnews2);

if ($id==$rownews2[id]) {

$st_countn=mysql_query("SELECT COUNT(*) FROM tb_users WHERE news='$id'");
$st_rown=mysql_fetch_row($st_countn);

print"<font color=\"#999999\">Новость прочитали $st_rown[0] пользователей</font>";
}



}

include("footer.php"); exit;

}

$s_count=mysql_query("SELECT COUNT(id) FROM tb_news");
$s_row=mysql_fetch_row($s_count);


if ($s_row[0]<1) {print"</table><br><br><table id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Новостей не найдено.</font></b></td></table>"; include("footer.php"); exit;}



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








$count = mysql_numrows(mysql_query("SELECT id FROM tb_news"));
$pages_count = ceil($count / $perpage);


if ($s > $pages_count) $s = $pages_count;
$start_pos = ($s - 1) * $perpage;




$result = mysql_query("SELECT * FROM tb_news ORDER BY id DESC LIMIT $start_pos, $perpage");
while ($row = mysql_fetch_array($result)) {

$row[text]=str_replace("\n","<br>",$row[text]);
$row[text]=str_replace("[b]","<b>",$row[text]);
$row[text]=str_replace("[/b]","</b>",$row[text]);
$row[text]=str_replace("[i]","<i>",$row[text]);
$row[text]=str_replace("[/i]","</i>",$row[text]);
$row[text]=str_replace("[u]","<u>",$row[text]);
$row[text]=str_replace("[/u]","</u>",$row[text]);



print"<img src=\"img/news.gif\" width=\"16\" height=\"16\" border=\"0\" align=\"absmiddle\"> <b><font color=\"#ff9933\">$row[title]</font></b><br>$row[text]<br><font color=\"#999999\">Дата добавления: $row[date] г.</font><br><br><a href=\"news?page=comments&id=$row[id]\">Перейти к новости &gt;&gt;</a><br><br><img src=\"img/hr_blue.gif\" width=\"100%\" height=\"2\" border=\"0\"><br><br>";



}


print"<br><br><b>Страницы:</b>";

yandex_link_bar($s, $count, $pages_count, 10);
?>




<?php
include("footer.php");
?>