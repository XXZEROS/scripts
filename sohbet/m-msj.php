<?php error_reporting(0); require_once('../Connections/baglanti.php'); require_once('../foksiyon.php');  
 
 session_start();
 
$bid=$_SESSION['uyeid'];  $admn=0; $uyelerz = mysql_query("select * from uye where id='".$bid."'");
while ($uyem = mysql_fetch_array($uyelerz))  { $admn=$uyem['admin']; }   


$mesajlar = mysql_query("select * from chat order by id desc limit 10");
while ($msj = mysql_fetch_array($mesajlar))  {  
?>
<? if($msj['oku']!=1) { if($bid==$msj['uyeid']) { ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script TYPE="text/javascript">
document.getElementById('mesaj').value='';
</script>
<?
     $degistir = mysql_query("UPDATE chat SET oku='1' WHERE id='".$msj['id']."'");  
 } }?>
 <? if($msj['oku']!=1) { $browser=$_COOKIE["iwpxq"]; if($browser==$msj['browser']) { ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script TYPE="text/javascript">
document.getElementById('mesaj').value='';
</script>
<?
     $degistir = mysql_query("UPDATE chat SET oku='1' WHERE id='".$msj['id']."'");  
 } }?>
<? if($msj['uyeid']<>"") { echo '<a href="../index.php?ney=kim-la&bu='.$msj['uyeid'].'" target="_blank" >'; } echo '<strong>'.$msj['rumuz'].'</strong>'; if($msj['uyeid']<>"") { echo '</a>'; }?>
<? if($admn==1) { ?>  - <a href="sil.php?idati=<?=$msj['id'];?>" target="gndr" title="Mesajı sil">x</a> - 
<a href="ban.php?idati=<? if($msj['uyeid']<>"") { echo $msj['uyeid'].'&u=1'; } else {
											   echo $msj['browser'].'&b=1';
	}


?>" target="gndr" title="bunu banla">b</a>
<? } ?> : <?= smiley($msj['mesaj']);?><br />
<? } ?>
