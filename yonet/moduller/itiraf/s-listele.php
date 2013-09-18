<? ob_start(); require_once('../../../Connections/baglanti.php');
require_once('../../../foksiyon.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  
$admn=admins($_SESSION['uyeid']); if($admn==1) { 

 require_once('s-ayar.php'); 


	if($_GET['menu']=="ok" ){
			
$degistix = mysql_query("UPDATE $tablo SET menugos='1' WHERE id='".$_GET['id']."'"); 
echo @header('Location: '.$header);}

if($_GET['menu']=="no" ){
			
$degistiz = mysql_query("UPDATE $tablo SET menugos='0' WHERE id='".$_GET['id']."'"); 
 echo @header('Location: '.$header);}
 		
		if($_GET['o']=="c" ){
			
$degisti = mysql_query("UPDATE $tablo SET durum='2' WHERE id='".$_GET['id']."'"); 
 
echo @header('Location: '.$header);}

if($_GET['o']=="e" ){
			
$degisti = mysql_query("UPDATE $tablo SET durum='1' WHERE id='".$_GET['id']."'"); 
 
echo @header('Location: '.$header);}
 
		if($_GET['o']=="k" ){
			
$degisti = mysql_query("UPDATE $tablo SET durum='0' WHERE id='".$_GET['id']."'"); 
 
echo @header('Location: '.$header);}


if($_GET['sil']=="evet"){
$sil ="DELETE FROM $tablo WHERE id='".$_GET['id']."'";
$sorgu=mysql_query($sil);

}
$ip=$_GET['ip'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title;?></title>
<?= $editor;?>
<link href="s-stil.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabe">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="48" height="40" bgcolor="#F5F5F5"><img src="icon2.png" width="48" height="48" /></td>
        <td width="879" bgcolor="#F5F5F5" class="bas"><?=$baslik;?> </td>
        <td width="43" bgcolor="#F5F5F5" ><a href="<?=$kapatlink;?>" class="kp">Kapat</a></td>
        <td width="35" bgcolor="#F5F5F5"><a href="<?=$kapatlink;?>"><img src="images/cikis.gif" width="35" border="0" /></a></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td><center>

<br /><table width="927" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="s-listele.php">Tümünü Göster</a> | <a href="s-listele.php?durum=2" class="link">Çöpe Atılanları Göster</a> | <a href="s-listele.php?durum=0" >Onaylanmamışları Göster</a></td>
  </tr>
</table>

<table width="927" border="0" cellpadding="6" cellspacing="1" class="tabe">
      <tr>
        <td width="184" bgcolor="#E8E8E8"><strong>Yazar</strong></td>
        <td width="645" bgcolor="#E8E8E8" ><strong>İtirafı</strong></td>
        <td width="26" bgcolor="#E8E8E8"><strong>Düz</strong></td>
        <td width="17" bgcolor="#E8E8E8"><strong>Sil</strong></td>
        </tr>
      <?php 
$x_tablo = $tablo; // cekilen tablo
$x_id = "id"; // cekilen tablonun listeleme kriteri sondan basa gibi
$x_kat=""; // seo icin baslik urlsi
$x_filtre ="";
     // listedeki ogelerin sayisi
	
$per_page = 30; // Sayfa basina gosterilecek oge sayisi
$showeachside = $linksay;//  sayfalama linklerinin sayisi << 1 2 3 >> gibi :D
	

$durum=$_GET['durum'];

 if($ip<>"") { $iz="where ip='".$ip."'"; } 
 if($durum<>"") { $iz=" where durum='".$durum."'"; } 

 $aktar = mysql_query("select * from $x_tablo $iz order by $x_id asc"); 
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
	$aktar = mysql_query ("select * from $x_tablo $iz  order by $x_id asc"); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;}
	$verisay=$_GET['start'];
$aktar = mysql_query ("select * from $x_tablo $iz order by $x_id desc limit $start,$per_page"); 
while ($urun = mysql_fetch_array($aktar)) {
	
	if($durum==2) { $ks==1; } else { $ks=$urun['durum']; } 
	if($ks!=2) { 
?><tr class="td" bgcolor="<? if($urun['durum']==0) { echo "#FFFF00"; } else {  $sayi=$say++;
echo ($sayi%2)==0?"":"#F5FBFB"; } ?>" >
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><? $bid=$urun['uyeid'];
			$uyelerz = mysql_query("select * from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz))  { ?><img src="../../../profil/<? $res=$uyem['resim']; if($res<>"") { echo $res; } else {
	 $am=$uyem['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="53" height="53" /><? } ?></td>
            <td><?
  $c=$urun['cinsiyet'];
if($c==1) { $dos="erkek.png"; }
if($c==2) { $dos="kadin.png"; }
 
  $tuye=$urun['uyeid']; if($tuye<"1") { echo $urun['rumuz']. ' - <img src="../../../images/'.$dos.'" width="16" height="16" align="bottom" />';?><br /><?=$urun['mail'];?><? } else { print auye($tuye);   } ?><br />
              <a href="?ip=<?=$urun['ip'];?>" class="link"><?=$urun['ip'];?></a></td>
          </tr>
        </table></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><a href="<?=$linkduz;?>?ID=<?=$urun['id'];?>" class="z"><span style="font-weight: bold">Baslik</span>: <?php echo $urun['baslik'];?> - <span style="font-weight: bold">Yazi</span>: <?php echo substr($urun['itiraf'], 0, 150);?>..</a></td>
            </tr>
          <tr>
            <td height="28"><? if($urun['durum']==1) { ?><a href="?o=k&id=<?=$urun['id'];?>" class="link">Onayı Kaldır</a><? } else { ?><a href="?o=e&id=<?=$urun['id'];?>" class="link">Onayla</a><? } ?> | <span class="z">Tarih: <?= $urun['gun']?> <?= ay($urun['ay']);?> <?= $urun['yil']?>, <?= $urun['saat']?> | Kategori: <?= kat($urun['katid']);?> | <? if($urun['durum']==2) { ?><a href="?o=e&id=<?=$urun['id'];?>" class="link">Çöpten çıkar ıyk.s</a><? } else { ?><a href="?o=c&id=<?=$urun['id'];?>" class="link">Çöpe fırtlat</a><? } ?></span></td>
            </tr>
        </table></td>
        <td><center>
          <a href="<?=$linkduz;?>?ID=<?=$urun['id'];?>"><img src="images/stock-edit-16.png" width="17" border="0" /></a>
        </center></td>
        <td><center><a href="?sil=evet&amp;id=<?= $urun['id'];?>" onClick="return confirm('Yorumu sonsuza dek silmek istermisiniz!');"><img src="images/cancel.png" width="17" border="0" /></a></center></td></tr><?php }} ?>
        
    </table>
<br />
    </center></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25%">&nbsp;</td>
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
                        <a href="<? if($_GET['goster']=="")   { echo "?"; }			  else { echo "?goster=";  echo $_GET['goster']; echo "&";  } ?>start<?php print(($next>0?("=").$next:""));?>" ><img src="../template/geri.png" name="Image32" width="24" height="25" border="0" id="Image32" /></a>
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
                        <a href="<? if($_GET['goster']=="")   { echo "?"; }			  else { echo "?goster=";  echo $_GET['goster']; echo "&";  } ?>start<?php print("=".max(0,$start+$per_page)."");?>"><img src="../template/ileri.png" name="Image33" width="24" height="25" border="0" id="Image33" /></a>
                        <?php  } ?></td>
                    </tr>
          </table></center></td>
        <td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;Toplam <?=$necek;?>:&nbsp;&nbsp;<?php echo $kayit_sayisi;?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html><? } } else {
  
echo header('Location: ../../index.php'); } 
 ob_flush();  ?> 