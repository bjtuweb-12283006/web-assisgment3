<html>
<head>
</head>
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
?>
<p>please input your name</p>
<form >Name : <input type="text" name="name"/> </form>
<?php
	$name=trim($_GET['name']);
 	$sqls="select * from Users where username='".$name."'"; 
	$result=mysql_query($sqls,$con);
	$info=mysql_fetch_array($result);
	$flag=0;
	if($info==true) 
		echo error;  
	else
	{
		$flag=1;
		echo OK;
	}
?>
<p>please input your password</p>
<form>Password :<input type="password" name="password"/></form> 
<?php
	$password=trim($_GET['password']);
?>
<p>please reput your password</p>
<form>Password :<input type="password" name="repassword"/></form>
<?php
	$repassword=trim($_GET['repassword']);
	if(($password==$repassword)&&$flag==1)
	{
		mysql_query("INSERT INTO Users (username, userpassword) 
		VALUES ($name, $password)");
	}
		mysql_close($con);
?>
<p><a href="index.php">finish & return</a></p>
<body>
</body>
</html>