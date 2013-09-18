<?
function hack($x) { 

	$ss = htmlspecialchars(strip_tags(mysql_escape_string($x)));

  	return($ss);
}
session_start();
function smiley($METIN) { 
$bul=array( ':)'=>'<IMG SRC="smile/smile.gif">',
			':P'=>'<IMG SRC="smile/p.bmp">',
			':D'=>'<IMG SRC="smile/d.gif">',
			':O'=>'<IMG SRC="smile/o.gif">',
			':ahah:'=>'<IMG SRC="smile/ahah.gif">',
			':by:'=>'<IMG SRC="smile/by.gif">',
            ':evil:'=>'<IMG SRC="smile/evil.gif">',  
            ':heey:'=>'<IMG SRC="smile/heey.gif">',
            ':hm:'=>'<IMG SRC="smile/hm.gif">',
            ':@'=>'<IMG SRC="smile/@.gif">',
            ':kural:'=>'<IMG SRC="smile/kural.gif">',
            ':l'=>'<IMG SRC="smile/l.gif">',
            ':lol:'=>'<IMG SRC="smile/lol.gif">',
            ':oha:'=>'<IMG SRC="smile/oha.gif">',
            ':pray:'=>'<IMG SRC="smile/pray.gif">',
            ':tabe:'=>'<IMG SRC="smile/tabe.gif">',
            ':v'=>'<IMG SRC="smile/v.gif">',
            ':zzz:'=>'<IMG SRC="smile/zzz.gif">'	
			
			
			); 
			$smly=strtr($METIN,$bul);

			$message=eregi_replace(chr(13),"<br>",$smly); 
			
			
return($message); 
} 

# �rnek kullanim 




function ay($ay){
if($ay==1)  {  return 'Ocak';    }
if($ay==2)  {  return 'Subat';   }
if($ay==3)  {  return 'Mart';    }
if($ay==4)  {  return 'Nisan';   }
if($ay==5)  {  return 'Mayis';   }
if($ay==6)  {  return 'Haziran'; }
if($ay==7)  {  return 'Temmuz';  }
if($ay==8)  {  return 'Agustos'; }
if($ay==9)  {  return 'Eylül';   }
if($ay==10) {  return 'Ekim';    }
if($ay==11) {  return 'Kasim';  }
if($ay==12) {  return 'Aralik';  }


}
// print ay(ay);

function onmu($itid){

$sw=0;
$yorums = mysql_query ("select id,online from uye where id='".$itid."'");
while ($yors = mysql_fetch_array($yorums)) { $dbzmn=$yors['online']; }

$simdi=time(); // simdiki zaman
$besdk=($dbzmn+5); // 5 sn onceki zaman
$sn=($simdi-$dbzmn);
$dk=($sn/60);
$sa=($dk/60);
$gun=($sa/24);
$hafta=($gun/7);
$ay=($gun/30);
$yil=($ay/12);

if($dk<60)   { $once=$dk; $k=" dk";    } else {
if($sa<24)   { $once=$sa; $k=" saat";  } else {
if($gun<30)  { $once=$gun; $k=" gün"; } else {
if($ay<12)   { $once=$ay; $k=" ay";    } else {
if($yil<365) { $once=$yil; $k=" yıl"; } } } } }

if($simdi<$besdk) { return 'Şu an sitede'; } else { return round($once,0).$k.' önce sitedeydi'; }

} 


// print yorumyokmu(itiraf id);

function rating($www){

$arti=0; $eksi=0;
		  
		 $yorrat = mysql_query ("select yorid,arti from rating where yorid='".$www."' and arti='1'");
while ($rat = mysql_fetch_array($yorrat))  { $arti++;; }
 $yorrex = mysql_query ("select yorid,eksi from rating where yorid='".$www."' and eksi='1'");
while ($ratx = mysql_fetch_array($yorrex))  { $eksi++; } 

 return ($arti-$eksi);

}

// print yorumyokmu(itiraf id);


function yorumyokmu($itid){

$sw=0;
$yorums = mysql_query ("select yorum,itid,durum from yorum where itid='".$itid."' and durum='1'");
while ($yors = mysql_fetch_array($yorums))  { $sw++; }
if($sw==0) {  return '2'; }

} 


// print yorumyokmu(itiraf id);


function yorumsayisi($itid){

$say=0;
$yorum = mysql_query ("select itid,durum from yorum where itid='".$itid."' and durum='1'");
while ($yor = mysql_fetch_array($yorum))  { $say++; }

return $say;

}

// print yorumsayisi(itiraf id);

function uyeres($ituye){

$uyeler = mysql_query ("select * from uye where id='".$ituye."'");
while ($uye = mysql_fetch_array($uyeler))  { 

$dos=$uye['resim'];
if($dos) { return $dos; } else {


$c=$uye['cinsiyet'];
if($c==1) { return 'erkek.jpg'; }
if($c==2) { return 'kadin.jpg'; }
} }
}
function uyecins($ituye){

$uyeler = mysql_query ("select * from uye where id='".$ituye."'");
while ($uye = mysql_fetch_array($uyeler))  { 
$c=$uye['cinsiyet'];
if($c==1) { return 'erk'; }
if($c==2) { return 'kdn'; }
} }

function uyead($ituye){

$uyeler = mysql_query ("select * from uye where id='".$ituye."'");
while ($uye = mysql_fetch_array($uyeler))  { 

return $uye['rumuz'];
} }

function uye($ituye){

$uyeler = mysql_query ("select * from uye where id='".$ituye."'");
while ($uye = mysql_fetch_array($uyeler))  { 
$c=$uye['admin'];
$dos='';
if($c==1) { $dos='class="aaa"'; }


return '<a href="index.php?ney=kim-la&bu='.$uye['id'].'" '.$dos.' >'.$uye['rumuz'].'</a>';


}

}

function uyex($ituye){

$uyeler = mysql_query ("select * from uye where id='".$ituye."'");
while ($uye = mysql_fetch_array($uyeler))  { 



return '<a href="index.php?ney=kim-la&bu='.$uye['id'].'">'.$uye['rumuz'].'</a>';


}

}

function uyeon($ituye){

$uyeler = mysql_query ("select * from uye where id='".$ituye."'");
while ($uye = mysql_fetch_array($uyeler))  { 
$c=$uye['cinsiyet'];
if($c==1) { $dos="erkek.png"; }
if($c==2) { $dos="kadin.png"; }

$dbzmn=$uye['online']; //12

$simdi=time(); // 15
$zo=($simdi-$dbzmn);

if($zo<5) { $on="on"; } else { $on="off"; }

return '<a href="index.php?ney=kim-la&bu='.$uye['id'].'">'.$uye['rumuz'].'</a> - <img src="images/'.$dos.'" width="16" height="16" align="bottom" /> <img src="images/'.$on.'.gif" width="15" height="15" align="bottom" />';


}

}

// print uye(ituye);

function rssx($www){
 
$c=$www;
if($c==1) { $dos="erk"; }
if($c==2) { $dos="kdn"; }

return $dos;
}


function rss($www){
 
$c=$www;
if($c==1) { $dos="erkek.png"; }
if($c==2) { $dos="kadin.png"; }

return '<img src="images/'.$dos.'" width="16" height="16" align="bottom" />';


}

// print uye(ituye);

function auye($ituye){

$uyeler = mysql_query ("select * from uye where id='".$ituye."'");
while ($uye = mysql_fetch_array($uyeler))  { 
$c=$uye['cinsiyet'];
if($c==1) { $dos="erkek.png"; }
if($c==2) { $dos="kadin.png"; }

return '<a href="../../../index.php?ney=kim-la&bu='.$uye['id'].'" target="_blank">'.$uye['rumuz'].'</a> - <img src="../../../images/'.$dos.'" width="16" height="16" align="bottom" />';


}

}
//admin i�in

function profil($www){

$uyelerw = mysql_query ("select id,resim from uye where id='".$www."'");
while ($re = mysql_fetch_array($uyelerw))  { 
$r=$re['resim'];
if($r=="") { $dr="yok.jpg";}
else       { $dr=$r;}



return '<a href="profil.php?id='.$re['id'].'"><img src="profil/'.$dr.'" width="53" height="53" align="bottom" border="0" /></a>';


}

}

// print uye(ituye);
function katid($www){

$kategori = mysql_query ("select id,katid from itiraf where id='".$www."'");
while ($kat = mysql_fetch_array($kategori))  { 

return $kat['katid']; }

}

function kat($kid){

$kategori = mysql_query ("select * from kategori where id='".$kid."'");
while ($kat = mysql_fetch_array($kategori))  { 

return '<a href="index.php?ney=cat&cID='.$kid.'">'.$kat['baslik'].'</a>'; }

}
function katqwe($kid){

	$kategori = mysql_query ("select * from kategori where id='".$kid."'");
	while ($kat = mysql_fetch_array($kategori))  { 
	
	return $kat['baslik']; }

}
// print uye(ituye);
function ait($www){

$kategori = mysql_query ("select id,baslik from itiraf where id='".$www."'");
while ($kat = mysql_fetch_array($kategori))  { 

return $kat['baslik']; }

}
function aitdurum($www){

$kategori = mysql_query ("select id,durum from itiraf where id='".$www."'");
while ($kat = mysql_fetch_array($kategori))  { 

return $kat['durum']; }

}
// print uye(ituye);

function admin($ituye){
$admn=0;
$uyeler = mysql_query ("select id,admin from uye where id='".$ituye."' and admin='1'");
while ($uye = mysql_fetch_array($uyeler))  { $admn=1;

} return $admn;
}
function durum($ituye){
$admn=0;
$uyeler = mysql_query ("select id,durum from uye where id='".$ituye."' and durum='1'");
while ($uye = mysql_fetch_array($uyeler))  { $admn=1;

} return $admn;
}



function tvar($xyil,$xay,$xgun){
	$admn=0;
		 if($xyil<date('Y')) { $admn=1; }
		 if($xay<date('m')) { $admn=1; }
		 if($xgun<=date('d')) { $admn=1; } 
		
	return $admn;
}

?>