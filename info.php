<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="css/home.css">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</head>
<body>
<?php
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
        } /*else {//listan elementu bat baño gehiok azaldu behar baue
          $hint=$hint . "<br /><a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }*/
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
/*if ($hint=="") {
  $response="Ez dago izen hori duen serierik.";
} else {
  $response=$hint;
}

//output the response
echo $response;*/
echo '<div align="center">';
echo "<p>$izenb</p>";
echo "<br/>";
echo '<iframe width="420" height="315" src="$url"></iframe>';
echo "<br/>";
echo "<p>$labur</p>";echo "<p>$url</p>";
echo "<br/>";
echo "<br/>";
echo '<a href="home.html" title="Hasiera">Atzera</a>';
echo '  </div>';

?>

</body>
</html>