<?php 
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
$bid=$_GET['orderid'];
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
<div class="container-fluid"><!--Primary Id-->
 <h1 class="text-center text-primary"></br>Booking Confirmation</h1><br>
  <div class="container">
    <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive"style="height:150px;">
               <tr>
                    <th>Name</th>
                    <th>Email</th>

                    
                    <th>Room Type</th>
                    <th>Check In Date</th>
                    <th>Check In Time</th>
                    <th>Check Out Date</th>
                    <th>Occupancy</th>
					<th>Room No</th>
					<th>Room Price</th>
					<th>Cancel</th>
					<th>Proceed</th>
					
               </tr>

               <?php 
$sql= mysqli_query($con,"select * from room_booking_details where email='$eid' "); 
while($result=mysqli_fetch_assoc($sql))
{
	$t=$result['officertype'];$s=$result['room_type'];$q=$result['purpose'];
	$pay=mysqli_query($con,"select * from payment_details where officer_type='$t' and purpose='$q'  ");
	$pr=mysqli_fetch_assoc($pay);
$oid=$result['id'];
echo "<tr>";
echo "<td>".$result['name']."</td>";
echo "<td>".$result['email']."</td>";


echo "<td>".$result['room_type']."</td>";
echo "<td>".$result['check_in_date']."</td>";
echo "<td>".$result['check_in_time']."</td>";
echo "<td>".$result['check_out_date']."</td>";
echo "<td>".$result['Occupancy']."</td>";
echo "<td>".$result['roomno']."</td>";
echo "<td>".$pr['room_price']."</td>";
echo "<td><a href='cancelcon.php?order_id=$oid' style='color:Red'>Cancel</a></td>";
echo "<td><a href='paymentpage.php?order_id=$oid' style='color:Red'>Proceed</a></td>";
echo "</tr>";
}                         
               ?> 
          </table></br>

    </div>
    </div>
  </div>
<?php include('Footer.php');
?>
</body>
</html>
