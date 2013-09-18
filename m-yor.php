<?php require_once('Connections/baglanti.php'); include('foksiyon.php');  

$ubb=0; $yorumss = mysql_query ("select * from yorum where durum='0'");
while ($yrrr = mysql_fetch_array($yorumss)) { 

$itdurumx=aitdurum($yrrr['itid']);
	if($itdurumx==1) {

$ubb++; } } echo $ubb; ?>