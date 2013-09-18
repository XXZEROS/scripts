<? ob_start(); require_once('../../../Connections/baglanti.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
$admn=admins($_SESSION['uyeid']); if($admn==1) { 
?>
<?php require_once('k-ayar.php'); 



$aktars = mysql_query ("select * from $tablo order by sira desc limit 1");
while ($gos = mysql_fetch_array($aktars)){ $sira= $gos['sira'];}

$sira=($sira+1);

$akasd = mysql_query ("select * from $tablo order by katid desc limit 1");
while ($asd = mysql_fetch_array($akasd)){ $asdw=$asd['katid'];}

$asdw=($asdw+1);


		if($_POST['ekle']=="ok" ){

$sql = "insert into $tablo (katadi, sira, dil)
values ('".$_POST['sayfaadi']."', '".$sira."', '".$_GET['dili']."')";
$kayit = mysql_query($sql);

header('Location: '.$linkduz.'?ID='.$asdw.'&i=ok&dili='.$_GET['dili'].'&katid='.$_GET['katid']);	
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

<body><form id="form" name="form" method="post" action="">
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
      
        <table width="850" border="0" cellpadding="0" cellspacing="0" class="tabe">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="79" height="33"  class="sod"><strong>Kategori Başlık</strong></td>
                <td width="286"  class="sod"><input name="sayfaadi" type="text" id="sayfaadi" size="42" /></td>
              </tr>
            </table></td>
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