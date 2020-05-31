<?php
include("header.php");
?>


<h2>Обратная связь</h2>

<form class="form-3" action= "mess" method= "POST">
<b>» Ваше имя:</b>
<input type="text"  name="name" size="30" maxlength="30"><br>
<b>» E-mail для связи с вами:</b><br>
<input type="text"  name="email" size="30" maxlength="30"><br>
<b>» Ваше сообщение:</b><br>
<textarea   name='mess' cols='60' rows='5'></textarea><br>
<input class="button blue medium" type="submit" value="Отправить сообщение">
</form>

<?php
include("footer.php");
?>