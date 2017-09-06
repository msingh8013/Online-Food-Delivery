<?php
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8">
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<div class="container">
	<section id="content">
<form action="" method="get">
<h1>Login Form</h1>
			<div>
<input type="text" placeholder="Username" name="name" required="" id="username"></div>
<div>
<input type="password" name="password"placeholder="Password" required="" id="password" >
</div>
			<div>
<input type="submit" name="submit" value="Login">
<div id="nav">
<a href="signup.php">Register</a>
</div>
</div>
</form></center>
</section>
</div>

</body>
</html>
<?php if(isset($_GET['submit']))
{
require "connection.php";
$uname=$_GET['name'];
$pass=$_GET['password'];
$str="select  name,password from record where name='$uname' and password='$pass'";
$result=mysqli_query($con,$str);
$row=mysqli_fetch_array($result);
if($row[0]=="admin" && $row[1]=="nettech")
	{
	$_SESSION['admin']=$row[0];
	header("location:admin.php");
	}
	else if($row[0] && $row[1]=="$pass")
	{
	$_SESSION['user']=$row[0];
	 
            
	 
	//header("location:user.php");
	}

	else
   {
   ?>
   <center>
   <p>User Does Not Exist!</p>
    <?php
	header("refresh:3;login.php");
   }

}
else if(isset($_GET['signup']))
{

	header("location:signup.php");


}
}
else if(isset($_SESSION['admin']))
 {
  header("location:admin.php");
  }
  
  else if(isset($_SESSION['user']))
  {
  
  $a=$_SESSION['user'];
	$con=mysqli_connect('localhost','root','nettech','project');
	$code=uniqid();
	$c=substr($code, -8);
	$_SESSION['otp'] = $c;
	echo $c;
	$str1="update record set otp='$c' where name='$a'";
	$result1=mysqli_query($con,$str1);
	echo $str1;
  header("location:otp.php");
  }
 // header("location:user.php");
 
  
?>