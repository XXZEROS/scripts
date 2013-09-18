<? $zx=$_GET['katt']; $xc=e; if($zx==$xc) { ?>
 | <?php $kate = mysql_query ("select * from kategori where katid='".$_GET['kat']."'");
while ($row_kt = mysql_fetch_array($kate)) {  echo $row_kt['katadi']; } } 

else {
	
$cekes = mysql_query ("select * from icerik where id='".$_GET['id']."'");
while ($row_as = mysql_fetch_array($cekes)) { 

$aktaz = mysql_query ("select * from kategori where katid like ".$row_as['katid']."");
while ($siz = mysql_fetch_array($aktaz)) { $kid=$siz['katid']; $kt=$siz['katadi']; }
	?>
 | <a href="<?=$site;?>/kat-<?=$kid;?>-<?= t2e($kt); ?>/" class="baslik"><?=$kt;?></a> <img src="<?=$site;?>/templates/thegreat/images/arrow.png" alt="" align="absmiddle"  /> <?php echo $row_as['baslik']; 
} 

}
?>
