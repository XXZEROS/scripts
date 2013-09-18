<?php
$title="Yorum Ekleme Sistemi";

//s-listele ayarları
$tablo="yorum";
$header="s-listele.php";
$baslik="Yorum Yöneticisi";
$yenilink="s-ekle.php?dili=".$_GET['dili'].""; $yenibas="Yeni Yorum";
$kapatlink="s-listele.php";
$tabbaslik="Yorum Başlığı";

$necek="Yorum Sayısı";
// listeleme ayarları
$x_id = "sira"; // cekilen tablonun listeleme kriteri sondan basa gibi
$x_kat=""; // seo icin baslik urlsi
$x_filtre ="";
$default="20";
$linksay="4"; // << 1 2 3 >> gibi

$sqlbas=baslik;
$linkduz="s-duzenle.php";
// ekleme<br>
$eklebas="Yorum Ekleme Yöneticisi";
// duzenle
$duzenbas="Yorum Güncelleme Yöneticisi";



?>