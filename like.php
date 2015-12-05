<?php
session_start();
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_sza";//root u266570359_alex
$password = "alexadri";// alexadri
$sdb = "u266570359_sza";
//$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 
	
$Username= $_SESSION['username'];
$Serie=$_POST['serie'];

$erab = $mysqli->query( "SELECT * FROM serierabiltzaile WHERE Username=('$Username') and serie=('$Serie')" );
$num_rows=mysqli_num_rows($erab);
if ($num_rows> 0){
	$ezabatu="Delete from serierabiltzaile WHERE username=('$Username') and serie=('$Serie')"; 
	if (!$mysqli -> query($ezabatu)){
		die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");	
	}else{	
		echo 'Seriea zuzen ezabatu da';
	}
}else{
	$txertatu="INSERT INTO serierabiltzaile(Username, serie) VALUES ('$Username','$Serie')"; 
	if (!$mysqli -> query($txertatu)){
		die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");	
	}else{	
		echo 'Seriea zuzen sartu da';
}
}
?>