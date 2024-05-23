<?php
include('../connection.php');
?>




<table class="table table-bordered table-striped table-hover" id="record">
	<h1>Payment Details</h1><hr>
	<input type="text" id="search" name="search"  placeholder="Search for names.." title="Type in a name" style="width:800px" align="right">
	</br></br>
	<tr>
		<th>Sr No</th>
		<th>Booking id</th>
		<th>Name</th>
		<th>Email</th>

		
		
		<th>Room No:</th>
		<th>Check in Date</th>
		
		<th>Check Out Date</th>
		
		<th>Challan no:</th>
		<th>payed</th>
		<th>CkeckOut</th>
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
		<td><?php echo $res['bid']; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		
		
		
		<td><?php echo $res['roomno']; ?></td>
		<td><?php echo $res['indate']; ?></td>
		
		<td><?php echo $res['outdate']; ?></td>
		<td><?php echo $res['challan']; ?></td>
		<td><?php echo $res['payed'];?></td>
		<td><a href ="checkout2.php?booking_id=<?php echo $oid; ?>">checkout</a></td>
	
	</tr>
<?php 	
}

?>	
<!--</table>-->