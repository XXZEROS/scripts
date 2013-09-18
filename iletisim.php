 <link href="style.css" rel="stylesheet" type="text/css" />
<? 
	  $ip = $_SERVER['REMOTE_ADDR']; 
$kon=htmlspecialchars(strip_tags(mysql_escape_string($_POST['konu'])));
	  $frm=0;
$cekx = mysql_query ("select * from iletimmesajlari where ip='".$ip."'and konu='".$kon."'");
while ($xxzz = mysql_fetch_array($cekx))  { $frm=(1+$frm); }

if ($frm<2) { 
	  
	  if($_POST['mesaj']=="tmm" ){ 
	
	  if (eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $_POST['email']))  {
	  $s1=$_POST['s1'];
	  $s2=$_POST['s2'];
	  $top=($s1+$s2);
	  $ne=$_POST['ne'];
	   if($top==$ne) {
		   
$isim=htmlspecialchars(strip_tags(mysql_escape_string($_POST['email'])));
$maili=htmlspecialchars(strip_tags(mysql_escape_string($_POST['email'])));
$konu=htmlspecialchars(strip_tags(mysql_escape_string($_POST['konu'])));
$mesaj=htmlspecialchars(strip_tags(mysql_escape_string($_POST['mesajx'])));
$sql = "insert into iletimmesajlari (isim, mail, konu, yazi, ip)
values ('".$isim."', '".$maili."', '".$konu."', '".$mesaj."', '".$ip."')";
$kayit = mysql_query($sql);

?>
<div class="onay">İletişim Formunuz Gönderildi<br />
 Anasayfaya gitmek için <a href="index.php" class="a">tıklatınız.</a> </div>

<? } else { ?>
<div class="yasak">Lütfen tüm alanları doldurun ve geçerli bir e-mail adresi giriniz :@ </div>

<? } } else { ?><div class="dikkat"> Lütfen Geçerli Bir E-mail adresi giriniz ! </div><? } } 


 } ?>

<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">İletişim Formu</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur">
            <? if($_GET['c']==1) { ?><br />
Merhaba; <?=$_GET['ID']; ?> ID li itirafın kaldırılması için şikayet formunu dolduruyorsun. Sonuçta bizde insanız gözümüzden kaçmış <a href="http://asuitiraf.com/index.php?ney=sayfa&bu=1">KURALLAR</a> a uymayan itiraflar olabilir. Şikayetiniz sonucunda kaldırılacak ve vermiş olduğunuz e-mail adresine kaldırıldı diye bir mail gönderilecektir. İlginiz için teşekkürler ;) <br /><br />

<? } ?>
            
            
            <form  id="cv" name="cv" method="post" action="" >

	   <table width="424" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="130" class="cvv"><strong>E-mail</strong></td>
    <td width="6"><strong>:</strong></td>
    <td width="452" class="cvv"><strong>
      <input name="email" type="text" id="email" size="30" />
      gerekli </strong></td>
  </tr>
  <td class="cvv"><strong>Konu</strong></td>
    <td><strong>:</strong></td>
    <td class="cvv"><strong>
    <select name="konu">
      <? if($_GET['c']==1) { ?><option value="Şikayetim Var">Şikayetim Var</option><? } else { ?>
      <option value="Şikayetim Var">Şikayetim Var</option>
      <option value="Benim Hakkımda">Benim Hakkımda</option>
      <option value="Görüş ve Önerim var">Görüş ve Önerim var</option>
      <option value="Teknik Sorun">Teknik Sorun</option>
      <option value="Diğer">Diğer</option><? } ?>
    </select> 
    </strong></td>
  </tr>
</table>
<table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="309" align="center"><textarea name="mesajx" id="mesajx" cols="40" rows="4"><? if($_GET['c']==1) { ?>(<?=$_GET['ID'];?>) Bu itirafın kaldırılmasını istiyorum Çünkü: <? } ?></textarea></td>
    <td width="161" align="center"><center><input type="submit" name="gonder" id="gonder" value="Formu Gönder" /></center>
      <input name="mesaj" type="hidden" id="mesaj" value="tmm" /></td>
  </tr>
</table>






</form>
</div>
          </div>
        <div class="yorumalt"></div>
</div>

<br />
<br />
