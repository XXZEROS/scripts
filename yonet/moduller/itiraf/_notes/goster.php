<link href="<?=$site;?>/template/haber.css" rel="stylesheet" type="text/css" /><? $zx=$_GET['katt']; $xc=e; if($zx==$xc) {	?>

<?php $css = mysql_query ("select * from icerik where katid='".$_GET['kat']."'");
while ($row_kat = mysql_fetch_array($css))  { 


$baslik= $row_kat['baslik'];
$sorgu = mysql_query("SELECT * FROM kategori WHERE katid like '".$row_kat['katid']."' order by Katid desc limit 1");
while($yaz=mysql_fetch_array($sorgu)){ 
$kat="kat-".$yaz['katid']."-".t2e($yaz['katadi']); 
}
$link=$kat."/".$row_kat['id']."-".t2e($row_kat['baslik']).".html";
$ozet=linke($row_kat['ozet']);
$yazar=$row_kat['yazar'];
$tarih=$row_kat['tarih'];
include("template/haberler.html");  } //kat son ?>
    
	<?	} else { ?><?php $cek = mysql_query ("select * from icerik where id='".$_GET['id']."'");
while ($row_gs = mysql_fetch_array($cek))  { 
$baslik= $row_gs['baslik'];
$ozet=linke($row_gs['icerik']);
$yazar=$row_gs['yazar'];
$tarih=$row_gs['tarih'];
include("template/haberdetay.html");  } 
} ?>
