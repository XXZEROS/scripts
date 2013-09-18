<? ob_start(); require_once('../../Connections/baglanti.php'); 
if(isset($_SESSION['uyead']) and isset($_SESSION['uyemail'])and isset($_SESSION['uyeid'])){  

$phpversion = phpversion() < '4.3' ? '<font color="#FF0000">'.phpversion().'</font>' : '<font color="#008000">'.phpversion().'</font>';
$zendversion = zend_version() < '1.3' ? '<font color="#FF0000">'.zend_version().'</font>' : '<font color="#008000">'.zend_version().'</font>';
$mysqlversion = mysql_get_server_info() < '4.0' ? '<font color="#FF0000">'.mysql_get_server_info().'</font>' : '<font color="#008000">'.mysql_get_server_info().'</font>';
$get_phpini_path = get_cfg_var('cfg_file_path');
$get_allow_url_fopen= get_cfg_var('allow_url_fopen') ? '<font color="#008000">'.$_language->module['on'].'</font>' : '<font color="#FF0000">'.$_language->module['off'].'</font>';
$get_allow_url_include= get_cfg_var('allow_url_include') ? '<font color="#FF0000">'.$_language->module['on'].'</font>' : '<font color="#008000">'.$_language->module['off'].'</font>';
$get_display_errors= get_cfg_var('display_errors') ? '<font color="#008000">'.$_language->module['on'] : '<font color="#FFA500">'.$_language->module['off'].'</font> </font> <small>('.$_language->module['notice1'].')</small>';
$get_file_uploads= get_cfg_var('file_uploads') ? '<font color="#008000">'.$_language->module['on'].'</font>' : '<font color="#FF0000">'.$_language->module['off'].'</font>';
$get_log_errors = get_cfg_var('log_errors') ? '<font color="#008000">'.$_language->module['on'].'</font>' : '<font color="#FFA500">'.$_language->module['off'].'</font>';
$get_magic_quotes = get_cfg_var('magic_quotes_gpc') ? '<font color="#008000">'.$_language->module['on'].'</font>' : '<font color="#FFA500">'.$_language->module['off'].'</font> <small>('.$_language->module['notice1'].')</small>';
$get_max_execution_time = get_cfg_var('max_execution_time') < 30 ? '<font color="#FF0000">'.get_cfg_var('max_execution_time').'</font> <small>(min. > 30)</small>' : '<font color="#008000">'.get_cfg_var('max_execution_time').'</font>';
$get_memory_limit = get_cfg_var('memory_limit') > 128 ? '<font color="#FFA500">'.get_cfg_var('memory_limit').'</font> <small>('.$_language->module['notice2'].')</small>' : '<font color="#008000">'.get_cfg_var('memory_limit').'</font>';
$get_open_basedir= get_cfg_var('open_basedir') ? '<font color="#008000">'.$_language->module['on'].'</font>' : '<font color="#FFA500">'.$_language->module['off'].'</font> <small>('.$_language->module['notice1'].')</small>';
$get_post_max_size = get_cfg_var('post_max_size') > 8 ? '<font color="#FFA500">'.get_cfg_var('post_max_size').'</font> <small>('.$_language->module['notice2'].')</small>' : '<font color="#008000">'.get_cfg_var('post_max_size').'</font>';
$get_register_globals = get_cfg_var('register_globals') ? '<font color="#FF0000">'.$_language->module['on'].'</font>' : '<font color="#008000">'.$_language->module['off'].'</font>';
$get_safe_mode= get_cfg_var('safe_mode') ? '<font color="#008000">'.$_language->module['on'].'</font>' : '<font color="#FF0000">'.$_language->module['off'].'</font>';
$get_short_open_tag = get_cfg_var('short_open_tag') ? '<font color="#008000">'.$_language->module['on'].'</font>' : '<font color="#FFA500">'.$_language->module['off'].'</font> <small>('.$_language->module['notice1'].')</small>';
$get_upload_max_filesize = get_cfg_var('upload_max_filesize') > 16 ? '<font color="#FFA500">'.get_cfg_var('upload_max_filesize').'</font> <small>('.$_language->module['notice2'].')</small>' : '<font color="#008000">'.get_cfg_var('upload_max_filesize').'</font>';
$info_na = '<font color="#8F8F8F">'.$_language->module['na'].'</font>';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.bass {
	font-size: 16px;
	color: #333;
	font-weight: bold;
}
.basss {
	font-size: 13px;
	color: #333;
	font-weight: bold;
	padding: 2px;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#EEEEEE" class="basss">Server Özellikleri</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#DDDDDD">
  <tr>
    <td width="25%" class="td1"><b>Versiyon</b></td>
    <td width="25%" class="td1"><?php echo $versiyon; ?></td>
    <td width="25%" class="td1"><b>Server Os</b></td>
    <td width="25%" class="td1"><?php echo (($php_s = @php_uname('s')) ? $php_s : $info_na); ?></td>
  </tr>
  <tr>
    <td class="td2"><b>Php Versiyon</b></td>
    <td class="td2"><?php echo $phpversion; ?></td>
    <td class="td2"><b>Server Host</b></td>
    <td class="td2"><?php echo (($php_n = @php_uname('n')) ? $php_n : $info_na); ?></td>
  </tr>
  <tr>
    <td class="td1"><b>Zend Versiyon</b></td>
    <td class="td1"><?php echo $zendversion; ?></td>
    <td class="td1"><b>Sunucu Sürümü</b></td>
    <td class="td1"><?php echo (($php_r = @php_uname('r')) ? $php_r : $info_na); ?></td>
  </tr>
  <tr>
    <td class="td2"><b>Mysql Versiyon</b></td>
    <td class="td2"><?php echo $mysqlversion; ?></td>
    <td class="td2"><b>Sunucu Versiyon</b></td>
    <td class="td2"><?php echo (($php_v = @php_uname('v')) ? $php_v : $info_na); ?></td>
  </tr>
  <tr>
    <td class="td1" style="font-weight: bold">Veritabanı Adı</td>
    <td class="td1"><?php echo $veritabani; ?></td>
    <td class="td1"><b>Sunucu Makinesi</b></td>
    <td class="td1"><?php echo (($php_m = @php_uname('m')) ? $php_m : $info_na); ?></td>
  </tr>
</table></td>
        
      </tr>
    </table></td>
  </tr>
  
</table>
</body>
</html><? } else {
  
echo header('Location: ../index.php'); } 
 ob_flush();  ?> 