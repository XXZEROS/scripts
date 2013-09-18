<? ob_start(); require_once('../../Connections/baglanti.php');
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  


#---------------------------------------#
# file upload manager 1.1
# 13.02.2003
# 
# written by thepeak
# copyright (c) 2003 thepeak of mtnpeak.net
#
# www: http://www.mtnpeak.net
# www: http://www.xd3v.com
# email: thepeak@gmx.net
#
# A simple, powerful way to upload and 
# manage files using your web browser.
# 
# This program is free software; you can redistribute 
# it and/or modify it under the terms of the GNU General 
# Public License as published by the Free Software 
# Foundation; either version 2 of the License, or 
# (at your option) any later version, as long as the 
# copyright info and links stay intact. You may not sell
# this program under any circumstance without written 
# permission from the author.
#
# please send me feedback - and enjoy!
#---------------------------------------#

################## config ####################

# header & title of this file
$title= "Dosya Yukleme Yoneticisi";

# individual file size limit (102400 bytes = 100KB)
$file_size_ind = "5124000";

# the upload store directory (chmod 777)
$dir = "../../depo";

# the file type extensions allowed to be uploaded
$file_allow_ex = array("gif","jpg","jpeg","png","txt","doc","xls","htm","zip","rar","pdf");

# if you want to password-protect this file, enter "yes" instead of "no"
$auth[ReqPass] = "no";

# if you set $auth[ReqPass] to yes, then you must set the username and password
$auth[usern] = "username";
$auth[passw] = "password";

################# /config ####################
?>
<?
if($auth[ReqPass] == "yes") {

function error ($error_message) {
	echo $error_message."<BR>";
	exit;
}

if ( (!isset($PHP_AUTH_USER)) || ! (($PHP_AUTH_USER == $auth[usern]) && ( $PHP_AUTH_PW == "$auth[passw]" )) ) {
	header("WWW-Authenticate: Basic entrer=\"file upload manager v1.1\"");
	header("HTTP/1.0 401 Unauthorized");
	error("Access Denied! You must enter a valid username & password.");
}
}
?> 
<html>
<head>
<title><? print ($title) ? ($title) : ("File Upload Manager"); ?></title>
<link rel="stylesheet" href="img/style-blue.css" type="text/css">
</head>
<body bgcolor="#F7F7F7"><br><br>
<center><table width="50%" cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td><font size="3"><b><i>Dosya Y&uuml;kleme Y&ouml;neticisi</i></b></font>&nbsp;<font style="text-decoration: bold; font-size: 9px;"></font>&nbsp;
</td></tr>
</table>
<?

function getlast($toget)
{
	$pos=strrpos($toget,".");
	$lastext=substr($toget,$pos+1);

	return $lastext;
}

function replace($o)
{
	$o=str_replace("/","",$o);
	$o=str_replace("\\","",$o);
	$o=str_replace(":","",$o);
	$o=str_replace("*","",$o);
	$o=str_replace("?","",$o);
	$o=str_replace("<","",$o);
	$o=str_replace(">","",$o);
	$o=str_replace("\"","",$o);
	$o=str_replace("|","",$o);
	return $o;
}

if(!eregi("777",decoct(fileperms($dir))))
{
	echo"<br><br><b><h4><font color=\"FF0000\">HATA: CHMOD izin verin \"$dir\"  777 yap (xrw-xrw-xrw)!</h4></font></b><br>»<a href=\"$_SERVER[PHP_SELF]\">yenile</a>";
}
else
{
	if(!$_FILES[fileupload])
	{
?>
<table width="50%" cellspacing="0" cellpadding="0" border="0" class="table_decoration" style="padding-top:5px;padding-left=5px;padding-bottom:5px;padding-right:5px">
  <form method="post" enctype="multipart/form-data">
  <tr>
    <td width="27%">Dosya Se&ccedil;</td><td width="73%"><input type="file" name="fileupload" class="textfield" size="30"></td>
  </tr>
  <tr>
    <td>&#304;stersen Adland&#305;r</td><td><input type="text" name="rename" class="textfield" size="46"></td>
  </tr>
  <tr>
    <td>Dosya T&uuml;rleri</td><td><?
	for($i=0;$i<count($file_allow_ex);$i++)
	{
		if(($i<>count($file_allow_ex)-1))$commas=", ";else $commas="";

		list($key,$value)=each($file_allow_ex);
		echo $value.$commas;
	}
?></td>
  </tr>
  <tr>
    <td>Max Dosya Boyutu</td><td><?=round(($file_size_ind/1024000),2)?> MB <b>(<?=round(($file_size_ind/1024),2)?> KB)</b></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="Y&uuml;kle" class="button">&nbsp;<input type="reset" value="Temizle" class="button"></td>
  </tr>
  </form>
</table>
<?
		if((!$_GET[act]||!$_GET[file])&&$_GET[act]!="delall")
		{
			$opendir = @opendir($dir);

			while ($readdir = @readdir($opendir))
			{
				if($readdir<>"." && $readdir<>"..")
				{
					$filearr[] = $readdir;
				}
				$sort=array();
				for($i=1;$i<=count($filearr);$i++)
				{
					$key = sizeof($filearr)-$i;
					$file = $filearr[$key];

					$sort[$i]=$file;
				}
				asort($sort);
			}

			if(count($filearr)>=1)
			{
				if(count($filearr)>1)
				{
?>
<br>
<table width="50%" cellspacing="0" cellpadding="0" border="0" class="table_decoration" style="padding-left:5px">
  <tr>
    <td>admin: <a href="javascript:;" onClick="cf=confirm('Are you sure you want to delete ALL FILES?');if(cf)window.location='?act=delall'; return false;" style="font-size: 9px;">&lt;delall files&gt;</a></td>
  </tr>
</table>
<br>
<?
				}
				else
				{
					echo"<br>";
				}
?>
<table width="533" cellspacing="0" cellpadding="0" border="0" class="table_decoration" style="padding-left:6px">
  <tr bgcolor="#DBDBDB">
   <td width="136">RES&#304;M</td>
    <td width="127">DOSYA ADI</td>
        <td width="127">DOSYA YOLU</td>
    <td align="center" width="50">T&Uuml;R&Uuml;</td>
    <td align="center" width="92">&#304;&#350;LEM</td>
  </tr>
<?
				for($i=1;$i<=count($sort);$i++)
				{
					list($key,$value)=each($sort);

					if($value)
					{
						$value_en=base64_encode($value);
?>
  <? $xx=getlast($value); if($xx!="notes") { ?><tr>
  <td width="136"><? $xx=getlast($value); if($xx=="jpg" || $xx=="png" || $xx=="gif" || $xx=="jpeg") { ?><img src="../../depo/<?=$value;?>" height="50"><? } else echo "Resim Degil"; ?></td>
    <td width="127"><?="<a href=\"?act=view&file=$value_en\">&lt;$value&gt;</a>"?></td>
        <td width="127">&lt;&gt;/depo/<?=$value;?></td>
        <td align="center" width="50"><?
						echo strtoupper(getlast($value));
	?></td>
	<td align="center" width="92"><?="<a href=\"?act=view&file=$value_en\">&lt;BAK&gt;</a>"?> | <?="<a href=\"javascript:;\" onClick=\"cf=confirm('Dosyayi Silmek Üzeresin?');if(cf)window.location='?act=del&file=$value_en'; return false;\">&lt;SiL&gt;</a>"?></td>
  </tr><? } ?>
<?
					}
				}
?>
</table></center>
<?
			}
		}
		elseif(($_GET[act]=="del")&&$_GET[file])
		{
			$value_de=base64_decode($_GET[file]);
			@unlink($dir."/$value_de");
			echo"<br><img src=\"img/info.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">file has been deleted!</font></b><br>»<a href=\"$_SERVER[PHP_SELF]\">back</a>";
		}
		elseif(($_GET[act]=="view")&&$_GET[file])
		{
			$value_de=base64_decode($_GET[file]);
			echo"<script language=\"javascript\">window.open(\"$dir/$value_de\", \"openfile\", \"resizable=yes,width=640,height=480,scrollbars=yes\")</script>";
			echo"<br><img src=\"img/info.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">file opened!</font></b><br>»<a href=\"$_SERVER[PHP_SELF]\">back</a><br><br><br>If this file did not display/download, you must <b>disable</b> your popup manager.";
		}
		
		if($_GET[act]=="delall")
		{
			$handle=opendir($dir);
			while($file=readdir($handle))
			if(($file != ".")&&($file != ".."))
			@unlink($dir."/".$file);
			closedir($handle);

			echo"<br><img src=\"img/info.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">all files have been deleted!</font></b><br>»<a href=\"$_SERVER[PHP_SELF]\">back</a>";
		}

	}
	else
	{
		echo"<br><br>";
		$uploadpath=$dir."/";
		$source=$_FILES[fileupload][tmp_name];
		$fileupload_name=$_FILES[fileupload][name];
		$weight=$_FILES[fileupload][size];

		for($i=0;$i<count($file_allow_ex);$i++)
		{
			if(getlast($fileupload_name)!=$file_allow_ex[$i])
				$test.="~~";
		}
		$exp=explode("~~",$test);

		if(count($exp)==(count($file_allow_ex)+1))
		{
			echo"<br><img src=\"img/error.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">ERROR: your file type is not allowed (".getlast($fileupload_name).")</font>, or you didn't specify a file to upload.</b><br>»<a href=\"$_SERVER[PHP_SELF]\">back</a>";
		}
		else
		{

			if($weight>$file_size_ind)
			{
				echo"<br><img src=\"img/error.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">ERROR: please get the file size less than ".$file_size_ind." BYTES  (".round(($file_size_ind/1024),2)." KB)</font></b><br>»<a href=\"$_SERVER[PHP_SELF]\">back</a>";
			}
			else
			{

				foreach($_FILES[fileupload] as $key=>$value)
				{
					echo"<font color=\"#3399FF\">$key</font> : $value <br>";
				}

				echo "<br>";

				$dest = ''; 

				if ( ($source != 'none') && ($source != '' ))
				{
					$dest=$uploadpath.$fileupload_name;
					if ($dest != '')
					{
						if(file_exists($uploadpath.$fileupload_name))
						{
							echo"<br><img src=\"img/error.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">ERROR: that file has already been uploaded before, please choose another file</font></b><br>»<a href=\"javascript:history.go(-1)\">back</a>";
						}
						else
						{
							if (copy($source,$dest))
							{
								if($_POST[rename])
								{
									$_POST[rename]=replace($_POST[rename]);

									$exfile=explode(".",$fileupload_name);
									if(@rename("$dir/$fileupload_name","$dir/$_POST[rename].".getlast($fileupload_name))) {
										echo"<br><img src=\"img/info.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">file has been renamed to $_POST[rename].".getlast($fileupload_name)."!</font></b></font><br>";
									}
								}
								echo"<br><img src=\"img/info.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">Dosya Yüklendi!</font></b><br>»<a href=\"$_SERVER[PHP_SELF]\">Geri Git</a>";
							}
							else
							{
								echo"<br><img src=\"img/error.gif\" width=\"15\" height=\"15\">&nbsp;<b><font size=\"2\">ERROR: cannot upload, please chmod the dir to 777</font></b><br>»<a href=\"$_SERVER[PHP_SELF]\">back</a>";
							}

						}
					}
				}
			}

		}
	}
}
?>
</body>
</html>
<? } else {
  
echo header('Location: ../index.php'); } 
 ob_flush();  ?> 