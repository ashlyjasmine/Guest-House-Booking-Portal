<?php 
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
extract($_REQUEST);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online GuestHouse.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body style="margin-top:50px;">
  <?php
  include('Menu Bar.php');
  ?>
 <?php
     $sql= mysqli_query($con,"select * from create_account where email='$eid' "); 
     $result=mysqli_fetch_assoc($sql);
	 
	 $q=mysqli_query($con,"select * from payment_details where officer_type=(select category from create_account where email='$eid')and room_type=(select room_type from room_booking_details where email='$eid')and purpose=(select purpose from room_booking_details where email='&eid')  ");
	 $r=mysqli_fetch_assoc($q);
	// echo $r['room_price'];
?>
<div class="container-fluid"id="primary"><!--Primary Id-->
  <center><h1 style="background-color:#ed2553;border-radius:50px;font-family: 'Baloo Bhai', cursive;box-shadow:5px 5px 9px blue;text-shadow:2px 2px#000;display:inline-block;">User Profile</h1></center><br>
  <div class="container">
    <div class="row">
	<center><?php  echo $msg; ?></center>
     <form class="form-horizontal" method="post">
       <div class="col-sm-6">
          <div class="form-group">

    
	<?php echo $result['email']; 
	  
	echo $r['room_price'];
	?>
	
	
	
<!--User Profile Update Query-->
        </form>
      </div>
   </div>
 </div>
 
 
<?php
include('Footer.php')
?>
</body>
</html>
