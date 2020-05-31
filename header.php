<?php
session_start();
error_reporting( E_ERROR );
include("connect.php");

$sitestart = "1";
$siteoff = "0";
if ($siteoff == "1") { echo "Проводятся технические работы. В ближайшее время сайт заработает."; exit; }

$r=htmlspecialchars($_GET[r]);
$user=$_SESSION["user"];
$page1=$_SERVER['PHP_SELF'];

$sqlcg="SELECT * FROM tb_config WHERE id='1'";
$resultcg=mysql_query($sqlcg);
$rowcg=mysql_fetch_array($resultcg);

// Установка referer
$referer=$_SESSION["referer"];
if ($r=="") {$r="$referer";} else {$r="$r";}
if ($referer!=$r) {
$_SESSION["referer"]=$r;
}

$http_referer2=$_SESSION["http_referer"];
if ($http_referer2=="") {
$http_referer3=$_SERVER['HTTP_REFERER'];
$_SESSION["http_referer"]=$http_referer3;
}

$sqlns="SELECT id, title, text, date FROM tb_news ORDER BY id DESC LIMIT 1";
$resultns=mysql_query($sqlns);
$rowns=mysql_fetch_array($resultns);

// Проверка авторизации
if ($user!="") {
$password=$_SESSION["password"];
$sqllog="SELECT password FROM tb_users WHERE login='$user'";
$resultlog=mysql_query($sqllog);        
$rowlog=mysql_fetch_array($resultlog);
if ($password!=$rowlog["password"]) {

unset($_SESSION["user"]);
unset($_SESSION["password"]);

header ("Location: login_error.php");
}

$sqlus="SELECT * FROM tb_users WHERE login='$user'";
$resultus=mysql_query($sqlus);
$rowus=mysql_fetch_array($resultus);

// Обновление данных пользователя
$timeus="60"; // Время автоматического удаления
$timeus2=$timeus+$rowus[update_date];
$tekdus=time();
if ($tekdus>$timeus2) {

if ($rowus[country]!="all") {

$up_ads2=$up2_row[0];
} else {
$up_ads2="0";
}

$upd_us="UPDATE tb_users SET mail_in='$up1_row[0]', ads_in='$up_ads2', update_date='$tekdus' WHERE login='$rowus[login]'";
mysql_query($upd_us);

}
}

// Конец проверки авторизации

$set_on="600"; // Время обновления on-line
if ($rowus[login]!="") {
$time=time();

$upd_on="UPDATE tb_users SET online='$time', online_page='$page1' WHERE id='$rowus[id]'";
mysql_query($upd_on);
}

// Обновление статистики
$sql_st="SELECT * FROM tb_stat WHERE id='1'";
$result_st=mysql_query($sql_st);
$row_st=mysql_fetch_array($result_st);

$tek_date_st=time();
$tek_date_st2=$row_st[date]+300;
if ($tek_date_st>$tek_date_st2) {

$on_time=time()-600;

$st_count6=mysql_query("SELECT COUNT(id) FROM tb_users WHERE online>$on_time");
$st_row6=mysql_fetch_row($st_count6);

$st_money="Select sum(summa) from tb_payme WHERE flag='1'";
$st_money_var=mysql_query($st_money);
$st_money_all=mysql_result($st_money_var,0,0);

$upd_st="UPDATE tb_stat SET online='$st_row6[0]', money='$st_money_all', all_ads='$st7_row[0]', all_task='$st8_row[0]', credit3='$p_money_all', date='$tek_date_st' WHERE id='1'";
mysql_query($upd_st);

}
// Конец обновления


// Обновление 2

$tek_date_st=time();
$tek_date_st2=$row_st[date]+3600;
if ($tek_date_st>$tek_date_st2) {

$st_count=mysql_query("SELECT COUNT(id) FROM tb_users");
$st_row=mysql_fetch_row($st_count);

$st1_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE country='ru'");
$st1_row=mysql_fetch_row($st1_count);

$st2_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE country='ua'");
$st2_row=mysql_fetch_row($st2_count);

$st3_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE country='by'");
$st3_row=mysql_fetch_row($st3_count);

$st4_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE country='kz'");
$st4_row=mysql_fetch_row($st4_count);

$st5_count=mysql_query("SELECT COUNT(id) FROM tb_users WHERE country='all'");
$st5_row=mysql_fetch_row($st5_count);



$upd_st="UPDATE tb_stat SET users='$st_row[0]', ru='$st1_row[0]', ua='$st2_row[0]', byr='$st3_row[0]', kz='$st4_row[0]', allr='$st5_row[0]', date='$tek_date_st' WHERE id='1'";
mysql_query($upd_st);



}
// Конец обновления 2

$row_st[users]=number_format($row_st[users], 0, '.', '`');
$row_st[ru]=number_format($row_st[ru], 0, '.', '`');
$row_st[ua]=number_format($row_st[ua], 0, '.', '`');
$row_st[byr]=number_format($row_st[byr], 0, '.', '`');
$row_st[kz]=number_format($row_st[kz], 0, '.', '`');
$row_st[online]=number_format($row_st[online], 0, '.', '`');
$pay_all_money=number_format($row_st[money], 2, '.', '`');
$row_st[ball]=number_format($row_st[sinv]-$row_st[payme], 2, '.', '');
$row_st[bonus]=number_format($row_st[bonus], 2, '.', '`');


// Склонения
function num2word($num,$words) {
  $num=$num%100;
  if ($num>19) { $num=$num%10; }
  switch ($num) {
    case 1:  { return($words[0]); }
    case 2: case 3: case 4:  { return($words[1]); }
    default: { return($words[2]); }
  }
}
// Человек
$num1=$row_st[users];
$words1=Array("человек", "человека", "человек"); // Кто? Нет кого? Много кого?
$text_w1=num2word($num1,$words1);

// Человек
$num2=$row_st[online];
$words2=Array("человек", "человека", "человек"); // Кто? Нет кого? Много кого?
$text_w2=num2word($num2,$words2);

$timepr=time()-1373569200;
$timepr=$timepr/86400;
$timepr=number_format($timepr, 0, '.', '`');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028)http://test.time-money.biz/# -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
<title>TIME-MONEY.BIZ - доход 10% за 12 часов / 25% за 24 часа / 50% за 36 часов / 75% за 48 часов</title>
<meta name="description" content="Инвестиционный проект" />
<meta name="keywords" content="инвестиции, хайп, hiyp" />
<link rel="SHORTCUT ICON" href="/favicon.ico" />
	<script type="text/javascript" src="./time_files/jquery.js"></script>
	<link rel="stylesheet" href="./time_files/style.css" type="text/css">
	<!--[if lte IE 7]>
	<link rel="stylesheet" href="/templates/universe/css/style-ie.css" type="text/css" />
	<![endif]-->
	<!--[if IE 8]>
	<link rel="stylesheet" href="/templates/universe/css/style-ie8.css" type="text/css" />
	<![endif]-->
	<script type="text/javascript" src="./time_files/jquery.carouFredSel-5.6.4-packed.js"></script>
	<script type="text/javascript" src="./time_files/jquery.ttabs.js"></script>
	<script type="text/javascript" src="./time_files/active.js"></script>


	
</head>
<body>

<div class="top-line">
	<div class="main">
		<div class="header">
			<a href="/" class="logo"></a>

			<div class="social-block">
				<a class="social-link" title="Мы принимаем"><img src="./time_files/soc-link3.png"></a>
				<a class="social-link" title="Qiwi Яйца"><img src="./time_files/soc-link1.png"></a>
				<a class="social-link" title="Perfect Money"><img src="./time_files/soc-link2.png"></a>

			</div>
			
			<div style="clear: both;"></div>
		</div>
		<div class="top-menu-block">
			<ul>                                                              
				<li>
					<a href="/index" class="menu-link">Главная</a>

				</li>
				<li>
					<a href="/top?top=2" class="menu-link">Топ партнёров</a>

				</li>
				<li>
					<a href="/top?top=1" class="menu-link">Топ инвесторов</a>

				</li>
				<li>
					<a href="/news" class="menu-link">Новости</a>

				</li>
				<li>
					<a href="/faq" class="menu-link">Помощь</a>

				</li>
				<li>
					<a href="/rules" class="menu-link">Правила</a>
				</li>
				<li>
					<a href="/user_pay" class="menu-link">Выплаты</a>
				</li>
				<li>
					<a href="skype:?chat&blob=OisOWEKz2ZWKBS8NEzwB53oGyRJ1OIvPUTmTXmd47Duzo7WmLYLIH9iqm81mw2Cn0VJg" class="menu-link">Skype ЧАТ</a>
				</li>
				
			</ul>
			<div style="clear: both;"></div>
		</div>
	</div>
</div>
<div style="clear: both; height: 20px;"></div>
<div class="main-content">
	<div class="left-col">

		<div class="books">
			<div class="books-top"><img src="./time_files/vote-icon.png" alt="books-icon">Статистика</div>
			<div class="books-repeat">
				Мы работаем: <b><?php print"$timepr"; ?> дн.</b> (11.07) <br><br>
				Нас уже: <b><?php print"$row_st[users] $text_w1"; ?></b><br><br>
				Инвестировали: <b><?php print"$row_st[sinv] $rowcg[money]"; ?></b><br><br>
				Вывели: <b><?php print"$row_st[payme] $rowcg[money]"; ?></b><br><br>
				Балланс: <b><?php print"$row_st[ball] $rowcg[money]"; ?></b> <br><br>
				На сайте: <b><?php include("useronline.php"); ?> чел.</b> <br><br>
				Курс: <b>$1=30 рублей </b><br><br>
				<div style="clear: both; height: 1px;"></div>

			</div>
			<div class="books-bottom"></div>
		</div>
		<div class="right-col3">
			<div class="games-block-content" style="padding: 0px; background: none;">
					<div class="tt-tabs2">
						<div class="index-tabs">
							<span class="active-ttab2">ТАРИФ "12"</span>
							<span>ТАРИФ "24"</span>
							<span>ТАРИФ "36"</span>
							<span>ТАРИФ "48"</span>
							<div style="clear: both;"></div>
						</div>                     
						<div class="index-panel">
							<div class="tt-panel" style="display: block;">
								<div class="album1">
								     <div class="album-news">
	<div class="album-news-image">
		<img src="./time_files/time.png">
	</div>

</div></div>
								<div class="album2">
								     <div class="books-news">
	<h2>+10% за 12 часов</h2>
</div><div class="books-news">
	<h2>Минимум 100 рублей</h2>
</div><div class="books-news">
	<h2>Максимум 2000 рублей</h2>
</div><div class="books-news">
	<input type="submit" onclick="location.href='inv'" value="Инвестировать" class="vote-buttom">
</div>
								</div>
								<div style="clear: both; height: 7px;"></div>
							</div>
							<div class="tt-panel">
								<div class="album1">
								     <div class="album-news">
	<div class="album-news-image">
		<img src="./time_files/time.png">
	</div>

</div></div>
								<div class="album2">
								     <div class="books-news">
	<h2>+25% за 24 часа</h2>
</div><div class="books-news">
	<h2>Минимум 200 рублей</h2>
</div><div class="books-news">
	<h2>Максимум 5000 рублей</h2>
</div><div class="books-news">
	<input type="submit" onclick="location.href='inv'" value="Инвестировать" class="vote-buttom">
</div>
								</div>
								<div style="clear: both; height: 7px;"></div>
							</div>
<div class="tt-panel">
								<div class="album1">
								     <div class="album-news">
	<div class="album-news-image">
		<img src="./time_files/time.png">
	</div>

</div></div>
								<div class="album2">
								     <div class="books-news">
	<h2>+50% за 36 часов</h2>
</div><div class="books-news">
	<h2>Минимум 300 рублей</h2>
</div><div class="books-news">
	<h2>Максимум 9000 рублей</h2>
</div><div class="books-news">
	<input type="submit" onclick="location.href='inv'" value="Инвестировать" class="vote-buttom">
</div>
								</div>
								<div style="clear: both; height: 7px;"></div>
							</div>
<div class="tt-panel">
								<div class="album1">
								     <div class="album-news">
	<div class="album-news-image">
		<img src="./time_files/time.png">
	</div>

</div></div>
								<div class="album2">
								     <div class="books-news">
	<h2>+75% за 48 часов</h2>
</div><div class="books-news">
	<h2>Минимум 500 рублей</h2>
</div><div class="books-news">
	<h2>Максимум 15000 рублей</h2>
</div><div class="books-news">
	<input type="submit" onclick="location.href='inv'" value="Инвестировать" class="vote-buttom">
</div>
								</div>
								<div style="clear: both; height: 7px;"></div>
							</div>
						</div>
						<div style="clear: both;"></div>
					</div>
					
			</div>
			<div class="games-block-bottom"></div>
		</div>		
			

		<div style="clear: both; height: 1px;"></div>
		
		
		<div class="left-col-item">
			<div class="left-col-item-title"><img src="./time_files/news-icon.png" alt="news-icon">TIME-MONEY.BIZ</div>
			<div class="left-col-item-content-news" style="padding: 10px;">
					
                  
						<div class="index-panel">
							<div class="tt-panel" style="display: block;">
								<div class="news-news">
								





