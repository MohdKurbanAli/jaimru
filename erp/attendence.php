<?php include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;

if(isset($_GET['name']) && isset($_GET['id']) && isset($_GET['wo']))
{
	$emp_name=  $_GET['name'];
	$emp_id	 = $_GET['id'];
	$wo		 = $_GET['wo'];
	
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
		<style>
		.ui-datepicker-calendar {
				display: none;
		}​
		</style>	
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
									<h1 class="mainTitle"><?php echo $emp_name ?> </h1>
									<span class="mainDescription"><?php echo $emp_id ?></span>
								</div>
								<!--<ol class="breadcrumb">
									<li>
										<span>Pages</span>
									</li>
									<li class="active">
										<span>Blank Page</span>
									</li>
								</ol>  -->
							</div>
						</section>
						
						<!-- end: PAGE TITLE -->
						
						
						<form action="" method="post" class="form-horizontal" >
						<div class="form-group">
                            <div class="col-md-2">
                            <label class="" for="Work Order No">Work Order No:</label>
                            </div>
                            <div class="col-md-10">
                    		<?php echo $wo ?>
                            </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-2">
                            <label class="" for="Salary Month">Salary Month</label>
                            </div>
	                        <div class="col-md-10">
                            <input type="text" id="month" name="month" class="monthPicker"   />
    	                    </div>
						</div>
                        <div class="form-group">
                            <div class="col-md-2">
                            <label class="" for="Salary Month">Attedance Month</label>
                            </div>
	                        <div class="col-md-10">
                            <input type="number" id="attandance" name="attandance" pattern="\d*" />
    	                    </div>
						</div>
                        <div class="form-group">
                            <div class="col-md-2">
                            <label class="" for="Salary Month">Leave </label>
                            </div>
	                        <div class="col-md-10">
                            <input type="number" name="leave" />
    	                    </div>
						</div>
                        
                        <?php echo cal_days_in_month ( CAL_GREGORIAN, 03 , 2017) ?>
                        
                        
                        </form>
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
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>
		<script>
		$('#month').datepicker({
			format: 'mm/yyyy',
			
		});
		</script>
        <script>
		$(document).ready(function(e) {
			//alert('Hello');
            $("#emp_work_order").change(function (){
			var wo = document.getElementById("emp_work_order").value;
			//alert(wo);
			$.ajax({
					type:"POST",
					url: "emp.php",
					data: {wo:wo},
					success: function(result)
					{
						alert(result);
					}
				});
			});
        });
		</script>
		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
