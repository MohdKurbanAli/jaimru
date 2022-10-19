<?php 
include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;

if(isset($_GET['id']) && $_GET['act']=='del')
{
		$del_res = $class->delete_data('wo_details','wo_id',$_GET['id']);
		if($del_res)
		{
			echo "<script>alert('data has been deleted')</script>";
		}
}
$qry = mysqli_query($class->conn, "SELECT * FROM wo_details");
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
									<h1 class="mainTitle">Work Order(s) List</h1>
									<span class="mainDescription"></span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span><a href="order_entry.php" class="btn btn-default">Create Work Order</a></span>
									</li>									
								</ol>
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
										<thead>
											<tr>
												<th>Oraganisation</th>
												<th class="hidden-xs">WO Number</th>
												<th>Issue Date</th>
												<th class="hidden-xs"> Project Name</th>
												<th>Resources</th>
												<th class="hidden-xs"> Duration</th>
												<th>Start Date</th>
												<th class="hidden-xs"> End Date</th>
												<th>Location</th>
												<th class="hidden-xs"> City</th>
												<th>Amount</th>
												<th class="hidden-xs"> Project Coordinator</th>
												<th>Status</th>
												<th>Attachement</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
                                        <?php 
										while($res = mysqli_fetch_array($qry))
										{
											@extract($res);
										
										?>
											<tr>
												<td><?php echo $wo_oraganisation_name ?></td>
												<td><a href="wo_emp_list.php?id=<?php echo $wo_number ?>"><?php echo $wo_number ?></a></td>
												<td><?php echo $wo_date_of_issue ?></td>
												<td><?php echo $wo_project_name ?></td>
												<td><?php echo $wo_no_of_resources ?></td>
												<td><?php echo $wo_project_duration ?></td>
												<td><?php echo $wo_start_date ?></td>
												<td><?php echo $wo_end_date ?></td>
												<td><?php echo $wo_location ?></td>
												<td><?php echo $wo_city ?></td>
												<td><?php echo $wo_amount ?></td>
												<td><?php echo $wo_project_coordinator ?></td>
												<td><?php echo $wo_status ?></td>
												<td>
													<?php if($wo_attached_file!=""){ ?>
														<a href="uploaded_files/<?php echo $wo_attached_file ?>" >Uploaded</a>
													<?php } else{ echo "Not Uploaded"; }  ?>
												</td>
												
												<td>
													<a href="order_entry.php?id=<?php echo $wo_id; ?>" title="Edit"><i class="ti-pencil-alt"></i> Edit</a> 
											<!--		<a href="order_list.php?act=del&id=<?php // echo $wo_id; ?>" title="Delete"><i class="fa fa-times fa fa-white"></i></a>  -->
													
												</td>
												
											</tr>
                                           <?php
										}
										?>
											
										</tbody>
									</table>
                                    </div>
								</div>
							</div>
						</div>
						<!-- end: DYNAMIC TABLE -->
						
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
