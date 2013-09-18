<? if(1==2) { ?> <link href="style.css" rel="stylesheet" type="text/css" />
<?php }

$bilo=$_SESSION['uyeid'];
  $bildirim = mysql_query ("select * from bildirim where o='".$bilo."' and itid='".$_GET['id']."'");
while ($bil = mysql_fetch_array($bildirim))  { $bilid=$bil['id'];

$bildirimoku = mysql_query("UPDATE bildirim SET oku='1' WHERE id='".$bilid."'");  }  
  
  
  
  $itiraf = mysql_query ("select * from itiraf where durum='1' and id='".$_GET['id']."'");
while ($it = mysql_fetch_array($itiraf))  { $itid=$it['id'];
$oku=($it['oku']+1);
if($fldvar==0) { $degiswz = mysql_query("UPDATE itiraf SET oku='".$oku."' WHERE id='".$itid."'");  }
$kilit=$it['kilit'];
?>     
<div class="sayfa">
        <div class="sayfa_ust"></div>
        <div class="sayfa_ic">
        
                    <div class="sayfa_t">
              <div class="sayfa_ic_sol">
                <div class="yorum_say"><? print yorumsayisi($itid); ?></div>
                <div class="sayfa_baslik"><?=$it['baslik'];?></div>
              </div>
              <div class="sayfa_ic_alt">
                <div class="sayfa_ne"><? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']. ' - '.rss($it['cinsiyet']); } else { print uye($ituye);   } ?>; <?= $it['gun']?> <?= ay($it['ay']);?> <?= $it['yil']?>, <?= $it['saat']?>, Kat:  <?= kat($it['katid']);?>, Okunma: <?=$oku;?><hr />
<?= smiley($it['itiraf']);?>
<hr /><div style="margin-left:-10px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5504202134528494";
/* itirafalt */
google_ad_slot = "2337623865";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<?  $itirafw = mysql_query ("select * from itiraf where durum='1' and id>'".$_GET['id']."' order by id desc limit 1");
while ($itw = mysql_fetch_array($itirafw))  { $onid=$itw['id']; }
  $itirafs = mysql_query ("select * from itiraf where durum='1' and id<'".$_GET['id']."' order by id desc limit 1");
while ($its = mysql_fetch_array($itirafs))  { $sonid=$its['id']; } ?>
<strong style="float:left"><a href="itiraf-<?=$sonid;?>.html">&laquo; Önceki itiraf</a></strong><strong style="float:left; margin-left:70px;"><a href="index.php?ney=iletisim&amp;c=1&amp;ID=<?=$_GET['id'];?>"><img src="yonet/moduller/itiraf/images/cancel.png" width="17" border="0" align="absbottom" /> Bu itirafı şikayet et !</a></strong><? if($onid) { ?><strong style="float:right"><a href="itiraf-<?=$onid;?>.html" >Sonraki itiraf &raquo;</a></strong><? } ?><? if($admn==1) { 
			  
			    if($_GET['kilit']=="evet" ){ 
	$kilitledik = mysql_query("UPDATE itiraf SET kilit='1' WHERE id='".$_GET['id']."'"); 
	
	echo "<script language=\"Javascript\">
window.location.href=\"index.php?ney=itiraf&id=".$_GET['id']."\"
</script>";

				}
				if($_GET['kilit']=="kaldir" ){ 
	$kilitkaldir = mysql_query("UPDATE itiraf SET kilit='0' WHERE id='".$_GET['id']."'"); 
	echo "<script language=\"Javascript\">
window.location.href=\"index.php?ney=itiraf&id=".$_GET['id']."\"
</script>";
				}
?> <div class="clear"></div>
- <a id="example1" href="d-itiraf.php?id=<?= $it['id']?>">Düzenle</a> - <a  href="index.php?ney=itiraf&id=<?=$_GET['id'];?>&kilit=<? if($kilit==1) { echo "kaldir"; } else { echo "evet";} ?>"><? if($kilit==1) { echo "Kilit Kaldır"; } else { echo "Kilitle";} ?></a> - <a href="yonet/moduller/itiraf/s-listele.php?o=c&amp;id=<?= $it['id'];?>" onClick="return confirm('İtirafı çöpe fırlatmak ister misiniz!');">Çöpe at</a> - <a href="yonet/moduller/itiraf/s-listele.php?sil=evet&amp;id=<?= $it['id'];?>" onClick="return confirm('İtirafı sonsuza dek silmek ister misiniz!');">Yok et</a><? } ?>
</div>
            </div>
            </div>
            <div class="yorum_res">
              <div class="yorum_cins"></div>
                        <div class="yorum_rs"><? if($ituye>0) { ?><a href="index.php?ney=kim-la&bu=<?=$ituye;?>"><? } ?><img src="profil/<? $res=uyeres($ituye); if($ituye>0) { echo $res; } else {
	 $am=$it['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="70" height="65" border="0" /><? if($ituye>0) { ?></a><? } ?></div>
              			
          </div><div class="clear"></div>
        
        </div>
        <div class="sayfa_alt"></div>
</div>



<? 	  } //itiraf sirala bitti panpa :D

?>

<?php $itsay=0; $yorumlar = mysql_query ("select * from yorum where durum='1' and itid='".$_GET['id']."'");
while ($yor = mysql_fetch_array($yorumlar))  { $itsay++;?>  



<div class="yorum_<? echo($itsay % 2 == 0 ? "sol" : "sag"); ?>">
        <div class="yorum_ust"></div>
        <div class="yorum_ic">
<div class="yorum_t">
  <div class="yorum_ic_sol">
    <div class="yorum_say<? $rat=$yor['rating']; if($rat>0) { echo"2"; }  if($rat<0) { echo"3"; } ?>"><?php echo $rat; ?></div>
    <div class="yorum_baslik"><? $ituye=$yor['uyeid']; if($ituye<"1") { echo $yor['rumuz']; } else { print uye($ituye);   } ?></div>
  </div>
  <div class="yorum_ic_alt">
    <div class="yorum_ne"><?=  smiley($yor['yorum']);?><hr />
<? if($admn==1) { ?>
<span style="text-align: right"><a id="example1" href="d-yorum.php?id=<?= $yor['id']?>">Düzenle</a> - <a href="yonet/moduller/yorum/s-listele.php?o=c&id=<?= $yor['id'];?>" onClick="return confirm('Yorumu çöpe fırlatmak ister misiniz!');">Çöpe at</a> - <a href="yonet/moduller/yorum/s-listele.php?sil=evet&id=<?= $yor['id'];?>" onClick="return confirm('Yorumu sonsuza dek silmek ister misiniz!');"><img src="yonet/moduller/itiraf/images/cancel.png" width="17" border="0" align="absbottom" /></a></span> - <?=$yor['ip'];?> - <?=$yor['mail'];?><hr />

<? } ?><? $edc=0;
	$yorid=$yor['id'];
	$yorumups = mysql_query("select * from rating where yorid='".$yorid."' and ip='".$ip."'");
while ($yorrok = mysql_fetch_array($yorumups))  { $edc=1; }
if($admn==1) { $edc=0;  } 
	if($edc==0) { ?><table width="62" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="32"><a href="index.php?ney=itiraf&id=<?=$_GET['id'];?>&yorumup=<?=$yor['id'];?>" title="Beğendim"><img src="images/like.png" width="20" height="20" border="0" align="absmiddle" /></a></td>
    <td width="30"><a href="index.php?ney=itiraf&id=<?=$_GET['id'];?>&yorumdown=<?=$yor['id'];?>" title="Beğenmedim"><img src="images/dislike.png" width="23" border="0" align="bottom" /></a></td>
  </tr>
</table><? } ?></div>
    <div class="clear"></div>
</div>

<div class="clear"></div>
<div style="width:103px; height:23px; float:right; margin-right:-70px; margin-top:-25px; text-align:right;"><a href="#" title="Şikayet etmek için tıklatınız"><div style="float:right"> <img src="images/unlem.png"  /></div><div style="float:right; font:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:12px; padding-right:5px; padding-top: 5px;">Şikayet</div></a></div>
</div>
<div class="yorum_res">
            <div class="yorum_cins"><img src="images/cins_<?  if($ituye<"1") { echo rssx($yor['cinsiyet']); } else { echo uyecins($ituye); } ?>.png" width="33" height="21" /></div>
            
			<div class="yorum_rs"><? if($ituye>0) { ?><a href="index.php?ney=kim-la&bu=<?=$ituye;?>"><? } ?><img src="profil/<? $res=uyeres($ituye); if($ituye>0) { echo $res; } else {
	 $am=$yor['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="70" border="0" />
				
				<? if($ituye>0) { ?></a><? } ?>
                
               
        
      </div>
  
</div><div class="clear"></div></div>
		
        <div class="yorum_alt"></div>
</div>




      
<? }  ?><br />




<?  if($_GET['islem']=="tmm" ){ ?>
<div class="onay">Yorumunuz Onaya Gönderildi. Anasayfaya gitmek için <a href="index.php" class="a">tıklatınız.</a> </div>

<? }   if($_GET['islem']=="no" ){ ?>
<div class="yasak">Lütfen tüm alanları doldurun ve geçerli bir e-mail adresi giriniz :@ </div>


<? } if($kilit==1) { ?>

<div class="dikkat">İtiraf Kilitlenmiştir! </div><? } 
$gs=1;
if($kilit==1) { $gs=0; }
if($admn==1) { $gs=1; } 
if($gs==1) { 
?>

    <script language="javascript" type="text/javascript">
function smileekle(thesmile) {
    document.itiraf.itiraf.value += " "+thesmile+" ";    
	document.itiraf.itiraf.focus();
	  }
</script>
<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">Yorum yap !</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur">
 <form id="itiraf" name="itiraf" method="post" action="" >

 <center> <? if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  ?>
       <a href="index.php?ney=kim-la&bu=<?=$_SESSION['uyeid'];?>">
        <?=$_SESSION['uyead'];?>
  </a> olarak giriş yaptınız. <a href="cikis.php">Çıkış yap &raquo;</a>
	   <table width="400" border="0" cellpadding="2" cellspacing="0">
	   <? } else { ?>
	   <a href="index.php?ney=giris">Giriş yapın!</a> , <a href="index.php?ney=uye-ol">Üye olun </a>ya da tüm alanları doldurun !</center>
	   <table width="443" border="0" align="center" cellpadding="2" cellspacing="0">
       <tr>
    <td width="71"><strong>Rumuz</strong></td>
    <td width="8"><strong>:</strong></td>
    <td width="352">
      <strong>
      <input name="rumuz" type="text" id="rumuz" value="<?= $_COOKIE["crumuz"]; ?>" size="40" maxlength="60" />
      gerekli</strong></td>
  </tr>
  <tr>
    <td><strong>Cinsiyet</strong></td>
    <td><strong>:</strong></td>
    <td><strong>
      <label>
        <select name="cinsiyet" id="cinsiyet">
          <? $ccins=$_COOKIE["ccins"]; if(isset($ccins)) { 
		  
 if($ccins==1) { ?><option value="1">Erkek</option>
 				   <option value="2">Kadın</option><? } //erkekse bitti
				 
 if($ccins==2) { ?><option value="2">Kadın</option>  
 				   <option value="1">Erkek</option><? } // kadınsa bitti
				 
 } else { // cokie yoksa ?>
          <option value="1">Erkek</option>
          <option value="2">Kadın</option><? } ?>
          </select>
        </label>
      </strong></td>
  </tr>
  <tr>
    <td><strong>E-mail</strong></td>
    <td><strong>:</strong></td>
    <td><strong>
      <input name="mail" type="text" id="mail" value="<?= $_COOKIE["cmail"]; ?>" size="30" />
      gerekli (gizli kalacak)
    </strong></td>
  </tr><? } //giris yaptiysa bunlari gorsterme ?>
</table>
<table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="84%"><textarea name="itiraf" id="itiraf" cols="43" rows="4" ></textarea>

 
</td>
    <td width="16%"><input type="submit" name="gonder" id="gonder" value="Gönder" />
      <input name="ekle" type="hidden" id="ekle" value="ok" />
       </td>
  </tr>
</table><br />

<table width="438" border="0">
  <tr>
    <td>
<a href="javascript:smileekle(':)')" title='titlebilgisi'><img src="smile/smile.gif" border="0"  title="" /></a><a href="javascript:smileekle(':D')" title='titlebilgisi'> <img src="smile/d.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':O')" title='titlebilgisi'><img src="smile/o.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':ahah:')" title='titlebilgisi'> <img src="smile/ahah.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':by:')" title='titlebilgisi'><img src="smile/by.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':evil:')" title='titlebilgisi'><img src="smile/evil.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':heey:')" title='titlebilgisi'><img src="smile/heey.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':hm:')" title='titlebilgisi'><img src="smile/hm.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':@')" title='titlebilgisi'> <img src="smile/@.gif" border="0"  title="" /> </a><a href="javascript:smileekle(':l')" title='titlebilgisi'><img src="smile/l.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':lol:')" title='titlebilgisi'><img src="smile/lol.gif" border="0"  title="" /></a><a href="javascript:smileekle(':pray:')" title='titlebilgisi'> <img src="smile/pray.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':tabe:')" title='titlebilgisi'><img src="smile/tabe.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':v')" title='titlebilgisi'><img src="smile/v.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':zzz:')" title='titlebilgisi'><img src="smile/zzz.gif" border="0"  title="" /></a><a href="javascript:smileekle(':kural:')" title='titlebilgisi'><img src="smile/kural.gif" border="0"  title="" /></a><a href="javascript:smileekle(':oha:')" title='titlebilgisi'><img src="smile/oha.gif" border="0"  title="" /></a></td>
  </tr>
</table>

 
 </form>
</div>
          </div>
        <div class="yorumalt"></div>
</div>
<? } ?>
<br />
<br />
