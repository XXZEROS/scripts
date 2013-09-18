<? ob_start(); require_once('../../../Connections/baglanti.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  

require_once('s-ayar.php'); 
$dil=$_GET['dili'];
if($dil=="tr") {	$xx="1"; } 
if($dil=="en") {	$xx="2"; }
if($dil=="fr") {	$xx="3"; }
if($dil=="ar") {	$xx="4"; }


		if($_POST['ekle']=="ok" ){

$degistir = mysql_query("UPDATE iletim SET text='".addslashes($_POST['text'])."'

WHERE i='".$xx."'"); 
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>İleti Ayarları</title>
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

<body><form id="form2" name="form2" method="post" action="">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabe">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="57" height="40" bgcolor="#F5F5F5"><img src="images/icon2.png" width="48" height="48" /></td>
        <td width="603" bgcolor="#F5F5F5" class="bas"><? if($dil==tr) { echo"İletişim Bilgileri Ayarları"; } ?><? if($dil==en) { echo"Anasayfadaki tarihçe yazısı"; } ?></td>
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
      <table width="850" border="0" cellpadding="0" cellspacing="0" class="tabe">
       <? if($_POST['ekle']=="ok" ){ ?><tr>
          <td bgcolor="#0066FF">
           <center><br /> <span style="font-weight: bold; color: #FFF;">İşleminiz Kaydedilmiştir.</span></center></td>
        </tr><? } ?> 
        <? if($_GET['i']=="ok" ){ ?><tr>
          <td bgcolor="#009900">
           <center><br /> <span style="font-weight: bold; color: #FFF;">İşleminiz Eklenmiştir.</span>
           </center></td>
        </tr><? } ?> 
        <tr>
          <td><table width="850" border="0" cellspacing="0" cellpadding="0">
            
          </table></td>
        </tr>
           <? $aktarx = mysql_query ("select * from iletim where i='".$xx."'");
while ($x = mysql_fetch_array($aktarx)) { ?>
            
        <tr><label for="icerik"></label>
          <td><textarea name="text" id="text" cols="90" rows="30" ><?= stripslashes($x['text']);?></textarea></td>
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
</html><? } else {
  
echo header('Location: ../../index.php'); } 
 ob_flush();  ?> 