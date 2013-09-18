 <?php require_once('Connections/baglanti.php'); require_once('foksiyon.php'); include('online.php');  include('bugun.php'); 
 
 session_start();
 
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
	
	$ip=$_SERVER['REMOTE_ADDR'];

$o=$_GET['gnid'];

$sen=$_SESSION['uyeid'];

$ad=admin($o);
$bn=admin($sen);
if($ad==1) { $cw=1;}
if($bn==1) { $cw=1;}
if($cw==1) { 
if($_POST['msj']=="ok" ){
$mesaj=$_POST['mesaj'];


if($o==1) {
$sql = "insert into mesajlar (alid, gnid, mesaj)
values ('".$o."', '".$sen."', '".$mesaj."')";
$kayit = mysql_query($sql);
	
	 } else { 
$sql = "insert into mesajlar (alid, gnid, mesaj)
values ('".$o."', '".$sen."', '".$_POST['mesaj']."')";
	 
	$kayit = mysql_query($sql); 
	 }



}
} 
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#gonder {
	height: 60px;
}
-->
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script TYPE="text/javascript">
<!--
function submitMe() {
if (window.event.keyCode == 13)
{
document.myForm.submit();
}
} 
//-->
</script>
</head>

<body><form name="form1" method="post" action="">
    <table width="100" border="0" align="center">
  <tr>
    <td><textarea name="mesaj" id="mesaj" cols="40" rows="3" ></textarea></td>
    <td><input type="submit" name="gonder" id="gonder" value="Gonder"  onKeyPress="submitMe()"></td>
  </tr>
</table><input name="msj" type="hidden" value="ok">
    </form>
</body>
</html>