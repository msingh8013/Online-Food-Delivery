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
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="style2.css" />
</head>

<body>
<div id="wrap">
		<div id="header">
<h1>This is Admin Page!</h1>
</div>
<div id="nav">
<center>
<table border="0">
<tr><td><img src="admin.png" /></td>


<td><table><tr><td><a href="add.php">Add<br /></a></td></tr>
<tr><td><a href="view.php">ViewAll<br /></a></td></tr>
<tr><td><a href="update.php">Update<br /></a></td></tr>
</table>
</td>
</tr>
</table>
</center>
</div>

<br />
<form action="" method="get">
<center>
<input type="submit" value="Logout" name="logout" />
</form>
</center>
<div id="footer">
			<p>&copy; Nettech</p>
		</div>
		</div>



</body>
</html>
<?php
if(isset($_GET['logout']))
{
header("location:logout.php");
}

}
else
{
	header("location:login.php");
}
?>