<head><link rel="stylesheet" type="text/css" href="style2.css"/></head>
<body>
<br><br><center></center>
<?php
session_start();
$con=mysqli_connect('localhost','root','nettech','project');
$str="select name,price from menu";
$result=mysqli_query($con,$str);

$str1="select count(*) from menu";
$result1=mysqli_query($con,$str1);
$row1=mysqli_fetch_array($result1);?>

<br><br><center><h2><font color="blue">Add To cart</font></h2></center><br>

<?php
echo '<form action="bill.php" method="get">';
echo '<table align="center" bgcolor="#C0C0C0 " width="400" height="200">
<tr>
<td></td>
<td><font color="red">S.No</font></td>
<td><font color="red">Item Name</font></td>
<td><font color="red">Price</font></td>
<td><font color="red">Add</font></td>
<td><font color="red">Delete</font></td>

</tr>';
for($i=0;$i<$row1[0];$i++)
{
$row=mysqli_fetch_array($result);
echo '<tr>
<td><input type="checkbox" name="list[]" value="'.$row[1].'"></td>';
echo '<td><font color="blue">'.$i.'</td>';
echo '<td><font color="blue">'.$row[0].'</font></td>';
echo '<td><font color="blue">'.$row[1].'</font></td>';



echo '</tr>';
}
echo '<tr><td></td><td></td><td><input class="but" type="submit" name="submit" value="generate"></td><td></td>
</table></form>';


?>