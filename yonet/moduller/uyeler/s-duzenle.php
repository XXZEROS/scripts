<? ob_start(); require_once('../../../Connections/baglanti.php');
require_once('../../../foksiyon.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
	$admn=admins($_SESSION['uyeid']); if($admn==1) { 
require_once('s-ayar.php'); 


		if($_POST['ekle']=="ok" ){


$hangiid=$_GET['ID'];
$degistir = mysql_query("UPDATE uye SET kadi='".$_POST['kadi']."', sifre='".$_POST['sifre']."', rumuz='".$_POST['rumuz']."', bolum='".$_POST['bolum']."', mail='".$_POST['mail']."', durum='".$_POST['durum']."', durumok='".$_POST['durumok']."', cinsiyet='".$_POST['cinsiyet']."', kim='".$_POST['kim']."'
WHERE id='".$hangiid."'"); 

if($_SESSION['uyeid']<3) {
	$degistirx = mysql_query("UPDATE uye SET admin='".$_POST['admin']."' WHERE id='".$hangiid."'"); 
	 }
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$duzenbas;?></title>
<link href="s-stil.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

</head>

<body><?php if($_GET['ID']==1) { echo ":D beni düzenleyemezsin şifreme bakamazsın hiç bişi edemezsin."; } else { ?><form action="" method="post" enctype="multipart/form-data" name="form" id="form">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabe">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="57" height="40" bgcolor="#F5F5F5"><img src="images/icon2.png" width="48" height="48" /></td>
        <td width="603" bgcolor="#F5F5F5" class="bas"><?=$duzenbas;?></td>
        <td width="68" bgcolor="#F5F5F5"><input name="button" type="submit" id="button" value="KAYDET" /></td>
        <td width="46" bgcolor="#F5F5F5"><img src="images/save.png" width="32" /></td>
        <td width="47" bgcolor="#F5F5F5" ><a href="<?=$kapatlink;?>" class="kp">Kapat</a></td>
        <td width="49" bgcolor="#F5F5F5"><a href="<?=$kapatlink;?>"><img src="images/cikis.gif" width="35" border="0" /></a></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td><center>
      <br />
      <table width="850" border="0" cellpadding="0" cellspacing="0" class="tabe">
       <? if($_POST['ekle']=="ok" ){ ?><tr>
          <td height="31" bgcolor="#0066FF">
           <center><span style="font-weight: bold; color: #FFF;">İşleminiz Kaydedilmiştir.</span></center></td>
        </tr><? } ?> 
        <? if($_GET['i']=="ok" ){ ?><tr>
          <td height="39" bgcolor="#009900">
           <center> <span style="font-weight: bold; color: #FFF;">İşleminiz Eklenmiştir.</span>
           </center></td>
        </tr><? } ?> 
        <tr>
          <td><table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="86"><table width="800" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr bgcolor="#F7F7F7">
    <td width="356"><? $akt = mysql_query ("select * from uye where id = '".$_GET['ID']."'");
while ($x = mysql_fetch_array($akt)) {  ?><? $bid=$x['id'];
			$uyelerz = mysql_query("select * from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz))  { ?><center><img src="../../../profil/<? $res=$uyem['resim']; if($res<>"") { echo $res; } else {
	 $am=$uyem['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="90" height="90" vspace="5" /></center><? } ?><table width="329" border="0" align="center" cellpadding="0" cellspacing="0">
       <tr>
         <td width="65" height="33"  class="sod"><strong>Üye ID :</strong></td>
         <td width="264"  class="sod">
           <input name="uyeid" type="text" disabled="disabled" id="uyeid" value="<?= $x['id'];?>" size="5" /> <?
  $c=$x['cinsiyet'];
if($c==1) { $dos="erkek.png"; }
if($c==2) { $dos="kadin.png"; }
 
  $tuye=$x['uyeid']; if($tuye<"1") { echo $x['rumuz']. ' - <img src="../../../images/'.$dos.'" width="16" height="16" align="bottom" />'; } else { print auye($tuye);   } ?>
           </td>
       </tr>
       <tr>
         <td height="33"  class="sod"><strong>K. Adı: </strong></td>
         <td  class="sod"><input name="kadi" type="text" id="kadi" value="<?= $x['kadi'];?>" size="30" /></td>
       </tr>
       <tr>
         <td height="33"  class="sod"><strong>Şifresi : </strong></td>
         <td  class="sod"><input name="sifre" type="text" id="sifre" value="<?= $x['sifre'];?>" size="30" /></td>
       </tr>
    </table></td>
    <td width="444"><table width="407" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30"><strong>Rumuz</strong></td>
        <td><input name="rumuz" type="text" id="rumuz" value="<?= $x['rumuz'];?>" size="40" /></td>
      </tr>
      <tr>
        <td height="30"><strong>Bölüm</strong></td>
        <td><input name="bolum" type="text" id="bolum" value="<?= $x['bolum'];?>" size="40" /></td>
      </tr>
      <tr>
        <td height="30"><strong>Mail</strong></td>
        <td><input name="mail" type="text" id="mail" value="<?= $x['mail'];?>" size="40" /></td>
      </tr>
     <? if($_SESSION['uyeid']<3) { ?> <tr>
        <td height="30"><strong>Admin</strong></td>
        <td><input name="admin" type="text" id="admin" value="<?= $x['admin'];?>" size="2" />
          Admin:  1 - Adminlik İptal : 0</td>
      </tr><? } ?>
      <tr>
        <td height="30"><strong>Durum</strong></td>
        <td><input name="durum" type="text" id="durum" value="<?= $x['durum'];?>" size="2" /> 
          Onay : 1 - Onaylanmamış : 0 - İstenmeyen : 2</td>
      </tr>
       <tr>
        <td height="30"><strong>Yorum Onayı</strong></td>
        <td><input name="durumok" type="text" id="durumok" value="<?= $x['durumok'];?>" size="2" /> 
          Hep Onayla : 1 - Hiç onaylama : 2 - 30'dan sonra : 0</td>
      </tr>
      <tr>
        <td width="70" height="30"><strong>Cinsiyet</strong></td>
        <td width="337"><input name="cinsiyet" type="text" id="cinsiyet" value="<?= $x['cinsiyet'];?>" size="2" />
          Erkek : 1 - Kadın : 2 - Top : 3</td>
      </tr>
    </table></td>
  </tr>
</table></td>
              
            </tr>
          </table></td>
        </tr>
        <tr><label for="icerik"></label>
          <td>Hakkında yazısı:
            <center>
            <textarea name="kim" id="kim" cols="90" rows="15" ><?= $x['kim'];?></textarea></center></td>
        </tr>
      </table>
     <input type="submit" name="button" id="button" value="KAYDET" />
                          <input name="ekle" type="hidden" id="ekle" value="ok" />
      
    </center></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table><? } ?></form><? } ?>
</body>
</html><? } } else {
  
echo header('Location: ../../index.php'); } 
 ob_flush();  ?> 