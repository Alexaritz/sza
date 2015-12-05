<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict/EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
session_start();
$Username= $_SESSION['username'];
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_sza";//root u266570359_sza
$password = "alexadri";//
$sdb = "u266570359_sza";
//$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 
$xmlDoc=new DOMDocument();
$xmlDoc->load("serieak.xml");

$x=$xmlDoc->getElementsByTagName('seriea');

$word=$_GET["id"];

//lookup all links from the xml file if length of word>0
if (strlen($word)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('izenburua');
    $z=$x->item($i)->getElementsByTagName('link');
	$l=$x->item($i)->getElementsByTagName('laburpena');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$word)) {
        if ($hint=="") { //listan hasiera baldin bada
          $hint="<a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
		  
		  $izenb=$y->item(0)->childNodes->item(0)->nodeValue;
		  $url=$z->item(0)->childNodes->item(0)->nodeValue;
		  $labur=$l->item(0)->childNodes->item(0)->nodeValue;
        }
      }
    }
  }
}


echo '<div align="center" >';
echo '<p id="izenb">'.$izenb.'</p>';
echo "<br/>";
echo '<iframe width="420" height="315" frameborder="0" src="'.$url.'"></iframe>';

echo '<br/>';
echo '</div>';
echo '<br/>';
echo '<div >';

echo '<p align="justify">'.$labur.'</p>';
echo "<p>$url</p>";
echo'<br/>';
echo'<br/>';
echo '</div>';
echo '<div align="center" >';

echo '<div align="center" >';

$erab = $mysqli->query( "SELECT * FROM serierabiltzaile WHERE Username=('$Username') and serie=('$izenb')" );
$num_rows=mysqli_num_rows($erab);
if ($num_rows> 0){
	echo'</label></td><td><input type="checkbox" name="checkboxG6" id="checkboxG6" class="css-checkbox"  onclick="gehitu()" checked/><label for="checkboxG6" class="css-label">';
}else{
	echo'</label></td><td><input type="checkbox" name="checkboxG6" id="checkboxG6" class="css-checkbox"  onclick="gehitu()"/><label for="checkboxG6" class="css-label">';
}
echo'<br/>';
echo '</div>';
echo'<br/>';
echo'<br/>';
echo'<p><a style="font-size:15px" href="home.html" title="Atzera">Atzera</a></p>';
echo '</div>';
?>
	<link rel="stylesheet" href="css/home.css">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<script>	 
		function gehitu(){
			if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xhr=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
			xhr=new ActiveXObject("Microsoft.XMLHTTP");
		  }
			var serie = "<?php echo $izenb; ?>" ;
		  	var param= "serie="+serie;
	
	xhr.open("POST","like.php", true);
	xhr.onreadystatechange=function() {
			if (xhr.readyState==4 && xhr.status==200) {
			  document.getElementById("livesearch").innerHTML=xhr.responseText;
			}}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(param);
	}
</script>
</head>
<body>

<div id="livesearch">xcz</div>
</body>
</html>
