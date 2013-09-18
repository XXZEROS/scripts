<?php require_once('Connections/baglanti.php'); include('foksiyon.php');  

$uyy=0; $yorumsy = mysql_query ("select * from uye where durum='0'");
while ($yrry = mysql_fetch_array($yorumsy)) { $uyy++; } echo $uyy; ?>