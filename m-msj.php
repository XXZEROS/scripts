 <?php require_once('Connections/baglanti.php'); require_once('foksiyon.php'); include('online.php');  include('bugun.php'); 
 
 session_start();
 
 $o=$_GET['gnid'];

$sen=$_SESSION['uyeid'];
 
 ?><? 
  $bid=$_SESSION['uyeid'];  $admn=0; $uyelerz = mysql_query("select * from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz))  { $admn=$uyem['admin']; } ?>
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="1">
      <tr>
        <td width="26%" bgcolor="#CCCCCC"><strong>Kim</strong></td>
        <td width="74%" bgcolor="#CCCCCC"><strong>Mesaj</strong></td>
        </tr>
<? $mesajlar = mysql_query("select * from mesajlar where alid='".$sen."' and gnid='".$o."' or alid='".$o."' and gnid='".$sen."' order by id desc limit 10");
while ($msj = mysql_fetch_array($mesajlar))  {  

$okuduk = mysql_query("UPDATE mesajlar SET oku='1' WHERE alid='".$sen."' and gnid='".$o."' ");


?>
      <tr width="26%" height="39" class="td" bgcolor="<? $sayi=$say++; echo ($sayi%2)==0?"":"#F5FBFB"; ?>">
        <td><?=uye($msj['gnid']);?><br />
<strong style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #333;"><? echo $msj['tarih']; if($admn==1) { echo " - ".$msj['oku']; ?> -<a href="index.php?ney=mesajlar&gnid=<?=$_GET['gnid'];?>&msj=oku&sil=mesaj&id=<?= $msj['id'];?>"  onClick="return confirm('Mesajı sonsuza dek silmek istermisiniz!');">x</a>
<?  } ?></strong> </td>
        <td width="74%"><?= smiley($msj['mesaj']);?></td>
        </tr><? } ?>
    </table>