<?php 
include('connection.php');
include('order.php');
$oid=$_GET['order_id'];

$fs=mysqli_query($con,"select * from allbookings where bid='$oid'");
$sec=mysqli_num_rows($fs);
if(($sec) < 0)
{
$del=mysqli_query($con,"delete from bookedrooms where bookingid='$oid'");
$q=mysqli_query($con,"delete from  allbookings where bid='$oid' ");

if($q)
{
header('location:order.php');
}
}
else
{
			echo '<script>alert(" its confirmed booking...not able to cancel")</script>'; 
}
?>