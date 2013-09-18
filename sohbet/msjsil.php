 <?php require_once('Connections/baglanti.php'); require_once('foksiyon.php'); include('online.php');  include('bugun.php'); 
 
 session_start();
 



if($_GET['sil']=="mesaj"){
$silz ="DELETE FROM mesajlar WHERE alid='".$_GET['alid']."' and gnid='".$_GET['gnid']."' ";
$sorgzu=mysql_query($silz);

$silx ="DELETE FROM mesajlar WHERE gnid='".$_GET['alid']."' and alid='".$_GET['gnid']."' ";
$sorx=mysql_query($silx);


}

@header('Location: index.php?ney=mesajlar&gnid='.$_GET['gnid'].'&msj=oku');
?>
      	
<SCRIPT LANGUAGE="JavaScript">
<!-- 
window.location="index.php?ney=mesajlar&gnid=<?=$_GET['gnid'];?>&msj=oku";
// -->
</script>