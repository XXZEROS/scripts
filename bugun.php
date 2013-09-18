<?php
$s1 = microtime(true);

$ip=$_SERVER['REMOTE_ADDR'];
$gunx=date("j");
$ayx=date("n");  
$yilx=date("Y");



$bgrn=0;
$bugun = mysql_query("select * from bugun where ip='".$ip."' and gun='".$gunx."' and ay='".$ayx."' and yil='".$yilx."'");
while ($bgn = mysql_fetch_array($bugun))  { $bgrn=1; } // eğer ip varsa 
				if($bgrn==0) { // eğer ip yoksa yeni ip ekliccek

$sql = "insert into bugun (ip, gun, ay, yil)
values ('".$ip."', '".$gunx."', '".$ayx."', '".$yilx."')";
$kayit = mysql_query($sql);

				} //eğer bugün girdiyse yazdırmayok :D

$tbugun=0;
$onursx = mysql_query("select id from bugun where gun='".$gunx."' and ay='".$ayx."' and yil='".$yilx."'");
while ($urrzs = mysql_fetch_array($onursx))  { $tbugun++; }

$tdun=0;
$ayy=($ayx-1);
if($gunx==1) { 



$guny=date("t", mktime(0, 0, 0, 0, $ayy, 1,$yilx)); 
if($ayy==6) { $guny=30; }
	
	} else { $guny=($gunx-1); $ayy=$ayx;	}
	
	$onursxz = mysql_query("select id from bugun where gun='".$guny."' and ay='".$ayy."' and yil='".$yilx."'");
while ($urrzsz = mysql_fetch_array($onursxz))  { $tdun++; } 


$ttt=0;
$onursxz = mysql_query("select id from bugun");
while ($urrzsz = mysql_fetch_array($onursxz))  { $ttt++; }


?><? $s8 = microtime(true);
  if($_GET['ist']==1)  {
 $siteson=($s8 - $s1); echo ' &raquo; '; echo substr($siteson, 0, 7); } ?>