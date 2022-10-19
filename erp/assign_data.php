<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$msg = '';
if(isset($_POST['assignto']))
{
    if(count($_POST['ids']) > 0) {
        $ids = implode(',', $_POST['ids']);
        $asignee = $_POST['assignee'];
        $as_qry = mysqli_query($class->conn, "UPDATE upload_data SET ud_assignto = '$asignee' WHERE  ud_id in ($ids)") or die(mysqli_error());
        if($as_qry)
        {
            $msg = "Data assigned successfully";
        }
    }
}
if(isset($_POST['delete']))
{
    if(count($_POST['ids']) > 0) {
        $ids = implode(',', $_POST['ids']);
        $dl_qry = mysqli_query($class->conn, "DELETE FROM upload_data WHERE  ud_id in ($ids)") or die(mysqli_error());
        if($dl_qry)
        {
            $msg = "Data deleted successfully";
        }
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
								</div>
								<div class="col-sm-12">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body" >
                                            <form action="assign_data.php" method="post" enctype="multipart/form-data">
                                                <div style="overflow-x:auto;">
                                                <table class="table table-sm table-responsive table-striped table-bordered table-hover table-full-width" id="sample_1">

                                                    <thead>
                                                        <tr>
                                                            <td><input type="checkbox" name="all" id="all" > </td>
                                                            <td>Name</td>
                                                            <td>Email</td>
                                                            <td>Phone</td>
                                                            <td>Organisation</td>
                                                            <td>Location</td>
                                                            <td>Uploaded Date</td>
                                                            <td>Assign to</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $qry = mysqli_query($class->conn,"SELECT * FROM upload_data");
                                                    while($res = mysqli_fetch_array($qry))
                                                    {	@extract($res);
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="ids[]"  value="<?php echo $ud_id ?>" > </td>
                                                        <td><?php echo $ud_name ?></td>
                                                        <td><?php echo $ud_email ?></td>
                                                        <td><?php echo $ud_phone ?></td>
                                                        <td><?php echo $ud_organisation ?></td>
                                                        <td><?php echo $ud_location ?></td>
                                                        <td><?php echo $ud_added_at ?></td>
                                                        <td><?php echo $ud_assignto ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <select name="assignee" class="" >
                                                    <option value="" >Select</option>
                                                    <?php
                                                        $user_qry = mysqli_query($class->conn,"SELECT * FROM jk_user WHERE user_status ='Active'");
                                                        while($user_res = mysqli_fetch_array($user_qry)){
                                                    ?>
                                                    <option value="<?php echo $user_res['user_name']; ?>" ><?php echo $user_res['user_name']; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <button name="assignto" class="btn btn-primary" >Assign</button>
                                                <button name="delete" class="btn btn-danger" >Delete</button>
                                            </form>
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
