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
		$erab = $mysqli->query( "SELECT * FROM erabiltzaile WHERE Username=('$Username') and Password=('$Pasahitza')" );
		$num_rows=mysqli_num_rows($erab);
		if ($num_rows> 0){
			echo "<p>Datuak zuzenak dira.</p>";
			$_SESSION['username'] = $Username;
			mysqli_close($mysqli);
				header('Location: serie.html');
		}else{
			echo "<p>EEEE A MI NO ME TIMAS</p>";
			echo"<p><a href='layout.html'>Hasiera orria</a></p>   ";
		}
}else{
	echo 'Sartu datuak eta sakatu Bidali';
}
?>