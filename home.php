<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title> Serieak </title>
	<link rel="stylesheet" href="css/home.css"/>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<script type="text/javascript">
		function showResult(str) {
		  if (str.length==0) { 
			document.getElementById("livesearch").innerHTML="";
			document.getElementById("livesearch").style.border="1px";
			return;
		  }
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xhr=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
			xhr=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xhr.onreadystatechange=function() {
			if (xhr.readyState==4 && xhr.status==200) {
			  document.getElementById("livesearch").innerHTML=xhr.responseText;
			  document.getElementById("livesearch").style.border="1px solid #141414";
			   document.getElementById("livesearch").style.background="#141414";
				document.getElementById("livesearch").style.width="225px";
				document.getElementById("livesearch").style.position="absolute";
				document.getElementById("livesearch").style.left="47.5%";
			}
		  }
		  xhr.open("GET","livesearch.php?word="+str,true);
		  xhr.send();
		}
		
</script>
<?php 
session_start();
$_SESSION['from']="home";
if($_SESSION['username']=="admin"){?>
<input type="button" class="button" style="position:absolute;left:0;" value="Administratzaile bista" onclick='location.href = "admin.html";' />	
<?php }?>

</head>
<body>
	<div style="text-align:center;" class="letra">
		<form action="">
			<p>Sartu serie izena:<input type="text" size="30" onkeyup="showResult(this.value)"/></p>
			<div id="livesearch"></div>
		</form>	
	<input type="button" class="button" value="Saioa itxi" onclick="location.href = 'logOut.php';" />	
	</div>
	

	<div style="text-align:center;" class="letra">
	<div class="img">
	 <a  href="info.php?id=Breaking Bad"><img src="images/bb.jpg" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">Breaking Bad</div>
	</div>
	<div class="img">
	 <a  href="info.php?id=The Walking Dead"><img src="images/wd.jpg" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">The Walking Dead</div>
	</div>
	<div class="img">
	 <a  href="info.php?id=Game of Thrones"><img src="images/got.jpg" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">Game of Thrones</div>
	</div>
	<div class="img">
	 <a href="info.php?id=Mr Robot"><img src="images/mr.jpg" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">Mr Robot</div>
	</div>
	<div class="img">
	 <a href="info.php?id=Prison Break"><img src="images/pb.png" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">Prison Break</div>
	</div>
	<div class="img">
	 <a href="info.php?id=The Sopranos"><img src="images/ts.jpg" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">The Sopranos</div>
	</div>
	<div class="img">
	 <a href="info.php?id=Sons of Anarchy"><img src="images/soa.jpg" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">Sons of Anarchy</div>
	</div>
	<div class="img">
	 <a href="info.php?id=House"><img src="images/house.jpg" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">House</div>
	</div>
	<div class="img">
	 <a href="info.php?id=The Wire"><img src="images/tw.jpg" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">The Wire</div>
	</div>
	<div class="img">
	 <a href="info.php?id=Arrow"><img src="images/arrow.png" alt="Klematis" width="220" height="180"/></a>
	 <div class="desc">Arrow</div>
	</div>
		</div>
		<div style="position:absolute;right:50%;bottom:10%;">
		<?php
		if($_SESSION['username']!="admin"){?>
			<p><a style="font-size:15px" href="bezero.html" title="Atzera">Atzera</a></p>
		<?php }?>

			</div>
</body>
</html>