<?php 

include('includes/class.php');
$class = new baseclass;


if(isset($_POST['submit']))
{
$email = $_POST['email'];

$qry = mysqli_query($class->conn, "SELECT * FROM jk_user WHERE user_email_id = '$email';");
$admin_res = mysqli_fetch_array($qry);

	if(mysqli_num_rows($qry) =='0')
	{
		$emp_qry = mysqli_query($class->conn, "SELECT * FROM emp_details WHERE emp_email_first = '$email';");
		$emp_res = mysqli_fetch_array($emp_qry);
		$name = $emp_res['emp_name'];	
		$password = $emp_res['emp_name'];	
	}else
	{
		$name =  $admin_res['user_name'];	
		$password =  $admin_res['user_password'];	

	}
	if($name != '' && $password != '')
	{
		//echo "Name : ".$name. "<br>" . "Password : " . $password;
		$mail  = $class->mail($email,'Forget Email Address for SBC Export Ltd','','Your password is '.$password ,'jaikashyap22@gmail.com');
		if($mail)
		{
			$msg = "Password has been sent. Check your email.";
		}

	}
	else
	{
		$error = "<span class='text-info'>".$email . "</span> is not registered with our database.";
	}


}

 ?>

<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<!-- start: HEAD -->
	<head>
		<title>Clip-Two - Responsive Admin Template</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login" style="background:url(images/forget.jpg) no-repeat center fixed; background-size: 100% 100% ">
		<!-- start: FORGOT -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<img src="images/logo-invert.png" alt="Clip-Two"/>
				</div>
				<!-- start: FORGOT BOX -->
				<div class="box-forgot">
					<form class="form-forgot" action="login_forgot.php" method="post" enctype="ap">
						<fieldset>
							<legend>
								Forget Password?
							</legend>
							<p>
								Enter your e-mail address below to reset your password.
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="Email">
									<i class="fa fa-envelope-o"></i> </span>
							</div>
							<?php if(isset($error)){ echo $error; } ?>
							<?php if(isset($msg)){ echo $msg; } ?>
							<div class="form-actions">
								<a class="btn btn-primary btn-o" href="index.php">
									<i class="fa fa-chevron-circle-left"></i> Log-In
								</a>
								<input  type="submit" name="submit" class="btn btn-primary pull-right">
									
								
							</div>
						</fieldset>
					</form>
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> SBC Export Ltd</span>. <span>All rights reserved</span>
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: FORGOT BOX -->
			</div>
		</div>
		<!-- end: FORGOT -->
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!--	<script src="vendor/jquery-validation/jquery.validate.min.js"></script>  -->
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
	<!--	<script src="assets/js/login.js"></script> -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
	<!-- end: BODY -->
</html>