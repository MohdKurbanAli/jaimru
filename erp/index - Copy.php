<?php session_start();
include_once('includes/class.php');
$class = new baseClass;

if(isset($_POST['admin']) && empty($_GET['submit_employee']))
{
$username = $_POST['username'];
$password = $_POST['password'];
if($username != '' && $password != ''){
$qry = mysqli_query ($class->conn,"SELECT * FROM jk_user WHERE user_email_id = '$username' AND user_password = '$password'") or die(mysqli_error());
			if (mysqli_num_rows($qry) > 0) 
    			{
					$res = mysqli_fetch_array($qry);
					$_SESSION['sess_user_id'] = $res['user_id'];
					$_SESSION['sess_user_name'] = $res['user_name'];
					$_SESSION['sess_user_type'] = $res['user_type'];
					
					header("location: welcome.php");
				}
				else{
					$error= "User name and password not correct";
					}
			}else
			{
			$error= "Invalid Login Details.";
			}
}

if(isset($_GET['submit_employee']) && empty($_POST['submit_admin']))
{
echo "YOYO";
die;
echo $eusername = $_GET['eusername'];

if($eusername != '' && $epassword != ''){
$qry = mysqli_query($class->conn,"SELECT * FROM emp_details WHERE emp_email_first = '$eusername' AND emp_password = '$epassword'") or die(mysqli_error());
//echo mysqli_num_rows($qry);
echo 'yoyo';
			if (mysqli_num_rows($qry) > 0) 
    			{
					$res = mysqli_fetch_array($qry);
					$_SESSION['sess_user_id'] = $res['emp_id'];
					$_SESSION['sess_user_name'] = $res['emp_name'];
					$_SESSION['sess_user_type'] = $res['user_type'];
					
					header("location: welcome.php");
					echo 'yoyo';
				}
				else{
					$error= "User name and password not correct";
					}
			}else
			{
			$error= "Invalid Login Details.";
			}
}

?>



<!DOCTYPE html>
<!-- Developer Name: Jaikishor Kashyap -->
<!--Email Id : jaikashyap22@gmail.com-->
<!--Work at : SBC Export Ltd-->


<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<!-- start: HEAD -->
	<head>
		<title>Login to maujitrip</title>
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
	<body class="login" style="background: url(images/website-designer.jpg) no-repeat center fixed;    background-size: 100% 100%;">
		<!-- start: LOGIN -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<img src="images/logo-invert.png" alt="maujitrip"/>
				</div>
				<!-- start: LOGIN BOX -->
				<div class="box-login">
				<!-- start: TABS -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="tabbable">
										<ul id="myTab1" class="nav nav-tabs nav-justified">
											<li class="active">
												<a href="#admin" data-toggle="tab">
													Admin
												</a>
											</li>
											<li>
												<a href="#Employee" data-toggle="tab">
													Employee
												</a>
											</li>											
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade in active" id="admin">
												<form class="form-login" name="admin" action="index.php" method="post">
													<fieldset>
														<legend>
															Sign in to admin account
														</legend>
														<p>
															Please enter your name and password to log in.
														</p>
														<div class="form-group">
															<span class="input-icon">
																<input type="text" class="form-control" name="username" placeholder="Username">
																<i class="fa fa-user"></i> </span>
														</div>
														<div class="form-group form-actions">
															<span class="input-icon">
																<input type="password" class="form-control password" name="password" placeholder="Password">
																<i class="fa fa-lock"></i>
																<a class="forgot" href="login_forgot.php">
																	I forgot my password
																</a> </span>
														</div>
														<div class="form-actions">
															<div class="checkbox clip-check check-primary">
																<input type="checkbox" id="remember" value="1">
																<label for="remember">
																	Keep me signed in
																</label>
															</div>
															<button type="submit" class="btn btn-primary pull-right" name="admin">
																Login <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
														
													</fieldset>
												</form>
											</div>
											<div class="tab-pane fade" id="Employee">
												<form class="form-login" name="employee" action="index.php" method="get">
													<fieldset>
														<legend>
															Sign in to employee account
														</legend>
														<p>
															Please enter your name and password to log in.
														</p>
														<div class="form-group">
															<span class="input-icon">
																<input type="text" class="form-control" name="eusername" placeholder="Username">
																<i class="fa fa-user"></i> </span>
														</div>
														<div class="form-group form-actions">
															<span class="input-icon">
																<input type="password" class="form-control password" name="epassword" placeholder="Password">
																<i class="fa fa-lock"></i>
																<a class="forgot" href="login_forgot.html">
																	I forgot my password
																</a> </span>
														</div>
														<div class="form-actions">
															<div class="checkbox clip-check check-primary">
																<input type="checkbox" id="remember" value="1">
																<label for="remember">
																	Keep me signed in
																</label>
															</div>
															<input type="submit" class="btn btn-primary pull-right" name="submit_employee">													
														</div>
														
													</fieldset>
												</form>
											</div>
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<!--  end TABS -->
					
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> SBC Export Ltd</span>. <span>All rights reserved</span>
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: LOGIN BOX -->
			</div>
		</div>
		<!-- end: LOGIN -->
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/login.js"></script>
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