<? require_once('../Connections/baglanti.php'); 

if($_GET['idati']){
		
		if($_GET['u']){
			
			$degistir = mysql_query("UPDATE chatuyeon SET ban='1' WHERE id='".$_GET['idati']."'");  
			
		}
		if($_GET['b']){
			
				$degistir = mysql_query("UPDATE chatnoon SET ban='1' WHERE id='".$_GET['idati']."'");
		}


 }

?>