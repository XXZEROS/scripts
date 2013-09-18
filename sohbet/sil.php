<? require_once('../Connections/baglanti.php'); 

if($_GET['idati']){
$sil ="DELETE FROM chat WHERE id='".$_GET['idati']."'";
$sorgu=mysql_query($sil); }

?>