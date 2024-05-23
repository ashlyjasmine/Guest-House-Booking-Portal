 <script>
 var dt=new Date();
 var m=getMonth();
 var d=getDate();
   document.getElementById("date").innerHTML =  m + "/" + d ;
 </script>
 <?php
 //include('connection.php');
 //include('order.php');
 $uid=$_GET['bookingid'];
 
 $connect = mysqli_connect("localhost", "root", "", "hotel");
 $get="SELECT * FROM allbookings where bid='$uid'";
 $rest = mysqli_query($connect, $get);
 $set = mysqli_fetch_array($rest);
 $nm=$set['name'];
 $on=$set['indate'];
 $out=$set['outdate'];
 $rm=$set['roomno'];
 $oid=$set['bid'];
 $em=$set['email'];
 $ch=$set['roomcharge'];
 
 $gett="SELECT * FROM room_booking_details where id='$uid'";
 $tt= mysqli_query($connect, $gett);
 $fn= mysqli_fetch_array($tt);
 $room=$fn['room_type'];
 $oc=$fn['Occupancy'];
 $mail=$fn['email'];
 $ph=$fn['phone'];
 
 
 require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("checkout bill");  
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
	  <br/><br/><br/><br/>
	  <br/><br/>
	  <center><img src="devlop/label.jpg" align="center"></center><b></b><br/>
      <font style:align="right">CENTRAL EXCISE COMMISSIONERATE<br/>GOVERNMENT GUEST HOUSE&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inv Date:<p id="date"></p>
		 <br/>gst@gmail.com,<br/>phn:567337299</font><br/> <br/><br/>
         <b>Guest Details       &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 Reservation Details</b><br/>  
            '.$nm.' &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arr Date:&nbsp;&nbsp;&nbsp;&nbsp;'.$on.'
		 <br/>'.$em.'&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Dept Date:&nbsp;&nbsp;&nbsp;&nbsp;'.$out.'<br/>'.$ph.'&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Room No:&nbsp;&nbsp;&nbsp;&nbsp;'.$rm.'
		                     
		 
		 <br/><br/>
		 DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AMOUNT<BR/>
		 <hr/><br/>
		 <br/><br/>
		 <hr/><br/>
		 <hr/></br>
		 <hr/><br/>
		 <hr/><br/>
		 <hr/><br/>
		 
		 <br/>
		 <br/>
		 <br/><br/><br/>
		 
		 TOTAL CHARGE:&nbsp;&nbsp;Rs. '.$ch.'<br/>
		 
      <table class="table table-bordered" width="700">  
           <tr>  
                 <th>CHALLAN NO:</th> 
				
				
				
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
	  $uid=$_GET['bookingid'];
      $sql = "SELECT * FROM allbookings where bid='$uid'";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {     
        $oid=$row['bid'];  
      $output .= '<tr>  
                            
                          
						 <td>'.$row["challan"].'</td>
						 
						  <td><a href ="downloadconf.php?userid=<?php echo $oid; ?>">download</a></td>
                     </tr>
					 
                    				 
                          ';  
      }  
      return $output;  
 }  
	  ?>