<?php
include("header.php");

if ($sitestart == "0") { echo "<h2><center>Пополнение баланса через QIWI-Яйца</center></h2><br><br> <font color=red>Пополнение будет возможно после старта проекта.</font>"; include("footer.php"); exit;}

?>

<h2><center>Пополнение баланса через QIWI-Яйца</center></h2>


<?php

if ($rowus[login]=="") {print"<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($_GET["page"]=="pay") {

$money=htmlspecialchars($_POST[money]);
$money=str_replace(",",".",$money);
$money=round($money, 2);
$money=number_format($money, 2, '.', '');

if ($money<100.00) {print"<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Минимальная сумма пополнения через QIWI-Кошелек 100.00 рублей.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

echo "<br>
<a href=\"http://w.qiwi.ru\" target=\"_blank\"><font color=\"#CC0000\">Войдите в QIWI-кошелек</font></a><br>
Выбираем раздел \"Перевод\". Выбираем слева тип перевода \"QIWI Яйца\" <br>
Нажимаем под яйцом кнопку \"Купить\". <br>
Выбираем пункт \"Отправить\". Вводим сумму вклада: <u>$money</u> вводим e-mail: <b>admin@time-money.biz</b>  и жмём \"Оплатить\" <br>
Подтверждаем покупку.<br>
<br>
<form class=\"form-3\" action=\"qiwi\" method=\"POST\">
<b>Ваш e-mail:</b> 
<input  type=\"text\" name=\"payid\" size=\"30\" maxlength=\"50\">
<input type=\"hidden\" name=\"money\" value=\"$money\">

<input type=\"submit\" value=\"Пополнить баланс\">
</form>";
include("footer.php"); exit;}
?><center>
<b>Минимальная сумма платежа</b> - 100 рублей<br>
<b>Максимальная сумма платежа</b> - 15000 рублей
<br></center><center>

<form class="form-3" method="POST" action="pay_qiwi?page=pay">
<b>Введите сумму платежа:</b><br>


<input  type="text" name="money" size="10" maxlength="8" value="100">

<input class="button blue medium" type="submit" value="Пополнить">

</form>
</center>



<?php

include("footer.php");
?>