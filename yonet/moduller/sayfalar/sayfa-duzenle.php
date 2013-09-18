<? ob_start(); require_once('../../../Connections/baglanti.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){ 
$admn=admins($_SESSION['uyeid']); if($admn==1) { 
		if($_POST['ekle']=="ok" ){

$hangiid=$_GET['ID'];
$degistir = mysql_query("UPDATE sayfalar SET sayfaadi='".$_POST['sayfaadi']."', yazar='".$_POST['yazar']."', tarih='".$_POST['tarih']."', menugos='".isset($_POST['menugos'])."', menuadi='".$_POST['menuadi']."', icerik='".$_POST['icerik']."'

WHERE id='".$hangiid."'"); 
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.td {
}
.td:hover{
	background-color: #DEF3FE;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
.bas {
	font-weight: bold;
	color: #09F;
	font-size: 18px;
}
.kp {
	font-weight: bold;
	color: #F00;
	font-size: 17px;
	text-decoration: none;
}
.sod {
	border-bottom-width: 1px;
	border-bottom-color: #000;
	background-color: #F7F7F7;
}
.link {
	color: #06C;
	text-decoration: none;
}
.link:hover {
	color: #000;
}
.yn {
	font-weight: bold;
	color: #579C2C;
	font-size: 17px;
	text-decoration: none;
}
.yn:hover {
	color: #000;
	text-decoration: underline;
}
.tabe {
	border: 1px dotted #D0D9E2;
}

.yazi3 {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	color: #000;
	text-decoration: none;
	float: left;
	height: 22px;
	width: 24px;
}
.yazi1 {
	color: #F90;
	height: 22px;
	width: 24px;
	background-image: url(../template/list2.jpg);
	text-decoration: none;
	float: left;
	background-repeat: no-repeat;
	margin-left: 6px;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	padding-top: 3px;
}
.yazi2 {
	color: #000;
	height: 22px;
	width: 24px;
	float: left;
	background-image: url(../template/list.jpg);
	text-decoration: none;
	background-repeat: no-repeat;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	padding-top: 3px;
	margin-left: 3px;
}
-->
</style>
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
        <td width="603" bgcolor="#F5F5F5" class="bas">Sayfa Düzenleme Yöneticisi</td>
        <td width="68" bgcolor="#F5F5F5"><input name="button" type="submit" id="button" value="KAYDET" /></td>
        <td width="46" bgcolor="#F5F5F5"><img src="images/save.png" width="32" /></td>
        <td width="47" bgcolor="#F5F5F5" ><a href="sayfa.php" class="kp">Kapat</a></td>
        <td width="49" bgcolor="#F5F5F5"><a href="sayfa.php"><img src="images/cikis.gif" width="35" border="0" /></a></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td><center><br />

      <table width="850" border="0" cellpadding="0" cellspacing="0" class="tabe">
       <? if($_POST['ekle']=="ok" ){ ?><tr>
          <td bgcolor="#0066FF">
           <center><br /> <span style="font-weight: bold; color: #FFF;">İşleminiz Kaydedilmiştir.</span></center></td>
        </tr><? } ?> 
        <? if($_GET['i']=="ok" ){ ?><tr>
          <td bgcolor="#009900">
           <center><br /> <span style="font-weight: bold; color: #FFF;">Sayfanız Eklenmiştir.</span>
           </center></td>
        </tr><? } ?> 
        <tr>
          <td><table width="850" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="59"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? $akt = mysql_query ("select * from sayfalar where id = '".$_GET['ID']."'");
while ($x = mysql_fetch_array($akt)) {  ?><table width="425" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="79" height="33"  class="sod"><strong>Başlık</strong></td>
        <td width="286"  class="sod">
          <input name="sayfaadi" type="text" id="sayfaadi" value="<?= $x['sayfaadi'];?>" size="42" />
        </td>
      </tr>
      <tr>
        <td height="30"><strong>Yazar-Tarih</strong></td>
        <td>
          <input name="yazar" type="text" id="yazar" value="<?= $x['yazar'];?>" size="15" />
       
          
            <input name="tarih" type="text" id="tarih" value="<?= $x['tarih'];?>" size="20" />
          </td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
</table></td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr><label for="icerik"></label>
          <td><textarea name="icerik" id="icerik" cols="90" rows="30" ><?= $x['icerik'];?></textarea></td>
        </tr>
      </table>
      <br />
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