<?  require_once('Connections/baglanti.php'); 
$selar=$_FILES['resim']['name'];

if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  

$sifre=$_POST['sifre1'];

$sayi=rand(1,1000000);
$kaynak=$_FILES["resim"]["tmp_name"]; // Yüklenen dosyanın adı

$file = $_FILES['resim'];
$desteklenenformatlar = array ("image/jpeg","image/pjpeg","image/png","image/gif");

if(in_array ($file['type'], $desteklenenformatlar))
{
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
}} else { echo "resim hatali"; }

$hangiid=$_SESSION['uyeid'];
$degistir = mysql_query("UPDATE uye SET rumuz='".$_POST['rumuz']."', bolum='".$_POST['bolum']."', kim='".$_POST['kim']."', cinsiyet='".$_POST['cinsiyet']."'

WHERE id='".$hangiid."'"); 

if($sifre<>"") { $degiswz = mysql_query("UPDATE uye SET sifre='".$sifre."' WHERE id='".$hangiid."'"); }

if($selar<>"") { $degisw = mysql_query("UPDATE uye SET resim='".$sayi.$_FILES['resim']['name']."' WHERE id='".$hangiid."'"); }

header('Location: index.php?ney=profil-duz');	
exit; }

		
	
	?>