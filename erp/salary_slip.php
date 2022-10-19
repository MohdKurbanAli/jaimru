<?php include('includes/top_inc.php'); 
include('includes/class.php');
$class = new baseClass;
if(isset($_GET['id']))
{
	$emp_id = $_GET['id'];
    $days = $_GET['days'];
    $monthyear = $_GET['month'];

    $date = date_parse($monthyear);
    $month = $date['month'];
    $year = $date['year'];
    $days_in_month = cal_days_in_month(CAL_GREGORIAN , $month, $year);

	//$qry = mysqli_query($class->conn, "SELECT * FROM salary WHERE sl_emp_code = '$emp_id'");
	//$qry = mysqli_query($class->conn, "SELECT * FROM emp_details INNER JOIN salary ON salary.sl_emp_code = emp_details.emp_code WHERE sl_emp_code = '$emp_id';");
	$qry = mysqli_query($class->conn, "SELECT * FROM emp_details INNER JOIN salary ON salary.sl_emp_code = emp_details.emp_code INNER JOIN attandace ON attandace.`at_emp_id` = emp_details.`emp_id` 
	WHERE sl_emp_code = '$emp_id' AND attandace.at_month = '$monthyear'");
	$numrow = mysqli_num_rows($qry);
	$res = mysqli_fetch_array($qry);
	@extract($res);
	
	$start_date = date("Y-m-d",strtotime($month."/01/".$year));
	$last_date = date("Y-m-d", strtotime($month."/".$days."/".$year));
	//echo "start ".$start_date;
	//echo "last_date ".$last_date;

	if(($emp_doj >= $start_date) && ($emp_doj <= $last_date) )
	{
		$from = $class->changeSqlToUser_DateFromat($emp_doj);
	}else{
		$from = $class->changeSqlToUser_DateFromat($start_date);
	}
	//echo "<br>From ".$from;		
	
	if(($emp_dor >= $start_date) && ($emp_dor <= $last_date) )
	{
		$to = $class->changeSqlToUser_DateFromat($emp_dor);
	}else{
		$to = $class->changeSqlToUser_DateFromat($last_date);
	}
	//echo "<br>To ".$to;
	$working_days =  ((strtotime($to) - strtotime($from))/(60*60*24)) + 1 ;
     //echo "<br>Working Days ". $working_days;	
	
    $sal_basic = round($sal_basic*$working_days/$days_in_month);
    $sal_pf_emmployee = round($sal_pf_emmployee * $working_days / $days_in_month);
    $sal_hra = round($sal_hra * $working_days / $days_in_month);
    $sal_esi_employee = round($sal_esi_employee * $working_days / $days_in_month);
    $sal_conveyance = round($sal_conveyance * $working_days / $days_in_month);
    $sal_pa = round($sal_pa * $working_days / $days_in_month);
	$sal_special_allowance = round($sal_special_allowance * $working_days / $days_in_month);

	$total_earning = $sal_basic + $sal_hra + $sal_conveyance + $sal_pa + $sal_special_allowance;
	$total_deduction =  $sal_pf_emmployee + $sal_esi_employee;
    $net_pay = $total_earning - $total_deduction;
    $emp_email_first = trim($emp_email_first);
	
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
									<img src="images/logo-invert.png" alt="maujitrip" class="form-group">
									<h1 class="mainTitle">Prakhar Softwares Solution Pvt Ltd. </h1>
									<p>B – 1 / 44, LGF, Malviya Nagar, New Delhi - 110017, India</p>
									<span class="mainDescription"><u>Pay Slip</u></span>
								</div>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<div class="col-md-12 margin-top-30">
                        <table width="100%"  >
                          <tr>
                            <th scope="row">Employee Id</th>
                            <td><?php echo $sl_emp_code; ?></td>
                            <th scope="row">Date Of Joining</th>
                            <td><?php echo $class->sqlToUser_DateTime($emp_doj); ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Employee Name</th>
                            <td><?php echo $emp_name; ?></td>
                            <th scope="row">Salary Month</th>
                            <td><?php echo $monthyear; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">PF Account Number</th>
                            <td><?php echo $sal_pf_no; ?></td>
                            <th scope="row">Days Worked</th>
                            <td><?php echo $working_days; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">ESI Number</th>
                            <td><?php echo $sal_esi_no; ?></td>
                            <th scope="row">Aadhaar No.</th>
                            <td><?php echo $emp_aadhaar_no; ?></td>
							
                          </tr>
						  <tr>
                            <th scope="row">PAN No.</th>
                            <td><?php echo $emp_pan; ?></td>
                            <th scope="row">Bank Name</th>
                            <td><?php echo $emp_bank; ?></td>
                          </tr>
						  <tr>
							<th scope="row">Designation</th>
                            <td><?php echo $emp_designation; ?></td>  
                            <th scope="row">Account No.</th>
                            <td><?php echo $emp_account_no; ?></td>
                          </tr>
						  <tr>
							<th scope="row">UAN No.	</th>
                            <td><?php echo $sal_uan_no; ?></td>  
                          </tr>
                           
                        </table>						
						</div>						
						<hr>
                        <div class="col-lg-12 margin-top-30 table-responsive">
                        <table width="100%" class="table table-condensed" >
                          <tr>
                            <th scope="col">Earning</th>
                            <th scope="col">Amount</th>
							<th scope="col">Deduction</th>
							<th scope="col">Amount</th>
                          </tr>
                          <tr>
                            <td scope="row">Basic Pay</td>
                            <td><?php echo $sal_basic; ?></td>
							<td>Provident Fund</td>
                            <td><?php echo $sal_pf_emmployee; ?></td>
                          </tr>
                          <tr>
                            <td scope="row">HRA</td>
                            <td><?php echo $sal_hra; ?></td>
							<td>Employee State Insurance</td>
                            <td><?php echo $sal_esi_employee; ?></td>
                          </tr>
                          <tr>
                            <td>Conveyance</td>
                            <td><?php echo $sal_conveyance; ?></td>
                              <th></th>
                              <td></td>
						  </tr>
                          <tr>
                            <td>Medical Allowance</td>
                            <td><?php echo $sal_pa; ?></td>
							<td></td>
                            <td></td>
                          </tr>
						  <tr>
                            <td>Special Allowance</td>
                            <td><?php echo $sal_special_allowance; ?></td>
							<td></td>
                            <td></td>
                          </tr>
						  <tr>
                            <th>Gross Salary (Rounded)</th>
							<td><strong><?php echo $total_earning; ?></strong></td>
							<th>Total Deduction (Rounded)</th>
                            <td><strong><?php echo round($total_deduction); ?></strong></td>
                          </tr>	
						  <tr>
                            <th></th>
							<td></td>
                              <th></th>
                              <td></td>

                          </tr>
                            <tr>
                                <th>Net Salary (Rounded)</th>
                                <td colspan="3"><strong><?php echo round($net_pay)." ( ".ucwords($class->getIndianCurrency(round($net_pay)))." )"; ?></strong></td>

                            </tr>
                        </table>
                        </div>
                        <div class="col-md-12" style="margin-top:80px">
						<div class="pull-left">
						<p>Computer generated payslip, No signature required </p>
						</div>
						
                        </div>
                        	<a onclick="javascript:window.print();" class="btn btn-lg btn-primary hidden-print">
						Print <i class="fa fa-print"></i>
					</a>
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
