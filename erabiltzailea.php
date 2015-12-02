<?php
$BL_FILE='erabiltzaileak.xml';		// Erabiltzaileak gordeko diren fitxategia.

function gorde_erabiltzailea($username, $name, $ $surnames, $email, $password)
{
	global $BL_FILE;	// Funtzio baten barrutik aldagai global erabiltzeko 'global' erabili behar da.
	
	if(!file_exists($BL_FILE))	// Erabiltzaileak gordetzeko XML fitxategia ez bada existitzen, sortu iruzkinik gabeko XML fitxategia.
		$bl=new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE erabiltzaileak SYSTEM "erabiltzaileak.dtd"><erabiltzaileak azkenid="b0"></erabiltzaileak>');
	else	// Bestela, kargatu XML fitxategia.
		$bl=simplexml_load_file($BL_FILE);
	if(!$bl)
		return false;
	
	$id = "b" . ((int) substr($bl['azkenid'], 1) + 1);	// Kalkulatu erabiltzaile berriaren identifikadorea.
	$berria=$bl->addChild('erabiltzailea');	// Sortu 'erabiltzailea' etiketa.
	$berria['id']=$id;
	$berria->addChild('username',$username);
	$berria->addChild('name',$name);
	$berria->addChild('surnames',$surnames);
	$berria->addChild('email',$email);
	$berria->addChild('password',$password);

	$bl['azkenid']=$id;	// Eguneratu erroko 'azkenid' atributua.
	return $bl->asXML($BL_FILE);	// Gorde aldaketak fitxategian.
}
?>
