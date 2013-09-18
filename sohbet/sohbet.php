<?php error_reporting(0); require_once('../Connections/baglanti.php'); session_start();
	
	$ip=$_SERVER['REMOTE_ADDR']; 
	$zaman=time();
	$git=htmlspecialchars(strip_tags(mysql_escape_string($_POST['git'])));

	
if($git=="he") {
	 
	$rumuz=htmlspecialchars(strip_tags(mysql_escape_string($_POST['rumuz'])));
	
	
	# RUMUZ OLUŞTUR -- üye için
	if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail']) and isset($_SESSION['uyeid'])){

	$uyeid=$_SESSION['uyeid'];
	
		$uyedir=0; # eğer daha önce giriş yapmışsa
				
				$uyeler = mysql_query ("select * from chatuyeon where id='".$uyeid."'");
				while ($anket = mysql_fetch_array($uyeler))  {
		
				$degistiruye = mysql_query("UPDATE chatuyeon SET rumuz='".$rumuz."' WHERE id='".$uyeid."'"); 
		
		$uyedir=1;}
		
	if($uyedir==0) { # eğer bu üye ilk defa giriyorsa
	
				$sql = "insert into chatuyeon (rumuz, uyeid) values ('".$rumuz."', '".$uyeid."')";
				$kayit = mysql_query($sql);
				
					}
	
	}
	# RUMUZ OLUŞTURMA -- üye bitti
	
	# RUMUZ OLUŞTURMA -- misafirler için
	$cokie=0;
		if ($_COOKIE["iwpxq"]<>"") { # daha önce cookie varsa
	
			$browser=$_COOKIE["iwpxq"];
			
				$misafir = mysql_query ("select * from chatnoon where browser='".$browser."'");
				while ($w = mysql_fetch_array($misafir))  { 
					$cokie=1;
					$degistir = mysql_query("UPDATE chatnoon SET rumuz='".$rumuz."' WHERE id='".$w['id']."'");  
					
					
				} }
			
		if($cokie==0) {  			 	# daha önce yoksa
			
 
			$it=rand(111111111,9999999999);
			$expire=time()+60*60*24*30;
			@setcookie("iwpxq", "$it", $expire);
		
 
				
				$sql = "insert into chatnoon (rumuz, browser)
				values ('".$rumuz."', '".$it."')";
				$kayit = mysql_query($sql);
				if(!$kayit) { echo '* - icerik kaydetmede hata oluştu.'; $gos=false; }
				
				
		 
		 }  
	
	# RUMUZ OLUŞTURMA -- misafirler için bitti
	
} # rumuz oluşturuldu


# eğer üye değil ya da rumuz oluşturmadıysa index.php ye gönderiyok

$index=1;
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail']) and isset($_SESSION['uyeid'])){
	$uyeid=$_SESSION['uyeid'];
	$uyeler = mysql_query ("select * from chatuyeon where id='".$uyeid."'");
	while ($anket = mysql_fetch_array($uyeler))  {
				
				
				 
				
				$rmz=$anket['rumuz']; 
				if($rmz<>"") { $index=0; }
	} } else {
	
	$browser=$_COOKIE["iwpxq"];
			
	 			$misafir = mysql_query ("select * from chatnoon where browser='".$browser."'");
				while ($w = mysql_fetch_array($misafir))  { 
					
						$rmsz=$w['rumuz'];
						if($rmsz<>"") { $index=0; }
					
				}
		
	}
	
	
	if($index==2) { @header("Location: index.php");  exit;}  
	
# bitti


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asü Sohbet</title>
<style type="text/css">
body,td,th {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #FFB666;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tum {
	width: 600px;
	background-color: #333;
	margin: 0px;
}
.clear {
	clear: both;
}
.sol {
	float: left;
	width: 150px;
	height: 400px;
	border-right-width: 1px;
	border-right-style: solid;
	border-right-color: #FFF;
}
.sag {
	float: right;
	width: 447px;
	height: 400px;
}
.sag-ust {
	height: 350px;
}
.sag-alt {
	height: 40px;
	border-top-width: 1px;
	border-top-style: solid;
	border-top-color: #FFF;
	margin-top: 9px;
}
#gonder {
	height: 35px;
	width: 70px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #000;
	text-decoration: none;
	margin: 0px;
	padding: 0px;
}
a  {
	color: #F07E00;
}
a:hover {
	color: #B76000;
}

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

 
$(document).ready(function() {

    gonderx();

    var int=self.setInterval("gonderx()",1000);
});

function gonderx(){
    $.ajax({
        type:'POST',
        url:'m-msj.php',
        success: function (msg) {
            $("#msjx").html(msg);
        }
    });
}
</script>
</head>

<body>
<div class="tum">
  <div class="sol">Asü Sohbet</div>
  <div class="sag">
    <div class="sag-ust"><div id="msjx"></div> </div>
    <div class="sag-alt">
    <form name="form1w" method="post" target="gndr" action="ok.php">
    <table width="444" border="0" align="center">
  <tr>
    <td width="310"><input name="mesaj" type="text" id="mesaj" value="" style="height:30px; width:355px;" /></td>
    <td width="90"><input type="submit" name="gonder" id="gonder" value="Gonder"  onKeyPress="submitMe()"></td>
  </tr>
</table><input name="msj" type="hidden" value="ok">
    </form><iframe name="gndr"  width="1" height="1" frameborder="0" scrolling="no"></iframe></div>
  </div>
  <div class="clear"></div>
</div>
</body>
</html>