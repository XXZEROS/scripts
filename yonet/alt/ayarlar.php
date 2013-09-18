<? ob_start(); require_once('../../Connections/baglanti.php'); 
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
$dil=$_GET['dili'];

if($dil=="tr") {	$xx="1"; } 
if($dil=="en") {	$xx="2"; }
if($dil=="rs") {	$xx="3"; }
if($dil=="ar") {	$xx="4"; }


if($_POST['ekle']=="ok" ){
 if($dil=="tr") {

$degistir = mysql_query("UPDATE dbayarlar SET title='".$_POST['baslik']."', base='".$_POST['slogan']."', kapaliurasi='".$_POST['uyari']."', key1v='".$_POST['key1']."', key2v='".$_POST['key2']."', copiright='".$_POST['telif']."', tel='".$_POST['tel']."', tel2='".$_POST['tel2']."', mail='".$_POST['mail']."', mail2='".$_POST['mail2']."', adres='".$_POST['adres']."', sitekapali='".$_POST['kapali']."'

WHERE id='1'"); 
	} 
	if($dil=="en")
	{
		$degistir = mysql_query("UPDATE dbayarlar SET title='".$_POST['baslik']."', base='".$_POST['slogan']."', kapaliurasi='".$_POST['uyari']."', key1v='".$_POST['key1']."', key2v='".$_POST['key2']."', copiright='".$_POST['telif']."', tel='".$_POST['tel']."', tel2='".$_POST['tel2']."', mail='".$_POST['mail']."', mail2='".$_POST['mail2']."', adres='".$_POST['adres']."', sitekapali='".$_POST['kapali']."'

WHERE id='2'"); 
		}
			if($dil=="rs")
	{
		$degistir = mysql_query("UPDATE dbayarlar SET title='".$_POST['baslik']."', base='".$_POST['slogan']."', kapaliurasi='".$_POST['uyari']."', key1v='".$_POST['key1']."', key2v='".$_POST['key2']."', copiright='".$_POST['telif']."', tel='".$_POST['tel']."', tel2='".$_POST['tel2']."', mail='".$_POST['mail']."', mail2='".$_POST['mail2']."', adres='".$_POST['adres']."', sitekapali='".$_POST['kapali']."'

WHERE id='3'"); 
		} } 
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Genel ayarlar</title>
<style type="text/css">
<!--
.ars {
	color: #000;
	background-color: #FFF;
	border: 1px groove #999;
}
.ars legend {
	font-size: 16px;
	color: #06C;
	font-weight: bolder;
	padding-right: 2px;
	padding-left: 2px;
}
.car {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #666;
	border-right-color: #999;
	border-bottom-color: #999;
	border-left-color: #999;
	background-color: #F4FFCC;
}
.car:hover {
	background-color: #E2FF82;
}
.bas {	font-weight: bold;
	color: #09F;
	font-size: 18px;
}
.kp {	font-weight: bold;
	color: #F00;
	font-size: 17px;
	text-decoration: none;
}
.sod {	border-bottom-width: 1px;
	border-bottom-color: #000;
	background-color: #F7F7F7;
}
.tabe {	border: 1px dotted #D0D9E2;
}
-->
</style>
</head>

<body><?php
$cek = mysql_query ("select * from dbayarlar where id='".$xx."'");
while ($x = mysql_fetch_array($cek))  { ?><form id="form2" name="form2" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="61" height="40" bgcolor="#D6D6D6"><img src="../images/yapilandirma.png" width="48" height="48" /></td>
          <td width="689" bgcolor="#D6D6D6" class="bas">Genel Yapılandırma (<?=$_GET['dili'];?>)</td>
          <td width="70" bgcolor="#D6D6D6"><input name="button" type="submit" id="button" value="KAYDET" /></td>
          <td width="43" bgcolor="#D6D6D6"><img src="../images/save.png" width="32" /></td>
          <td width="45" bgcolor="#D6D6D6" ><a href="bloklar.php" class="kp">Kapat</a></td>
          <td width="35" bgcolor="#D6D6D6"><a href="bloklar.php"><img src="../images/cikis.gif" width="35" border="0" /></a></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="50%" bgcolor="#F5F5F5"><fieldset class="ars">
          <legend >Site Ayarları</legend>
          
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tr>
                <td width="85">Site Başlığı</td>
                <td width="2">:</td>
                <td width="364"><input name="baslik" type="text" class="car" id="baslik" value="<?=$x['title'];?>" size="45" maxlength="250" /></td>
              </tr>
              <tr>
                <td>Site Slogan</td>
                <td>:</td>
                <td><textarea name="slogan" cols="45" rows="2" class="car" id="slogan"><?=$x['base'];?></textarea></td>
              </tr>
              <tr>
                <td>Site Logosu</td>
                <td>:</td>
                <td><input name="logo" type="file" class="car" id="logo" /></td>
              </tr>
              <tr>
                <td>Site Kapalı ?</td>
                <td>:</td>
                <td><p>
                  <label>
                    <input name="kapali" type="radio" id="kapali_0" value="Y" <?php if($x['sitekapali']==Y) { ?>checked="checked" <? } ?> />
                    Evet</label>
                  
                  <label>
                    <input type="radio" name="kapali" value="N" id="kapali_1" <?php if($x['sitekapali']==N) { ?>checked="checked" <? } ?> />
                    Hayır</label>
                  <br />
                </p></td>
              </tr>
              <tr>
                <td>Kapalı Uyarısı</td>
                <td>:</td>
                <td><textarea name="uyari" cols="45" rows="5" class="car" id="uyari"><?= $x['kapaliurasi'];?></textarea></td>
              </tr>
            </table>
        </fieldset></td>
        <td width="50%" bgcolor="#F5F5F5"><fieldset class="ars">
          <legend >Meta Veri Ayarları </legend>
          <table width="100%" border="0" cellspacing="0" cellpadding="3">
            <tr>
              <td width="85">Site Meta Açıklaması</td>
              <td width="2">:</td>
              <td width="364"><textarea name="key1" cols="45" rows="4" class="car" id="key1"><?=$x['key1v'];?></textarea></td>
            </tr>
            <tr>
              <td>Site Meta Anahtarları</td>
              <td>:</td>
              <td><textarea name="key2" cols="45" rows="4"  class="car" id="key2"><?=$x['key2v'];?></textarea></td>
            </tr>
            <tr>
              <td>İçerik Hakları</td>
              <td>:</td>
              <td><textarea name="telif" cols="45" rows="4" class="car" id="telif" ><?=$x['copiright'];?></textarea></td>
            </tr>
          </table>
        </fieldset></td>
      </tr>
      <tr>
        <td bgcolor="#F5F5F5">&nbsp;</td>
        <td bgcolor="#F5F5F5"><input type="submit" name="button" id="button" value="KAYDET" />
          <input name="ekle" type="hidden" id="ekle" value="ok" /></td>
      </tr>
    </table></td>
  </tr>
</table></form><? } ?>
</body>
</html><? } else {
  
echo header('Location: ../index.php'); } 
 ob_flush();  ?> 