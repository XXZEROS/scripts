<br />

<?php require_once('Connections/baglanti.php');

session_start();
ob_start();


if($_POST['id'] == "" || $_POST['key'] == "") {
echo "Lütfen Tüm Alanlari Doldurun";
}else{


$uyead = strip_tags(mysql_real_escape_string($_POST['id']));
$sifre = $_POST['key'];


$sql = mysql_query("select * from uye where kadi='$uyead' and sifre='$sifre'  ");
$uyevarmi = mysql_num_rows($sql);
if($uyevarmi == 0) {
echo "Uyelik bilgileri bulunamadi, tekrar deneyin";
} else {



$uyebilgi = mysql_fetch_array($sql);
if($uyebilgi['durum'] == 1) {
$expire=time()+60*60*24*1;


$_SESSION["giris"] = 1;
$_SESSION["uyead"] = $uyebilgi['kadi'];
$_SESSION["uyemail"] = $uyebilgi['mail'];
$_SESSION["uyeid"] = $uyebilgi['id'];




echo "<script>location.href='index.php';</script>"; // javascript yönlendirme kodu
} else { ?>Onaylanmamış ya  da Engellenmissiniz.<br />
iletisime gitmek icin <a href="http://www.asuitiraf.com/index.php?ney=iletisim">tiklatiniız</a>. ya da Anasayfaya gitmek icin <a href="http://www.asuitiraf.com/index.php">tiklatiniz. </a><? }
} // if($uyevarmi == 0) kontrolü bitiþi
}//textbox post verileri içerik kontrolü

?>


