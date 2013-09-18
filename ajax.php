<?php 
$dbhost = "localhost"; 
$dbusername = "asuiti_z"; 
$dbpass = "643216"; 
$dbname = "asuiti_z"; 
$tableprefix = "itiraf"; //Tablo adı - Wordpress için wp_posts geçerli

$linkID = mysql_connect($dbhost, $dbusername, $dbpass) or die("Veritabanına bağlanılamadı.");  //bağlantı kontrol ediliyor
mysql_select_db($dbname, $linkID) or die("Veritabanı Bulunamadı."); 


$kelime = $_REQUEST['s']; //formdan sorgu alınıyor
echo  '<br />Aranan kelime: "'.$kelime.'"';

		
		if (isset($kelime) && trim($kelime != "") )
	{
	if (strlen($kelime) > 2){       //2 den fazla harf girilirse sorgulama başlatılıyor
				$stmt = "SELECT * FROM uye WHERE rumuz LIKE '%" . addslashes($kelime) . "%' AND durum LIKE '1' LIMIT 5";  //veritabanında arama sorgusu
	
			     $result = mysql_query($stmt, $linkID);
			
					if (mysql_num_rows($result) > 0)
					{
		
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
						{
					        $baslik = $row[rumuz];  //sonuçlarda karakter ayarları
							$url    = $row[id];
							
							echo "<p style=\"cursor: pointer;\" onclick=\"document.location='index.php?ney=kim-la&bu=$url'\"<strong>Üye: $baslik</strong></p>";
					//Sonuçlar yazdırılıyor
					}
					}
					}
					}
					
	else
		echo "<script language=\"JavaScript\">HideDiv(\"autocomplete\");</script>";

if (isset($kelime) && trim($kelime != "") )
	{
	if (strlen($kelime) > 2){       //2 den fazla harf girilirse sorgulama başlatılıyor
				$stmt = "SELECT * FROM itiraf WHERE baslik LIKE '%" . addslashes($kelime) . "%' AND durum LIKE '1' LIMIT 5";  //veritabanında arama sorgusu
	
			     $result = mysql_query($stmt, $linkID);
			
					if (mysql_num_rows($result) > 0)
					{
		
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
						{
					        $baslik =$row[baslik];  //sonuçlarda karakter ayarları
							$url    = $row[id];
							
							echo "<p style=\"cursor: pointer;\" onclick=\"document.location='itiraf-$url.html'\"<strong>İtiraf: $baslik</strong></p>";
					//Sonuçlar yazdırılıyor
					}
					}
					}
					}
					
	else
		echo "<script language=\"JavaScript\">HideDiv(\"autocomplete\");</script>";
?>