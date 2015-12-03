<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Izenburua= $_POST["izena"];
		$Link= $_POST["trailer"];
		$Laburpena= $_POST["sinopsis"];										
}
$xml = simplexml_load_file('serieak.xml');
$seriea = $xml->addChild('seriea');
$izenburua= $seriea ->addChild('izenburua', $Izenburua);
$link= $seriea-> addChild('link', $Link);
$laburpena= $seriea-> addChild('laburpena', $Laburpena);
$xml->asXML('serieak.xml');
echo 'Seriea datu basean zuzen sartu da';

?>