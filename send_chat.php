<?php
session_start(); 

include("connect.php");

header("Content-type: text/html; charset=windows-1251");

$user=$_SESSION["user"];

// Процесс авторизации и вывода данных о пользователе

if ($user!="") {

$sqlus="SELECT * FROM tb_users WHERE login='$user'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);


}





if ($user=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Для доступа к данной странице необходимо зарегистрироваться.</font></b></td></table>"; exit;}


$count=mysql_query("SELECT COUNT(*) FROM tb_chat2 WHERE name='$rowus[id]'");
$row=mysql_fetch_row($count);

if ($row[0]>0) {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы были блокированы на отправку сообщений.</font></b></td></table>"; exit;}





// Cпам контроль
$all_spam="0";

$sql="SELECT * FROM tb_chat ORDER BY id DESC LIMIT 10";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
if ($row[userid]==$rowus[id]) {
$all_spam++;
}
}

if ($all_spam>8) {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы не можете отправить сообщение! Пожалуйста, подождите некоторое время...</font></b></td></table>"; exit;}





$text=iconv("UTF-8", "cp1251", $_REQUEST['u_text']);


$text=htmlspecialchars($text);
$date=date("d.m.Y г. в H:i");

if ($text=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">Ошибка! Вы не ввели текст сообщения.</font></b></td></table>"; } else {


$add="INSERT INTO tb_chat (user_id, login, img, date, text, moder) VALUES ('$rowus[id]','$rowus[login]','$rowus[img]','$date','$text','$rowus[chat_mod]')";
mysql_query($add);


}




mysql_close($con);

?>

<table border=0 align=center><td>
<form name="chattextarea" id="chat">
<b>Введите текст сообщения:</font><br>
<input type="text" id="u_text" name="text" size="50" maxlength="300">
<input type="submit" value="Отправить" name="submit" id="message1"> <input type="submit" value="Отправить" id="loading2" disabled>
</form></td></table>
<center>
<a href="JavaScript: smile(' :smile: ');"><img src=img/smile/smile.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :D: ');"><img src=img/smile/biggrin.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :razz: ');"><img src=img/smile/razz.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :cool: ');"><img src=img/smile/cool.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :hm: ');"><img src=img/smile/hm.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :wink: ');"><img src=img/smile/wink.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :mad: ');"><img src=img/smile/mad.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :sad: ');"><img src=img/smile/sad.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :cry: ');"><img src=img/smile/cry.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :confused: ');"><img src=img/smile/confused.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :crazy: ');"><img src=img/smile/crazy.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :unsure: ');"><img src=img/smile/unsure.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :sound: ');"><img src=img/smile/sound.gif border=0 width=35 height=20></a>
<a href="JavaScript: smile(' :bad: ');"><img src=img/smile/bad.gif border=0 width=21 height=21></a>
<a href="JavaScript: smile(' :sm: ');"><img src=img/smile/sm.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :flower: ');"><img src=img/smile/flower.gif border=0 width=20 height=20></a>
<a href="JavaScript: smile(' :kiss: ');"><img src=img/smile/kiss.gif border=0 width=20 height=20></a>
<br><br>
</center>


<script>   
        $(document).ready(function(){   
           
            $('#chat').submit(function(){   
                $.ajax({   
                    type: "POST",   
                    url: "send_chat",   
                    data: "u_text="+$("#u_text").val(),   
                    success: function(html){   
                        $("#send_chat").html(html);   
                    }   
                });   
                return false;   
            });   
          

  $("#loading2").ajaxStart(function(){
$(this).show();
$("#message1").hide();
});
$("#loading2").ajaxStop(function(){
$(this).hide();
});
$("#message1").ajaxComplete(function(){
$(this).show();
});


     
        });   
    </script> 