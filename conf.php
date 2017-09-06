<?php
session_start();
$con=mysqli_connect('localhost','root','nettech','project');

$b=$_SESSION['user'];
$c=$_SESSION['cost'];

$str="select name,address,city,pincode,state from record where name='$b'";

$result=mysqli_query($con,$str);
$row=mysqli_fetch_array($result);
?>
<head><link rel="stylesheet" type="text/css" href="style2.css"/></head>

<body>
<body>
<div id="wrap">
		<div id="header">
<h1>Your Details!</h1>
</div>
<div id="nav">
<center>

<form action="final.php" method="get">

<table align="center" width="200" bgcolor="#c0c0c0">
<tr>
<td><font color="red">Name</font></td>
<td><?php echo $row[0];?></td>
</tr>

<tr>
<td><font color="red">Address</font></td>
<td><?php echo $row[1];?></td>
</tr>

<tr>
<td><font color="red">City</font></td>
<td><?php echo $row[2];?></td>
</tr>

<tr>
<td><font color="red">Pin</font></td>
<td><?php echo $row[3];?></td>
</tr>

<tr>
<td><font color="red">State</font></td>
<td><?php echo $row[4];?></td>
</tr>

<tr>
<td><font color="red">Total Amount</font></td>
<td><?php echo $c;?></td>
</tr>

<tr>
<td></td>
<td><input class="but" type="submit" name="final" value="confirm"></td>
</tr>
</table>
</div>
</form>
<div id="footer">
			<p>&copy; Nettech</p>
		</div>
		</div>
</body>
</html>