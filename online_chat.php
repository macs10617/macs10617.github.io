<?php
session_start(); 
include("connect.php");


$user=$_SESSION["user"];

// Процесс авторизации и вывода данных о пользователе

if ($user!="") {

$sqlus="SELECT * FROM tb_users WHERE login='$user'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);


}

// Время обновления в минутах
$upd=time()-90*60;



if ($rowus[id]!="") {


$upd2="UPDATE tb_users SET online=time() WHERE id='$rowus[id]'";
mysql_query($upd2);



$del="DELETE FROM tb_online_chat WHERE time<$upd";
mysql_query($del);


$vy_count=mysql_query("SELECT COUNT(*) FROM tb_online_chat WHERE user='$rowus[id]'");
$vy_row=mysql_fetch_row($vy_count);

if ($vy_row[0]>0) {


$upd1="UPDATE tb_online_chat SET time=time(), user='$rowus[id]' WHERE user='$rowus[id]'";
mysql_query($upd1);


} else {

$time=time();
$add="INSERT INTO tb_online_chat (user, login, img, time) VALUES ('$rowus[id]','$rowus[login]','$rowus[img]','$time')";
mysql_query($add);

}


?>
<style type="text/css">
a {color:#000000; font-size:8pt; font-family:arial; text-decoration: none;}
a:hover {color:#999999; text-decoration: none;}
body {
font-size:9pt;
font-family:arial;
}
</style>
<script>
function msgto(str){
        obj = parent.chattextarea.text;
        obj.focus();
        obj.value = obj.value + str;
}
</script>
<center>
<b>В чате</b><br><br>

<?php

$sql="SELECT * FROM tb_online_chat";
$result=mysql_query($sql);
while($stat=mysql_fetch_array($result)){


$url_f="img/avt/$stat[user].$stat[img]";
 
if ($stat[img]!="") {
$img_avt_30="<img src=\"img_foto_30?$stat[user].$stat[img]\" width=\"30\" border=\"0\">";
} else {
$img_avt_30="<img src=\"img/avt_30.gif\" width=\"30\" border=\"0\">";
}



print"
$img_avt_30<br>
<a href=\"javascript: msgto('$stat[login], ');\">$stat[login]</a>
<br><br>
";

}

}
?>

</center>