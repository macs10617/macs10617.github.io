<div class="main_news_top"></div>

<div class="main_news_center">
<div class="main_news_title">����� �����</div>



<div class="vyvesti_info">
<?php
if($d_vyvod!=0){
echo '<div class="vyvesti_error">����� ����� �������������</div>';
}
else{
echo '����� �� '.$d_wmin.' �� '.$d_wmax.' ���
<br>
<br>��� ��������� ���������� �������:
<br>������� � ���� ������ �� ����� <a target="_blank" style="color:#009000;text-decoration:underline;font-weight:bold;" href="https://w.qiwi.com">w.qiwi.com</a>
<br>�������� ������ "�������". �������� ����� ��� �������� "QIWI ����"
<br>�������� "������������" � ������ ��������� ��� �������.
';
}
?>
</div>



<?php
if($d_vyvod==0){

$b_tot=0;
$b_plus=0;
$b_otn=0;

$depbtq=mysql_query("SELECT ologin,otype,osum,osum2,orefsum,odate,obatch,odate2,oprofit,odays FROM operations WHERE (ologin='$u_login' AND osum>0 AND oback='') OR (oref='$u_login' AND osum>0 AND oback='')");
while($depbtm=mysql_fetch_row($depbtq)){

if($depbtm[0]!=$u_login && $depbtm[1]==3 && $depbtm[6]!=''){ $b_ref+=$depbtm[4]; }

if($depbtm[0]==$u_login && $depbtm[1]==2){ $b_with+=$depbtm[2]; }

if($depbtm[0]==$u_login && $depbtm[1]==3 && $depbtm[6]!=''){ $b_plus+=$depbtm[3]; }

if($depbtm[0]==$u_login && $depbtm[1]==3 && $depbtm[5]>$time){
$b_zam+=$depbtm[3];
$b_act++;
$b_col=floor(($time-$depbtm[7])/(24*3600));
$b_raz+=$b_col*$depbtm[8];
}

if($depbtm[0]==$u_login && $depbtm[1]==3 && $depbtm[5]<=$time){
$b_raz+=$depbtm[2];
$b_otn+=$depbtm[3];
}

}

$b_tot=$b_ref+$b_plus-$b_otn-$b_with-$b_zam+$b_raz;

if($b_tot<0) { echo "������! ������ $ $b_tot. �������� ��������� �����."; exit; }

if(isset($_POST['sum'])){
$sum=$_POST['sum'];
$sum=preg_replace("#[^0-9\.]+#",'',$sum);
$sum=preg_replace("#\.+#",'.',$sum);

if(empty($sum)){ $sum=0; }

$sum=number_format($sum,2,'.','');

if(!is_numeric($sum)){ $w_e='������� ���������� ����� ��� ������'; }
if(empty($w_e) && $sum<$d_wmin){ $w_e='����������� ����� ��� ������ '.$d_wmin.' ���'; }
if(empty($w_e) && $sum>$d_wmax){ $w_e='������������ ����� ��� ������ '.$d_wmax.' ���'; }
if(empty($w_e) && $sum>$b_tot){ $w_e='�� ����� ������� ������������ �������'; }

if(empty($w_e) && $sum>$free){
$w_e='� ������� ������������ ������� ��� ������<br>���������� ������� '.number_format($free,2,'.','');
}

if(empty($w_e)){

//======================================== ������� ������ ====================================================================

mysql_query("INSERT INTO operations (ologin,otype,osum,odate) VALUES ('$u_login','2','$sum','$time')") or die('error inserting withdrawl');
$w_s=1;
$b_tot-=$sum;
}
}
//==============================================================================================================================
}
?>


<?php
if(!empty($w_e)){ echo '<div class="vyvesti_error">'.$w_e.'</div>'; }
if(!empty($w_s)){ echo '<div class="vyvesti_success">������ �� ����� '.$sum.' ��� ������� � ���������. ������� ����� ������ �� 24 �����.</div>'; }
?>


<?php if($d_vyvod==0){ ?>

<br>

<form id="withdrawal" method="POST" action="/?page=vyvesti" style="margin:0;padding:0">
<table align="center" cellpadding="0px" cellspacing="0px">
<tr>
<td class="vyvesti_balance">������: <font color="#FF860D"><?php echo number_format($b_tot,2,'.',','); ?></font> ���</td>
<td><font class="vyvesti_sum">�����:</font>&nbsp;&nbsp;<input id="withdrawal_input" class="vyvesti_input" type="text" name="sum" onkeyup="withdrawal();" maxlength="9"></td>
<td><a class="vyvesti_button" href="javascript:with(document.getElementById('withdrawal')){ submit(); }">�������</a></td>
</tr>
</table>
</form>

<?php } ?>


<br>
<br>

<table align="center" class="vyvesti_stat" cellpadding="0px" cellspacing="0px">
<tr>
<td style="width:120px;">�����</td>
<td style="width:150px;">����</td>
<td style="width:240px;">������</td>
<td style="width:130px;">������</td>
</tr>
</table>

<table align="center" style="margin-top:2px;" cellpadding="2px" cellspacing="2px">
<?php
$statsq=mysql_query("SELECT osum,odate,odate2,obatch FROM operations WHERE otype=2 AND ologin='$u_login' ORDER BY odate DESC");
while($statsm=mysql_fetch_row($statsq)){ ?>
<tr>
<td class="vyvesti_stat_sum"><?php echo str_replace('.00','',number_format($statsm[0],2,'.',',')); ?> ���</td>
<td class="vyvesti_stat_date"><?php echo date('j '.$mdate[date('n',$statsm[1])-1].' H:i',$statsm[1]); ?></td>
<td class="vyvesti_stat_batch"><a target="_blank" href="https://w.qiwi.com/eggs/activate/form.action?code=<?php echo $statsm[3]; ?>"><?php echo $statsm[3]; ?></td>
<?php
if($statsm[2]==''){ echo '<td class="vyvesti_stat_batch_1">� ���������</td>'; }
else{ echo '<td class="vyvesti_stat_batch_2">���������</td>'; }
?>
</td>
</tr>
<?php } ?>
</table>

</div>

<div class="main_news_bottom"></div>
