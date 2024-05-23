<?php


include_once('dashdupe.php');

include('../connection.php');
$oid=$_GET['booking_id'];
if(isset($update))
{
$qe=mysqli_query($con,"select * from allbookings where bid='$oid' and payed==0");

if($qe)
{
$q=mysqli_query($con," update allbookings set payed='$amount' where bid='$oid' ");
if($q)
{
	echo '<script>alert(" user payedsuccessfully")</script>'; 
	
	//header('location:dashboard.php');
}
}
else
{
		echo '<script>alert("already payed")</script>'; 
		//header('location:dashboard.php');
}
}

?>

<html><head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="dashboard.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
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
	  background: url(image/pondi.jpg) ;


</style>
<!--<form method="post" enctype="multipart/form-data">
<center>
<table  align="center" style="width:40%">
	<font align="center" color="green"><h1>enter details</h1></font><hr>
	<center>
	<tr style="height:40">
		<th>Enter amount received</th>
		<td><input type="number" name="amount" class="form-control"required/></td>
	</tr>
	
	
	</table>-->
	
	
	
		
			
	
			<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> </h4></center><br>
							<form method="post"  enctype="multipart/form-data">
								<center> <h5 style="font-family: Noto Sans;"> </h5><h4 style="font-family: Noto Sans;">Payment Receiving</h4></center><br>
								<div class="form-group">
									<label class="fw">Enter Payment Amount:
										
									</label>
									<input type="number" name="amount" class="form-control">
								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="update">Enter amount</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	
				<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> </h4></center><br>
							<form method="post"  enctype="multipart/form-data">
								<center> <h5 style="font-family: Noto Sans;"> </h5><h4 style="font-family: Noto Sans;">BILL GENERATION</h4></center><br>
								<div class="form-group">
									<label class="fw">Enter Payment Amount:
										
									</label>
									<input type="number" name="amount" class="form-control">
								</div> 
								<div class="form-group text-right"><?php
									echo"<td><a href ='Printbill.php?bookingid=$oid' >Print Bill</a></td>";?>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	
	</center>
	</center>
	
	  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	