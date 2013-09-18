<?php require_once('Connections/baglanti.php'); require_once('foksiyon.php'); include('online.php');  include('bugun.php');

session_start();
error_reporting(0);
$ip=$_SERVER['REMOTE_ADDR'];

$time=(time()-3);
$fldvar=0;
	$flood = mysql_query("select * from flood where ip = '".$ip."' and time > '".$time."'");
while ($fld = mysql_fetch_array($flood))  { $fldvar=1; }




$flid=0; $floodx = mysql_query("select * from flood where ip = '".$ip."'");
while ($fldx = mysql_fetch_array($floodx))  { $flid=$fldx['id']; }
$times=time();  if($flid==0) { // eger ilk giriş yapıyosa
$sqlq = "insert into flood (ip, time)
values ('".$ip."', '".$times."')";
$kayitq = mysql_query($sqlq);
 } else { $degiswzx = mysql_query("UPDATE flood SET time='".$times."' WHERE id='".$flid."'"); }

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
if($kc>29) { $durum=1; } else { $durum=0; }

}

$bid=$_SESSION['uyeid'];  $uyelerzm = mysql_query("select * from uye where id='".$bid."' and admin='1'");
while ($uyemm = mysql_fetch_array($uyelerzm))  { $durum=1; } 

if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
	 // eğer üyeyse mail rumuz kontrol yapma

$sql = "insert into yorum (itid, uyeid, mail, ip, rumuz, cinsiyet, bolum, durum, yorum)
values ('".$_GET['id']."', '".$uyeid."', '".$_POST['mail']."', '".$ip."', '".$_POST['rumuz']."', '".$_POST['cinsiyet']."', '".$_POST['bolum']."', '".$durum."', '".$_POST['itiraf']."')";
$kayit = mysql_query($sql);

@header('Location: index.php?ney=itiraf&id='.$_GET['id'].'&islem=tmm');

} else {  //eğer üye DEĞİLSE mail ve rumuz kontrolu yp

if(eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $_POST['mail']) and $_POST['rumuz']<>"" and $_POST['itiraf']<>"") {  

$sql = "insert into yorum (itid, uyeid, mail, ip, rumuz, cinsiyet, bolum, durum, yorum)
values ('".$_GET['id']."', '".$uyeid."', '".$_POST['mail']."', '".$ip."', '".$_POST['rumuz']."', '".$_POST['cinsiyet']."', '".$_POST['bolum']."', '".$durum."', '".$_POST['itiraf']."')";
$kayit = mysql_query($sql);

@header('Location: index.php?ney=itiraf&id='.$_GET['id'].'&islem=tmm');	
} // mail kontrol bitti 
else  {  @header('Location: index.php?ney=itiraf&id='.$_GET['id'].'&islem=no');	 }
} // üye değilse
} // ekle=ok ise :D
}  //flood yapma pic son
 if(isset($_SESSION['uyead'])){
	  $bid=$_SESSION['uyeid']; 
	   $admn=0; $uyelerz = mysql_query("select * from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz)) 

 { $admn=$uyem['admin']; } } 
if($_GET['yorumup']<>"" ){
	$edc=0;
	$yorid=$_GET['yorumup'];
	$sayis=rand(1,1000000);
	$ipx=$ip;


	$yorumups = mysql_query("select * from rating where yorid='".$yorid."' and ip='".$ip."'");
while ($yorrok = mysql_fetch_array($yorumups))  { $edc=1; } 
if($admn==1) { $edc=0;  }
	if($edc==0) {
$sqlx = "insert rating (yorid, ip, arti)
values ('".$yorid."', '".$ip."', '1')";
$kayitx = mysql_query($sqlx);
} 
@header('Location: index.php?ney=itiraf&id='.$_GET['id']);	

}


if($_GET['yorumdown']<>"" ){
	$edc=0;
	$yorid=$_GET['yorumdown'];
	$yorumups = mysql_query("select * from rating where yorid='".$yorid."' and ip='".$ip."'");
while ($yorrok = mysql_fetch_array($yorumups))  { $edc=1; } 
if($admn==1) { $edc=0;  }
	if($edc==0) {
$sqlx = "insert rating (yorid, ip, eksi)
values ('".$yorid."', '".$ip."', '1')";
$kayitx = mysql_query($sqlx);
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

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="Aksaray Üniversitesi, Aksaray Uni, Aksaray Unv, Aksaray, Asü, ASÜ, itiraf, İtiraf, asü itiraf, Asü İtiraf" name="keywords">
<meta content="Asü itiraf sitesi" name="description">
<meta content="1 days" name="revisit-after">
<meta name="Author" content="Atilla Mutlu axaturk.com">

<meta property="og:title" content="Asü İtiraf" />
<meta property="og:type" content="school" />
<meta property="og:url" content="http://www.asuitiraf.com" />
<meta property="og:image" content="http://www.asuitiraf.com/images/2.png" />
<meta property="og:site_name" content="asu itiraf" />
<meta property="fb:admins" content="100001581495599" />
<script src="//connect.facebook.net/tr_TR/all.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
   <script type=”text/javascript”>
        jQuery.noConflict();
    </script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>

	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});


function smileekle(thesmile) {
    document.itiraf.itiraf.value += " "+thesmile+" ";    
	document.itiraf.itiraf.focus();
	  }


function smileekle(thesmile) {
    document.itiraf.itirafy.value += " "+thesmile+" ";    
	document.itiraf.itirafy.focus();
	  }


$(document).ready(function() {

    gonder();

    var int=self.setInterval("gonder()",2000);
});
 
function gonder(){
    $.ajax({
        type:'POST',
        url:'m-bil.php',
        success: function (msg) {
            $("#sonuc").html(msg);
        }
    });
}
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
<? } ?>
$(document).ready(function() {

    gonderon();

    var int=self.setInterval("gonderon()",2000);
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

$(document).ready(function() {      istt();      var int=self.setInterval("istt()",5000); });

function istt(){      $.ajax({   type:'POST',   url:'m-ist.php',     success: function (msg) {
            $("#mist").html(msg);
        }
    });
} 

<? if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
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

    mmm();

    var int=self.setInterval("mmm()",5000);
});

function mmm(){
    $.ajax({
        type:'POST',
        url:'m-title.php',
        success: function (msg) {
            $("#mtitle").html(msg);
        }
    });
}

</script>
<title id="mtitle"></title>
<style type="text/css">

body {
	padding: 0 0 0 0;
	margin: 0;
	background-attachment: fixed;
	background-image: url(back/17.jpg);
	background-position: center top;
	background-color: #000;
}
img {
	border: none;
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
</head>

<body>
<?  if($admn==1) { ?>
<div class="footer"><table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td bgcolor="#CCCCCC"><a href="yonet/" target="_blank">Yönetim Paneli</a> | 
    <a id="example1"  href="yorumlar.html">Yorumlar (<span id="myor"></span>)</a> | 
<a id="example1"  href="itiraflar.html">İtiraflar (<span id="myon"></span>)</a> | 
<a id="example1"  href="uyeler.html">Üyeler (<span id="muye"></span>)</a> | <a id="example1" href="basvuru.html"><span><?php $okms=1; $aktar = mysql_query ("select * from iletimmesajlari");
while ($okuma = mysql_fetch_array($aktar)) {  $say=$okms++; }  ?>
<?php $ok=1; $aktar = mysql_query ("select * from iletimmesajlari WHERE okundumu like 0");
while ($okx = mysql_fetch_array($aktar)) {  $sok=$ok++; }  ?>Mesajlar/Başvurular (<?=$sok; if($sok<1) { echo 0; }?>/<?=$say;?>)</span></a></td>
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
                <ul>
                  <li><a href="index.php">Ana Sayfa</a></li>
                  <li><a href="index.php?ney=sayfa&bu=1">Kurallar</a></li>
                  <li><a href="index.php?ney=sayfa&bu=2">Sık Sorulanlar</a></li>
                  <li><a href="index.php?ney=<?php if(isset($_SESSION['uyeid'])){ echo 'mesajlar&amp;gnid=1&amp;msj=oku'; } else { echo 'iletisim'; } ?>">İletişim</a></li>
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
?><a href="index.php">Asuitiraf </a>&raquo;<? if($ney<>"") {
	
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
	<a href="index.php">Yeniler</a> | <a href="index.php?ney=pop">Populer</a> | <a href="index.php?ney=oku">Okunmamış</a> | <a href="index.php?ney=uye-ol">Üye ol</a>
<? }?>
        
        </center></div>
    </div>
<div class="bb">
        <div class="ort">
        
          <div class="blok">
            <div class="blok_ust"></div>
          
            <div class="blok_baslik">kategoriler</div>
            <div class="blok_ic">
            <div class="menu_blok">
                <ul>
                  <li><a href="index.php?ney=cat&cID=5">Aşk</a></li>
                  <li><a href="index.php?ney=cat&cID=6">Aile</a></li>
                  <li><a href="index.php?ney=cat&cID=7">Okul</a></li>
                  <li><a href="index.php?ney=cat&cID=11">Dram</a></li>
                  <li><a href="index.php?ney=cat&cID=1">Komik</a></li>
                  <li><a href="index.php?ney=cat&cID=14">Protesto</a></li>
                  <li><a href="index.php?ney=cat&cID=8">Pişmanlık</a></li>
                  <li><a href="index.php?ney=cat&cID=112">Güzin abla</a></li>
             	  <li><a href="index.php?ney=cat&cID=10">Fikir isteyen</a></li>
                  <li><a href="index.php?ney=cat&cID=113">Sinir olurum</a></li>
                  <div class="clear"></div>
                </ul>
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="blok_baslik">reklam</div>
           <div class="blok_ic"></div> <div class="blok_ic"><center><script type="text/javascript"><!--
google_ad_client = "ca-pub-5504202134528494";
/* blok */
google_ad_slot = "8992916230";
google_ad_width = 200;
google_ad_height = 200;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
            </div> <div class="blok_ic"> <div class="clear"></div>
            </div>
          
            <div class="blok_baslik">sol menü</div>
            <div class="blok_ic">
            <div class="menu_blok">
                <ul>
                  <li><a href="index.php?ney=uye-ol">Üye ol</a></li>
                  <li><a href="index.php?ney=sayfa&bu=3">Biz kimiz?</a></li>
                  <li><a href="index.php?ney=cv">Editörlük başvurusu</a></li>
              	<div class="clear"></div>
                </ul>
              </div>
              <div class="clear"></div>
            </div>
            <div class="blok_baslik">istatistik</div>
            <div class="blok_ic"><table width="98%" border="0" align="center" cellpadding="5">
  <tr>
    <td><div id="mist"></div></td>
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
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>"><img src="profil/<? $res=$uyem['resim']; if($res<>"") { echo $res; } else {
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
                      <td style="text-align: right"><strong>Bölüm</strong></td>
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
                      <td style="text-align: right"><strong>T.İtiraf:</strong></td>
                      <td style="text-align: center"><strong>:</strong></td>
                      <td><? $tit=0;  $yorrummwt = mysql_query ("select * from itiraf where durum='1' and uyeid='".$uyem['id']."'");
while ($yrwwt = mysql_fetch_array($yorrummwt))  { 	 $tit++; } echo $tit;
?> </td>
                    </tr>
                    <tr>
                      <td style="text-align: right">&nbsp;</td>
                      <td style="text-align: center">&nbsp;</td>
                      <td><? $ust=$_GET['bu']; $inek=$_SESSION['uyeid']; if(admin($ust)=="1" or admin($inek)=="1") { ?><a href="index.php?ney=mesajlar&amp;gnid=<?=$uyem['id'];?>&amp;msj=oku">Mesaj Gönder</a><? } ?></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <br />
<?  if($admn==1) { ?>Kim baktı bu profile: <? $iss = mysql_query("select * from islem where ney='kim-la' and bu='".$bu."'");
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
    <td class="yorumic">Son İtirafları</td>
  </tr>
  <tr>
    <td><?php  $itrf=0; $yorrumm = mysql_query ("select * from itiraf where durum='1' and uyeid='".$uyem['id']."' order by id desc limit 10");
while ($yrw = mysql_fetch_array($yorrumm))  { $itrf++;

?> 
<div class="bttns">&raquo; <a href="index.php?ney=itiraf&id=<?=$yrw['id'];?>"><?=$yrw['baslik'];?>.</a></div>
<? } if($itrf==0) { echo "Hiç itirafı yok bu üyenin !"; }  ?></td>
  </tr>
  <tr>
    <td class="yorumic">Son Yorumları</td>
  </tr>
  <tr>
    <td><?php $yrmm=0;  $yorrumm = mysql_query ("select * from yorum where durum='1' and uyeid='".$uyem['id']."' order by id desc limit 15");
while ($yrw = mysql_fetch_array($yorrumm))  { 
	$itdurum=aitdurum($yrw['itid']);
	if($itdurum==1) { $yrmm++;
?> 
<div class="bttns">&raquo; <a href="index.php?ney=itiraf&id=<?=$yrw['itid'];?>"><?=ait($yrw['itid']);?>.</a> için <? $ituye=$yrw['uyeid']; if($ituye<"1") { echo $yrw['rumuz']. ' - '.rss($yrw['cinsiyet']); } else { print uye($ituye);   } ?></div>
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
      <?  } }  if($ney=="oku") {  $ee=1; 
     // listedeki ogelerin sayisi
$per_page = 15; // Sayfa basina gosterilecek oge sayisi
$showeachside = 4 ;//  sayfalama linklerinin sayisi << 1 2 3 >> gibi :D
	

 $aktar = mysql_query("select id,durum,oku from itiraf where durum='1' order by oku asc"); 
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
	$aktar = mysql_query ("select id,durum,oku from itiraf where durum='1' order by oku asc"); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;}
	$verisay=$_GET['start'];
$aktar = mysql_query ("select id,durum,itid,uyeid,rumuz,cinsiyet from itiraf where durum='1' order by oku asc limit $start,$per_page"); 
while ($it = mysql_fetch_array($aktar)) {


$itid=$it['id'];?>
     
     
     
     
      <div class="yorum_<? echo($itsay % 2 == 0 ? "sag" : "sol"); ?>">
        <div class="yorum_ust"></div>
        <div class="yorum_ic">
<div class="yorum_t">
  <div class="yorum_ic_sol">
    <div class="yorum_say"><? print yorumsayisi($itid); ?></div>
    <div class="yorum_baslik"><a href="itiraf-<?=$it['id'];?>.html"><?=$it['baslik'];?></a></div>
  </div>
  <div class="yorum_ic_alt">
    <div class="yorum_ne">yorum (<? print yorumsayisi($itid); ?>) kategori: <?= kat($it['katid']);?></div>
<div class="nick"><? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']; } else { print uye($ituye);   } ?></div></div>
</div>
<div class="yorum_res">
            <div class="yorum_cins"><img src="images/cins_<?  if($ituye<"1") { echo rssx($it['cinsiyet']); } else { echo uyecins($ituye); } ?>.png" width="33" height="21" /></div>
            
			<div class="yorum_rs"><? if($ituye>0) { ?><a href="index.php?ney=kim-la&bu=<?=$ituye;?>"><? } ?><img src="profil/<? $res=uyeres($ituye); if($ituye>0) { echo $res; } else {
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
                        <a href="index.php<?php print("?start=".max(0,$start+$per_page)."");?><?=$slink;?>"><img src="images/eskigonderiler.png" name="Image33" width="32" height="32" border="0" align="absmiddle" id="Image33" /> daha eskiler </a>
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
                        <a href="index.php?x=1<?php print(($next>0?("?start=").$next:""));?><?=$slink;?>" >daha yeniler <img src="images/yenigonderiler.png" name="Image32" width="32" height="32" border="0" align="absmiddle" id="Image32" /></a>
                        <? }?></td>
                    </tr>
                  </table> 
<? }  if($ney=="pop") {  $ee=1; $itsay=0; 
$sirala=array();
  $itirafc = mysql_query ("select durum,id from itiraf where durum='1' order by id desc limit 11000");
while ($itc = mysql_fetch_array($itirafc))  { 

$ys=0; $yorumlar = mysql_query ("select itid,durum from yorum where durum='1' and itid='".$itc['id']."'");
while ($yor = mysql_fetch_array($yorumlar))  { $ys++; }


$sirala[] = array($ys, $itc[id]);

} //itiraf çekme bitti 

 

 rsort($sirala);
 
//cikti alma fonksiyonu
for ($i=0; $i <= 15; $i++) {



$aktar = mysql_query ("select * from itiraf where id='".$sirala[$i][1]."'"); 
while ($it = mysql_fetch_array($aktar)) { 
$itid=$it['id'];
$itsay++;
?>
      <div class="yorum_<? echo($itsay % 2 == 0 ? "sag" : "sol"); ?>">
        <div class="yorum_ust"></div>
        <div class="yorum_ic">
<div class="yorum_t">
  <div class="yorum_ic_sol">
    <div class="yorum_say"><? print yorumsayisi($itid); ?></div>
    <div class="yorum_baslik"><a href="itiraf-<?=$it['id'];?>.html"><?=$it['baslik'];?></a></div>
  </div>
  <div class="yorum_ic_alt">
    <div class="yorum_ne">yorum (<? print yorumsayisi($itid); ?>) kategori: <?= kat($it['katid']);?></div>
<div class="nick"><? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']; } else { print uye($ituye);   } ?></div></div>
</div>
<div class="yorum_res">
            <div class="yorum_cins"><img src="images/cins_<?  if($ituye<"1") { echo rssx($it['cinsiyet']); } else { echo uyecins($ituye); } ?>.png" width="33" height="21" /></div>
            
			<div class="yorum_rs"><? if($ituye>0) { ?><a href="index.php?ney=kim-la&bu=<?=$ituye;?>"><? } ?><img src="profil/<? $res=uyeres($ituye); if($ituye>0) { echo $res; } else {
	 $am=$it['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="65" height="65" border="0" /><? if($ituye>0) { ?></a><? } ?></div>
  
</div><div class="clear"></div></div>
		
        <div class="yorum_alt"></div>
      </div>
      
      <? } }  } if($ney=="giris") {  $ee=1; ?>
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
         <td><input type="submit" name="giris" id="giris" value="Giriş Yap" />
           ya da            <a href="index.php?ney=uye-ol">Üye OL !</a></td>
       </tr>
      
     </table>
      </form>
</div>
          </div>
        <div class="yorumalt"></div>
	  </div>
			
			<?  } if($ee<1)  {?>
      <?php


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
    <div class="yorum_say"><? print yorumsayisi($itid); ?></div>
    <div class="yorum_baslik"><a href="itiraf-<?=$it['id'];?>.html"><?=$it['baslik'];?></a></div>
  </div>
  <div class="yorum_ic_alt">
    <div class="yorum_ne">yorum (<? print yorumsayisi($itid); ?>) kategori: <?= kat($it['katid']);?></div>
<div class="nick"><? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']; } else { print uye($ituye);   } ?></div></div>
</div>
<div class="yorum_res">
            <div class="yorum_cins"><img src="images/cins_<?  if($ituye<"1") { echo rssx($it['cinsiyet']); } else { echo uyecins($ituye); } ?>.png" width="33" height="21" /></div>
            
			<div class="yorum_rs"><? if($ituye>0) { ?><a href="index.php?ney=kim-la&bu=<?=$ituye;?>"><? } ?><img src="profil/<? $res=uyeres($ituye); if($ituye>0) { echo $res; } else {
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
                      <td width="22%" align="left" valign="top"><? if($start+$per_page<$num)
{?>
                        <a href="index.php<?php print("?start=".max(0,$start+$per_page)."");?><?=$slink;?>"><img src="images/eskigonderiler.png" name="Image33" width="32" height="32" border="0" align="absmiddle" id="Image33" /> daha eskiler </a>
                        <?php  } ?></td>
                      <td width="58%" align="center" valign="middle">&nbsp;</td>
                      <td width="20%" align="right" valign="top"><?php
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
                  </table> <? } //itiraf sirala bitti panpa :D ?>
                  
                  
                  
    
    
      
      
      
      
      
	</div>
          
          <div class="blok">
            <div class="blok_ust"></div>
            <div class="blok_ic">
    <div class="blok_button" onclick="location.href='index.php?ney=itiraf-et'" style="cursor:&#112;ointer">itiraf et &raquo;</div>
    <? if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
		  echo "</div>";?>
    <div class="blok_baslik">Kullanıcı menüsü <div id="mon"></div></div>
            <div class="blok_ic">
            <center>Hoşgeldin; <? $bid=$_SESSION['uyeid'];
			$uyelerz = mysql_query("select * from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz))  { ?><?=$_SESSION['uyead']?>
<table width="94%" border="0">
  <tr>
    <td width="48%" height="94"><center><a href="index.php?ney=kim-la&amp;bu=<?=$_SESSION['uyeid'];?>"><img src="profil/<? $res=$uyem['resim']; if($res<>"") { echo $res; } else {
	 $am=$uyem['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="85" border="0" /></a></center></td>
    <td width="52%">
      
        
<div id="sonuc"></div>

        <a href="index.php?ney=kim-la&amp;bu=<?=$_SESSION['uyeid'];?>">Profiline git</a><br />
        <a href="index.php?ney=profil-duz">Ayarlar</a><br />
        <? $admn=$uyem['admin']; if($admn==1) { ?>
        <a href="yonet/" target="_blank">Yönetim Paneli</a><br /><? } ?>
<a href="cikis.php">Çıkış yap</a></td>
  </tr><? } ?>
</table>
              <div class="clear"></div>
            
    
    <? } else { ?>
    <div class="blok_button" onclick="location.href='index.php?ney=giris'" style="cursor:&#112;ointer">giriş yap &raquo;</div><? } ?>
            </div>
            <div class="blok_baslik">takvim</div>
            <div class="blok_ic">
            
            <? 
function showCalendar(){
    // Get key day informations. 
    // We need the first and last day of the month and the actual day
	$today    = getdate();

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
	echo '  <tr><th colspan="7">'.$aylar[$ay]." - ".$today['year']."</th></tr>";
	echo '<tr class="days">';
	echo '  <td>Pzt</td><td>Sal</td><td>Çar</td><td>Per</td>';
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
            
            
              <div class="clear"></div>
            </div>
            <div class="blok_baslik">facebook'ta biz</div>
            <div class="blok_ic"></div>
            <div class="blok_ic">
              <div class="facebook">
                <iframe src="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/pages/AS%C3%9C-%C4%B0tiraf/258230557529879&amp;width=200&amp;colorscheme=light&amp;border_color=AAAAAA&amp;show_faces=true&amp;connections=8&amp;stream=false&amp;header=true&amp;height=292" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:190px; height:292px;" allowtransparency="true"></iframe>
              </div>
              <div class="clear"></div>
            </div>
            <div class="blok_alt"></div>
            
          </div>
          
          
          
  </div>
</div>
	<div class="clear"></div>
    <div class="cc">
    	<div class="ort">
        	<div class="copy">&copy; 2012</div>
        	<div class="telif">Tasarım ve Yazılım : Atilla . Online Üyeler :
<? $sgk=0; $onuye = mysql_query("select id,online,rumuz from uye where online > '".$ucyz."' order by online desc limit 10");
while ($ouy = mysql_fetch_array($onuye))  { $sgk++; ?> 
<a href="index.php?ney=kim-la&bu=<?= $ouy['id'];?>"><?= $ouy['rumuz'];?></a><? if($syy!=$sgk) { echo ", "; } } ?> </div>
        <div class="clear"></div></div>
    </div>
</body>
</html>
