<?php 
include('../connection.php');
$oid=$_GET['booking_id'];
$q=mysqli_query($con,"delete from  blockedusers where id='$oid' ");
if($q)
{
	echo '<script>alert(" user unblocked successfully")</script>'; 
	
	//header('location:dashboard.php?option=user_registration');
}

?>