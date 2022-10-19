<?php include('includes/top_inc.php'); 
include('includes/class.php');
$class = new baseClass;
if(isset($_GET['wo'])&& isset($_GET['month']) )
{
	$wo_number = trim($_GET['wo']);
	$month_date = trim($_GET['month']);
    $projectno = trim($_GET['projectno']);
    $wostart = trim($_GET['wostart']);
    $woend = trim($_GET['woend']);
    $periodfrom = trim($_GET['periodfrom']);
    $totalmanpower = trim($_GET['totalmanpower']);
    $invoice_number = trim($_GET['invoice_number']);
    $billamount = trim($_GET['billamount']);







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
		<style>
			body{
				font-size: 11px !important;
				background-color:#fff !important;
				color:#000 !important;
			}
			.table tr td {
			padding: 1px !important;
			 line-height: 1.42857143; 
			vertical-align: top !important;			
			color:#000 !important;
			}
			.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-bottom: 1px solid #000;
    color: #000 !important; 
    border-top: none;
	border-right: 1px solid #000;
}
.table-bordered {
    border: 1px solid #000;
}
		@page  
{ 
    
size: auto;   /* auto is the initial value */	
    /* this affects the margin in the printer settings */ 
    margin: 0;
} 

body  
{ 
    /* this affects the margin on the content before sending to printer  */ 
    margin: 10mm 0mm 50mm 0mm;  
} 
		</style>
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
						
							<div class="row text-center">
								<div class="col-sm-12">
									<h5>National Informatics Center, New Delhi</h5>
                                    <h5>Bill Submission Form</h5>
								</div>
								 
							</div>
						<?php $wdq = mysqli_query($class->conn, "SELECT * FROM `wo_details` WHERE wo_number = '$wo_number'");
							$wdq_res = mysqli_fetch_array($wdq); ?>
						<!-- end: PAGE TITLE -->
						<div class="col-md-12 margin-top-30">
                            <p><strong>Name of the vendor:- SBC Exports Limited, New Delhi</strong></p>
                            <p><strong> &#8544;. General Details:-</strong></p>
                        <table width="100%" class=" table table-bordered">
                          <tr>
                            <td width="30%"> Project No.</td>
                            <td width="20%"><?php echo $projectno ?></td>
                            <td>Regular / Backdated WO</td>
                            <td><input type="text" style="border-style: none; background-color: transparent; border: 0px solid;
                                height: 15px; width: 160px; color: #000; font-size: inherit;padding: 0px;" value="Regular / Backdated"></td>
                          </tr>
                            <tr>
                                <td width="30%"> WO / AO No.</td>
                                <td width="20%"><?php echo $wo_number ?></td>
                                <td>WO / AO Date</td>
                                <td><?php echo $periodfrom; ?></td>
                            </tr>
                            <tr>
                                <td width="30%"> Period of WO Form</td>
                                <td width="20%"><?php echo $class->changeSqlToUser_DateFromat($wostart); ?></td>
                                <td>To</td>
                                <td><?php echo $class->changeSqlToUser_DateFromat($woend); ?></td>
                            </tr>
                            <tr>
                                <td width="30%"> No. of Bill as per WO</td>
                                <td width="20%">1</td>
                                <td>Bill Count No.</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td width="30%"> No. Of Manpower</td>
                                <td width="20%"><?php echo $totalmanpower ?></td>
                                <td>Category</td>
                                <td>Support Service</td>
                            </tr>
                            <tr>
                                <td width="30%"> Milestone base</td>
                                <td width="20%">X</td>
                                <td>Stage of % (if Milestone Base)</td>
                                <td>NA</td>
                            </tr>


                        </table>						
						</div>						

                        <div class="col-lg-12 margin-top-15 ">
                            <p><strong> &#8544;&#8544;. Check List:- </strong></p>
                            <table width="100%" class=" table table-bordered">
                                <tr>
                                    <td width="30%"> Particulars</td>
                                    <td width="20%">Tick (Yes / No)</td>
                                    <td>NICSI Observations</td>

                                </tr>
                                <tr>
                                    <td width="30%"> Copy of WO & AO if Applicable</td>
                                    <td width="20%">Yes</td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td width="30%"> Triplicate Invoices</td>
                                    <td width="20%">Yes</td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td width="30%"> Attendance Certificate</td>
                                    <td width="20%">Yes</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="30%"> Proff of Payment</td>
                                    <td width="20%">Yes</td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td width="30%"> Short Manpower (if applicable)</td>
                                    <td width="20%"><input type="text" style="border-style: none; background-color: transparent; border: 0px solid;
                                height: 15px; width: 160px; color: #000; font-size: inherit;padding: 0px;" value="Yes / NA"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="30%"> BG Attached (if applicable)</td>
                                    <td width="20%">NA</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="30%"> Any Other</td>
                                    <td width="20%">NA</td>
                                    <td></td>
                                </tr>


                            </table>

                        </div>
                        <div class="col-lg-12 margin-top-15 ">
                            <p><strong> &#8544;&#8544;&#8544;. Invoice Details:- </strong></p>
                            <table width="100%" class=" table table-bordered">
                                <tr>
                                    <td width="30%"> Invoice No. & Date</td>
                                    <td width="20%">Month & Year</td>
                                    <td>Bill Amount</td>
                                    <td>CGST(9%)</td>
                                    <td>SGST(9%)</td>
                                    <td>Total Amount</td>

                                </tr>
                                <tr>
                                    <td width="30%"> <?php echo $invoice_number ?><br>Dated <?php echo $periodfrom; ?></td>
                                    <td width="20%"><?php echo $month_date ?></td>
                                    <td><?php echo $billamount ?></td>
                                    <td><?php echo ($billamount*9)/100; ?></td>
                                    <td><?php echo ($billamount*9)/100; ?></td>
                                    <td><?php echo $billamount + (($billamount*9)/100) + (($billamount*9)/100); ?> </td>
                                </tr>
                            </table>
                        </div>
						<div class="col-md-12 margin-top-15">
                            <p><strong> &#8544;&#8897;. This is certify that:- </strong></p>
                            <p>&#8544;. Previous months bills(s) of the WO is not pending for payment. No claims for payment will be made
                            against the WO for previous months.</p>
                            <p>&#8544;&#8544;. A complete / Full service bill for the month is submitted & paid.</p><br>
                            <div class="col-md-6">
                                <p>Mobile No. - 9910810847</p>
                                <p>Email id - pradeep.namdeo@maujitrip.com</p>
                            </div>
                            <div class="col-md-6 text-right" >
                                <p>Signature & Seal of the Vendor</p>
                            </div>
                            <div class="clearfix"></div>
                            <p>(Project Manager - <input type="text" style="border-style: none; background-color: transparent; border: 0px solid;
                                height: 15px; width: 160px; color: #000; font-size: inherit;padding: 0px; " value="Mr. R. K. Raina )"></p>
                            <hr>
                            <p><strong>&#8897;. For Office Use:-</strong></p>

						 <table width="100%" class="table table-bordered">
							 <tr class="text-center">
                                 <td width="50%" colspan="2"><strong>NICSI Accounts (Provisions)</strong></td>
								 <td colspan="2"><strong>Project</strong></td>
							 </tr>
							 <tr>
                                 <td width="25%">Amount</td>
                                 <td></td>
                                 <td width="25%">Bill Amount</td>
                                 <td></td>
							</tr>
							<tr>
                                <td>Penalty</td>
                                <td></td>
                                <td>OM ___________%</td>
                                <td></td>
                             </tr>
                             <tr>
                                 <td>TDS</td>
                                 <td></td>
                                 <td>GST</td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Net Amount</td>
                                 <td></td>
                                 <td>Total Amount</td>
                                 <td></td>
                             </tr>
                             <tr>
                                 <td>Signature DM (Account)</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
						 </table>
						 </div>
                        <div class="col-md-12" style="margin-top:20px">
                        </div>
                        	<a onclick="javascript:window.print();" class="btn btn-lg btn-primary hidden-print">
						Print <i class="fa fa-print"></i>
					</a>
						<!-- end: YOUR CONTENT HERE -->
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			
			<!-- end: FOOTER -->
			
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
