<?php 
include('includes/top_inc.php');
include_once('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];
$error = array();
if(isset($_POST['submit']))
{
@extract($_POST);
	$emp_doj = $class->changeUserToSql_DateFromat($emp_doj);

if($sl_emp_code == '')
{
	$error[]= "Employee code is a require field";
}
if($sal_ctc == '')
{
	$error[]= "CTC is a require field";
}
if($sal_gross == '')
{
	$error[]= "Gross salary is a require field";
}
if($sal_net == '')
{
	$error[]= "Net Pay is a require field";
}
if($sal_basic == '')
{
	$error[]= "Basic Pay is a require field";
}
if($sal_hra == '')
{
	$error[]= "HRA is a require field";
}
	if(count($error) == '0')
	{
		$sql = "sl_emp_id = '$sl_emp_id',
		sl_emp_code = '$sl_emp_code',
		sa_emp_doj = '$sa_emp_doj',
		sal_emp_name = '$sal_emp_name',
		sal_emp_designation = '$sal_emp_designation',
		sal_ctc = '$sal_ctc',
		sal_gross = '$sal_gross',
		sal_net = '$sal_net',
		sal_basic = '$sal_basic',
		sal_hra = '$sal_hra',
		sal_conveyance = '$sal_conveyance',
		sal_telephone = '$sal_telephone',				
		sal_pa = '$sal_pa',
		sal_special_allowance = '$sal_special_allowance',
		sal_pf_employer = '$sal_pf_employer',
		sal_pf_emmployee = '$sal_pf_emmployee',
		sal_esi_employer = '$sal_esi_employer',
		sal_esi_employee = '$sal_esi_employee',
		sal_tax = '$sal_tax',
		sal_management_allowense = '$sal_management_allowense',
		sal_bonus = '$sal_bonus',
		sal_pf_no = '$sal_pf_no',
		sal_esi_no = '$sal_esi_no',
		sal_uan_no = '$sal_uan_no',
		sal_remark = '$sal_remark',
		sal_remark2 = '$sal_remark2',
		sal_entry_by = '$user_id'";
		
		if($salary_id !=='')
		{
			$qry = mysqli_query($class->conn,"UPDATE salary SET $sql WHERE salary_id = '$salary_id'") or die(mysqli_error($class->conn));
		}else	
		{
			$qry = mysqli_query($class->conn,"INSERT into salary SET $sql") or die(mysqli_error($class->conn));
		}
		
		if($qry)
		{
		//	$class->mail('jai.kashyap@prakharsoftwares.com','Email notification from SBC export ltd.','maujitrip','test mail from maujitrip','jai.kashyap@prakharsoftwares.com');
			echo "<script> alert('Data has been Updated'); 
			window.location = 'salary_entry.php';
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
	$salary_id = $_GET['id'];
//	echo "<script>alert($salary_id)</script>";
	$select = mysqli_query($class->conn,"select * from salary where salary_id = '$salary_id'");
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
<title>Salary Brakup | maujitrip Invoice</title>
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
              <h1 class="mainTitle">Salary Breakup Form</h1>
              <span class="mainDescription">Employee Salary breakup</span> </div>
            <ol class="breadcrumb">
				<li>
					<span><a href="salary_list.php">SALARY LIST</a></span>
				</li>									
			</ol>
          </div>
        </section>
        <!-- end: PAGE TITLE --> 
        <!-- start: YOUR CONTENT HERE -->
        <section>
          <div class="panel-body">
            <form action="salary_entry.php" method="post" class="form-horizontal" >
              <input type="hidden" name="salary_id" value="<?php if(isset($salary_id)){echo $salary_id; }?>" >
			  <input type="hidden" name="sl_emp_code" id="sl_emp_code" value="<?php if(isset($sl_emp_code)){echo $sl_emp_code; }?>" >
			  
			  
              <div class="text-danger">
                <?php 
							 if(count($error)>0){ echo implode('<br>',$error);} ?>
              </div>
              <div id="mydiv"> </div>
              <fieldset>
                <legend> Salary Details Form </legend>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="" for="organisation">Employee Code</label>
                  </div>
                  <div class="col-md-10">
                  <!--   <select name="sl_emp_code" id="sl_emp_code" onChange="Getemp($sl_emp_code)" class="form-control" required >  -->
				  <select name="sl_emp_id" id="sl_emp_id" class="form-control" required >
                      <option value="">Select</option>
                      <?php 
						$emp_qry = mysqli_query($class->conn,"SELECT * FROM emp_details");
						while($emp_res = mysqli_fetch_array($emp_qry))
							{  ?>
							<option value="<?php echo $emp_res['emp_id']; ?>" <?php if($emp_res['emp_id'] == $sl_emp_id){ echo "selected";} ?>  ><?php echo  $emp_res['emp_code']; ?></option>
							
					<?php	}	  ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">Date of Joining</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="sa_emp_doj" id="Doj" readonly placeholder="Date Of Joining"class="form-control" value="<?php if(isset($sa_emp_doj)){ echo $class->sqlToUser_DateTime($sa_emp_doj); } ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">Employee Name</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="sal_emp_name" id="sal_emp_name" required readonly placeholder=""class="form-control" value="<?php echo $sal_emp_name ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="" for="organisation">Designation</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="sal_emp_designation" id="sal_emp_designation" required readonly placeholder="emp_code"class="form-control" value="<?php echo $sal_emp_designation ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">CTC</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_ctc" placeholder="CTC"class="form-control" required value="<?php echo $sal_ctc ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">Gross salary</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_gross" value="<?php echo $sal_gross ?>" required placeholder="GC" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">Net Pay</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_net" value="<?php echo $sal_net ?>" required placeholder="Qualification" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">Basic Pay</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_basic" value="<?php echo $sal_basic ?>" required placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">HRA</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_hra" value="<?php echo $sal_hra ?>" required placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">Conveyance</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_conveyance" value="<?php echo $sal_conveyance ?>" required placeholder="" class="form-control">
                  </div>
                </div>
				<div class="form-group">
                  <div class="col-md-2">
                    <label class="">Telephone Allowance</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_telephone" value="<?php echo $sal_telephone ?>" placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">Medical Allowance</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_pa" value="<?php echo $sal_pa ?>" required placeholder="" class="form-control">
                  </div>
                </div>
				<div class="form-group">
                  <div class="col-md-2">
                    <label class="">Special Allowance</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_special_allowance" value="<?php echo $sal_special_allowance ?>" placeholder="" class="form-control">
                  </div>
                </div>
				<div class="form-group">
                  <div class="col-md-2">
                    <label class="">PF (Employer)</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_pf_employer" value="<?php echo $sal_pf_employer ?>" required placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">PF (Employee)</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_pf_emmployee" value="<?php echo $sal_pf_emmployee ?>" required placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">ESI (Employer)</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_esi_employer" value="<?php echo $sal_esi_employer ?>" required placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">ESI (Employee)</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_esi_employee" value="<?php echo $sal_esi_employee ?>" required placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">TAX as per Account</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_tax" value="<?php echo $sal_tax ?>" required placeholder="" class="form-control">
                  </div>
                </div>
				<div class="form-group">
                  <div class="col-md-2">
                    <label class="">Management Allowense </label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_management_allowense" value="<?php echo $sal_management_allowense ?>" required placeholder="" class="form-control">
                  </div>
                </div>
				<div class="form-group">
                  <div class="col-md-2">
                    <label class="">Bonus</label>
                  </div>
                  <div class="col-md-10">
                    <input type="number" name="sal_bonus" value="<?php echo $sal_bonus ?>" placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">PF No.</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="sal_pf_no" value="<?php echo $sal_pf_no ?>"  placeholder="" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="">ESI No.</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="sal_esi_no" value="<?php echo $sal_esi_no ?>"  placeholder="" class="form-control">
                  </div>
                </div>
				 <div class="form-group">
                  <div class="col-md-2">
                    <label class="">UAN No.</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="sal_uan_no" value="<?php echo $sal_uan_no ?>"  placeholder="" class="form-control">
                  </div>
                </div>
                <fieldset>
                  <legend> Remarks Details</legend>
                  <label class="">Remarks</label>
                  <div class="form-group">
                    <div class="col-md-12">
                      <textarea name="sal_remark" class="form-control"><?php echo $sal_remark ?></textarea>
                    </div>
                  </div>
                  <label class="">Remarks 2</label>
                  <div class="form-group">
                    <div class="col-md-12">
                      <textarea name="sal_remark2" class="form-control"><?php echo $sal_remark2 ?></textarea>
                    </div>
                  </div>
                </fieldset>
                <div class="form-group">
                  <div class="col-md-12">
                    <button name="submit" class="btn btn-primary btn-wide pull-right">Add Salary BreakUp<i class="fa fa-arrow-circle-right" ></i></button>

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
<script>
		$(document).ready(function(e){
				
			$('#sl_emp_id').change(function(e) {
				var emp_id = document.getElementById("sl_emp_id").value;
				
				$.ajax({ 
					type:"POST",
					url:"searcfield.php",
					data:{emp_id:emp_id},
					dataType:"json",
					cache:false,
					success: function(result)
					{
						//alert(result);	
						//$("#sal_emp_name").html(result.Name);
						document.getElementById("sl_emp_code").value = result.emp_code;
						document.getElementById("sal_emp_name").value = result.Name;
						document.getElementById("Doj").value = result.Doj;
						document.getElementById("sal_emp_designation").value = result.emp_designation;
						//$("#mydiv").html(result.Doj);
						
					} 
				});
			}); 

		});	


		</script> 
<!-- end: JavaScript Event Handlers for this page --> 

<!-- end: CLIP-TWO JAVASCRIPTS -->

</body>
</html>
