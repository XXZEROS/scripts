<?php $s1 = microtime(true);  //burda nöööördük biliyon mu ? eğer üye girişi yaptıysa gavat üye. uye sql sinde online sutununa şimdiki zamanı saniye cinsinden yazdırıverdik gari :D
$simdi=time(); // şimdiki zaman
$zaar=0;

				if(isset($_SESSION['uyeid'])){ 

$kimlik=$_SESSION['uyeid'];

$onliner = mysql_query("UPDATE uye SET online='".$simdi."' WHERE id='".$kimlik."'"); 


				}
				
				else { 

$ip=$_SERVER['REMOTE_ADDR'];

$online = mysql_query("select * from online where ip='".$ip."'");
while ($uyem = mysql_fetch_array($online))  { $kimliki=$uyem['id'];

$onlinere = mysql_query("UPDATE online SET time='".$simdi."' WHERE id='".$kimliki."'"); 
$zaar=1;


} // eğer ip varsa 
								if($zaar==0) { // eğer ip yoksa yeni ip ekliccek

$sql = "insert into online (ip, time)
values ('".$ip."', '".$simdi."')";
$kayit = mysql_query($sql);


								} // yeni ip açma son !
				
				} // üye deilse son



// update ve into bitti :D şimdi gosterek
$ucyz=($simdi-150);
$syy=0;
$onuye = mysql_query("select id,online,admin from uye where online > '".$ucyz."'");
while ($ouy = mysql_fetch_array($onuye))  { $syy++; //echo $ouy['rumuz'];
}
$sya=0;
$onad = mysql_query("select id,online,admin from uye where online > '".$ucyz."' and admin='1'");
while ($oad = mysql_fetch_array($onad))  { $sya++; //echo $ouy['rumuz'];
}
$syo=0;
$onur = mysql_query("select * from online where time > '".$ucyz."'");
while ($urr = mysql_fetch_array($onur))  { $syo++; }
$onuser=$syo;
$onuye=$syy;
$onadmin=$sya;
$ontop=($syy+$syo);
// echo $onuye;
$tplmm=0;
$onurx = mysql_query("select id from online");
while ($urrz = mysql_fetch_array($onurx))  { $tplmm++; }
$s8 = microtime(true);
$once=(time()-300); //5 dk öncesi
$sil ="DELETE FROM online WHERE time<'".$once."'";
$sorgu=mysql_query($sil);

?><? $s9 = microtime(true);
  if($_GET['ist']==1)  {
 $siteson=($s8 - $s1); echo ' &raquo; '; echo substr($siteson, 0, 4). '  - '.($s9 - $s8);
  echo '<br />'.$simdi; }?>