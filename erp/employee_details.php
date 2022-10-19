<?php include('includes/top_inc.php'); 
include('includes/class.php');
$class = new baseClass;

if(isset($_GET['id']))
{
	$emp_id = $_GET['id'];
	$qry = mysqli_query($class->conn,"SELECT * FROM emp_details WHERE emp_id = $emp_id;");
	$res= mysqli_fetch_array($qry);
	@extract($res);
	
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
									<h1 class="mainTitle"><?php echo $emp_name; ?> </h1>
									<span class="mainDescription"><?php echo $emp_code; ?></span>
								</div>
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<table width="100%" class="table table-hover table-responsive table-bordered bg-white" >
  
                          <tr>
                            <th scope="row">Gender</th>
                            <td><?php echo $emp_gender; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Date Of Birth</th>
                            <td><?php echo $emp_dob; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Work Order</th>
                            <td><?php echo $emp_work_order; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Posting Place</th>
                            <td><?php echo $emp_place_of_posting; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Qaulification</th>
                            <td><?php echo $emp_qualification; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Father Name</th>
                            <td><?php echo $emp_father_name; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Designation</th>
                            <td><?php echo $emp_designation; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Date Of Joining</th>
                            <td><?php echo $emp_doj; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Salary</th>
                            <td><?php echo $emp_salary; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">PAN No</th>
                            <td><?php echo $emp_pan; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Account No</th>
                            <td><?php echo $emp_account_no; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Bank Name</th>
                            <td><?php echo $emp_bank; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">IFSC Code</th>
                            <td><?php echo $emp_ifsc; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Blood Group</th>
                            <td><?php echo $emp_blood_group; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Permanent Address</th>
                            <td><?php echo $emp_permanent_address; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Local Address</th>
                            <td><?php echo $emp_local_address; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">City</th>
                            <td><?php echo $emp_city; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">State</th>
                            <td><?php echo $emp_state; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Phone No.</th>
                            <td><?php echo $emp_phone_first; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Alternate Phone no</th>
                            <td><?php echo $emp_phone_second; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td><?php echo $emp_email_first; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Alternate Email</th>
                            <td><?php echo $emp_email_second; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Emergency Contact No.</th>
                            <td><?php echo $emp_emergency_contact; ?></td>
                          </tr>
                        </table>
<!--<a href="attendence.php?name=<?php echo $emp_name; ?>&id=<?php echo $emp_code; ?>&wo=<?php echo $emp_work_order; ?>" class="btn btn-lg btn-primary hidden-print" >Attendance</a>  -->
<a href="salary_month.php?id=<?php echo $emp_id; ?>&code=<?php echo $emp_code; ?>" class="btn btn-lg btn-primary hidden-print pull-right" >Print Salary Slip</a>

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
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
