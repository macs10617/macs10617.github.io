<?php
include("header.php");
?>


<h2>�������� �����</h2>

<form class="form-3" action= "mess" method= "POST">
<b>� ���� ���:</b>
<input type="text"  name="name" size="30" maxlength="30"><br>
<b>� E-mail ��� ����� � ����:</b><br>
<input type="text"  name="email" size="30" maxlength="30"><br>
<b>� ���� ���������:</b><br>
<textarea   name='mess' cols='60' rows='5'></textarea><br>
<input class="button blue medium" type="submit" value="��������� ���������">
</form>

<?php
include("footer.php");
?>