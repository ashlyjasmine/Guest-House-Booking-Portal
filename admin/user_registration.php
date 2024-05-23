
<!--<html>
      <head>  
             
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
	  <body>-->
	  
<table class="table table-bordered table-striped table-hover" id="record">
	<h1>User Registration</h1><hr>
	<input type="text" id="search" name="search"  placeholder="Search for names.." title="Type in a name" style="width:800px" align="right">
	<br/><br/>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Designation</th>
		<th>Category</th>
		<th>Password</th>
		<th>Posting Place</th>
		<th>id no:</th>
		<th>Mobile</th>
		<th>Address</th>
		<th>Gender</th>
		<th>Country</th>
		<th>Block User</th>
		<th>Unblock User</th>
		
	</tr>
	<?php 
	include('../connection.php');
$i=1;
$sql=mysqli_query($con,"select * from create_account");
while($res=mysqli_fetch_assoc($sql))
{
	$oid=$res['id'];
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['designation']; ?></td>
		<td><?php echo $res['category']; ?></td>
		<td><?php echo $res['password']; ?></td>
		<td><?php echo $res['postingplace']; ?></td>
		<td><?php echo $res['idno']; ?></td>
		<td><?php echo $res['mobile']; ?></td>
		<td><?php echo $res['address']; ?></td>
		<td><?php echo $res['gender']; ?></td>
		<td><?php echo $res['country']; ?></td>
		<td><a style="color:red" href="blockuser.php?booking_id=<?php echo $oid; ?>">BLOCK</a></td>
		<td><a style="color:red" href="unblockuser.php?booking_id=<?php echo $oid; ?>">UNBLOCK</a></td>
	
	</td>
	</tr>	
<?php 	
}
?>
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