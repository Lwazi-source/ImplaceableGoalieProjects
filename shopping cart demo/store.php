<?php include('dbconn.php');
	  include('tablecreate.php');
	  $db=mysqli_connect('localhost','root','','TopTech');
  			
	  if(isset($_POST['Shop'])){
				$id = ['id'];
					$description = ['description'];	
					$sellprice = ['sellprice'];
					$images = ['images'];
					$costprice = ['costprice'];
					$quantity = ['quantity'];
			
	//echo " </br>table items created.</br> " ;	
		//$load1 = mysqli_query($db,"LOAD DATA INFILE 'C:\wamp\www\work\project\items.txt' INTO TABLE items FIELDS TERMINATED BY ',' (description,sellprice,image);");		
	
}
 
		if(empty($_SESSION['firstname'])){
			header('location: login.php');
		}
			//WHERE description='$description' AND image='$image' AND sellprice='$sellprice' ";
			
?>

<!DOCTYPE html>
<html>
<head>

<title>
Top-Tech
</title>
<link href="css/style.css" rel="stylesheet" type"text/css"/>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<!-- <div class= "nav">
<a href  ="index.php"> Home </a>
<a href class ="selected"="login.php"> Login </a>
<a href ="register.php"> Register </a>
</div> -->

<body>
<form method="POST" action="store.php">
<?php include('errors.php'); ?>
	<div class="inputsshop">
		<button onclick="myFunction()" type="submit" name="Shop" <!--class="btn"-->> Start Shopping </button>
	</div>
</form>
 <!--if(mysqli_num_rows($result)==1){ }-->
<div class="header">
<h2> Top Tech </h2>
</div>

<div class="content">
	<?php if(isset($_SESSION['success'])):?>
		
		<div class="error-success">
			<h3>
			<?php
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			?>
			</h3>
		</div>
	<?php endif ?>
	<?php if(isset($_SESSION["firstname"]))?>
			<p> welcome <strong><?php echo $_SESSION['firstname']; ?></strong></p>
</div>

		<center>
			 <br>
			 
<table border="1" cellspacing="5" cellpadding="3">
            <tr>
            <td>Item Name:</td>
			<td>Item Image:</td>
            <td>Item Price:</td>
			
			</tr>
<?php

// Get images from the database
$sql = "SELECT * FROM items";
$query = mysqli_query($db,$sql);
  
if(mysqli_num_rows($query) > 0){
  while($row = mysqli_fetch_assoc($query)){
  for($i=0;$i<$row;$i++){	
		$imageURL = $row["images"];
        $imageDesc = $row["description"];
        $sellprice = $row["sellprice"];
  }
  }
	

?>
    <tr>
    <td>
    <p><?php echo $imageDesc; ?></p>
    </td>
    <td>
    <img src="<?php echo $imageURL; ?>" alt="" />
    </td> 
    <td>
    <p><?php echo " R ".$sellprice; ?></p>
	<td><input type="submit" name="AddToCart" value="Add To Cart"></td>
    </td>
    </tr>
	<!-- ---------------------------->
 <tr>
    <td>
    <p><?php echo $imageDesc; ?></p>
    </td>
    <td>
    <img src="<?php echo $imageURL; ?>" alt="" />
    </td> 
    <td>
    <p><?php echo " R ".$sellprice; ?></p>
	<td><input type="submit" name="AddToCart" value="Add To Cart"></td>
    </td>
    </tr>
  <?php 

}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
</table>

</center>


</body>
</html>