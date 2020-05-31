<?php
include("header.php");
?>

<h2><center>Вывести средства</center></h2>


<?php

$minsum = 50.00;
$tr = "3";
$i_all = "вручную";


if ($rowus[login]=="") {print"<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к странице необходимо зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

$sqld="SELECT date FROM tb_payme WHERE login='$rowus[login]' ORDER BY id DESC LIMIT 1";
$resultd=mysql_query($sqld);        
$rowd=mysql_fetch_array($resultd);

$dated=$rowd[date];
$datet=date("d.m.Y");
$dated=substr($dated,0,10);


if ($_GET["page"]=="qw") {
$qw = htmlspecialchars($_POST[qw]);
$summa = htmlspecialchars($_POST[summa]);
$op = htmlspecialchars($_POST[op]);

$kom = $summa / 100 * 97;
 
if ($summa<$minsum) {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" celqwadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Минимальная сумма $minsum $rowcg[money]</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}
if ($summa>$rowus[money]) {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" celqwadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Указанная вами сумма <b>$summa</b> $rowcg[money] превышает остаток средств на вашем балансе.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



$v_count=mysql_query("SELECT COUNT(id) FROM tb_payme WHERE login='$rowus[login]' AND flag='0'");
$v_row=mysql_fetch_row($v_count);

if ($v_row[0]>0) {print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" celqwadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы не можете вывести средства! Дождитесь обработки предыдущей заявки.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

$paymoney = $rowus[money] - $summa;

$updus="UPDATE tb_users SET money='$paymoney' WHERE id='$rowus[id]'";
mysql_query($updus);

$date=date("d.m.Y г. в H:i");
$add="INSERT INTO tb_payme (login, summa, text, op, date, flag) VALUES ('$rowus[login]','$kom','$qw','$op','$date', '0')";
mysql_query($add);

print"<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" celqwadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">Ваша заявка успешно создана и будет обработана в течение 24 часов.</font></b></td></table>";

include("footer.php"); exit;

}


if ($rowus[money]<$minsum) {$dis="disabled";} else {$dis="";}

print"

Активировать ваучер QIWI необходимо на сайте QIWI на странице <a href=\"https://qiwi.ru/eggs/main.action\" target=\"_blank\">QIWI яйца</a> перейдя по ссылке \"Активировать\". 
<br><br>
<form class=\"form-3\" action=\"pay_money?page=qw\" method=\"POST\">
<b>Минимальная сумма:</b> $minsum $rowcg[money]<br>
<b>Режим выплаты:</b> $i_all<br>
<b>Комиссия системы:</b> $tr%<br>
<b>Укажите сумму:</b> 
<input  type=\"text\" name=\"summa\" size=\"15\" maxlength=\"14\" $dis><i>[Доступно <b>$rowus[money]</b> $rowcg[money]]</i>
<br><br>
<b>» Выберите платёжную систему:</b> <br>

QIWI: <input type=\"radio\" checked=\"checked\" name=\"op\" value=\"1\" $dis>

PM: <input type=\"radio\" name=\"op\" value=\"2\" $dis>
<br><br>
<b>» Введите номер кошелька (для Perfect Money):</b> <br>
<input type=\"text\" name=\"qw\" size=\"15\" maxlength=\"100\" value=\"\"$dis>
<br>

<input class=\"button blue medium\" type=\"submit\" value=\"Создать заявку\" $dis>



</form>


<br><br>
<h2>Ваши заявки на вывод (Последние 10 шт.)</h2><br>

<table class=\"simple-little-table\" width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\"><tr>
<th  align=\"center\"><b>#</b></th>
<th  align=\"center\"><b>Дата</b></th>
<th  align=\"center\"><b>Система</b></th>
<th  align=\"center\"><b>Сумма</b></th>
<th  align=\"center\"><b>Код ваучера/Кошелёк</b></th>
<th  align=\"center\"><b>Результат</b></th>
</tr>
";



$sql="SELECT * FROM tb_payme WHERE login='$rowus[login]' ORDER BY id DESC LIMIT 10";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){


if ($row[flag]==0) {$flag="<font color=\"#999999\">Ожидает</font>";}
if ($row[flag]==1) {$flag="<font color=\"#00cc00\">Выплачено</font>";}
if ($row[flag]==2) {$flag="<font color=\"#ff0000\">Отказано</font>";}

if ($row[op]==1) {$op="Qiwi";}
if ($row[op]==2) {$op="PM";}

print"<tr>

<td  style=\"text-align:center;\">$row[id]</td>
<td  style=\"text-align:center;\">$row[date]</td>
<td  style=\"text-align:center;\">$op</td>
<td  style=\"text-align:center;\">$row[summa] $rowcg[money]</td>
<td  style=\"text-align:center;\">$row[text]</td>
<td  style=\"text-align:center;\">$flag</td>
</tr>";


}

print"</table>";

?>



<?php
include("footer.php");
?>