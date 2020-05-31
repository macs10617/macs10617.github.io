<?php
error_reporting(0);

//-------------------------------------\\
//--------------CONFIGS----------------\\
//-------------------------------------\\

$config = array(
'online_time' => '60', //В минутах
);

$connect_config = array(

'host' => 'localhost',
'user' => 'root',
'pass' => 'root',
'base' => 'time-money',



);

//-------------------------------------\\
//-------------------------------------\\
//-------------------------------------\\

if(!$_COOKIE['uniq_id'])
{
	$uniq_id = uniqid();
	setcookie('uniq_id',$uniq_id,(time()+3600*24*30));
}
else $uniq_id = $_COOKIE['uniq_id'];

$con = mysql_connect($connect_config['host'],$connect_config['user'],$connect_config['pass'],true);
if($con == false) die('<p style="color:red; font-weight:bold; font-size:14px">Failed to connect with DB '.$connect_config['base'].'!</p>');
mysql_select_db($connect_config['base'],$con) or die('<p style="color:red; font-weight:bold; font-size:14px">Failed to connect with '.$connect_config['user'].'@'.$connect_config['host'].'!</p>');
mysql_query('SET NAMES cp1251', $con);
mysql_query("delete from online_list where last_time<".(time()-$config['online_time']*60),$con);

if(preg_match("/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/isU",$_SERVER['REMOTE_ADDR']) and !preg_match("/[^a-zA-Z0-9\_\[\]\.\(\)\-]/isU",$uniq_id))
{
	$last_time = mysql_result(mysql_query("select last_time from online_list where ip = '".$_SERVER['REMOTE_ADDR']."'",$con),0,0);
	
	if(!$last_time) mysql_query("insert into online_list (uniq_id, ip, last_time) values ('".$uniq_id."', '".$_SERVER['REMOTE_ADDR']."', '".time()."')",$con);
	else mysql_query("update online_list set last_time = '".time()."' where uniq_id = '".$uniq_id."' and ip = '".$_SERVER['REMOTE_ADDR']."'",$con);
}

$online = intval(mysql_result(mysql_query("select count(*) from online_list where last_time>".(time()-$config['online_time']*60),$con),0,0));

//$online - кол-во гостей на сайте


echo $online;
?>