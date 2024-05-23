

  <?php
/*include('Menu Bar.php');
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];*/




include('confirm2.php');

include('connection.php');
$oid=$_GET['order_id'];
if(isset($placeorder))
{

   $q=mysqli_query($con,"select * from  allbookings where bid='$oid' ");
    $n=mysqli_num_rows($q);
    if($n > 0)
    {
        echo'<script>alert("this a confirmed already")</script>';
		echo "<script language='javascript'>window.location='order.php';</script>";
    }


    else
    {
	
	
	   $sel=mysqli_query($con,"select * from room_booking_details where id='$oid'"); 
       $p=mysqli_fetch_array($sel);
       $rm=$p['roomno'];
       $ad=$p['check_in_date'];
	   $bd=$p['check_out_date'];
	   $nm=$p['name'];
	   $ofty=$p['officertypr'];
	   $pup=$p['purpose'];
	   $rmt=$p['room_type'];
	   
	   
	   $pay=mysqli_query($con,"select * from payment_details where officer_type='$ofty' and purpose='$pup' and roomtype='$rmt'");
	   $amou=mysqli_fetch_array($pay);
	   $amount=$amou['room_price'];
	   
       $get=mysqli_query($con," select * from rooms where room_no='$rm'");
       $put=mysqli_fetch_array($get);
       $rmid=$put['room_id'];
	   
       $set=mysqli_query($con,"insert into bookedrooms(roomid,roomno,bookingid) values('$rmid','$rm','$oid')");
       $st=(($oid) * 43) ;//autogenerate
	   $ins=mysqli_query($con,"insert into allbookings(bid,name,email,roomno,indate,outdate,challan,roomcharge) values('$oid','$nm','$eid','$rm','$ad','$bd','$st','$amount')");
	    //$dl=mysqli_query($con,"delete from room_booking_retails where id='$oid'");//delete from roombooking details
		if($ins){
	  	echo '<script>alert(" booking success<br/>you can download confirmation page with challan number<br/>thnk you...")</script>';}
        echo "<script language='javascript'>window.location='order.php';</script>";
    }
}

?>


<style>

.container {
    padding-left: 10px;
    padding-right: 15px;
	justify-items:center;
  }
  
  .box-wrapper {
    width: 400px;
    margin: 0 auto;
  }
  
  .box {
    background-color: rgb(240, 240, 240);
    border-radius: 3px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
  }
  .box.box-border {
    box-shadow: none;
    border: 1px solid #f2f2f2;
  }
  .box .box-body {
    padding: 15px;
  }
	section {
    padding-top: 0px;
    padding-bottom: 0px;
  }
  section.first {
    padding-top: 120px;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -moz-transition: all 0.5s;
  }
  body{
	  width: 100%;
 }


</style>

	
	
		
			
	
			<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> </h4></center><br>
							<form method="post"  enctype="multipart/form-data">
								<center> <h5 style="font-family: Noto Sans;"> </h5><h4 style="font-family: Noto Sans;">confirmation</h4></center><br>
								<div class="form-group">
									<label class="fw">
										Your challan is generated ...for placing order confirmation click the button
									</label>
									
								</div> 
								<div class="form-group text-right">
									<input type="submit" class="btn btn-primary btn-block" name="placeorder" value="place order">
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	</center>
	</center>
	
	
	</body>
<?php //include('Footer.php');?>

</html>




