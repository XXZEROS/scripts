<?php require_once('../Connections/baglanti.php');
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

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<rss version=\"2.0\"
	xmlns:content=\"http://purl.org/rss/1.0/modules/content/\"
	xmlns:wfw=\"http://wellformedweb.org/CommentAPI/\"
	xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
	xmlns:atom=\"http://www.w3.org/2005/Atom\"
	xmlns:sy=\"http://purl.org/rss/1.0/modules/syndication/\"
	xmlns:slash=\"http://purl.org/rss/1.0/modules/slash/\"
	>

<channel>
	<title>Asü İtiraf</title>
	<atom:link href=\"http://www.asuitiraf.net/feed\" rel=\"self\" type=\"application/rss+xml\" />
	<link>http://www.asuitiraf.net</link>
	<description></description>
	<lastBuildDate></lastBuildDate>
	<language>tr</language>
	<sy:updatePeriod>hourly</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator>http://wordpress.org/?v=3.1</generator>
";


$rssSql = mysql_query("SELECT * FROM itiraf where durum='1' order by id desc limit 2");
while($rss = mysql_fetch_assoc($rssSql)) {

$itiraf=$rss[itiraf];
$ay= ay($rss['ay']);
$ayy=$rss['ay'];
$yill=$rss['yil'];
$gunn=$rss['gun'];

$saat=n($rss['saat']);
$gun=date_tr("$yill-$ayy-$gunn"); 

echo "
<item>
	<title>$rss[baslik]</title>
	<link>$site/itiraf-$rss[id].html</link>
	<comments>$site/itiraf-$rss[id].html#comments</comments>
	<pubDate>$gun, $rss[gun] $ay $rss[yil] $saat:01 +0000</pubDate>
	<dc:creator>asuitiraf</dc:creator>
	<guid isPermaLink=\"false\">http://www.asuitiraf.net/itiraf-$rss[id].html</guid>
	<description><![CDATA[$itiraf]]></description>
	<slash:comments>0</slash:comments>
</item>
";
}



echo "
</channel>
</rss>";
?>