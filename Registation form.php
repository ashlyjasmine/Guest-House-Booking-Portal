<?php
include('connection.php');
extract($_REQUEST);
if(isset($save))
{
  $sql= mysqli_query($con,"select * from create_account where email='$email' ");
  if(mysqli_num_rows($sql))
  {
  	echo '<script>alert(" account already exist")</script>';    
  }
  else
  {

      $sql="insert into create_account(name,email,designation,category,postingplace,idno,password,mobile,address,gender,country) values('$name','$email','$desi','$cate','$place','$idno','$Passw','$mobi','$addr','$gend','$countr')";
   if(mysqli_query($con,$sql))
   {
  	echo '<script>alert(" data saved successfully")</script>';
   header('location:Login.php'); 
   }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online GuestHouse.Com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body style="margin-top:50px;">
<style>
.left
{
	left: 0;
	
 }
 .right{
	 right: 0;
 }
 h1{
	 text-align: center;
	 padding: 20px;
 }
 h2{
	 text-align: center;
 }
 .register{
	 background: #2d85b0;
	 width: 500px;
	 margin: 0px 0px 0px 430px;
	 color: white;
	 font-size: 18px;
	 padding: 20px;
	 border-radius: 10px;
 }
 #register{
	 margin-left: 100px;
 }
 #name{
	 width: 300px;
	 padding: 7px;
	 border-radius: 0px;
 }
 #email{
	 width: 300px;
	 padding: 7px;
	 border-radius: 0px;
 }
 #desi
 {
	width: 300px;
	padding: 7px;
	border-radius: 0px;
 }
 #cate{
	 width: 300px;
	padding: 7px;
	border-radius: 0px;
 }
  #place{
	 width: 300px;
	padding: 7px;
	border-radius: 0px;
 }
  #idno{
	 width: 300px;
	padding: 7px;
	border-radius: 0px;
 }
  #passw{
	 width: 300px;
	padding: 7px;
	border-radius: 0px;
 }
  #mobi{
	 width: 300px;
	padding: 7px;
	border-radius: 0px;
 }
  #addr{
	 width: 300px;
	padding: 7px;
	border-radius: 0px;
 }
  #countr{
	 width: 300px;
	padding: 7px;
	border-radius: 0px;
 }
 #sub{
	 width: 400px;
	 padding: 7px;
	 align: center;
	 margin-left: 60px;
 }
</style>
  <?php 
include('Menu Bar.php');
  ?>
        
          <form method="post" >
          <!--<h1>Register</h1>-->
		 <h2>Please fill in this form to create an account</h2>
         <div class="register">
            <label>Name </label><br>
			<input type="text" name="name" class="form-control"placeholder="Enter Your Name" autocomplete="off"required id="name"><br><br>
            <label>Email-Id:</label><br>
          
            <input type="text" name="email" class="form-control"placeholder="Enter Your Email-id" autocomplete="off"required id="email"><br><br>
          <label>Designation:</label><br>
          
              <input type="text" name="desi" class="form-control"placeholder="Enter your designation" autocomplete="off"required id="desi"><br><br>
            <label>Officer Category:</label><br>
			
			
            <select name="cate" class="form-control"required id="cate">
              <option>enter your category</option>			
              <option>Group A</option>
              <option>Group B & C</option>
              <option>Retired</option>
			  <option>other</option>
            </select><br><br>
         <label>Posting place:</label><br>

              <input type="text" name="place" class="form-control"placeholder="Enter your posting place" autocomplete="off"required id="place"><br><br>
          
            <label>Id number:</label><br>
          
              <input type="text" name="idno" class="form-control"placeholder="Enter your id card number" autocomplete="off"required id="idno"><br><br>
         <label>Password :</label><br>
          
              <input type="password" name="Passw" class="form-control"placeholder="Enter Your Password"autocomplete="off"required id="passw"><br><br>
        <label>Mobile No:</label>
            <br>
              <input type="text" name="mobi" class="form-control"placeholder="Enter Your Mobile Number"required id="mobi"><br><br>
              <label>Address :</label><br>
              <textarea  name="addr" class="form-control"required></textarea id="addr"><br><br>
              <input type="radio" name="gend"value="male"required><b>Male</b>&emsp;
              <input type="radio" name="gend"value="female"required><b>Female</b>&emsp;
              <input type="radio" name="gend"value="other"required><b>Other</b><br><br>
              
			  <label>Country :</label><br>
              <select name="countr" class="form-control"required id="countr">
              <option>India</option>
              <option>Pakistan</option>
              <option>China</option>
              </select><br><br>
            <br>
            <input type="submit" value="Submit" name="save"class="btn btn-success btn-group-justified"required style="color:#000;font-family:" id="sub"/>
        </div>
        </form>
<?php
    include('Footer.php')
?>
</body>
</html>
