<?php
include('pmconfig.php');
include("header.php");
if ($sitestart == "0") { echo "<h2><center>Пополнение баланса через Perfect Money</center></h2><br><br> <font color=red>Пополнение будет возможно после старта проекта.</font>"; include("footer.php"); exit; }

?>

<h2><center>Пополнение баланса через Perfect Money</center></h2>


<?php

if ($rowus['login']=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}

if ($_GET["page"]=="pay") {

$money=str_replace(",",".",$_POST['money']);
$money=round($money, 2);
$rub = number_format($money*$pm['ex'],2,'.',' ');
if ($money<$pm['min']) {
print "<table  id=\"round4\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Минимальная сумма пополнения через PerfectMoney ${$pm['min']}</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>";
include("footer.php");
exit;}
echo '
<p><center>Пополнить баланс на $'.$money.'. Будет зачисленно '.$rub.' руб.</center></p>
<form class="form-3"  action="https://perfectmoney.com/api/step1.asp" method="POST">
<input name="PAYEE_ACCOUNT" value="'.$pm['purse'].'" id="PAYEE_ACCOUNT" type="hidden">
<input name="PAYEE_NAME" value="'.$pm['name'].'" id="PAYEE_NAME" type="hidden">
<input name="PAYMENT_UNITS" value="USD" id="PAYMENT_UNITS" type="hidden">
<input name="PAYMENT_ID" value="'.$rowus['id'].'-'.time().'" id="PAYMENT_ID" type="hidden">
<input name="SUGGESTED_MEMO" value="ADD balance '.$rowus['login'].'" id="SUGGESTED_MEMO" type="hidden">
<input name="SUGGESTED_MEMO_NOCHANGE" value="1" id="SUGGESTED_MEMO_NOCHANGE" type="hidden">
<input name="PAYMENT_URL" value="'.$pm['url'].'" id="PAYMENT_URL" type="hidden">
<input name="PAYMENT_URL_METHOD" value="POST" id="PAYMENT_URL_METHOD" type="hidden">
<input name="NOPAYMENT_URL" value="'.$pm['url'].'" id="NOPAYMENT_URL" type="hidden">
<input name="NOPAYMENT_URL_METHOD" value="POST" id="NOPAYMENT_URL_METHOD" type="hidden">
<input name="STATUS_URL" value="'.$pm['url'].'/status_pm.php" id="STATUS_URL" type="hidden">
<input name="PAYMENT_AMOUNT" value="'.$money.'" id="PAYMENT_AMOUNT" type="hidden">
<center><input type="submit" name="process" value="Пополнить"></center>
</form>';
}else{
?>
<center>
<b>Минимальная сумма платежа</b> - $<?PHP echo $pm['min']; ?><br>
<b>Курс конвертации</b> - $1=30 руб.
<br>
<br></center><center>
<form class="form-3" method="POST" action="pay_pm?page=pay">
<b>Введите сумму платежа:</b><br>
<input type="text" name="money" size="10" maxlength="8" value="5">
<input type="submit" value="Пополнить">
</form>
</center>


<?php
}
include("footer.php");
?>