<?php
session_start();
error_reporting(1);
include "includes/class.php";
include "includes/class.phpmailer.php";

$email = "princek5432@gmail.com";
$name = "princek";

 
				$subject = 'Buffet Dinner Voucher-Peninsula Beach Resort,Goa';
				$mail = new PHPMailer();
				$mail->SMTPDebug = 2; //Alternative to above constant
				$mail->IsSMTP();
				//$mail->Host = "mail.sbcexportslimited.com";
				$mail->Host = "send.one.com";
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = "ssl";
				$mail->Port = 465;
				$mail->Username = "peninsulagoa@maujitrip.com";
				$mail->Password = "shahnawaz@goa";
				

                $mail->From = "peninsulagoa@maujitrip.com";
				$mail->FromName = "NoReply | Peninsula Beach Resort,Goa";
				$mail->AddAddress($email, $name);
				$mail->AddAddress('b2bsales@maujitrip.com', 'B2B');

				
							//$mail->AddEmbeddedImage('assets/images/maujidinnervoucher.jpg', 'logoimg', 'assets/images/maujidinnervoucher.jpg');

                $message = 'test';
				//$mail->AddAddress('jai@sbcinfotech.com', 'jai kashyap');
				
				//$mail->AddReplyTo("mail@mail.com");

				$mail->IsHTML(true);

				$mail->Subject = $subject;
				$mail->Body = $message;
				//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
            if(!$mail->Send())
				{
					 $error[] = 'Mail Sending is failed due to mail server! Please contact HR';
					
				 }else{
					$msg = 'User inserted Successfully.';
					header("Refresh:0");
				 }
				
				if(mail($email,$subject,$message,$headers))
				{
					
				}else{
					
				}
           

        

?>
