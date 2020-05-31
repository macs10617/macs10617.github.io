<?php
include("header.php");
?>

<h2>Онлайн чат проекта</h2>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<u>Правила чата:</u><br>
- Запещено размещать сообщения рекламного характера;<br>
- Запрещено оскорбление пользователей и администрации;<br>
- Запрещено размещать сообщения одного содержания;<br>
- Запрещено размещать бессмысленные сообщения;<br>
- Разрешено размещать скриншоты с выплатами (прямыми ссылками);<br>
- Использовать ненормативную лексику;<br>
- В случае нарушения правил чата последует блокировка чата, в случае грубых нарушений - блокировка аккаунта;
<br><br>


<style type="text/css">
#loading1 {
display:none;
}
</style>

<table width=98% border=0 align=center><td>
<iframe src=chat1.php width=100% height=500></iframe>
</td>
<td width=100>
<iframe src=chat2.php width=100% height=500></iframe>
</td>
</table>
<br><br>

<script language=JavaScript type="text/javascript">
function smile(str){
        obj = chattextarea.text;
        obj.focus();
        obj.value = obj.value + str;
}
</script>

<div id="send_chat" onsubmit="javascript:this.submit.disabled=true;">
<table border=0 align=center><td>
<form name="chattextarea" id="chat">
<b>Введите ваше сообщение:</font><br>
<input type="text" id="u_text" name="text" size="120" maxlength="300">
<input type="submit" value="Отправить" name="submit">
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
        $(document).ready(function(qq){   
           
            $('#chat').submit(function(){   
                $.ajax({   
                    type: "POST",   
                    url: "send_chat.php",   
                    data: "u_text="+$("#u_text").val(),   
                    success: function(html){   
                        $("#send_chat").html(html);   
                    }   
                });   
                return false;   
            });   
         


  $("#loading2").ajaxStart(function(qq){
$(this).show();
$("#message1").hide();
});
$("#loading2").ajaxStop(function(qq){
$(this).hide();
});
$("#message1").ajaxComplete(function(qq){
$(this).show();
});



      
        });   
    </script> 
</div>









<?php
include("footer.php");
?>