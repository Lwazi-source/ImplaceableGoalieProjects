<?php


$selectDB = mysqli_select_db($connection,$database);

$sql1 = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";



$sql2 = "CREATE TABLE IF NOT EXISTS `items` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)";

if (!mysqli_query($connection, $sql1)) {
    echo "Tables created successfully"."<br>";
} else {
    echo mysqli_error($connection);
}

if (!mysqli_query($connection, $sql2)) {
    echo "Tables created successfully"."<br>";
} else {
    echo mysqli_error($connection);
}

$selectDB = mysqli_select_db($connection,$database);

$sql = "SELECT * FROM items";
$result = mysqli_query($connection,$sql);

if ((mysqli_num_rows($result)) > 0)
{
    
}
else
{
    $load= mysqli_query($connection,"LOAD DATA LOCAL INFILE 'items.txt' INTO TABLE items FIELDS TERMINATED BY ',' (name, code, image ,price)");

	
    if($load !== FALSE)
    {
        echo "The data has been successfully loaded"."<br>";
    }
    else
    {
    echo "The data has not been loaded."."<br>";
    }

    
}

$sql = "SELECT * FROM users";
$result = mysqli_query($connection,$sql);

if ((mysqli_num_rows($result)) > 0)
{
    
}
else
{
	$load= mysqli_query($connection,"LOAD DATA LOCAL INFILE 'UserData.txt' INTO TABLE users FIELDS TERMINATED BY ',' (password, username, email)");
	
    if($load !== FALSE)
    {
        echo "The data has been successfully loaded"."<br>";
    }
    else
    {
    echo "The data has not been loaded."."<br>";
    }
   
}

//mysqli_close($connection);

?>



