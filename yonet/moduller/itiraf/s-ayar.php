<?php
$title="İtiraf Ekleme Sistemi";

//s-listele ayarları
$tablo="itiraf";
$header="s-listele.php";
$baslik="İtiraf Yöneticisi";
$yenilink="s-ekle.php?dili=".$_GET['dili'].""; $yenibas="Yeni İtiraf";
$kapatlink="s-listele.php";
$tabbaslik="İtiraf Başlığı";

$necek="İtiraf Sayısı";
// listeleme ayarları
$x_id = "sira"; // cekilen tablonun listeleme kriteri sondan basa gibi
$x_kat=""; // seo icin baslik urlsi
$x_filtre ="";
$default="20";
$linksay="4"; // << 1 2 3 >> gibi

$sqlbas=baslik;
$linkduz="s-duzenle.php";
// ekleme<br>
$eklebas="İtiraf Ekleme Yöneticisi";
// duzenle
$duzenbas="İtiraf Güncelleme Yöneticisi";



?>