<?php
echo '<link rel="stylesheet" href="css/index.css"/>';
session_start();
$_SESSION['from']="show";
$xmlDoc=new DOMDocument();
$xmlDoc->load("serieak.xml");

$x=$xmlDoc->getElementsByTagName('seriea');
echo ' <div align= "center" class="CSSTableGenerator" >
		<table border="1">
			<tr align="center">
				<td>SERIEAK</td>
			</tr>
			<tr>';
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('izenburua');
    $z=$x->item($i)->getElementsByTagName('link');
    if ($y->item(0)->nodeType==1) {
	  echo "<div  align='center'>";
	  $l=$i+1;
		echo'<tr><td><p>'.$l. ". "."<a href='info.php?id=" . $y->item(0)->childNodes->item(0)->nodeValue .
          "' >" . $y->item(0)->childNodes->item(0)->nodeValue . 
          "</a>".'</p></td></tr>';

		 echo "</div>";
    }
  }echo'</tr>
		</table>
		</div>';
   echo "<div  align='center'>";
  	echo'<p><a href="admin.html" title="Atzera">Atzera</a></p>';
 echo "</div>";

?>
