<?php 
include"baglanti.php";

if($_POST['id'] == "" || $_POST['key'] == "") {
echo "Lutfen Tum Alanlari Doldurun";
}else{


$uyead = strip_tags(mysql_real_escape_string($_POST['id']));
$sifre = $_POST['key'];
$sifre = sha1($sifre);
$sql = mysql_query("select * from uye where  kadi='$uyead' and sifre='$sifre' ");
$uyevarmi = mysql_num_rows($sql);
if($uyevarmi == 0) {
echo "Uyelik bilgileri bulunamadi, tekrar deneyin";
} else {


$uyebilgi = mysql_fetch_array($sql);
if($uyebilgi['admin'] == 1) {
$uyebilgi = mysql_fetch_array($sql);
$expire=time()+60*60*24*30;
setcookie("uyeid", "$uyebilgi[uye_id]", $expire);
setcookie("uyead", "$uyebilgi[uye_ad]", $expire);
setcookie("uyemail", "$uyebilgi[uye_mail]", $expire);





echo "<script>location.href='index.php';</script>"; // javascript yönlendirme kodu
} // if($uyevarmi == 0) kontrolü bitiþi
}//textbox post verileri içerik kontrolü

?>



