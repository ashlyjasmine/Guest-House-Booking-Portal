<?php
include('connection.php');
 include ('mail_function.php'); 
 date_default_timezone_set("Asia/Kolkata"); 
$success = "";
$error_message = "";
//$conn = mysqli_connect("localhost","root","","hotel");
//if(!empty($_POST["submit_email"])) 
	if(isset($submit_email))
{
	$result = mysqli_query($conn,"SELECT * FROM create_account WHERE email='$email'");
	$count  = mysqli_num_rows($result);
	if(mysqli_num_rows($result) > 0) 
	{
		// generate OTP
		$otp = 'link';
	
		// Send OTP
	   
		$mail_status = sendOTP($_POST["email"],$otp);
	
	}	
			
		
			
			
		
 
	else 
	{
		echo '<script>alert("Email not exist...register pls")</script>';
		//$error_message = "Email not exists!";
	}
}


?>
<html>
<head>
<title>Online Guesthouse.Com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
.tblLogin {
	
  
    align:center;
    max-width: 90%;
	padding:8%;
	text-align:center;
	
	
}
.tableheader { font-size: 20px;
                 align:center;
                  color:green;
				 }
.tablerow { padding:30px; align:center:}
.error_message {
	color: #b12d2d;
    background: #ffb5b5;
    border: #c76969 1px solid;
}
.message {
	width: 100%;
    max-width: 300px;
    padding: 10px 30px;
    border-radius: 4px;
    margin-bottom: 5px;    
}
.login-input {
	border: #CCC 1px solid;
    padding: 20px 30px;
	border-radius:4px;
}
.btnSubmit {
padding: 15px 15px;
    background: #2c7ac5;
    border: #d1e8ff 1px solid;
    color: #FFF;
	border-radius:5px;
}
</style>
</head>
<body>
<?php
include('Menu Bar.php')
?>
	<?php
		if(!empty($error_message)) {
	?>
	<div class="message error_message"><?php echo $error_message; ?></div>
	<?php
		}
	?>

<form name="frmUser" method="post" action="">
	<div class="tblLogin">
		
			
		
		
		
		<div class="tableheader"><b>Enter Your Email to Find Your Account</b></div>
		<div class="tablerow"><input type="text" name="email" placeholder="Email" class="login-input" required></div>
		<div class="tableheader" align="center"><input type="submit" name="submit_email" value="Send My Reset Link" class="btnSubmit"></div>
		
	</div>
</form>
<?php
include('Footer.php')
?>
</body></html>