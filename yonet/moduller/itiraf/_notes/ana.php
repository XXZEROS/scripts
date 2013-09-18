<link href="<?=$site;?>/template/haber.css" rel="stylesheet" type="text/css" /><?php 

$x_tablo = "icerik"; // cekilen tablo
$x_id = "id"; // cekilen tablonun listeleme kriteri sondan basa gibi
$x_kat="haberler"; // seo icin baslik urlsi
$x_filtre ="sayfa";
     // listedeki ogelerin sayisi
$per_page = 5; // Sayfa basina gosterilecek oge sayisi
$showeachside = 3 ;//  sayfalama linklerinin sayisi << 1 2 3 >> gibi :D
	

 $aktar = mysql_query("select * from $x_tablo order by $x_id desc  "); 
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
	$aktar = mysql_query ("select * from $x_tablo order by $x_id desc  "); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;}
	$verisay=$_GET['start'];
$aktar = mysql_query ("select * from $x_tablo order by $x_id desc    limit $start,$per_page"); 
while ($row_haber = mysql_fetch_array($aktar)) {

$baslik=$row_haber['baslik'];
$sorgu = mysql_query("SELECT * FROM kategori WHERE katid like '".$row_haber['katid']."' order by Katid desc limit 1");
while($yaz=mysql_fetch_array($sorgu)){ 
$kat="kat-".$yaz['katid']."-".t2e($yaz['katadi']); 
}
$link=$kat."/".$row_haber['id']."-".t2e($row_haber['baslik']).".html";
$ozet=linke($row_haber['ozet']);
$yazar=$row_haber['yazar'];
$tarih=$row_haber['tarih'];
include("template/haberler.html");  } ?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                        <a href="<?=$x_kat;?>-<?=$x_filtre;?><?php print(($next>0?("-").$next:""));?>.html" ><img src="template/geri.png" name="Image32" width="24" height="25" border="0" id="Image32" /></a>
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
                          <td width="24" height="22" align="center" valign="middle" <? if($start == $y){echo "class=yazi2";}else{echo "class=yazi1";}?>><a class="yazi3"  href="<?=$x_kat;?>-<?=$ekstralink;?><?php print(($y>0?("-").$y:""));?>.html"><?php print($pg);?></a></td>
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
                        <a href="<?=$x_kat;?>-<?=$ekstralink;?><?php print("-".max(0,$start+$per_page)."");?>.html"><img src="template/ileri.png" name="Image33" width="24" height="25" border="0" id="Image33" /></a>
                        <?php  } ?></td>
                    </tr>
                  </table>