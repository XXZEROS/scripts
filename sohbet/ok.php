<?php error_reporting(0); require_once('../Connections/baglanti.php');
   
    require_once('../foksiyon.php');
 
 
 session_start();
$ip=$_SERVER['REMOTE_ADDR']; 

 
$mesaj=htmlspecialchars(strip_tags(mysql_escape_string($_POST['mesaj'])));
 
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){

$sen=$_SESSION['uyeid'];
$uyeid=$_SESSION['uyeid'];

	
		$uyeler = mysql_query ("select * from chatuyeon where uyeid='".$uyeid."'");
		while ($a = mysql_fetch_array($uyeler))  {
			
			
			
		if($a['ban']==1) { } else {
		
		$rumuz=htmlspecialchars(strip_tags(mysql_escape_string($a['rumuz'])));
		$sql = "insert into chat (uyeid, rumuz, mesaj)
		values ('".$sen."', '".$rumuz."', '".$mesaj."')";
		$kayit = mysql_query($sql);
				} }
	 } else {  //eğer üye değilse
	 
	 	$browser=$_COOKIE["iwpxq"];
			
	$misafir = mysql_query ("select * from chatnoon where browser='".$browser."'");
	while ($w = mysql_fetch_array($misafir))  { 
	 	
			if($w['ban']==1) { } else {
		$rumuz=htmlspecialchars(strip_tags(mysql_escape_string($w['rumuz'])));
		$sql = "insert into chat (browser, rumuz, mesaj)
		values ('".$browser."', '".$rumuz."', '".$mesaj."')";
		$kayit = mysql_query($sql); 
			
				} }
			}

# EĞER BANLANDIYSA yı da yaptık amk :D



 
 



?>