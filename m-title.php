﻿ <?php require_once('Connections/baglanti.php');  require_once('foksiyon.php');
 include('online.php');    include('bugun.php');  session_start();
 
$xsy=0;

$mesajlarz = mysql_query("select alid,oku from mesajlar where alid='".$_SESSION['uyeid']."' and oku='0'");
while ($sayme = mysql_fetch_array($mesajlarz))  { $xsy++; }
 if($xsy!="0") { ?> 
 

 Mesajlar (<?=$xsy;?>) -  <? } ?> Aksaray İtiraf | Allah'ın bildiğini kuldan saklama ! :)