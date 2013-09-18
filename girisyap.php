<?php require_once('Connections/baglanti.php');

if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){
	echo "giris yapildi";
 } else {

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Y&ouml;netim Paneli Giriş Sayfası</title>
<style type="text/css">
<!--
#giis {
height: 234px;
width: 624px;
background-image: url(icgorsel/giris.png);
margin-top: 30px;
margin-right: auto;
margin-bottom: auto;
margin-left: auto;
padding-top: 260px;
}
#giriss {
height: 180px;
width: 350px;
margin-left: 200px;
color: #FFF;
font-weight: bold;
}
body {
background-color: #F7F7EB;
}
-->
</style>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
</head>
	<body>
<div id="giis">
  <div id="giriss">

	   <form method="post" id="form1" action="giris.php">
     <table cellpadding="2" cellspacing="0" >
       <tr>
         <td width="60"  height="40"  class="KT_th"></td>
         <td width="223"><input type='text' name='id' ></td>
       </tr>
       <tr>
         <td class="KT_th" height="40" ></td>
         <td><input type='password' name='key'></td>
       </tr>
       <tr>
         <td class="KT_th" height="10"></td>
         <td>&nbsp;</td>
       </tr>
       <tr class="KT_buttons">
         <td height="41" colspan="2"><input type="image" name="gonder" src="img/girisbuton.jpg" border="0"></td>
       </tr>
     </table>
   </form>
   <p>&nbsp;</p>
 </div>
</div>
</body>
</html><? } ?>