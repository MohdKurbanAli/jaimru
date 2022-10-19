<?php include('includes/top_inc.php'); 
include('includes/class.php');
$baseclass = new baseClass;
if(isset($_GET['id']))
{
	$wo_id = $_GET['id'];
	$qry = mysqli_query($baseclass->conn,"SELECT * FROM wo_details WHERE wo_id = $wo_id;");
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
					<!--	<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">INVOICE </h1>
								</div>
								
							</div>
						</section> -->
						<!-- end: PAGE TITLE -->
				<div class="container">
					<div class="row">
						<!-- Top table start-->
						<div class="col-md-6" >
						<strong>To:</strong>
                        <p>
                            <?php echo $wo_project_name; ?>, <br>
                            <?php echo $wo_location; ?>, <br>
                            <?php echo $wo_city; ?>
                        </p>
                        </div>
                        <div class="col-md-6" >
                        <table width="100%" border="1">
                          <tr>
                            <th scope="row">Invoicce No.</th>
                            <td><?php echo mt_rand(); ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Invoice Date</th>
                            <td><?php echo date("d/m/Y"); ?></td>
                          </tr>
                          <tr>
                            <th scope="row">WO. No.</th>
                            <td><?php echo $wo_number; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">WO. Date.</th>
                            <td><?php echo $wo_date_of_issue; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Project Name</th>
                            <td><?php echo $wo_project_name; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Project No.</th>
                            <td><?php echo $wo_project_number; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Service Month</th>
                            <td><?php echo "January"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Amendment No.</th>
                            <td><?php echo "NA"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Amendment Date.</th>
                            <td><?php echo "NA"; ?></td>
                          </tr>
                        </table>
						</div>
                     
                        <div class="col-md-12">
						<!-- middle table start-->
						<table width="100%" style="margin: 20px auto;" border="1">
						  <tr>
							<th scope="col">S. No.</th>
							<th scope="col">Category of Services </th>
							<th scope="col">Qty.</th>
							<th scope="col">Unit Rates</th>
							<th scope="col">From</th>
							<th scope="col">To</th>
							<th scope="col">Days</th>
							<th scope="col">Gap In Service</th>
							<th scope="col">Billing</th>
							<th scope="col">Amount</th>
						  </tr>
						  <tr>
							<td>1</td>
							<td><?php echo $wo_project_name; ?></td>
							<td><?php echo $wo_no_of_resources; ?></td>
							<td><?php echo $wo_amount; ?></td>
							<td><?php echo "01/01/2017"; ?></td>
							<td><?php echo "31/01/2017"; ?></td>
							<td><?php echo "22"; ?></td>
							<td><?php echo "4"; ?></td>
							<td><?php echo "22"; ?></td>
							<td><?php echo $wo_amount*22; ?></td>
						  </tr>
						  <tr>
							<td>Sub Total</td>
							<td colspan="8">Service Tax @ 14%</td>
							<td></td>
						  </tr>
							<tr>
							<td></td>
							<td colspan="8">Swachh Bharat Cess @ 0.5%;</td>
							<td>&nbsp;</td>
						  </tr>
							  <tr>
							<td>&nbsp;</td>
							<td colspan="8">&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
							 <tr>
							<td>&nbsp;</td>
							<td colspan="8">&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
							 <tr>
							<td>&nbsp;</td>
							<td colspan="8">&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
							 <tr>
							<td>&nbsp;</td>
							<td colspan="8">&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						</table>
	                    </div>
						
						<div class="col-md-12">
						<table width="100%" style="margin-bottom: 20px auto;" border="1">
                          <tr>
                            <th scope="row">Registration No. of Company	</th>
                            <td><?php echo "U17291UP2011PLC043209"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Employees’ Provident Fund (EPF) Registration No.</th>
                            <td><?php echo "UP/VNS/0059269/000/2013-2014/137658"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Employee’ State Insurance Corporation (ESIC) Registration No.</th>
                            <td><?php echo "28000502580000999"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Labour License No.</th>
                            <td><?php echo "MIRZA 218/494"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Service Tax Registration No. </th>
                            <td><?php echo "AAPCS3358FSD002"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">Sales Tax No.</th>
                            <td><?php echo "9914805493"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">VAT / TIN </th>
                            <td><?php echo "7940424815"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">PAN</th>
                            <td><?php echo "AAPCS3358F"; ?></td>
                          </tr>
                          <tr>
                            <th scope="row">TAN</th>
                            <td><?php echo "KNPS04332G"; ?></td>
                          </tr>
						  <tr>
                            <th scope="row">e-mail</th>
                            <td><?php echo "pradeep.namdeo@maujitrip.com "; ?></td>
                          </tr>
						  <tr>
                            <th scope="row">Website Address</th>
                            <td><?php echo "www.maujitrip.com"; ?></td>
                          </tr>
                        </table>
						</div>
						<div style="float:right; margin:20px auto;">
						<p>For SBC Exports Limited</p>
						</div>
						
					</div>
							
						<div style="float:right; margin:20px auto;">
						<p>Authorized Signatory</p>
						</div>
					<a onclick="javascript:window.print();" class="btn btn-lg btn-primary hidden-print">
						Print <i class="fa fa-print"></i>
					</a>
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
