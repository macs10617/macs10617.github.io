<?php
include("header.php");
?>

<h2>������� ����������</h2>	
<?php


if ($rowus[login]=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ��� ������� � �������� ���������� ������������������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}

if ($_GET["page"]=="del") {

if ($rowus[img]=="") {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! � ��� �� ��������� ����������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;}


$foto_del="$rowus[id].$rowus[img]";
if (unlink("img/avt/$foto_del"))

$upd="UPDATE tb_users SET img='' WHERE id='$rowus[id]'";
mysql_query($upd);

print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">���������� ������� �������!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; 

include("footer.php"); exit;}





if ($_GET["page"]=="post") {



if (empty($_FILES['userfile'])) {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ����������� ���� ��� ��������.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;} 




if ($_FILES['userfile']['size']>1024*256) {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! ������������ ������ ���������� 256 ��.</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;} 


$typed=explode('.', $_FILES['userfile']['name']); 
$ty=$typed[sizeof($typed)-1]; 

if (!($ty=='jpg' || $ty=='jpeg' || $ty=='gif' || $ty=='JPG' || $ty=='JPEG' || $ty=='GIF')) {print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #ff0000 1px solid\"><td width=\"32\"><img src=\"img/error.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#ff0000\">������! �������� ������ �����. ����������� �������� *.jpeg, *.jpg � *.gif</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>"; include("footer.php"); exit;} 

$foto_name=$rowus[id];

copy($_FILES['userfile']['tmp_name'], 'img/avt/'.$foto_name.'.'.$ty); 

$upd="UPDATE tb_users SET img='$ty' WHERE id='$rowus[id]'";
mysql_query($upd);



print"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"BORDER: #00cc00 1px solid\"><td width=\"32\"><img src=\"img/ok.gif\" width=\"32\" height=\"32\" border=\"0\"></td><td><b><font color=\"#00cc00\">���������� ������� ���������!</font></b></td></table><br><br><a href=\"javascript:history.go(-1)\"><< ��������� �����</a>";


include("footer.php"); exit;

}



?>




<form enctype="multipart/form-data" action="new_img?page=post" method="post">
<b>�������� ����:</b><br>
<input class="button blue medium"  type="file" name="userfile"><br>
<i><font color="#999999">������������ ������ ����� 256 ��. ����������� ������� *.jpeg, *.jpg � *.gif</font></i><br><br>
<input class="button blue medium" type="submit" value="��������� ����������">
</form>


<?php
include("footer.php");
?>