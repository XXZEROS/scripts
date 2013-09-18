
<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">İtiraf Et !</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur">
<? if($_GET['islem']=="no" ){ ?>
Lütfen tüm alanları doldurun ve geçerli bir e-mail adresi giriniz :@ 
<? }  ?>
<? if($_GET['islem']=="tmm" ){ ?>
İtirafınız Onaya Gönderildi. Anasayfaya gitmek için <a href="index.php" class="a">tıklatınız.</a>
<? } else { ?>
 <form id="itiraf" name="itiraf" method="post" action="">

  <? if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  ?>
       <a href="index.php?ney=kim-la&bu=<?=$_SESSION['uyeid'];?>">
       <?=$_SESSION['uyead'];?>
  </a> olarak giriş yaptınız. <a href="cikis.php">Çıkış yap &raquo;</a>
	   <table width="600" border="0" cellpadding="2" cellspacing="0">
	   <? } else { ?>
	   <a href="index.php?ney=giris">Giriş yapın!</a> , <a href="index.php?ney=uye-ol">Üye olun </a>ya da tüm alanları doldurun
	   <table width="470" border="0" align="center" cellpadding="2" cellspacing="0">
       <tr>
    <td width="88"><strong>Rumuz</strong></td>
    <td width="8"><strong>:</strong></td>
    <td width="492">
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
       <option value="">SECINIZ</option>   <? $ccins=$_COOKIE["ccins"]; if(isset($ccins)) { 
		  
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
      <input name="mail" type="text" id="mail"  value="<?= $_COOKIE["cmail"]; ?>"  size="40" />
    gerekli</strong></td>
  </tr><? } //giris yaptiysa bunlari gorsterme ?>
  <tr>
    <td width="88"><strong>Kategori</strong></td>
    <td><strong>:</strong></td>
    <td><strong>
      <label>
        <select name="kat" id="kat">
     <option value="">SECINIZ</option>  <?php $mekl = mysql_query ("select * from kategori order by id asc");
while ($q = mysql_fetch_array($mekl))  { ?><option value="<?=$q['id'];?>"><?=$q['baslik'];?></option><? } ?>
         
        </select>
      </label>
    </strong></td>
  </tr>
  <tr>
    <td><strong>İtiraf Başlığı</strong></td>
    <td><strong>:</strong></td>
    <td><strong>
      <input name="baslik" type="text" id="baslik" size="40" />      gerekli</strong></td>
  </tr>
</table>
<table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="367"><textarea name="itirafy" id="itirafy" cols="43" rows="5"></textarea><br />
<a href="javascript:smileekle(':)')" title='titlebilgisi'><img src="smile/smile.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':P')" title='titlebilgisi'><img src="smile/p.bmp" border="0"  title="" /></a> 
<a href="javascript:smileekle(':D')" title='titlebilgisi'><img src="smile/d.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':O')" title='titlebilgisi'><img src="smile/o.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':ahah:')" title='titlebilgisi'><img src="smile/ahah.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':by:')" title='titlebilgisi'><img src="smile/by.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':evil:')" title='titlebilgisi'><img src="smile/evil.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':heey:')" title='titlebilgisi'><img src="smile/heey.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':hm:')" title='titlebilgisi'><img src="smile/hm.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':@')" title='titlebilgisi'><img src="smile/@.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':kural:')" title='titlebilgisi'><img src="smile/kural.gif" border="0"  title="" /></a>
<a href="javascript:smileekle(':l')" title='titlebilgisi'><img src="smile/l.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':lol:')" title='titlebilgisi'><img src="smile/lol.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':oha:')" title='titlebilgisi'><img src="smile/oha.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':pray:')" title='titlebilgisi'><img src="smile/pray.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':tabe:')" title='titlebilgisi'><img src="smile/tabe.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':v')" title='titlebilgisi'><img src="smile/v.gif" border="0"  title="" /></a> 
<a href="javascript:smileekle(':zzz:')" title='titlebilgisi'><img src="smile/zzz.gif" border="0"  title="" /></a>  </td>
    <td width="93"><input type="submit" name="gonder" id="gonder" value="Gönder" /><br /><br />


    &nbsp;
      <input name="itiraf" type="hidden" id="itiraf" value="ok" /></td>
  </tr>
</table>




</form><? } ?>
</div>
          </div>
        <div class="yorumalt"></div>
	  </div>
