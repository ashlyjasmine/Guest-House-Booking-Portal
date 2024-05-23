<?php 

include('Menu Bar.php');
include('connection.php');
if($eid=="")
{
header('location:Login.php');
}
$sql= mysqli_query($con,"select * from create_account where email='$eid' "); 
$result=mysqli_fetch_assoc($sql);

extract($_REQUEST);
error_reporting(1);


if (isset($savedata))
{
   // $rmt=$_POST['room_type'];
	//$vst=$_POST['visit_type'];
	
	$avail=mysqli_query($con,"select * from rooms where type='$room_type' and status='t' and room_id NOT IN (select roomid from bookedrooms) ");
	$re=mysqli_fetch_assoc($avail);
	$rmno=$re['room_no'];
	
	if(($re) > 0)
	{
		
		$ins=mysqli_query($con,"insert into room_booking_details(name,email,phone,officertype,purpose,room_type,roomno,check_in_date,check_in_time,check_out_date,Occupancy) values('$name','$email','$phone','$officer_type','$visit_type','$room_type','$rmno','$cdate','$ctime','$codate','$Occupancy') ");
		$sn=mysqli_fetch_array($ins);
		$bid=$sn['id'];
		 header('location:confirm2.php');

		
		
	}
	else
	{
		
        echo '<script>alert(" no availability")</script>';
	}
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online guesthouse.com</title>
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
<div class="container-fluid text-center"id="primary"><!--Primary Id-->
  <h1> BOOKING FORM </h1><br>
  <div class="container" id="pk">
    <div class="row">
      <?php echo @$msg; ?>
      <!--Form Containe Start Here-->
     <form class="form-horizontal" method="post" >
       <div class="col-sm-6">
         <div class="form-group">
           <div class="row">
              <div class="control-label col-sm-4"><h4> Name :</h4></div>
                <div class="col-sm-8">
                 <input type="text" value="<?php echo $result['name']; ?>"  class="form-control" name="name" placeholder="Enter Your Frist Name"required>
          </div>
        </div>
      </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Email :</h4></div>
          <div class="col-sm-8">
              <input type="email" value="<?php echo $result['email']; ?> "    class="form-control" name="email"  placeholder="Enter Your Email-Id"required>
          </div>
        </div>
        </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Mobile :</h4></div>
          <div class="col-sm-8">
              <input type="number" value="<?php echo $result['mobile']; ?>"  class="form-control" name="phone" placeholder="Type Your Phone Number"required>
          </div>
        </div>
        </div>
		<div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>officer_type:</h4></div>
          <div class="col-sm-8">
              <input type="text" value="<?php echo $result['category']; ?>"  class="form-control" name="officer_type" placeholder=""required>
          </div>
        </div>
        </div>
		     <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4"><h4>purpose of visit:</h4></div>
                  <div class="col-sm-8">
                <select class="form-control" name="visit_type"required>
				  <option value="dept">select your purpose of visit</option>
                  <option value="dept">Departmental duty</option>
                  <option value="personal">personal</option>
				  <option value="guest">guest</option>
                  
               </select>
              </div>
              </div>
            </div>
          </div>
		

        

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4></h4></div>
          <div class="col-sm-8">
              <input type="hidden" name="state" class="form-control"placeholder="Enter Your State Name"required>
          </div>
        </div>
        </div>

		      <div class="form-group">
            <div class="row">
           <div class="control-label col-sm-4"><h4></h4></div>
          <div class="col-sm-8">
              <input type="hidden" name="zip" class="form-control" placeholder="Enter Your Zip Code"required>
          </div>
        </div>
        </div>
        </div>

           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Room Type:</h4></div>
                  <div class="col-sm-7">
                <select class="form-control" name="room_type"required>
				<option value="AC Suite">select your room type </option>
                  <option value="AC Suite">AC Suit </option>
                  <option value="AC Room">AC Room</option>
                  
               </select>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>check In Date :</h4></div>
                  <div class="col-sm-7">
                  <input type="date" name="cdate" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                 <div class="control-label col-sm-5"><h4>Check In Time:</h4></div>
                   <div class="col-sm-7">
                    <input type="time" name="ctime" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Check Out Date :</h4></div>
                <div class="col-sm-7">
                  <input type="date" name="codate" class="form-control"required>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-5"><h4 id="top">Occupancy :</h4></label>
                <div class="col-sm-7">
                  <div class="radio-inline"><input type="radio" value="single" name="Occupancy"required >Single</div>
                  <div class="radio-inline"><input type="radio" value="twin" name="Occupancy" required>Twin</div>
                  <div class="radio-inline"><input type="radio" value="dubble" name="Occupancy" required>Dubble</div>
                </div> 
              </div>
            </div>
            <input type="submit" value="submit" name="savedata"  class="btn btn-danger"required/>
			
	
          </div>
          </form><br>
        </div>
      </div>
    </div>
  </div>
<?php
include('Footer.php')
?>
</body>
</html>
