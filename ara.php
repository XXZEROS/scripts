 <link href="stil.css" rel="stylesheet" type="text/css" />
<?php 
$arama=$_GET['ara'];  
$ara=mysql_query("SELECT * FROM itiraf WHERE baslik='%$arama%'"); 
$sonuc = mysql_num_rows($ara); 


?>
<? while($it=mysql_fetch_array($ara)){  ?>1<? } ?>

<? if($sonuc < 1){ ?>
<div class="dikkat">Arama Sonucu Bulunamadı !</div>

<? }  else { ?>

<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">&quot;<?=$arama;?>&quot; Arama Sonuçları</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur">
<? while($it=mysql_fetch_array($ara)){  ?>
&raquo; <a href="x"><?=$it['baslik'];?></a> - <? $ituye=$it['uyeid']; if($ituye<"1") { echo $it['rumuz']. ' - '.rss($it['cinsiyet']); } else { print uye($ituye);   } ?> tarafından yazılmış<br>

<? } ?>
</div>
          </div>
        <div class="yorumalt"></div>
</div>

<? } ?>