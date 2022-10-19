<?php 

if(isset($_POST['from']))
{
	$from = $_POST['from'];
	$message = $_POST['message'];
	$send_to = $_POST['send_to'];
	$subject = $_POST['send_subject'];
	
	//$headers = "From: ".$from;
	
	// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <jai.kashyap@prkharsoftwares.com>' . "\r\n";
$headers .= 'Cc: jai.kashyap@prkharsoftwares.com' . "\r\n";
	
	if(mail($send_to, $subject,$message, $headers))
	{
		echo "Your data has been successfully e-mailed";
	}else{
		echo "there is some problem";
	}
}



?>