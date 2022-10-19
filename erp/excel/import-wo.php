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
		
		$wo_oraganisation_name = $filesop[0];
		$wo_number = $filesop[1];
		$amendment = $filesop[2];
		$wo_date_of_issue = $db->changeUserToSql_DateFromat($filesop[3]);
		$amendment_date = $db->changeUserToSql_DateFromat($filesop[4]);
		$wo_project_number = $filesop[5];
		$wo_project_name = $filesop[6];
		$wo_no_of_resources = $filesop[7];
		$wo_project_duration = $filesop[8];
		$wo_start_date = $db->changeUserToSql_DateFromat($filesop[9]);
		$wo_end_date = $db->changeUserToSql_DateFromat($filesop[10]);
		$wo_location = $filesop[11];
		$wo_city = $filesop[12];
		$wo_amount = $filesop[13];
		$wo_project_coordinator = $filesop[14];
		$wo_client_contact_person = $filesop[15];
		$wo_client_designation = $filesop[16];
		$wo_client_contact = $filesop[17];
		$wo_client_email = $filesop[18];
		$wo_remarks = $filesop[19];

$sql = "wo_oraganisation_name = '$wo_oraganisation_name',
		wo_number = '$wo_number',
		amendment = '$amendment',
		wo_date_of_issue = '$wo_date_of_issue',
		amendment_date = '$amendment_date',
		wo_project_number = '$wo_project_number',
		wo_project_name = '$wo_project_name',
		wo_no_of_resources = '$wo_no_of_resources',
		wo_project_duration = '$wo_project_duration',
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
		wo_remarks = '$wo_remarks',
		wo_status = 'Active'";
			
		$qry = mysqli_query($db->conn,"insert into wo_details set $sql");
		$count = $count + 1 ;	 
	}
	if($qry)
	{
		echo "Your wo_details has imported successfully. You have inserted ".$count." recoreds";	
	}else{
		echo "someti";
	}
	
}
?>
<form action="import-wo.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" name="submit" value="Upload" />
</form>