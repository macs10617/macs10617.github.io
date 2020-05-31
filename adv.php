<?php
include("header.php");
?>

<h2>Баннеры</h2>

<?php


if ($rowus[login]=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к странице необходимо зарегистрироваться.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< Вернуться назад</a>"; include("footer.php"); exit;}



print"


<center>
<div class=\"form-3\">
<b><font color=\"#f35e29\">Ваша ссылка для привлечения пользователей:</font></b><br>
<input type=\"text\" value=\"http://time-money.biz/?r=$rowus[login]\" size=\"60\" style=\"text-align:center\" readonly>
<br><br><br>
<b><font color=\"#f35e29\">Баннер 468x60 px (вариант 1):</font></b><br>
<textarea rows=\"3\" cols=\"55\" readonly><a href=\"http://time-money.biz/?r=$rowus[login]\"><img src=\"/banner.gif\"></a></textarea>
<br>
<img src=\"/banner.gif\">
</div>
<br><br>

</center>";
?>



<?php
include("footer.php");
?>