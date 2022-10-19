<?php include('includes/top_inc.php');
include('includes/class.php');
$class = new baseclass;
$success_msg ="";



if(isset($_GET['id']))
{
    $wo_id = $_GET['id'];
    $emp_qry = mysqli_query($class->conn,"SELECT * FROM emp_details WHERE emp_work_order = '$wo_id'");
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
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
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
									<h1 class="mainTitle">Welcome to maujitrip </h1>
									<span class="mainDescription">Invoice Software</span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span><a href="user_create.php">CREATE USER</a></span>
									</li>									
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw">
							<div class="row">
								<div class="col-md-12">
									
									
									<div class="table-responsive">
									<form action="appointment_letter.php" class="form-horizontal" method="post" enctype="multipart/form-data">
										<table class="table table-striped table-hover table-bordered" id="">
											<thead>
												<tr>
													<th><input type="checkbox" name="all" id="all" ></th>
													<th>Emp Code</th>
													<th>Name</th>
                                                    <th>Email</th>
													<th>Designation</th>
													<th>Location</th>
													
													
												</tr>
											</thead>
											<tbody>
											<?php

											while($res = mysqli_fetch_array($emp_qry))
												{ 
													@extract($res); ?>
												<tr>
													<td><input type="checkbox" name="ids[]" value="<?php echo $emp_id ?>"></td>
													<td><?php echo $emp_code ?></td>
													<td><?php echo $emp_name ?></td>
                                                    <td><?php echo $emp_email_first.", ".$emp_email_second ?></td>
													<td><?php echo $emp_designation ?></td>
													<td><?php echo $emp_place_of_posting ?></td>										
													
												</tr>
												<?php } ?>

                                                <tr>
                                                    <td></td>
                                                </tr>
												 <tr>
                                                     <td>Select Position</td>
													<td>
														<select id="format" name="format" class="form-control" >
                                                            <option value="">Select Format</option>
                                                            <?php $format_qry = mysqli_query($class->conn, "SELECT * FROM appointment_format");
                                                            while($format_res = mysqli_fetch_array($format_qry))
                                                            { ?>
                                                            <option value="<?php echo $format_res['id'] ?>"><?php echo $format_res['name'] ?></option>
                                                            <?php }  ?>
                                                        </select>
													</td>
												</tr>
                                                <tr>
                        
												<td colspan="7">
                                                    <button type="submit" class="btn btn-primary" name="send_appointment" id="send_appointment">Send Appointment</button>
												</td>
												</tr>	
											</tbody>
										</table>
									</form>
									</div>
								</div>
							</div>
						</div>
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
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/DataTables/jquery.dataTables.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/table-data.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
        <script>
			$("#all").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
           

        </script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
