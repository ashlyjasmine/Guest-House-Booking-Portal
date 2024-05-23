<?php 
include('../connection.php');
$oid=$_GET['booking_id'];
$fs=mysqli_query($con,"select * from blockedusers where id='$oid'");

if(mysqli_num_rows($fs))
{
	echo '<script>alert("already blocked user")</script>';
	//header('location:dashboard.php?option=user_registration');
}
else
{
	

	/*$q=mysqli_query($con,"delete from  room_booking_details where id='$oid' ");
if($q)
{
header('location:dashboard.php?option=user_registration');
}*/
$p=mysqli_query($con,"select * from create_account where id='$oid'");
$res=mysqli_fetch_assoc($p);
$name=$res['name'];
$mail=$res['email'];
$s=mysqli_query($con,"insert into blockedusers(id,name,email)values('$oid','$name','$mail')");
   if($s)
    {
//header('location:dashboard.php?option=user_registration');
    echo '<script>alert(" user blocked")</script>';
	//header('location:dashboard.php?option=user_registration');
   }
	
}
?>