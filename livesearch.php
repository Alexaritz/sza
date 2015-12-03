<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("serieak.xml");

$x=$xmlDoc->getElementsByTagName('seriea');

$word=$_GET["word"];

//lookup all links from the xml file if length of word>0
if (strlen($word)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('izenburua');
    $z=$x->item($i)->getElementsByTagName('link');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$word)) {
        if ($hint=="") {
          $hint="<a href='info.php?id=" . $y->item(0)->childNodes->item(0)->nodeValue .
          "' >" . $y->item(0)->childNodes->item(0)->nodeValue . 
          "</a>";
        } else {
          $hint=$hint . "<br /><a href='info.php?id=" . $y->item(0)->childNodes->item(0)->nodeValue .
          "' >" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="Ez dago izen hori duen serierik.";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>
