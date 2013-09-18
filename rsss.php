<?php require_once('Connections/baglanti.php');
function www($textw) {
$gkodw = array("?","ı","Ğ","Ü","Ş","İ","Ö","Ç","ğ","ü","ş","Ş", "ö","ç"," ","Ğ","A","B","C","D","E","F","H","I","J","K", "L", "M","N","O","P","R","S","T","U","V","Y","Z","X ","Q ",".","?","=","$");
$dkodw = array("","i","g","u","s","i","o","c","g","u","s","s", "o","c","-","g","a","b","c","d","e","f","h","i","j","k", "l", "m","n","o","p","r","s","t","u","v","y","z","x ","q ","","","","");
$ykodw = str_replace($gkodw,$dkodw,$textw);
return $ykodw;  } 

function n($textwz) {
$gkodwz = array(".");
$dkodwz = array(":");
$ykodwz = str_replace($gkodwz,$dkodwz,$textwz);
return $ykodwz;  } 

function ay($ay){
if($ay==1)  {  return 'Jan';    }
if($ay==2)  {  return 'Feb';   }
if($ay==3)  {  return 'Mar';    }
if($ay==4)  {  return 'Apr';   }
if($ay==5)  {  return 'May';   }
if($ay==6)  {  return 'Jun'; }
if($ay==7)  {  return 'Jul';  }
if($ay==8)  {  return 'Aug'; }
if($ay==9)  {  return 'Sep';   }
if($ay==10) {  return 'Oct';    }
if($ay==11) {  return 'Nov';  }
if($ay==12) {  return 'Dec';  }


}

 function date_tr($tarih) 
         { 
         # Ihtıyac duyulan dızıler 
         $aylar  = array("","Ocak","Şubat","Mart", 
                            "Nisan","Mayıs","Haziran", 
                            "Temmuz","Ağustos","Eylül", 
                            "Ekim","Kasım","Aralık"); 

         $gunler = array("Sun","Mon","Tue", 
                         "Wed","Thu","Fri", 
                         "Sat"); 

         # Once verılen tarıhı parcala ve unix zamanı bul 
         $tarih = explode("-",$tarih); 
         @$tarih = mktime("","","",$tarih[1],$tarih[2],$tarih[0]); 

         # Sonra bu zamanı kullanarak 
         # yılı,ay,gun ve haftanın gununu bul 
         $tarih = date("Y-n-j-w",$tarih); 
         $tarih = explode("-",$tarih); 

         $tarih = $gunler[$tarih[3]]; 

         # Sonucu dondur 
         return $tarih; 
         } 

@header("Content-type: text/xml\n\n");

echo '<?xml version="1.0" encoding="UTF-8"?><rss version="0.92">
<channel>
	<title>asü İtiraf</title>
	<link>http://www.asuitiraf.com</link>
	<description></description>
	<lastBuildDate>Mon, 06 Aug 2012 21:43:28 +0000</lastBuildDate>
	<docs>http://backend.userland.com/rss092</docs>
	<language>en</language>
	<!-- generator="WordPress/3.1" -->

';


$rssSql = mysql_query("SELECT * FROM itiraf where durum='1' order by id desc limit 1");
while($rss = mysql_fetch_assoc($rssSql)) {

$itiraf=$rss[itiraf];
$ay= ay($rss['ay']);
$ayy=$rss['ay'];
$yill=$rss['yil'];
$gunn=$rss['gun'];

$saat=n($rss['saat']);
$gun=date_tr("$yill-$ayy-$gunn"); 

echo "

		<title>$rss[baslik]</title>
		<description><![CDATA[$itiraf]]></description>
		<link>$site/itiraf-$rss[id].html</link>
			</item>
";
}



echo "
</channel>
</rss>";
?>