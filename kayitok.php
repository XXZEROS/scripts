<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">Üye ol</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur"><?php 

	$sifrex=rand(1000,10000);

if($_POST['kadi']!=""){

$uyesorgu=mysql_query("Select kadi from uye where kadi='".$_POST['kadi']."'");
$mailsorgu = mysql_query("SELECT mail FROM uye WHERE mail='".$_POST['mail']."'");  
@$uyesayi=mysql_num_rows($uyesorgu); 
@$mailsayi=mysql_num_rows($mailsorgu); 
if (!($uyesayi>0)){
if (!($mailsayi>0)){

$file = $_FILES['resim'];
$desteklenenformatlar = array ("image/jpeg","image/pjpeg","image/png","image/gif");

if(in_array ($file['type'], $desteklenenformatlar))
{

$sayi=rand(1,1000000);
$kaynak=$_FILES["resim"]["tmp_name"]; // Yüklenen dosyanın adı
$klasor="profil/"; // Hedef klasorümüz
$yukle=$klasor.$sayi.basename($_FILES['resim']['name']);
if (move_uploaded_file($kaynak,$yukle)){
$dosya="profil/".$sayi.$_FILES['resim']['name'];
$resim=imagecreatefromjpeg($dosya); // Yüklenen resimden oluşacak yeni bir JPEG resmi oluşturuyoruz..
$boyutlar=getimagesize($dosya); // Resmimizin boyutlarını oğreniyoruz
$resimorani=240/$boyutlar[0]; // Resmi küçültme/büyütme oranımızı hesaplıyoruz..
$yeniyukseklik=$resimorani*$boyutlar[1]; // Bulduğumuz orandan yeni yüksekliğimizi hesaplıyoruz..
$yeniresim=imagecreatetruecolor("240",$yeniyukseklik); // Oluşturulan boş resmi istediğimiz boyutlara getiriyoruz..
imagecopyresampled($yeniresim, $resim, 0, 0, 0, 0, "240", $yeniyukseklik, $boyutlar[0], $boyutlar[1]);
// Yüklenen resmimizi istediğimiz boyutlara getiriyoruz ve boş resmin üzerine kopyalıyoruz..
$hedefdosya="profil/thumbnails/".$sayi.$_FILES['resim']['name']; // Yeni resimin kaydedileceği konumu belirtiyoruz..
imagejpeg($yeniresim,$hedefdosya,100); // Ve resmi istediğimiz konuma kaydediyoruz..
//Kaydettiğimiz yeni resimin yolunu $hedefdosya değişkeni taşımaktadır..
@chmod ($hedefdosya, 0755); // chmod ayarını yapıyoruz dosyamızın..
} 

} # desteklenen format
$ip=$_SERVER['REMOTE_ADDR'];

if($kaynak<>"") { // boş degilse resim yukle
$uyeekle = "INSERT INTO uye (kadi, mail, rumuz, bolum, ip, kim, cinsiyet, resim, sifre, durum) 
VALUES ('".$_POST['kadi']."', '".$_POST['mail']."', '".$_POST['rumuz']."', '".$_POST['bolum']."', '".$ip."', '".$_POST['kim']."', '".$_POST['cinsiyet']."', '".$sayi.$_FILES['resim']['name']."', '".$sifrex."', '1')";
} else { // bos sa resime yazma panpa
$uyeekle = "INSERT INTO uye (kadi, mail, rumuz, bolum, ip, kim, cinsiyet, sifre, durum) 
VALUES ('".$_POST['kadi']."', '".$_POST['mail']."', '".$_POST['rumuz']."', '".$_POST['bolum']."', '".$ip."', '".$_POST['kim']."', '".$_POST['cinsiyet']."', '".$sifrex."', '1')";
}

if(!mysql_query($uyeekle,$bag))
  {
  die('Error: ' . mysql_error());
  }else{
  echo" uye formun basariyla gonderildi
  <br>şifren asagidaki mail adresine gonderildi. Eger gozukmuyorsa SPAM/GEREKSIZ klasorune bakmayı unutmayın!<br><br>
  <b>kullanici adin:</b>$_POST[kadi]<br>
  <b>mail adresin:</b>$_POST[mail]<br>
  <br><a href='index.php'>anasayfaya git</a>
  ";
  include 'mail/class.phpmailer.php';

	$rumuz=$_POST['kadi'];

	$email=$_POST['mail'];
	
	$icmail='Sitemize kayıt olduğunuz için teşekkürler.
	<br />
	<br />
	K.adınız: '.$rumuz.'<br />
	Şifreniz: '.$sifrex.'<br />
	<br />
	www.asuitiraf.com<br />
	www.asuitiraf.net den giriş yapabilirsiniz. Bol itiraflar :)';
	
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'mail.asuitiraf.com';
$mail->Port = 587;
$mail->Username = 'info@asuitiraf.com';
$mail->Password = '643216';
$mail->SetFrom($mail->Username, 'ASÜ İTİRAF');
$mail->AddAddress($email, $rumuz);
$mail->CharSet = 'UTF-8';
$mail->Subject = 'ASÜ İTİRAF Üyelik Şifreniz';
$mail->MsgHTML($icmail);
if($mail->Send()) {
    echo '<br />
Mail gönderildi!';
} else {
    echo '<br />
Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
}

  }
 
}else{echo"sectigin mail var";}
}else{echo"sectigin kullanici adi var";}

}else{echo"adinizi girmediniz";}

?></div>
          </div>
        <div class="yorumalt"></div>
	  </div>
