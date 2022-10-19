<?php 
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;
 $user_id = $_SESSION['sess_user_id'];
 if (isset($_POST['submit'])) {
    @extract($_POST);
    $es_date = $class->changeUserToSql_DateFromat($es_date);
    $ex_date = $class->changeUserToSql_DateFromat($ex_date);
    if ($customer_id == '') {
        $error[] = "Customer is a require field";
    }
    $now = date("Y-m-d H:i:s");

    $item = json_encode($item);
    $oum = json_encode($oum);
    $hsn = json_encode($hsn);
    $price = json_encode($price);
    $qty = json_encode($qty);
    $amount = json_encode($amount);


    if (count($error) == '0') {
        $sql = "customer_id = '$customer_id',
		in_date = '$es_date',
		ex_date = '$ex_date',
		agent = '$agent',
		items = '$item',
		oum = '$oum',
		hsn = '$hsn',
		price = '$price',
		qty = '$qty',
		amount = '$amount',
		updated_by = '$user_id',
		updated_at = '$now'";
		
        if ($in_id !== '') {
            $qry = mysqli_query($class->conn, "UPDATE invoice SET $sql WHERE in_id = '$in_id'") or die(mysqli_error($class->conn));
        } 
		// else {
            // $qry = mysqli_query($class->conn, "INSERT into invoice SET $sql") or die(mysqli_error($class->conn));
        // }

        if ($qry) {
            //$class->mail('jai.kashyap@prakharsoftwares.com','Email notification from SBC export ltd.','maujitrip','test mail from maujitrip','jai.kashyap@prakharsoftwares.com');
            echo "<script> alert('Invoice has been updated.');
				window.location = 'invoice.php';
			</script>";
        } else {
			echo "<script> alert('Invalid method to edit invoice. please logout and login again');</script>";
            $error[] = 'Please fill a valid details';

        }
    } else {
        //$error[] = 'Please correct the above error';
    }
}




if(isset($_GET['id']))
{
	$user_id = $_GET['id'];
	$select = mysqli_query($class->conn,"select * from jk_user where user_id = '$user_id'");
	$select_res = mysqli_fetch_array($select);
	 @extract($select_res); 	
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
		<title>maujitrip :: | Edit User</title>
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
                                
                                
									<h1 class="mainTitle">User Update</h1>
									
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Pages</span>
									</li>
									<li class="active">
										<span>Work Order Form</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<section>
							<div class="panel-body">
							<form action="user_create.php" method="post" class="form-horizontal" >
							<input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id; } ?>" >
                            <div class="text-danger">
							<?php 
							 if(count($error)>0){ echo implode('<br>',$error);} ?>
                            </div>
							
							<fieldset>
								<legend>
									Create User Form 
								</legend>
							<div class="form-group">
									<div class="col-md-2">
									<label class="" for="organisation">User Type</label>
									</div>
								<div class="col-md-10">
									<select name="user_type" class="cs-select cs-skin-slide" >
									<option value="">Select</option>
									<option value="Manager" <?php if($user_type =='Manager'){ echo 'selected'; } ?>>Manager</option>
									<option value="Agent" <?php if($user_type =='Agent'){ echo 'selected'; } ?>>Agent</option>
                                    <option value="Accounts" <?php if($user_type =='Accounts'){ echo 'selected'; } ?>>Accounts</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
									<div class="col-md-2">
									<label class="">User Name</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="user_name" placeholder="Name of User"class="form-control" value="<?php echo $user_name ?>" required>
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">User Email Id</label>
									</div>
								<div class="col-md-10">
									<input type="email" name="user_email_id" value="<?php echo $user_email_id ?>" placeholder="User Email Id ."class="form-control" required>
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Password</label>
									</div>
								<div class="col-md-10">
									<input type="password" name="user_password" value="<?php echo $user_password ?>" placeholder="Password" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<button name="submit" class="btn btn-primary btn-wide pull-right">Create User <i class="fa fa-arrow-circle-right" ></i></button>
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
