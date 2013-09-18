<?php
//*****************************************************************************
//
// MICRO CALENDAR  -  Version: 1.0
//
// You may use this code or any modified version of it on your website.
//
// NO WARRANTY
// This code is provided "as is" without warranty of any kind, either
// expressed or implied, including, but not limited to, the implied warranties
// of merchantability and fitness for a particular purpose. You expressly
// acknowledge and agree that use of this code is at your own risk.
//
//*****************************************************************************
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Micro Calendar</title>

</head>
<body>

<?php
function showCalendar(){
    // Get key day informations. 
    // We need the first and last day of the month and the actual day
	$today    = getdate();
	$yil = "20".date("y");
	$firstDay = getdate(mktime(0,0,0,$today['mon'],1,$today['year']));
	$lastDay  = getdate(mktime(0,0,0,$today['mon']+1,0,$today['year']));
	
	
	$ay=$today['mon'];
	$aylar = Array(
		"1" => "Ocak", 
		"2" => "Subat", 
		"3" => "Mart", 
		"4" =>  "Nisan", 
		"5" =>  "Mayis", 
		"6" =>  "Haziran", 
		"7" =>  "Temmuz", 
		"8" =>  "Agustos", 
		"9" =>  "Eylül", 
		"10" =>  "Ekim", 
		"11" =>  "Kasim", 
		"12" =>  "Aralik"
);
	// Create a table with the necessary header informations
	echo '<table>';
	echo '  <tr><th colspan="7">'.$aylar[$ay]." - ".$today['year']."</th></tr>";
	echo '<tr class="days">';
	echo '  <td>Pzt</td><td>Sal</td><td>Çar</td><td>Per</td>';
	echo '  <td>Cum</td><td>Cmt</td><td>Pzr</td></tr>';
	
	
	// Display the first calendar row with correct positioning
	echo '<tr>';
	if ($firstDay['wday'] == 0) $firstDay['wday'] = 7;
	for($i=1;$i<$firstDay['wday'];$i++){
		echo '<td>&nbsp;</td>';
	}
	$actday = 0;
	for($i=$firstDay['wday'];$i<=7;$i++){
		$actday++;
		if ($actday == $today['mday']) {
			$class = ' class="actday"';
		} else {
			$class = '';
		}
		echo "<td$class><a href=\"index.php?yil=$yil&ay=$ay&gun=$actday\">$actday</a></td>";
	}
	echo '</tr>';
	
	//Get how many complete weeks are in the actual month
	$fullWeeks = floor(($lastDay['mday']-$actday)/7);
	
	for ($i=0;$i<$fullWeeks;$i++){
		echo '<tr>';
		for ($j=0;$j<7;$j++){
			$actday++;
			if ($actday == $today['mday']) {
				$class = ' class="actday"';
			} else {
				$class = '';
			}
			echo "<td$class><a href=\"index.php?yil=$yil&ay=$ay&gun=$actday\">$actday</a></td>";
		}
		echo '</tr>';
	}
	
	//Now display the rest of the month
	if ($actday < $lastDay['mday']){
		echo '<tr>';
		
		for ($i=0; $i<7;$i++){
			$actday++;
			if ($actday == $today['mday']) {
				$class = ' class="actday"';
			} else {
				$class = '';
			}
			
			if ($actday <= $lastDay['mday']){
				echo "<td$class><a href=\"index.php?yil=$yil&ay=$ay&gun=$actday\">$actday</a></td>";
			}
			else {
				echo '<td>&nbsp;</td>';
			}
		}
		
		
		echo '</tr>';
	}
	
	echo '</table>';
}

showCalendar();
?>

</body>
</html>