<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from rooms where room_id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update))
{
mysqli_query($con,"update rooms set room_no='$rno',type='$type',details='$details',status='$status' where room_id='$id' ");
header('location:dashboard.php?option=rooms');
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	
	<tr>	
		<th>Room No</th>
		<td><input type="text"  name="rno" value="<?php echo $res['room_no']; ?>"  class="form-control"/>
		</td>
	</tr>
	
	<tr>	
		<th>Room Type</th>
		<td><input type="text" name="type" value="<?php echo $res['type']; ?>"  class="form-control"/>
		</td>
	</tr>
	
	
	
	<tr>	
		<th>Details</th>
		<td><textarea name="details"  class="form-control"><?php echo $res['details']; ?></textarea>
		</td>
	</tr>
	
	
	<tr>	
		<th>Satus</th>
		<td><input type="text" name="status"  value="<?php echo $res['status']; ?>" class="form-control"/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Room Details" name="update"/>
		</td>
	</tr>
</table> 
</form>