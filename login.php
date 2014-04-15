<?php
$username = $_POST["name"];
$password = $_POST["password"];
$count = $_COOKIE["count"] ? $_COOKIE["count"] : 0;
// do authentication here

setcookie("mycookie_name", $username);
setcookie("count", ++$count);

?>
<html>
<head>
</head>
<body>
<?php
	$con = mysql_connect("localhost","user","");
	if (!$con)
  	{
 		 die('Could not connect: ' . mysql_error());
  	}
	if (mysql_query("CREATE DATABASE my_db",$con))
  	{
  		echo "Database created";
  	}
		else
  	{
  		echo "Error creating database: " . mysql_error();
  	}
	mysql_select_db("my_db", $con);
	$sql = "CREATE TABLE Users 
	(
		username varchar(15),
		userpassword varchar(15),
	)";
	mysql_query($sql,$con);
	$result = mysql_query("SELECT * FROM Users");

 	$flag = false;
	while($row = mysql_fetch_array($result))
  	{
		if ($row['name'] == $_POST["name"]  &&   $row['password'] == $_POST["pwd"])
			$flag = true;
  	}
	
	if ($flag==true)
	{
		echo "Welcome"."  ".$_POST["name"]; 
	}
	else
	{
		echo error;
	}

	mysql_close($con);
?>
<a href="logout.php">logout</a>
</body>
</html>
