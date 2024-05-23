
 <?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "hotel");  
      $sql = "SELECT * FROM feedback ORDER BY id ASC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {     
        $oid=$row['id'];  
      $output .= '
	                <tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["email"].'</td>  
                          <td>'.$row["mobile"].'</td>  
                          <td>'.$row["message"].'</td> 
                          						  
						  <td><a href ="download.php?userid=<?php echo $oid; ?>">download</a></td>
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 
 ?>  
 <!--<!DOCTYPE html>  -->
 <!---<html>  
      <head>  
           <title>feedback</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  -->
             
          <!-- <div class="container" style="width:900px;"> -->
                <h3 align="center">USER FEEDBACK</h3><br />  
               <!-- <div class="table-responsive"> -->
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="10%">Name</th>  
                               <th width="20%">Email</th>  
                               <th width="10%">Mobile</th>  
                               <th width="10%">Message</th>	
							   
							   <th width="10%">download now</th>
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                       
                </div>  
           <!--</div>  -->
      <!--</body>  
 </html>  