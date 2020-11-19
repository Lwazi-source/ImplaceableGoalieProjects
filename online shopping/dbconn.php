 <?php

class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "18004724_MabuzaL_TopTech";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}


if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// initializing variables
$username = "";
$email    = "";
$errors = array();
$database =  "18004724_MabuzaL_TopTech";

$connection = mysqli_connect('localhost', 'root', '');


$selectDB = mysqli_select_db($connection,$database);
//echo "<h1>Connected!</h1>";

if ($selectDB === FALSE) {

$sql = "CREATE DATABASE 18004724_MabuzaL_TopTech";
mysqli_query($connection, $sql);  
echo "Database has ".$database." succesfully been created";

} else {

//echo "Database already exsist"."<br>";

}

$selectDB = mysqli_select_db($connection,$database);



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Please fill in your Name"); }
  if (empty($email)) { array_push($errors, "Please fill in Email"); }
  if (empty($password_1)) { array_push($errors, "Please fill in your password"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' ";
  $result = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // lines that check if the  user exists
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($connection, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Successfully logged in.";
  	header('location: login.php');
  }
}

// this is to LOGIN the USER

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Name is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  
  if($username == "admin" && $password == "admin") {
	  
	  $_SESSION['username1'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  header('location: admin/productsList.php');  
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($connection, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = " logged in";
  	  header('location: welcome.php');
  	}else {
  		array_push($errors, "Wrong Name or password ");
  	}
  }
}

	// initialize variables
	$name = "";
	$code = "";
	$price = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$code = $_POST['code'];
		$price = $_POST['price'];
		$imageURL = "\images/stereo.jpg";
		
		mysqli_query($connection, "INSERT INTO items (name, code, image, price) VALUES ('$name', '$code','$imageURL', '$price')"); 
		$_SESSION['message'] = "Product added!!!"; 
		header('location: admin/productsList.php');	
	}
	
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$code = $_POST['code'];
		$price = $_POST['price'];

		mysqli_query($connection, "UPDATE items SET name='$name', code='$code', price = '$price' WHERE id=$id");
		$_SESSION['message'] = "Products updated!"; 
		header('location: admin/productsList.php');
	}
	
		if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($connection, "DELETE FROM items WHERE id=$id");
		$_SESSION['message'] = "Product deleted!"; 
		header('location: productsList.php');
	}
	
		if (isset($_GET['deluser'])) {
		$id = $_GET['deluser'];
		mysqli_query($connection, "DELETE FROM users WHERE id=$id");
		$_SESSION['message'] = "Customer has been deleted!"; 
		header('location: userMan.php');
	}
	
?>