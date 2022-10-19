<?php 
include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;
$count = "0";
if (isset($_POST['update'])) {	
	$i = count($_POST['ids']);
	for($j = 0; $j<$i; $j++)
	{
		$id =  $_POST['ids'][$j];
		$at_appr_leave =  $_POST['at_appr_leave'][$j];
		$leave= $_POST['leave'][$j];
		$month = $_POST['month'];		
		$at_emp = $id."".$month;
		$wo_id = $_POST['wo_id'];
	
		$sql = "
		at_emp = '$at_emp',
		at_emp_id = '$id',
		at_month = '$month',		
		at_appr_leave = '$at_appr_leave',
		at_leave = '$leave'";			
		$chk_qry = mysqli_query($class->conn,"SELECT * FROM attandace WHERE at_emp = '$at_emp'");
		$chk_num = mysqli_num_rows($chk_qry);		
		
		if($chk_num =="0" || $chk_num ==0)
		{
			$qry = mysqli_query($class->conn, "INSERT attandace SET $sql") ;		
			if($qry)
			{
				$_SESSION['msg'] = "Attandance has been added";				
			}
			else
			{
				$_SESSION['error'] = mysqli_error($class->conn);
			}  
		}
		else
		{	
			$qry = mysqli_query($class->conn, "UPDATE attandace SET $sql WHERE at_emp = '$at_emp'") ;
			if($qry)
			{
				$_SESSION['msg'] = "Attandance has been updated";		
						
			}
			else
			{
				$_SESSION['error'] = mysqli_error($class->conn);
			}
		
		}
		header('Location: wo_emp_list.php?id='.$wo_id);
	}
		
}
if(isset($_POST['submit-view']))
{
	$wo_id = $_POST['wo_id'];
	$month_date = $_POST['month_date'];
	$qry = mysqli_query($class->conn,"SELECT * FROM attandace INNER JOIN emp_details ON attandace.at_emp_id = emp_details.emp_id WHERE attandace.at_month = '$month_date' AND emp_details.emp_work_order = '$wo_id'");
	$numrow = mysqli_num_rows($qry);
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
		<link rel="stylesheet" href="vendor/bootstrap-datepicker/bootstrap-datepicker.css">
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
									<span class="mainDescription">Work Order : <?php echo $wo_id ?></span>
									<span class="mainDescription">Total Entry : <?php echo $numrow; ?></span>
								</div>								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">									
                                     <?php if($numrow==0){
										echo "<h1>No Record Found</h1>";
									}
									else { ?>       						
									<div class="table-responsive">
									<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<input type="hidden" name="wo_id" value="<?php echo $wo_id ?>" >
                                    <div >
									<h4 class="text-success">
									<?php 
									if(isset($msg))	{echo $msg;	}	
									?>
                                    </h4>
									</div>
									<div class="text-danger">
									<?php 
										if(isset($error)){echo "Attendance already exist for this month"; } ?>
                                    
									</div>
									<div class="form-group text-center">
									<strong>Salary Month </strong>: 
									<input name="month" id="month" class="month_year" placeholder="mm/yyyy" required  value="<?php echo $month_date ?>"   / >																
									</div>
									
									<table class="table table-striped table-bordered table-hover table-full-width" id="">
										<thead>
											<tr>
												<th><input type="checkbox" name="all" id="all" ></th>
												<th>Code</th>
												<th>Name</th>
												<th>Approved Leave</th>
												<th width="8%">LWP </th>
												<th>Gender</th>
                                                <th> Joining Date</th>
                                                <th> DOR</th>
												<th> Posting Place</th>
												<th>Designation</th>
											</tr>
										</thead>
										<tbody>
                                        <?php 
										while($res = mysqli_fetch_array($qry))
										{
											@extract($res);											
										?>
											<tr>
												<td>
                                                <input type="checkbox" name="ids[]" value="<?php echo $emp_id; ?>" required ></td>
												<td><?php echo $emp_code ?></td>
												<td><a href="employee_details.php?id=<?php echo $emp_id ;?>"><?php echo $emp_name ?></a></td>
												<th><input name="at_appr_leave[]" type="number"  maxlength="2" max="31" min="0" required class="form-control" value="<?php echo $at_appr_leave ?>" > </th>
												<th><input name="leave[]"type="number"  maxlength="2" max="31" min="0" required class="form-control" value="<?php echo $at_leave ?>" ></th>
												<td><?php echo $emp_gender ?></td>
												<td><?php echo $class->changeSqlToUser_DateFromat($emp_doj) ?></td>
                                                <td><?php echo $class->changeSqlToUser_DateFromat($emp_dor) ?></td>
												<td><?php echo $emp_place_of_posting ?></td>
												<td><?php echo $emp_designation ?></td>
																					
											</tr>
                                           <?php
										}
										?>										
										</tbody>										
									</table>
									
									<button type="submit" class="btn btn-info  margin-left margin-bottom" name="update">Add Attendance</button>
                                    <a href="invoice_slip.php?wo=<?php echo $wo_id ?>&month=<?php echo $month_date ?>" class="btn btn-primary pull-right" target="_blank">Generate Invoice</a>

									</form>
                                    </div>
									<?php
										}
										?>
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
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
		<script>
		$(function() {
    $('.month_year').datepicker({
  		format: 'MM yyyy',
    	viewMode: "months", 
    	minViewMode: "months",
        autoClose:true
	});
});	
		$("#all").click(function () {
			$('input:checkbox').not(this).prop('checked', this.checked);
		});
		</script>
		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
