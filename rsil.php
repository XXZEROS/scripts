<?php
set_time_limit(0);
 require_once('Connections/baglanti.php');




$degistir = mysql_query("UPDATE yorum SET rating='0'"); 	
echo "tamam";
?>