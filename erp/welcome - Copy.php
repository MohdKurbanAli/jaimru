<?php include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;


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
									<h1 class="mainTitle">Dashboard </h1>
									<span class="mainDescription">Welcome to maujitrip</span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Home</span>
									</li>
									<li class="active">
										<span>Welcome</span>
									</li>
								</ol>  
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Manage Users</h2>
											<p class="text-small">
												Add users, delete user and activate/deactivate user you need to be signed in as the super user.
											</p>
											<p class="links cl-effect-1">
												<a href="admin_user_list.php">
													view more
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Manage Orders</h2>
											<p class="text-small">
												The Manage Orders tool provides a view of all your orders.
											</p>
											<p class="cl-effect-1">
												<a href="order_list.php">
													view more
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Manage Employee</h2>
											<p class="text-small">
												Add, modify, and extract information of employee. Get salary slip of employee.
											</p>
											<p class="links cl-effect-1">
												<a href="emp_list.php">
													view more
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>

						</div>

                        <!-- start: SECOND SECTION -->
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="panel panel-white no-radius">
                                        <div class="panel-body">
                                            <div class="partition-light-grey padding-15 text-center margin-bottom-20">
                                                <h4 class="no-margin">CCR</h4>
                                                <span class="text-light">Current Conversion Ratio</span>
                                            </div>
                                            <div id="accordion" class="panel-group accordion accordion-white no-margin">
                                                <div class="panel no-radius">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15">
                                                                <i class="icon-arrow"></i>
                                                                Assign Work
                                                            </a></h4>
                                                    </div>
                                                    <div class="panel-collapse collapse in" id="collapseOne">
                                                        <div class="panel-body no-padding partition-light-grey">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="center">S.N.</td>
                                                                        <td>User</td>
                                                                        <td class="center">Work</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $user_count = 1;
                                                                $ccr_qry = mysqli_query($class->conn,"SELECT ud_assignto, COUNT(*) AS total FROM upload_data GROUP BY ud_assignto;");
                                                                while($ccr_res = mysqli_fetch_array($ccr_qry)){
                                                                ?>
                                                                <tr>
                                                                    <td class="center"><?php echo $user_count ?></td>
                                                                    <td><?php echo $ccr_res['ud_assignto']; ?></td>
                                                                    <td class="center"><?php echo $ccr_res['total']; ?></td>
                                                                </tr>
                                                                <?php   $user_count += 1; } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-white no-radius">
                                        <div class="panel-heading border-bottom">
                                            <h4 class="panel-title">Work Status</h4>
                                        </div>
                                        <?php $c_qry = mysqli_query($class->conn,"SELECT COUNT(*) AS closed FROM upload_data WHERE ud_status = 'Closed'");
                                                $c_res = mysqli_fetch_array($c_qry);
                                                $closed_status = $c_res[0];

                                        $r_qry = mysqli_query($class->conn,"SELECT COUNT(*) AS Running FROM upload_data WHERE ud_status = 'Running'");
                                        $r_res = mysqli_fetch_array($r_qry);
                                        $running_status = $r_res[0];

                                        $con_qry = mysqli_query($class->conn,"SELECT COUNT(*) AS Converted FROM upload_data WHERE ud_status = 'Converted'");
                                        $con_res = mysqli_fetch_array($con_qry);
                                        $converted_status = $con_res[0];

                                        $total_work = $converted_status +  $running_status + $closed_status;
                                        ?>
                                        <div class="panel-body">
                                            <div class="text-center">
                                                <span class="mini-pie"> <canvas id="chart3" class="full-width"></canvas> <span><?php echo $total_work ?> </span> </span>
                                                <span class="inline text-large no-wrap">Acquisition</span>
                                            </div>
                                            <div class="margin-top-20 text-center legend-xs inline">
                                                <div id="chart3Legend" class="chart-legend"></div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="clearfix padding-5 space5">
                                                <div class="col-xs-4 text-center no-padding">
                                                    <div class="border-right border-dark">
                                                        <span class="text-bold block text-extra-large" id="running_status"><?php echo $running_status ?></span>
                                                        <span class="text-light">Ruuning</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 text-center no-padding">
                                                    <div class="border-right border-dark">
                                                        <span class="text-bold block text-extra-large" id="converted_status"><?php echo $converted_status ?></span>
                                                        <span class="text-light">Converted</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 text-center no-padding">
                                                    <span class="text-bold block text-extra-large" id="closed_status"><?php echo $closed_status ?></span>
                                                    <span class="text-light">Closed</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: SECOND SECTION -->

                        <!-- start: FIRST SECTION -->
                        <div class="container-fluid container-fullw padding-bottom-10">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-7 col-lg-8">
                                            <div class="panel panel-white no-radius" id="visits">
                                                <div class="panel-heading border-light">
                                                    <h4 class="panel-title"> Visits </h4>
                                                    <ul class="panel-heading-tabs border-light">
                                                        <li>
                                                            <div class="pull-right">
                                                                <div class="btn-group">
                                                                    <a class="padding-10" data-toggle="dropdown">
                                                                        <i class="ti-more-alt "></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-light" role="menu">
                                                                        <li>
                                                                            <a href="#">
                                                                                Action
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                Another action
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">
                                                                                Something else here
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="rate">
                                                                <i class="fa fa-caret-up text-primary"></i><span class="value">15</span><span class="percentage">%</span>
                                                            </div>
                                                        </li>
                                                        <li class="panel-tools">
                                                            <a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div collapse="visits" class="panel-wrapper">
                                                    <div class="panel-body">
                                                        <div class="height-350">
                                                            <canvas id="chart1" class="full-width"></canvas>
                                                            <div class="margin-top-20">
                                                                <div class="inline pull-left">
                                                                    <div id="chart1Legend" class="chart-legend"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-lg-4">
                                            <div class="panel panel-white no-radius">
                                                <div class="panel-heading border-light">
                                                    <h4 class="panel-title"> Acquisition </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <h3 class="inline-block no-margin">26</h3> visitors on-line
                                                    <div class="progress progress-xs no-radius">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                            <span class="sr-only"> 40% Complete</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h4 class="no-margin">15</h4>
                                                            <div class="progress progress-xs no-radius no-margin">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                                    <span class="sr-only"> 80% Complete</span>
                                                                </div>
                                                            </div>
                                                            Direct
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h4 class="no-margin">7</h4>
                                                            <div class="progress progress-xs no-radius no-margin">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                                    <span class="sr-only"> 60% Complete</span>
                                                                </div>
                                                            </div>
                                                            Sites
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h4 class="no-margin">4</h4>
                                                            <div class="progress progress-xs no-radius no-margin">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                                    <span class="sr-only"> 40% Complete</span>
                                                                </div>
                                                            </div>
                                                            Search
                                                        </div>
                                                    </div>
                                                    <div class="row margin-top-30">
                                                        <div class="col-xs-4 text-center">
                                                            <div class="rate">
                                                                <i class="fa fa-caret-up text-green"></i><span class="value">26</span><span class="percentage">%</span>
                                                            </div>
                                                            Mac OS X
                                                        </div>
                                                        <div class="col-xs-4 text-center">
                                                            <div class="rate">
                                                                <i class="fa fa-caret-up text-green"></i><span class="value">62</span><span class="percentage">%</span>
                                                            </div>
                                                            Windows
                                                        </div>
                                                        <div class="col-xs-4 text-center">
                                                            <div class="rate">
                                                                <i class="fa fa-caret-down text-red"></i><span class="value">12</span><span class="percentage">%</span>
                                                            </div>
                                                            Other OS
                                                        </div>
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <div class="height-180">
                                                            <canvas id="chart2" class="full-width"></canvas>
                                                            <div class="inline pull-left legend-xs">
                                                                <div id="chart2Legend" class="chart-legend"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: FIRST SECTION -->


						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
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
        <script src="vendor/Chart.js/Chart.min.js"></script>
        <script src="vendor/jquery.sparkline/jquery.sparkline.min.js"></script>
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
        <script src="assets/js/index.js"></script>
        <!-- start: JavaScript Event Handlers for this page -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
                Index.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
