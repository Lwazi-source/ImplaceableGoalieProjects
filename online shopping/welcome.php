<?php 
session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	//session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

if(isset($_POST['shop']))
{
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Top Tech</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div class="header">
	<h2>Top Tech</h2>
</div>
<div class = "homeBody">


<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
	<div id="main">
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<div class= "nav">
    	<p>  <a href="welcome.php" style="color: green;">HOME</a> 
		
		<a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
    <?php endif ?>
	<br>
	</div>
</div>

</div>
    <div id="main">
     
       
        <form method="post">
            <center><input type="submit" name="shop" value="Start Shopping" /></center>
        </form>
        <br>
		<!-- <iframe class="vid" width="800" height="315"
src="//www.youtube.com/watch?v=kPGpeRvTjFA?controls=0"
frameborder="0" allowfullscreen></iframe> -->
    </div>
	
	<div class = "slideshow" onclick = "onclick_event()">

<!-- 1----yard--------------------------------------------->
	<div class = "slideshow-item">	 
		<img src ="images/iphone.jpg" alt = "School Yard"/>
	
	<div class = "slideshow-item-text">	 
		
        <p>Technology, the application of scientific knowledge to the practical aims 
of human life or, as it is sometimes phrased, to the change and manipulation 
of the human environment.The subject of technology is treated in a number of articles.
 For general treatment, see technology, history of; hand tool. For description of the materials
 that are both the object and means of manipulating the environment, see elastomers; industrial 
 ceramics; industrial glass; metallurgy; mineral deposit; mineral processing; mining; plastic.</p>
       </div>
	   </div>
	   <div class = "slideshow-item">		   
		<img src = "images/gamingheadsets.jpg" alt = "School Achievements; Trophies"/>
		</div>
		<div class = "slideshow-item-text">	
        <p> For the generation of energy, see energy conversion; coal mining; coal utilization; petroleum production;
 petroleum refining. For treatment of food production, see agriculture, history of; agricultural economics;
 beekeeping; beer; cereal farming; coffee; commercial fishing; dairy farming; distilled spirit; food preservation;
 fruit farming; livestock farming; poultry farming; soft drink; tea; vegetable farming; wine.</p>
 </div>
 
     <div class = "slideshow-item">	 
			<img src = "images/mouse.jpg" alt = "Wireless mouse"/>

<div class = "slideshow-item-text">	
        <p>For the techniques of construction technology, see bridge; building construction; canals and inland waterways; dam; harbours and sea works;
 lighthouse; roads and highways; tunnels and underground excavations; environmental works. </p>
        <p > hit us up and we'll assist you.</p>
	 
		<h5>Top Tech pty ltd</h5>
		 
        <p>Emalahleni 56 Vilakazi street</p>
        <p>Postal Code: 2271</p>
        <p>Tel: 011 345 2117</p>
        <p>Email: toptech100@net.com</p>
        <p>Enjoy.</p>
		</div>
		</div>
		</div>
</div>





	


<div class="header">
 <p>&copy;Copyright - Divergent Tech</p>
  </div>
</body>
</html>