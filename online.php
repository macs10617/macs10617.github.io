<?php
include("header.php");
?>

<h2>Пользователи онлайн</h2>

<?php

if ($_GET["page"]=="who") {


if ($rowus[login]=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к странице необходимо зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

    <script>   
        function show()   
        {   
            $.ajax({   
                url: "up_online",   
                cache: false,   
                success: function(html){   
                    $("#content1").html(html);   
                }   
            });   
        }   
       
        $(document).ready(function(){   
            show();   
            setInterval('show()',3000);   
        });   
    </script>

<?php

$ttime=time()-3600;

print"<b><font color=\"#6699cc\">» Следить за передвижениями пользователей</font></b>
<br><img src=\"img/hr_blue.gif\" width=\"100%\" height=\"2\" border=\"0\"><br><br>


<img src=\"img/online_r.gif\" width=\"16\" height=\"16\" border=\"0\" align=\"absmiddle\"> <b><font color=\"#999999\">Данные обновляются автоматически...</font></b>
<br>
<img src=\"img/my_r.gif\" width=\"16\" height=\"16\" border=\"0\" align=\"absmiddle\"> - значком обозначен Ваш реферал


<div id=\"content1\"></div>";




include("footer.php"); exit;

}


print"<img src=\"img/online_who.gif\" width=\"18\" height=\"18\" border=\"0\" align=\"absmiddle\"> <a href=\"online?page=who\">Следить за передвижениями пользователей</a>
<br><br>



<table width=\"100%\" border=\"0\"><tr><td align=\"center\">";







$ttime=time()-86400;



$s_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE online>$ttime");
$s_row=mysql_fetch_row($s_count);


if ($s_row[0]<1) {print"</table><br><br><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Пользователи не найдены.</font></b></td></table>"; include("footer.php"); exit;}


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



$perpage = 20;

$s=$_GET['s'];

if ($s=="") {
$s="1";
} 








$count = mysql_numrows(mysql_query("SELECT id FROM tb_users WHERE online>$ttime"));
$pages_count = ceil($count / $perpage);


if ($s > $pages_count) $s = $pages_count;
$start_pos = ($s - 1) * $perpage;




$result = mysql_query("SELECT id, img, login, online FROM tb_users WHERE online>$ttime ORDER BY online DESC LIMIT $start_pos, $perpage");
while ($row = mysql_fetch_array($result)) {


// Показываем on-line

$tek_time=time();
$tek_on=$row[online]+3600;

if ($tek_on>$tek_time) {$ya_online_v="<b><font color=\"#009900\">On-line</font></b>";} else {$ya_online_v="<b><font color=\"#ff0000\">Off-line</font></b>";}


if ($row[img]!="") {
$img_avt_80="<img src=\"img_foto_801?$row[id].$row[img]\" height=\"100\" border=\"0\">";
} else {
$img_avt_80="<img src=\"img/avt_80.gif\" height=\"100\" border=\"0\">";
}



print"
<table width=\"200\" border=\"0\" align=\"left\">
<tr>
<td valign=\"top\" width=\"200\" align=\"center\">
$img_avt_80<br>
$row[login]
<br>
$ya_online_v
</td>
</tr>
</table>";

$nn++;
if ($nn==2) {print"<br>"; $nn="0";}




}


print"</table><br><br><b>Страницы:</b>";

yandex_link_bar($s, $count, $pages_count, 10);






?>




<?php
include("footer.php");
?>