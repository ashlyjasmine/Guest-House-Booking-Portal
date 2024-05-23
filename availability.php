
	
	<?php 
	session_start();
	extract($_REQUEST);
	error_reporting(1);
	
	include('connection.php');
if(isset($update))
{
$sql=mysqli_query($con,"select * from rooms where type NOT IN(select DISTINCT room_type from room_booking_details where check_in_date <='$date1' AND check_out_date>='$date2') and status='t' and room_id NOT IN (select roomid from bookedrooms) ");

	
	$re=mysqli_fetch_assoc($sql);
	

}
if(isset($book))
{
	 header('location:Booking Form.php'); 
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
<body>
<?php include('Menu Bar.php');?>


<style>

body{
                  width: 100%;
                  background: url(image/check.jpeg) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
	table{
    background-color: #ffffcc;
	}	

</style>
<form method="post" enctype="multipart/form-data">
<center>
<table  align="center" style="width:40%">
	<font align="center" color="green"><h1>check availability</h1></font><hr>
	<center>
	<tr style="height:40">
		<th>Enter check_in date</th>
		<td><input type="date" name="date1" class="form-control"required/></td>
	</tr>
	
	<tr style="height:40">	
		<th>Enter Your check_out date</th>
		<td><input type="date" name="date2" class="form-control"required/>
		</td>
	</tr>
	
	
	
	<tr>
		<td colspan="2" align="center">
			<input type="submit" class="btn btn-primary" value="check availability" name="update"required/>
		</td>
	</tr>
	</center>
	</center>
	<style>
	table, th, td {
  border: 2px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
table {
  border-spacing: 5px;
}
</style>
	<table style="width:50%" align="center" style="background-color:#ffa64d">
	<caption><h2><center>Available Rooms</center></h2></caption>
	<tr>
	<th>Room Type</th>
	<th>Room No:</th>
	
	
	</tr>
	
	<tr>
	<td>
	<?php echo $re['type'];?></td>
	<td><?php echo $re['room_no'];?></td>
	
	</tr>
	
	</table>
	
</table> </form>
<form>
<br/>
<br/>
<input type="submit"  class="btn btn-primary" name="book" value="Book Now" onsubmit="Booking Form.php">
</form>


<?php 
//include('Footer.php')?>
</body>
</html>	
	