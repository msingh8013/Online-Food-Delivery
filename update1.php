
<?php
session_start();
	$id=$_SESSION['item'];
if(isset($_SESSION['admin']))
{
require "connection.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Item</title>
<link rel="stylesheet" type="text/css" href="style2.css" />
</head>

<body>
<div id="wrap">
		<div id="header">
<h1>Update an Item!</h1></div>
<div id="nav">
<center><?php
$str="select * from menu where id='$id'";
$result= mysqli_query($con,$str);
		$row=mysqli_fetch_array($result);
		?>
		<form action="" method="GET">
		Name:<input type="text" name="name" value="<?php echo $row[0];?>" />
		Price:<input type="number" name="price" value="<?php echo $row[1];?>" />
		ItemId:<input type="number" name="id" value="<?php echo $row[2];?>" readonly />
		<input type="submit" value="Update" name="update" />
		</form>
		</div>
	<center>
<a href="update.php">Go Back</a></center>

		
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
$name=$_GET['name'];
$price=$_GET['price'];
$id=$_GET['id'];
$str1="update menu set name='$name', price='$price' where id='$id'";
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
