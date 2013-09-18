<? ob_start(); require_once('../../../Connections/baglanti.php');
if(isset($_COOKIE['uyead']) and isset($_COOKIE['uyemail'])and isset($_COOKIE['uyeid'])){  
?>
<?php require_once('k-ayar.php'); 

?>
<?
		if($_POST['ekle']=="ok" ){

$hangiid=$_GET['ID'];
$degistir = mysql_query("UPDATE $tablo SET katadi='".$_POST['sayfaadi']."'

WHERE katid='".$hangiid."'"); 
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
<?= $editor;?>
</head>

<body><form id="form2" name="form2" method="post" action="">
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
            <tr>
              <td height="59"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? $akt = mysql_query ("select * from $tablo where katid = '".$_GET['ID']."'");
while ($x = mysql_fetch_array($akt)) {  ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="79" height="33"  class="sod"><strong>Kategori Başlık</strong></td>
        <td width="286"  class="sod">
          <input name="sayfaadi" type="text" id="sayfaadi" value="<?= $x['katadi'];?>" size="42" />
        </td>
      </tr>
    </table></td>
    
  </tr>
</table></td>
              
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
</table><? } ?></form>
</body>
</html><? } else {
  
echo header('Location: ../../index.php'); } 
 ob_flush();  ?> 