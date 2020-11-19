<?php
	
	 SESSION_START();
	 $firstname ="";
	 $lastname="";
     $email="";
	 $password="";  
	 $errors=array();
	 
	
//if you wanna create a database automatically,dont include it in db.

 $db = mysqli_connect('localhost','root','','');
 
//database connection
	if (!$db)
	{
    echo (" " . mysqli_connect_error());
	}
	
//create the database
	$sql = 'CREATE DATABASE TopTech';
	
	if(mysqli_query($db,$sql))
	{
		echo "database has successfully been created";
	}
	else
	{
		echo "" . mysqli_error($db);
	}
	
	
	//mysqli_close($db);
	
	//if the session or user logs out this happens.
	if(isset($_GET['logout']))
	{
		SESSION_DESTROY();
		unset($_SESSION['firstname']);
		header('location:index.php');	
	}
	
	
?>