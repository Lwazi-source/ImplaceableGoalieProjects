<?php 

$MyD = mysqli_init();
mysqli_options($MyD,MYSQLI_OPT_LOCAL_INFILE, true);
$db=mysqli_connect('localhost','root','','TopTech');

//$selectDB = mysqli_select_db($db,'TopTech');

$sql1=  "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1";	

$sql2= "CREATE TABLE IF NOT EXISTS `items` (
  `id` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `costprice` double(15,2) NOT NULL,
  `quantity` int(50) NOT NULL,
  `sellprice` double(15,2) NOT NULL,
   `images`  blob,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1";

if(!mysqli_query($db,$sql1))
{
	echo " table users not created successfully </br>";
}
else{
	echo " </br>table users created.</br> " ;
}

if(!mysqli_query($db,$sql2))
{
	echo " table items not created successfully </br>";
}
else
{
	echo " </br>table items created.</br> " ;
}
$selectDB = mysqli_select_db($db,'TopTech');

$sql = "SELECT * FROM users";
$results = mysqli_query($db,$sql);

if ((mysqli_num_rows($results)) > 0)
{
    
}
else
{
	$load2 = mysqli_query($db,"LOAD DATA LOCAL INFILE 'userdata.txt' INTO TABLE users FIELDS TERMINATED BY ',' (id,firstname,lastname,email,password)");
	
    if($load2 !== FALSE)
    {
        echo "The data has been successfully loaded"."<br>";
    }
    else
    {
    echo "The data has not been loaded."."<br>";
    }
   
}
$sqlItems = "SELECT * FROM items";
$result = mysqli_query($db,$sqlItems);

if ((mysqli_num_rows($result)) > 0)
{
    
}
else
{  
	$load1 = mysqli_query($db,"LOAD DATA LOCAL INFILE 'items.txt' INTO TABLE items FIELDS TERMINATED BY ',' (description,costprice,quantity,sellprice,images)");
	
    if($load1 !== FALSE)
    {
        echo "The data has been successfully loaded"."<br>";
    }
    else
    {
		echo "The data has not been loaded."."<br>";
    }
}
	 
mysqli_close($db);

?>