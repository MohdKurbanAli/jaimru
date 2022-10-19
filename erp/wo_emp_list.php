<?php 
include('includes/top_inc.php');
include('includes/class.php');
$class = new baseClass;
$count = "0";
if (isset($_POST['update'])) {
	$i = count($_POST['ids']);
	for($j = 0; $j<$i; $j++)
	{
		$id =  $_POST['ids'][$j];
        $at_appr_leave =  $_POST['at_appr_leave'][$j];
		$leave= $_POST['leave'][$j];
		$month = $_POST['month'];
        $dor = $_POST['dor'][$j];

        $at_emp = $id."".$month;
		//echo $at_emp;
		$sql = "
		at_emp = '$at_emp',
		at_emp_id = '$id',
		at_month = '$month',		
		at_appr_leave = '$at_appr_leave',
		at_leave = '$leave'";	
		
		$chk_qry = mysqli_query($class->conn,"SELECT * FROM attandace WHERE at_emp = '$at_emp'");
		$chk_num = mysqli_num_rows($chk_qry);
		
		
		if($chk_num =="0" || $chk_num ==0)
		{
			$qry = mysqli_query($class->conn, "INSERT attandace SET $sql") ;		
			if($qry)
			{
				$msg = "Attandance has been added";
			}
			else
			{
				$error = mysqli_error($class->conn);
			}  
		}
		else
		{

			$qry = mysqli_query($class->conn, "UPDATE attandace SET $sql WHERE at_emp = '$at_emp'") ;
			if($qry)
			{
				$msg = "Attandance has been updated";			
						
			}
			else
			{
				$error = mysqli_error($class->conn);
			}		
		}
		if($dor !='')
		{
            $dor = $class->changeUserToSql_DateFromat($dor);
            //echo 'not blank'.$dor;
		    $dor_data = "emp_dor = '$dor'";
		    $where = "emp_id = '$id'";
            if($class->updateData('emp_details', $dor_data, $where)) {
                echo "DOR updated";
            }
        }else{
            //echo 'blank'.$dor;
        }

	}
}
if(isset($_GET['id']))
{
	$wo_id = $_GET['id'];
	$current_date = date('F Y', strtotime('last month'));
	//$qry = mysqli_query($class->conn,"SELECT * FROM attandace INNER JOIN emp_details ON attandace.at_emp_id = emp_details.emp_id WHERE attandace.at_month = '$current_date' AND emp_details.emp_work_order = '$wo_id'");
	$qry = mysqli_query($class->conn,"SELECT * FROM emp_details WHERE emp_work_order = '$wo_id' AND emp_status = 'Active';");
	$numrow = mysqli_num_rows($qry);
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
		<link rel="stylesheet" href="vendor/bootstrap-datepicker/bootstrap-datepicker.css">
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
									<span class="mainDescription">Work Order : <?php echo $wo_id ?></span>
									<span class="mainDescription">Total Entry : <?php echo $numrow; ?></span>
								</div>								
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">									
                                     <?php if($numrow==0){
										echo "<h1>No Record Found</h1>";
									}
									else { ?>       	
								<div class="text-center" style="margin-top:20px">
								<h3>Add / Update Attandance for Work order : <strong><?php echo $wo_id; ?></strong></h3>
								</div>									
									
									<form class="form-horizontal" id="newform" method="post" enctype="multipart/form-data">
                                    <div >
									<h4 class="text-success">
									<?php 
									if(isset($_SESSION['msg']))	{echo $_SESSION['msg'];	}
									if(isset($msg))	{echo $msg;	}
											
									?>
                                    </h4>
									</div>
									<div class="text-danger">
									<?php 
										if(isset($error)){echo "Attendance already exist for this month"; } 
										if(isset($_SESSION['error'])){echo $_SESSION['error']; } 
										
										?>
                                    
									</div>
									<div class="form-group text-center">
									<strong>Select Month </strong>: <input name="month" id="month" class="month_year" placeholder="mm/yyyy" required  value="<?php echo $current_date ?>"   / >																
									<input type="hidden" id="mdays" >
									</div>
									
									<table class="table table-striped table-bordered table-hover table-full-width" id="">
										<thead>
											<tr>
												<th><input type="checkbox" name="all" id="all" ></th>
												<th>Code</th>
												<th>Name</th>
												<th>Approved Leave</th>
												<th>LWP </th>
												<th>Gender</th>
												<th> Joining Date</th>
												<th>DOR</th>
												<th> Posting Place</th>
												<th>Designation</th>
											</tr>
										</thead>
										<tbody>
                                        <?php 
										while($res = mysqli_fetch_array($qry))
										{
											@extract($res);											
										?>
											<tr>
												<td><input type="checkbox" class="loop_check" name="ids[]" value="<?php echo $emp_id; ?>" required ></td>
												<td><?php echo $emp_code; ?></td>
												<td><a href="employee_details.php?id=<?php echo $emp_id ;?>"><?php echo $emp_name; ?></a></td>
												<td><input name="at_appr_leave[]" type="number" min="0" max="31"   class="form-control " value="<?php  echo "0"; ?>" > </td>
												<td width="8%"><input name="leave[]" type="number" min="0" max="31"  class="form-control leave" value="<?php  echo "0"; ?>" ></td>
												<td><?php echo $emp_gender ?></td>
												<td><?php echo $emp_doj ?></td>
												<td width="11%"><input type="text" name="dor[]" class="form-control" value="<?php if($emp_dor !=''){echo $class->changeSqlToUser_DateFromat($emp_dor);}else{ echo "";} ?>" data-provide="datepicker" data-date-format="dd/mm/yyyy" ></td>
												<td><?php echo $emp_place_of_posting ?></td>
												<td><?php echo $emp_designation ?></td>
											<!--	<td><?php // echo $emp_salary ?></td>
												<td><?php // echo $emp_phone_first ?></td>
												<td><?php // echo $emp_email_first ?></td>
												<td><?php // echo $emp_emergency_contact ?></td>  -->
											<!--	<td><?php // if($emp_status =='Inactive'){ echo '<input type="checkbox"  class="js-switch" />';} ?>  
												</td>											-->
											</tr>
                                           <?php
										}
										?>										
										</tbody>										
									</table>
									
									<button type="submit" class="btn btn-info  margin-left margin-bottom" name="update">Add Attendance</button>
										
									</form>
                                    
									<?php
										}
										?>
								</div>
								<div class="col-md-12 mt-20">	
								<div class="text-center" style="margin-top:20px">
								<h3>View Attandance for Work order : <strong><?php echo $wo_id ;?></strong></h3>
								</div>
									<div style="margin-top:20px">
									<form action="wo_emp_list_attandance.php" method="post" enctype="multipart/form-data" >
									<input type="hidden" name="wo_id" value="<?php echo $wo_id ?>" >
										<div class="form-group text-center">
										<strong>Select Month </strong>: <input name="month_date" class="month_year" placeholder="mm/yyyy" required  value="<?php echo $current_date ?>"  >
										</div>
										<div class="form-group text-center">
										<input name="submit-view" class="btn btn info" type="submit" value="submit"  / >																
										</div>
									</form>	
									
									</div>
								</div>
							</div>
						</div>
						<!-- end: DYNAMIC TABLE -->						
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
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		
	
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
		<script>
		$(function() {
		$('.month_year').datepicker({
  		format: 'MM yyyy',
    	viewMode: "months", 
    	minViewMode: "months",
        autoClose:true
		});
		});

		$("#all").click(function () {
			$('input:checkbox').not(this).prop('checked', this.checked);
		});
		$("#month").change(function (){
			
			var wo_id = '<?php echo $wo_id; ?>';
			
			var month = $("#month").val();
			var res = month.split(" ");
			var mnt = getMonth(res[0]);
			var days = daysInMonth(mnt,res[1]);	
			$("#mdays").val(days);
			//alert(days);
					
		/*	$.ajax({ url: "includes/ajax.php",
			type:"post",
			data:{month:month, wo_id:wo_id},
			success: function(result){
				alert(result);
			}
			});	
		*/
		});
/*		$(".attendance").change(function (){
		//	var wd = $(this).val();
		var mdays = parseInt($("#mdays").val());
			
		var yourFormFields = $('#newform').find(':input[type=number]');
		$index = yourFormFields.index( this );	
		$mavalue = mdays - ($(this).val());

		yourFormFields.eq($index + 1).val($mavalue);
		});	 */
			
		function getMonth(monthStr){
			return new Date(monthStr+'-1-01').getMonth()+1
		}
		function daysInMonth(month,year) {
	    return new Date(year, month, 0).getDate();
		}
		</script>		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
