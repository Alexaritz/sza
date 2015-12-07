<?php
// Start the session
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_sza";//root u266570359_sza
$password = "alexadri";//
$sdb = "u266570359_sza";
//$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 
$Username = $_GET["username"];			
$erab = $mysqli->query( "SELECT * FROM erabiltzaile WHERE Username=('$Username')");
$num_rows=mysqli_num_rows($erab);
if ($num_rows> 0){
	echo "Erabiltzaile hori dagoeneko existizen da.";
}
?>