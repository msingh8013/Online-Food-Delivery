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
<title>Add Item</title>
<link rel="stylesheet" type="text/css" href="style2.css" />
</head>
<body>
<div id="wrap">
		<div id="header">
<h1>Add a new Item!</h1></div>
<div id="nav">
<center>

<form action="" method="post" enctype="multipart/form-data" name="jlt">
<table>

<tr>
<td>Name<td>
<td><input type="text" name="name" required><td>
</tr>

<tr>
<td>Price<td>
<td><input type="number" name="price" required><td>
</tr>

<tr>
<td>ItemID<td>
<td><input type="number" name="id" required><td>
</tr>
<tr>
<td>Image</td>
<td><input type="file" name="file"></td>
</tr>
</table>
<input type="submit" name="add" value="Add"><a href="admin.php">Go back</a>


</form>

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
if(isset($_POST['add']))
{
$con=mysqli_connect('localhost','root','nettech','project');
				$id=$_POST['id'];
				$name=$_POST['name'];
				$price=$_POST['price'];
				$file=$_POST['file'];
				echo $file;
				$allowedExts = array("jpg", "jpeg", "gif", "png","JPG","PNG","GIF");
				$extension = end(explode(".", $_FILES["file"]["name"]));
				if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/JPG")
				|| ($_FILES["file"]["type"] == "image/PNG")
				|| ($_FILES["file"]["type"] == "image/png")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/GIF")
				|| ($_FILES["file"]["type"] == "image/pjpeg"))
				&& ($_FILES["file"]["size"] < 6000000)
				&& in_array($extension, $allowedExts))
					{
						if ($_FILES["file"]["error"] > 0)
						{
							echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
						}
						else
						{
							$photo=$name.".".$extension;
							if (file_exists("photos/" . $photo))
							{
								echo $photo. " already exists. ";
							}
							else
							{
								move_uploaded_file($_FILES["file"]["tmp_name"], "photos/".$photo);
								echo $photo." uploaded in the system";
								$string2="insert into menu(id,name,price,image) values('$id','$name','$price','$photo')";
								$answer2=mysqli_query($con,$string2);
							}
						}
					}
					else
					{
						echo "Invalid photo file";
					}
			
			}
		
			?>
		</center>
	</body>
</html>
<?php }
else{
header("location:add.php");}
ob_flush();
 ?>