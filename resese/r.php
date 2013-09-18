<?xml<?php 
$icerikadresi = file_get_contents("http://www.asuitiraf.net/rss"); 

$cek = explode('<?xml', $icerikadresi);

$cek = explode('</rss>', $cek[1]);


echo $cek[0];

?></rss>