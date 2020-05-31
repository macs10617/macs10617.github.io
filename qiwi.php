<? include "header.php"; ?>
<h2><center>Пополнение баланса через QIWI-кошелёк.</center></h2><br>
<?
if ($rowus[login]=="") {print"<table id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}
$money = $_POST[money];
$payid = $_POST[payid];
$date=date("Y-m-d H:i:s");

if (isset ($money)) 
{
if ($payid == "") { echo "Не указан e-mail"; include "footer.php"; exit; }
$add="INSERT INTO tb_qiwi (login, money, date, payid, phone) VALUES ('$rowus[login]','$money','$date','$payid','$rowus[phone]')";
mysql_query($add);
echo "
<b>Заявка принята и будет обработана в ближайшее время.</b><br><br>
<b>Ваш логин:</b> <u>$rowus[login]</u><br>
<b>Сумма, которая будет зачислена на ваш счет:</b> <u>$money рублей</u><br>
<b>Код ваучера:</b> <u>$payid</u><br><br>
<u>Заявки обрабатываются в срок от 5 минут до 3 часов. (в рабочее время). Рабочее время с 16:00 по 03:00 по Московскому времени</u><br><br>
<b>После пополнения баланса, дождитесь обработки заявки администрацией <br>
и пройдите на страницу Инвестировать, чтобы оформить Инвестицию.";
include("footer.php"); 
exit;
}
else { echo "Ошибка! Вернитесь на страницу пополнения счёта и повторите попытку.";  include "footer.php"; exit; }
?>

<? include "footer.php"; ?>