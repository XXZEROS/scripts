<? ob_start(); require_once('../../../Connections/baglanti.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
$admn=admins($_SESSION['uyeid']); if($admn==1) { 
$aktars = mysql_query ("select * from sayfalar order by sira desc limit 1");
while ($gos = mysql_fetch_array($aktars)){ $sira= $gos['sira'];}

$sira=($sira+1);

$akasd = mysql_query ("select * from sayfalar order by id desc limit 1");
while ($asd = mysql_fetch_array($akasd)){ $asdw=$asd['id'];}

$asdw=($asdw+1);


		if($_POST['ekle']=="ok" ){

$sql = "insert into sayfalar (sayfaadi, yazar, icerik, tarih, menugos, menuadi, sira)
values ('".$_POST['sayfaadi']."', '".$_POST['yazar']."', '".$_POST['icerik']."', '".$_POST['tarih']."', '".$_POST['menugos']."', '".$_POST['menuadi']."', '".$sira."')";
$kayit = mysql_query($sql);

header('Location: sayfa-duzenle.php?ID='.$asdw.'&i=ok');	
exit; }

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

<body><form id="form" name="form" method="post" action="">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabe">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="57" height="40" bgcolor="#F5F5F5"><img src="icon1.png" alt="" width="48" height="48" /></td>
        <td width="607" bgcolor="#F5F5F5" class="bas">Sayfa Ekleme Yöneticisi</td>
        <td width="61" bgcolor="#F5F5F5" ><input type="submit" name="button" id="button" value="KAYDET" /></td>
        <td width="49" bgcolor="#F5F5F5"><img src="images/save.png" alt="" width="32" /></td>
        <td width="47" bgcolor="#F5F5F5" ><a href="sayfa.php" class="kp">Kapat</a></td>
        <td width="49" bgcolor="#F5F5F5"><a href="sayfa.php"><img src="images/cikis.gif" alt="" width="35" border="0" /></a></td>
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
                            <input name="tarih" type="text" id="tarih" value="<?php echo date ("d.m.Y ");
$gunler = array(
0=> "Pazar",
1=> "Pazartesi",
2=> "Sali",
3=> "Çarsamba",
4=> "Persembe",
5=> "Cuma",
6=> "Cumartesi"
);
echo "".$gunler[date('w')].""; ?>" size="20" /></td>
                        </tr>
                      </table></td>
                    <td><table width="425" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="33"  class="sod">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="30">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
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