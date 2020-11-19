<?php include('dbconn.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Top-Tech Registration</title>
  <link href="css/style.css" rel="stylesheet" type"text/css"/>
</head>
<body>
<center>
  <div class="header">
  	<h2>Top Tech</h2>
  </div>
<div id="main">
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<table>
         <tr>
  	         <td><label>Name</label></td>
  	         <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
         </tr>
         <tr>
  	         <td><label>Email</label></td>
  	         <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
         </tr>
         <tr>
  	         <td><label>Password</label></td>
  	         <td><input type="password" name="password_1"></td>
         </tr>
        
         <tr>
  	         <td><label>Confirm password</label></td>
  	         <td><input type="password" name="password_2"></td>
         </tr>
         <tr>
             <td></td>
  	         <td><button type="submit" class="btn" name="reg_user">Register</button></td>
         </tr>
      </table>
  	<p>
  		Already a member? <a style=" color:red;"; href="login.php">Sign in</a>
  	</p>
  </form>
</div>
<div class="header">
 <p>&copy;Copyright - Divergent Tech</p>
  </div>
 </center>
 
</body>
</html>