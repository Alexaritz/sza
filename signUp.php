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
//if ($_SERVER["REQUEST_METHOD"] == "post") {
$Username= $_POST['username'];
$Name= $_POST['izena'];
$Surnames= $_POST['surnames'];
$Email= $_POST['email'];
$Pass= $_POST['pass'];
//}
if (isset($_POST['submit'])){
$txertatu="INSERT INTO Erabiltzaile(Username, Name, Surnames, Email, Password) VALUES ('$Username','$Name','$Surnames','$Email', '$Pass')"; 
if (!$mysqli -> query($txertatu)){
	die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");	
}else{
	$_Session['email']=$Email;	
	echo 'Erabiltzailea zuzen sartu da';
	header("Location: home.html");
	die();
}}else{
	echo 'Sakatu bidali botoia.';
}	
?>