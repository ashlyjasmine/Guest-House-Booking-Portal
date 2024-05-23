<?php 
session_start();
error_reporting(1);
include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head><!--Head Open  Here-->
  <title>Online guesthouseRoom.Com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head> <!--Head Open  Here-->

<style>
.wrapper{
	display:inline-grid;
	grid-template-columns:25% 70% ;
	grid-column-gap:2em;
	grid-row-gap:;
	grid-auto-rows:110px;
	justify-items:center;
	align-items:center;
	//background: url(image/css.jpg) ;
	}
   <!-- .wrapper > div{
	background:#7FB3D5;
	padding:1em;
	}
	.wrapper > div:nth-child(odd){
	 background:#DAF7A6;
	}-->
	.box1{
		height:270%;
		padding-top: 20px;
		border-radius: 3px;
	}
	.box2{
	}
	
	
	
	.container {
    padding-left: 10px;
    padding-right: 15px;
	justify-items:center;
  }
  
  .box-wrapper {
    width: 900px;
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
	  background-color: white;
	    }
</style>
 
<body style="margin-top:50px;" style="background-color:#FDFEFE;">
<!--<div class="container-fluid"id="primary">-->
  <?php
      include('Menu Bar.php')
  ?>

    <!--Indicators Close Here-->

    <!-- Wrapper for slides -->
     





 <div class="wrapper"> 
		  <div class="box1">
		  <font size="4"></br></br><b>Who can use these services:</b></font></br>
		  <font size="4"><ul>
		  <li>Government officers[Group a/b & c]--<ul><center>private visit<br/>departmental<br/>guest</ul></li></center>
		  <li>Retired government officers--<ul><center>private visit<br/>departmental<br/>guest</ul></li></center>
		  </font>
	    </div>
		
		       
			   <!--<div class="box2">-->
			   <section class="login first grey">
			   			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
		       <h1><b><u><font color="blue">Online Guest House Booking</font></u></b></br></h1>
               <font size="4;">Using this online service of Central Excise Commissionerate Puducherry, </br>
                Government officers can book GuestHouse rooms.Once it is approved 
				they can download the cofirmation page.
				</div>
				</div>
				</div>
                </section>
                </font>
                       </div> 
<div class="imgdis">

<img src="image/css.jpg" width="1685" height="350" size="200px">

</div>					   
</div> 





<div class="container-fluid"id="red"><!--Id Is Red--> 
<div class="container text-center">    
  <h1>Welcome To <font color="#a6e22b;"><b>Online GuestHousePortal.Com</b></font></h1><hr><br>
    

	
 
</div>
</div>
</div>

<?php
  include('Footer.php')
?>
</body>
</html>