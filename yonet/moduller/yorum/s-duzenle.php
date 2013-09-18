<? ob_start(); require_once('../../../Connections/baglanti.php');
require_once('../../../foksiyon.php');

if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
$admn=admins($_SESSION['uyeid']); if($admn==1) { 
require_once('s-ayar.php'); 


		if($_POST['ekle']=="ok" ){


$hangiid=$_GET['ID'];
$degistir = mysql_query("UPDATE yorum SET rumuz='".$_POST['rumuz']."', mail='".$_POST['mail']."', cinsiyet='".$_POST['cinsiyet']."', yorum='".$_POST['yorum']."', tarih='".$_POST['tarih']."'
WHERE id='".$hangiid."'"); 

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

<body><form action="" method="post" enctype="multipart/form-data" name="form" id="form">
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
              <td height="86"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#F7F7F7">
    <td width="425"><? $akt = mysql_query ("select * from yorum where id = '".$_GET['ID']."'");
while ($x = mysql_fetch_array($akt)) {  ?><table width="425" border="0" cellspacing="0" cellpadding="0">
            <? if($x['uyeid']>"0") {
		 		if($_POST['ekle']=="ok" ){
$hangiid=$_GET['ID'];
$degistirs = mysql_query("UPDATE yorum SET uyeid='".$_POST['uyeid']."' WHERE id='".$hangiid."'"); 


} 
		 ?><tr>
         <td width="79" height="33"  class="sod"><strong>Yazar</strong></td>
         <td width="286"  class="sod">
           <input name="uyeid" type="text" id="uyeid" value="<?= $x['uyeid'];?>" size="5" /> <?
  $c=$x['cinsiyet'];
if($c==1) { $dos="erkek.png"; }
if($c==2) { $dos="kadin.png"; }
 
  $tuye=$x['uyeid']; if($tuye<"1") { echo $x['rumuz']. ' - <img src="../../../images/'.$dos.'" width="16" height="16" align="bottom" />'; } else { print auye($tuye);   } ?>
           </td>
       </tr>
       <? } else {?><tr>
         <td height="33"  class="sod"><strong>Rumuz</strong></td>
         <td  class="sod"><input name="rumuz" type="text" id="rumuz" value="<?= $x['rumuz'];?>" size="30" /></td>
       </tr>
       <tr>
         <td height="33"  class="sod"><strong>Cinsiyet</strong></td>
         <td  class="sod"><input name="cinsiyet" type="text" id="cinsiyet" value="<?= $x['cinsiyet'];?>" size="5" />
           Erkek=1 - Kadın = 2</td>
       </tr>
       <tr>
         <td height="33"  class="sod"><strong>E-mail</strong></td>
         <td  class="sod"><input name="mail" type="text" id="mail" value="<?= $x['mail'];?>" size="30" /></td>
       </tr><? } ?>
    </table></td>
    <td width="424"><table width="407" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="70" height="30"><strong>Tarih</strong></td>
        <td width="337"><input name="tarih" type="text" id="tarih" value="<?= $x['tarih'];?>" size="30" /></td>
        </tr>
    </table></td>
  </tr>
</table></td>
              
            </tr>
          </table></td>
        </tr>
        <tr><label for="icerik"></label>
          <td><center><textarea name="yorum" id="yorum" cols="90" rows="15" ><?= $x['yorum'];?></textarea></center></td>
        </tr>
      </table>
     <input type="submit" name="button" id="button" value="KAYDET" />
                          <input name="ekle" type="hidden" id="ekle" value="ok" />
      
    </center></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table><? } ?></form>
</body>
</html><? } } else {
  
echo header('Location: ../../index.php'); } 
 ob_flush();  ?> 