<?PHP
if(strpos($_SERVER['HTTP_HOST'],'time-money.biz')===FALSE){die('License');}
include 'pmconfig.php';
include 'connect.php';
$passphrase = strtoupper(md5($pm['pass']));
$string=
      $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
      $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
      $_POST['PAYMENT_BATCH_NUM'].':'.
      $_POST['PAYER_ACCOUNT'].':'.$passphrase.':'.
      $_POST['TIMESTAMPGMT'];

$hash=strtoupper(md5($string));
if($hash==$_POST['V2_HASH']){ // proccessing payment if only hash is valid


$amount  = $_POST['PAYMENT_AMOUNT'];
$money = round($amount*$pm['ex'],2);
$id = intval($_POST["PAYMENT_ID"]);
$sql = mysql_query("SELECT * FROM `tb_users` WHERE `id`='{$id}'");
$count = mysql_num_rows($sql);
if ($count>0){

$rowus=mysql_fetch_array($sql);
$date=date("Y-m-d H:i:s");
$add1="UPDATE tb_users SET money=money+{$money} WHERE login='{$rowus['login']}'";
mysql_query($add1);
$add2="INSERT INTO tb_history (login, text, money, date, flag) VALUES ('{$rowus['login']}','Пополнение баланса Perfect Money','+$money','$date','0')";
mysql_query($add2);
$add3="UPDATE tb_stat SET money2=money2+$money WHERE id='1'";
mysql_query($add3);

}

}else{
exit();
}
?>
