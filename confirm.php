                

<?php 
session_start();
extract($_REQUEST);
error_reporting(1);

include('Menu Bar.php');
include('connection.php');





if($eid=="")
{
header('location:Login.php');
}

$bid=$SESSION['bid'];
$ok=mysqli_query($con,"select * from room_booking_details where id='$bid'");
$st=mysqli_fetch_array($ok);
$sqp=mysqli_query($con,"select * from create_account where email='$eid'");
$rep=mysqli_fetch_assoc($sqp);
$oftype=$rep['category'];
$purp=$st['purpose'];
$rm=$st['room_type'];

$se=mysqli_query($con,"select * from payment_details where officer_type='$oftype' AND purpose='$purp' AND room_type='$rm' ");
$res=mysqli_fetch_assoc($se);
$pr=$res['room_price'];


if(isset($cancel))
{
	
	header('location:order.php');
}
if(isset($proceed))
{
	 //confirmatin msg
  	header('location:payment_page.php');
    	
}

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
  
  <div class="container-fluid text-center"id="primary"><!--Primary Id-->
  <h1>[ CONFIRMATION PAGE]</h1><br>
  <div class="container">
    <div class="row">
  <h3> Your Booking Details</h3>
  
  <form class="form-horizontal" method="post" action="">
       <!--<div class="col-sm-6">-->
         <div class="form-group">
           <div class="row">
              <div class="control-label col-sm-4"><h4> Room Type:</h4></div>
                <div class="col-sm-8">
                 <input type="text" value="<?php echo $st['room_type']; ?>"  class="form-control" name="room" >
          </div>
        </div>
      </div>
	  </div>
        <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>from :</h4></div>
                <div class="col-sm-7">
                 <input type="text" value="<?php echo $st['check_in_date']; ?>"  class="form-control" name="in"required>
          </div>
        </div>
		</div>
        </div>
		
		<div class="col-sm-6">
        <div class="form-group">
        <div class="row">
		<div class="control-label col-sm-6"><h4> To :</h4></div>
        <div class="col-sm-8">
           <input type="text" value="<?php echo $st['check_out_date']; ?>"  class="form-control" name="out" required>
        </div>
        </div>
        </div>
		</div>
	  
        <div class="col-sm-6">
        <div class="form-group">
        <div class="row">
              <div class="control-label col-sm-7"><h4> Total price:</h4></div>
                <div class="col-sm-9">
                 <input type="text" value="<?php echo $res['room_price']; ?>"  class="form-control" name="price"required>
              </div>
             </div>
        </div>
		</div>
	    </div>
	    <div>
	    <div class="control-label col-sm-8">
		<input type="submit" name="confirm" value="proceed" >
	    
	    
		<input type="submit" name="cancel"  value="cancel booking">
	    </div>
	  </div>	
	  </form><br>
	  
	  
  <?php
  
include('Footer.php')

?>
</body>
</html>