<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Administradorea</title>
	<link rel="stylesheet" href="css/index.css"/>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<script type="text/javascript"></script>
</head>
<body>
<?php
// Start the session
session_start();
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_sza";//root u266570359_sza
$password = "alexadri";//
$sdb = "u266570359_sza";
//$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Username = $_POST["username"];
	$Pasahitza = $_POST["pass"];			
}
 if (isset($_POST['submit'])) {
	 if(strcmp($Username,'admin')==0 && strcmp($Pasahitza,'admin')==0 ){
		echo "<p>Datuak zuzenak dira.</p>";
		$_SESSION['username'] = $Username;
		mysqli_close($mysqli);
		header('Location: admin.html');	
	}else{
	$erab = $mysqli->query( "SELECT * FROM erabiltzaile WHERE Username=('$Username') and Password=('$Pasahitza')" );
	$num_rows=mysqli_num_rows($erab);
	if ($num_rows> 0){
		echo "<p>Datuak zuzenak dira.</p>";
		$_SESSION['username'] = $Username;
		mysqli_close($mysqli);
		header('Location: bezero.html');
	}else{
		echo '<div align="center">';
		echo '<p align="center">Kontu hori ez dago datu basean.</p>';
		echo'<p align="center"><a href="login.html" title="Atzera">Atzera</a></p>';
		echo'<img  id="imagen_centrada" src="images/sad.gif" alt="Sad"/>';
	}}
}else{
	echo 'Sartu datuak eta sakatu Bidali';
}
?>
</body>
</html>