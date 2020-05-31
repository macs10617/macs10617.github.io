<?
include("header.php");
?>


<?
echo "
<br><br>
<b><h2><center>Получить вклад</center></h2></b>
<br>
<table class=\"simple-little-table\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr >

<th  align=\"center\"><b>ID</b></th>
<th  align=\"center\"><b>Сумма инвестиции</b></th>
<th align=\"center\"><b>К получению</b></th>
<th align=\"center\"><b>Процент к инвестиции</b></th>
<th  align=\"center\"><b>Прошло часов</b></th>
<th  align=\"center\"><b>Статус</b></th>
</tr>
";
$sql="SELECT * FROM tb_inv WHERE login='$rowus[login]'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

$dates=$row['date'];
$l=strtotime($dates);
$n=time();
$cba=round(abs($n-$l)/60/60);

if ($row[pr] == "10") { $it = 12 - $cba; $vsrok = "12"; }
if ($row[pr] == "25") { $it = 24 - $cba; $vsrok = "24"; }
if ($row[pr] == "50") { $it = 36 - $cba; $vsrok = "36"; }
if ($row[pr] == "75") { $it = 48 - $cba; $vsrok = "48"; }

if ($cba > $vsrok)
{
$vdate = "<form class=\"form-3\" method=\"post\" action=\"inv?page=inv_v\">
<input type=\"hidden\" name=\"id\" value=\"$row[id]\">
<input type=\"hidden\" name=\"money2\" value=\"$row[money2]\">
<input  type=\"submit\" value=\"Получить прибыль\">
</form>";
}
else 
{
if ($it == "0") { $it = "менее 1"; }
$vdate="Срок не истек.<br><i>[Осталось $it час(а)]</i>";
}
print"<tr>
<td   style=\"text-align:center;\">$row[id]</td>
<td   style=\"text-align:center;\">$row[money] руб.</td>
<td   style=\"text-align:center;\">$row[money2] руб.</td>
<td   style=\"text-align:center;\">$row[pr]%</td>
<td   style=\"text-align:center;\">$cba час(а)</td>
<td   style=\"text-align:center;\">$vdate</td>
</tr>";
}
print"</table>";
?>
<?
include "footer.php";
?>
