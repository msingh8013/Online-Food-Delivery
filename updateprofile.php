<?php
session_start();
if(isset($_SESSION['user']))
{
require "connection.php";
$name=$_SESSION['user'];
echo $name;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>UpdateProfile</title>
<link rel="stylesheet" type="text/css" href="style2.css" />
</head>

<body>


<div id="wrap">
		<div id="header">
<h1>Update Profile</h1></div>
<div id="nav">
<center><?php
$str="select name,email,address,city,pincode,state from record where name='$name'";
$result= mysqli_query($con,$str);
		$row=mysqli_fetch_array($result);
		?>
		<form action="" method="GET">
		<table border="0">
		<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $row[0];?>" readonly /></td></tr>
		<tr><td>Email:</td><td><input type="email" name="email" value="<?php echo $row[1];?>" /></td></tr>
		<tr><td>Address:</td><td><input type="text" name="address" value="<?php echo $row[2];?>" /></td></tr>
		<tr><td>City:</td><td><input type="text" name="city" value="<?php echo $row[3];?>" /></td></tr>
		<tr><td>Pincode:</td><td><input type="number" name="pincode" value="<?php echo $row[4];?>" /></td></tr>
		<tr><td>State:</td><td><input type="text" name="state" value="<?php echo $row[5];?>" /></td></tr>
</table>
		<input type="submit" value="Update" name="update" /><br />
		</form>
		</div>
	<center>
<a href="user.php">Go Back</a></center>

		
<div id="footer">
			<p>&copy; Nettech</p>
		</div>
		</div>
</center>
	
		

</body>
</html>

<?php
require "connection.php";

if(isset($_GET['update']))
{

$email=$_GET['email'];
$address=$_GET['address'];
$city=$_GET['city'];
$pincode=$_GET['pincode'];
$state=$_GET['state'];

$str1="update record set  address='$address', email='$email', city='$city', pincode='$pincode', state='$state' where name='$name'";
$result1=mysqli_query($con,$str1);
?><center>Record Updated!</center>
<?php
}
}
else
{

header("location:login.php");

}
?>