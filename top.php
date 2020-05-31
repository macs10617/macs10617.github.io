<?php
include("header.php");

?>
 <? if($_GET[top]==1)
 {
 ?>
 
 
<center><h2>Топ 5 инвесторов</h2></center>

							
							<div  class="widget-content nopadding">
								<table class="simple-little-table" width="100%">
									<thead>
										<tr >
											<th >Пользователь</th>
											<th >Сумма</th>
											
										</tr>
									</thead>
									<tbody>


<?

$mysql_queries++;
$sql = "SELECT * FROM tb_users order by sinv desc limit 5";
$result = mysql_query($sql);
while($stat=mysql_fetch_array($result)){
echo "
<tr>
									
<tr>
<td id=\"round1\" align=\"center\">$stat[login]</td>
<td id=\"round1\" align=\"center\">$stat[sinv]</td>

</tr>

";}

?></tbody>
								</table>							
							</div>
							
 <? } if($_GET[top]==2)
 {
 ?>
 

<h2><center>Топ 5 партнёров</h2></center>


						
							<div >
								<table class="simple-little-table" width="100%" >
									<thead>
										<tr>
											<th >Пользователь</th>
											<th >Рефералов</th>
											
										</tr>
									</thead>
									<tbody>


<?

$mysql_queries++;
$sql = "SELECT * FROM tb_users order by all_ref desc limit 5";
$result = mysql_query($sql);
while($stat=mysql_fetch_array($result)){
echo "
<tr>
									
<tr>
<td id=\"round1\" align=\"center\">$stat[login]</td>
<td id=\"round1\" align=\"center\">$stat[all_ref]</td>

</tr>

";}

?></tbody>
								</table>							
							</div>
<?
}   if($_GET[top]==3)
 {

?>
 <div class="mod2">

 <h2><center>Топ 5 богачей</h2></center>

<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-th"></i>
								</span>
								
							</div>
							<div class="widget-content nopadding">
								<table width="100%" border="1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Пользователь</th>
											<th>Денег на балансе</th>
											
										</tr>
									</thead>
									<tbody>


<?

$mysql_queries++;
$sql = "SELECT * FROM tb_users order by money desc limit 5";
$result = mysql_query($sql);
while($stat=mysql_fetch_array($result)){
echo "
<tr>
									
<tr>
<td align=\"center\">$stat[login]</td>
<td align=\"center\">$stat[money]</td>

</tr>

";}

?></tbody>
								</table>							
							</div></div></div>
<?
}
?>
<?php

include("footer.php");
?>