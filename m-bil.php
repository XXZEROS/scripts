 <?php require_once('Connections/baglanti.php'); require_once('foksiyon.php'); include('online.php');  include('bugun.php'); 
 
 session_start();
 ?>      <a href="index.php?ney=mesajlar">Mesajlar (<? $xsy=0;
$mesajlarz = mysql_query("select alid,oku from mesajlar where alid='".$_SESSION['uyeid']."' and oku='0'");
while ($sayme = mysql_fetch_array($mesajlarz))  { $xsy++; } echo $xsy;

?>)  <? if($xsy!="0") { ?>
        <img src="../../images/flash.gif" width="20" height="20" border="0" align="absbottom" />


        
        <? } ?></a>