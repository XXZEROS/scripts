<? ob_start(); require_once('../../../Connections/baglanti.php');
if(isset($_COOKIE['uyead']) and isset($_COOKIE['uyemail'])and isset($_COOKIE['uyeid'])){  



 require_once('k-ayar.php'); 

	 
 
		if($_GET['diz']=="yuk" ){
			
$degisti = mysql_query("UPDATE $tablo SET sira='".$_GET['sira']."' WHERE katid='".$_GET['id']."'"); 
$degistik = mysql_query("UPDATE $tablo SET sira='".$_GET['busira']."' WHERE katid='".$_GET['ustid']."'"); 
echo @header('Location: '.$header);}

if($_GET['diz']=="asa" ){
			
$degisas = mysql_query("UPDATE $tablo SET sira='".$_GET['sira']."' WHERE katid='".$_GET['id']."'"); 
$degisasa = mysql_query("UPDATE $tablo SET sira='".$_GET['busira']."' WHERE katid='".$_GET['altid']."'"); 
echo @header('Location: '.$header);}

if($_GET['sil']=="evet"){
$sil ="DELETE FROM $tablo WHERE katid='".$_GET['id']."'";
$sorgu=mysql_query($sil);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title;?></title>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<?= $editor;?>
<link href="s-stil.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabe">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="57" height="40" bgcolor="#F5F5F5"><img src="icon2.png" width="48" height="48" /></td>
        <td width="516" bgcolor="#F5F5F5" class="bas"><?=$baslik;?></td>
        <td width="160" bgcolor="#F5F5F5" ><a href="<?=$yenilink;?>" class="yn"><?=$yenibas;?> &nbsp;</a></td>
        <td width="41" bgcolor="#F5F5F5"><a href="<?=$yenilink;?>"><img src="images/Add.png" width="28" border="0" /></a></td>
        <td width="47" bgcolor="#F5F5F5" ><a href="<?=$kapatlink;?>" class="kp">Kapat</a></td>
        <td width="49" bgcolor="#F5F5F5"><a href="<?=$kapatlink;?>"><img src="images/cikis.gif" width="35" border="0" /></a></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td><center>

<table width="677" border="0" cellpadding="6" cellspacing="1" class="tabe">
      <tr>
        <td width="381" bgcolor="#E8E8E8" ><strong><?=$tabbaslik;?></strong></td>
                <td width="40" bgcolor="#E8E8E8"><strong>No</strong></td>
        <td width="58" bgcolor="#E8E8E8"><strong>Sırala</strong></td>
        <td width="38" bgcolor="#E8E8E8"><strong>Sira</strong></td>
        <td width="54" bgcolor="#E8E8E8"><strong>Düzenle</strong></td>
        <td width="27" bgcolor="#E8E8E8"><strong>Sil</strong></td>
        </tr>
      <?php 
$x_tablo = $tablo; // cekilen tablo
$x_id = "sira"; // cekilen tablonun listeleme kriteri sondan basa gibi
$x_kat=""; // seo icin baslik urlsi
$x_filtre ="";
     // listedeki ogelerin sayisi
	 $gs=$_GET['goster'];
	 if($gs<1) { $gst=$default;} else { $gst=$gs; }
$per_page = $gst; // Sayfa basina gosterilecek oge sayisi
$showeachside = $linksay;//  sayfalama linklerinin sayisi << 1 2 3 >> gibi :D
	

 $aktar = mysql_query("select * from $x_tablo order by $x_id asc"); 
while($veri2=mysql_fetch_array($aktar)){
$kayit_sayisi=$kayit_sayisi+1;
}
$start=$_GET['start'];
$num=$kayit_sayisi;
    $thispage = $PHP_SELF ;


    if(empty($start))$start=0;  // Baslama Pozisyonu

    $max_pages = ceil($num / $per_page); // Sayfa Sayisi
    $cur = ceil($start / $per_page)+1; 
	$toplamveri=0;
	$sira=0;
	$id=0;
	$say=0;
	$aktar = mysql_query ("select * from $x_tablo order by $x_id asc"); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;}
	$verisay=$_GET['start'];
$aktar = mysql_query ("select * from $x_tablo order by $x_id asc limit $start,$per_page"); 
while ($urun = mysql_fetch_array($aktar)) {
?><tr class="td" bgcolor="<? $sayi=$say++;
echo ($sayi%2)==0?"":"#F5FBFB"; ?>" >
        <td><a href="<?=$linkduz;?>?ID=<?=$urun['katid'];?>" class="link"><?php echo $urun[$sqlbas];?></a></td>
        <td><?php echo $urun['katid'];?><?php $siker = mysql_query ("select * from $tablo where sira > '".$urun['sira']."' order by sira asc limit 1");
while ($gad = mysql_fetch_array($siker)) { $altid=$gad['katid']; $altsira=$gad['sira'];  } ?></td>
        <td><center><? if($sira!="") { ?><a href="?diz=yuk&amp;sira=<?=$sira;?>&amp;id=<?=$urun['katid'];?>&amp;ustid=<?=$id;?>&amp;busira=<?=$urun['sira'];?>"><img src="images/icon_up.gif" title="Üsttekiyle Yer Değiştir." alt="Üsttekiyle Yer Değiştir." width="24" height="17" border="0"  /></a><? } ?> <? if($altsira!=$urun['sira']) { ?><a href="?diz=asa&amp;sira=<?=$altsira;?>&amp;id=<?=$urun['katid'];?>&amp;altid=<?=$altid;?>&amp;busira=<?=$urun['sira'];?>"><img src="images/icon_down.gif" width="24" height="17" border="0"  title="Alttakiyle Yer Değiştir."  /></a><? } ?></center></td>
        <td><?php $sira=$urun['sira'];?>
          <?php $id=$urun['katid']; echo $sira;  ?></td>
        <td><center>
          <a href="<?=$linkduz;?>?ID=<?=$urun['katid'];?>"><img src="images/stock-edit-16.png" width="17" border="0" /></a>
        </center></td>
        <td><center><a href="?sil=evet&amp;id=<?= $urun['katid'];?>" onClick="return confirm('Menüyü silmek istermisiniz!');"><img src="images/cancel.png" width="17" border="0" /></a></center></td></tr><?php }?>
        
    </table></center></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25%"><form id="form1" name="form1" method="post" action="">
         &nbsp;&nbsp;&nbsp; Göster
          <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
            <option value="?goster=10" <? if($_GET['goster']==10) { echo "selected=\"selected\""; } ?>>10</option>
 			<option value="?goster=20" <? if($_GET['goster']==20) { echo "selected=\"selected\""; } ?>>20</option>
            <option value="?goster=30" <? if($_GET['goster']==30) { echo "selected=\"selected\"";  } ?>>30</option>
            <option value="?goster=50" <? if($_GET['goster']==50) { echo "selected=\"selected\""; } ?>>50</option>
            <option value="?goster=100" <? if($_GET['goster']==100) { echo "selected=\"selected\""; } ?>>100</option>
            <option value="?goster=1000" <? if($_GET['goster']==1000) { echo "selected=\"selected\""; } ?>>Tümü</option>
          </select>
        </form></td>
        <td width="50%"><center><br /><table width="400" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="9%" align="left" valign="top" bgcolor="#FFFFFF"><?php
					  if($_GET['sirala']<>""){
						  $sirala="&sirala=".$_GET['sirala'];
						  }
					  $ekstralink="sayfa".$sirala;
if(($start-$per_page) >= 0)
{
    $next = $start-$per_page;
?>
                        <a href="<? if($_GET['goster']=="")   { echo "?"; }			  else { echo "?goster=";  echo $_GET['goster']; echo "&";  } ?>start<?php print(($next>0?("=").$next:""));?>" ><img src="template/geri.png" name="Image32" width="24" height="25" border="0" id="Image32" /></a>
                        <? }?></td>
                      <td width="78%" align="center" valign="middle" bgcolor="#FFFFFF"><table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <?php 
$eitherside = ($showeachside * $per_page);
if($start+1 > $eitherside)print ("<td width=24 height=22> .... </td>");
$pg=1;
for($y=0;$y<$num;$y+=$per_page)
{
    $class=($y==$start)?"pageselected":"";
    if(($y > ($start - $eitherside)) && ($y < ($start + $eitherside)))
    {
?>
                          <td width="24" height="22" align="center" valign="middle" <? if($start == $y){echo "class=yazi2";}
						  else{echo "class=yazi1";}?>><a class="yazi3"  href="<? if($_GET['goster']=="")   { echo "?"; }			  else { echo "?goster="; echo $_GET['goster']; echo "&";  } ?>start<?php print(($y>0?("=").$y:""));?>"><?php print($pg);?></a></td>
                          <?php
    }
    $pg++;
}
if(($start+$eitherside)<$num)print ("<td width=24 height=22> .... </td>");
?>
                        </tr>
                      </table></td>
                      <td width="13%" align="right" valign="top" bgcolor="#FFFFFF"><? if($start+$per_page<$num)
{?>
                        <a href="<? if($_GET['goster']=="")   { echo "?"; }			  else { echo "?goster=";  echo $_GET['goster']; echo "&";  } ?>start<?php print("=".max(0,$start+$per_page)."");?>"><img src="template/ileri.png" name="Image33" width="24" height="25" border="0" id="Image33" /></a>
                        <?php  } ?></td>
                    </tr>
          </table></center></td>
        <td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;Toplam <?=$necek;?>:&nbsp;&nbsp;<?php echo $kayit_sayisi;?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html><? } else {
  
echo header('Location: ../../index.php'); } 
 ob_flush();  ?> 