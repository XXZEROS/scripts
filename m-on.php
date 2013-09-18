 <?php require_once('Connections/baglanti.php');  
 include('online.php'); # include('bugun.php');
 session_start();

$simdi=time(); // şimdiki zaman
$zaar=0;
$bu=$_GET['bu'];
$ip=$_SERVER['REMOTE_ADDR'];
$ipx=$_SERVER['REMOTE_ADDR'];
$ooo=$_SESSION['uyeid'];	
$ooyos=0;
if(!isset($ooo)) { $ooo=$ipx;  } 

				if(isset($_SESSION['uyeid'])){ 

$kimlik=$_SESSION['uyeid'];

$onliner = mysql_query("UPDATE uye SET online='".$simdi."' WHERE id='".$kimlik."'"); 

	}
				
				else { 



$online = mysql_query("select ip,id from online where ip='".$ip."'");
while ($uyem = mysql_fetch_array($online))  { $kimliki=$uyem['id'];

$onlinere = mysql_query("UPDATE online SET time='".$simdi."' WHERE id='".$kimliki."'"); 
$zaar=1;


} // eğer ip varsa 
								if($zaar==0) { // eğer ip yoksa yeni ip ekliccek



$sql = "insert into online (ip, time)
values ('".$ip."', '".$simdi."')";
$kayit = mysql_query($sql);


								} // yeni ip açma son !
				
				} // üye deilse son
				
			
$iss = mysql_query("select * from islem where ney='".$_GET['ney']."' and bu='".$bu."' and uyeID='".$ooo."'");
while ($cccc = mysql_fetch_array($iss))  { $kix=$cccc['id'];
$onlx = mysql_query("UPDATE islem SET time='".$simdi."' WHERE id='".$kix."'"); 
$ooyos=1;


} // eğer ip varsa 
								if($ooyos==0) { 
								
	$sqlx = "insert into islem (time, ney, bu, uyeID)
values ('".$simdi."', '".$_GET['ney']."', '".$bu."', '".$ooo."')";
$kayitx = mysql_query($sqlx);
	
								}
	$menuler2 = mysql_query ("select * from uye where id like '".$_SESSION['uyeid']."' and durum like '2' ");
while ($uyet = mysql_fetch_array($menuler2))  {  echo '<meta http-equiv="refresh" content="1;url=http://aksarayitiraf.tekbilim.com/cikis.php"> ';}			
				
?><?=$ontop;?>