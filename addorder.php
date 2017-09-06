<?php
$id=$_GET['id'];
$name=$_SESSION['user'];
$itemname=$_GET['itemname'];
$price=$_GET['price'];

require "connection.php";
$str="insert into orders values('$name','$itemname,'$id','$price')";
$result=mysqli_query($con,$str);

 header("location:purchase.php");
?>
