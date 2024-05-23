 <?php
 //include('connection.php');
 //include('order.php');
 $uid=$_GET['challanid'];
 $gett="SELECT * FROM room_booking_details where id='$oid'";
 $tt= mysqli_query($connect, $gett);
 $fn= mysqli_fetch_array($tt);
 $connect = mysqli_connect("localhost", "root", "", "hotel");
 $get="SELECT * FROM allbookings where challan='$uid'";
 $rest = mysqli_query($connect, $get);
 $set = mysqli_fetch_array($rest);
 $nm=$set['name'];
 $on=$set['indate'];
 $out=$set['outdate'];
 $rm=$set['roomno'];
 $oid=$set['bid'];
 
 $room=$fn['room_type'];
 $oc=$fn['Occupancy'];
 
 
 require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Download booking confirmation page");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
	  <br/><br/>
	  <center><img src="image/label.jpg" align="center"></center>CENTRAL EXCISE COMMISSINERATE,PUDUCHERRY
      <h3 align="center"><u> BOOKING CONFIRMATION PAGE</u></h3><br/><br/> <br/>
         Dear '.$nm.',
		 <p>      This is confirmation of your booking on '.$on.' for a '.$room.'.The check-in date shall be on '.$on.' and check-out date shall be on
		  '.$out.'.<br/><br/><br/>
		  Further details of your booking are listed below:<br/>
		  Occupancy:'.$oc.'<br/>
		  Room type:'.$room.'<br/>
		  Amenities:free wifi,food,etc..
		  <br/><br/><br/>
		       If you have any enquiries, please do not hesitate to contact us.<br/><br/>
			   We are looking forward to your visit and hope that you enjoy your stay.<br/><br/>
			   Best Regards<br/><br/>
			   Table of payment details is shown below.<br/> Settlement of payment shall be made by using this challan number.So keep the printout of this form along...
		 
		 
		 
		 
		 <br/><br/><br/>
      <table class="table table-bordered" width="700">  
           <tr>  
                <th width="10%">NAME</th>  
                <th width="25%">EMAIL</th>  
                <th width="6%">ROOM</th>  
                <th width="14%">CHECK IN</th>  
                <th width="14%">CHECK OUT</th>  
				<th width="10%">CHALLAN NO:</th>
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>'; 
// Clean any content of the output buffer
ob_end_clean();	  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I'); 
	  
	  
	  function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "hotel");  
	  $uid=$_GET['challanid'];
      $sql = "SELECT * FROM allbookings where challan='$uid'";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {     
        $oid=$row['bid'];  
      $output .= '<tr>  
                            
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["email"].'</td>  
                          <td>'.$row["roomno"].'</td>  
                          
                         <td>'.$row["indate"].'</td>
						 <td>'.$row["outdate"].'</td>
						 <td>'.$row["challan"].'</td>
						  <td><a href ="downloadconf.php?userid=<?php echo $oid; ?>">download</a></td>
                     </tr>
					 
                    				 
                          ';  
      }  
      return $output;  
 }  
	  ?>