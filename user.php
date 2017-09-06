<?php
session_start();
if(isset($_SESSION['user']))
{
$name=$_SESSION['user'];
require "connection.php";
?>
<html>
<head><title>User Page</title>
<link rel="stylesheet" type="text/css" href="style2.css" /></head>
<body>

<div id="wrap">
		<div id="header">
<h1>This is User's Area!</h1>
</div>
<div id="nav">
<center>
<table border="0">
<tr><td><img src="user.jpg" /></td>


<td><table><tr><td><a href="updateprofile.php">UpdateProfile<br /></a></td></tr>
<tr><td><a href="purchase.php">Purchase<br /></a></td></tr>

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