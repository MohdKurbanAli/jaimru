<?php include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];											
 ?>														
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Dashboard | Jaimru Technology Pvt Ltd</title>
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
									<span class="mainDescription">Welcome to Jaimru Technology Pvt Ltd</span>
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
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
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
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Manage Customers</h2>
											<p class="text-small">
												The Manage Orders tool provides a view of all your orders.
											</p>
											<p class="cl-effect-1">
												<a href="customer.php">
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
											<h2 class="StepTitle">Manage Invoice</h2>
											<p class="text-small">
												Add, modify, and extract information of employee. Get salary slip of employee.
											</p>
											<p class="links cl-effect-1">
												<a href="invoice-list.php">
													view more
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
								
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Total Amount</h2>
											<p class="text-small">
 
                                        <?php
											 $finalamount = 0;
                                            $query = mysqli_query($class->conn, "SELECT * FROM `invoice`");
                                            while ($res = mysqli_fetch_array($query))
										{
											@extract($res);
											 $amount = json_decode($amount);
                                              foreach ($amount as $amt) 
											{
                                                $finalamount = $finalamount + $amt;
                                            }
										}
									     ?>
                                            <h4 class="text-bold" style="color:#1B1464"><?php echo  number_format($finalamount, 2, '.', ''); ?></h4></p>
                                                         											
										  <!-- 	<p class="links cl-effect-1">
												<a href="admin_user_list.php">
													view more
												</a>
											</p>-->
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Purchase Amount</h2>
											<p class="text-small">
												
                                                            <?php
                                              $query = mysqli_query($class->conn, "SELECT SUM(`purchase_payment_amount`) AS total FROM `purchase_products`");
                                           $res = mysqli_fetch_array($query);
										   
										   											@extract($res);

										
                                                            ?>
                                                       <h4 class="text-bold" style="color:#1B1464"><?php echo number_format($total, 2, '.', ''); ?>
                                                         											</h4></p>
											<!--<p class="cl-effect-1">
												<a href="customer.php">
													view more
												</a>
											</p>-->
										</div>
									</div>
								</div>
							<!--<div class="col-sm-3">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Due Amount</h2>
											<p class="text-small">
												Add, modify, and extract information of employee. Get salary slip of employee.
											</p>
											<p class="links cl-effect-1">
												<a href="invoice-list.php">
													view more
												</a>
											</p>>
										</div>
									</div>
								</div>-->
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Gross Profit</h2>
											<p class="text-small">
												<h4 class="text-bold" style="color:#1B1464"><?php echo number_format($finalamount - $total, 2, '.', '');?></h4>
											</p>
											<!--<p class="links cl-effect-1">
												<a href="invoice-list.php">
													view more
												</a>
											</p>-->
										</div>
									</div>
								</div>
							</div>
						</div>
			<?php
				$new_array  = 0;
				for($i=1; $i<=12; $i++)
				{
					$current_year = date("Y");
						if($i == 1 ){
							$start_date = $current_year."-01-01";
							$end_date = $current_year."-01-31";
						}
						if($i == 2 ){
							$start_date = $current_year."-02-01";
							$end_date = $current_year."-02-29";
						}
						if($i == 3 ){
							$start_date = $current_year."-03-01";
							$end_date = $current_year."-03-31";
						}
						if($i == 4 ){
							$start_date = $current_year."-04-01";
							$end_date = $current_year."-04-30";
						}
						if($i == 5 ){
							$start_date = $current_year."-05-01";
							$end_date = $current_year."-05-31";
						}
						if($i == 6 ){
							$start_date = $current_year."-06-01";
							$end_date = $current_year."-06-30";
						}
						if($i == 7 ){
							$start_date = $current_year."-07-01";
							$end_date = $current_year."-07-31";
						}
						if($i == 8 ){
							$start_date = $current_year."-08-01";
							$end_date = $current_year."-08-31";
						}
						if($i == 9 ){
							$start_date = $current_year."-09-01";
							$end_date = $current_year."-09-30";
						}
						if($i == 10 ){
							$start_date = $current_year."-10-01";
							$end_date = $current_year."-10-31";
						}
						if($i == 11 ){
							$start_date = $current_year."-11-01";
							$end_date = $current_year."-11-30";
						}
						if($i == 12 ){
							$start_date = $current_year."-12-01";
							$end_date = $current_year."-12-31";
						}			
			  $qry = mysqli_query($class->conn,"SELECT * FROM `invoice` WHERE `in_date` BETWEEN '$start_date' AND '$end_date' GROUP BY YEAR(`in_date`), MONTH(`in_date`)");
				 
				  while ($res = mysqli_fetch_array($qry))
										{
											@extract($res);
											
											 $amount = json_decode($amount);
                                              foreach ($amount as $amt) 
											{
                                                $finalamount = $finalamount + $amt;
												

                                            }
											$j_array[] =  $finalamount;
										}
							

									 }
									$out = array_values($j_array);
									$prin_data =  json_encode($out);
		
		// echo "ddff".$prin_data;
		?>
    <!-- start: FIRST SECTION -->
                        <div class="container-fluid container-fullw padding-bottom-10">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="panel panel-white no-radius" id="visits">
                                                <div class="panel-heading border-light">
                                                    <h4 class="panel-title"> Amount </h4>
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
                                       <!-- <div class="col-md-5 col-lg-4">
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
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: FIRST SECTION -->
      <!-- start: SECOND SECTION -->
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-white no-radius">
                                        <div class="panel-body">
                                            <div class="partition-light-grey padding-15 text-center margin-bottom-20">
                                                <h4 class="no-margin">Recent Invoice</h4>
                                                <span class="text-light">Last 5 Invoice</span>
                                            </div>
                                            <div id="accordion" class="panel-group accordion accordion-white no-margin">
                                                <div class="panel no-radius">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15">
                                                                <i class="icon-arrow"></i>
                                                                Invoice
                                                            </a></h4>
                                                    </div>
                                                    <div class="panel-collapse collapse in" id="collapseOne">
                                                        <div class="panel-body no-padding partition-light-grey">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <td>Invoice</td>
                                                                        <td>Amount</td>
                                                                        <td>Tax</td>
                                                                        <td>Invoice Date</td>
                                                                        <td>Due Date</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $user_count = 1;
                                                                $ccr_qry = mysqli_query($class->conn,"SELECT * FROM invoice ORDER BY in_id DESC LIMIT 0,5;");
                                                                while($ccr_res = mysqli_fetch_array($ccr_qry)){
																	
																	
																	// echo "fggf".$test;
                                                                ?>
                                                                <tr>
                                                                    <td><a href="invoice_view.php?id=<?php echo $ccr_res['in_id'] ?>" target="_blank"><?php echo "MT0".$ccr_res['in_id']; ?></td>
                                                                    <td><?php
                                                                        $amount = json_decode($ccr_res['amount']);
                                                                        $finalamount = 0;
                                                                        foreach ($amount as $amt)
                                                                        {
                                                                            $finalamount = $finalamount + $amt;
                                                                        }
                                                                        echo "Rs. ".$class->moneyFormatIndia($finalamount);
                                                                        ?></td>
                                                                    <td><?php echo "Rs. ".$class->moneyFormatIndia($finalamount * 18/100); ?></td>
                                                                    <td><?php echo $ccr_res['in_date']; ?></td>
                                                                    <td><?php echo $ccr_res['ex_date']; ?></td>

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
                               
                            </div>
                        </div>
                        <!-- end: SECOND SECTION -->

                       
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
        <!-- start: JavaScript Event Handlers for this page -->
		<script>
		'use strict';
var Index = function() {
	var chart1Handler = function() {
		var data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Month Report',
				fillColor: 'rgba(151,187,205,0.2)',
				strokeColor: 'rgba(151,187,205,1)',
				pointColor: 'rgba(151,187,205,1)',
				pointStrokeColor: '#fff',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(151,187,205,1)',
				data: <?php echo $prin_data; ?>
			}]
		};

		var options = {

			maintainAspectRatio: false,

			// Sets the chart to be responsive
			responsive: true,

			///Boolean - Whether grid lines are shown across the chart
			scaleShowGridLines: true,

			//String - Colour of the grid lines
			scaleGridLineColor: 'rgba(0,0,0,.05)',

			//Number - Width of the grid lines
			scaleGridLineWidth: 1,

			//Boolean - Whether the line is curved between points
			bezierCurve: false,

			//Number - Tension of the bezier curve between points
			bezierCurveTension: 0.4,

			//Boolean - Whether to show a dot for each point
			pointDot: true,

			//Number - Radius of each point dot in pixels
			pointDotRadius: 4,

			//Number - Pixel width of point dot stroke
			pointDotStrokeWidth: 1,

			//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
			pointHitDetectionRadius: 20,

			//Boolean - Whether to show a stroke for datasets
			datasetStroke: true,

			//Number - Pixel width of dataset stroke
			datasetStrokeWidth: 2,

			//Boolean - Whether to fill the dataset with a colour
			datasetFill: true,

			// Function - on animation progress
			onAnimationProgress: function() {
			},

			// Function - on animation complete
			onAnimationComplete: function() {
			},

			//String - A legend template
			legendTemplate: '<ul class="tc-chart-js-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].strokeColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
		};
		// Get context with jQuery - using jQuery's .get() method.
		var ctx = $("#chart1").get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var chart1 = new Chart(ctx).Line(data, options);
		//generate the legend
		var legend = chart1.generateLegend();
		//and append it to your page somewhere
		$('.chart1Legend').append(legend);
	};
	return {
		init: function() {
			chart1Handler();
		}
	};
}();

		
			jQuery(document).ready(function() {
				Main.init();
                Index.init();
			});
			
			
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
