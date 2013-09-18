<? ob_start(); require_once('../../../Connections/baglanti.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){ $admn=admins($_SESSION['uyeid']); if($admn==1) {   require_once('s-ayar.php'); 

$aktars = mysql_query ("select * from $tablo order by sira desc limit 1");
while ($gos = mysql_fetch_array($aktars)){ $sira= $gos['sira'];}

$sira=($sira+1);

$akasd = mysql_query ("select * from $tablo order by id desc limit 1");
while ($asd = mysql_fetch_array($akasd)){ $asdw=$asd['id'];}

$asdw=($asdw+1);


		if($_POST['ekle']=="ok" ){

$kaynak=$_FILES["resim"]["tmp_name"]; // Yüklenen dosyanın adı
$klasor="../../../haber/"; // Hedef klasörümüz
$yukle=$klasor.basename($_FILES['resim']['name']);
if (move_uploaded_file($kaynak,$yukle)){
$dosya="../../../haber/".$_FILES['resim']['name'];
$resim=imagecreatefromjpeg($dosya); // Yüklenen resimden oluşacak yeni bir JPEG resmi oluşturuyoruz..
$boyutlar=getimagesize($dosya); // Resmimizin boyutlarını öğreniyoruz
$resimorani=240/$boyutlar[0]; // Resmi küçültme/büyütme oranımızı hesaplıyoruz..
$yeniyukseklik=$resimorani*$boyutlar[1]; // Bulduğumuz orandan yeni yüksekliğimizi hesaplıyoruz..
$yeniresim=imagecreatetruecolor("240",$yeniyukseklik); // Oluşturulan boş resmi istediğimiz boyutlara getiriyoruz..
imagecopyresampled($yeniresim, $resim, 0, 0, 0, 0, "240", $yeniyukseklik, $boyutlar[0], $boyutlar[1]);
// Yüklenen resmimizi istediğimiz boyutlara getiriyoruz ve boş resmin üzerine kopyalıyoruz..
$hedefdosya="../../../haber/thumbnails/".$_FILES['resim']['name']; // Yeni resimin kaydedileceği konumu belirtiyoruz..
imagejpeg($yeniresim,$hedefdosya,100); // Ve resmi istediğimiz konuma kaydediyoruz..
//Kaydettiğimiz yeni resimin yolunu $hedefdosya değişkeni taşımaktadır..
chmod ($hedefdosya, 0755); // chmod ayarını yapıyoruz dosyamızın..
}


$sql = "insert into $tablo (baslik, yazar, icerik, tarih, slidegos, arkaplan, sira, katid, ozet, menugos, dil)
values ('".$_POST['sayfaadi']."', '".$_POST['yazar']."', '".$_POST['icerik']."', '".$_POST['tarih']."', '".$_POST['menugos']."', '".$_FILES['resim']['name']."', '".$sira."', '".$_POST['katid']."', '".$_POST['ozet']."', '1', 'tr')";
$kayit = mysql_query($sql);

$sql2 = "insert into $tablo (baslik, yazar, icerik, tarih, slidegos, arkaplan, sira, katid, ozet, menugos, dil, trid)
values ('".$_POST['sayfaadi']."', '".$_POST['yazar']."', '".$_POST['icerik']."', '".$_POST['tarih']."', '".$_POST['menugos']."', '".$_FILES['resim']['name']."', '".($sira+1)."', '".$_POST['katid']."', '".$_POST['ozet']."', '1', 'en', trid='".$asdw."')";
$kayit2 = mysql_query($sql2);

$sql3 = "insert into $tablo (baslik, yazar, icerik, tarih, slidegos, arkaplan, sira, katid, ozet, menugos, dil, trid)
values ('".$_POST['sayfaadi']."', '".$_POST['yazar']."', '".$_POST['icerik']."', '".$_POST['tarih']."', '".$_POST['menugos']."', '".$_FILES['resim']['name']."', '".($sira+2)."', '".$_POST['katid']."', '".$_POST['ozet']."', '1', 'rs', trid='".$asdw."')";
$kayit3 = mysql_query($sql3);



header('Location: '.$linkduz.'?ID='.$asdw.'&i=ok&dili='.$_GET['dili'].'');	
exit; }

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$eklebas;?></title>
<link href="s-stil.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<?= $editor;?>
</head>

<body><form action="" method="post" enctype="multipart/form-data" name="form" id="form">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabe">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="57" height="40" bgcolor="#F5F5F5"><img src="icon1.png" alt="" width="48" height="48" /></td>
        <td width="607" bgcolor="#F5F5F5" class="bas"><?=$eklebas;?></td>
        <td width="61" bgcolor="#F5F5F5" ><input type="submit" name="button" id="button" value="KAYDET" /></td>
        <td width="49" bgcolor="#F5F5F5"><img src="images/save.png" alt="" width="32" /></td>
        <td width="47" bgcolor="#F5F5F5" ><a href="<?=$kapatlink;?>" class="kp">Kapat</a></td>
        <td width="49" bgcolor="#F5F5F5"><a href="<?=$kapatlink;?>"><img src="images/cikis.gif" alt="" width="35" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><center>
     <br />
 
        <table width="850" border="0" cellpadding="0" cellspacing="0" class="tabe">
          <tr>
            <td><table width="850" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="59"><table width="700" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                      <table width="425" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="79" height="33"  class="sod"><strong>Başlık</strong></td>
                          <td width="286"  class="sod"><input name="sayfaadi" type="text" id="sayfaadi" size="42" /></td>
                        </tr>
                        <tr>
                          <td height="30"><strong>Yazar-Tarih</strong></td>
                          <td><input name="yazar" type="text" id="yazar" value="<?php echo $_SESSION['kt_adsoyad']; ?>" size="15" />
                            <input name="tarih" type="text" id="tarih" value="<?php echo date ("d.m.Y ");?>" size="20" /></td>
                        </tr>

                      </table></td>
                    <td><table width="425" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" bgcolor="#F7F7F7">Kategori Seç : 
                          <select name="katid" id="katid">
                            <? $aktarw = mysql_query ("select * from kategori order by katid asc");
while ($w = mysql_fetch_array($aktarw)) { ?>
                            <option value="<?= $w['katid']; ?>">
                              <?= $w['katadi']; ?>
                              </option>
                            <? } ?>
                            </select></td>
                      </tr>
                      <tr>
                        <td bgcolor="#F7F7F7">Resim seç : <input type="file" name="resim" id="resim" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            
            <td>Özet 
              <input name="ozet" type="text" id="ozet" size="100" rows="30" /></td>
          </tr>
          <tr>
            <label for="icerik2"></label>
            <td><textarea name="icerik" id="icerik" cols="85" rows="30"  ></textarea></td>
          </tr>
        </table>
        <input type="submit" name="button" id="button" value="KAYDET" />
        <input name="ekle" type="hidden" id="ekle" value="ok" />
      
    </center></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></form>
</body>
</html><? } } else {
  
echo header('Location: ../../index.php'); } 
 ob_flush();  ?> 