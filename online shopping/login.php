<?php 
//session_start();
include('dbconn.php');
include('tblcreate.php');
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type"text/css"/>
  <title>Top-Tech Login</title>
</head>
<body>
<center>
  <div class="header">
  	<h2>Top Tech</h2>
  </div>
<div id="main">
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<table>
        <div class="inputs">
        <tr>
  		    <td><label>Name </label></td>
  		    <td><input type="text" name="username" ></td>
        </tr>
        </div>
		
		 <div class="inputs">
        <tr>
  		    <td><label>Password</label></td>
  		    <td><input type="password" name="password" ></td>
        </tr>
        </div>
		
		 <div class="inputs">
        <tr>
            <td></td>
  		    <td><button type="submit" class="btn" name="login_user">Login</button></td>
        </tr>
		</div>
    </table>
  	<p>
  		Don't have an account yet? <a style=" color:red;"; href="register.php">Register Now </a>
  	</p>
  </form>
    </div>
  <div class="header">
 <p>&copy;Copyright - Divergent Tech</p>
  </div>
  
 </center>
 
</body>

</html>