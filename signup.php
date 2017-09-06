<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style1.css" />
</head>

<body>
<div id="wrap">
		<div id="header">
			<h1>This is Sign up page!</h1>	
		</div>
		<div id="nav">

<center>
<form action"" method="GET">

<fieldset>
					<legend>Sign Up</legend>
					<table border="0">
<tr><td>
Name:</td><td><input type="text" name="name" required /></td></tr>
<tr><td>Email:</td><td><input type="email" name="email" required /></td></tr>
<tr><td>Password:</td><td><input type="password" name="pwd1" required /></td></tr>
<tr><td>Password Again:</td><td><input type="password" name="pwd2" required /></td></tr>
</table>

<br /><br />
<input type="submit" value="Submit" name="submit" /><a href="login.php">Go Back</a>  
</form>
</fieldset>
</div>
<div id="footer">
			<p>&copy; Nettech</p>
		</div>
		</div>
</center>

</body>
</html>
<?php
if(isset($_GET['submit']))
{
require "connection.php";
$name=$_GET['name'];
$email=$_GET['email'];
$pwd1=$_GET['pwd1'];
$pwd2=$_GET['pwd2'];
$type="user";
if($pwd1==$pwd2)
{
$password=$pwd1;
$str="insert into record (name,email,password,type)values('$name','$email','$password','$type')";
$result=mysqli_query($con,$str);
echo "Sign Up completed!";
header("refresh:3;login.php");

}

else
{
echo "Password Didnt match! Retry!";
header("refresh:3;signup.php");

}
}

?>