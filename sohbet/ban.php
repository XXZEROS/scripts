<? require_once('../Connections/baglanti.php'); 

if(mysql_real_escape_string($_GET['idati'])){
		
		if(mysql_real_escape_string($_GET['u'])){
			
			$degistir = mysql_query("UPDATE chatuyeon SET ban='1' WHERE id='".mysql_real_escape_string($_GET['idati'])."'");  
			
		}
		if(mysql_real_escape_string($_GET['b'])){
			
				$degistir = mysql_query("UPDATE chatnoon SET ban='1' WHERE id='".mysql_real_escape_string($_GET['idati'])."'");
		}


 }

?>