<?php 
include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;
$count = "0";

if(isset($_GET['id']))
{
	$_SESSION['emp_id'] = $_GET['id'];
    $_SESSION['emp_code'] = $_GET['code'];
	$current_date = date('F Y', strtotime('last month'));
	
	print_r($_SESSION);
}
if(isset($_POST['submit']))
{   $month_date = $_POST['month_date'];
    $emp_id = $_POST['emp_id'];
 //   echo $emp_id;
 //   echo $month_date;
 $year = date('Y', strtotime($month_date));
	$month = date('m', strtotime($month_date));

	$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
	
	

    $qry = mysqli_query($class->conn,"SELECT * FROM attandace WHERE at_emp_id = '$emp_id' AND at_month = '$month_date'");
    $res = mysqli_fetch_array($qry);
	
	$at_leave = $res['at_leave'];
	$at_appr_leave = $res['at_appr_leave'];
	
	if($at_appr_leave > $at_leave)
	{
		$gap_in_service =  "0";		
	}else{
		$gap_in_service = $at_leave - $at_appr_leave;
		
	}			
	
	$working_days = $d - $gap_in_service;
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
									<span class="mainDescription">Employee Code: <?php echo $_SESSION['emp_code'] ?></span>
								</div>								
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">

								<div class="col-md-12 mt-20">	


									<form action="salary_month.php" method="post" enctype="multipart/form-data" >
									<input type="hidden" name="emp_id" value="<?php echo $_SESSION['emp_id'] ?>" >
										<div class="form-group ">
										<strong>Select Month </strong>: <input name="month_date" class="month_year" placeholder="mm/yyyy" required  value=""  >
										</div>
										<div class="form-group ">
										<input name="submit" class="btn btn info" type="submit" value="submit"  / >
										</div>
									</form>	
									<label>Woking days : <?php if(($working_days)> 0 ){echo $working_days;}else{ echo "Attandance need to insert.";} ?></label><br>
                                <label>Month: <?php echo $month_date; ?></label>
                                    <?php if(($working_days)> 0 ){ ?>
                                      <a href="salary_slip.php?id=<?php echo $_SESSION['emp_code']; ?>&days=<?php echo $working_days; ?>&month=<?php echo $month_date; ?>" class="btn btn-lg btn-primary hidden-print pull-right" >Print Salary Slip</a>
                                    <?php } ?>

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
            endDate: '+0d',
            autoClose:true
            });
		});



			
		function getMonth(monthStr){
			return new Date(monthStr+'-1-01').getMonth()+1
		}
		function daysInMonth(month,year) {
	    return new Date(year, month, 0).getDate();
		}
		</script>		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
