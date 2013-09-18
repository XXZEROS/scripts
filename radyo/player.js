//DO NOT CHANGE THIS CODE//
	document.write('<div id="playercontainer12601404152"><a  href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash">Get&nbsp;Flash</a></div>');
	var head = window.document.getElementsByTagName("head")[0];
	var script = null;
	script = window.document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js?" + new Date().getTime();
	head.appendChild(script);
	script.onload = script.onreadystatechange = function(){ swfObjectLoaded(); };
	function swfObjectLoaded() {if (swfobject.hasFlashPlayerVersion("9")) {
//END DO NOT TOUCH THIS CODE


/*PORT NUMBER*/ var port = '9842';
/*HOST*/ var host = '31.3.230.124';
	
	
//DO NOT CHANGE THIS CODE//
	var ln = 'stream.mp3';
	var flashvars =      {	
//END DO NOT CHANGE THIS CODE//	
	
	
/*JW PLAYER SKIN*/	'skin':'beelden.xml',
/*STREAM TITLE*/	'title':'Asü itiraf Radyo Programı',
/*AUTOSTART Set to 'true' or 'false'*/	'autostart':'true',
	

//DO NOT CHANGE THIS CODE//
	'type':'sound',
	'file':'http://'+host+':'+port+'/;'+ln,
	'duration':'99999',
	'id':'scplayer'
	};
	
	var params =      {
	'allowscriptaccess':'always',
	'wmode': 'transparent',
	'bgcolor':'#000000',
	'allowfullscreen':'false'
	};
	
	var attributes =      {
	'id':'scplayer',
	'name':'scplayer'
	};
	
	swfobject.embedSWF('player.swf', 'playercontainer12601404152', '190', '30', '9.0.124', false, flashvars, params, attributes);}}
//END DO NOT CHANGE THIS CODE//		