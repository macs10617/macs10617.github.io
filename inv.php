<?
include("header.php");

if ($sitestart == "0") { echo "<h2><center>Инвестировать</center></h2><br><br> <font color=red>Инвестиции будут возможны после старта проекта.</font>"; include("footer.php"); exit; }
?>

<h2><center>Инвестировать</center></h2>

<? 
if ($rowus[login]=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегестрироваться или авторизоваться в проекте!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}
$mn = $rowus[money];
$date=date("Y-m-d H:i:s");
?>

<?
if ($_GET["page"]=="inv_v") 
{
$id=htmlspecialchars($_POST[id]);
$money2=htmlspecialchars($_POST[money2]);
$sql="SELECT * FROM tb_inv WHERE id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

$dates=$row['date'];
$l=strtotime($dates);
$n=time();
$cba=round(abs($n-$l)/60/60);

if ($row[pr] == "10") { $it = 12 - $cba; $vsrok = "12"; }
if ($row[pr] == "25") { $it = 24 - $cba; $vsrok = "24"; }
if ($row[pr] == "50") { $it = 36 - $cba; $vsrok = "36"; }
if ($row[pr] == "75") { $it = 48 - $cba; $vsrok = "48"; }

if ($id == "") { echo "Пустое значение."; include "footer.php";  exit;}
if ($row[login] != $rowus[login]) { echo "Попытка получить чужую инвестицию."; include "footer.php";  exit;}
if ($money2 != $row[money2]) { echo "Попытка взлома."; include "footer.php";  exit;}
if ($cba < $vsrok) { echo "Вы пытаетесь получить Инвестиция, срок которого не завершен."; include "footer.php"; exit; }
 
$add1="UPDATE tb_users SET money=money+$row[money2] WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','Возврат Инвестиций с $row[pr]%','$row[money2]','$date','0')";
mysql_query($add2);

$delete="DELETE FROM tb_inv WHERE id='$id'";
mysql_query($delete);

$upd_st1="UPDATE tb_stat SET vinv=vinv+$row[money2] WHERE id='1'";
mysql_query($upd_st1);

$ustat2="UPDATE tb_users SET vinv=vinv+$row[money2] WHERE login='$rowus[login]'";
mysql_query($ustat2);

echo "<u>Инвестиция с процентами успешно зачислен на ваш счет</u><br><br>";
echo "<b>Номер Инвестиции:</b> $row[id]<br>";
echo "<b>Сумма Инвестиций:</b> $row[money] рублей<br>";
echo "<b>Вы получили:</b> $row[money2] рублей [+$row[pr]% к Инвестиций]";
include("footer.php"); 
exit;
}

if ($_GET["page"]=="inv_ok") 
{
$inv=htmlspecialchars($_POST[inv]);
$summa=htmlspecialchars($_POST[summa]);
$ref = $rowus[referer];
$refs = $summa/100*13;

if ($inv == "") { echo "Не выбран тарифный план Инвестиции."; include "footer.php"; exit; }


if ($inv == "plan4")
{
$pr = "10";
$srok = "12";
$tarif = "ТАРИФ &quot;12&quot; - 12 часов +10% к инвестиции";
$pl = $summa/100*(100+$pr);
if ($mn < $summa) { echo "На вашем балансе не хватает средств для Инвестиций. Пополните ваш баланс."; include "footer.php";  exit;}
if ($summa < 100) { echo "Минимальная сумма Инвестиций по выбранному вами тарифу 100 рублей."; include "footer.php";  exit;}
if ($summa > 2000) { echo "Максимальная сумма Инвестиций по выбранному вами тарифу 2000 рублей."; include "footer.php";  exit;}

$add1="UPDATE tb_users SET money=money-$summa WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','Инвестиция на срок $srok часа(ов)','$summa','$date','1')";
mysql_query($add2);

$add3="INSERT INTO tb_inv (login, money, money2, pr, date) VALUES ('$rowus[login]','$summa','$pl','$pr','$date')";
mysql_query($add3);

if (!empty($ref))
{
$add4="UPDATE tb_users SET money=money+$refs WHERE login='$ref'";
mysql_query($add4);

$add5="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$ref','Процент с вклада вашего реферала $rowus[login] (13%)','$refs','$date','0')";
mysql_query($add5);

$add6="UPDATE tb_stat SET vinv=vinv+$refs WHERE id='1'";
mysql_query($add6);

$ustat1="UPDATE tb_users SET vinv=vinv+$refs WHERE login='$ref'";
mysql_query($ustat1);
}

$add7="UPDATE tb_stat SET sinv=sinv+$summa WHERE id='1'";
mysql_query($add7);

$upd_st="UPDATE tb_stat SET inv=inv+1 WHERE id='1'";
mysql_query($upd_st);

$ustat="UPDATE tb_users SET sinv=sinv+$summa WHERE login='$rowus[login]'";
mysql_query($ustat);

echo "<u>Инвестиция успешно зарегистрирована</u><br><br>";
echo "<b>Тарифный план</b> - $tarif.<br>";
echo "<b>Ваша сумма Инвестиций</b> - $summa рублей.<br>";
echo "<b>Срок Инвестиций</b> - $srok часа(ов).<br>";
echo "<b>Процент Инвестиций</b> - $pr%.<br>";
if (!empty($ref)) { echo "<b>Ваш реферер ($ref) получил</b> - $refs рублей. (13%)<br>"; }
echo "<b>Вы получите через $srok часа(ов)</b> - $pl рублей.";
include "footer.php"; exit;
}

if ($inv == "plan5")
{
$pr = "25";
$srok = "24";
$tarif = "ТАРИФ &quot;24&quot; - 24 часов +25% к инвестиции";
$pl = $summa/100*(100+$pr);
if ($mn < $summa) { echo "На вашем балансе не хватает средств для Инвестиций. Пополните ваш баланс."; include "footer.php";  exit;}
if ($summa < 200) { echo "Минимальная сумма Инвестиций по выбранному вами тарифу 200 рублей."; include "footer.php";  exit;}
if ($summa > 5000) { echo "Максимальная сумма Инвестиций по выбранному вами тарифу 5000 рублей."; include "footer.php";  exit;}

$add1="UPDATE tb_users SET money=money-$summa WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','Инвестиция на срок $srok часа(ов)','$summa','$date','1')";
mysql_query($add2);

$add3="INSERT INTO tb_inv (login, money, money2, pr, date) VALUES ('$rowus[login]','$summa','$pl','$pr','$date')";
mysql_query($add3);

if (!empty($ref))
{
$add4="UPDATE tb_users SET money=money+$refs WHERE login='$ref'";
mysql_query($add4);

$add5="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$ref','Процент с вклада вашего реферала $rowus[login] (13%)','$refs','$date','0')";
mysql_query($add5);

$add6="UPDATE tb_stat SET vinv=vinv+$refs WHERE id='1'";
mysql_query($add6);

$ustat1="UPDATE tb_users SET vinv=vinv+$refs WHERE login='$ref'";
mysql_query($ustat1);
}

$add7="UPDATE tb_stat SET sinv=sinv+$summa WHERE id='1'";
mysql_query($add7);

$upd_st="UPDATE tb_stat SET inv=inv+1 WHERE id='1'";
mysql_query($upd_st);

$ustat="UPDATE tb_users SET sinv=sinv+$summa WHERE login='$rowus[login]'";
mysql_query($ustat);

echo "<u>Инвестиция успешно зарегистрирован</u><br><br>";
echo "<b>Тарифный план</b> - $tarif.<br>";
echo "<b>Ваша сумма Инвестиций</b> - $summa рублей.<br>";
echo "<b>Срок Инвестиций</b> - $srok часа(ов).<br>";
echo "<b>Процент Инвестиций</b> - $pr%.<br>";
if (!empty($ref)) { echo "<b>Ваш реферер ($ref) получил</b> - $refs рублей. (13%)<br>"; }
echo "<b>Вы получите через $srok часа(ов)</b> - $pl рублей.";
include "footer.php"; exit;
}

if ($inv == "plan6")
{
$pr = "50";
$srok = "36";
$tarif = "ТАРИФ &quot;36&quot; - 36 часов +50% к инвестиции";
$pl = $summa/100*(100+$pr);
if ($mn < $summa) { echo "На вашем балансе не хватает средств для Инвестиций. Пополните ваш баланс."; include "footer.php";  exit;}
if ($summa < 300) { echo "Минимальная сумма Инвестиций по выбранному вами тарифу 300 рублей."; include "footer.php";  exit;}
if ($summa > 9000) { echo "Максимальная сумма Инвестиций по выбранному вами тарифу 9000 рублей."; include "footer.php";  exit;}

$add1="UPDATE tb_users SET money=money-$summa WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','Инвестиция на срок $srok часа(ов)','$summa','$date','1')";
mysql_query($add2);

$add3="INSERT INTO tb_inv (login, money, money2, pr, date) VALUES ('$rowus[login]','$summa','$pl','$pr','$date')";
mysql_query($add3);

if (!empty($ref))
{
$add4="UPDATE tb_users SET money=money+$refs WHERE login='$ref'";
mysql_query($add4);

$add5="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$ref','Процент с вклада вашего реферала $rowus[login] (13%)','$refs','$date','0')";
mysql_query($add5);

$add6="UPDATE tb_stat SET vinv=vinv+$refs WHERE id='1'";
mysql_query($add6);

$ustat1="UPDATE tb_users SET vinv=vinv+$refs WHERE login='$ref'";
mysql_query($ustat1);
}

$add7="UPDATE tb_stat SET sinv=sinv+$summa WHERE id='1'";
mysql_query($add7);

$upd_st="UPDATE tb_stat SET inv=inv+1 WHERE id='1'";
mysql_query($upd_st);

$ustat="UPDATE tb_users SET sinv=sinv+$summa WHERE login='$rowus[login]'";
mysql_query($ustat);

echo "<u>Инвестиция успешно зарегистрирован</u><br><br>";
echo "<b>Тарифный план</b> - $tarif.<br>";
echo "<b>Ваша сумма Инвестиций</b> - $summa рублей.<br>";
echo "<b>Срок Инвестиций</b> - $srok часа(ов).<br>";
echo "<b>Процент Инвестиций</b> - $pr%.<br>";
if (!empty($ref)) { echo "<b>Ваш реферер ($ref) получил</b> - $refs рублей. (13%)<br>"; }
echo "<b>Вы получите через $srok часа(ов)</b> - $pl рублей.";
include "footer.php"; exit;
}


if ($inv == "plan7")
{
$pr = "75";
$srok = "48";
$tarif = "ТАРИФ &quot;48&quot; - 48 часов +75% к инвестиции";
$pl = $summa/100*(100+$pr);
if ($mn < $summa) { echo "На вашем балансе не хватает средств для Инвестиций. Пополните ваш баланс."; include "footer.php";  exit;}
if ($summa < 500) { echo "Минимальная сумма Инвестиций по выбранному вами тарифу 500 рублей."; include "footer.php";  exit;}
if ($summa > 15000) { echo "Максимальная сумма Инвестиций по выбранному вами тарифу 15000 рублей."; include "footer.php";  exit;}

$add1="UPDATE tb_users SET money=money-$summa WHERE login='$rowus[login]'";
mysql_query($add1);

$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$rowus[login]','Инвестиция на срок $srok часа(ов)','$summa','$date','1')";
mysql_query($add2);

$add3="INSERT INTO tb_inv (login, money, money2, pr, date) VALUES ('$rowus[login]','$summa','$pl','$pr','$date')";
mysql_query($add3);

if (!empty($ref))
{
$add4="UPDATE tb_users SET money=money+$refs WHERE login='$ref'";
mysql_query($add4);

$add5="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('$ref','Процент с вклада вашего реферала $rowus[login] (13%)','$refs','$date','0')";
mysql_query($add5);

$add6="UPDATE tb_stat SET vinv=vinv+$refs WHERE id='1'";
mysql_query($add6);

$ustat1="UPDATE tb_users SET vinv=vinv+$refs WHERE login='$ref'";
mysql_query($ustat1);
}

$add7="UPDATE tb_stat SET sinv=sinv+$summa WHERE id='1'";
mysql_query($add7);

$upd_st="UPDATE tb_stat SET inv=inv+1 WHERE id='1'";
mysql_query($upd_st);

$ustat="UPDATE tb_users SET sinv=sinv+$summa WHERE login='$rowus[login]'";
mysql_query($ustat);

echo "<u>Инвестиция успешно зарегистрирован</u><br><br>";
echo "<b>Тарифный план</b> - $tarif.<br>";
echo "<b>Ваша сумма Инвестиций</b> - $summa рублей.<br>";
echo "<b>Срок Инвестиций</b> - $srok часа(ов).<br>";
echo "<b>Процент Инвестиций</b> - $pr%.<br>";
if (!empty($ref)) { echo "<b>Ваш реферер ($ref) получил</b> - $refs рублей. (13%)<br>"; }
echo "<b>Вы получите через $srok часа(ов)</b> - $pl рублей.";
include "footer.php"; exit;
}


}
?>

<form class="form-3" action="inv?page=inv_ok" method="POST">
<b> Выберите тарифный план:</b>
<select id="round4" name="inv">
<option value="plan4">ТАРИФ &quot;12&quot; - 12 часов работы +10% к инвестиции (инвестиции от 100 до 2000 рублей)</option>
<option value="plan5">ТАРИФ &quot;24&quot; - 24 часов работы +25% к инвестиции (инвестиции от 200 до 5000 рублей)</option>
<option value="plan6">ТАРИФ &quot;36&quot; - 36 часов работы +50% к инвестиции (инвестиции от 300 до 9000 рублей)</option>
<option value="plan7">ТАРИФ &quot;48&quot; - 48 часов +75% к инвестиции (инвестиции от 500 до 15000 рублей)</option>
</select><br>
<b> Укажите сумму инвестиции</b>
<input  onkeyup="this.value = this.value.replace (/\D/, '')" type="text" name="summa" size="15" maxlength="14" value="0">
<input class="button blue medium" type="submit" value="Сделать инвестицию">
</form>


<?
include "footer.php";
?>
