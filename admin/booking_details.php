
<!--<html>
      <head>  
             
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
	  <body>-->
<table class="table table-bordered table-striped table-hover" id="record">
	<h1>Room Booking Details</h1><hr>
	<input type="text" id="search" name="search"  placeholder="Search for names.." title="Type in a name" style="width:800px" align="right">
	</br></br>
	<tr>
		<th>Sr No</th>
		
		<th>Name</th>
		<th>Email</th>

		
		
		<th>Room No:</th>
		<th>Check in Date</th>
		
		<th>Check Out Date</th>
		
		<th>Cancel Order</th>
	</tr>

<?php 
$i=1;
$sql=mysqli_query($con,"select * from allbookings");
while($res=mysqli_fetch_assoc($sql))
{
$oid=$res['bid'];

?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		
		
		
		<td><?php echo $res['roomno']; ?></td>
		<td><?php echo $res['indate']; ?></td>
		
		<td><?php echo $res['outdate']; ?></td>
		
		<td><a style="color:red" href="cancel_order.php?booking_id=<?php echo $oid; ?>">Cancel Booking</a></td>
	</td>
	</tr>
<?php 	
}

?>	
</table>
<!--</body>
</html>-->
<script>
      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#record tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });
</script>	