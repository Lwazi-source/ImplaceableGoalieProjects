<?php include('dbconn.php'); 
	include('tablecreate.php');
	$db=mysqli_connect('localhost','root','','TopTech');

//register page
	if(isset($_POST['register'])){
		
	    $firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$email     = $_POST['email'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2']; 
		
		if(empty($firstname)){
			array_push($errors, "name has to be filled in");
		}
		if(empty($lastname)){
			array_push($errors, "lastname has to be filled in"); 
		}
		if(empty($email)){
			array_push($errors, "email seems to be empty ");
		}
		elseif(filter_var($email, FILTER_VALIDATE_EMAIL) != true)
        {
            array_push($errors, "Invalid Email address");
        }
		
		if(empty($password1)){
			array_push($errors, "please fill in password");
		}
		if($password1 != $password2){
			array_push($errors,"passwords do not match");
		}
		elseif(strlen($password1) < 4)
        {
            array_push($errors, "The Password is too short!! must atleast be 4 characters.");
        }
		if(count($errors) == 0){
			$password = md5($password1);
			$sql = "INSERT INTO users(firstname,lastname,email,password) 
			VALUES ('$firstname','$lastname','$email','$password')";
			mysqli_query($db,$sql);
				
		//write to file
		$file = fopen("userdata.txt", "a") or die("Unable to open file!");
		$data = $firstname.",".$lastname.",".$email.",".$password."\n";
		fwrite($file, $data);
		fclose($file);
		}
		/*$content = file_get_contents($file);
		$table1 ="INSERT INTO users(firstname,lastname,email,password) 
			VALUES ('".$content."')";
			mysqli_query($db,$table1);*/
		//fclose($file); 
		//$table1 = "insert into 'users'(firstname,lastname,email,password)values($firstname,$lastname,$email,$password);";
		//$table1 = "LOAD DATA 'userdata.txt' INTO TABLE users FIELDS TERMINATED BY ',' LINES TERMINATED BY ','(id,firstname,lastname,email,password)";
	//	mysqli_query($db,$sql);
		
		
		 	$_SESSION['firstname'] = $firstname;
			$_SESSION['success'] = " you are now registered and logged in :-)";
			header('location: store.php'); 
	}
?>

<!DOCTYPE html>
<html>

<head>

<title>
Top-Tech Registration
</title>
<link href="css/style.css" rel="stylesheet" type"text/css" />
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<div class= "nav">
<a href="index.php"> Home </a>
<a href ="login.php"> Login </a>
<a href  class ="selected" ="register.php"> Register </a>
</div>
<body>

<div class="header">
<h2> Register </h2>
</div>

<form method="POST" action="register.php">

		<?php include('errors.php'); ?>

	<div class="inputs">
		<label> Name </label>
		<input type ="text" name="firstname" minlength="3" maxlength="35" value="<?php echo $firstname; ?>">
	</div>
	
	<div class="inputs">
		<label> Lastname</label>
		<input type ="text" name="lastname" minlength="3" maxlength="35" value="<?php echo $lastname; ?>">
	</div>
	
	<div class="inputs">
		<label> E-mail</label>
		<input type ="text" name="email" value="<?php echo $email; ?>">
	</div>
	
	<div class="inputs">
		<label> Password</label>
		<input type ="password" name="password1">
	</div>
	
	<div class="inputs">
		<label> Confirm Password</label>
		<input type ="password" name="password2">
	</div>
	
	<div class="inputs">
		<button type="submit" name="register" class="btn"> Register </button>
	</div>
	
	<div class="inputs">
	<p>
	Already have an account? <a href="login.php"> Sign In </a>
	</p>
	</div>
	
</form>

</body>

<footer class="footerbottom">
<p>footer</p>
</footer>
</html>