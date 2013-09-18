<?php if($_SESSION['uyeid']<3) { ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? if($_GET['g']=="2") {
	?><META HTTP-EQUIV='REFRESH' CONTENT='3; URL=yedek.php?g=3'> <? } ?>
<title>asüitiraf</title></head>

<style type="text/css">
<!--
body {
	background-color: #EEE;
}
-->
</style><body><?php
 include("Connections/baglanti.php");
 if($_GET['g']=="1") {
	?><form>
<input type=button value="VeriTabanını Yedekle >>" onclick="location.href='yedek.php?g=2'">
        </form>
	
	<? }
 
if($_GET['g']=="2") {
	?>
	
	<img src="images/yukleniyor.gif" width="228" height="40" /><br />
Bu işlem 1 kaç Saniye kadar sürebilir!
<? } if($_GET['g']=="3") {
 
?><?php 
/*------------------------------------------- 
$host="localhost";//varsayilan default
$kullanici="asuiti_z";//Veritabani kullanici adi
$sifre="643216";//veritabani kullanici adi þifresi
$veritabani="asuiti_z";//veritabani adi
--------------------------------------------*/ 
$vthost="localhost";    //veritabani host 
$vtkullanici="asuiti_z";    //veritabani kullanici adi 
$vtsifre="643216";        //veritabani sifresi 
$vtadi="asuiti_z";        //yedeklenecek veritabani adi 
$ara="";        /*--eger sadece belli bir önek veya belli bir tablonun  
            //yedeklenmesini istiyorsaniz bunu kullanabilirsiniz
            ara="aranacak" gibi bir deger belirlerseniz sadece 
            içersinde "aranacak" geçen tablolar yedeklenecektir*/
$dosya_adi="yedek/yedek-".date("d-m-y").".sql.zip";    //yedeklerin yazilacagi dosya 

/*------------------------------------*/ 

if(!is_writeable(".")) echo "Yazma izniniz bulunmuyor"; 
else  
{ 
  $baglan=mysql_connect($vthost,$vtkullanici,$vtsifre);  
  $sec=mysql_select_db($vtadi,$baglan); 
  if(!$sec) { echo "Veritabanina baglanilamadi"; } 
  else 
    { 
      $tablolar=mysql_list_tables($vtadi);  //tablo listesi
      $tablosayisi=mysql_num_rows($tablolar); //veritabanindaki tablo sayisini bul
      for ($a=0;$a<$tablosayisi;$a++)  
    {  // her tablo için islem yap 
      $row=mysql_fetch_row($tablolar);    
      if(preg_match("/$ara/", $row[0])) 
        {  //sadece belirli ön ekle baslayanlari al 
          $tablename=$row[0]; 
          $crtable=mysql_query("show create table $tablename");  
          //her tablo için show create table komutu ile iste
          //bu özellik MySQL 3.23.20 den itibaren var 
          $tmpres = mysql_fetch_row($crtable); 
          $cikti .= $tmpres[1].";";  //create table'larin sonuna ; koy
          $cikti .= "nnn";  //create table komutlarindan sonra 3 satir bosluk ver
          $alanlar=mysql_query("select * from `$tablename`");  
          //her field için insert into komutlarini hazirla 
          $alansayisi=mysql_num_fields($alanlar);  //alan sayisi
          $nr=mysql_num_rows($alanlar);  //row sayisi 
          for ($c=0;$c<$nr;$c++) 
        { //her row için  
          $cikti .= "insert into `$tablename` values ("; 
          $row=mysql_fetch_row($alanlar);  //alan adlarini ' karakterleriyle yazdir
          for ($d=0;$d<$alansayisi;$d++)  
            { 
              $data=strval($row[$d]); 
              $cikti .="'".addslashes($data)."'";  // ' i kontrol için
              if ($d<($alansayisi-1))  
            { 
              $cikti .=", ";  //her alan için araya virgül koy
            } #if 
            } #for 
                $cikti .=");n"; // parantezi kapat 
        } #for 
        } #if ->ön ekleri al 
    } #if  ->her tablo için  

     
      $yaz=fopen($dosya_adi, "w");  //$cikti'yi $dosya_adi'na yazdir
      fwrite($yaz,$cikti); 
      fclose($yaz); 
      echo "Veritabani yedegi $dosya_adi dosyasina kaydedildi";

    } #else  -> veritabani baglanti kontrolü 

    mysql_close($baglan); 
} #else  yazma kontrolü 
?> 
<a href="yedek/<?=$dosya_adi;?>">İndir</a>
<?	}
?></body>
</html><? } else { echo "sektir lan";} ?>