




 
<table>
<tbody>
<tr>
<td width="190">
<?php
$rowns[text]=substr($rowns[text],0,160);
$rowns[text]=str_replace("[b]","<b>",$rowns[text]);
$rowns[text]=str_replace("[/b]","</b>",$rowns[text]);
$rowns[text]=str_replace("[i]","<i>",$rowns[text]);
$rowns[text]=str_replace("[/i]","</i>",$rowns[text]);
$rowns[text]=str_replace("[u]","<u>",$rowns[text]);
$rowns[text]=str_replace("[/u]","</u>",$rowns[text]);

print"<b><font color=\"#666666\">$rowns[title]</font></b><br>
$rowns[date] <br>$rowns[text]...
<a href=\"news?page=comments&id=$rowns[id]\">Подробнее...</a>
<br><br><h5><center><a href=\"news\">Все новости</a></center></h5>";
?>
</td>
</tr>
</tbody>
</table>






