<?php include('includes/top_inc.php'); 
include('includes/class.php');
$class = new baseClass;
if(isset($_GET['wo'])&& isset($_GET['month']) )
{
	$wo_number = trim($_GET['wo']);
	$month_date = trim($_GET['month']);
	
//	$qry = mysqli_query($class->conn,"SELECT * FROM attandace INNER JOIN emp_details ON attandace.at_emp_id = emp_details.emp_id WHERE attandace.at_month = '$month_date' AND emp_details.emp_work_order = '$wo_number'");
//	$numrow = mysqli_num_rows($qry);

	    $invoice_query = mysqli_query($class->conn, "SELECT * FROM invoice_records ORDER BY ir_id DESC LIMIT 1; ");
	    $invoice_res = mysqli_fetch_array($invoice_query);
	    //echo $invoice_res['0'];
        $invoice_number = "SBCEL/DL/";
        $invoice_number .="201718/";
        $invoice_number .=sprintf("%'04d",$invoice_res['ir_id']+ 1);

        
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
            margin: 5px;
        }
		@media print {
		  body * {
			visibility: hidden;
		  }
		  #section-to-print, #section-to-print * {
			visibility: visible;
			margin: 1mm 1mm 1mm 1mm;
		  }
		  #section-to-print a {
			  visibility: hidden !important;
		  }
		  
		}
        body
        {
            /* this affects the margin on the content before sending to printer  */
            margin: 10mm 10mm 0mm 0mm;
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
				<div class="main-content" id="section-to-print" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						
							<div class="row text-center">
								<div class="col-sm-12">
									<h4>INVOICE ENCLOSURE</h4>
								</div>
								 
							</div>
						<?php $wdq = mysqli_query($class->conn, "SELECT * FROM `wo_details` WHERE wo_number = '$wo_number'");
							$wdq_res = mysqli_fetch_array($wdq); ?>
						<!-- end: PAGE TITLE -->
						<div class="col-md-12 margin-top-10">
                        <table width="100%" class=" table table-bordered">
                          <tr>
                            <td rowspan="12" width="30%"> Customer:<br><br><?php echo $wdq_res['wo_invoice_name']; ?><br><?php echo $wdq_res['wo_invoice_address']; ?>, <br><?php echo $wdq_res['wo_state']; ?>, <br><?php echo $wdq_res['wo_pin']; ?></td>
                            <td width="20%">Invoice Number</td>
                            <td><input type="text" value="<?php echo $invoice_number; ?>" style="all: unset;"> </td>
							 <td>Date</td>
                            <td><input type="text" value="<?php echo date('d-m-Y'); ?>" style="all: unset;"></td>
                          </tr>
                          
						   <tr>
						   <td>WO Number</td>
                            <td ><?php echo $wo_number ?></td>
							<td>Date</td>
                            <td><?php echo $class->sqlToUser_DateTime($wdq_res['wo_date_of_issue']);?> </td>                          
						  </tr>
						   <tr>
						   <td>SBC Reference No:</td>
                            <td colspan="3"><?php echo $wdq_res['wo_internal_ref_no']; ?></td>                          
						  </tr> 
						   <tr>
						   <td>Project Name</td>
                            <td colspan="3"><?php echo $wdq_res['wo_project_name']; ?></td>                          
						  </tr>
						   <tr>
						   <td>Project No.</td>
                            <td colspan="3"><?php echo $wdq_res['wo_project_number']; ?></td>                          
						  </tr>
						   <tr>
						   <td>Service Month</td>
                            <td colspan="3"><?php echo $month_date ?></td>                          
						  </tr>
						   <tr>
						   <td>Amendment No.</td>
                            <td colspan="3"><?php if($wdq_res['wo_amendment_no'] !=""){ echo $wdq_res['wo_amendment_no'];} else{ echo "NA";} ?></td>                          
						  </tr>
						   <tr>
						   <td>Amendment Date</td>
                            <td colspan="3"><?php if($wdq_res['wo_amendment_date'] !="0000-00-00"){ echo $wdq_res['wo_amendment_date'];} else{ echo "NA";} ?></td>                          
						  </tr>
						  
						  <tr>
						  <td>Concern Ministry</td>
                            <td colspan="3"><?php if($wdq_res['wo_concern_ministry'] !=""){ echo $wdq_res['wo_concern_ministry'];} else{ echo "NA";} ?></td>
						  </tr>
						  <tr>
						  <td>Empanelment Reference</td>
                            <td colspan="3"><?php if($wdq_res['wo_empanelment_reference']  !=""){ echo $wdq_res['wo_empanelment_reference'];} else{ echo "NA";} ?></td>                          
						  </tr>
						  <tr>
						  <td>Customer PAN No.</td>
                            <td colspan="3"><?php if($wdq_res['client_pan_no'] !=""){ echo $wdq_res['client_pan_no'];} else{ echo "NA";} ?></td>                          
						  </tr>
						  <tr>
						  <td>Customer GST No.</td>
                            <td colspan="3"><?php if($wdq_res['client_gst_no'] !=""){ echo $wdq_res['client_gst_no'];} else{ echo "NA";} ?></td>                          
						  </tr>
						  
                        </table>						
						</div>						
						
                        <div class="col-lg-12 margin-top-10 ">
						
						<div class="row text-center">
								<div class="col-sm-12">
									<h5>List of Resource Engaged</h5>
								</div>
								 
							</div>
						
                        <table width="100%" class="table table-bordered" >
                          <tr>
						  <th rowspan="2">S. No.</th>
                            <th rowspan="2">Candidate Name</th>
							<th rowspan="2">Designation</th>
							<th rowspan="2">Unit Rates</th>
							<th colspan="2">Service Duration</th>
							<th rowspan="2"> Working Days</th>
							<th rowspan="2">Gap in Service</th>
							<th rowspan="2">Billing Days</th>							
						  </tr>
						  <tr>                            
                            <th scope="col" width="62px">From</th>
							<th scope="col" width="62px">To</th>  							
                          </tr>                          
						  <?php $d_query = mysqli_query($class->conn,"SELECT emp_designation,COUNT(*) AS qty, at_attandance, at_leave, emp_unit, emp_doj ,emp_dor FROM attandace INNER JOIN emp_details ON attandace.at_emp_id = emp_details.emp_id WHERE attandace.at_month = 'month_date' AND emp_details.emp_work_order = '$wo_number' GROUP BY emp_designation, at_attandance, emp_doj, emp_dor;");
							$counter = 1;
							$totalmanpower = 0;
							$sub_total=0;
							$date_count = 0;
							
							$year = date('Y', strtotime($month_date));
							$month = date('m', strtotime($month_date));

							$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
							
							while($d_res = mysqli_fetch_array($d_query))
							{ 							
								

							$doj =  date("Y-m-d", strtotime($d_res['emp_doj']));
							$dor =  date("Y-m-d", strtotime($d_res['emp_dor']));
							$start_date = date("Y-m-d",strtotime($month."/01/".$year));
							$last_date = date("Y-m-d", strtotime($month."/".$d."/".$year));
							
							
							if((($doj >= $start_date) && ($doj <= $last_date))  )
							{
								$date_count = $date_count + 1;
							}
							}
						//	echo "date_count".$date_count;
							if($date_count > 0 )
							{
								$dn_query = mysqli_query($class->conn,"SELECT emp_name, emp_designation,COUNT(*) AS qty, at_attandance, at_leave, at_appr_leave, emp_unit, emp_doj ,emp_dor FROM attandace INNER JOIN emp_details ON attandace.at_emp_id = emp_details.emp_id WHERE attandace.at_month = '$month_date' AND emp_details.emp_work_order = '$wo_number' GROUP BY emp_designation, at_leave, emp_doj, emp_dor;");
							}else{
								$dn_query = mysqli_query($class->conn,"SELECT emp_name, emp_designation, at_attandance, at_leave, at_appr_leave, emp_unit, emp_doj ,emp_dor FROM attandace INNER JOIN emp_details ON attandace.at_emp_id = emp_details.emp_id WHERE attandace.at_month = '$month_date' AND emp_details.emp_work_order = '$wo_number';");
								
							}
							
							
							while($dn_res = mysqli_fetch_array($dn_query))
							{ 
							
//							$amount = round(((int)$dn_res['at_attandance'])/$d * ((int)$dn_res['emp_unit']) * ((int)$dn_res['qty']) );
						?>						 
							<tr class="text-center">	
								<td><?php echo $counter; ?></td>
								<td class="text-left"><?php echo $dn_res['emp_name']; ?></td>
								<td><?php echo $dn_res['emp_designation'] ?></td>
								<td><?php echo $dn_res['emp_unit'] ?></td>
								<td><?php
									$doj =  date("Y-m-d", strtotime($dn_res['emp_doj']));
									//$doj =  date("Y-m-d", strtotime("01/05/2017"));

									$start_date = date("Y-m-d",strtotime($month."/01/".$year));
									$last_date = date("Y-m-d", strtotime($month."/".$d."/".$year));

									if(($doj >= $start_date) && ($doj <= $last_date) )
									{
										$from = $class->changeSqlToUser_DateFromat($doj);
									}else{
										$from = $class->changeSqlToUser_DateFromat($start_date);
									}
									echo $from;								
									?>
								</td>
								<td><?php 
									$dor =  date("Y-m-d", strtotime($dn_res['emp_dor']));
									//echo $dor;
									if(($dor >= $start_date) && ($dor <= $last_date) )
									{
										$to = $class->changeSqlToUser_DateFromat($dor);
									}else{
										$to = $class->changeSqlToUser_DateFromat($last_date);
									}
									echo $to;
									?>
								 </td>  
								<td><?php

                                    $working_days =  ((strtotime($to) - strtotime($from))/(60*60*24)) + 1 ;
                                     echo $working_days; ?>
                                </td>
								<td><?php $at_leave = $dn_res['at_leave'];
										$at_appr_leave = $dn_res['at_appr_leave'];
										
										if($at_appr_leave > $at_leave)
										{
											$gap_in_service =  "0";
											echo $gap_in_service ;
										}else{
											$gap_in_service = $at_leave - $at_appr_leave;
											echo $gap_in_service;
										}				

									?>
								</td>
								
								
								
								<td><?php  //echo $dn_res['at_attandance'];
                                   // $billing_days =  $working_days - $dn_res['at_leave'];
								    $billing_days =  $working_days - $gap_in_service;
                                    echo $billing_days;
                                    ?>
                                </td>
								
								
							  </tr>
							<?php 
							$sub_total += $amount;
							$totalmanpower += $dn_res['qty'];

							$counter++;
							} ?>
							
                        </table>
						
                        </div>
						
						 <div class="col-md-12" style="margin-top:10px">
							<div class="text-right">
                                <!-- <p>Computer generated payslip, No signature required </p>  -->
                                <p>For Prakhar Softwares Solution Limited</p>
                                <p class="margin-top-30">Authorised Signatory</p>
                            </div>
						
                        </div>
						
                        
                        	<a onclick="javascript:window.print();" class="btn btn-lg btn-primary hidden-print">
						        Print <i class="fa fa-print"></i>
					        </a>
                        
                        
                        

						<!-- end: YOUR CONTENT HERE -->
					</div>
				</div>
			</div>
			
			<?php 
					$chk_invoice = mysqli_query($class->conn, "SELECT * FROM invoice_records WHERE ir_month = '$month_date' AND ir_wo = '$wo_number'");
					//echo mysqli_num_rows($chk_invoice);
					if(mysqli_num_rows($chk_invoice) == 0) 
					{
						$data = "ir_invoice_number = '$invoice_number',
						ir_wo = '$wo_number',
						ir_month = '$month_date',
						ir_amount = '$grand_total'";
						
						if($class->insertData('invoice_records', $data)) {
						   // echo "<script> alert('Invoice Genrated.'); </script>";
						} else {
						  //  echo mysqli_error($class->conn);
						}
						//echo mysqli_insert_id($class->conn);
					}else{
					 //   echo "<script> alert('invoice is already genrated for this month.'); </script>";
					}
			
						
			
			?>
			<!-- start: FOOTER -->
            <?php include('includes/footer.php'); ?>
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
