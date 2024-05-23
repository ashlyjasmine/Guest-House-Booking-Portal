<?php 
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
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
  <h1 class="text-center text-primary"><br/><br/>[ Booking Details ]</h1><br/>
  <div class="container">
    <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive"style="height:150px;">
               <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>

                    <th>Room Type</th>
                    <th>Check In Date</th>
                    <th>Check In Time</th>
                    <th>Check Out Date</th>
                    <th>Occupancy</th>
					<th>Cancel</th>
					<th>proceed for confirmation</th>
               </tr>

               <?php 
$sql= mysqli_query($con,"select * from room_booking_details where email='$eid' "); 
while($result=mysqli_fetch_assoc($sql))
{
$oid=$result['id'];
echo "<tr>";
echo "<td>".$result['name']."</td>";
echo "<td>".$result['email']."</td>";
echo "<td>".$result['phone']."</td>";

echo "<td>".$result['room_type']."</td>";
echo "<td>".$result['check_in_date']."</td>";
echo "<td>".$result['check_in_time']."</td>";
echo "<td>".$result['check_out_date']."</td>";
echo "<td>".$result['Occupancy']."</td>";
echo "<td><a href='cancel_order.php?order_id=$oid' style='color:Red'>Cancel</a></td>";
echo "<td><a href='paymentpage.php?order_id=$oid' style='color:Red'>Proceed</a></td>";
echo "</tr>";
}                         
               ?> 
          </table><br/><br/>
		  
		  
		<h2 class="text-center text-primary"><br/><br/>  CONFIRMED BOOKINGS DETAILS</h2>
		          <table class="table table-striped table-bordered table-hover table-responsive"style="height:150px;">
               <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Room No</th>
                    <th>Check In Date</th>
                    
                    <th>Check Out Date</th>
					<th>Challan number</th>
					<th>print</th>
                    
               </tr><?php
			  
			   $sl= mysqli_query($con,"select * from allbookings where email='$eid' "); 
while($resu=mysqli_fetch_assoc($sl))
{
$oid=$result['id'];
$dn=$resu['challan'];
echo "<tr>";
echo "<td>".$resu['name']."</td>";
echo "<td>".$resu['email']."</td>";


echo "<td>".$resu['roomno']."</td>";
echo "<td>".$resu['indate']."</td>";

echo "<td>".$resu['outdate']."</td>";
echo "<td>".$resu['challan']."</td>";
echo"<td><a href ='downloadconf.php?challanid=$dn' >download</a></td>";


 echo "</tr>";
}                         
               ?> 
          </table>
		  
		  
		  
		  

    </div>
    </div>
  </div>
<?php
include('Footer.php')
?>
</body>
</html>
<script>
$('#print').click(function(e){
	e.preventDefault();
	var val=$('#last').html();
	var  from=$('#from input').val();
	var unique=$('#uniqueid input').val();
	//var unique=$('#uniqueid input').val();
	$.ajax({
		url:'action.php',
		type:'post',
		data:'action=print&id='+unique,
		success:function(response){
		}
	});
	var to=$('#to input').val();
	var from_html=$('#from').html();
	var to_html=$('#to').html();
	//var unique_html=$('#unique').html();
	$('#from').html(from);
	$('#to').html(to);
	$('#unique').html(unique);
	$('#print').remove();
	var printContents = $('#printarea').html();
	$('#from').html(from_html);
	$('#to').html(to_html);
	$('#unique').html(unique);
	$('#last').html(val);
	$('#save').remove();
	//console.log(printContents);
		var newWin=window.open('','Print-Window');
		  newWin.document.open();
		  newWin.document.write('<html><head><title>Custom</title>  <style>.hide{display:none}form {width: 100%; height: 95%;border-style: none; background-color: whitesmoke;  }#customers {font-family: "Timesnewroman";    font-size: 15px;   border-collapse: collapse;   width: 10px;   border: 0px;    margin-left: 40px;width:100px;margin:auto;}#customers td, #customers th {    border: 0px solid black;   padding: 9px;}#customers th {  padding-top: 12px;  padding-bottom: 12px; text-align: left; background-color: #6A5ACD; color: white;}.textbox{border: 0px;border-radius:2px;width:300;font-family: times new roman;outline:none;}.button {    background-color: #34495E;   border: none;   color: white;   padding: 9px 17px;  text-align: center;  text-decoration: none;  display: inline-block;   font-size: 13px;   padding-top: 13px;   cursor: pointer;	border-radius: 12px;	margin-left: 46%;}.text{    width: 100px;}p {    text-align: justify;    margin-left: 46px;    margin-right: 38px;   line-height: 1.5;}  </style></head><body onload="window.print()">'+printContents+'</body></html>');
		  newWin.document.close();
		  setTimeout(function(){newWin.close();},10);
});
$('#save').click(function(e){
	e.preventDefault();
	var unique=$('#uniqueid input').val();
	$.ajax({
		url:'action.php',
		type:'post',
		data:'action=print&id='+unique,
		success:function(response){
		}
	});
	var val=$('#last').html();
	var  from=$('#from input').val();
	
	var to=$('#to input').val();
	var from_html=$('#from').html();
	var to_html=$('#to').html();
	//var unique_html=$('#unique').html();
	$('#from').html(from);
	$('#to').html(to);
	$('#unique').html(unique);
	$('#print').remove();
	$('#save').remove();
	var printContents = $('#printarea').html();
	$('#from').html(from_html);
	$('#to').html(to_html);
	$('#unique').html(unique);
	$('#last').html(val);
	//console.log(printContents);
		var newWin=window.open('','Print-Window');
		  newWin.document.open();
		  newWin.document.write('<html><head><title>Custom</title>  <style>.hide{display:none}form {width: 100%; height: 95%;border-style: none; background-color: whitesmoke;  }#customers {font-family: "Timesnewroman";    font-size: 15px;   border-collapse: collapse;   width: 10px;   border: 0px;    margin-left: 40px;width:100px;margin:auto;}#customers td, #customers th {    border: 0px solid black;   padding: 9px;}#customers th {  padding-top: 12px;  padding-bottom: 12px; text-align: left; background-color: #6A5ACD; color: white;}.textbox{border: 0px;border-radius:2px;width:300;font-family: times new roman;outline:none;}.button {    background-color: #34495E;   border: none;   color: white;   padding: 9px 17px;  text-align: center;  text-decoration: none;  display: inline-block;   font-size: 13px;   padding-top: 13px;   cursor: pointer;	border-radius: 12px;	margin-left: 46%;}.text{    width: 100px;}p {    text-align: justify;    margin-left: 46px;    margin-right: 38px;   line-height: 1.5;}  </style></head><body onload="window.print()">'+printContents+'</body></html>');
		  newWin.document.close();
		  setTimeout(function(){newWin.close();},10);
});
</script>
