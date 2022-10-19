<?php 
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;
if(isset($_POST['submit']))
{
    $org = $_POST['org'];
    $enduser = $_POST['enduser'];
    $data_qry = mysqli_query($class->conn,"SELECT * FROM wo_details WHERE wo_oraganisation_name = '$org' AND wo_project_name ='$enduser'");


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
                                
                                
									<h1 class="mainTitle">Genrate Invoice</h1>
									<span class="mainDescription">Work Order hierarchy</span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Pages</span>
									</li>
									<li class="active">
										<span>Genrate Invoice</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<section>
							<div class="panel-body">
							<form action="genrate_invoice.php" method="post" class="form-horizontal" >
							<input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id; } ?>" >
                            <div class="text-danger">


                            </div>
							
							<fieldset>
								<legend>
									Create User Form 
								</legend>
							<div class="form-group">
									<div class="col-md-2">
									<label class="" for="organisation">Empanelled Agency</label>
									</div>
								<div class="col-md-10">
									<select name="org" class="form-control" id="org" >
                                        <option value="">Select</option>
                                        <?php
                                        $or_qry = mysqli_query($class->conn,"SELECT DISTINCT(wo_oraganisation_name) FROM wo_details;");
                                        while($or_res = mysqli_fetch_array($or_qry)){
                                        ?>
                                        <option value="<?php echo $or_res['wo_oraganisation_name']; ?>" <?php if($org ==$or_res['wo_oraganisation_name']){ echo "selected";}  ?>><?php echo $or_res['wo_oraganisation_name']; ?></option>
                                        <?php } ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
									<div class="col-md-2">
									<label class="">End User Organisation</label>
									</div>
                                <div class="col-md-10">
                                    <select name="enduser" class="form-control" id="yoyo" >

                                    </select>
                                </div>
							</div>


							<div class="form-group">
								<div class="col-md-12">
									<button name="submit" class="btn btn-primary btn-wide pull-right">Submit <i class="fa fa-arrow-circle-right" ></i></button>
								</div>
							</div>
							
							</fieldset>
							
							</form>
						</div>	
						</section>
                        <?php if(isset($data_qry)) {?>
                        <section class="bg-white">
                            <div class="panel-body ">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Organisation </td>
                                            <td>WO Number </td>
                                            <td>End User </td>
                                            <td>Action </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($data_res = mysqli_fetch_array($data_qry)){
                                    ?>
                                        <tr>
                                            <td><?php echo $data_res['wo_oraganisation_name']; ?> </td>
                                            <td><?php echo $data_res['wo_number']; ?> </td>
                                            <td><?php echo $data_res['wo_project_name']; ?> </td>
                                            <td><a href="wo_emp_list.php?id=<?php echo $data_res['wo_number']; ?>" class="btn btn-primary" target="_blank">Genrate Invoice</a> </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <?php } ?>
						
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

		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>
        <script>
            $(document).ready(function(e) {
                $("#org").change(function(){
               // alert('this is working');
                    var org = $("#org").val();
                    //alert(org);
                    $("#yoyo").load("dynamic_data.php?org=" + org);
                });
            });

        </script>
		<!-- end: JavaScript Event Handlers for this page -->
		
		<!-- end: CLIP-TWO JAVASCRIPTS -->
		
	</body>
</html>
