<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">Üye Profili Ayarları</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur">
         <?php $mekl = mysql_query ("select * from uye where id='".$sen."'");
while ($q = mysql_fetch_array($mekl))  { ?>   
            <form action="uyeduz.php" method="post" enctype="multipart/form-data">
<table width="470" border="0">
  <tr>
    <td width="109"><strong>Kullanıcı adı</strong></td>
    <td width="351"><input name="kadi" type="text" disabled id="kadi" value="<?=$q['kadi'];?>" /></td>
  </tr>
  <tr>
    <td><strong>Şifre</strong></td>
    <td><input type="password" name="sifre1" id="sifre"  /></td>
  </tr>
    <tr>
    <td><strong>Şifre tekrar</strong></td>
    <td><input type="password" name="sifre2" id="sifre2" /></td>
  </tr>
  <tr>
    <td><strong>Rumuz</strong></td>
    <td><input type="text" name="rumuz" id="rumuz"  value="<?=$q['rumuz'];?>" /></td>
  </tr>
  <tr>
    <td><strong>Bölüm</strong></td>
    <td><input type="text" name="bolum" id="bolum"  value="<?=$q['bolum'];?>" /></td>
  </tr>
  <tr>
    <td><strong>Mail</strong></td>
    <td><input name="mail" type="text" disabled="disabled" id="mail" value="<?=$q['mail'];?>"  /></td>
  </tr>
  <tr>
    <td><strong>Cinsiyet</strong></td>
    <td>      <label>
        <select name="cinsiyet" id="cinsiyet">
        <option value="<?=$q['cinsiyet'];?>">Değiştiremezsin</option>
        </select>
      </label></td>
  </tr>
  <tr>
    <td><strong>Resim</strong></td>
    <td><input type="file" name="resim" id="resim" /></td>
  </tr>
  <tr>
    <td><strong>Profil Yazısı</strong></td>
    <td><textarea name="kim" id="kim" cols="35" rows="7"><?=$q['kim'];?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="gonder" id="gonder" value="Güncelle"></td>
  </tr>
</table>

</form>
            <? } ?>
</div>
          </div>
        <div class="yorumalt"></div>
	  </div>