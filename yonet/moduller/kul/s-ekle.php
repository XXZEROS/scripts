<? ob_start(); require_once('../../../Connections/baglanti.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
	$admn=admins($_SESSION['uyeid']); if($admn==1) { 
require_once('s-ayar.php'); 


$aktars = mysql_query ("select * from $tablo order by sira desc limit 1");
while ($gos = mysql_fetch_array($aktars)){ $sira= $gos['sira'];}

$sira=($sira+1);

$akasd = mysql_query ("select * from $tablo order by uye_id desc limit 1");
while ($asd = mysql_fetch_array($akasd)){ $asdw=$asd['uye_id'];}


$asdw=($asdw+1);

if($_POST['ekle']=="ok" ){

if($_POST['ad']!=""){
if($_POST['pass']!=""){
if($_POST['pass2']!=""){
if($_POST['mail']!=""){
if($_POST['pass']==$_POST['pass2']){
if($_POST['ad']!=$_POST['pass']){


$uyesorgu=mysql_query("Select uye_ad from uyeler where uye_ad='".$_POST['ad']."'");
$mailsorgu = mysql_query("SELECT uye_mail FROM uyeler WHERE uye_mail='".$_POST['mail']."'");  
$uyesayi=mysql_num_rows($uyesorgu); 
$mailsayi=mysql_num_rows($mailsorgu); 
if (!($uyesayi>0)){
if (!($mailsayi>0)){
		
			if($_POST['pass']==$_POST['pass2'] ){

$sifre=sha1($_POST['pass']);

$sql = "insert into $tablo (uye_ad, uye_sifre, uye_mail, sira)
values ('".$_POST['ad']."', '".$sifre."', '".$_POST['mail']."', '".$sira."')";
$kayit = mysql_query($sql);

header('Location: '.$linkduz.'?ID='.$asdw.'&i=ok');	
exit; } 

}else{ $hata="sectiginiz mail var";}
}else{$hata="sectiginiz kullanici adi var";}
}else{$hata="Kullanici adin ile sifren esit olamaz";}
}else{$hata="Parolalar aynı degil.";}
}else{$hata="e-mail adresinizi yazmadiniz";}
}else{$hata="sifrenizi tekrar giriniz";}
}else{$hata="sifreyi girmediniz";}
}else{$hata="adinizi girmediniz";}
}
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
      
        <table width="850" border="0" cellpadding="5" cellspacing="0" class="tabe">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="850" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="59"><table width="700" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                      <table width="425" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="99" height="33"  class="sod"><strong>Kullanıcı Adı: </strong></td>
                          <td width="326"  class="sod"><input name="ad" type="text" id="ad" size="30" /></td>
                        </tr>
                        <tr>
                          <td height="30"><strong>Parola : </strong></td>
                          <td><input name="pass" type="password" id="pass" size="30" /></td>
                        </tr>
                      </table></td>
                    <td><table width="425" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="33"  class="sod"><strong>E-Mail: </strong>
                          <input type="text" name="mail"  id="mail" /></td>
                      </tr>
                      <tr>
                        <td height="30"><strong>Parola Tekrar                           :</strong>
                          <input name="pass2" type="password" id="pass2" size="30" /></td>
                      </tr>

                    </table></td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr><? 	if($hata!="dqw" ){ ?>
<tr>
            
            <td bgcolor="#993300"><?=$hata;?></td>
          </tr><? } ?>
          <tr>
            
            <td bgcolor="#FFFF33">* Parolanız 6 karakterden fazla olması gerekmektedir.<br />
              * Parolaların aynı olması gerekmektedir.</td>
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