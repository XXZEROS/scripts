<style type="text/css">
<!--
#gonder {
	height: 60px;
}
.td {
}
.td:hover{
	background-color: #DEF3FE;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
-->
</style>

<div class="yorum">
	    <div class="yorumust"></div>
          <div class="yorumort">
            <div class="sll"></div>
            <div class="yorumic">Mesajların</div>
            <div class="clear"></div>
        </div>
                  <div class="yorumort">
            <div class="yoruruur"><?php 
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
	
	
if($_GET['msj']=="oku") { 
?>

            

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><br />
<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="101" height="33"><? 
			$uyelerz = mysql_query("select * from uye where id='".$o."'");
while ($uyem = mysql_fetch_array($uyelerz))  { ?><img src="profil/<? $res=$uyem['resim']; if($res<>"") { echo $res; } else {
	 $am=$uyem['cinsiyet'];
				if($am==1) { echo "erkek";} 
				if($am==2) { echo "kadin"; } echo ".jpg"; }?>" alt="" width="80" /><? }?></td>
        <td width="576"><?=uyeon($o);?></td>
        <td width="192"><a href="index.php?ney=mesajlar">Mesajlara git &raquo;</a><br>
<?  if($admn==1) {  ?>
<a href="msjsil.php?gnid=<?=$_GET['gnid'];?>&alid=<?=$_SESSION['uyeid'];?>&sil=mesaj"  onClick="return confirm('Tüm mesajları sonsuza dek silmek ister misin? canım !');">Tüm mesajları sil</a><br />
<? } ?>

          </td>
      </tr>
    </table></td>
  </tr>  <tr>
    <td><center><iframe src="f-mesaj-<?=$_GET['gnid'];?>.html" width="450px" height="100px" scrolling="no" frameborder="0" /></iframe></center></td>
  </tr>
  <tr>
    <td><div id="msjx"></div></td>
  </tr>

</table>



<?  } else  {
	$sen=$_SESSION['uyeid'];
 ?>
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="1">
      <tr>
        <td width="26%"><strong>Kim</strong></td>
        <td width="74%"><strong>Mesaj</strong></td>
        </tr>
<? $mesajlar = mysql_query("select * from mesajlar where alid='".$sen."' order by id desc limit 20");
while ($msj = mysql_fetch_array($mesajlar))  { $y=$x; $x=$msj['gnid'];  if($y!=$x) {
	$oku=$msj['oku'];
	?>
      <tr <? if($oku==0)  { echo "bgcolor=\"#FFFF33\""; } else {  ?> class="td" bgcolor="<? $sayi=$say++; echo ($sayi%2)==0?"":"#F5FBFB"; ?>" <? } ?>>
        <td width="26%" height="39"><?=uyeon($msj['gnid']);?> <br />
<strong style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #333;"><?=$msj['tarih'];?></strong> </td>
        <td width="74%"><a href="index.php?ney=mesajlar&gnid=<?=$msj['gnid'];?>&msj=oku">
          <? $ss=$msj['gnid']; 
		$mesajlasr = mysql_query("select * from mesajlar  where alid='".$sen."' and gnid='".$ss."' or alid='".$ss."' and gnid='".$sen."'  order by id desc limit 1");
while ($msjs = mysql_fetch_array($mesajlasr))  {
		echo $msjs['mesaj']; }?>
        </a></td>
        </tr><? } } ?>
    </table>
<?   } } else { echo"Mesaj gönderebilmen için üye girişi yapman lazım";} ?></div>
          </div>
        <div class="yorumalt"></div>
	  <? if($admn==1) {  ?>
<center><textarea name="ssss" cols="50" rows="10">
Anasayfaya göndermek için: <br />
<meta http-equiv="refresh" content="10;url=http://www.asuitiraf.net/index.php"></textarea></center>
<? } ?></div>