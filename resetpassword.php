<style>
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 18px 19px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="about.php">about</a>
  <a href="gallery.php">gallery</a>
  <a href="Login.php">userlogin</a>
</div>
<?php 
session_start();

extract($_REQUEST);
include('connection.php');
if(isset($update))
{
$sql=mysqli_query($con,"select * from create_account where name='$usr' and email='$mail' ");
    
	if(mysqli_num_rows($sql))
	{
		if($np==$cp)
		{
		mysqli_query($con,"update create_account set password='$np' where name='$usr' ");
           echo '<script>alert("password updated successfully")</script>'; 		
		
		}
		else
		{
			echo '<script>alert("new and confirm doesnt match")</script>'; 
		}
	}
	else
	{
	echo '<script>alert("user doesnt match")</script>'; 
	}
	
}
?>
<head>
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
.tablerow {  padding:10px;
            align:center;
			}
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
.form-control {
	border: #CCC 1px solid;
    padding: 20px 20px;
	border-radius:4px;
}
.btnUpdate {
	padding: 15px 15px;
    background: #2c7ac5;
    border: #d1e8ff 1px solid;
    color: #FFF;
	border-radius:5px;
}
.login-input{
font-size: 20px;}
</style>

</head>

<body>

<form method="post" enctype="multipart/form-data">
    <div class="tblLogin">
      
	    <div class="tableheader"><h1>Update Password</h1></div>
	  	    <div class="login-input">
		    Enter Your name
		<div class="tablerow"><input  name="usr" class="form-control"required/></div>
		
	
	        Enter Your email
	    <div class="tablerow">	<input name="mail" class="form-control"required/></div>
	
		
		 New Password
		<div  class="tablerow"><input type="password" name="np" class="form-control"required/></div>
		Confirm Password
      <div class="tablerow"><input type="password" name="cp" class="form-control"required/>
			</div>
	
	    
		
			<input type="submit" class="btnUpdate" value="Update Password" name="update"required/>
		
	    	
	
	</div>
 
</form>
<?php
include('Footer.php')
?>
</body>
</html>