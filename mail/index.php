<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />





<?php $s1 = microtime(true);

error_reporting(0);
 require_once('Connections/baglanti.php'); require_once('foksiyon.php'); 
include('online.php');  include('bugun.php');

session_start();

$ip=$_SERVER['REMOTE_ADDR'];
$banip='213232w2';
if(strpos($banip,$ip)) { echo  'error'; } else {
$time=(time()-3);
$fldvar=0;
$flood = mysql_query("select ip,time from flood where ip = '".$ip."' and time > '".$time."'");
while ($fld = mysql_fetch_array($flood))  { $fldvar=1; }


	//burda itirafı yapanın üye mi olduğunu kontrol etcez.$itkim
		function ittmi($itid){
		
			$itmi=0;
			$itirafqwe = mysql_query ("select id,uyeid from itiraf where id='".$itid."'");
			while ($itx = mysql_fetch_array($itirafqwe)) {
			$itmi=$itx['uyeid']; }
			
		 return $itmi; 
			
		}


$flid=0; 

$o=$_GET['gnid'];

$sen=$_SESSION["uyeid"];



if($fldvar==0) { 
if($_POST['itiraf']=="ok" ){
if(isset($_POST['itirafy'])and isset($_POST['baslik'])){

$durum=0;
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
$uyeid=$_SESSION['uyeid'];

}
$sa=date("H");
$dakika=date("i");
$saat="$sa.$dakika";
$gun=date(d);
$ay=date(m);
$yil=date(Y);


$bid=$_SESSION['uyeid'];

$uyelerzm = mysql_query("select * from uye where id='".$bid."' and admin='1'");
while ($uyemm = mysql_fetch_array($uyelerzm))  { $durum=1; } 

$sql = "insert into itiraf (katid, uyeid, mail, ip, rumuz, cinsiyet, bolum, durum, saat, gun, ay, yil, baslik, itiraf)
values ('".$_POST['kat']."', '".$uyeid."', '".$_POST['mail']."', '".$ip."', '".$_POST['rumuz']."', '".$_POST['cinsiyet']."', '".$_POST['bolum']."', '".$durum."', '".$saat."', '".$gun."', '".$ay."', '".$yil."', '".$_POST['baslik']."', '".$_POST['itirafy']."')";
$kayit = mysql_query($sql);

setcookie("crumuz","".$_POST['rumuz']."",time()+360000);
setcookie("cmail","".$_POST['mail']."",time()+360000);
setcookie("ccins","".$_POST['cinsiyet']."",time()+360000);
@header('Location: index.php?ney=itiraf-et&islem=tmm');	$itirafolma=1;

} else {	@header('Location: index.php?ney=itiraf-et&islem=no'); $itirafolma=0; }
}





if($_POST['ekle']=="ok" ){
	
setcookie("crumuz","".$_POST['rumuz']."",time()+360000);
setcookie("cmail","".$_POST['mail']."",time()+360000);
setcookie("ccins","".$_POST['cinsiyet']."",time()+360000);
$durum=0;
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
$uyeid=$_SESSION['uyeid'];
$ip=$_SERVER['REMOTE_ADDR'];
$kc=0; $uyr = mysql_query ("select * from yorum where durum='1' and uyeid='".$uyeid."' ");
while ($x = mysql_fetch_array($uyr))  { $kc++; }
if($kc>29) { $durum=1; } else { $durum=0; } //30 yorumu var mı dii kontrol ettik

}

$bid=$_SESSION['uyeid'];  $uyelerzm = mysql_query("select * from uye where id='".$bid."' and admin='1'");
while ($uyemm = mysql_fetch_array($uyelerzm))  { $durum=1; } 

$bid=$_SESSION['uyeid'];  $uyelerzm = mysql_query("select * from uye where id='".$bid."' and durumok='1'");
while ($uyemm = mysql_fetch_array($uyelerzm))  { $durum=1; }

$bid=$_SESSION['uyeid'];  $uyelerzm = mysql_query("select * from uye where id='".$bid."' and durumok='2'");
while ($uyemm = mysql_fetch_array($uyelerzm))  { $durum=0; }

if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
	 // eğer üyeyse mail rumuz kontrol yapma

$sql = "insert into yorum (itid, uyeid, mail, ip, rumuz, cinsiyet, bolum, durum, yorum)
values ('".$_GET['id']."', '".$uyeid."', '".$_POST['mail']."', '".$ip."', '".$_POST['rumuz']."', '".$_POST['cinsiyet']."', '".$_POST['bolum']."', '".$durum."', '".$_POST['itiraf']."')";
$kayit = mysql_query($sql);
	
	// bildirim gönderme alanı-----------------------------------------------------
				$itid=$_GET['id'];
				if(ittmi($itid)!=0) { 
				$uyeadi = uyead($uyeid); 
				$itkim=ittmi($itid); 
		
 $icerx= $_GET['id'].' nolu itirafına '.$uyeadi.' yorum yaptı.';	

				$sqxl = "insert into bildirim (itid, icerik, o)
				values ('".$_GET['id']."', '".$icerx."', '".$itkim."')";
				$kayixt = mysql_query($sqxl);

		}
		 // bildirme bittı-----------------------------------------------------
		
@header('Location: index.php?ney=itiraf&id='.$_GET['id'].'&islem=tmm'.$hatas);

} else {  //eğer üye DEĞİLSE mail ve rumuz kontrolu yp

if(eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $_POST['mail']) and $_POST['rumuz']<>"" and $_POST['itiraf']<>"") {  

$sql = "insert into yorum (itid, uyeid, mail, ip, rumuz, cinsiyet, bolum, durum, yorum)
values ('".$_GET['id']."', '".$uyeid."', '".$_POST['mail']."', '".$ip."', '".$_POST['rumuz']."', '".$_POST['cinsiyet']."', '".$_POST['bolum']."', '".$durum."', '".$_POST['itiraf']."')";
$kayit = mysql_query($sql);

		// bildirim gönderme alanı -----------------------------------------------------
				$itid=$_GET['id'];
				if(ittmi($itid)!=0) {
				$uyeadi= $_POST['rumuz'];
				$itkim=ittmi($itid); 
		
		 $icerx= $_GET['id'].' nolu itirafına '.$uyeadi.' yorum yaptı.';
		 
				$sqxlxx = "insert into bildirim (itid, o, icerik)
				values ('".$_GET['id']."', '".$itkim."', '".$icerx."')";
				$kayixtzzz = mysql_query($sqxlxx);
				
				} 
		// bildirme bitti----------------------------------------------------------------

@header('Location: index.php?ney=itiraf&id='.$_GET['id'].'&islem=tmm');	
} // mail kontrol bitti 
else  {  @header('Location: index.php?ney=itiraf&id='.$_GET['id'].'&islem=no');	 }
} // üye değilse


//itirafa yorum sayısını yazdırıyoruz
if($durum==1) {
	$yr=0; $yyy = mysql_query ("select id,yorum from itiraf where id='".$_GET['id']."'");
	while ($y = mysql_fetch_array($yyy))  { $yr=$y['yorum']; } $yr = ($yr+1);
	$wwww = mysql_query("UPDATE itiraf SET yorum='".$yr."' WHERE id='".$_GET['id']."'");
}


} // ekle=ok ise :D
}  //flood yapma pic son
 if(isset($_SESSION['uyead'])){
	  $bid=$_SESSION['uyeid']; 
	   $admn=0; $uyelerz = mysql_query("select id,admin from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz)) 

 { $admn=$uyem['admin']; } } 
if($_GET['yorumup']<>"" ){
	$edc=0;
	$yorid=$_GET['yorumup'];
	$sayis=rand(1,1000000);
	$ipx=$ip;


	if($_COOKIE['oy']==$yorid)  { $edc=1; } //eğer oy kullandıysa
if($admn==1) { $edc=0;  }
	if($edc==0) {


$_SESSION['oy'] = $yorid;		
		setcookie ("oy", "$yorid"); 
$myr = mysql_query ("select id,rating from yorum where id='".$yorid."'");
while ($ytt = mysql_fetch_array($myr))  { $scc=$ytt['rating']; }		
$sccc=($scc+1);
$degistirxx = mysql_query("UPDATE yorum SET rating='".$sccc."' WHERE id='".$yorid."'"); 

} 

@header('Location: index.php?ney=itiraf&id='.$_GET['id']);	

}

$s2 = microtime(true);
if($_GET['yorumdown']<>"" ){
	$edc=0;
	$yorid=$_GET['yorumdown'];
	if($_COOKIE['oy']==$yorid)  { $edc=1; } //eğer oy kullandıysa
if($admn==1) { $edc=0;  }
	if($edc==0) {
session_start();
setcookie ("oy", "$yorid"); 		
		
$myr = mysql_query ("select id,rating from yorum where id='".$yorid."'");
while ($ytt = mysql_fetch_array($myr))  { $scc=$ytt['rating']; }		
$sccc=($scc-1);
$degistirxx = mysql_query("UPDATE yorum SET rating='".$sccc."' WHERE id='".$yorid."'"); 
} 
@header('Location: index.php?ney=itiraf&id='.$_GET['id']);	

} 


// mesaj silme sadece admine
if($_GET['sil']=="mesaj"){
$silz ="DELETE FROM mesajlar WHERE id='".$_GET['id']."'";
$sorgzu=mysql_query($silz);

}

$tiklama = mysql_query ("select * from tiklama");
while ($tikk = mysql_fetch_array($tiklama))  { 
$tik=($tikk['oku']+1);  }
 $degiswzq = mysql_query("UPDATE tiklama SET oku='".$tik."' where id='1'");
$s3 = microtime(true);
?><?  
  if($_GET['ist']==1)  {
 $siteson=($s3 - $s1); echo '<br>
<br>
<br>
 &raquo; '; echo substr($siteson, 0, 4). ' &#8482; ';
  } ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//TR"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<? if($_GET['ney']=="itiraf") {
	$itiraf = mysql_query ("select id,durum,uyeid,rumuz,katid,gun,ay,yil,saat,baslik from itiraf where durum='1' and id='".$_GET['id']."'");
	while ($it = mysql_fetch_array($itiraf))  {  ?>
<META NAME="Description" CONTENT="Yazar: <? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']; } else { print uyead($ituye);   } ?>, Üniversite: Aksaray Üniversitesi, Kategori: <?= katqwe($it['katid']);?>, Site: aksaray.edu.tr, Tarih: <?= $it['gun']?> <?= ay($it['ay']);?> <?= $it['yil']?> - <?= $it['saat']?>">
<title><?=$it['baslik'];?> - Aksaray itiraf</title>
<? } } else { ?>
<title>Aksaray itiraf | Allahin bildiğini kuldan saklama... Aksarayin itiraf sitesi</title>
<meta name="keywords" content="Aksaray İtiraf, aksarayitiraf.tekbilim.com, aksaray edu, Aksaray Üniversitesi, aksaray itiraf, Asü dedikodu, dedikodu, asü gossip, gossip asu, asü, asü iibf, forum aksaray, aksaray, asu, itiraf, üniversite itiraf, asü pusula, üni itiraf" />
<meta name="abstract" content="Aksaray İtiraf | Aksaray Üniversitesi" />
<meta name="description" content="Aksaray Üniversitesi İtiraf Sitesi" />
<? } ?>
<meta http-equiv="Content-Type" content="text/html; charset=Utf-8" />
<meta http-equiv="content-language" content="TR" />
<meta property="og:title" content="AKsaray itiraf" />
<meta property="og:type" content="school" />
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<meta property="og:url" content="http://aksarayitiraf.tekbilim.com" />
<meta property="og:image" content="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash4/369559_100002783572908_1337479547_n.jpg" />
<meta property="og:site_name" content="Aksaray itiraf" />
<meta property="fb:admins" content="100001581495599" />
<script src="//connect.facebook.net/tr_TR/all.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="./javascript.js"></script>
<script type="text/javascript">
		
<?  if(isset($_GET['gnid'])) { ?>
$(document).ready(function() {

    gonderx();

    var int=self.setInterval("gonderx()",4000);
});

function gonderx(){
    $.ajax({
        type:'POST',
        url:'m-msj-<?=$_GET['gnid'];?>.html',
        success: function (msg) {
            $("#msjx").html(msg);
        }
    });
}
<? } 
 
$s4 = microtime(true);
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
  $bid=$_SESSION['uyeid'];  $admn=0; $uyelerz = mysql_query("select * from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz))  { $admn=$uyem['admin']; }  if($admn==1) { ?>
$(document).ready(function() {

    yon();

    var int=self.setInterval("yon()",5000);
});

function yon(){
    $.ajax({
        type:'POST',
        url:'m-yon.php',
        success: function (msg) {
            $("#myon").html(msg);
        }
    });
}

$(document).ready(function() {

    yor();

    var int=self.setInterval("yor()",5000);
});

function yor(){
    $.ajax({
        type:'POST',
        url:'m-yor.php',
        success: function (msg) {
            $("#myor").html(msg);
        }
    });
}

$(document).ready(function() {

    uyer();

    var int=self.setInterval("uyer()",5000);
});

function uyer(){
    $.ajax({
        type:'POST',
        url:'m-uye.php',
        success: function (msg) {
            $("#muye").html(msg);
        }
    });
}
<? } } ?>
$(document).ready(function() {

    gonderon();

    var int=self.setInterval("gonderon()",5000);
});

function gonderon(){
    $.ajax({
        type:'POST',
        url:'m-on.php?ney=<? echo $_GET['ney'];?>&bu=<? echo $_GET['bu'].$_GET['id'].$_GET['cID'].$_GET['gnid'];?>',
        success: function (msg) {
            $("#mon").html(msg);
        }
    });
}


</script>
<link  id="mtitle" rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<style type="text/css">

body {
	padding: 0 0 0 0;
	margin: 0;
	background-attachment: fixed;
	background-image: url(<?  $menuler2 = mysql_query ("select * from arka where i='1'");
while ($d = mysql_fetch_array($menuler2))  { echo 'http://aksarayitiraf.tekbilim.com'.$d['back']; } ?>);
	background-position: center top;
	background-color: #000;
}
</style>
<link href="style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34088609-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<SCRIPT LANGUAGE="JavaScript">
 
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=191,height=50');");
}
 
</script>
</head>

<body>

<?php 
$s5 = microtime(true);
$bilo=$_SESSION['uyeid'];
$bildirim = mysql_query ("select * from bildirim where o='".$bilo."' and oku='0' order by id desc limit 5");
while ($bil = mysql_fetch_array($bildirim))  { ?><style type="text/css">div.foixed-position{position:fixed;z-index:4000;}div.foixed-s-e{bottom:25px;left:20px;}</style><style type="text/css">div.foixed-position{_position:absolute;}div.foixed-s-e{_bottom:auto;_top:expression(ie6=(document.documentElement.scrollTop+document.documentElement.clientHeight - 52+"px") );}</style><div class="foixed-position foixed-s-e" id="bildrm" style="width:230px;height:37px;" ><a onclick="getElementById('bildrm').style.display='none';getElementById('kapamaseyi').style.display='none';" onmouseover="getElementById('kapamaseyi').style.display='block';" id="kapamaseyi" style="position:absolute;display:none;width:9px;height:10px;right:5px;top:2px;margin:0px;padding:0px;background-color:transparent;border:none;text-decoration:none;cursor:pointer;"><img src="http://img.webme.com/pic/h/htmlkodlari34/facebook_kapat.png" style="margin:0px;padding:0px;background-color:transparent;border:none;" /></a>
<style>a.facebuton{text-indent:28px;border:none;-moz-border-radius: 2px;
border-radius: 2px;
display: block;
background-color: transparent;
background-image: url(http://img.webme.com/pic/h/htmlkodlari34/facebook_bildirim.png);
background-repeat: no-repeat;
width: 210px;
padding-right:14px;
height: 37px;
padding-left:6px;
}

a.facebuton:hover{
background-position: 0 -46px;
color: #3b5998;
}
 a.facebuton:active {
background-position: 0 -46px;
color: #3b5998;
}</style>
<a onmouseout="getElementById('kapamaseyi').style.display='none';" onmouseover="getElementById('kapamaseyi').style.display='block';" style="margin:0px;padding-top:9px;text-align:left;font-family:Helvetica, Calibri, Arial, sans-serif;font-size: 12px;font-weight: normal;text-decoration: none;color:#3b5998;border:none;" href="itiraf-<?= $bil['itid'];?>.html" class="facebuton"><?= $bil['icerik'];?></a></div>
<? } ?>
<?  if($admn==1) { ?>
<div class="footer"><table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td bgcolor="#CCCCCC"><center><a href="yonet/" target="_blank">Y&ouml;netim Paneli</a> | <a id="example1"  href="yedek.html">Arkaplan	</a> |
    <a id="example1"  href="yorumlar.html">Yorumlar (<span id="myor"></span>)</a> | 
<a id="example1"  href="itiraflar.html">İtiraflar (<span id="myon"></span>)</a> | 
<a id="example1"  href="uyeler.html">Üyeler (<span id="muye"></span>)</a> | <a id="example1" href="basvuru.html"><span><?php $okms=1; $aktar = mysql_query ("select * from iletimmesajlari");
while ($okuma = mysql_fetch_array($aktar)) {  $say=$okms++; }  ?>
<?php $ok=1; $aktar = mysql_query ("select * from iletimmesajlari WHERE okundumu like 0");
while ($okx = mysql_fetch_array($aktar)) {  $sok=$ok++; }  ?>Mesajlar/Ba&#351;vurular (<?=$sok; if($sok<1) { echo 0; }?>/<?=$say;?>)</span></a></center></td>
  </tr>
</table>

</div>
        
        
		<? }   ?>

    <div class="aa">
            <div class="ort">
              <div class="logo_asu">
                <a href="index.php"><img src="images/logos.png" alt="Asü İtiraf" border="0" width="223" height="72" /></a>
              </div>
              <div class="menu_ust">
                <ul><? 	$s6 = microtime(true); ?>
                  <li><a href="index.php">Ana Sayfa</a></li>
                  <li><a href="index.php?ney=sayfa&bu=1">Kurallar</a></li>
                  <li><a href="index.php?ney=sayfa&bu=2">S&#305;k Sorulanlar</a></li>
                  <li><a href="index.php?ney=<?php if(isset($_SESSION['uyeid'])){ echo 'mesajlar&amp;gnid=1&amp;msj=oku'; } else { echo 'iletisim'; } ?>">&#304leti&#351im</a></li>
                  <div class="clear"></div>
                </ul>
              </div>
              <div class="clear"></div>
      </div>
        
</div>
    <div class="cubuk">	
        <div class="ort">
        <center>
        <? $ney=$_GET['ney'];
	     $tyil=$_GET['yil'];
		 $tay=$_GET['ay'];
		 $tgun=$_GET['gun']; 
if($ney<>"" | $tgun<>"") {
?><a href="index.php">Aksaray itiraf </a>&raquo;<?


	 if($ney<>"") {

	if($ney=="itiraf") { $itids=katid($_GET['id']); echo " ".kat($itids); echo " &raquo; ".ait($_GET['id']); } 
	if($ney=="cat") { $itids=$_GET['cID']; echo " ".kat($itids);   } 
	if($ney=="itiraf-et") { echo " İtiraf ET !";  } 
	if($ney=="mesajlar") { echo " Mesajların";  }
	if($ney=="uye-ol") {  echo " Üye ol"; }
	if($ney=="uye-olacak") { echo " Üye Ol!";  }
	if($ney=="profil-duz") { echo " Profilin";  }
	if($ney=="pop") { echo " Popüler";  }
	if($ney=="oku") { echo " Okunmamışlar";  }
	if($ney=="cv") { echo " Editörlük Başvuru Formu";  }
	if($ney=="iletisim") { echo " İletişim Formu";  }
	if($ney=="kim-la") { echo " Üyeler";  }
	if($ney=="ara") { echo " Arama Sonuçları";  }
	
	
	} else { ?> <?=$tgun;?> <?= ay($tay);?> <?=$tyil;?>  deki itiraflar<? } } else { ?>
	<a href="index.php">Yeniler</a> | <a href="index.php?ney=pop">Populer</a> | <a href="index.php?ney=yorum">Yorumlanmamış</a> | <a href="index.php?ney=uye-ol">&#220ye ol</a>
<? }?>
        
        </center></div>
    </div>
<div class="bb">
        <div class="ort">
        
          <div class="blok">
            <div class="blok_ust"></div>
         <div class="blok_ic"><table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th scope="col">
<script src="ajaxsearch.js"></script>
<form name="form1"><center>
<input name="keyword" onKeyUp="SendQuery(this.value)" class="ara_button" autocomplete="off">
<div align="left" class="box" id="autocomplete" style="WIDTH:200px;BACKGROUND-COLOR:#EDF3DE"></div></center>
</form>
<script language="JavaScript"> HideDiv("autocomplete"); </script></th>
  </tr>
</table></div>
            <div class="blok_baslik">kategoriler</div>
            <div class="blok_ic">
            <div class="menu_blok">
                <ul>
                  <li><a href="index.php?ney=cat&cID=5">Aksaray &#220niversitesi</a></li>
                  <li><a href="index.php?ney=cat&cID=6">Aile</a></li>
                  <li><a href="index.php?ney=cat&cID=7">Okul</a></li>
                  <li><a href="index.php?ney=cat&cID=11">A&#351;k</a></li>
                  <li><a href="index.php?ney=cat&cID=1">Komik</a></li>
                  <li><a href="index.php?ney=cat&cID=14">Protesto</a></li>
                  <li><a href="index.php?ney=cat&cID=8">Pi&#351;manl&#305;k</a></li>
                  <li><a href="index.php?ney=cat&cID=112">G&uuml;zin abla</a></li>
             	  <li><a href="index.php?ney=cat&cID=10">Fikir isteyen</a></li>
                  <li><a href="index.php?ney=cat&cID=113">Sinir olurum</a></li>
                  <div class="clear"></div>
                </ul>
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="blok_baslik">Reklam Alanı</div>
           <div class="blok_ic"></div> <div class="blok_ic">
                     
<center>
  <a href="http://aksarayitiraf.tekbilim.com" target="_blank"><img src="reklam/asd.jpg" width="200" height="260"></a>
</center>
            </div> <div class="blok_ic"> <div class="clear"></div>
            
            </div>
          
            <div class="blok_baslik">sol menu</div>
            <div class="blok_ic">
            <div class="menu_blok">
                <ul>
                  <li><a href="index.php?ney=uye-ol">&#220ye ol</a></li>
                  <li><a href="index.php?ney=sayfa&bu=3">Biz kimiz?</a></li>
                   <li><a href="index.php?ney=sayfa&bu=4">Site Hakk&#305nda</a></li>
                  <li><a href="index.php?ney=cv">Editorluk ba&#351vurusu</a></li>
              	<div class="clear"></div>
                </ul>
              </div>
              <div class="clear"></div>
            </div>
            <div class="blok_baslik">istatistik</div>
            <div class="blok_ic"><table width="98%" border="0" align="center" cellpadding="5">
  <tr>
    <td> <?php $s11 = microtime(true); ?>
 <table width="95%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Online Kisi Sayisi </td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><div id="mon"></div></td>
    </tr>
   <tr>
      <td>Online uye Sayisi</td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><?=$onuye;?></td>
    </tr>
    <tr>
      <td>Online Admin Sayisi</td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><?=$onadmin;?></td>
    </tr>
  <tr>
      <td width="65%">Bugun Tekil Ziyaret</td>
      <td width="6%"><strong>:</strong></td>
      <td width="29%" style="text-align: right"><?=$tbugun;?> </td>
    </tr>
    <tr>
      <td width="65%">Dun Tekil Ziyaret</td>
      <td width="6%"><strong>:</strong></td>
      <td width="29%" style="text-align: right"><? if($tdun<1) { echo '900'; } else { echo $tdun; }?></td>
    </tr>
    <tr>
      <td>Toplam itiraf Sayisi</td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><? $toplamveri=0; $aktar = mysql_query ("select id,durum from itiraf where durum='1' order by id desc  "); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;} echo $toplamveri; ?></td>
    </tr>
    <tr>
      <td>Toplam Yorum Sayisi</td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><? $toplamveriz=0; $aktars = mysql_query ("select id,durum from yorum where durum='1' order by id desc  "); 
while ($siralaw= mysql_fetch_array($aktars)) {$toplamveriz++;} echo $toplamveriz; ?></td>
    </tr>
        <tr>
      <td width="65%">Toplam Tekil Ziyaret</td>
      <td width="6%"><strong>:</strong></td>
      <td width="29%" style="text-align: right"><?=($ttt+68000);?> </td>
    </tr>
    <tr>
      <td>Toplam Tiklanma</td>
<td><strong>:</strong></td>
      <td style="text-align: right"><?   $tiklama = mysql_query ("select * from tiklama");
while ($tikk = mysql_fetch_array($tiklama))  { 
$tik=($tikk['oku']+1);  }
  echo ($tik+250000);?></td>
    </tr>
  </table><? $s88 = microtime(true);
  if($_GET['ist']==1)  {
 $siteson=($s88 - $s11); echo ' &raquo; '; echo substr($siteson, 0, 4). ' &#8482; ';
  } ?></td>
  </tr>
</table>

              <div class="clear"></div>
            </div>
            
            <div class="blok_alt"></div>
          </div>
          
	<div class="blok_ort">
    
    <? 
	 		if($ney=="itiraf") {  include("itiraf.php"); $ee=1; } 
			if($ney=="cat") {  $kat="and katid='$_GET[cID]'"; } 
			
			if($tyil>"0") {  $kat1="and yil='$_GET[yil]' "; $kat=$kat.$kat1; } 
if($tay>"0") { if($tay<"10") { $kat2="and ay='0$_GET[ay]' "; $kat=$kat.$kat2; } else { $kat2="and ay='$_GET[ay]' "; $kat=$kat.$kat2; } }
if($tgun>"0") { if($tgun<"10") {   $kat3="and gun='0$_GET[gun]' "; $kat=$kat.$kat3; } else { $kat3="and gun='$_GET[gun]' "; $kat=$kat.$kat3;  } }
			
			if($ney=="itiraf-et") {  include("itirafet.php"); $ee=1; } 
			if($ney=="mesajlar") {  include("mesajlar.php"); $ee=1; }
			if($ney=="uye-ol") {  include("uyeol.php"); $ee=1; }
			if($ney=="uye-olacak") {  include("kayitok.php"); $ee=1; }
			if($ney=="profil-duz") {  include("sifre.php"); $ee=1; }
			if($ney=="cv") {  include("cv.php"); $ee=1; }
			if($ney=="iletisim") {  include("iletisim.php"); $ee=1; }
			if($ney=="ara") {  include("ara.php"); $ee=1; }
			
			if($ney=="kim-la") { $ee=1;	$bu=$_GET['bu'];
			$uyelerz = mysql_query("select * from uye where id='".$bu."'");
while ($uyem = mysql_fetch_array($uyelerz))  { ?>

<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic"><?=$uyem['rumuz'];?>
            'nin profili</div>
            <div class="clear"></div>
        </div>
        <div class="yorumort">
            <div class="yoruruur">
              <table width="450" border="0">
                <tr>
                  <td width="64">&nbsp;</td>
                  <td width="215"><a id="example1" href="profil/<? $res=$uyem['resim']; if($res<>"") { echo $res; } else {
	 $am=$uyem['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>"><img src="profil/thumbnails/<? $res=$uyem['resim'];
				 if($res<>"") { 
				
				
				if(file_exists("profil/thumbnails/".$res)) {
				echo $res; }else { $am=$uyem['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg";  }
				
				
				
				 } else {
	 $am=$uyem['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="170" border="0" /></a></td>
                  <td width="336"><table width="100%" border="0">
                    <tr>
                      <td width="30%" style="text-align: right"><strong>Rumuz</strong></td>
                      <td width="3%" style="text-align: center"><strong>:</strong></td>
                      <td width="67%"><?=$uyem['rumuz'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align: right"><strong>B&ouml;l&uuml;m</strong></td>
                      <td style="text-align: center"><strong>:</strong></td>
                      <td><?=$uyem['bolum'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align: right"><strong>Cinsiyet</strong></td>
                      <td style="text-align: center"><strong>:</strong></td>
                      <td><? $am=$uyem['cinsiyet'];
				if($am==1) { echo "Erkek";} 
				if($am==2) { echo "Kadın"; } ?></td>
                    </tr>
                    <tr>
                      <td style="text-align: right"><strong>Aktiflik</strong></td>
                      <td style="text-align: center"><strong>:</strong></td>
                      <td><?= onmu($uyem['id']);?></td>
                    </tr>
              <tr>
                      <td style="text-align: right"><strong>T.Yorum:</strong></td>
                      <td style="text-align: center"><strong>:</strong></td>
                      <td><? $tyrm=0;  $yorrummw = mysql_query ("select * from yorum where durum='1' and uyeid='".$uyem['id']."'");
while ($yrww = mysql_fetch_array($yorrummw))  { 	 $tyrm++; } echo $tyrm;
?> </td>
                    </tr>
                                  <tr>
                      <td style="text-align: right"><strong>T.&#304;tiraf:</strong></td>
                      <td style="text-align: center"><strong>:</strong></td>
                      <td><? $tit=0;  $yorrummwt = mysql_query ("select * from itiraf where durum='1' and uyeid='".$uyem['id']."'");
while ($yrwwt = mysql_fetch_array($yorrummwt))  { 	 $tit++; } echo $tit;
?> </td>
                    </tr>
                    <tr>
                      <td style="text-align: right">&nbsp;</td>
                      <td style="text-align: center">&nbsp;</td>
                      <td><? $ust=$_GET['bu']; $inek=$_SESSION['uyeid']; if(admin($ust)=="1" or admin($inek)=="1") { ?><a href="index.php?ney=mesajlar&amp;gnid=<?=$uyem['id'];?>&amp;msj=oku">Mesaj G&ouml;nder</a><? } ?></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <br />
<?  if($admn==1) { ?>Kim bakt&#305; bu profile: <? $iss = mysql_query("select * from islem where ney='kim-la' and bu='".$bu."'");
while ($zx = mysql_fetch_array($iss))  {  
?><a href="index.php?ney=<?=$zx['ney'];?>&bu=<?=$zx['bu'];?>"><? echo uye($zx['uyeID']);?></a>
               - <? } ?> <br /><br />

Üye ne yapıyo : <?
$simdi=time(); // simdiki zaman
$besdk=($simdi-10); // 5 sn onceki zaman
  $iss = mysql_query("select * from islem where time>'".$besdk."' and uyeID='".$bu."'");
while ($zx = mysql_fetch_array($iss))  {  
?><a href="index.php?ney=<?=$zx['ney'];?>&id=<?=$zx['bu'];?>&bu=<?=$zx['bu'];?>&gnid=<?=$zx['bu'];?>"><? echo $zx['ney'].' = '.$zx['bu'];?></a>
               - <? } ?><br /><br />
               Üye ne yapmış : <lu><?
$simdi=time(); // simdiki zaman
$besdk=($simdi-10); // 5 sn onceki zaman
  $iss = mysql_query("select * from islem where uyeID='".$bu."' order by time desc limit 20");
while ($zx = mysql_fetch_array($iss))  {  
?>

<li><a href="index.php?ney=<?=$zx['ney'];?>&id=<?=$zx['bu'];?>&bu=<?=$zx['bu'];?>&gnid=<?=$zx['bu'];?>"><? echo $zx['ney'].' = '.$zx['bu'];?></a> - <? $zmn=$zx['time']; echo date('d/m/Y - H.i', $zmn); ?></li> <? } ?></lu><br /><br />


             &raquo;  <a href="./yonet/moduller/uyeler/s-duzenle.php?ID=<?=$bu;?>" target="_blank">Üye düzelt</a><br />

              <hr /><?  } ?>

<?=$uyem['kim'];?><br /><hr />
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td class="yorumic">Son &#304;tiraflar&#305;</td>
  </tr>
  <tr>
    <td><?php  $itrf=0; $yorrumm = mysql_query ("select * from itiraf where durum='1' and uyeid='".$uyem['id']."' order by id desc limit 10");
while ($yrw = mysql_fetch_array($yorrumm))  { $itrf++;

?> 
<div class="bttns">&raquo; <a href="index.php?ney=itiraf&id=<?=$yrw['id'];?>"><?=$yrw['baslik'];?>.</a></div>
<? } if($itrf==0) { echo "Hiç itirafı yok bu üyenin !"; }  ?></td>
  </tr>
  <tr>
    <td class="yorumic">Son Yorumlar&#305;</td>
  </tr>
  <tr>
    <td><?php $yrmm=0;  $yorrumm = mysql_query ("select * from yorum where durum='1' and uyeid='".$uyem['id']."' order by id desc limit 15");
while ($yrw = mysql_fetch_array($yorrumm))  { 
	$itdurum=aitdurum($yrw['itid']);
	if($itdurum==1) { $yrmm++;
?> 
<div class="bttns">&raquo; <a href="index.php?ney=itiraf&id=<?=$yrw['itid'];?>"><?=ait($yrw['itid']);?>.</a> i&ccedil;in <? $ituye=$yrw['uyeid']; if($ituye<"1") { echo $yrw['rumuz']. ' - '.rss($yrw['cinsiyet']); } else { print uye($ituye);   } ?></div>
<? } } if($yrmm==0) { echo "Hiç yorumu yok bu üyenin !"; }  ?></td>
  </tr>
</table>

</div>
        </div>
        <div class="yorumalt"></div>
	  </div>
			
			<?  }	} if($ney=="sayfa") { $bu=$_GET['bu']; $ee=1;
			$sayfalar = mysql_query("select * from sayfalar where id='".$bu."'");
while ($sy = mysql_fetch_array($sayfalar))  { ?>
			<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic"><?=$sy['sayfaadi'];?></div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur">&nbsp;<?=$sy['icerik'];?>&nbsp;</div>
          </div>
        <div class="yorumalt"></div>
	  </div>
      <?  } }  if($ney=="pop") {  $ee=1;  
     // listedeki ogelerin sayisi
$per_page = 10; // Sayfa basina gosterilecek oge sayisi
$showeachside = 4 ;//  sayfalama linklerinin sayisi << 1 2 3 >> gibi :D
	

 $aktar = mysql_query("select * from itiraf where durum='1' order by yorum desc"); 
while($veri2=mysql_fetch_array($aktar)){
$kayit_sayisi=$kayit_sayisi+1;
}
$start=$_GET['start'];
$num=$kayit_sayisi;
    $thispage = $PHP_SELF ;


    if(empty($start))$start=0;  // Baslama Pozisyonu

    $max_pages = ceil($num / $per_page); // Sayfa Sayisi
    $cur = ceil($start / $per_page)+1; 
	$toplamveri=0;
	$aktar = mysql_query ("select * from itiraf where durum='1' order by yorum desc"); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;}
	$verisay=$_GET['start'];
$aktar = mysql_query ("select * from itiraf where durum='1' order by yorum desc limit $start,$per_page"); 
while ($it = mysql_fetch_array($aktar)) {


$itid=$it['id'];?>
     
     
     
     
      <div class="yorum_<? $itsay++; echo($itsay % 2 == 0 ? "sag" : "sol"); ?>">
        <div class="yorum_ust"></div>
        <div class="yorum_ic">
<div class="yorum_t">
  <div class="yorum_ic_sol">
    <div class="yorum_say"><? $yorsay = $it['yorum']; echo $yorsay; ?></div>
    <div class="yorum_baslik"><a href="itiraf-<?=$it['id'];?>.html"><?=$it['baslik'];?></a></div>
  </div>
  <div class="yorum_ic_alt">
    <div class="yorum_ne">yorum (<? echo $yorsay;  ?>) kategori: <?= kat($it['katid']);?></div>
<div class="nick"><? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']; } else { print uye($ituye);   } ?></div></div>
</div>
<div class="yorum_res">
            <div class="yorum_cins"><img src="images/cins_<?  if($ituye<"1") { echo rssx($it['cinsiyet']); } else { echo uyecins($ituye); } ?>.png" width="33" height="21" /></div>
            
			<div class="yorum_rs"><? if($ituye>0) { ?><a href="index.php?ney=kim-la&bu=<?=$ituye;?>"><? } ?><img src="profil/thumbnails/<? $res=uyeres($ituye); if($ituye>0) { 
			
				if(file_exists("profil/thumbnails/".$res)) {
				echo $res; }else { $am=$it['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg";  }
			
			
			 } else {
	 $am=$it['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="70" border="0" /><? if($ituye>0) { ?></a><? } ?></div>
  
</div><div class="clear"></div></div>
		
        <div class="yorum_alt"></div>
      </div>
      
      
      
      
      
      
      <? } 

	  if($_GET['ney']=="oku") { $slink="&ney=oku&cID=".$_GET['cID']; }
	  ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="22%" align="left" valign="top"><? if($start+$per_page<$num)
{?>
                        <a href="index.php<?php print("?ney=pop&start=".max(0,$start+$per_page)."");?><?=$slink;?>"><img src="images/eskigonderiler.png" name="Image33" width="32" height="32" border="0" align="absmiddle" id="Image33" /> daha eskiler </a>
                        <?php  } ?></td>
                      <td width="58%" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                         
                          <td width="100%" height="22" align="center" >&nbsp;</td>
                        
                        </tr>
                      </table></td>
                      <td width="20%" align="right" valign="top"><?php
					  if($_GET['sirala']<>""){
						  $sirala="&sirala=".$_GET['sirala'];
						  }
					  $ekstralink="sayfa".$sirala;
if(($start-$per_page) >= 0)
{
    $next = $start-$per_page;
?>
                        <a href="index.php<?php print(($next>0?("?ney=pop&start=").$next:""));?><?=$slink;?>" >daha yeniler <img src="images/yenigonderiler.png" name="Image32" width="32" height="32" border="0" align="absmiddle" id="Image32" /></a>
                        <? }?></td>
                    </tr>
                  </table> 
<?   }  if($ney=="yorum") {  $ee=1;  
     // listedeki ogelerin sayisi
$per_page = 10; // Sayfa basina gosterilecek oge sayisi
$showeachside = 4 ;//  sayfalama linklerinin sayisi << 1 2 3 >> gibi :D
	

 $aktar = mysql_query("select * from itiraf where durum='1' and yorum='0' order by id desc"); 
while($veri2=mysql_fetch_array($aktar)){
$kayit_sayisi=$kayit_sayisi+1;
}
$start=$_GET['start'];
$num=$kayit_sayisi;
    $thispage = $PHP_SELF ;


    if(empty($start))$start=0;  // Baslama Pozisyonu

    $max_pages = ceil($num / $per_page); // Sayfa Sayisi
    $cur = ceil($start / $per_page)+1; 
	$toplamveri=0;
	$aktar = mysql_query ("select * from itiraf where durum='1' and yorum='0' order by id desc"); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;}
	$verisay=$_GET['start'];
$aktar = mysql_query ("select * from itiraf where durum='1' and yorum='0' order by id desc limit $start,$per_page"); 
while ($it = mysql_fetch_array($aktar)) {


$itid=$it['id'];?>
     
     
     
     
      <div class="yorum_<? $itsay++; echo($itsay % 2 == 0 ? "sag" : "sol"); ?>">
        <div class="yorum_ust"></div>
        <div class="yorum_ic">
<div class="yorum_t">
  <div class="yorum_ic_sol">
    <div class="yorum_say"><? $yorsay = $it['yorum']; echo $yorsay; ?></div>
    <div class="yorum_baslik"><a href="itiraf-<?=$it['id'];?>.html"><?=$it['baslik'];?></a></div>
  </div>
  <div class="yorum_ic_alt">
    <div class="yorum_ne">yorum (<? echo $yorsay;  ?>) kategori: <?= kat($it['katid']);?></div>
<div class="nick"><? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']; } else { print uye($ituye);   } ?></div></div>
</div>
<div class="yorum_res">
            <div class="yorum_cins"><img src="images/cins_<?  if($ituye<"1") { echo rssx($it['cinsiyet']); } else { echo uyecins($ituye); } ?>.png" width="33" height="21" /></div>
            
			<div class="yorum_rs"><? if($ituye>0) { ?><a href="index.php?ney=kim-la&bu=<?=$ituye;?>"><? } ?><img src="profil/thumbnails/<? $res=uyeres($ituye); if($ituye>0) { 
			
				if(file_exists("profil/thumbnails/".$res)) {
				echo $res; }else { $am=$it['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg";  }
			
			 } else {
	 $am=$it['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="70" border="0" /><? if($ituye>0) { ?></a><? } ?></div>
  
</div><div class="clear"></div></div>
		
        <div class="yorum_alt"></div>
      </div>
      
      
      
      
      
      
      <? } 

	  if($_GET['ney']=="oku") { $slink="&ney=oku&cID=".$_GET['cID']; }
	  ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="22%" align="left" valign="top"><? if($start+$per_page<$num)
{?>
                        <a href="index.php<?php print("?ney=yorum&start=".max(0,$start+$per_page)."");?><?=$slink;?>"><img src="images/eskigonderiler.png" name="Image33" width="32" height="32" border="0" align="absmiddle" id="Image33" /> daha eskiler </a>
                        <?php  } ?></td>
                      <td width="58%" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                         
                          <td width="100%" height="22" align="center" ></td>
                        
                        </tr>
                      </table></td>
                      <td width="20%" align="right" valign="top"><?php
					  if($_GET['sirala']<>""){
						  $sirala="&sirala=".$_GET['sirala'];
						  }
					  $ekstralink="sayfa".$sirala;
if(($start-$per_page) >= 0)
{
    $next = $start-$per_page;
?>
                        <a href="index.php<?php print(($next>0?("?ney=yorum&start=").$next:""));?><?=$slink;?>" >daha yeniler <img src="images/yenigonderiler.png" name="Image32" width="32" height="32" border="0" align="absmiddle" id="Image32" /></a>
                        <? }?></td>
                    </tr>
                  </table> 
<?   } ?><? if($ney=="giris") {  $ee=1; ?>
			<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">Giriş Yap</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur">
      <form method="post" id="form1" action="giris.php">
     <table align="center" cellpadding="2" cellspacing="0" ><tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
       <tr>
         
         <td width="112"><span class="kris">kullanici adi:</span><br /></td>
         <td width="262"><input name='id' type='text' class="form" /></td>
       </tr>
       <tr>
         
         <td><span class="kris">parola:</span><br /></td>
         <td><input name='key' type='password' class="form" /></td>
       </tr>
       <tr>
        
         <td></td>
         <td><input type="submit" name="giris" id="giris" value="Giris Yap" />
           ya da            <a href="index.php?ney=uye-ol">Uye OL !</a></td>
       </tr>
      
     </table>
      </form>
</div>
          </div>
        <div class="yorumalt"></div>
	  </div>
			
			<?  } if($ee<1)  {?>
      <?php  $s8888 = microtime(true);
  


$itsay=0;
     // listedeki ogelerin sayisi
$per_page = 10; // Sayfa basina gosterilecek oge sayisi
$showeachside = 4 ;//  sayfalama linklerinin sayisi << 1 2 3 >> gibi :D
	

 $aktar = mysql_query("select * from itiraf where durum='1' $kat order by id desc"); 
while($veri2=mysql_fetch_array($aktar)){
$kayit_sayisi=$kayit_sayisi+1;
}
$start=$_GET['start'];
$num=$kayit_sayisi;
    $thispage = $PHP_SELF ;


    if(empty($start))$start=0;  // Baslama Pozisyonu

    $max_pages = ceil($num / $per_page); // Sayfa Sayisi
    $cur = ceil($start / $per_page)+1; 
	$toplamveri=0;
	$aktar = mysql_query ("select * from itiraf where durum='1' $kat order by id desc  "); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;}
	$verisay=$_GET['start'];
$aktar = mysql_query ("select * from itiraf where durum='1' $kat order by id desc   limit $start,$per_page"); 
while ($it = mysql_fetch_array($aktar)) {

$itsay++;
$itid=$it['id'];?>
            
      <div class="yorum_<? echo($itsay % 2 == 0 ? "sag" : "sol"); ?>">
        <div class="yorum_ust"></div>
        <div class="yorum_ic">
<div class="yorum_t">
  <div class="yorum_ic_sol">
    <div class="yorum_say"><?  $yorsay = $it['yorum']; echo $yorsay;  ?></div>
    <div class="yorum_baslik"><a href="itiraf-<?=$it['id'];?>.html"><?=$it['baslik'];?></a></div>
  </div>
  <div class="yorum_ic_alt">
    <div class="yorum_ne">yorum (<? echo $yorsay; ?>) kategori: <?= kat($it['katid']);?></div>
<div class="nick"><? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']; } else { print uye($ituye);   } ?></div></div>
</div>
<div class="yorum_res">
            <div class="yorum_cins"><img src="images/cins_<?  if($ituye<"1") { echo rssx($it['cinsiyet']); } else { echo uyecins($ituye); } ?>.png" width="33" height="21" /></div>
            
			<div class="yorum_rs"><? if($ituye>0) { ?><a href="index.php?ney=kim-la&bu=<?=$ituye;?>"><? } ?><img src="profil/thumbnails/<?
			
			 $res=uyeres($ituye); if($ituye>0) { 
			
			
if(file_exists("profil/thumbnails/".$res)) { echo $res; }

else { 		echo uyecins($ituye); echo ".jpg";  }
			
			 } else {
	 $am=$it['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="65" height="65" border="0" /><? if($ituye>0) { ?></a><? } ?></div>
  
</div><div class="clear"></div></div>
		
        <div class="yorum_alt"></div>
      </div>
      
      
      
      <? } 

	  if($_GET['ney']<>"") { $slink="&ney=cat&cID=".$_GET['cID']; }
	  ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="37%" align="left" valign="top"><? if($start+$per_page<$num)
{?>
                        <a href="index.php<?php print("?start=".max(0,$start+$per_page)."");?><?=$slink;?>"><img src="images/eskigonderiler.png" name="Image33" width="32" height="32" border="0" align="absmiddle" id="Image33" /> daha eskiler </a>
                        <?php  } ?></td>
                      <td width="29%" align="center" valign="middle">&nbsp;</td>
                      <td width="34%" align="right" valign="top"><?php
					  if($_GET['sirala']<>""){
						  $sirala="&sirala=".$_GET['sirala'];
						  }
					  $ekstralink="sayfa".$sirala;
if(($start-$per_page) >= 0)
{
    $next = $start-$per_page;
?>
                        <a href="index.php?x=1<?php print(($next>0?("?start=").$next:""));?><?=$slink;?>" >daha yeniler <img src="images/yenigonderiler.png" name="Image32" width="32" height="32" border="0" align="absmiddle" id="Image32" /></a>
                        <? }?></td>
                    </tr>
                  </table><? $s88888 = microtime(true);
  if($_GET['ist']==1)  {
 $siteson=($s88888 - $s8888); echo ' &raquo; '; echo substr($siteson, 0, 4). ' &#8482; ';
  } ?><? } //itiraf sirala bitti panpa :D
				  
				  $s7 = microtime(true); ?>
                  
                  
                  
    
    
      
      
      
      
      
	</div>
          
          <div class="blok">
            <div class="blok_ust"></div>
            <div class="blok_ic">
    <div class="blok_button" onclick="location.href='index.php?ney=itiraf-et'" style="cursor:&#112;ointer">itiraf et &raquo;</div><? if(1==1) { ?>
    <div class="blok_button" onclick="javascript:popUp('radyo/index.php')" style="cursor:&#112;ointer">Radio &raquo;</div><? } ?>
    <? if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
		  echo "</div>";?>
    <div class="blok_baslik">Kullan&#305;c&#305; men&uuml;s&uuml; <div id="mon"></div></div>
            <div class="blok_ic">
            <center>Ho&#351;geldin; <? $bid=$_SESSION['uyeid'];
			$uyelerz = mysql_query("select * from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz))  { ?><?=$_SESSION['uyead']?>
<table width="94%" border="0">
  <tr>
    <td width="48%" height="94"><center><a href="index.php?ney=kim-la&amp;bu=<?=$_SESSION['uyeid'];?>"><img src="profil/thumbnails/<? $res=$uyem['resim']; if($res<>"") { echo $res; } else {
	 $am=$uyem['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="85" border="0" /></a></center></td>
    <td width="52%">
      
        
<div id="sonuc"></div>

        <a href="index.php?ney=kim-la&amp;bu=<?=$_SESSION['uyeid'];?>">Profiline git</a><br />
        <a href="index.php?ney=profil-duz">Ayarlar</a><br />
        <? $admn=$uyem['admin']; if($admn==1) { ?>
        <a href="yonet/" target="_blank">Y&ouml;netim Paneli</a><br /><? } ?>
<a href="cikis.php">&#199ık&#305&#351  yap</a></td>
  </tr><? } ?>
</table>
              <div class="clear"></div>
            
    
    <? } else { ?>
    <div class="blok_button" onclick="location.href='index.php?ney=giris'" style="cursor:&#112;ointer">giri&#351; yap &raquo;</div><? } ?>
            </div>
            <div class="blok_baslik">takvim</div>
            <div class="blok_ic">
            <? if(1==1) { ?>
            <? 
function showCalendar(){
    // index.php?yil=2012&ay=9&gun=1
    // --------------------
	$today    = getdate();
	$onay     = $today['mon'];
	$onyil    = $today['year'];
	
	$tyil=$_GET['yil']; $tay=$_GET['ay'];
	$gyil=date('Y');
	if(isset($tyil)) { $today['year']=$tyil; $gyil=$tyil;}
	$gay=($onay-1);
	if(isset($tay)) { $today['mon']=$tay; $gay=($tay-1); }

	if($gay==0) { $gyil=($tyil-1); $gay=12; } //eger 1. aydaysa 1 yıl erken ve 12. ay yapık
	
	$syil = $onyil; if($tay==12) { $syil=($tyil+1); }
	$ssay = ($tay+1); 
	//son ay

	if($onay>($gay+1)) { $sonay=' - <a href="index.php?yil='.$syil.'&ay='.$ssay.'">&raquo;</a> ';}

	$yil = "20".date("y");
	$firstDay = getdate(mktime(0,0,0,$today['mon'],1,$today['year']));
	$lastDay  = getdate(mktime(0,0,0,$today['mon']+1,0,$today['year']));
	
	
	$ay=$today['mon'];
	
	$aylar = Array(
		"1" => "Ocak", 
		"2" => "Şubat", 
		"3" => "Mart", 
		"4" =>  "Nisan", 
		"5" =>  "Mayıs", 
		"6" =>  "Haziran", 
		"7" =>  "Temmuz", 
		"8" =>  "Ağustos", 
		"9" =>  "Eylül", 
		"10" =>  "Ekim", 
		"11" =>  "Kasım", 
		"12" =>  "Aralık"
);


	// Create a table with the necessary header informations
	echo '<table>';
	echo '  <tr><th colspan="7"><a href="index.php?yil='.$gyil.'&ay='.$gay.'">&laquo;</a> - '.$aylar[$ay]." - ".$today['year'].$sonay."</th></tr>";
	echo '<tr class="days">';
	echo '  <td>Pzt</td><td>Sal</td><td>&#199ar</td><td>Per</td>';
	echo '  <td>Cum</td><td>Cmt</td><td>Pzr</td></tr>';
	
	
	// Display the first calendar row with correct positioning
	echo '<tr>';
	if ($firstDay['wday'] == 0) $firstDay['wday'] = 7;
	for($i=1;$i<$firstDay['wday'];$i++){
		echo '<td>&nbsp;</td>';
	}
	$actday = 0;
	for($i=$firstDay['wday'];$i<=7;$i++){
		$actday++;
		if ($actday == $today['mday']) {
			$class = ' class="actday"';
		} else {
			$class = '';
		}
		$varmi=0; $varmi=tvar($yil,$ay,$actday);
		if($varmi==1) { echo "<td$class><center><a href=\"index.php?yil=$yil&ay=$ay&gun=$actday\">$actday</a></center></td>"; } else 
		{ echo "<td$class><center>$actday</center></td>"; }
	}
	echo '</tr>';
	
	//Get how many complete weeks are in the actual month
	$fullWeeks = floor(($lastDay['mday']-$actday)/7);
	
	for ($i=0;$i<$fullWeeks;$i++){
		echo '<tr>';
		for ($j=0;$j<7;$j++){
			$actday++;
			if ($actday == $today['mday']) {
				$class = ' class="actday"';
			} else {
				$class = '';
			}
					$varmi=1; $varmi=tvar($yil,$ay,$actday);
		if($varmi==1) { echo "<td$class><center><a href=\"index.php?yil=$yil&ay=$ay&gun=$actday\">$actday</a></center></td>"; } else 
		{ echo "<td$class><center>$actday</center></td>"; }
		}
		echo '</tr>';
	}
	
	//Now display the rest of the month
	if ($actday < $lastDay['mday']){
		echo '<tr>';
		
		for ($i=0; $i<7;$i++){
			$actday++;
			if ($actday == $today['mday']) {
				$class = ' class="actday"';
			} else {
				$class = '';
			}
			
			if ($actday <= $lastDay['mday']){
						$varmi=0; $varmi= tvar($yil,$ay,$actday);
		if($varmi==1) { echo "<td$class><center><a href=\"index.php?yil=$yil&ay=$ay&gun=$actday\">$actday</a></center></td>"; } else 
		{ echo "<td$class><center>$actday</center></td>"; }
			}
			else {
				echo '<td>&nbsp;</td>';
			}
		}
		
		
		echo '</tr>';
	}
	
	echo '</table>';
}
?><center><? showCalendar(); ?></center>
            <? } ?>
            
              <div class="clear"></div>
            </div>
            
            <div class="blok_ic"> <div class="clear"></div></div>
            
            

            
            
            <div class="blok_baslik">Facebook'ta biz</div>
            <div class="blok_ic"></div>
            <div class="blok_ic">
              <div class="facebook">
                <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/Aksaray.itiraf.ediyorum&amp;width=200&amp;colorscheme=light&amp;border_color=AAAAAA&amp;show_faces=true&amp;connections=8&amp;stream=false&amp;header=true&amp;height=292" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:190px; height:292px;" allowtransparency="true"></iframe>
              </div>
              <div class="clear"></div>
            </div>
            
            
            
                        <div class="blok_baslik">Son Yorumlar</div>
            <div class="blok_ic"></div>
            <div class="blok_ic">
              
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="5">
  <?php  $yorrumm = mysql_query ("select id,itid,uyeid,rumuz,cinsiyet,durum from yorum where durum='1' order by id desc limit 10");
while ($yrw = mysql_fetch_array($yorrumm))  { 
	$itdurum=aitdurum($yrw['itid']);
	if($itdurum==1) {
?><tr>
    <td> &raquo; <a href="index.php?ney=itiraf&id=<?=$yrw['itid'];?>"><?=ait($yrw['itid']);?>.</a> i&ccedil;in <? $ituye=$yrw['uyeid']; if($ituye<"1") { echo $yrw['rumuz']; } else { print uyex($ituye);   } ?>
</td>
  </tr><? } } ?>
</table>

              <div class="clear"></div>
            </div>
            
            <div class="blok_alt"></div>
          </div>
          
	<div class="blok_ort">
          
          
  </div>
</div>
	<div class="clear"></div>
    <div class="cc">
    	<div class="ort">
        	<div class="copy">&copy; 2013</div>
        	<div class="telif"> Online:
<? $sgk=0; $onuye = mysql_query("select id,online,rumuz,admin from uye where online > '".$ucyz."' order by online desc limit 9");
while ($ouy = mysql_fetch_array($onuye))  { $sgk++; ?> 
<a href="index.php?ney=kim-la&bu=<?= $ouy['id']; ?>"<? if($ouy['admin']=="1") { echo ' class="aaa" '; } ?>><?= $ouy['rumuz'];?></a><? if($syy!=$sgk) { echo ", "; } } ?> </div>
        	
       	  <div style="float:right; margin-top:7px;"><strong><? $s8 = microtime(true);
 $siteson=($s8 - $s1); echo ' &raquo; '; echo substr($siteson, 0, 4). ' &#8482; '; ?></strong></div>
        <div class="clear"></div></div>
    </div>
</body>
</html>
<? } //ip ban sn


?>
