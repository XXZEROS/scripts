<?php

 require_once('Connections/baglanti.php');
$rating = mysql_query ("select * from itiraf order by id desc");
while ($r = mysql_fetch_array($rating))  {
	
$yr=0; $yyy = mysql_query ("select * from yorum where durum like 1 and itid like $r[id]");
while ($y = mysql_fetch_array($yyy))  { $yr++; }

$yorsay=($yr+$yorsay);

$www = mysql_query("UPDATE itiraf SET yorum='".$yr."' WHERE id='".$r['id']."'");
if($www) { echo 'ok'; } else { echo 'hata';} 
	
	$c++;
	 }
echo $c.'itiraf ta toplam yorum: '.$yorsay;
?>