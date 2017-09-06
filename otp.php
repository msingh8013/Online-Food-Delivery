<?php
session_start();
$con=mysqli_connect('localhost','root','nettech','project');
	echo "your otp".$_SESSION['otp'];
if(isset($_SESSION['user']))
{
?>
<head><link rel="stylesheet" type="text/css" href="style2.css"/></head>
<body>
<body>
<div id="wrap">
		<div id="header">
			<h1>Enter your OTP</h1>	
		</div>
		<div id="nav">

<form action="" method="get">
<input class="textbox" type="password" name="otp1">
<input type="submit" name="confirm" value="confirm" />

</form></center>
</div>
<div id="footer">
			<p>&copy; Nettech</p>
		</div>
		</div>
<?php
if(isset($_GET['confirm']))
{
$otp1=$_GET['otp1'];
$a=$_SESSION['user'];
$b=$_SESSION['otp'];

/*$str="select otp from login where name='$a'";
$result=mysqli_query($con,$str);
$row=mysqli_fetch_array($result);*/
if($otp1==$b)
{
	echo "welcome $a";
	$str2="update record set otp='$code' where name='$a'";
	$result2=mysqli_query($con,$str2);
	header("location:user.php");
}
else
{
echo "try again wrong otp!!";
header("refresh:1;login.php");
}
}
}
else
{
echo "try again";
}
?>