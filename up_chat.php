<?php
session_start(); 
include("connect.php");

header("Content-type: text/html; charset=windows-1251");
?>
<script>
function msgto(str){
        obj = parent.chattextarea.text;
        obj.focus();
        obj.value = obj.value + str;
}
</script>

<?php


$user=$_SESSION["user"];

// Процесс авторизации и вывода данных о пользователе

if ($user!="") {

$sqlus="SELECT * FROM tb_users WHERE login='$user'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);


}



if ($rowus[id]!=1) {$itflag="WHERE flag=0";} else {$itflag="";}

$sql="SELECT * FROM tb_chat $itflag ORDER BY id DESC LIMIT 30";
$result=mysql_query($sql);
while($stat=mysql_fetch_array($result)){

if ($stat[name]==Система) {$color="#ff9900";} else {$color="#000000";}

$stat[text]=str_replace(":smile:","<img src=img/smile/smile.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":D:","<img src=img/smile/biggrin.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":razz:","<img src=img/smile/razz.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":cool:","<img src=img/smile/cool.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":hm:","<img src=img/smile/hm.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":wink:","<img src=img/smile/wink.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":mad:","<img src=img/smile/mad.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":sad:","<img src=img/smile/sad.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":cry:","<img src=img/smile/cry.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":confused:","<img src=img/smile/confused.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":crazy:","<img src=img/smile/crazy.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":unsure:","<img src=img/smile/unsure.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":sound:","<img src=img/smile/sound.gif border=0 width=35 height=20>", $stat[text]);
$stat[text]=str_replace(":bad:","<img src=img/smile/bad.gif border=0 width=21 height=21>", $stat[text]);
$stat[text]=str_replace(":sm:","<img src=img/smile/sm.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":flower:","<img src=img/smile/flower.gif border=0 width=20 height=20>", $stat[text]);
$stat[text]=str_replace(":kiss:","<img src=img/smile/kiss.gif border=0 width=20 height=20>", $stat[text]);

$stat[text]=str_replace("*1admin","<img src=img/smile/admin.gif border=0 width=43 height=50>", $stat[text]);
$stat[text]=str_replace("*1flood","<img src=img/smile/flood.gif border=0 width=43 height=50>", $stat[text]);
$stat[text]=str_replace("*1who","<img src=img/smile/who.gif border=0 width=43 height=50>", $stat[text]);
$stat[text]=str_replace("*1huy","<img src=img/smile/huy.gif border=0 width=43 height=50>", $stat[text]);
$stat[text]=str_replace("*1mlya","<img src=img/smile/mlya.gif border=0 width=43 height=50>", $stat[text]);
$stat[text]=str_replace("*1tiho","<img src=img/smile/tiho.gif border=0 width=43 height=50>", $stat[text]);
$stat[text]=str_replace("*1danuvas","<img src=img/smile/danuvas.gif border=0 width=43 height=50>", $stat[text]);

$stat[text]=str_replace("1c1","<h3><font color=#ff0000>", $stat[text]);
$stat[text]=str_replace("1/c1","</font></h3>", $stat[text]);


if ($rowus[chat_mod]==1) {$mod_ban="<a href=\"chat1?page=add_ban&name=$stat[user_id]&fi=$stat[fi]\" class=\"mod\">[Заблокировать]</a>";} else {$mod_ban="";}


if ($rowus[chat_mod]==1 and $stat[flag]==0) {$mod_del="<a href=\"chat1?page=del&id=$stat[id]\" class=\"mod\">[Удалить сообщение]</a>";} else {$mod_del="";}


if ($rowus[id]==1 and $stat[flag]==1) {$rep="<a href=\"chat1?page=rep&id=$stat[id]\">[Восстановить сообщение]</a>";} else {$rep="";}

if ($rowus[id]==1) {$whois="<a href=\"chat1?page=whois&name=$stat[user_id]\" class=\"mod\">[?]</a>";} else {$whois="";}

print"
<table width=\"100%\" border=\"0\">
<td width=\"30\" valign=\"top\">";

 
if ($stat[img]!="") {
$img_avt_30="<img src=\"img_foto_30?$stat[user_id].$stat[img]\" width=\"30\" border=\"0\">";
} else {
$img_avt_30="<img src=\"img/avt_30.gif\" width=\"30\" border=\"0\">";
}


$on_date=date("d.m.Y");
$on_date2=substr($stat[date],0,10);
$on_date3=substr($stat[date],13,21);

if ($on_date==$on_date2) {$it_date_on="Сегодня $on_date3";} else {$it_date_on="$stat[date]";}


print"$img_avt_30</td>
<td>
<b><font color=\"$color\"><a href=\"javascript: msgto('$stat[login], ');\" class=msg1>$stat[login]</a></font></b> $whois
<br>
$stat[text]<br>
<small><font color=\"#999999\">$it_date_on</font></small><br>
$mod_del $rep $mod_ban
<br>
</td>
</table>
<img src=\"img/hr_green.gif\" width=\"100%\" height=\"2\" border=\"0\"><br><br>
";

}


?>
