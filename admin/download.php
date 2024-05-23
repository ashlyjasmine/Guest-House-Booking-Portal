 <?php
 require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
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
      <h3 align="center">FeedBack</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                <th width="5%">ID</th>  
                <th width="30%">Name</th>  
                <th width="10%">Email</th>  
                <th width="45%">Mobile</th>  
                <th width="10%">Message</th>  
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
      $sql = "SELECT * FROM feedback ORDER BY id ASC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {     
        $oid=$row['id'];  
      $output .= '<tr>  
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