 <link href="style.css" rel="stylesheet" type="text/css" />
<? 
	  $ip = $_SERVER['REMOTE_ADDR']; 
$kon=htmlspecialchars(strip_tags(mysql_escape_string($_POST['konu'])));
	  $frm=0;
$cekx = mysql_query ("select * from iletimmesajlari where ip='".$ip."'and konu='".$kon."'");
while ($xxzz = mysql_fetch_array($cekx))  { $frm=(1+$frm); }

if ($frm<2) { 
	  
	  if($_POST['gonder']=="tmm" ){ 
	
	  if (eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $_POST['email']))  {
	  $s1=$_POST['s1'];
	  $s2=$_POST['s2'];
	  $top=($s1+$s2);
	  $ne=$_POST['ne'];
	   if($top==$ne) {
		   
$isim=htmlspecialchars(strip_tags(mysql_escape_string($_POST['ad'])));
$maili=htmlspecialchars(strip_tags(mysql_escape_string($_POST['email'])));
$konu='İnsan Kaynakları';
$mesaj='<table width="600" border="0" align="center" cellpadding="2" cellspacing="0">
       <tr>
    <td width="180" class="cvv"><strong>Ad Soyad</strong></td>
    <td width="6"><strong>:</strong></td>
    <td width="402" class="cvv">
      <strong>
      '.$_POST['ad'].'
      </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Cinsiyet</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
'.$_POST['cinsiyet'].'
      </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>E-mail</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['email'].' </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Facebook Adresiniz</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['fb'].'</strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Varsa İnternet Siteniz</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['net'].'</strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Telefon</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['tel'].'
    </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Bölüm</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['bolum'].'</strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Sınıf</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
'.$_POST['sinif'].'</strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Kaldığınız Yer</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['yer'].'</strong></td>
  </tr>
  <tr>
    <td height="38" class="cvv"><strong>Günde Kaç Saat Online Oluyorsunuz</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['gunluk'].'</strong></td>
  </tr>
  <tr>
    <td height="30" class="cvv"><strong>Hangi Saatler Arasında</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['saat'].' </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Toplantılara Katılma Durumunuz</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      '.$_POST['toplanti'].' </strong></td>
  </tr>
</table>';
$sql = "insert into iletimmesajlari (isim, mail, konu, yazi, ip)
values ('".$isim."', '".$maili."', '".$konu."', '".$mesaj."', '".$ip."')";
$kayit = mysql_query($sql);

?>
<div class="onay">Formunuz Gönderildi. Eğer şartlar uygunsa size en kısa sürede ulaşacağız.<br />
 Anasayfaya gitmek için <a href="index.php" class="a">tıklatınız.</a> </div>

<? } else { ?>
<div class="yasak">Lütfen tüm alanları doldurun ve geçerli bir e-mail adresi giriniz :@ </div>

<? } } else { ?><div class="dikkat"> Lütfen Geçerli Bir E-mail adresi giriniz ! </div><? } } 


 } ?>

<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">Editörlük Başvuru Formu</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur">
 <form  id="cv" name="cv" method="post" action="" >

	   <table width="450" border="0" align="center" cellpadding="2" cellspacing="0">
       <tr>
    <td width="180" class="cvv"><strong>Ad Soyad</strong></td>
    <td width="6"><strong>:</strong></td>
    <td width="402" class="cvv">
      <strong>
      <input name="ad" type="text" id="ad" size="30" maxlength="60" />
      gerekli</strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Cinsiyet</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <label>
        <select name="cinsiyet" id="cinsiyet">
          <option value="Erkek">Erkek</option>
          <option value="Kadın">Kadın</option>
        </select>
        </label>
      </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>E-mail</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <input name="email" type="text" id="email" size="30" />
      gerekli </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Facebook Adresiniz</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <input name="fb" type="text" id="fb" size="30" />
      gerekli </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Varsa İnternet Siteniz</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <input name="net" type="text" id="net" value="http://" size="30" />
      gerekli </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Telefon</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <input name="tel" type="text" id="tel" value="+90 " />
    </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Bölüm</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <input name="bolum" type="text" id="bolum" size="30" />
      gerekli </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Sınıf</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
<select name="sinif" id="sinif">
  <option value="1">1. Sınıf</option>
  <option value="2">2. Sınıf</option>
  <option value="3">3. Sınıf</option>
  <option value="4">4. Sınıf</option>
  <option value="5">5. Sınıf</option>
  <option value="6">6. Sınıf</option>
  <option value="7">7. Sınıf</option>
</select>
gerekli </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Kaldığınız Yer</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
         <select name="yer" id="yer">
           <option value="Devlet Yurdu">Devlet Yurdu</option>
           <option value="Özel Yurt">Özel Yurt</option>
           <option value="Apart">Apart</option>
           <option value="Ailem ile">Ailem ile</option>
           <option value="Öğrenci Evinde">Öğrenci Evinde</option>
         </select>
      gerekli</strong></td>
  </tr>
  <tr>
    <td height="48" class="cvv"><strong>Günde Kaç Saat Online Oluyorsunuz</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <select name="gunluk" id="gunluk">
        <option value="1-2 Saat">1-2 Saat</option>
        <option value="2-3 Saat">2-3 Saat</option>
        <option value="3-4 Saat">3-4 Saat</option>
        <option value="4 den Fazla">4'den fazla</option>
      </select>
      gerekli </strong></td>
  </tr>
  <tr>
    <td height="45" class="cvv"><strong>Hangi Saatler Arasında</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <input name="saat" type="text" id="saat" size="30" />
      gerekli </strong></td>
  </tr>
  <tr>
    <td class="cvv"><strong>Toplantılara Katılma Durumunuz</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
      <select name="toplanti" id="toplanti">
        <option value="Her zaman">Her Zaman</option>
        <option value="Müsait Olduğumda">Müsait Olduğumda</option>
        <option value="Katılmayacağım">Katılamayacağım</option>
      </select>
      gerekli </strong></td>
  </tr>
</table>



<center><input type="submit" name="gonder" id="gonder" value="Formu Gönder" /></center>
      <input name="gonder" type="hidden" id="gonder" value="tmm" />


</form>
</div>
          </div>
        <div class="yorumalt"></div>
</div>

<br />
<br />
