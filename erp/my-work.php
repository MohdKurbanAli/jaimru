<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$username =  $_SESSION['sess_user_name'];
$user_id = $_SESSION['sess_user_id'];
$msg = "";
if(isset($_POST['save']))
{
    $ud_id =  $_POST['id'];
    $feedback =  $_POST['feedback'];
    $status =  $_POST['status'];
    $reminder =  $class->userToSql_DateTime($_POST['reminder']);

//echo $ud_id. " " . $feedback ." ". $status." ".$reminder." ". $user_id;
    $time = $_POST['time'];
    $rmdata = "ud_id = '$ud_id',
    user_id = '$user_id',
    rm_datetime = '$reminder',
    rm_time = '$time',
    rm_notes = '$feedback'";
    $rm_qry = mysqli_query($class->conn,"INSERT INTO reminder SET $rmdata");
    if($rm_qry){
        $st_update = mysqli_query($class->conn,"UPDATE upload_data SET ud_status = '$status' WHERE ud_id = '$ud_id'");
        $msg =  "Data saved";
    }else{
        $msg = "Not Saved";
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
        <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <style>
            .FareRule{
                border: 1px solid #e1e1e1;
                border-radius: 6px;
                box-shadow: 5px 5px 15px #000;
                padding: 10px;
                width: 250px;
                background-color: #017ebc;
                color: #fff;
                display:none;
                z-index:1;
                position:absolute;
            }
            .hidefare:hover .FareRule{
                display:block;
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

								<div class="col-sm-12">

                                    <?php if(isset($msg)){ echo '<div class="margin-top-15"><label class=" alert-info" > '.$msg.' </label></div>'; } ?>
                                    <div style="overflow-x:auto;">
                                                <table class="table table-bordered " id="sample_1">
                                                    <thead>
                                                        <tr>
                                                            <td>Name</td>
                                                            <td>Email</td>
                                                            <td>Phone</td>
                                                            <td>Organisation</td>
                                                            <td>Location</td>
                                                            <td>Feedback</td>
                                                            <td>Last feedback</td>
                                                            <td>Status</td>
                                                            <td>Reminder</td>
                                                            <td>Action</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $qry = mysqli_query($class->conn,"SELECT * FROM upload_data WHERE ud_assignto = '$username';");
                                                    while($res = mysqli_fetch_array($qry))
                                                    {	@extract($res);
                                                    ?>
                                                    <tr>
                                                        <form action="my-work.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?php echo $ud_id; ?>" >
                                                        <td><?php echo $ud_name ?></td>
                                                        <td><?php echo $ud_email ?></td>
                                                        <td><?php echo $ud_phone ?></td>
                                                        <td><?php echo $ud_organisation ?></td>
                                                        <td><?php echo $ud_location ?></td>
                                                            <?php $rm_query = mysqli_query($class->conn,"SELECT * FROM reminder WHERE ud_id = '$ud_id' ORDER BY rm_id DESC");
                                                                $rm_res = mysqli_fetch_array($rm_query);
                                                            ?>
                                                        <td> <textarea name="feedback" ><?php echo $rm_res['rm_notes']; ?></textarea> </td>
                                                            <td><div class="hidefare">
                                                                    <span>Last feedback</span>
                                                                    <div class="FareRule" style="height:400px;overflow:auto;">

                                                                            <table class="table ">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>Call At</td>
                                                                                        <td>Feedback</td>
                                                                                        <td>Next Schedule</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php $lf_query = mysqli_query($class->conn,"SELECT * FROM reminder WHERE ud_id = '$ud_id' AND user_id = '$user_id' ORDER BY rm_id DESC");
                                                                                while($lf_res = mysqli_fetch_array($lf_query))
                                                                                { ?>
                                                                                    <tr>
                                                                                        <td><?php echo $class->changeSqlToUser_DateFromat($lf_res['rm_added_at']); ?></td>
                                                                                        <td><?php echo $lf_res['rm_notes']; ?></td>
                                                                                        <td><?php echo $class->sqlToUser_DateTime($lf_res['rm_datetime']); ?></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                </tbody>
                                                                            </table>


                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <td><select name="status" >
                                                                <option value="Running" <?php if($ud_status =='Running'){ echo "selected";} ?>>Running</option>
                                                                <option value="Closed" <?php if($ud_status =='Closed'){ echo "selected";} ?>>Closed</option>
                                                                <option value="Converted" <?php if($ud_status =='Converted'){ echo "selected";} ?>>Converted</option>
                                                            </select> </td>
                                                        <td><input type="text" class="datepicker" name="reminder" value="<?php echo $class->sqlToUser_DateTime($rm_res['rm_datetime']); ?>" readonly>
                                                            <input type="text" name="time" class="timepicker-default"></td>
                                                        <td><input type="submit" name="save" value="save" > </td>
                                                        </form>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
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
        <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="vendor/autosize/autosize.min.js"></script>
        <script src="vendor/selectFx/classie.js"></script>
        <script src="vendor/selectFx/selectFx.js"></script>

        <script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/DataTables/jquery.dataTables.min.js"></script>
        <script src="assets/js/table-data.js"></script>
        <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->

		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();

                $('.timepicker-default').timepicker({
                    minuteStep: 5,
                    appendWidgetTo: 'body',
                    showSeconds: false,
                    showMeridian: false,
                    defaultTime: '11:45 AM'});
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    startDate: '1'
                });
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
