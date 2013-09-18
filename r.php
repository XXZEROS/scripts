<?
define('DONGU', 10000000);

$start = microtime(true);
for ($i=0; $i < DONGU; ++$i)
{   
    $c ++; 
}
$stop = microtime(true);
echo "kısa yazmak: " . ($stop - $start) . " sn<br>";

#######################

$start = microtime(true);
for ($i=0; $i < DONGU; ++$i)
{   
    $c = $c + 1; 
}
$stop = microtime(true);
echo "uzun yazmak: " . ($stop - $start) . " sn<br>";

?>