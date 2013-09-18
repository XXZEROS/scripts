<?php  include("../config.php"); ?><html>
	<head>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

		<script src="jquery.Jcrop.js"></script>
		<link rel="stylesheet" href="jquery.Jcrop.css" type="text/css" />
		<link rel="stylesheet" href="demos.css" type="text/css" />

		<script language="Javascript">

			$(function(){

				$('#cropbox').Jcrop({
					aspectRatio: 0,
					onSelect: updateCoords
				});

			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};

		</script>
 

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

	<body>

	<div id="outer">
	<div class="jcExample">
	<div class="article">

		<h1>Resim kesme</h1>
      
       <form action="crop.php" method="post" onSubmit="return checkCoords();" >
        
        <img src="<?=$_GET['url'];?>" id="cropbox" />
		
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
            <input type="hidden" id="res" name="res" value="<?=$_GET['url'];?>" />

			<input type="submit" value="Resimi Kes" />
		</form>

		
Eski resim<br>
<? $menuler2 = mysql_query ("select * from haberler where id='".$_GET['ID']."'");
while ($anket = mysql_fetch_array($menuler2))  { ?>
<img src="../../resim/<?= $anket['resim'];?>" width="272" height="204"><? } ?> </div>
	</div>
	</div>

	</body>

</html>
