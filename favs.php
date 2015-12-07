<link rel="stylesheet" href="css/index.css"/>
<?php
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
$Username = $_SESSION["username"];

$xmlDoc=new DOMDocument();
$xmlDoc->load("serieak.xml");

$x=$xmlDoc->getElementsByTagName('seriea');




$serie = $mysqli->query( "SELECT * FROM serierabiltzaile WHERE Username=('$Username')" );
		$num_rows=mysqli_num_rows($serie);
		if ($num_rows> 0){
			echo ' <div align= "center" class="CSSTableGenerator" >
				<table border="1">
			<tr align="center">
				<td>SERIEAK</td>
			</tr>
			<tr>';
			$l=1;
			while( $row = mysqli_fetch_array( $serie )) {
				$word= $row['serie'];
				for($i=0; $i<($x->length); $i++) {
				$y=$x->item($i)->getElementsByTagName('izenburua');
				$z=$x->item($i)->getElementsByTagName('link');
				if ($y->item(0)->nodeType==1) {	
					if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$word)) {
						echo'<tr><td><p>'.$l. ". "."<a href='info.php?id=" . $y->item(0)->childNodes->item(0)->nodeValue .
						  "' >" . $y->item(0)->childNodes->item(0)->nodeValue . 
						  "</a>".'</p></td></tr>';
						$l=$l+1;
					}
				}
			  }
			
			
		}echo'</tr>
		</table>
		</div>';
   echo "<div  align='center'>";
  	echo'<p><a href="bezero.html" title="Atzera">Atzera</a></p>';
 echo "</div>";
		}




?>
