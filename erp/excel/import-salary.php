<?php

include('../includes/class.php');
$class = new baseClass;

if(isset($_POST['submit']))
{	
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file,"r");
	$count = 0;
	while(($filesop = fgetcsv($handle,1000,',')) !== false)
	{		
		$sl_emp_code = trim($filesop[0]);
		$sa_emp_doj = $class->changeUserToSql_DateFromat(trim($filesop[1]));
		$sal_emp_name = trim($filesop[2]);
		$sal_emp_designation = trim($filesop[3]);
		$sal_ctc = trim($filesop[4]);
		$sal_gross = trim($filesop[5]);
		$sal_net = trim($filesop[6]);
		$sal_basic = trim($filesop[7]);
		$sal_hra = trim($filesop[8]);
		$sal_conveyance = trim($filesop[9]);
		$sal_pa = trim($filesop[10]);
		$sal_pf_employer = trim($filesop[11]);
		$sal_pf_emmployee = trim($filesop[12]);
		$sal_esi_employer = trim($filesop[13]);
		$sal_esi_employee = trim($filesop[14]);
		$sal_tax = trim($filesop[15]);
		$sal_pf_no = trim($filesop[16]);
		$sal_esi_no = trim($filesop[17]);
		$sal_remark = trim($filesop[18]);
		$sal_remark2 = trim($filesop[19]);

		echo $sa_emp_doj."<br>";
$sql = "sl_emp_code = '$sl_emp_code',
		sa_emp_doj = '$sa_emp_doj',
		sal_emp_name = '$sal_emp_name',
		sal_emp_designation = '$sal_emp_designation',
		sal_ctc = '$sal_ctc',
		sal_gross = '$sal_gross',
		sal_net = '$sal_net',
		sal_basic = '$sal_basic',
		sal_hra = '$sal_hra',
		sal_conveyance = '$sal_conveyance',
		sal_pa = '$sal_pa',
		sal_pf_employer = '$sal_pf_employer',
		sal_pf_emmployee = '$sal_pf_emmployee',
		sal_esi_employer = '$sal_esi_employer',
		sal_esi_employee = '$sal_esi_employee',
		sal_tax = '$sal_tax',
		sal_pf_no = '$sal_pf_no',
		sal_esi_no = '$sal_esi_no',
		sal_remark = '$sal_remark',
		sal_remark2 = '$sal_remark2'		
		";
			
		$qry = mysqli_query($class->conn,"insert into salary set $sql");
		$count = $count + 1 ;	 
	}
	if($qry)
	{
		echo "Your salary has imported successfully. You have inserted ".$count." recoreds";	
	}else{
		echo "someti";
	}
	
}
?>
<form action="import-salary.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" name="submit" value="Upload" />
</form>