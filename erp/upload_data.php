<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$ud_added_by = $_SESSION['sess_user_name'];
$msg = '';
if(isset($_POST['submit']))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file,"r");
	$count = 0;
	while(($filesop = fgetcsv($handle,1000,',')) !== false)
	{
		$ud_name = $filesop[0];
		$ud_email = $filesop[1];
		$ud_phone = $filesop[2];
		$ud_organisation = $filesop[3];
		$ud_location = $filesop[4];

		/*		$emp_qualification = $filesop[6];
		$emp_father_name = $filesop[7];
		$emp_designation = $filesop[8];
		$emp_doj = $db->changeUserToSql_DateFromat($filesop[9]);
		$emp_pan = $filesop[10];
		$emp_unit = $filesop[11];
		$emp_salary = $filesop[12];
		$emp_account_no = $filesop[13];
		$emp_bank = $filesop[14];
		$emp_ifsc = $filesop[15];
		$emp_blood_group = $filesop[16];
		$emp_permanent_address = $filesop[17];
		$emp_local_address = $filesop[18];
		$emp_city = $filesop[19];		
		$emp_phone_first = $filesop[20];
		$emp_phone_second = $filesop[21];
		$emp_email_first = $filesop[22];
		$emp_email_second = $filesop[23];
		$emp_emergency_contact = $filesop[24];
		$emp_remark = $filesop[25];
*/
//echo $emp_unit."<br>";

$sql = "ud_name = '$ud_name',
		ud_email = '$ud_email',
		ud_phone = '$ud_phone',
		ud_organisation = '$ud_organisation',
		ud_location = '$ud_location',
		ud_added_by = '$ud_added_by',		
		ud_status = 'Running'";
			
		$qry = mysqli_query($class->conn,"insert into upload_data set $sql");
		$count = $count + 1 ;	 
	}
	if($qry)
	{
		$msg = $count." records uploaded successfully.";
	}else{
        $msg = "Something Wrong";
	}
}

if(isset($_POST['assignto']))
{
        $assignee = $_POST['assignee'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $organisation = $_POST['organisation'];
        $phone = $_POST['phone'];

		$data = "ud_name = '$name',
		ud_email = '$email',
		ud_location = '$location',
		ud_organisation = '$organisation',
		ud_phone = '$phone',
		ud_assignto = '$assignee',
		ud_added_by = '$ud_added_by'";
        $as_qry = mysqli_query($class->conn, "INSERT INTO upload_data SET $data") or die(mysqli_error());
        if($as_qry)
        {
            $msg = "Data assigned successfully";
        }

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
								<div class="col-md-12">
                                    <?php if(isset($msg)){ echo '<div class="margin-top-15"><label class=" alert-info" > '.$msg.' </label></div>'; } ?>
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
                                            <div class="heading text-left"><h4>Excel Upload</h4></div>
                                            <form action="upload_data.php" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                                <div class="form-group">
                                                    <div class="col-lg-2">
                                                        <label>Upload:</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="file" name="file" >

                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="submit" name="submit" >
                                                    </div>
                                                </div>
                                            </form>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
                                            <form action="upload_data.php" method="post" enctype="multipart/form-data">
                                                <table class="table  table-bordered table-hover table-full-width" >
                                                    <thead>
                                                        <tr>
                                                            <td>Name</td>
                                                            <td>Email</td>
                                                            <td>Phone</td>
                                                            <td>Organisation</td>
                                                            <td>Location</td>
                                                            <td>Assign to</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><input type="text" name="name" > </td>
                                                        <td><input type="email" name="email" > </td>
                                                        <td><input type="text" name="phone" > </td>
                                                        <td><input type="text" name="organisation" > </td>
                                                        <td><input type="text" name="location" > </td>
                                                        <td><select name="assignee" class="" >
                                                                <option value="" >Select</option>
                                                                <?php
                                                                $user_qry = mysqli_query($class->conn,"SELECT * FROM jk_user WHERE user_status ='Active'");
                                                                while($user_res = mysqli_fetch_array($user_qry)){
                                                                    ?>
                                                                    <option value="<?php echo $user_res['user_name']; ?>" ><?php echo $user_res['user_name']; ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <button name="assignto" class="btn btn-primary pull-left" >Upload & Assign</button>
                                            </form>
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
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/DataTables/jquery.dataTables.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/table-data.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
        <script>
            $("#all").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

        </script>

		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
