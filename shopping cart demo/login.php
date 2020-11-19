<?php include ('dbconn.php');
	  include_once ('tablecreate.php');
	  $db=mysqli_connect('localhost','root','','TopTech');

	//login page
	if(isset($_POST['login'])){
		
		$firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$password  = $_POST['password'];
		
		if(empty($firstname)){
			array_push($errors, "Firstname is required !!");
		}
		if(empty($lastname)){
			array_push($errors, "Lastname is required !!");
		}			
			if(empty($password)){
			array_push($errors,"Password is required !!");
		}
		if(count($errors)==0){
			$password = md5($password);
			$query = "SELECT * FROM users 
			WHERE firstname='$firstname' AND lastname='$lastname' AND password='$password' ";
		
			$result = mysqli_query($db,$query);
		
			if(mysqli_num_rows($result)==1){
					/* $_SESSION['firstname'] = $firstname;
					//$_SESSION['password'] = $password;
					$_SESSION['success'] = "you are successfully now logged in";
					header('location: store.php') */;
					
					$_SESSION['firstname'] = $firstname;
					$_SESSION['success'] = "you are now logged in";
					header('location: store.php');
			}
		 	else
			{
				array_push($errors,"firstname or password may be wrong !!");
				//header('location: store.php');
			} 
		}	
	}
	
?>
<!DOCTYPE html>
<html>
<head>

<title>
Top-Tech Login
</title>
<link href="css/style.css" rel="stylesheet" type"text/css"/>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<div class= "nav">
<a href  ="index.php"> Home </a>
<a href class ="selected"="login.php"> Login </a>
<a href ="register.php"> Register </a>
</div>
<body>

<div class="header">
<h2> Login </h2>
</div>

<form method="POST" action="login.php">
<?php include('errors.php'); ?>

	<div class="inputs">
		<label> Name</label>
		<input type ="text" name="firstname" minlength="3" maxlength="35"  value="<?php echo $firstname; ?>">
	</div>
	
	<div class="inputs">
		<label> Lastname</label>
		<input type ="text" name="lastname" minlength="3" maxlength="35"  value="<?php echo $lastname; ?>">
	</div>
	
	<div class="inputs">
		<label> Password</label>
		<input type ="password" name="password">
	</div>
	
	<div class="inputs">
		<button type="submit" name="login" class="btn"> Log In </button>
	</div>
	
	<div class="inputs">
	<p>
	Don't have an account? <a href="register.php"> New account </a>
	</p>
	</div>
	
</form>
</body>

<footer class="footerbottom">
<p>footer</p>
</footer>

</html>