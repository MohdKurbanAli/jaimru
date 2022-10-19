<?php 
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;
$error = array();
$user_type = $_SESSION['sess_user_type'];
$user_id = $_SESSION['sess_user_id'];

if(isset($_POST['submit']))
{
@extract($_POST);

    // if($user_type == "Employee"){
    //     $emp_qry = mysqli_query($class->conn,"SELECT emp_password FROM emp_details WHERE emp_id = '$user_id'");
    //     $emp_res = mysqli_fetch_array($emp_qry);
    //     $emp_pass = $emp_res[0];
    //     if($new_password != $con_password)
    //     {
    //         $error[] = "New password & Confirm Password should Match.";
    //     }
    //     if($emp_pass != $old_password)
    //     {
    //         $error[] = "Old password should be correct.";
    //     }
    //     if(count($error) == '0')
    //     {
    //         $sql = "emp_password = '$new_password'";

    //         if($user_id !="")
    //         {
    //             $qry = mysqli_query($class->conn,"UPDATE emp_details SET $sql WHERE emp_id = '$user_id'") or die(mysqli_error($class->conn));
    //         }

    //         if($qry)
    //         {
    //             echo "<script> alert('Password has been Updated'); </script>";

    //         }
    //         else
    //         {
    //             $error[] = 'Please fill a valid details';

    //         }
    //     }
    //     else {
    //         //$error[] = 'Please correct the above error';
    //     }
    // }
    if($user_type == "Admin"){
        $emp_qry = mysqli_query($class->conn,"SELECT user_password FROM jk_user WHERE user_id = '$user_id'");
        $emp_res = mysqli_fetch_array($emp_qry);
        $emp_pass = $emp_res[0];
        if($new_password != $con_password)
        {
            $error[] = "New password & Confirm Password should Match.";
        }
        if($emp_pass != $old_password)
        {
            $error[] = "Old password should be correct.";
        }
        if(count($error) == '0')
        {
            $sql = "user_password = '$new_password'";

            if($user_id !="")
            {
                $qry = mysqli_query($class->conn,"UPDATE jk_user SET $sql WHERE user_id = '$user_id'") or die(mysqli_error($class->conn));
            }
            if($qry)
            {
                echo "<script> alert('Password has been Updated'); </script>";

            }
            else
            {
                $error[] = 'Please fill a valid details';

            }
        }
        else {
            //$error[] = 'Please correct the above error';
        }



    }
     if($user_type == "Agent"){
        $emp_qry = mysqli_query($class->conn,"SELECT user_password FROM jk_user WHERE user_id = '$user_id'");
        $emp_res = mysqli_fetch_array($emp_qry);
        $emp_pass = $emp_res[0];
        if($new_password != $con_password)
        {
            $error[] = "New password & Confirm Password should Match.";
        }
        if($emp_pass != $old_password)
        {
            $error[] = "Old password should be correct.";
        }
        if(count($error) == '0')
        {
            $sql = "user_password = '$new_password'";

            if($user_id !="")
            {
                $qry = mysqli_query($class->conn,"UPDATE jk_user SET $sql WHERE user_id = '$user_id'") or die(mysqli_error($class->conn));
            }
            if($qry)
            {
                echo "<script> alert('Password has been Updated'); </script>";

            }
            else
            {
                $error[] = 'Please fill a valid details';

            }
        }
        else {
            //$error[] = 'Please correct the above error';
        }
    }

}


?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>maujitrip Invoice</title>
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
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<body>
		<div id="app">
			<!-- sidebar -->
			<?php include('includes/left_sidebar.php'); ?>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<?php include('includes/top_header.php'); ?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Change Password</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Pages</span>
									</li>
									<li class="active">
										<span>Change Password</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<section>
							<div class="panel-body">
							<form action="change_password.php" method="post" class="form-horizontal" >
							<input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id; } ?>" >
                            <div class="text-danger">
							<?php 
							 if(count($error)>0){ echo implode('<br>',$error);} ?>
                            </div>
							
							<fieldset>
								<legend>
									Change Password Form
								</legend>

							<div class="form-group">
									<div class="col-md-2">
									<label class="">Old Password</label>
									</div>
								<div class="col-md-10">
									<input type="password" name="old_password"  placeholder="Old Password" class="form-control" required>
								</div>
							</div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="">New Password</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="password" name="new_password"  placeholder="New Password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="">Confirm New Password</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="password" name="con_password"  placeholder="Confirm New Password" class="form-control" required>
                                    </div>
                                </div>
							<div class="form-group">
								<div class="col-md-12">
									<button name="submit" class="btn btn-primary btn-wide pull-right">Change Password <i class="fa fa-arrow-circle-right" ></i></button>
								</div>
							</div>
							
							</fieldset>
							
							</form>
						</div>	
						</section>
						
						
						<!-- end: YOUR CONTENT HERE -->
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
			
			<!-- start: OFF-SIDEBAR -->
			<?php include('includes/right_sidebar.php'); ?>
			<!-- end: OFF-SIDEBAR -->
			<!-- start: SETTINGS -->
			<?php include('includes/right_setting.php'); ?>
			<!-- end: SETTINGS -->
		</div>
		
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		
		<!-- end: CLIP-TWO JAVASCRIPTS -->
		
	</body>
</html>
