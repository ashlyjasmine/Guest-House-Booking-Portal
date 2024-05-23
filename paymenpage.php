<?php 
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];

$oid=$_GET['order_id'];
$q=mysqli_query($con,"select * from  room_booking_details where id='$oid' ");
if($q)
{
   $p=mysqli_fetch_array($q);
   $rm=$p['roomno'];
   $get=mysqli_query($con," select * from rooms where room_no='$rm'");
   $put=mysqli_fetch_array($get);
   $rmid=$put['room_id'];
   $set=mysqli_query($con,"insert into bookedrooms(roomid,roomno) values('$rmid','$rm')");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Hotel.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin-top:50px;">
  <?php
  include('Menu Bar.php');
  ?>
  
  
  
  
  
  
  
  
  <?php
include('Footer.php')
?>
</body>
</html>