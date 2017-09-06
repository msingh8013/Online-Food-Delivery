
<?php
session_start();
if(isset($_SESSION['admin']))
{
require "connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update page</title>
<link rel="stylesheet" type="text/css" href="style2.css" />
</head>

<body>
<div id="wrap">
		<div id="header">
<h1>Update an Item!</h1></div>
<div id="nav">
<center>
<form action="" method="get">
Enter Id:<input type="number" name="id" required />
<input type="submit" name="search" value="Search" />
</form>
<a href="admin.php">Go back</a>
</div>
<div id="footer">
			<p>&copy; Nettech</p>
		</div>
		</div>
</center>

</body>
</html>

<?php
require "connection.php";
if(isset($_GET['search']))
{
$id=$_GET['id'];

$str="select id from menu where id='$id'";
	
	$result= mysqli_query($con,$str);
		$row=mysqli_fetch_array($result);
	
	if($row[0])
	{
		
		
		
		$_SESSION['item']=$id;

		header("location:update1.php");
	}
	else
	{
		echo "Not found";
		header("location:update.php");	
	}

}
}
else
{
header("location:login.php");
}

