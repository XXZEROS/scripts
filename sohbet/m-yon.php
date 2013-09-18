<?php require_once('Connections/baglanti.php'); include('foksiyon.php');  
$utt=0; $ytt = mysql_query ("select * from itiraf where durum='0'");
while ($yrtt = mysql_fetch_array($ytt)) { $utt++; } echo $utt; ?>