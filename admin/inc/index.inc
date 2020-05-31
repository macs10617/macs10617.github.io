<b><font color=#cc0000>Главная страница</font></b>


<?
$paymoneyt="Select sum(money) from tb_history WHERE text='Пополнение баланса'";
$paymoneyvart=mysql_query($paymoneyt);
$paymoneystt=mysql_result($paymoneyvart,0,0);

$st1_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE vip!=''");
$st1_row=mysql_fetch_row($st1_count);

$st2_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE all_ads!=''");
$st2_row=mysql_fetch_row($st2_count);


echo "<br><br><b>Быстый переход к странице:</b><br>
<form action= \"index.php?$_GET[$st]\" method= \"GET\">
Введите номер страницы: <input type=\"text\" name=\"s\">
<input type=\"submit\" value=\"Перейти\">
</form>";

print"<table border=1 cellspacing=0 cellpadding=0 width=100%>
<tr bgcolor=#cccccc>
<th>ID</th>
<th>Логин</th>
<th>Баланс</th>
<th>Реферер</th>
<th>Информация о браузерах / IP</th>
<th>Функции</th>
</tr>";


$max_on_page=50; //Количество данных на странице

$s=intval($_GET[s]);
if ($s=="") {$s=1;}
$s=str_replace("-","", $s);
$s=str_replace("+","", $s);

$start_num = $s==1?0:($s-1)*$max_on_page;

$count=mysql_query("SELECT id FROM tb_users");
$countit=mysql_num_rows($count);


$colp=$countit/$max_on_page;
settype($colp, "integer");


$sql="SELECT * FROM tb_users ORDER BY id DESC LIMIT $start_num, $max_on_page";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

if ($row[bl]==1) {$bl="<br><font color=#ff0000><b>Блокирован<br>Причина: $row[bl_text]</b></font>";} else {$bl="";}
if ($row[referer]!="") {$ref="$row[referer]";} else {$ref="Отсутствует";}

print"<tr><td align=center>$row[id]</td><td align=center><small>$row[login] $bl</small></td>
<td align=center>$row[money]</td><td align=center>$ref</td><td align=center><small>$row[agent]<br><u>$row[ip]</u></small></td><td align=center><a href=index.php?page=search&p=edit&name=$row[login]>Изменить</a></td></tr>";
$it++;
}
print"</table><br><br>";

$max_on_page2=$max_on_page+1;
if ($countit>$max_on_page) { 
if ($countit>0) { 

$backpage=$s-1;
$nextpage=$s+1;
$bpage=$colp+1;

if ($s==1 | $s=="") {$pb="&lt;&lt; Назад";} else {$pb="<a href=index.php?&s=$backpage>&lt;&lt; Назад</a>";}
if ($countit==0 | $bpage==$s) {$pn="Вперед &gt;&gt;";} else {$pn="<a href=index.php?&s=$nextpage>Вперед &gt;&gt;</a>";}

if ($countit>0) {
if ($it=="") {print"<b><font color=#ff0000>Ошибка! Указаной страницы нет! Вернитесь назад!</font></b><br><br>";}
}
print"<font color=#000000><b>Страница #: <font color=#ff0000>$s</font> из <font color=#ff0000>$bpage</font><br>Показаны последние 50 пользователей.</b></font><br>$pb | $pn<br><br>";
}
}

?>




