<?php
@session_start();
date_default_timezone_set('Asia/Kolkata');
if($_SESSION['sess_user_id']=='')


 {



	header("Location: index.php");
	exit();
}

error_reporting(0);
?>
