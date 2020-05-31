<?php
include("header.php");
?>


<center><h2>Аккаунт</h2></center>

<?php

if ($rowus[login]=="") {print"<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

 
if ($rowus[img]!="") {
$img_avt_120="<img src=\"img_foto_120?$rowus[id].$rowus[img]\" width=\"120\" border=\"0\">";
} else {
$img_avt_120="<img src=\"img/avt_120.gif\" width=\"120\" border=\"0\">";
}

$rr_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE referer='$rowus[login]'");
$rr_row=mysql_fetch_row($rr_count);



?>
<br><br>




<?php

$ref2="Select sum(all_ref) from tb_users WHERE referer='$rowus[login]'";
$ref2var=mysql_query($ref2);
$ref2varit=mysql_result($ref2var,0,0);

if ($ref2varit!="") {$ref2varit="$ref2varit";} else {$ref2varit="0";}


if ($rr_row[0]!=$rowus[all_ref]) {

$updus="UPDATE tb_users SET all_ref='$rr_row[0]' WHERE login='$rowus[login]'";
mysql_query($updus);

}

if ($rowus[refbek]!="0.000") {$refbek="<font color=\"#00cc00\">+$rowus[refbek]</font> $rowcg[money]";} else {$refbek="";}

print"
<center>
Ваш счёт: 
<font color=\"#007BA7\"> $rowus[money]</font> $rowcg[money] <br>
<strong>Ваша ссылка для привлечения рефералов</strong>
<div class=\"form-3\">
<input type=\"text\" value=\"http://time-money.biz/?r=$rowus[login]\" size=\"50\" style=\"text-align:center\" readonly><br>
</div>
Всего рефералов:

<font color=\"green\">$rr_row[0]</font> шт.<br><br>
<center>
Сделать инвестицию вы можете по этой ссылке <h1><a class=\"add-link\" href = \"inv\">Инвестировать</a></h1><br><br>
 Забрать прибыль вы можете по этой ссылке <h1><a class=\"add-link\" href = \"invv\">Забрать прибыль</a></h1></center>

</td>
</center>


";
?>





<?php

// Ускоряем обновление on-line
$on_time=time()-600;
$st_count6=mysql_query("SELECT COUNT(id) FROM tb_users WHERE online>$on_time");
$st_row6=mysql_fetch_row($st_count6);
$upd_st="UPDATE tb_stat SET online='$st_row6[0]' WHERE id='1'";


include("footer.php");
?>