<head><link rel="stylesheet" type="text/css" href="style2.css"/></head>
<body>
<br><br><center></center>
<?php
session_start();
$a=$_GET['list'];
$count=count($a);
$con=mysqli_connect('localhost','root','nettech','project');
$total=0;


?><h2><center>Your billing details are</center></h2>
<table align="center" bgcolor="#cococo"width="300">
<tr>
<td><font color="red">name</font></td>
<td><font color="red">price</font></td>
</tr>
<?php
for($i=0;$i<$count;$i++)
{
$total+=$a[$i];
$str="select name from menu where price='$a[$i]'";
$result=mysqli_query($con,$str);

$row=mysqli_fetch_array($result);

echo '<tr><td>'.$row[0].'</td>';    echo '<td>'.$a[$i].'<td></tr>';
}
echo '</table>';
if($total>2000)
{
$discount=$total*0.2;
$final=$total-$discount;
$vat=$final*0.13;
$topay=$final+$vat;
}
else
{
$discount=$total*0.1;
$final=$total-$discount;
$vat=$final*0.13;
$topay=$final+$vat;
}
echo '<br>';
echo '<table align="center" bgcolor="#cococo" width="300"><tr>';
echo '<tr><td>Total amount</td><td>'.$total.'</td></tr>';
echo '<tr><td>Discount</td><td>'.$discount.'</td></tr>';
echo '<tr><td>Deducted amount</td><td>'.$final.'</td></tr>';
echo '<tr><td>VAT amount</td><td>'.$vat.'</td></tr>';
echo '<tr><td>Final amount</td><td>'.$topay.'</td></tr>';

$_SESSION['cost']=$topay;


?>
<form action="confirm.php" method="get">
<tr><td></td><td><input class="but" type="submit" name="confirm" value="continue"></td></tr></table>