<?php require_once('../Connections/baglanti.php'); 

if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid']) ){
$admn=admins($_SESSION['uyeid']); if($admn==1) { 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yönetim Paneli</title>
<link href="stil.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="hmenu/system.css" type="text/css">
<link href="hmenu/template.css" rel="stylesheet" type="text/css">
<link href="hmenu/colour_standard.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="hmenu/template.js"></script>
</head>
<script language="JavaScript">
<!--
function boyutlama()
{
var yukseklik=document.getElementById('iframe').contentWindow.document.body.scrollHeight;
document.getElementById('iframe').height=yukseklik;
}
//-->
</script>
<body>
<div id="tum">

  <div id="a">
	  		<div id="asol"><div id="asols"></div>
	    		
	   			<div id="asolg">
      			 	<div id="asolgu"><div id="tarih">
      			 	  <?php
function tarih($zaman) {
$gunler = array(
"Pazar",
"Pzrts",
"Salı",
"Çrşb",
"Pşbe",
"Cuma",
"Cmrtsi"
);

$aylar =array(
NULL,
"Ocak",
"Şubat",
"Mart",
"Nisan",
"Mayıs",
"Hzrn",
"Temmuz",
"Agsts",
"Eylül",
"Ekim",
"Kasım",
"Aralık"
);
$tarih = date("d",$zaman)." ".$aylar[date("n",$zaman)]." ".date("Y",$zaman)." ".$gunler[date("w",$zaman)]." ".date("",$zaman);
return $tarih;
}

$zaman = time();
$tarih = tarih($zaman);
echo "$tarih";
?>
   			 	  </div></div> 	  		 
	      		 	<div id="asolgn"><a href="index.php"><img src="img/anasafya.jpg" width="93" height="56" border="0" /></a></div>
	   			</div>
			</div>
        
	 	    <div id="asag">
	 	      <table width="100%" border="0" cellspacing="0" cellpadding="0">
	 	        <tr>
	 	          <td width="37%" height="118">&nbsp;</td>
	 	          <td width="63%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	 	            <tr>
	 	              <td height="50" class="yazsss"></td>
 	                </tr>
	 	            <tr>
	 	              <td height="68"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="44%" height="68">&nbsp;</td>
    <td width="56%"><a href="cikis.php" ><img src="images/bos.png" width="99" height="41" border="0" /></a><br />
<? echo $_SESSION['uyead'];?></td>
  </tr>
</table>
</td>
 	                </tr>
 	              </table></td>
 	            </tr>
 	          </table>
	 	    </div>
      
	</div>
    <div id="hormenu"><ul class="menu">
			<li class="top"><a href="#" class="top_link"><span>Site</span></a>
		<ul class="sub">
			<li><a href="index.php">Yönetim Merkezi</a></li>			
            <li><a href="alt/ayarlar.php?dili=tr" target="orta">profilim</a></li>
            <li><a target="_blank" href="../index.php">Siteyi Görüntüle</a></li>
          <li><a href="cikis.php">Çıkış</a></li>
          
          
        </ul>
	</li>
	<li class="top"><a href="moduller/yorum/s-listele.php" target="orta" class="top_link"><span>Yorumlar</span></a>
		
	</li>

        	<li class="top"><a href="moduller/itiraf/s-listele.php?dili=tr" target="orta" class="top_link"><span>İtiraflar</span></a>
		
</li><li class="top"><a href="moduller/kategori/k-listele.php?dili=tr" target="orta" class="top_link"><span>Kategoriler</span></a>
		
</li>
            	<li class="top"><a href="moduller/uyeler/s-listele.php?dili=tr" target="orta" class="top_link"><span>Üyeler</span></a>
		
</li>

    <li class="top"><a href="moduller/sayfalar/sayfa.php" target="orta" class="top_link"><span>Sayfalar</span></a></li>
       
  
	<li class="top"><a href="#" onclick="window.open&#40;'up/index.php','Dosya Yöneticisi','width=600,height=500,scrollbars=1'&#41;;return false;" class="top_link"><span>Dosya Yöneticisi</span></a>
        
    	</li>
        <li class="top"><a href="moduller/mesajlar/s-listele.php" class="top_link" target="orta"><span><?php $okms=1; $aktar = mysql_query ("select * from iletimmesajlari");
while ($okuma = mysql_fetch_array($aktar)) {  $say=$okms++; }  ?>
<?php $ok=1; $aktar = mysql_query ("select * from iletimmesajlari WHERE okundumu like 0");
while ($okx = mysql_fetch_array($aktar)) {  $sok=$ok++; }  ?>Mesajlar/Başvurular (<?=$sok; if($sok<1) { echo 0; }?>/<?=$say;?>)</span></a></li>
    </ul>
  </div>
  <iframe src="alt/guncellemeler.php" name="orta" onload="boyutlama();" scrolling="no"  id="iframe" frameborder="0" 

style="width:100%;" marginheight="0" marginwidth="0"></iframe>


<div id="z"></div>
<div id="temizle"></div>
</div>
</body>
</html><? } } else {

@header('Location: ../index.php?ney=giris'); }
 ?>