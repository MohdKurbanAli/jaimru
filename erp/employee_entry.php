<?php 
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;

$user_id = $_SESSION['sess_user_id'];
$error = array();
if(isset($_POST['submit']))
{
@extract($_POST);
	$emp_dob = $class->changeUserToSql_DateFromat($emp_dob);
	$emp_doj = $class->changeUserToSql_DateFromat($emp_doj);
	

if($emp_work_order == '')
{
	$error[]= "Work Order is a require field";
}
//check WO_order
/*if($emp_id =="")
{
	$ch_emp_number = $class->check_ecode($emp_code);
	if($ch_emp_number == '1')
	{
		$error[] = "Empployee code is already exist.";
	} 
}
*/
if($emp_doj == '')
{
	$error[]= "Date of Joining is a require field";
}
if($emp_salary == '')
{
	$error[]= "Salary is a require field";
}
if($emp_account_no == '')
{
	$error[]= "Account No. is a require field";
}
if($emp_permanent_address == '')
{
	$error[]= "Permanent address is a require field";
}
if($emp_phone_first == '')
{
	$error[]= "Phone no. is a require field";
}
	
	if(count($error) == '0')
	{
		$sql = "emp_code = '$emp_code',
		emp_name = '$emp_name',
		emp_gender = '$emp_gender',
		emp_dob = '$emp_dob',
		emp_work_order = '$emp_work_order',
		emp_place_of_posting = '$emp_place_of_posting',
		emp_qualification = '$emp_qualification',
		emp_father_name = '$emp_father_name',
		emp_designation = '$emp_designation',
		emp_doj = '$emp_doj',
		emp_pan = '$emp_pan',
		emp_aadhaar_no = '$emp_aadhaar_no',
		emp_unit = '$emp_unit',
		emp_salary = '$emp_salary',
		emp_account_no = '$emp_account_no',
		emp_bank = '$emp_bank',
		emp_ifsc = '$emp_ifsc',
		emp_blood_group = '$emp_blood_group',
		emp_permanent_address = '$emp_permanent_address',
		emp_local_address = '$emp_local_address',
		emp_city = '$emp_city',
		emp_state = '$emp_state',
		emp_phone_first = '$emp_phone_first',
		emp_phone_second = '$emp_phone_second',
		emp_email_first = '$emp_email_first',
		emp_email_second = '$emp_email_second',
		emp_emergency_contact = '$emp_emergency_contact',
		emp_remark = '$emp_remark',
		emp_entry_by = '$user_id',
		emp_status = 'Active'";
		
		
		
		if($emp_id !=='')
		{
			$qry = mysqli_query($class->conn,"UPDATE emp_details SET $sql WHERE emp_id = '$emp_id'") or die(mysqli_error($class->conn));
		}else	
		{
			$qry = mysqli_query($class->conn,"INSERT into emp_details SET $sql") or die(mysqli_error($class->conn));
		}
		
		if($qry)
		{
			//$class->mail('jai.kashyap@prakharsoftwares.com','Email notification from SBC export ltd.','maujitrip','test mail from maujitrip','jai.kashyap@prakharsoftwares.com');
			echo "<script> alert('Data has been Updated');
				window.location = 'employee_entry.php';
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
	$emp_id = $_GET['id'];
	$select = mysqli_query($class->conn,"select * from emp_details where emp_id = '$emp_id'");
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
									<h1 class="mainTitle">Employee Entry Form</h1>
									<span class="mainDescription">Add New Employee</span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span><a href="emp_list.php" class="btn btn-default">EMPLOYEE LIST</a></span>
									</li>									
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<section>
							<div class="panel-body">
							<form action="employee_entry.php" method="post" class="form-horizontal" >
							<input type="hidden" name="emp_id" value="<?php if(isset($emp_id)){echo $emp_id; }?>" >
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
									<label class="" for="organisation">Work Order</label>
									</div>
								<div class="col-md-10">
									<select name="emp_work_order" required class="cs-select cs-skin-slide" >
									<option value="">Select</option>
									<?php
                                    $wqry = mysqli_query($class->conn,"SELECT * FROM wo_details");
                                    while($wres = mysqli_fetch_array($wqry))
                                    { ?>
                                        
                                        <option value="<?php echo $wres['wo_number'] ?>" <?php if($wres['wo_number'] == $emp_work_order){ echo "selected"; } ?> > <?php echo  $wres['wo_number'] ?> </option>
                                   <?php }

                                   // echo $class->wo_list(); ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Empployee Code</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="emp_code" required placeholder="emp_code"class="form-control" value="<?php echo $emp_code ?>">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Empployee Name</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="emp_name" required placeholder="emp_code"class="form-control" value="<?php echo $emp_name ?>">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="" for="organisation">Gender</label>
									</div>
								<div class="col-md-10">
									<select name="emp_gender" required class="cs-select cs-skin-slide" >
									<option value="">Select</option>
									<option value="Male" <?php if($emp_gender =='Male'){echo "selected";}  ?>>Male</option>
									<option value="Female" <?php if($emp_gender	 =='Female'){echo "selected";}  ?>>Female</option>
									
									</select>
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Date of Birth</label>
									</div>
								<div class="col-md-10">
									
									<p class="input-group input-append">
									<input type="text" name="emp_dob" required placeholder="Date of Birth." class="form-control datepicker" data-date-format="dd/mm/yyyy" value="<?php echo $class->sqlToUser_DateTime($emp_dob); ?>">	
										<span class="input-group-btn">
											<button type="button" class="btn btn-default">
												<i class="glyphicon glyphicon-calendar"></i>
											</button> </span>
								</p>
								</div>
							</div>



							<div class="form-group">
									<div class="col-md-2">
									<label class="">Posting Place</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="emp_place_of_posting" required value="<?php echo $emp_place_of_posting ?>" placeholder="Place." class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Qualification</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="emp_qualification" required value="<?php echo $emp_qualification ?>" placeholder="Qualification" class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Father Name</label>
									</div>
								<div class="col-md-10">
									<input type="text" name="emp_father_name" required value="<?php echo $emp_father_name ?>" placeholder="" class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Designation</label>
									</div>
								<div class="col-md-10">
									<select name="emp_designation" class="form-control" required >
										<option value="">Select</option>
										<?php
										$positions_qry = mysqli_query($class->conn,"SELECT * FROM positions");
										while($positions_res = mysqli_fetch_array($positions_qry))
										{ ?>
											
											<option value="<?php echo $positions_res['position']; ?>" <?php if($positions_res['position'] == $emp_designation){ echo "selected"; } ?> > <?php echo  $positions_res['position'] ?> </option>
									   <?php }  ?>
									
									</select>
									
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Date of Joinning</label>
									</div>
								<div class="col-md-10">
									<p class="input-group input-append">
									<input type="text" name="emp_doj" placeholder="" required class="form-control datepicker" data-date-format="dd/mm/yyyy" value="<?php echo $class->changeSqlToUser_DateFromat($emp_doj); ?>">	
									<span class="input-group-btn">
									<button type="button" class="btn btn-default">
										<i class="glyphicon glyphicon-calendar"></i>
									</button> </span>
									</p>
								</div>
							</div>

							<div class="form-group">
									<div class="col-md-2">
									<label class="">Vandor Rate </label>
									</div>
								<div class="col-md-10">
								<div class="input-group">
									<span class="input-group-addon">Rs.</span>
									<input type="text" name="emp_unit" required value="<?php if(isset($emp_unit)){ echo $emp_unit; } ?>" placeholder="" class="form-control">
									<span class="input-group-addon">.00</span>
								</div>

								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Salary / CTC </label>
									</div>
								<div class="col-md-10">
								<div class="input-group">
									<span class="input-group-addon">Rs.</span>
									<input type="text" name="emp_salary" required value="<?php echo $emp_salary ?>" placeholder="" class="form-control">
									<span class="input-group-addon">.00</span>
								</div>

								</div>
							</div>
							
							<fieldset>
								<legend>
									Bank Details
								</legend>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
									<div class="col-md-2">
									<label class="">Bank </label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_bank" value="<?php echo $emp_bank ?>" placeholder="" class="form-control" required>
								</div>
								<div class="col-md-2">
									<label class="">IFSC</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_ifsc" value="<?php echo $emp_ifsc ?>" placeholder="" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Account Number</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_account_no" value="<?php echo $emp_account_no ?>" placeholder="" class="form-control" required>
								</div>
								<div class="col-md-2">
									<label class="">PAN Card</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_pan" value="<?php echo $emp_pan ?>" placeholder="" class="form-control" >
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Aadhaar Number</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_aadhaar_no" value="<?php echo $emp_aadhaar_no; ?>" placeholder="" class="form-control" required>
								</div>
								
							</div>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>
									Contact Details
								</legend>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
									<div class="col-md-2">
									<label class="">Permanent Address </label>
									</div>
								<div class="col-md-4">
									<textarea name="emp_permanent_address" class="form-control"><?php echo $emp_permanent_address ?></textarea>
								</div>
								<div class="col-md-2">
									<label class="">Local Address</label>
									</div>
								<div class="col-md-4">
									<textarea name="emp_local_address" class="form-control"><?php echo $emp_local_address ?></textarea>
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">State</label>
									</div>
								<div class="col-md-4">
									
									<select name="emp_state" class="form-control" required >
									<option value="">Select</option>
								<?php $qry = mysqli_query($class->conn, "SELECT * FROM india_state");
										while($res = mysqli_fetch_array($qry))
										{ ?>
											 <option value="<?php echo $res[1]; ?>" <?php if($res[1] == $emp_state) {echo 'selected';} ?>>  <?php echo $res[1]; ?></option>
								<?php		}  ?>
									</select>									
								</div>
									<div class="col-md-2">
									<label class="">City</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_city" value="<?php echo $emp_city ?>" placeholder="" class="form-control">
								</div>
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Phone </label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_phone_first" value="<?php echo $emp_phone_first ?>" placeholder="" class="form-control" required>
								</div>
									<div class="col-md-2">
									<label class="">Phone 2</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_phone_second" value="<?php echo $emp_phone_second ?>" placeholder="" class="form-control">
								</div>								
							</div>
							<div class="form-group">
									<div class="col-md-2">
									<label class="">Email </label>
									</div>
								<div class="col-md-4">
									<input type="email" name="emp_email_first" value="<?php echo $emp_email_first ?>" placeholder="" class="form-control" required>
								</div>
									<div class="col-md-2">
									<label class="">Email 2</label>
									</div>
								<div class="col-md-4">
									<input type="email" name="emp_email_second" value="<?php echo $emp_email_second ?>" placeholder="" class="form-control">
								</div>								
							</div>

							<div class="form-group">
									<div class="col-md-2">
									<label class="">Blood Group</label>
									</div>
								<div class="col-md-4">
									<input type="text" name="emp_blood_group" value="<?php echo $emp_blood_group ?>" placeholder="" class="form-control">
								</div>
								<div class="col-md-2">
									<label class="">Emergency Contact</label>
									</div>
								<div class="col-md-4">
									<input type="number" name="emp_emergency_contact" value="<?php echo $emp_emergency_contact ?>" placeholder="" class="form-control">
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
									<textarea name="emp_remark" class="form-control"><?php echo $emp_remark ?></textarea>
								</div>
							</div>
							
							</fieldset>
							<div class="form-group">
								<div class="col-md-12">
									<button name="submit" class="btn btn-primary btn-wide pull-right">Add Employee <i class="fa fa-arrow-circle-right" ></i></button>
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
