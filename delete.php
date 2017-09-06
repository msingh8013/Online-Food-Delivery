<?php
$id=$_GET['id'];
$name=$_GET['name'];
require "connection.php";
$str="select * from menu where id='$id'";
$result=mysqli_query($con,$str);
if(mysqli_num_rows($result)>0)
{
 echo "Item Exist";
 $str1="delete from menu where id='$id'";
 echo $str1;
 $result1=mysqli_query($con,$str1);
 header("location:view.php");
}
else
{
 echo "Item Doesnt Exists";
 header("location:view.php");
}
?>