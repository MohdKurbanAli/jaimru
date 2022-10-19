<?php 
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;

$error = array();
if(isset($_POST['submit']))
{
	if ($_FILES["file"]["name"] != '') {
			$Filepath = $_FILES['file']['name'];
					$filenamekey = md5(uniqid($Filepath, true));     
					$Fileext = pathinfo($Filepath, PATHINFO_EXTENSION);
					$filenamekey12 = $filenamekey.'.'.$Fileext;
				move_uploaded_file($_FILES["file"]["tmp_name"],"uploaded_files/" . $filenamekey12);
		  			$sql_edit=", wo_attached_file = '$filenamekey12'";
		  		}else{
					//$sql_edit=", file = ''";
				}

@extract($_POST);
if($wo_oraganisation_name == '')
{
	$error[]= "Organisation is a require field";
}
if($wo_number == '')
{
	$error[]= "Work Order No. is a require field";
}
//check WO_order
if($wo_id =="")
{
	$ch_wo_number = $class->check_wo($wo_number);
	if($ch_wo_number == '1')
	{
		$error[] = "Work order number is already exist.";
	} 
}

if($wo_project_number == '')
{
	$error[]= "Project No. is a require field";
}
if($wo_no_of_resources == '')
{
	$error[]= "No. of Resources is a require field";
}
if($wo_amount == '')
{
	$error[]= "Amount is a require field";
}
if($wo_client_contact == '')
{
	$error[]= "Client Contact Person is a require field";
}

	$wo_date_of_issue = $class->changeUserToSql_DateFromat($wo_date_of_issue);	
	$wo_amendment_date = $class->changeUserToSql_DateFromat($wo_amendment_date);
	$wo_start_date = $class->changeUserToSql_DateFromat($wo_start_date);
	$wo_end_date = $class->changeUserToSql_DateFromat($wo_end_date);
	
	
	
	if(count($error) == '0')
	{
		$sql = "wo_oraganisation_name = '$wo_oraganisation_name',
		wo_number = '$wo_number',
		wo_internal_ref_no = '$wo_internal_ref_no',
		wo_date_of_issue = '$wo_date_of_issue',
		wo_project_number = '$wo_project_number',
		wo_project_name = '$wo_project_name',
		wo_concern_ministry = '$wo_concern_ministry',
		wo_empanelment_reference = '$wo_empanelment_reference',
		wo_no_of_resources = '$wo_no_of_resources',
		wo_project_duration = '$wo_project_duration',
		wo_project_duration_day = '$wo_project_duration_day',
		wo_start_date = '$wo_start_date',
		wo_end_date = '$wo_end_date',
		wo_location = '$wo_location',
		wo_city = '$wo_city',
		wo_amount = '$wo_amount',
		wo_project_coordinator = '$wo_project_coordinator',
		wo_client_contact_person = '$wo_client_contact_person',
		wo_client_designation = '$wo_client_designation',
		wo_client_contact = '$wo_client_contact',
		wo_client_email = '$wo_client_email',
		wo_invoice_name = '$wo_invoice_name',
		wo_invoice_address = '$wo_invoice_address',
		wo_state = '$wo_state',
		wo_pin = '$wo_pin',
		wo_amendment_no = '$wo_amendment_no',
		wo_amendment_date = '$wo_amendment_date',
		wo_remarks = '$wo_remarks',
		wo_status = 'Active'".$sql_edit;
		
		
		if($wo_id !="")
		{
			$qry = mysqli_query($class->conn,"UPDATE wo_details SET $sql WHERE wo_id = '$wo_id'") or die(mysqli_error($class->conn));
			$s_msg = "Data has been Updated";
		}else	
		{
			$qry = mysqli_query($class->conn,"INSERT into wo_details SET $sql") or die(mysqli_error($class->conn));
			$s_msg = "Data has been Added";
		}		
		if($qry)
		{
			echo "<script> alert('".$s_msg."');
                window.location = 'order_entry.php';
                    </script>";

		}
		else
		{
			$error[] = 'Please fill a valid details';				
		}
	}
	else {
			//$error[] = 'Please correct the above error';		
		}
	}
if(isset($_GET['id']))
{
	$wo_id = $_GET['id'];
//	echo "<script>alert($wo_id)</script>";
	$select = mysqli_query($class->conn,"select * from wo_details where wo_id = '$wo_id'");
	$select_res = mysqli_fetch_array($select);
	 @extract($select_res); 	
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
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
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
                                
                                
									<h1 class="mainTitle">Work Order Form</h1>
									<span class="mainDescription">Use this page to start from scratch and put your custom content</span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span><a href="order_list.php" class="btn btn-default">ORDER LIST</a></span>
									</li>									
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<section>
							<div class="panel-body">
							<form action="order_entry.php" method="post" class="form-horizontal" enctype="multipart/form-data" >
							<input type="hidden" name="wo_id" value="<?php if(isset($wo_id)){ echo $wo_id; } ?>" >
                            <div class="text-danger">
							<?php 
							 if(count($error)>0){ echo implode('<br>',$error);} ?>
                            </div>
							
							<fieldset>
								<legend>
									Work Order Form 
								</legend>
							<div class="form-group">
									<div class="col-md-2">
									<label class="" for="organisation">Organisation</label>
									</div>
								<div class="col-md-10">
									<select name="wo_oraganisation_name" class="cs-select cs-skin-slide" >
									<option value="">Select</option>
									<option value="BECIL" <?php if($wo_oraganisation_name =='BECIL'){echo "selected";}  ?>>BECIL</option>
									<option value="NIC" <?php if($wo_oraganisation_name =='NIC'){echo "selected";}  ?>>NIC</option>
									<option value="NICSI" <?php if($wo_oraganisation_name =='NICSI'){echo "selected";}  ?>>NICSI</option>
									<option value="JAP IT" <?php if($wo_oraganisation_name =='NICSI'){echo "selected";}  ?>>JAP IT</option>
									</select>
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Work Order No.</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="wo_number" placeholder="Work Order No."class="form-control" value="<?php if(isset($wo_number)) { echo $wo_number; } ?>">
								</div>
							</div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="">Internal Reference</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="wo_internal_ref_no" placeholder=""class="form-control" value="<?php if(isset($wo_internal_ref_no)) { echo $wo_internal_ref_no; } ?>">
                                    </div>
                                </div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Date of Issue</label>
									</div>
								<div class="col-md-10">
									
									<p class="input-group input-append">
									<input type="text" name="wo_date_of_issue" placeholder="Date of Issue of WO."class="form-control datepicker" data-date-format="dd/mm/yyyy" value="<?php echo $class->changeSqlToUser_DateFromat($wo_date_of_issue) ?>">
										<span class="input-group-btn">
											<button type="button" class="btn btn-default">
												<i class="glyphicon glyphicon-calendar"></i>
											</button> </span>
								</p>
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Project No.</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="wo_project_number" value="<?php echo $wo_project_number ?>" placeholder="Project No."class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Project Name</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="wo_project_name" value="<?php echo $wo_project_name ?>" placeholder="Project Name" class="form-control">
								</div>
							</div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="">Concern Ministry</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="wo_concern_ministry" value="<?php echo $wo_concern_ministry ?>" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="">Empanelment Reference</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="wo_empanelment_reference" value="<?php echo $wo_empanelment_reference ?>" placeholder="" class="form-control">
                                    </div>
                                </div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">No. of Resources</label>
									</div>
								<div class="col-md-10">
									<input type="number" name="wo_no_of_resources" value="<?php echo $wo_no_of_resources ?>" placeholder="No. of Resources" class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Project Duration</label>
									</div>
								<div class="col-md-5">
									<div class="input-group">
									<input type="number" name="wo_project_duration" value="<?php echo $wo_project_duration ?>" placeholder="Project Duration of WO" class="form-control">
									<span class="input-group-addon">Months</span>
								</div>
								</div>
								<div class="col-md-5">
									<div class="input-group">
									<input type="number" name="wo_project_duration_day" max="30" value="<?php echo $wo_project_duration_day ?>" placeholder="Project Duration Days" class="form-control">
									<span class="input-group-addon">Days</span>
								</div>
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Start Date - End Date</label>
									</div>
								<div class="col-md-10">
									<div class="input-group input-daterange datepicker" data-date-format="dd/mm/yyyy">
										<input type="text" name="wo_start_date" class="form-control"  value="<?php echo $class->changeSqlToUser_DateFromat($wo_start_date) ?>" placeholder="WO Start Date">
										<span class="input-group-addon bg-primary">to</span>
										<input type="text" name="wo_end_date" class="form-control"  value="<?php echo $class->changeSqlToUser_DateFromat($wo_end_date) ?>" placeholder="WO End Date" >
									</div>
									
								</div>
							</div>
							
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Location</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="wo_location" value="<?php echo $wo_location ?>" placeholder="Location" class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">City</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="wo_city" value="<?php echo $wo_city ?>" placeholder="City" class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Amount </label>
									</div>
								<div class="col-md-10">
								<div class="input-group">
									<span class="input-group-addon">Rs.</span>
									<input type="text" name="wo_amount" value="<?php echo $wo_amount ?>" placeholder="Amount Only" class="form-control">
									<span class="input-group-addon">.00</span>
								</div>

								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Project Coordinator </label>
									</div>
								<div class="col-md-10">
									<input type="text" name="wo_project_coordinator" value="<?php echo $wo_project_coordinator ?>" placeholder="Project Coordinator" class="form-control">
								</div>
							</div>
							<fieldset>
								<legend>
									Contact Details
								</legend>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
									<div class="col-md-2">
									<label class="">Client Contact Person</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="wo_client_contact_person" value="<?php echo $wo_client_contact_person ?>" placeholder="Client Contact Person" class="form-control">
								</div>
								<div class="col-md-2">
									<label class="">Designation</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="wo_client_designation" value="<?php echo $wo_client_designation ?>" placeholder="Designation" class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Client Contact</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="wo_client_contact" value="<?php echo $wo_client_contact ?>" placeholder="Client Contact" class="form-control">
								</div>
								<div class="col-md-2">
									<label class="">Client Email</label>
									</div>
								<div class="col-md-4">
									<input type="email" name="wo_client_email" value="<?php echo $wo_client_email ?>" placeholder="Client email" class="form-control">
								</div>
							</div>
									</div>
								</div>
							</fieldset>
							
							
							<fieldset>
								<legend>
									Invoice Address
								</legend>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
									<div class="col-md-2">
									<label class="">Invoice Client Name</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="wo_invoice_name" value="<?php echo $wo_invoice_name ?>" placeholder="Client Name" class="form-control">
								</div>
								<div class="col-md-2">
									<label class="">Invoice Address</label>
									</div>
								<div class="col-md-4">
									<textarea name="wo_invoice_address" class="form-control"><?php echo $wo_invoice_address ?></textarea>
									
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">State</label>
									</div>
								<div class="col-md-4">
								<select name="wo_state" class="form-control" >
								<option value="">Select</option>
								<?php $qry = mysqli_query($class->conn, "SELECT * FROM india_state");
										while($res = mysqli_fetch_array($qry))
										{ ?>
											 <option value="<?php echo $res[1]; ?>" <?php if($wo_state == $res[1] ) {echo 'selected';} ?>>  <?php echo $res[1]; ?></option>
								<?php		}  ?>
									</select>									
								</div>
								<div class="col-md-2">
									<label class="">Pin Number</label>
									</div>
								<div class="col-md-4">
									<input type="number" name="wo_pin" min="000000" max="9999999" value="<?php echo $wo_pin ?>" placeholder="eg: 110001" class="form-control">
								</div>
							</div>
									</div>
								</div>
							</fieldset>
							
							<fieldset>
								<legend>
									Amendment
								</legend>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
									<div class="col-md-2">
									<label class="">Amendment No.</label>
									</div>
										<div class="col-md-4">
											<input type="text" name="wo_amendment_no" value="<?php echo $wo_amendment_no ?>" placeholder="Amendment Number" class="form-control">
										</div>
									<div class="col-md-2">
									<label class="">Amendment Date</label>
									</div>
											<div class="col-md-4">
												<input type="text" name="wo_amendment_date" value="<?php echo $class->sqlToUser_DateTime($wo_amendment_date) ?>" placeholder="Amendment Date" data-date-format="dd/mm/yyyy" class="form-control datepicker">
												
											</div>
										</div>
							
									</div>
								</div>
							</fieldset>
							
							<fieldset>
								<legend>
									Remarks
								</legend>
							
														
							<div class="form-group">
								<div class="col-md-12">
									<textarea name="wo_remarks" class="form-control"><?php echo $wo_remarks ?></textarea>
								</div>
							</div>
							
							</fieldset>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="">Attached Work Order </label>
                                </div>
                                <div class="col-md-10">
                                    <input name="file" type="file" >
                                </div>
                            </div>
							<div class="form-group">
								<div class="col-md-12">
									<button name="submit" class="btn btn-primary btn-wide pull-right">Register Work Order <i class="fa fa-arrow-circle-right" ></i></button>
								</div>
							</div>
							
							</fieldset>
							
							</form>
						</div>	
						</section>
						
						
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
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		
		<!-- end: CLIP-TWO JAVASCRIPTS -->
		
	</body>
</html>
