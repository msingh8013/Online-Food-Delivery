<?php
session_start();
if(isset($_SESSION['user']))
{
$name=$_SESSION['user'];

$con=mysqli_connect('localhost','root','nettech','project');
?><head><link rel="stylesheet" type="text/css" href="style2.css"/></head>
<body>
<div id="wrap">
		<div id="header">
<h1>Enter Details</h1>
</div>
<div id="nav">
<form action="" method="get">
<table align="center">
<tr><td>Name:</td><td><input class="textbox" type="text" name="name"></td></tr>
<tr><td>Email:</td><td><input class="textbox" type="email" name="email"></td></tr>
<tr><td>Address:</td><td><input class="textbox" type="text" name="address"></td></tr>
<tr><td>City:</td><td><input class="textbox" type="text" name="city"></td></tr>
<tr><td>Pincode:</td><td><input class="textbox" type="number" name="pin"></td></tr>
<tr><td>State:</td><td><input class="textbox" type="text" name="state"></td></tr>
<tr><td></td>
<td><input class="but" type="submit" name="update" value="save"></td></tr></table>
</form>
</div>
</div>
<div id="footer">
			<p>&copy; Nettech</p>
		</div>
		</div>
</body>
</html>

<?php
if(isset($_GET['update']))
{
$b=$_SESSION['user'];
$name=$_GET['name'];
$address=$_GET['address'];
$email=$_GET['email'];
$city=$_GET['city'];
$pincode=$_GET['pin'];
$state=$_GET['state'];
echo $name;
$str="update record set address='$address',email='$email',city='$city',pincode='$pincode',state='$state' where name='$b';";
$result=mysqli_query($con,$str);
echo $str;
echo "Updating";
header("refresh:3;conf.php");
}
}
else
{
header("location:login.php");
}

?>