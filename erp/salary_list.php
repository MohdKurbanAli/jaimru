<?php 
include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;

if(isset($_GET['status']) && isset($_GET['id'])  )
{
	$status = $_GET['status'];
	$id = $_GET['id'];
	if($status == 'active')
	{
		$st_qry = mysqli_query($class->conn,"UPDATE emp_details SET emp_status = 'Inactive' WHERE emp_id = '$id'");
	}
	if($status == 'inactive')
	{
		$st_qry = mysqli_query($class->conn,"UPDATE emp_details SET emp_status = 'Active' WHERE emp_id = '$id'");
	}
	
}
if(isset($_GET['id']) && $_GET['act']=='del')
{
		$del_res = $class->delete_data('salary','salary_id',$_GET['id']);
		if($del_res)
		{
			echo "<script>alert('data has been deleted')</script>";
		}
}


$qry = mysqli_query($class->conn, "SELECT * FROM salary");
$num_rows = mysqli_num_rows($qry);
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
									<h1 class="mainTitle">Salary Details</h1>
									<span class="mainDescription">Total Entry: <?php echo $num_rows ?></span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span><a href="salary_entry.php">ADD SALARY</a></span>
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
												
												<th class="hidden-xs"> Employee Code</th>
												<th>Date of Joining</th>
												<th class="hidden-xs"> Empployee Name</th>
												<th>Designation</th>
												<th class="hidden-xs"> CTC</th>
												<th>Gross Pay</th>
												<th class="hidden-xs"> Net Pay</th>
												<th>Basic Pay</th>
												<th class="hidden-xs"> HRA</th>
												<th>Conveyance</th>
												<th class="hidden-xs"> PA</th>
												<th>PF Employer</th>
                                                <th>PF Employee</th>
												<th>ESI Employer</th>
												<th>ESI Employee</th>
												<th>TAX</th>
												<th>PF No.</th>
												<th>ESI No.</th>
												<th>Remark 1</th>
												<th>Remark 2</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
											<tr>
                                        <?php 
										while($res = mysqli_fetch_array($qry))
										{
											@extract($res);										
										?>											
												<td><?php echo $sl_emp_code ?></td>
												<td><?php echo $sa_emp_doj ?></td>
												<td><?php echo $sal_emp_name ?></td>
												<td><?php echo $sal_emp_designation ?></td>
												<td><?php echo $sal_ctc ?></td>
												<td><?php echo $sal_gross ?></td>
												<td><?php echo $sal_net ?></td>
												<td><?php echo $sal_basic ?></td>
												<td><?php echo $sal_hra ?></td>
												<td><?php echo $sal_conveyance ?></td>
												<td><?php echo $sal_pa ?></td>
												<td><?php echo $sal_pf_employer ?></td>
												<td><?php echo $sal_pf_emmployee ?></td>
												<td><?php echo $sal_esi_employer ?></td>
												<td><?php echo $sal_esi_employee ?></td>
												<td><?php echo $sal_tax ?></td>
												<td><?php echo $sal_pf_no ?></td>
												<td><?php echo $sal_esi_no ?></td>
												<td><?php echo $sal_remark ?></td>
												<td><?php echo $sal_remark2 ?></td>
												<td><a href="salary_entry.php?id=<?php echo $salary_id; ?>" title="Edit"><i class="ti-pencil-alt"></i></a>	&nbsp;
													<a href="salary_list.php?act=del&id=<?php echo $salary_id; ?>" title="Delete"><i class="fa fa-times fa fa-white"></i></a></td>
												
											</tr>
											<?php
										}?>
										
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
