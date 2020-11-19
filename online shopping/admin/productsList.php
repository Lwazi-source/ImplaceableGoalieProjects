<?php  include('..\dbconn.php');

  if (!isset($_SESSION['username1'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../login.php');
  }
  if (isset($_GET['logout1'])) {
  	session_destroy();
  	unset($_SESSION['username1']);
  	header("location: ../login.php");
  } 

$selectDB = mysqli_select_db($connection,$database);
 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($connection, "SELECT * FROM items WHERE id=$id");

		if (mysqli_num_rows($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$code = $n['code'];
			$price = $n['price'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Top Tech</title>
	<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body>
<center>

  
  <div class="main">
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
    <?php  if (isset($_SESSION['username1'])) : ?>
    	<p><strong><?php echo $_SESSION['username1']; ?></strong></p>
		<a href="productsList.php?logout1='1'" style="color: red;">LOGOUT</a> </p>&nbsp;
    <?php endif ?>
</div>

  <div id="main" >


<?php $results = mysqli_query($connection, "SELECT * FROM items"); ?>
	
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


	<table border="1" cellspacing="1" cellpadding="1">
	
			<tr>
				<th>Product Name</th>
				<th>Product ID Code</th>
				<th>Price</th>
				<th colspan="2">What to Do</th>
			</tr>
		
		
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['code']; ?></td>
				<td><?php echo "<b>R :</b>".$row['price']; ?></td>
				<td>
					<button type="button"><a href="productsList.php?edit=<?php echo $row['id']; ?>" >Edit</a></button>
				</td>
				<td>
					<button type="button"><a href="productsList.php?del=<?php echo $row['id']; ?>">Delete</a></button>
				</td>
			</tr>
		<?php } ?>
	</table>
	<br>


	<hr width = "595">

	<h3> Add Product </h3>
	
<div>
	<form method="post" action="..\dbconn.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<table>
		<tr>
			<td>Name</td><td><input type="text" name="name" value="<?php echo $name; ?>"></td>
		</tr>
		<tr>
			<td>Code</td><td><input type="text" name="code" value="<?php echo $code; ?>"></td>
		</tr>
		<tr>
			<td>Price</td><td><input type="text" name="price" value="<?php echo $price; ?>"></td>
		</tr>
		<tr><td></td>
			<td>
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
			</td>
		</tr>
		</table>
	</form>
</div>
<div></div>
</div>
  

</center>
</body>
</html>