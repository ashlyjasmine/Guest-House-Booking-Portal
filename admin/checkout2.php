


<?php 
include('dashboard.php');
include('../connection.php');
$oid=$_GET['booking_id'];
$qe=mysqli_query($con,"select * from bookedrooms where bookingid='$oid' ");
if($qe)
{
$q=mysqli_query($con,"delete from  bookedrooms where bookingid='$oid' ");
if($q)
{
	echo '<script>alert(" user CheckedOut successfully")</script>'; 
	
	//header('location:dashboard.php?option=user_registration');
}
}
else
{
		echo '<script>alert(" already CheckedOut")</script>'; 
}

?>