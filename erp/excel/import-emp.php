<?php

include('../includes/class.php');
$db = new baseClass;

if(isset($_POST['submit']))
{	
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file,"r");
	$count = 0;
	while(($filesop = fgetcsv($handle,1000,',')) !== false)
	{		
		$emp_code = $filesop[0];
		$emp_name = $filesop[1];
		$emp_gender = $filesop[2];
		$emp_dob = $db->changeUserToSql_DateFromat($filesop[3]);
		$emp_work_order = $filesop[4];
		$emp_place_of_posting = $filesop[5];
		$emp_qualification = $filesop[6];
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
//echo $emp_unit."<br>";

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
		emp_unit = '$emp_unit',
		emp_salary = '$emp_salary',
		emp_account_no = '$emp_account_no',
		emp_bank = '$emp_bank',
		emp_ifsc = '$emp_ifsc',
		emp_blood_group = '$emp_blood_group',
		emp_permanent_address = '$emp_permanent_address',
		emp_local_address = '$emp_local_address',
		emp_city = '$emp_city',
		emp_state = '',
		emp_phone_first = '$emp_phone_first',
		emp_phone_second = '$emp_phone_second',
		emp_email_first = '$emp_email_first',
		emp_email_second = '$emp_email_second',
		emp_emergency_contact = '$emp_emergency_contact',
		emp_remark = '$emp_remark',
		emp_status = 'Active'";
			
		$qry = mysqli_query($db->conn,"insert into emp_details set $sql");
		$count = $count + 1 ;	 
	}
	if($qry)
	{
		echo "Your emp_details has imported successfully. You have inserted ".$count." recoreds";	
	}else{
		echo "someti";
	}
	
}
?>
<form action="import-emp.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" name="submit" value="Upload" />
</form>