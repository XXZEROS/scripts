<? ob_start(); require_once('../../../Connections/baglanti.php');
require_once('../../../foksiyon.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
$admn=admins($_SESSION['uyeid']); if($admn==1) {  
 require_once('s-ayar.php'); 

if($_POST['gonder']=="ok") {
	
	include '../../../mail/class.phpmailer.php';

	
	$email=$_POST['mailxx'];
	
	$icmail=$_POST['mesaj'];
	
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'mail.tekbilim.com';
$mail->Port = 587;
$mail->Username = 'support@tekbilim.com';
$mail->Password = 'su8465su';
$mail->SetFrom($mail->Username, 'Aksaray iTiRAF');
$mail->AddAddress($email, $rumuz);
$mail->CharSet = 'UTF-8';
$mail->Subject = 'Aksaray iTiRAF iLETiSiM';
$mail->MsgHTML($icmail);
if($mail->Send()) {
    echo '<br />
Mail gönderildi!';
} else {
    echo '<br />
Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
}
	
	 }

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabe">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="56" height="40" bgcolor="#F5F5F5"><img src="images/on.png" alt="" width="55" /></td>
        <td width="582" bgcolor="#F5F5F5" class="bas"><?=$eklebas;?></td>
          <td width="84" bgcolor="#F5F5F5" ><a href="s-listele.php?sil=evet&id=<?=$_GET['id'];?>" onClick="return confirm('İletiyi silmek istermisiniz!');" class="kp">İletiyi Sil</a></td>
        <td width="48" bgcolor="#F5F5F5"><a href="#"><img src="images/cancel.png" alt="" width="25" border="0" /></a></td><td width="46" bgcolor="#F5F5F5" ><a href="<?=$kapatlink;?>" class="kp">Kapat</a></td>
        <td width="52" bgcolor="#F5F5F5"><a href="<?=$kapatlink;?>"><img src="images/cikis.gif" alt="" width="35" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><center>
      <br />

<table width="850" border="0" cellpadding="0" cellspacing="0" class="tabe">
                    <tr>
            <td><?php $aktar = mysql_query ("select * from iletimmesajlari WHERE id like ".$_GET['id']."");
while ($oku = mysql_fetch_array($aktar)) { 
$okundu="1";
$degisti = mysql_query("UPDATE iletimmesajlari SET okundumu='".$okundu."' WHERE id='".$_GET['id']."'"); 
?><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="144" height="33"  class="sod"><strong>Konu :</strong></td>
                <td width="335"  class="sod"><?=$oku['konu'];?></td>
                <td width="72"  class="sod">&nbsp;</td>
                <td width="297"  class="sod">&nbsp;</td>
              </tr>
              <tr>
                <td height="30"><strong>Gönderenin İsmi :</strong></td>
                <td><?=$oku['isim'];?></td>
                <td><strong>E-Postası: </strong></td>
                <td><?=$oku['mail'];?></td>
              </tr>
              <tr>
                <td height="30" bgcolor="#F7F7F7"><strong>Gönderim Zamanı :</strong></td>
                <td bgcolor="#F7F7F7"><?=$oku['tarih'];?></td>
                <td bgcolor="#F7F7F7"><strong>İP : </strong></td>
                <td bgcolor="#F7F7F7"><?=$oku['ip'];?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
              <td height="33"><span class="link">Mesaj Metni;</span><br />
 <br />
<table width="750" border="0" align="center" cellpadding="5" cellspacing="0" class="tabe">
  <tr>
    <td bgcolor="#FFFFBB">&nbsp;&nbsp;<?=$oku['yazi'];?></td>
  </tr>
</table><br />
<span class="link">Mesajı Cevapsız Bırakma;</span> ya da <a href="../uyeler/s-listele.php?mail=<?=$oku['mail'];?>" class="link" target="_blank">Şiresini mail gönder</a><br />
 <br />
 <table width="750" border="0" align="center" cellpadding="5" cellspacing="0" class="tabe">
  <tr>
    <td bgcolor="#FFFFBB">
    
    <form action="" method="post">
    <textarea name="mesaj" style=" width:100%; height:400px;">Sitemize <?=$oku['tarih'];?> tarihinde, <?=$oku['konu'];?> konulu gönderdiğiniz mesajınızın cevabıdır.<br />
Mesaj metniniz: ** <?=$oku['yazi'];?> **
	<hr />
	<br />
    
    
<br />

	<hr />
    <a href="http://www.aksarayitiraf.com">www.aksarayitiraf.com</a>  @Aksarayitiraf Yönetimi<br />
	</textarea>
    <input name="gonder" type="hidden" value="ok" />
     <input name="mailxx" type="hidden" value="<?=$oku['mail'];?>" />
    <center><input name="ok" type="submit" value="Bu mesajı gönderenin mail adresine Gönder" /></center>
    </form>
    
    </td>
  </tr>
</table><br />
</td>
          </tr>
        </table><? } ?>
    </center></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html><? } } else {
  
echo header('Location: ../../index.php'); } 
 ob_flush();  ?> 