<?php
$host="localhost";//varsayýlan default
$kullanici="root";//Veritabaný kullanýcý adý
$sifre="";//veritabaný kullanýcý adý þifresi
$veritabaný="asuitiraf";//veritabaný adý

//mysql a baðlanýyoruz ve veritabanýmýzý seçiyoruz
$bag= mysql_connect($host,$kullanici,$sifre);
$vbag=mysql_select_db("$veritabaný", $bag);  
mysql_select_db("$veritabaný", $bag);  


if (!$bag)  {  die("Mysql baðlantýsý saðlanýlamadý");  }  //mysql baðlantý kontrolü
if (!$vbag) {  die("Veritabanýna baðlanýlamadý");  }  //veritabaný baðlantý kontrolü
  


?>