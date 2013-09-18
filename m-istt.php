 <?php $s1 = microtime(true); require_once('Connections/baglanti.php'); include('online.php');  include('bugun.php');  ?>
 <table width="95%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Online Kişi Sayısı </td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><?=$ontop;?></td>
    </tr>
   <tr>
      <td>Online Üye Sayısı</td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><?=$onuye;?></td>
    </tr>
    <tr>
      <td>Online Admin Sayısı</td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><?=$onadmin;?></td>
    </tr>
  <tr>
      <td width="65%">Bugün Tekil Ziyaret</td>
      <td width="6%"><strong>:</strong></td>
      <td width="29%" style="text-align: right"><?=$tbugun;?> </td>
    </tr>
    <tr>
      <td width="65%">Dün Tekil Ziyaret</td>
      <td width="6%"><strong>:</strong></td>
      <td width="29%" style="text-align: right"><? if($tdun<1) { echo '900'; } else { echo $tdun; }?></td>
    </tr>
    <tr>
      <td>Toplam İtiraf Sayısı</td>
      <td><strong>:</strong></td>
      <td style="text-align: right"><? $toplamveri=0; $aktar = mysql_query ("select id,durum from itiraf where durum='1' order by id desc  "); 
while ($sirala= mysql_fetch_array($aktar)) {$toplamveri++;} echo $toplamveri; ?></td>
    </tr>
    <tr>
      <td>Toplam Yorum Sayısı</td>
      <td><strong>:</strong></td>
      <td style="text-align: right"></td>
    </tr>
        <tr>
      <td width="65%">Toplam Tekil Ziyaret</td>
      <td width="6%"><strong>:</strong></td>
      <td width="29%" style="text-align: right"><?=($ttt+68000);?> </td>
    </tr>
    <tr>
      <td>Toplam Tıklanma</td>
<td><strong>:</strong></td>
      <td style="text-align: right"><?   $tiklama = mysql_query ("select * from tiklama");
while ($tikk = mysql_fetch_array($tiklama))  { 
$tik=($tikk['oku']+1);  }
  echo ($tik+250000);?></td>
    </tr>
  </table><? $s8 = microtime(true);
  if($_GET['ist']==1)  {
 $siteson=($s8 - $s1); echo ' &raquo; '; echo substr($siteson, 0, 4). ' &#8482; ';
  } ?>