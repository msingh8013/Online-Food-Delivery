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
<title>ViewAll</title>
<link rel="stylesheet" type="text/css" href="style2.css" />

</head>

<body>
<div id="wrap">
		<div id="header">
<h1>Menu</h1></div>
<div id="nav">
<center>
<?php
$str="select * from menu";
$result= mysqli_query($con,$str);
		?>
		<table border="1">
		<tr><th>Name</th><th>Price</th><th>Item Id</th><th>Delete</th></tr>
		<?php
		$i=1;
		while($row=mysqli_fetch_array($result))
		{?>
			<tr><td><?php echo $row[0];?></td><td><?php echo $row[1];?></td><td><?php echo $row[2];?></td><td>
		<?php
		echo '<a href="delete.php?name='.$row[0].'&id='.$row[2].'"><img src="delete.png"></a>';
		
?>
</td>

</tr>
<?php
$i++;	
		}
		?>
		</table>
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
}
else
{

header("location:login.php");
}
