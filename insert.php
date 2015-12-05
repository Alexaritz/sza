<link rel="stylesheet" href="css/home.css">
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Izenburua= $_POST["izena"];
		$Link= $_POST["trailer"];
		$Laburpena= $_POST["sinopsis"];										
}
$Link=str_replace ( "watch?v=" , "v/" , $Link );
$xml = simplexml_load_file('serieak.xml');
$seriea = $xml->addChild('seriea');
$izenburua= $seriea ->addChild('izenburua', $Izenburua);
$link= $seriea-> addChild('link', $Link);
$laburpena= $seriea-> addChild('laburpena', $Laburpena);
$xml->asXML('serieak.xml');
echo '<div align="center"</div>';
echo '<p>Seriea datu basean zuzen sartu da</p>';
echo "<br/>";
echo'<p><a href="insert.html" title="Atzera">Atzera</a></p>';
echo '<div>';
?>