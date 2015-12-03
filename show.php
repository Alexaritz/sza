<link rel="stylesheet" href="css/index.css"/>
<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("serieak.xml");

$x=$xmlDoc->getElementsByTagName('seriea');


//lookup all links from the xml file if length of word>0
echo '<h>DATU BASEKO SERIEAK</h>';
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('izenburua');
    $z=$x->item($i)->getElementsByTagName('link');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
	  echo "<div  align='center'>";
	  $l=$i+1;
		echo '<p>'.$l. ". ".$y->item(0)->childNodes->item(0)->nodeValue.'</p>';
		 echo "</div>";
    }
  }


?>
