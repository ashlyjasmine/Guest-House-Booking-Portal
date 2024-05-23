<?php	
	function sendOTP($email,$otp)
	{
		require('/storage/ssd4/130/12469130/public_html/class.phpmailer.php');
		require('/storage/ssd4/130/12469130/public_html/class.smtp.php');
	
		$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		$mail = new PHPMailer();
	   $mail->AddReplyTo('ashlyjasmine1998@gmail.com','Technical Suneja');
                                $mail->SetFrom('ashlyjasmine1998@gmail.com','Technical Suneja');
                                $mail->AddAddress($email);
                                $mail->Subject= "OTP to Login";
                                $mail->MsgHTML($message_body);
                                $result=$mail->Send();
                                if(!$result) 
								{
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }
								else 
								{
                                    	return $result;  
                                } 
	}
	
		