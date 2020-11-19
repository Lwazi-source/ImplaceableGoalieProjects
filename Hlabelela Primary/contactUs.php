<!DOCTYPE html>
<html >
<head>

<meta charset=utf-8" />
<title>Hlabelela Primary School</title>
<meta name="keywords" content="" />
<meta name="viewport" content="width= device - width, user-scalable= no, initial-scale= 1.0 ,maximum-scale= 1.0 ,minimum-scale= 1.0" >
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="images/favicon/favicon.ico" rel="icon" type="image/x-icon" />

</head >

<body >
<div class="topheader">
	<div id="logo" >
				<h1><a href="#">Hlabelelela Primary</a></h1>
			</div>

		<div id="header" class="container" >
		
			<div id="menu">
				<ul>
					<li ><a href="index.php">Home</a></li>
					<li class="current_page_item"><a href="contactUs.php">Contact Us</a></li>
					<li><a href="gallery.php">Gallery</a></li>
				</ul>
			</div>
		</div>
		</div>
<div class = "slideshow">

<!-- 1----yard--------------------------------------------->
	<div class = "slideshow-item">	 
		<img src ="images/front.jpg" alt = "School Yard"/>
	
	</div>
	
	<!-- 2----trophies--------------------------------------------->
	<div class = "slideshow-item">	 
		<img src = "images/class2.jpg" alt = "School Achievements; Trophies"/>
	</div>
	
		<!-- 2----trophies--------------------------------------------->
	<div class = "slideshow-item">	 
		<img src = "images/more.jpg" alt = "School Achievements; Trophies"/>
	</div>
	
	
	<!-- 3----rules--------------------------------------------->
	<div class = "slideshow-item">	 
			<img src = "images/champs.jpg" alt = "small School Rules and regulatins billBoard"/>
	</div>
	
	<!-- 4----rules--------------------------------------------->
	<div class = "slideshow-item">	 
			<img src = "images/ground.jpg" alt = "school emblem"/>
	</div>		
	<div class = "slideshow-item-text">	 
			<h5>Visit or Call Us</h5>
			<p> 701 Section D, P.O. Box 281, Enkangala, 1021</p>
			<p> Tel: +27 (081) 751 4689</p>
			<p> Contact: Principal L.T. Anokwuru</p>
			<p style="color=blue;"> Email: hlabelelaprimaryschool@gmail.com</p>
			<br><br><br>
			<h4>Sign up for our rss feeds. ( Optional. )</h4>			
			<p>
			<form id="myform" method="post" action="contactus.php">
				<div class="fonto">
					<br> <input name="name" type ="text" placeholder="Name"/><br>
					<br> <input class="form-control" name="email" placeholder="E-mail"/><br>
					<br> <input name="contactnumber" class="form-control"  type="text" placeholder="Contact number" maxlength="10"/> <br>
					<br> <textarea name="message" type = "password" placeholder="Message"> </textarea><br>
					<br> <input name="submit" class="form-controlbtn"  type = "submit" value="Send " />
						 <input name="cancel" class="form-controlbtn" type="reset" value="Cancel"/></br>
				</div>
			</form>	
		</p>
	</div>

	
</div>
<div id="footer-content">
	<div id="footer">
		<p>Copyright &copy; <br> Divergent.neurons@gmail.com <br/>All rights reserved. </p>
	<p> <br> Developer contacts:<br> Lwazimabuza50@gmail.com <br>  Felixsamsimelane@gmail.com <br> tmashego55555@gmail.com</p>
	</div>
</div>

</body>
</html>
<?php 
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
			$email = $_POST['email'];
				$contactnumber = $_POST['contactnumber'];
					$message = $_POST['message'];
					
					$emailTo = "Divergent.neurons@gmail.com";
					$headers = "From: " .email;
					$txt = "You have recived an email from " .$name.".\n\n" .$message;
					
					
					email($emailTo, $headers,$txt );
					header("Location: index.php?mailsend");
	}
?>

