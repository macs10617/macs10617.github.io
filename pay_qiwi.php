<?php
include("header.php");

if ($sitestart == "0") { echo "<h2><center>���������� ������� ����� QIWI-����</center></h2><br><br> <font color=red>���������� ����� �������� ����� ������ �������.</font>"; include("footer.php"); exit;}

?>

<h2><center>���������� ������� ����� QIWI-����</center></h2>


<?php

if ($rowus[login]=="") {print"<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� ������� � ������ �������� ���������� ������������������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

if ($_GET["page"]=="pay") {

$money=htmlspecialchars($_POST[money]);
$money=str_replace(",",".",$money);
$money=round($money, 2);
$money=number_format($money, 2, '.', '');

if ($money<100.00) {print"<table  id=\"round4\"  width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ����������� ����� ���������� ����� QIWI-������� 100.00 ������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

echo "<br>
<a href=\"http://w.qiwi.ru\" target=\"_blank\"><font color=\"#CC0000\">������� � QIWI-�������</font></a><br>
�������� ������ \"�������\". �������� ����� ��� �������� \"QIWI ����\" <br>
�������� ��� ����� ������ \"������\". <br>
�������� ����� \"���������\". ������ ����� ������: <u>$money</u> ������ e-mail: <b>admin@time-money.biz</b>  � ��� \"��������\" <br>
������������ �������.<br>
<br>
<form class=\"form-3\" action=\"qiwi\" method=\"POST\">
<b>��� e-mail:</b> 
<input  type=\"text\" name=\"payid\" size=\"30\" maxlength=\"50\">
<input type=\"hidden\" name=\"money\" value=\"$money\">

<input type=\"submit\" value=\"��������� ������\">
</form>";
include("footer.php"); exit;}
?><center>
<b>����������� ����� �������</b> - 100 ������<br>
<b>������������ ����� �������</b> - 15000 ������
<br></center><center>

<form class="form-3" method="POST" action="pay_qiwi?page=pay">
<b>������� ����� �������:</b><br>


<input  type="text" name="money" size="10" maxlength="8" value="100">

<input class="button blue medium" type="submit" value="���������">

</form>
</center>



<?php

include("footer.php");
?>